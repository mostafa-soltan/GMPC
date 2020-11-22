<?php

namespace App\Http\Controllers\User;

use App\Editor;
use App\Journal;
use App\Researchtopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JournalController extends Controller
{
    public function index(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            return view('user.journals.vet.vet_index', compact('journal'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            return view('user.journals.top.top_index', compact('journal'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            return view('user.journals.micro.micro_index', compact('journal'));
        }
    }

    public function scope(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            return view('user.journals.vet.vet_scope', compact('journal'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            return view('user.journals.top.top_scope', compact('journal'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            return view('user.journals.micro.micro_scope', compact('journal'));
        }
    }

    public function authorGuidLines(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            return view('user.journals.vet.vet_agl', compact('journal'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            return view('user.journals.top.top_agl', compact('journal'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            return view('user.journals.micro.micro_agl', compact('journal'));
        }
    }

    public function authorResources(Journal $journal)
    {
        if ($journal->name == 'German Journal Of Veterinary Research')
        {
            return view('user.journals.vet.vet_ares', compact('journal'));

        }elseif($journal->name == 'GMPC Thesis & Opinions Platform')
        {
            return view('user.journals.top.top_ares', compact('journal'));

        }elseif($journal->name == 'German Journal Of Microbiology')
        {
            return view('user.journals.micro.micro_ares', compact('journal'));
        }
    }

    public function editorialBoard(Journal $journal)
    {
        return view('user.journals.editorialboard', compact('journal'));
    }

    public function researchTopics(Journal $journal)
    {
        return view('user.journals.researchtopics', compact('journal'));
    }

    public function singleTopic(Journal $journal, Researchtopic $topic)
    {
        return view('user.journals.single_topic', compact('topic', 'journal'));
    }

}
