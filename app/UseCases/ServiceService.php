<?php

namespace App\UseCases;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceService
{
    public function create(Request $request)
    {

        $request->validate([
            'definition' => 'nullable|string|max:512',
            'service' => 'required|string',
            'driver_id' => 'required|integer|exists:drivers,id'
        ]);

        $service = Service::make($request->only('definition','service','driver_id'));
        $service->save();
        return $service;
    }

    public function edit( Request $request,Service $service)
    {
        $request->validate([
            'definition' => 'nullable|string|max:512',
            'service' => 'string',
            'driver_id' => 'integer|exists:drivers,id'
        ]);
        $service->update($request->only('definition','service','driver_id'));
        return $service;

    }

}
