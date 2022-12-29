<?php

namespace App\UseCases;

use App\Http\Requests\DriverCreateRequest;
use App\Http\Requests\DriverEditRequest;
use App\Models\Car;
use App\Models\Driver;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class DriverService
{
    private $payment_service;
    private $bonus_service;
    private $service_service;
    public function __construct(PaymentService $payment_service, BonusService $bonus_service, ServiceService $service_service)
    {
        $this->payment_service = $payment_service;
        $this->bonus_service = $bonus_service;
        $this->service_service = $service_service;
    }
    public function index(Request $request){
        $user=Auth::user();
        if($user->created_at->toDateString() != Carbon::now()->toDateString()){
            $drivers=Driver::all();
            foreach ($drivers as $driver){
                $this->expire($driver);
            }
            $user->created_at=Carbon::now();
            $user->save();
        }
        $query = QueryBuilder::for(Driver::class);
        if($branch_id=$request->get('branch_id')){
            $query->where('branch_id',$branch_id);
        }
        if($status=$request->get('status')){
            switch ($status){
                case 1:
                    $query->where('account','<',0);
                    break;
                case 2:
                    $query->whereBetween('expire_date',[Carbon::now(),Carbon::now()->addDays(7)]);
                    break;
                case 3:
                    $query->where('l_end','<',Carbon::now());
                    break;
                case 4:
                    $query->whereBetween('l_end',[Carbon::now(),Carbon::now()->addDays(7)]);
                    break;
                case 5:
                    $query->where('c_end','<',Carbon::now());
                    break;
                case 6:
                    $query->whereBetween('c_end',[Carbon::now(),Carbon::now()->addMonths(1)]);
                    break;
            }





        }
        $query->allowedAppends(!empty($request->append) ? explode(',', $request->get('append')) : []);
        $query->allowedIncludes(!empty($request->include) ? explode(',', $request->get('include')) : []);
        $query->orderBy('id', 'DESC');
        return $query;
    }
    public function create(DriverCreateRequest $request)
    {
        $driver = Driver::make($request->only('driver', 'owner', 'tel_d', 'tel_o', 'car_number', 'branch_id', 'c_start', 'c_end', 'l_cost', 'l_start', 'l_end', 'payment','account','inn','inps','inn_o','inps_o'));
        DB::beginTransaction();
        try {
            $driver->car_id = Car::firstOrCreate(['name' => $request->name])->id;
            $driver->expire_date=$request->l_start;
            $driver->save();
            $request['driver_id'] = $driver->id;
            $this->payment_service->create($request, 1);
            if ($request->filled('bonus')) {
                $this->bonus_service->create($request);
            }
            if ($request->filled('service')) {
                $this->service_service->create($request);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return [0, $e->getMessage()];
        }
        return [$driver];
    }
    public function edit(Driver $driver, DriverEditRequest $request)
    {

        $driver->update($request->only('driver', 'owner', 'tel_d', 'tel_o','car_number', 'branch_id', 'c_start','l_start','payment', 'c_end', 'l_cost','l_end','account','inn','inps','inn_o','inps_o'));
        $driver=Driver::find($driver->id);
        $driver->car_id = Car::firstOrCreate(['name' => $request->name])->id;
        $driver->expire_date=$request->l_start;
        $driver->save();
//        if($request->l_start <= Carbon::now() && $driver->l_start<=Carbon::now()){
//            $driver->expire_date=Carbon::parse($request->l_start)->addMonths(1);
//            $driver->account+=$driver->payment - $request->payment;
//
//        }
//        elseif($request->l_start > Carbon::now() && $driver->l_start <= Carbon::now()){
//            $driver->account+=$driver->payment;
//            $driver->expire_date=$request->l_start;
//        }
//        elseif($request->l_start <= Carbon::now() && $driver->l_start > Carbon::now()){
//            $driver->expire_date=Carbon::parse($request->l_start)->addMonths(1);
//            $driver->account-=$request->payment;
//        }
//
//        $driver->save();
//        $driver=Driver::find($driver->id);



        return $driver;
    }
    public function remove(Driver $driver)
    {
        $driver->delete();
        return 'deleted';

    }
    public function expire(Driver $driver){
        if($driver->l_end > Carbon::now() ){
            while ( $driver->expire_date <= Carbon::now())
            {
                $driver->account -=$driver->payment;
                $driver->expire_date=Carbon::parse($driver->expire_date)->addMonths(1);
            }
            $driver->save();
        }
    }
    public function status(Driver $driver){
      $status=[];
      $expire=$this->difference(Carbon::now(),Carbon::parse($driver->expire_date));
      if($driver->account < 0){
          $status[]="Qarzdor";
      }
      elseif ($expire <7){
          $status[]="To'lo'v ga ".$expire." kun qoldi!";
      }
      $litsence=$this->difference(Carbon::now(),Carbon::parse($driver->l_end));
      if(!$litsence){
          $status[]="Litsenziya Muddati Tugagan!";
      }
      if($litsence < 7 && $litsence){
          $status[]="Litsenziya Tugashiga ". $litsence ." kun qoldi!";
      }
        $c=$this->difference(Carbon::now(),Carbon::parse($driver->c_end));
        if(!$c){
            $status[]="Shartnoma Muddati Tugagan!";
        }
        if($c < 30 && $c){
            $status[]="Shartnoma Tugashiga ". $c ." kun qoldi!";
        }

        return $status;

    }
    public function difference( $timeNow, $timeCompared){

         if($timeNow->gte($timeCompared)){
             return 0;
         }
          return   $timeCompared->diffInDays($timeNow);
    }


}
