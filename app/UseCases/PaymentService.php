<?php

namespace App\UseCases;

use App\Models\Driver;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;

class PaymentService
{
    public function create(Request $request,$first=0)
    {
            if(!$first){
                $request->validate([
                    'account' => 'required|integer',
                    'driver_id' => 'required|integer|exists:drivers,id',
                    'type' => 'required|integer|min:1|max:3'
                ]);
            }


        $payment = Payment::make($request->only('account','driver_id','type'));
        DB::beginTransaction();
        try {
           if(!$first){
               $driver = Driver::findOrFail($request->driver_id);
               $driver->account += $request->account;
               $driver->save();
           }
           $payment->user_id=Auth::id();
            $payment->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return  $e->getMessage();
        }
        return $payment;
    }

    public function edit(Request $request, Payment $payment)
    {
        $request->validate([
            'account' => 'integer',
            'type' => 'integer|min:1|max:3'
        ]);
        DB::beginTransaction();
        try {
            $driver = Driver::findOrFail($payment->driver_id);
            $driver->account += ($request->account - $payment->account);
            $payment->user_id=Auth::id();
            $driver->save();
            $payment->update($request->only('account','driver_id','type'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return [0, $e->getMessage()];
        }
        return [$payment];
    }
    public function remove(Payment $payment)
    {
        DB::beginTransaction();
        try {
            $driver = Driver::findOrFail($payment->driver_id);
            $driver->account -= $payment->account;
            $driver->save();
            $payment->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function report(Request $request){
        $query=QueryBuilder::for(Payment::class)->leftJoin('drivers','payments.driver_id','=','drivers.id')->select('payments.*','drivers.driver');
        if($request->branch_id){
            $query->where('drivers.branch_id',$request->branch_id);
        }
        if($request->user_id){
            $query->where('payments.user_id',$request->user_id);
        }
        if($request->type){
            $query->where('payments.type',$request->type);
        }
        $query->whereBetween('payments.created_at',[$request->from,$request->to]);

        return $query;


    }
}
