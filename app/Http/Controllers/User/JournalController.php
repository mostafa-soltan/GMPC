<?php

namespace App\Http\Controllers\User;

use App\Models\Article;
use App\Models\Editor;
use App\Models\Issue;
use App\Models\Journal;
use App\Models\Researchtopic;
use App\Models\Volume;
use http\Url;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\See;

class JournalController extends Controller
{
    public function index(Journal $journal)
    {
        $journalKey = 'journal_' . $journal->id;
        if (!Session::has($journalKey)){
            $journal->increment('views_count');
            Session::put($journalKey,1);
        }

        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.vet.vet_index', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.top.top_index', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.micro.micro_index', compact('journal', 'volumes', 'issues'));
        }
    }

    public function scope(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.vet.vet_scope', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.top.top_scope', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.micro.micro_scope', compact('journal', 'volumes', 'issues'));
        }
    }

    public function authorGuidLines(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.vet.vet_agl', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.top.top_agl', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.micro.micro_agl', compact('journal', 'volumes', 'issues'));
        }
    }

    public function authorResources(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.vet.vet_ares', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.top.top_ares', compact('journal', 'volumes', 'issues'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();
            return view('user.journals.micro.micro_ares', compact('journal', 'volumes', 'issues'));
        }
    }

    public function editorialBoard(Journal $journal)
    {
        $volumes = Volume::all();
        $issues = Issue::all();
        return view('user.journals.editorialboard', compact('journal', 'volumes', 'issues'));
    }

    public function researchTopics(Journal $journal)
    {
        $volumes = Volume::all();
        $issues = Issue::all();
        return view('user.journals.researchtopics', compact('journal', 'volumes', 'issues'));
    }

    public function singleTopic(Journal $journal, Researchtopic $topic)
    {

        $volumes = Volume::all();
        $issues = Issue::all();
        return view('user.journals.single_topic', compact('topic', 'journal', 'volumes', 'issues'));
    }

    public function articles(Journal $journal)
    {
        $volumes = Volume::all();
        $issues = Issue::all();
        return view('user.journals.articles', compact('journal', 'volumes', 'issues'));
    }

    public function singleArticle(Request $request, Journal $journal, Article $article)
    {
        if ($request->get('submit')){
            DB::table('articles')
                ->where(['id' => $article->id])
                ->update(['downloads_count' => $article->downloads_count + 1]);
        }

        $articleKey = 'article_' . $article->id;
        if (!Session::has($articleKey)){
            $article->increment('views_count');
            Session::put($articleKey,1);
        }

        $volumes = Volume::all();
        $issues = Issue::all();
        return view('user.journals.single_article', compact('article', 'journal', 'volumes', 'issues'));
    }

    public function issue(Journal $journal, Volume $volume, Issue $issue)
    {
        $volumes = Volume::all();
        $issues = Issue::all();
        return view('user.journals.issue', compact('journal', 'volume', 'issue', 'volumes', 'issues'));
    }

}
