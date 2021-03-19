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

    public function index($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        $journalKey = 'journal_' . $journal->id;
        if (!Session::has($journalKey)){
            $journal->increment('views_count');
            Session::put($journalKey,1);
        }



        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $metaTitle = 'German Journal of Veterinary Research';
            $metaDescription = 'The German Journal of Veterinary Research is an international, peer-reviewed journal published by GMPC. for high quality and novel veterinary medicine research';
            $metaKeywords = '';

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

            return view('user.journals.vet.vet_index', compact('journal', 'volumes', 'issues', 'metaTitle', 'metaDescription', 'metaKeywords', 'submitLink',
                'article_1', 'article_2', 'article_3', 'article_4'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $metaTitle = 'Gmpc Thesis & Opinions Platform';
            $metaDescription = 'German Multidisciplinary Publishing Center is an internationalpublisher founded in Germany publishing high-quality journals and books in different aspects of sciences';
            $metaKeywords = '';

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

            return view('user.journals.top.top_index', compact('journal', 'volumes', 'issues', 'metaTitle', 'metaDescription', 'metaKeywords', 'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $metaTitle = 'German Journal of Microbiology';
            $metaDescription = 'The German Journal of Microbiology is an international, peer reviewedjournal published by GMPC. for all topics related to microbiology';
            $metaKeywords = '';

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';

            return view('user.journals.micro.micro_index', compact('journal', 'volumes', 'issues', 'metaTitle', 'metaDescription', 'metaKeywords', 'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));
        }
    }

    public function scope($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

            return view('user.journals.vet.vet_scope', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

            return view('user.journals.top.top_scope', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';

            return view('user.journals.micro.micro_scope', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));
        }
    }

    public function authorGuidLines($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

            return view('user.journals.vet.vet_agl', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'

            ));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

            return view('user.journals.top.top_agl', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';

            return view('user.journals.micro.micro_agl', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));
        }
    }

    public function authorResources($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

            return view('user.journals.vet.vet_ares', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

            return view('user.journals.top.top_ares', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            $volumes = Volume::all();
            $issues = Issue::all();

            $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
            $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
            $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
            $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';

            return view('user.journals.micro.micro_ares', compact(
                'journal',
                'volumes',
                'issues',
                'submitLink',
                'article_1',
                'article_2',
                'article_3',
                'article_4'
            ));
        }
    }

    public function editorialBoard($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        $volumes = Volume::all();
        $issues = Issue::all();

        $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
        $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
        $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
        $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

        if ($journal->name == 'German Journal Of Veterinary Research'){

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

        }elseif ($journal->name == 'GMPC Thesis & Opinions Platform'){

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

        }elseif ($journal->name == 'German Journal Of Microbiology'){

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';
        }

        $editors = $journal->editors;
        foreach ($editors as $editor){
            if ($editor->chief_in_editor == 1){
                $ch_topics = Editor::where('chief_in_editor', 1)->whereJournalId($journal->id)->get();
            }elseif ($editor->chief_in_editor == 0){
                $nor_editors = Editor::where('chief_in_editor', 0)->whereJournalId($journal->id)->get();
            }
        }

        return view('user.journals.editorialboard', compact(
            'journal',
            'volumes',
            'issues',
            'submitLink',
            'article_1',
            'article_2',
            'article_3',
            'article_4',
            'editors',
            'ch_topics',
            'nor_editors'
        ));
    }

    public function researchTopics($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        $volumes = Volume::all();
        $issues = Issue::all();

        $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
        $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
        $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
        $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

        if ($journal->name == 'German Journal Of Veterinary Research'){

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

        }elseif ($journal->name == 'GMPC Thesis & Opinions Platform'){

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

        }elseif ($journal->name == 'German Journal Of Microbiology'){

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';
        }

        return view('user.journals.researchtopics', compact(
            'journal',
            'volumes',
            'issues',
            'submitLink',
            'article_1',
            'article_2',
            'article_3',
            'article_4'
        ));
    }

    public function singleTopic($abbreviation, Researchtopic $topic)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        $volumes = Volume::all();
        $issues = Issue::all();

        $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
        $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
        $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
        $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

        if ($journal->name == 'German Journal Of Veterinary Research'){

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

        }elseif ($journal->name == 'GMPC Thesis & Opinions Platform'){

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

        }elseif ($journal->name == 'German Journal Of Microbiology'){

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';
        }

        return view('user.journals.single_topic', compact(
            'topic',
            'journal',
            'volumes',
            'issues',
            'submitLink',
            'article_1',
            'article_2',
            'article_3',
            'article_4'
        ));
    }

    public function articles($abbreviation)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        $volumes = Volume::all();
        $issues = Issue::all();

        $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
        $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
        $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
        $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

        if ($journal->name == 'German Journal Of Veterinary Research'){

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

        }elseif ($journal->name == 'GMPC Thesis & Opinions Platform'){

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

        }elseif ($journal->name == 'German Journal Of Microbiology'){

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';
        }

        return view('user.journals.articles', compact(
            'journal',
            'volumes',
            'issues',
            'submitLink',
            'article_1',
            'article_2',
            'article_3',
            'article_4'
        ));
    }

    public function singleArticle(Request $request, $abbreviation, Article $article)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        if ($request->get('download')){
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

        $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
        $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
        $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
        $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();

        if ($journal->name == 'German Journal Of Veterinary Research'){

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

        }elseif ($journal->name == 'GMPC Thesis & Opinions Platform'){

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

        }elseif ($journal->name == 'German Journal Of Microbiology'){

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';
        }

        return view('user.journals.single_article', compact(
            'article',
            'journal',
            'volumes',
            'issues',
            'submitLink',
            'article_1',
            'article_2',
            'article_3',
            'article_4'
        ));
    }

    public function issue($abbreviation, Volume $volume, Issue $issue)
    {
        $journal = Journal::where('abbreviation', $abbreviation)->firstOrFail();

        $volumes = Volume::all();
        $issues = Issue::all();

        $article_1 = Article::whereJournalId($journal->id)->whereIssue(1)->first();
        $article_2 = Article::whereJournalId($journal->id)->whereIssue(2)->first();
        $article_3 = Article::whereJournalId($journal->id)->whereIssue(3)->first();
        $article_4 = Article::whereJournalId($journal->id)->whereIssue(4)->first();



        if ($journal->name == 'German Journal Of Veterinary Research'){

            $submitLink = 'https://www.ejmanager.com/my/gjvr/index.php';

        }elseif ($journal->name == 'GMPC Thesis & Opinions Platform'){

            $submitLink = 'https://www.ejmanager.com/my/gto/index.php';

        }elseif ($journal->name == 'German Journal Of Microbiology'){

            $submitLink = 'https://www.ejmanager.com/my/gjm/index.php';
        }

        return view('user.journals.issue', compact('journal',
            'volume',
            'issue',
            'volumes',
            'issues',
            'submitLink',
            'article_1',
            'article_2',
            'article_3',
            'article_4'
        ));
    }

}
