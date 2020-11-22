<?php

namespace App\Http\Controllers\Admin;

use App\Editor;
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
            'chief_in_editor' => 'required|integer|in:0,1',
            'journal_id' => 'required|integer',
        ];
        $this->validate($request, $roles);

        $editor = Editor::create($request->all());
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
            'chief_in_editor' => 'required|integer|in:0,1',
            'journal_id' => 'required|integer',
        ];
        $this->validate($request, $roles);

        $editor->update($request->all());

        return redirect('/admin/editors')->withStatus('Editor Successfully Updated.');

    }

    public function destroy(Editor $editor)
    {
        $editor->delete();
        return redirect('/admin/editors')->withStatus('Editor Successfully Deleted.');
    }
}
