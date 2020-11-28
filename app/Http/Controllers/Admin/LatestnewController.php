<?php

namespace App\Http\Controllers\Admin;


use App\Models\Lnew;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LatestnewController extends Controller
{
    public function index()
    {
        $lnews = Lnew::orderBy('id', 'desc')->paginate(6);
        return view('admin.lnews.index', compact('lnews'));
    }

    public function create()
    {
        return view('admin.lnews.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'title' => 'required|min:10|max:200',
            'body' => 'required|min:100',
            'author' => 'required|min:3|max:50',
            'publish_date' => 'required|date',
        ];
        $this->validate($request, $roles);

        $lnew = Lnew::create($request->all());

        // Insert Photo
        if ($lnew) {
            $file = $request->file('image');
            if ($file) {
                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

                if ($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $lnew->id,
                        'photoable_type' => 'App\Lnew',
                    ]);
                }
            }
        }

        return redirect('/admin/lnews')->withStatus('Latest New Successfully Created.');
    }

    public function show(Lnew $lnews)
    {
         //
    }

    public function edit(Lnew $lnews)
    {
       return view('admin.lnews.edit', compact('lnews'));
    }

    public function update(Request $request, Lnew $lnews)
    {
        $roles = [
            'title' => 'required|min:10|max:200',
            'body' => 'required|min:100',
            'author' => 'required|min:3|max:50',
            'publish_date' => 'required|date',
        ];
        $this->validate($request, $roles);

        $lnews->update($request->all());

        $file = $request->file('image');
        if ($file){
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

            if ($file->move('images', $file_to_store)){
                if ($lnews->photo){
                    $photo = $lnews->photo;
                    $filename = $photo->filename;
                    unlink('images/' . $filename);
                    $photo->filename = $file_to_store;
                    $photo->save();
                }else{
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $lnews->id,
                        'photoable_type' => 'App\Lnew',
                    ]);
                }
            }
        }

        return redirect('/admin/lnews')->withStatus('New Successfully Updated.');
    }

    public function destroy(Lnew $lnews)
    {
        if ($lnews->photo){
            $filename = $lnews->photo->filename;

            // delete image from server
            unlink('images/' . $filename);
        }

        // delete image from database
        $lnews->photo->delete();
        $lnews->delete();
        return redirect('/admin/lnews')->withStatus('New Successfully Deleted.');
    }
}
