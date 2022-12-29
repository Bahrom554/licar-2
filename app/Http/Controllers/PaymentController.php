<?php

namespace App\Http\Controllers;
//use Illuminate\Support\Facades\DB;
use App\Models\Branch;
use App\Models\Driver;
use App\Models\Payment;
use App\Models\User;
use App\UseCases\PaymentService;
use Carbon\Carbon;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PaymentController extends Controller
{
    private $service;
    public function __construct(PaymentService $service)
    {
        $this->service=$service;
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
       $this->service->create($request);
        return redirect()->route('drivers.show',$request->driver_id);
    }

    public function destroy(Payment $payment)
    {
       $this->service->remove($payment);
       return redirect()->back();
    }
    public function repo(){
        $branches=Branch::all();
        $users=User::all();
        return view('admin.drivers.repo',compact('branches','users'));
    }

    public function report(Request $request){
        $branches=Branch::all();
        $users=User::all();
        $query=$this->service->report($request);
        $sum=$query->sum('payments.account');
        $payments=$query->orderBy('payments.created_at','DESC')->with('user')->paginate(20);
        return view('admin.drivers.report',compact('request','sum','payments','branches','users'));
    }
}
