<?php

namespace App\Http\Controllers\Admin;

use App\Photo;
use App\Researchtopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResearchtopicController extends Controller
{
    public function index()
    {
        $rtopics = Researchtopic::orderBy('id', 'desc')->paginate(12);
        return view('admin.rtopics.index', compact('rtopics'));
    }

    public function create()
    {
        return view('admin.rtopics.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'title' => 'required|min:10|max:250',
            'overview' => 'required|min:10|max:2000',
            'editor1' => 'min:3|max:100',
            'editor2' => 'min:3|max:100',
            'editor3' => 'min:3|max:100',
            'editor4' => 'min:3|max:100',
            'journal_id' => 'required|integer',
        ];
        $this->validate($request, $roles);

        $rtopic = Researchtopic::create($request->all());

        $file = $request->file('image');
        if ($file){
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

            if ($file->move('images', $file_to_store)){
                Photo::create([
                    'filename' => $file_to_store,
                    'photoable_id' => $rtopic->id,
                    'photoable_type' => 'App\Researchtopic',
                ]);
            }
        }
        return redirect('/admin/rtopics')->withstatus('Topic Successfully Created.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Researchtopic $rtopic)
    {
        return view('admin.rtopics.edit', compact('rtopic'));
    }

    public function update(Request $request, Researchtopic $rtopic)
    {
        $roles = [
            'title' => 'required|min:10|max:250',
            'overview' => 'required|min:10|max:2000',
            'editor1' => 'min:3|max:20',
            'editor2' => 'min:3|max:20',
            'editor3' => 'min:3|max:20',
            'editor4' => 'min:3|max:20',
            'journal_id' => 'required|integer',
        ];
        $this->validate($request, $roles);

        $rtopic->update($request->all());

        $file = $request->file('image');
        if ($file){
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

            if ($file->move('images', $file_to_store)){
                if ($rtopic->photo){
                     $photo = $rtopic->filename;
                    $filename = $photo->filename;
                    unlink('images/' . $filename);
                    $photo->filename = $file_to_store;
                    $photo->save();
                }else{
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $rtopic->id,
                        'photoable_type' => 'App\Researchtopic',
                    ]);
                }
            }
        }
        return redirect('/admin/rtopics')->withStatus('Topic Successfully Updated.');
    }

    public function destroy(Researchtopic $rtopic)
    {
        if ($rtopic->photo){
            $filename = $rtopic->photo->filename;
            unlink('images/' . $filename);
        }

        $rtopic->photo->delete();
        $rtopic->delete();
        return redirect('/admin/rtopics')->withStatus('Topic Successfully Deleted.');
    }
}
