<?php
use App\Models\Article;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

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
                    <form action="{{ route('search') }}" method="get" class="form-inline my-2 my-lg-0 relative">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search" />
                        <button class="btn my-2 my-sm-0 absolute" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h2 class="text-center mt-3">GMPC Open Access Policy
            </h2>
            <div class="pl-4 pr-4  text-justify">
                <p>The GMPC vision is to publish high-quality journals, conference proceedings, and books in different
                    aspects of life sciences to improve knowledge dissemination. GMPC believes that the sustainable open
                    access model will broaden the dissemination and maximize the benefits of research by making research
                    free to access to everyone globally. Therefore, GMPC publishes open access research articles. All
                    research articles will be immediately freely available to read, download, and share for everyone
                    worldwide. The peer-reviewed accepted research articles and all supplemental materials will be
                    deposited online immediately in a suitable standard electronic format. They will be free, i.e.,
                    everyone can freely access and download the full text of all materials published within the GMPC
                    group free of charge. </p>
                <p>The re-use of the published material is permitted if the proper citation of the original publication
                    is given. GMPC does not hold the copyright of figures, graphics, photos, or tables. The re-use of
                    such materials will require permission from the original copyright owners (i.e. authors). </p>
                <p>GMPC, as an Open Access publisher, covers the costs for editorial handling and editing of research
                    articles by the authors. Therefore, authors are asked to pay a comparatively low Article Processing
                    Charge (APC) for the accepted articles. The APC is a one-time payment for accepted articles only.
                    Since we do not want to make the payment capability to be a barrier, if you or your institution
                    cannot cover the costs, you may apply for a complete or partial waiver at the time of submission.
                    Please download the APC waiver request from the author resources to explain the reasons for your
                    request and send it to <a href="waiver@gmpc-akademie.de"
                                              class="main-color">waiver@gmpc-akademie.de</a>.</p>
                <p>GMPC group is committed to maintaining the open-access policy permanently, including any changes in
                    ownership in the future.
                </p>
            </div>
        </div>
    </main>
@endsection
