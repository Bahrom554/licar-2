<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Car;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = QueryBuilder::for(Car::class);
        $query->allowedAppends(!empty($request->append) ? explode(',', $request->get('append')) : []);
        $query->allowedIncludes(!empty($request->include) ? explode(',', $request->get('include')) : []);
        $query->orderBy('id', 'DESC')->with('drivers');
        $cars = $query->paginate(30);

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {

        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:cars',
        ]);
        Car::create($request->only('name'));
        return redirect(route('cars.index'))->with('message', 'created successfully');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255|unique:cars,name,'.$id,


        ]);
        $car = Car::findOrFail($id);
        $car->update($request->only('name'));
        return redirect(route('cars.index'))->with('message', 'updated success');
    }


    public function destroy(Car $car)
    {
        $car->delete();
        return  redirect(route('cars.index'))->with('message', 'deleted');
    }

}
