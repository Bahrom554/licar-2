<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Driver;

class DriverController extends Controller
{
  public  function getAll(){
       $drivers = Driver::paginate(100);
      return response()->json(['drivers' => $drivers])->setStatusCode(200);
  }
}
