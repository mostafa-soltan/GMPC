<?php

namespace App\Http\Controllers\Admin;

use App\Models\Volume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VolumeController extends Controller
{
    public function index()
    {
        $volumes = Volume::orderBy('id', 'desc')->paginate(15);
        return view('admin.volumes.index', compact('volumes'));
    }

    public function create()
    {
        return view('admin.volumes.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'volume_no' => 'required|integer|min:1',
            'year' => 'required|integer|min:4',
        ];
        $this->validate($request, $roles);

        $volume = Volume::create($request->all());
       if ($volume) {
           return redirect('/admin/volumes')->withStatus('Volume Successfully Created.');
       }else{
           return redirect('/admin/volumes' . $volume->id . '/edit')->withStatus('Something Wrong!, Try Again');
       }
    }

    public function show($id)
    {
        //
    }

    public function edit(Volume $volume)
    {
        return view('admin.volumes.edit', compact('volume'));
    }

    public function update(Request $request, Volume $volume)
    {
        $roles = [
            'volume_no' => 'required|integer|min:1',
            'year' => 'required|integer|min:4',
        ];
        $this->validate($request, $roles);

        if ($volume->update($request->all())) {
            return redirect('/admin/volumes')->withStatus('Volume Successfully Updated.');
        }else{
            return redirect('/admin/volumes' . $volume->id . '/edit')->withStatus('Something Wrong!, Try Again');
        }
    }

    public function destroy(Volume $volume)
    {
        $volume->delete();
        return redirect('admin/volumes')->withStatus('Volume Successfully Deleted.');
    }
}
