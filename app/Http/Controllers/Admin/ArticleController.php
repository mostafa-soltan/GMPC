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
        $article = new Article();
        $pdf_file = $request->file('pdf_file');
        if ($pdf_file){

            $pdf_filename = $pdf_file->getClientOriginalName();
            $pdf_filename = explode('.', $pdf_filename);
            $pdf_filename = $pdf_filename[0];
            $pdf_extension = $pdf_file->getClientOriginalExtension();
            $pdf_file_to_store = time() . '_' . $pdf_filename . '.' . $pdf_extension;

            $pdf_file->move('articles', $pdf_file_to_store);

            $article->pdf_file = $pdf_file_to_store;
        }
        $article->title = $request->title;
        $article->abstract = $request->abstract;
        $article->publication_date = $request->publication_date;
        $article->journal_id = $request->journal_id;
        $article->volume = $request->volume;
        $article->issue = $request->issue;
        $article->year = $request->year;
        $article->rtopic_id = $request->rtopic_id;
        $article->status = $request->status;
        $article->start_page = $request->start_page;
        $article->end_page = $request->end_page;
        $article->doi = $request->doi;
        $article->authors = $request->authors;
        $article->keywords = $request->keywords;

        $article->save();
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
        $article->update([
            'title' => $request['title'],
            'abstract' => $request['abstract'],
            'publication_date' => $request['publication_date'],
            'journal_id' => $request['journal_id'],
            'volume' => $request['volume'],
            'issue' => $request['issue'],
            'year' => $request['year'],
            'rtopic_id' => $request['rtopic_id'],
            'status' => $request['status'],
            'start_page' => $request['start_page'],
            'end_page' => $request['end_page'],
            'doi' => $request['doi'],
            'authors' => $request['authors'],
            'keywords' => $request['keywords'],
        ]);

        $pdf_file = $request->file('pdf_file');
        if ($pdf_file){
            $pdf_filename = $pdf_file->getClientOriginalName();
            $pdf_filename = explode('.', $pdf_filename);
            $pdf_filename = $pdf_filename[0];
            $pdf_extension = $pdf_file->getClientOriginalExtension();
            $pdf_file_to_store = time() . '_' . $pdf_filename . '.' . $pdf_extension;

            if ($pdf_file->move('articles', $pdf_file_to_store)){
                if ($article->pdf_file){
                    unlink('articles/' . $article->pdf_file);
                    $article->update([
                       'pdf_file' => $pdf_file_to_store,
                    ]);
                }
            }

        }
        return redirect('admin/articles')->withStatus('Article Successfully Updated.');
    }

    public function destroy(Article $article)
    {
        if ($article->pdf_file){
            unlink('articles/' . $article->pdf_file);
        }
        $article->delete();
        return redirect('/admin/articles')->withStatus('Article Successfully Deleted.');
    }
}
