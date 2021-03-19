<?php
use App\Models\Article;
use App\Models\Editor;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

$active_journals = Journal::orderBy('id', 'asc')->where('status', 1)->get();
$topic_editors = Editor::where('chief_in_editor', 2)->whereJournalId($journal->id)->get();
?>

@extends('layouts.user_layout')
@section('content')
    <header>
        <nav class="navbar navbar-expand-lg navbar-ligh bg-light">
            <div class="container">
                <button class=" navbar-toggler m-auto tog-icon" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Journals
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @if($active_journals->count())
                                    @foreach($active_journals as $active_journal)
                                        <a class="dropdown-item" href="{{ route('journal', $active_journal->abbreviation) }}">{{ $active_journal->name }}</a>
                                    @endforeach
                                @else
                                    <p class="dropdown-item" href="#">No Journals Found.</p>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allnews') }}">Latest News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact Us</a>
                        </li>
                    </ul>
                    <a href="{{ $submitLink }}" target="blank"  class="btn btn-primary mr-2">SUBMIT</a>
                    <form action="{{ route('search') }}" method="get" class="form-inline my-2 my-lg-0 relative">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" />
                        <button class="btn my-2 my-sm-0 absolute" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <div class="logo">
        </div>
        <nav class="navbar navbar-expand-lg navbar-ligh bg-light">
            <div class="container">
                <button class=" navbar-toggler m-auto tog-icon" type="button" data-toggle="collapse"
                        data-target="#J-navbar" aria-controls="J-navbar" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="J-navbar">
                    <ul class="navbar-nav m-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('journal', $journal->abbreviation) }}">Journal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('scope', $journal->abbreviation) }}">Aims & Scope</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('articles', $journal->abbreviation) }}">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('researchtopics', $journal->abbreviation) }}">Research Topics</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                For Authors
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('agl', $journal->abbreviation) }}">Author guidlines</a>
                                <a class="dropdown-item" href="{{ route('ares', $journal->abbreviation) }}">Author resources</a>
                                <a class="dropdown-item" href="{{ $submitLink }}" target="blank">Submit</a>
                            </div>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-uppercase" href="{{ route('editorialboard', $journal->abbreviation) }}">editorial board <span class="sr-only">(current)</span></a>
                        </li>
                        <div class="social">
                            <a href="https://www.facebook.com/GMPC-104059058151398/?ti=as" title="Facebook"
                               target="blank"><i class="fab fa-facebook-square"></i></a>
                            <a href="https://twitter.com/GmpcPublisher?s=08" title="Twitter" target="blank"><i
                                    class="fab fa-twitter-square"></i></a>
                            <a href="https://www.linkedin.com/groups/12470976/" title="LinkedIn" target="balnk"><i
                                    class="fab fa-linkedin"></i></a>

                            <a href="#" title="Publons" target="blank"><i class="fas fa-parking"></i></a>
                        </div>
                    </ul>
                    <!-- <a href="https://www.ejmanager.com/my/gjvr/index.php" target="blank"  class="btn btn-primary mr-2">SUBMIT</a> -->
                </div>

            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row pt-5">
                <div class="col-md-3">
                    <aside>
                        <div class="effect3">
                            @if($journal->photo)
                                <img src="/images/{{ $journal->photo->filename }}" alt="journal-cover" class="img-fluid img-thumbnail">
                            @else
                                <img src="/images/default.jpg" alt="journal-cover" class="img-fluid img-thumbnail">
                            @endif
                        </div>
                        @if(count($volumes))
                            <div class="volumes mt-3 p-2 effect3">
                                <h5>Browse volumes </h5>
                                @foreach($volumes as $jvolume)
                                    <p class="vol-btn">
                                        <button class="btn btn-info" type="button" data-toggle="collapse"
                                                data-target="#collapseExample{{ $jvolume->volume_no }}" aria-expanded="false"
                                                aria-controls="collapseExample">
                                            Vol. {{ $jvolume->volume_no }} ({{ $jvolume->year }}) <i class="fas fa-plus fa-minus"></i>
                                        </button>
                                    </p>
                                    <div class="collapse" id="collapseExample{{ $jvolume->volume_no }}">
                                        @if(count($issues))
                                            <div class="card card-body">
                                                <ul>
                                                    @foreach($issues as $jissue)
                                                        @if(isset($article_1) && $article_1->issue == $jissue->issue_no)
                                                            <li><a href="/journal/{{ $journal->abbreviation }}/volume/{{ $jvolume->volume_no }}/issue/{{ $jissue->issue_no }}">Issue {{ $jissue->issue_no }}</a></li>
                                                        @elseif(isset($article_2) && $article_2->issue == $jissue->issue_no)
                                                            <li><a href="/journal/{{ $journal->abbreviation }}/volume/{{ $jvolume->volume_no }}/issue/{{ $jissue->issue_no }}">Issue {{ $jissue->issue_no }}</a></li>
                                                        @elseif(isset($article_3) && $article_3->issue == $jissue->issue_no)
                                                            <li><a href="/journal/{{ $journal->abbreviation }}/volume/{{ $jvolume->volume_no }}/issue/{{ $jissue->issue_no }}">Issue {{ $jissue->issue_no }}</a></li>
                                                        @elseif(isset($article_4) && $article_4->issue == $jissue->issue_no)
                                                            <li><a href="/journal/{{ $journal->abbreviation }}/volume/{{ $jvolume->volume_no }}/issue/{{ $jissue->issue_no }}">Issue {{ $jissue->issue_no }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <p>No Issues Found.</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>No Volumes Found.</p>
                        @endif
                        <div class="numbers mt-3 p-2 mb-3 effect3">
                            <h5>Journal Metrics </h5>
                            <div class="pl-3">
                                <div class="counter"><span class="timer" data-from="0" data-to="{{ $journal->views_count }}" data-speed="5000"
                                                           data-refresh-interval="50">{{ $journal->views_count }}</span> Visitors </div>
                                <!--<div class="counter"><span class="timer" data-from="0" data-to="100" data-speed="5000"
                                                           data-refresh-interval="50">0</span> Article Views </div>-->
                                <!--<div class="counter"><span class="timer" data-from="0" data-to="100" data-speed="5000"
                                                           data-refresh-interval="50">0</span> Article Downloads </div>-->
                            </div>
                        </div>
                    </aside>
                </div>
{{--                <div class="col-md-9">--}}
{{--                    <article>--}}
{{--                        <div>--}}
{{--                            <h5 class="head pl-2">Editors-in-Chief </h5>--}}
{{--                            @if(count($journal->editors))--}}
{{--                                <ul>--}}
{{--                                    @foreach($journal->editors as $editor)--}}
{{--                                    <?php--}}
{{--                                    if ($editor->chief_in_editor == 1)--}}
{{--                                        {--}}
{{--                                            echo '<li><p><strong>' . $editor->name . '</strong> <br>' . $editor->affiliation . '</p></li>';--}}
{{--                                        }--}}
{{--                                    ?>--}}
{{--                                    @endforeach--}}
{{--                                </ul>--}}
{{--                            @else--}}
{{--                                <p>No Editors Found.</p>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h5 class="head pl-2">Editors </h5>--}}
{{--                            <div class="row">--}}
{{--                                @if(count($journal->editors))--}}
{{--                                @foreach($journal->editors as $editor)--}}

{{--                                            <?php--}}
{{--                                                if ($editor->chief_in_editor == 0)--}}
{{--                                                {--}}
{{--                                                    echo '<div class="col-md-6">--}}
{{--                                                              <ul>--}}
{{--                                                                 <li>--}}
{{--                                                                    <p><strong>' . $editor->name . '</strong> <br>' . $editor->affiliation . '</p>--}}
{{--                                                                 </li>--}}
{{--                                                               </ul>--}}
{{--                                                          </div>';--}}
{{--                                                }--}}
{{--                                            ?>--}}

{{--                                @endforeach--}}
{{--                                @else--}}
{{--                                    <p>No Editors Found.</p>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}

                <div class="col-md-9 E-board">
                    <article>
                        <div>
                            <h5 class="head pl-2 mb-4">Editors-in-Chief</h5>
                            @if($ch_topics)
                                <div class="row E-chief  text-center">
                                    @foreach($ch_topics as $ch_topic)
                                    <div class="col-md-6">
                                        <div class="card">
                                            @if($ch_topic->photo)
                                                <img src="/images/{{ $ch_topic->photo->filename }}" class="rounded-circle" alt="editor-picture">
                                            @else
                                                <img src="/images/default.jpg" alt="news-picture" class="rounded-circle" alt="editor-picture">
                                            @endif
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $ch_topic->name }}</h5>
                                                <p class="card-text">{{ $ch_topic->affiliation }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No Editors-in-Chief Found!</p>
                            @endif
                        </div>
                        <div>
                            <h5 class="head pl-2">Topic Editors</h5>
                            @if(count($topic_editors))
                                <div class="row pt-4  text-center">
                                    @foreach($topic_editors as $topic_editor)
                                        <div class="col-md-6">
                                            <div class="card">
                                                @if($topic_editor->photo)
                                                    <img src="/images/{{ $topic_editor->photo->filename }}" class="rounded-circle" alt="editor-picture">
                                                @else
                                                    <img src="/images/default.jpg" class="rounded-circle" alt="editor-picture">
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $topic_editor->name }}</h5>
                                                    <p class="card-text">{{ $topic_editor->affiliation }} <br>{{ $topic_editor->topic }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No Topic Editors Found!</p>
                            @endif
                        </div>
                        <div>
                            <h5 class="head pl-2">Editorial Board </h5>
                            @if(count($nor_editors))
                                <div class="row text-center pt-4">
                                    @foreach($nor_editors as $nor_editor)
                                        <div class="col-md-6">
                                            <div class="card">
                                                @if($nor_editor->photo)
                                                    <img src="/images/{{ $nor_editor->photo->filename }}" class="rounded-circle" alt="editor-picture">
                                                @else
                                                    <img src="/images/default.jpg" class="rounded-circle" alt="editor-picture">
                                                @endif
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $nor_editor->name }}</h5>
                                                    <p class="card-text">{{ $nor_editor->affiliation }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p>No Editors Found!</p>
                            @endif
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
