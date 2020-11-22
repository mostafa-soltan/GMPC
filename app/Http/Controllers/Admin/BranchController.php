<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::orderBy('id', 'desc')->paginate(5);
        return view('admin.branches.index', compact('branches'));
    }

    public function create()
    {
        return view('admin.branches.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'title' => 'required|min:5|max:150',
            'address' => 'required|min:5|max:150',
            'phone' => 'required|min:3|max:20',
            'email' => 'required|email',
        ];
        $this->validate($request, $roles);

        $branch = Branch::create($request->all());
        return redirect('/admin/branches')->withStatus('Branch Successfully Created.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Branch $branch)
    {
        return view('admin.branches.edit', compact('branch'));
    }

    public function update(Request $request, Branch $branch)
    {
        $roles = [
            'title' => 'required|min:5|max:150',
            'address' => 'required|min:5|max:150',
            'phone' => 'required|min:3|max:20',
            'email' => 'required|email',
        ];
        $this->validate($request, $roles);

        $branch->update($request->all());
        return redirect('/admin/branches')->withStatus('Branch Successfully Updated.');
    }

    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect('/admin/branches')->withStatus('Branch Successfully Deleted.');
    }
}
