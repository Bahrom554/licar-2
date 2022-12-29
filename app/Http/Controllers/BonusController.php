<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\UseCases\BonusService;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class BonusController extends Controller
{
    private $service;
    public function __construct(BonusService $service)
    {
        $this->service=$service;
    }

    public function store(Request $request)
    {
        $bonus=$this->service->create($request);
        return redirect()->back()->with('message',$bonus->bonus.' bo\'nus qo\'shildi');

    }
    public function update(Request $request, Bonus $bonus)
    {
        $bonus=$this->service->edit($request,$bonus);
        return redirect()->back()->with('message',' bo\'nus o\'zgartirildi');

    }
    public function destroy(Bonus $bonus)
    {
        $this->service->remove($bonus);
        return redirect()->back()->with('message',' bo\'nus o\'chirildi');
    }

}
