<?php
use App\Models\Article;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

$active_journals = Journal::orderBy('id', 'asc')->where('status', 1)->get();
$topic_articles = Article::orderBy('id', 'desc')->where('journal_id', $journal->id)->where('rtopic_id', $topic->id )->paginate(4);
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
                        <li class="nav-item active">
                            <a class="nav-link text-uppercase" href="{{ route('researchtopics', $journal->abbreviation) }}">Research Topics <span
                                    class="sr-only">(current)</span></a>
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
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('editorialboard', $journal->abbreviation) }}">editorial board</a>
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
    <main class="s-topic articles">
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
                <div class="col-md-9">
                    <article>
                        <h5 class="head pl-2 mb-3">{{ $topic->title }}</h5>
                        <div class="row">
                            <div class="col-md-8">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview"
                                           role="tab" aria-controls="nav-home" aria-selected="true">Overview</a>
                                        <a class="nav-link" id="Articles-tab" data-toggle="tab" href="#Articles"
                                           role="tab" aria-controls="nav-profile" aria-selected="false">Articles</a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active p-4" id="Overview" role="tabpanel"
                                         aria-labelledby="Overview-tab">
                                        <div>
                                            <h6>About the topic:</h6>
                                            <p><?php echo $topic->overview; ?></p>
                                            <h6>Keywords:</h6>
                                            <p>{{ $topic->keywords }}</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade p-4" id="Articles" role="tabpanel"
                                         aria-labelledby="Articles-tab">

                                        <div class="row">
                                            @if(count($topic_articles))
                                            @foreach($topic_articles as $article)
                                            <div>
                                                <div class="article mb-4">
                                                    <h5><a href="/articles/{{ $journal->abbreviation }}/single/{{ $article->id }}">{{ $article->title }}</a></h5>
                                                    <p class="m-0">Authors: {{ $article->authors }}</p>
                                                    <p>
                                                        <em>
                                                            @if($article->journal->abbreviation == 'gjvr')
                                                                {{ 'Ger. J. Vet. Res' }}
                                                            @elseif($article->journal->abbreviation == 'gtop')
                                                                {{ 'GMPC TOP' }}
                                                            @elseif($article->journal->abbreviation == 'gjm')
                                                                {{ 'Ger. J. Microbiol.' }}
                                                            @endif
                                                        </em> {{ $article->year }}.
                                                        <a href="/journal/{{ $article->journal->abbreviation }}/volume/{{ $article->volume }}/issue/{{ $article->issue }}" class="main-color">vol. {{ $article->volume }}, Iss. {{ $article->issue }},</a> pp:{{ $article->start_page }}-{{ $article->end_page }} <br>Doi:{{ $article->doi }}
                                                    </p>
                                                    <p>views: <span class="main-color">{{ $article->views_count }}</span></p>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                            <p>No Articles Found.</p>
                                            @endif
                                        </div>
                                        <div>
                                            <nav class="d-flex justify-content-end" aria-label="...">
                                                {{ $topic_articles->links() }}
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 side-card">
                                <div class="card">
                                    @if($topic->photo)
                                        <img src="/images/{{ $topic->photo->filename }}" class="card-img-top" alt="topic-picture">
                                    @else
                                        <img src="/images/default.jpg" alt="topic-picture" class="card-img-top">
                                    @endif
                                    <div class="pt-2 pl-2">
                                        <h6>Topic Editor/s:</h6>
                                        <ul>
                                            <?php if(isset($topic->editor1)) { echo '<li><p><strong>' . $topic->editor1 . '</strong> <br>' . $topic->affiliation1 . '<p></li>'; } else{ echo '';}?>
                                            <?php if(isset($topic->editor2)) { echo '<li><p><strong>' . $topic->editor2 . '</strong> <br>' . $topic->affiliation2 . '<p></li>'; } else{ echo '';}?>
                                            <?php if(isset($topic->editor3)) { echo '<li><p><strong>' . $topic->editor3 . '</strong> <br>' . $topic->affiliation3 . '<p></li>'; } else{ echo '';}?>
                                            <?php if(isset($topic->editor4)) { echo '<li><p><strong>' . $topic->editor4 . '</strong> <br>' . $topic->affiliation4 . '<p></li>'; } else{ echo '';}?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
