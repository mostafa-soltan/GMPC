<?php
use App\Article;
use App\Journal;
use App\Lnew;
use App\Researchtopic;

$active_journals = Journal::orderBy('id', 'desc')->where('status', 1)->get();
$articles = Article::orderBy('id', 'desc')->where('journal_id', $journal->id)->where('status', 1)->paginate(4);
$inpress_articles = Article::orderBy('id', 'desc')->where('journal_id', $journal->id)->where('status', 0)->paginate(4);

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
                                        <a class="dropdown-item" href="{{ route('journal', $active_journal) }}">{{ $active_journal->name }}</a>
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
                    <a href="https://www.ejmanager.com/my/gjvr/index.php" target="blank"  class="btn btn-primary mr-2">SUBMIT</a>
                    <form action="../search.html" method="get" class="form-inline my-2 my-lg-0 relative">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
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
                            <a class="nav-link text-uppercase" href="{{ route('journal', $journal) }}">Journal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('scope', $journal) }}">Aims & Scope</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link text-uppercase" href="{{ route('articles', $journal) }}">Articles <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('researchtopics', $journal) }}">Research Topics</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-uppercase" href="" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                For Authors
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('agl', $journal) }}">Author guidlines</a>
                                <a class="dropdown-item" href="{{ route('ares', $journal) }}">Author resources</a>
                                <a class="dropdown-item" href="https://www.ejmanager.com/my/gjvr/index.php" target="blank">Submit</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('editorialboard', $journal) }}">editorial board</a>
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
    <main class="articles">
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
                                                        <li><a href="/journal/{{ $journal->id }}/volume/{{ $jvolume->volume_no }}/issue/{{ $jissue->issue_no }}">Issue {{ $jissue->issue_no }}</a></li>
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
                                <div class="counter"><span class="timer" data-from="0" data-to="100" data-speed="5000"
                                                           data-refresh-interval="50">0</span> Visitors </div>
                                <div class="counter"><span class="timer" data-from="0" data-to="100" data-speed="5000"
                                                           data-refresh-interval="50">0</span> Article Views </div>
                                <div class="counter"><span class="timer" data-from="0" data-to="100" data-speed="5000"
                                                           data-refresh-interval="50">0</span> Article Downloads </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="col-md-9">
                    <article>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="most-viewd-tab" data-toggle="tab" href="#most-viewd"
                                   role="tab" aria-controls="nav-home" aria-selected="true">Most Viewed</a>
                                <a class="nav-link" id="most-recent-tab" data-toggle="tab" href="#most-recent"
                                   role="tab" aria-controls="nav-profile" aria-selected="false">Most Recent</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active p-4" id="most-viewd" role="tabpanel"
                                 aria-labelledby="most-viewd-tab">
                                <div class="row">
                                    <div>
                                        <div class="article mb-4">
                                            <h5 class="mb-0"><a href="single-article.html">Lorem ipsum dolor sit amet
                                                    consectetur,
                                                    adipisicing elit.
                                                    Exercitationem.</a></h5>
                                            <p class="m-0">Authors: --</p>
                                            <p>
                                                <em>Ger. J. of Vet. Res.</em> 2021. <a href="issue.html"
                                                                                       class="main-color">
                                                    vol. 1, Iss. 1,</a> pp:1-5 <br>Doi: .....
                                            </p>
                                            <p>views:<span class="views">100</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="article mb-4">
                                            <h5 class="mb-0"><a href="single-article.html">Lorem ipsum dolor sit amet
                                                    consectetur,
                                                    adipisicing elit.
                                                    Exercitationem.</a></h5>
                                            <p class="m-0">Authors: --</p>
                                            <p>
                                                <em>Ger. J. of Vet. Res.</em> 2021. <a href="issue.html"
                                                                                       class="main-color">
                                                    vol. 1, Iss. 1,</a> pp:1-5 <br>Doi: .....
                                            </p>
                                            <p>views: <span class="main-color">100</span></p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="article mb-4">
                                            <h5 class="mb-0"><a href="single-article.html">Lorem ipsum dolor sit amet
                                                    consectetur,
                                                    adipisicing elit.
                                                    Exercitationem.</a></h5>
                                            <p class="m-0">Authors: --</p>
                                            <p>
                                                <em>Ger. J. of Vet. Res.</em> 2021. <a href="issue.html"
                                                                                       class="main-color">
                                                    vol. 1, Iss. 1,</a> pp:1-5 <br>Doi: .....
                                            </p>
                                            <p>views: <span class="main-color">100</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade p-4" id="most-recent" role="tabpanel"
                                 aria-labelledby="most-recent-tab">
                                <div class="row">
                                    @if(count($articles))
                                    <div>
                                        @foreach($articles as $article)
                                        <div class="article mb-4">
                                            <h5 class="mb-0"><a href="/articles/{{ $journal->id }}/single/{{ $article->id }}">{{ $article->title }}</a></h5>
                                            <p class="m-0">Authors: {{ $article->authors }}</p>
                                            <p>
                                                <em>{{ $article->journal->name }}</em> {{ $article->year }}.
                                                <a href="/journal/{{ $article->journal->id }}/volume/{{ $article->volume }}/issue/{{ $article->issue }}" class="main-color">vol. {{ $article->volume }}, Iss. {{ $article->issue }},</a>
                                                pp:{{ $article->start_page }}-{{ $article->end_page }} <br>Doi: {{ $article->doi }}
                                            </p>
                                            <p>views: <span class="main-color">100</span></p>
                                        </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <p>No Articles Found.</p>
                                    @endif
                                </div>
                                <div>
                                    <nav class="d-flex justify-content-end" aria-label="...">
                                        {{ $articles->links() }}
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h5 class="head pl-2">Articles In-Press </h5>
                            @if(count($inpress_articles))
                            <div class="pl-3">
                                @foreach($inpress_articles as $inpress_article)
                                <div class="article mb-4">
                                    <h5 class="mb-0"><a href="/articles/{{ $journal->id }}/single/{{ $inpress_article->id }}">{{ $inpress_article->title }}</a></h5>
                                    <p class="m-0">Authors: {{ $inpress_article->authors }}</p>
                                    <p>
                                        <em>{{ $inpress_article->journal->name }}</em> {{ $inpress_article->year }}
                                        <br>Doi: {{ $inpress_article->doi }}
                                    </p>
                                    <p>views: <span class="main-color">100</span></p>
                                </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                        <div>
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $inpress_articles->links() }}
                            </nav>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
