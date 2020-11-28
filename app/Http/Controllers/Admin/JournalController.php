<?php

namespace App\Http\Controllers\Admin;

use App\Models\Journal;
use App\Models\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function index()
    {
        $journals = Journal::orderBy('id', 'desc')->paginate(4);
        return view('admin.journals.index', compact('journals'));
    }

    public function create()
    {
        return view('admin.journals.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'name' => 'required|min:10|max:250',
            'issn' => 'required',
            'status' => 'required|integer|in:0,1',
        ];

        $this->validate($request, $roles);

        $journal = Journal::create($request->all());

        if ($journal) {
            // Insert Photo
            $file = $request->file('image');
            if($file) {
                $filename = $file->getClientOriginalName();
                $fileextension = $file->getClientOriginalExtension();
                $file_to_store = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

                if ($file->move('images', $file_to_store)) {
                    Photo::create([
                       'filename' => $file_to_store,
                        'photoable_id' => $journal->id,
                        'photoable_type' => 'App\Journal',
                    ]);
                }
            }
        }

        return redirect('/admin/journals')->withStatus('Journal Created Successfully.');
    }

    public function show($id)
    {
        //
    }

    public function edit(Journal $journal)
    {
        return view('admin.journals.edit', compact('journal'));
    }

    public function update(Request $request, Journal $journal)
    {
       $roles = [
           'name' => 'required|min:10|max:250',
           'issn' => 'required',
           'status' => 'required|integer|in:0,1',
       ];

       $this->validate($request, $roles);

       $journal->update($request->all());

       $file = $request->file('image');
       if ($file) {
           $filename = $file->getClientOriginalName();
           $fileextension = $file->getClientOriginalExtension();
           $file_to_store  = time() . '_' . explode('.', $filename)[0] . '.' . $fileextension;

           if($file->move('images', $file_to_store)) {
               if($journal->photo) {
                   $photo = $journal->photo;
                   $filename = $photo->filename;
                   unlink('images/' . $filename);
                   $photo->filename = $file_to_store;
                   $photo->save();
               }else{
                    Photo::create([
                        'filename' => $file_to_store,
                        'photoable_id' => $journal->id,
                        'photoable_type' => 'App\Journal',
                    ]);
               }
           }
       }
       return redirect('/admin/journals')->withStatus('Journal Successfully Updated.');
    }

    public function destroy(Journal $journal)
    {
        if ($journal->photo) {
            $filename = $journal->photo->filename;

            // delete photo from server
            unlink('images/' . $filename);
        }

        // delete photo from database
        $journal->photo->delete();
        $journal->delete();
        return redirect('/admin/journals')->withStatus('Journal Successfully Deleted.');
    }

}
