<?php
use App\Article;
use App\Journal;
use App\Lnew;
use App\Researchtopic;

$latestnews = Lnew::orderBy('id', 'desc')->paginate(4);
$articles = Article::orderBy('id', 'desc')->paginate(4);
$rtopics = Researchtopic::orderBy('id', 'desc')->paginate(4);
$journals = Journal::orderBy('id', 'desc')->paginate(3);
$active_journals = Journal::orderBy('id', 'desc')->where('status', 1)->get();
?>
@extends('layouts.user_layout')
@section('content')

    <header>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div
                        class="col-md-4 order-md-2 d-flex justify-content-md-end align-items-center justify-content-center">
                        <div class="social">
                            <a href="https://www.facebook.com/GMPC-104059058151398/?ti=as" title="Facebook"
                               target="blank"><i class="fab fa-facebook-square"></i></a>
                            <a href="https://twitter.com/GmpcPublisher?s=08" title="Twitter" target="blank"><i
                                    class="fab fa-twitter-square"></i></a>
                            <a href="https://www.linkedin.com/groups/12470976/" title="LinkedIn" target="balnk"><i
                                    class="fab fa-linkedin"></i></a>

                            <a href="#" title="Publons" target="blank"><i class="fas fa-parking"></i></a>
                        </div>
                        <!-- <form action=""class="d-inline">
                            <input type="search"name=""id="">
                            <button class="search"><i class="fas fa-search"></i></button>
                        </form> -->
                        <!-- <a href="#"class="btn btn-primary">SUBMIT</a> -->
                        <!-- <a href="#"class="auth login">LOGIN</a> -->
                        <!-- <a href="#"class="auth">REGISTER</a> -->
                        <!-- <a href="#"class="auth">LOGOUT</a> -->
                    </div>
                    <div class="col-md-8 order-md-1">
                        <div class="row">
                            <div class="col-1">
                                <p class="latest mt-1">LATEST</p>
                            </div>
                            <div class="col-11">
                                <div class="owl-one owl-carousel owl-theme">

                                    @if($latestnews->count())
                                    @foreach($latestnews as $latestnew)
                                    <div class="item">
                                        <a href="{{ route('singlenew', $latestnew) }}" class="latest mt-1">{{ $latestnew->title }}</a>
                                    </div>
                                    @endforeach
                                    @else
                                        <span class="latest mt-1">No News Found.</span>
                                @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="logo">
            <!-- <img src="{{asset('ui-assets')}}/imgs/bg.jpg" alt="" class="img-fluid"> -->
        </div>
        <nav class="navbar navbar-expand-lg navbar-ligh bg-light">
            <div class="container">
                <button class="navbar-toggler m-auto tog-icon" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('welcome') }}">Home <span class="sr-only">(current)</span></a>
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
                                @if($journals->count())
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
                    <form action="search.html" method="get" action="search.html" method="get"
                          class="form-inline my-2 my-lg-0 relative">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn my-2 my-sm-0 absolute" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <!-- desc start -->
        <section class="desc pb-5">
            <div class="container">
                <h4 class="text-center pt-4 pb-3">
                    <em><strong><q>We are committed to disseminate high quality science journals</q></strong></em>
                </h4>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="vis-con relative animate__animated animate__backInLeft animate__slow">
                            <img src="{{asset('ui-assets')}}/imgs/vision.png" alt="vision-pic" class="img-fluid">
                            <div class="absolute d-flex align-items-center">
                                <p id="vision"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mis-con relative animate__animated animate__backInRight animate__slow">
                            <img src="{{asset('ui-assets')}}/imgs/mission.jpg" alt="vision-pic" class="img-fluid">
                            <div class="absolute  d-flex align-items-center">
                                <p id="mission"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  desc end -->

        <!-- featured start -->
        <section class="featured">
            <div class="container">
                <h4 class="pl-2 head d-sm-none">Featured</h4>
                <nav>
                    <div class="nav nav-tabs justify-content-center justify-content-md-end align-items-end" id="nav-tab2" role="tablist">
                        <h4 class="pl-2 mr-5 d-none d-sm-inline mr-auto">Featured</h4>
                        <a class="nav-link" id="nav-Articles-tab" data-toggle="tab" href="#nav-Articles" role="tab" aria-controls="nav-profile" aria-selected="false">Articles</a>
                        <a class="nav-link" id="nav-Research-tab" data-toggle="tab" href="#nav-Research" role="tab" aria-controls="nav-profile" aria-selected="false">Research Topics</a>
                        <a class="nav-link active" id="nav-Blog-tab" data-toggle="tab" href="#nav-Blog" role="tab" aria-controls="nav-profile" aria-selected="false">Latest news</a>
                    </div>
                </nav>
            <div class="tab-content" id="nav-tabContent2">
                <div class="tab-pane fade pt-4" id="nav-Articles" role="tabpanel"
                     aria-labelledby="nav-Articles-tab">
                    <!-- Articles Pane -->
                    <div class="row">
                        @if($articles->count())
                        @foreach($articles as $article)
                            <div class="col-lg-3 col-sm-6">
                                <article class="entry">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h6 class="card-title mb-0">
                                                <!-- daynamic href & title & abstract-->
                                                <a href="/articles/{{ $article->journal->id }}/single/{{ $article->id }}">{{ $article->title }}</a>
                                            </h6>
                                            <p class="main-color"><em>{{ $article->journal->name }}</em> {{ $article->year }}. <a href="/journal/{{ $article->journal->id }}/volume/{{ $article->volume }}/issue/{{ $article->issue }}"
                                                                                                 class="main-color"> vol. {{ $article->volume }},
                                                    Iss. {{ $article->issue }}</a> pp:{{ $article->start_page }}-{{ $article->end_page }} <br>Doi: {{ $article->doi }}</p>
                                            <p class="card-text" title="{{ $article->abstract }}">
                                                {{ \Str::limit($article->abstract, 50) }}
                                            </p><a href="/articles/{{ $article->journal->id }}/single/{{ $article->id }}"><small class="main-color">Read
                                                    More</small></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        @else
                            <p>No Articles Found.</p>
                        @endif
                    </div>
                    <!-- Articles pane -->
                </div>
                <div class="tab-pane fade pt-4" id="nav-Research" role="tabpanel"
                     aria-labelledby="nav-Research-tab">
                    <!-- Research Topics Pane -->
                    <div class="row">
                        @if($rtopics->count())
                        @foreach($rtopics as $topic)
                            <div class="col-lg-3 col-sm-6">
                                <article class="entry">
                                    <div class="card mb-4">
                                        <!-- daynamic image: url -->
                                        @if($topic->photo)
                                            <img src="/images/{{ $topic->photo->filename }}" class="card-img-top" alt="topic-pic" />
                                        @else
                                            <img src="/images/default.jpg" class="card-img-top" alt="topic-pic" />
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title mb-0">
                                                <!-- daynamic href & title & abstract-->
                                                <a href="/researchtopics/{{ $topic->journal_id}}/single/{{ $topic->id }}">{{ \Str::limit($topic->title, 50) }}</a>
                                            </h6>
                                            <p class="main-color">{{ $topic->journal->name }}</p>
                                            <p class="card-text" title="{{ $topic->overview }}">{{ \Str::limit($topic->overview, 50) }}
                                            </p><a href="/researchtopics/{{ $topic->journal_id }}/single/{{ $topic->id }}"><small class="main-color">Read More</small></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        @else
                            <p>No Research Topics Found.</p>
                        @endif
                    </div>
                    <!-- Research Topics Pane -->
                </div>
                <div class="tab-pane fade show active pt-4" id="nav-Blog" role="tabpanel" aria-labelledby="nav-Blog-tab">
                    <!-- Latest news Pane -->
                    <div class="row">
                        @if($latestnews->count())
                        @foreach($latestnews as $new)
                            <div class="col-lg-3 col-sm-6">
                                <article class="entry">
                                    <div class="card mb-4">
                                        <!-- daynamic image: url -->
                                        @if($new->photo)
                                            <img src="/images/{{ $new->photo->filename }}" class="card-img-top" alt="new-pic" />
                                        @else
                                            <img src="/images/default.jpg" class="card-img-top" alt="new-pic" />
                                        @endif
                                        <div class="card-body">
                                            <h6 class="card-title">
                                                <!-- daynamic href & title & abstract-->
                                                <a href="{{ route('singlenew', $new) }}">{{ \Str::limit($new->title, 50) }}</a>
                                            </h6>
                                            <p class="card-text" title="{{ $new->body }}">{{ \Str::limit($new->body, 50) }}</p>
                                            <a href="{{ route('singlenew', $new) }}"><small class="main-color">Read More</small></a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                        @else
                            <p>No News Found.</p>
                        @endif
                    </div>
                    <!-- Latest news Pane -->
                </div>
            </div>
            </div>
        </section>
        <!-- featured end -->

        <!-- journals start -->
        <section class="journals">
            <div class="container">
                <h4 class="pl-2 mb-4 head pt-1 pb-1">Journals</h4>
                <div class="row">
                    @if($journals->count())
                    @foreach($journals as $journal)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <a href="{{ route('journal', $journal) }}">
                                    @if($journal->photo)
                                        <img src="/images/{{ $journal->photo->filename }}" class="card-img-top" alt="journal-pic" />
                                    @else
                                        <img src="/images/default.jpg" class="card-img-top" alt="journal-pic" />
                                    @endif
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>ISSN:</strong> {{ $journal->issn }} <br>
                                            <span class="text-center text-danger"><?php if ($journal->status == 0){echo 'Coming Soon';} ?></span>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @else
                    <p>No Journals Found.</p>
                    @endif
                </div>
                <div>
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $journals->links() }}
                    </nav>
                </div>
            </div>
        </section>
        <!-- journals end -->
    </main>
@endsection
