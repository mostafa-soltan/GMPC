<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Author;
use App\Models\Issue;
use App\Models\Journal;
use App\Models\Keyword;
use App\Models\Volume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('id', 'desc')->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create(Request $request)
    {
            $file = $request->file('xml');
            $destinationPath = public_path('xmls');
            if (isset($file)){
                $fileextension = $file->getClientOriginalExtension();
                    if (strtolower($fileextension) == 'xml'){
                        $fileName = $file->getClientOriginalName();
                        $file->move($destinationPath,$fileName);
                        $getData = file_get_contents($destinationPath . DIRECTORY_SEPARATOR . $fileName);
                        $xml = new \SimpleXMLElement($getData);

                        return view('admin.articles.create', compact('xml'));
                    }else{
                        return redirect('admin/articles')->withStatus('This file format is not xml, Please select xml file format');
                    }
            }else{
                return redirect('admin/articles')->withStatus('You must select xml file format');
            }


    }

    public function store(Request $request)
    {
        $article = Article::create($request->all());
        return redirect('admin/articles')->withStatus('Article Successfully Created.');
    }

    public function show()
    {
        //
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect('admin/articles')->withStatus('Article Successfully Updated.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/admin/articles')->withStatus('Article Successfully Deleted.');
    }
}
