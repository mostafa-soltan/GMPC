<?php

namespace App\Http\Controllers\Admin;

use App\Models\Editor;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditorController extends Controller
{
    public function index()
    {
        $editors = Editor::orderBy('id', 'desc')->paginate(15);
        return view('admin.editors.index', compact('editors'));
    }

    public function create()
    {
        return view('admin.editors.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'name' => 'required|min:3|max:20',
            'affiliation' => 'required|min:3|max:250',
            'chief_in_editor' => 'required|integer|in:0,1,2',
            'topic' => 'max:200',
            'journal_id' => 'required|integer',
        ];
        $this->validate($request, $roles);

        $editor = Editor::create($request->all());

        if ($editor) {
            // Insert Photo
            $file = $request->file('image');
            if($file) {
                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

                if ($file->move('images', $file_to_store)) {
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $editor->id,
                        'photoable_type' => 'App\Models\Editor',
                    ]);
                }
            }
        }

        return redirect('/admin/editors')->withStatus('Editor successfully Created.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Editor $editor)
    {
        return view('admin.editors.edit', compact('editor'));
    }

    public function update(Request $request, Editor $editor)
    {
        $roles = [
            'name' => 'required|min:3|max:20',
            'affiliation' => 'required|min:3|max:250',
            'chief_in_editor' => 'required|integer|in:0,1,2',
            'topic' => 'max:200',
            'journal_id' => 'required|integer',
        ];
        $this->validate($request, $roles);

        $editor->update($request->all());

        $file = $request->input('image');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $fileextension = $file->getClientOriginalExtension();
            $file_to_store  = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

            if($file->move('images', $file_to_store)) {
                if($editor->photo) {
                    $photo = $editor->photo;
                    $filename = $photo->filename;
                    unlink('images/' . $filename);
                    $photo->filename = $file_to_store;
                    $photo->save();
                }else{
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $editor->id,
                        'photoable_type' => 'App\Models\Editor',
                    ]);
                }
            }
        }

        return redirect('/admin/editors')->withStatus('Editor Successfully Updated.');

    }

    public function destroy(Editor $editor)
    {
        if ($editor->photo) {
            $filename = $editor->photo->filename;

            // delete photo from server
            unlink('images/' . $filename);
        }

        // delete photo from database
//        $editor->photo->delete();

        $editor->delete();
        return redirect('/admin/editors')->withStatus('Editor Successfully Deleted.');
    }
}
