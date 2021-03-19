<?php

use App\Models\Article;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

$latestnews = Lnew::orderBy('id', 'desc')->paginate(4);
$news = Lnew::orderBy('id', 'desc')->paginate(7);
$articles = Article::orderBy('id', 'desc')->paginate(4);
$rtopics = Researchtopic::orderBy('id', 'desc')->paginate(4);
$journals = Journal::orderBy('id', 'desc')->paginate(3);
$active_journals = Journal::orderBy('id', 'asc')->where('status', 1)->get();
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
                                <a class="dropdown-item" href="#">No Journals Found.</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('allnews') }}">Latest News <span class="sr-only">(current)</span></a>
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
<main class="p-md-4 latest-news">
    <div class="container">

        <article class="p-3">
            <div>
            @if($news->count())
            @foreach($news as $new)
                <div class="card mb-3">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        @if($new->photo)
                            <img src="/images/{{ $new->photo->filename }}" class="card-img" alt="news picture">
                        @else
                            <img src="/images/default.jpg" class="card-img" alt="news picture">
                        @endif
                    </div>
                    <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title mb-1"><a href="{{ route('singlenew', $new) }}" class="text-dark">{{ $new->title }}</a></h5>
                            <span class="font-weight-bold pb-4">{{ $new->author }}</span>
                            <p class="card-text"><small class="main-color">{{ date('F d, Y',strtotime($new->publish_date)) }}</small></p>
                            <p class="card-text"><?php echo $new->body;?><small><a href="{{ route('singlenew', $new) }}" class="main-color">Read More</a></small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <p>No News Found.</p>
            @endif
            </div>
            <div>
                <nav class="d-flex justify-content-end">{{ $news->links() }}</nav>
            </div>
        </article>
    </div>
</main>
@endsection
