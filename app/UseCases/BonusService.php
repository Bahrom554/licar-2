<?php

namespace App\UseCases;

use App\Models\Bonus;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BonusService
{
    public function create(Request $request)
    {

        $request->validate([
            'reason' => 'nullable|string|max:512',
            'bonus' => 'required|integer',
            'driver_id' => 'required|integer|exists:drivers,id'
        ]);
        $bonus = Bonus::make($request->only('reason','bonus','driver_id'));
        DB::beginTransaction();
        try {
            $driver = Driver::findOrFail($request->driver_id);
            $driver->account += $request->bonus;
            $driver->save();
            $bonus->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return  $e->getMessage();
        }
        return $bonus;
    }

    public function edit( Request $request,Bonus $bonus)
    {
        $request->validate([
            'reason' => 'nullable|string|max:512',
            'bonus' => 'integer',
            'driver_id' => 'integer|exists:drivers,id'
        ]);

        DB::beginTransaction();
        try {
            $driver = Driver::findOrFail($bonus->driver_id);
            $driver->account += ($request->account - $bonus->bonus);
            $driver->save();
            $bonus->update($request->only('reason','bonus','driver_id'));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
        return $bonus;
    }

    public function remove(Bonus  $bonus)
    {
        DB::beginTransaction();
        try {
            $driver = Driver::findOrFail($bonus->driver_id);
            $driver->account -= $bonus->bonus;
            $driver->save();
            $bonus->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return 'deleted';
    }
}
