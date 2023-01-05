<?php

namespace App\Http\Controllers;


use App\Http\Requests\DriverCreateRequest;
use App\Http\Requests\DriverEditRequest;
use App\Models\Branch;
use App\Models\Car;
use App\Models\Driver;
use App\Models\Payment;
use App\UseCases\BonusService;
use App\UseCases\DriverService;
use App\UseCases\PaymentService;
use App\UseCases\ServiceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class DriverController extends Controller
{
    private $service;


    public function __construct(DriverService $service)
    {
        $this->service=$service;

    }

    public function index(Request $request){
        $branches=Branch::all();
        $branch_id=$request->get('branch_id');
        $status=$request->get('status');
        $query=$this->service->index($request);
        $drivers = $query->paginate(30);
      return view('admin.drivers.index', compact('drivers','branches','branch_id','status'));
  }

    public function create()
    {
        $branches=Branch::all();
        $cars=Car::all();
        return view('admin.drivers.create', compact('branches','cars'));
    }

    public function store(DriverCreateRequest $request)
    {
        $response=$this->service->create($request);
         return $response[0] ? redirect(route('drivers.show',$response[0]))->with('message', 'created successfully') : redirect()->back()->withErrors($response[1]);
    }


    public function show(Driver $driver)
    {
        $branches=Branch::all();
        $cars=Car::all();
        $status=$this->service->status($driver);
        $this->service->expire($driver);
        return view('admin.drivers.show', compact('driver','branches','cars','status' ));

    }


    public function edit(Driver $driver)
    {
        $branches=Branch::all();
        $cars=Car::all();
        return view('admin.drivers.edit', compact('driver','branches', 'cars'));
    }

    public function update(DriverEditRequest $request, Driver $driver)
    {
        $driver=$this->service->edit($driver,$request);
        return redirect(route('drivers.show',$driver->id))->with('message', 'updated success');
    }


    public function destroy(Driver $driver)
    {
       $this->service->remove($driver);
       return redirect()->route('drivers.index');
    }


    public function search(Request $request)
    {
        if ($value = $request->get('search')) {
            $drivers = Driver::where('driver', 'like', '%' . $value . '%')
                ->orWhere('owner', 'like', '%' . $value . '%')
                ->orWhere('tel_d', 'like', '%' . $value . '%')
                ->orWhere('tel_o', 'like', '%' . $value . '%')
                ->orWhere('car_number', 'like', '%' . $value . '%')
                ->get();
            return response()->json([
                'view' => view('admin.drivers.search', compact('drivers'))->render()
            ]);

        }
        else {
            $drivers = Driver::where('id', '<', -1)->get();
            return response()->json(["view"=>""]);
        }
    }









































}
