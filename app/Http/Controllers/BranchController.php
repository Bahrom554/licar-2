<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use App\UseCases\PaymentService;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class BranchController extends Controller
{
   

     public function index(Request $request)
    {
        $query = QueryBuilder::for(Branch::class);
        $query->allowedAppends(!empty($request->append) ? explode(',', $request->get('append')) : []);
        $query->allowedIncludes(!empty($request->include) ? explode(',', $request->get('include')) : []);
        $query->orderBy('id', 'DESC');
        $branches = $query->paginate(30);

        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        

        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
         
        $validator=$request->validate([
            'name' => 'required|string|max:255',
            ]);

        Branch::create($request->only('name'));
        return redirect(route('branches.index'))->with('message', 'created successfully');
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',


        ]);
        $branch = Branch::findOrFail($id);
        $branch->update($request->only('name'));
        return redirect(route('branches.index'))->with('message', 'updated success');
    }


    public function destroy(Branch $branch)
    {
        $branch->delete();
        return  redirect(route('branches.index'))->with('message', 'deleted');
    }


}
