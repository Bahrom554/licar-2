<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\UseCases\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $service;
    public function __construct(ServiceService $service)
    {
        $this->service=$service;
    }

    public function store(Request $request)
    {
        $service=$this->service->create($request);
        return redirect()->back()->with('message',$service->service.' service qo\'shildi');

    }
    public function update(Request $request, Service $service)
    {
        $service=$this->service->edit($request,$service);
        return redirect()->back()->with('message',' service o\'zgartirildi');

    }
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('message',' service o\'chirildi');
    }
}
