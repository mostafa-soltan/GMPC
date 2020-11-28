<?php

namespace App\Http\Controllers\Admin;

use App\Models\Issue;
use App\Models\Journal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::orderBy('id', 'desc')->paginate(15);
        return view('admin.issues.index', compact('issues'));
    }

    public function create()
    {
        return view('admin.issues.create');
    }

    public function store(Request $request)
    {
        $roles = [
            'issue_no' => 'required|integer|min:1',
        ];
        $this->validate($request, $roles);

        $issue = Issue::create($request->all());
        if ($issue) {
            return redirect('admin/issues')->withStatus('Issue Successfully Created.');
        }else{
            return redirect('admin/issues/create')->withStatus('Something Wrong!, Try Again');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Issue $issue)
    {
        return view('admin.issues.edit', compact('issue'));
    }

    public function update(Request $request, Issue $issue)
    {
        $roles = [
            'issue_no' => 'required|integer|min:1',
        ];
        $this->validate($request, $roles);

        if ($issue->update($request->all())){
            return redirect('admin/issues')->withStatus('Issue Successfully Updated.');
        }else{
            return redirect('admin/issues' . $issue->id . '/edit')->withStatus('Issue Successfully Updated.');
        }
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect('admin/issues')->withStatus('Issue Successfully Deleted.');
    }
}
