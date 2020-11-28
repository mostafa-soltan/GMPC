<?php

use App\Models\Article;
use App\Models\Branch;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

$latestnews = Lnew::orderBy('id', 'desc')->paginate(4);
$articles = Article::orderBy('id', 'desc')->paginate(4);
$rtopics = Researchtopic::orderBy('id', 'desc')->paginate(4);
$journals = Journal::orderBy('id', 'desc')->paginate(3);
$active_journals = Journal::orderBy('id', 'desc')->where('status', 1)->get();
$branches = Branch::orderBy('id', 'asc')->paginate(1);
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
                        @if($journals->count())
                            @foreach($active_journals as $active_journal)
                                <a class="dropdown-item" href="{{ route('journal', $active_journal) }}">{{ $active_journal->name }}</a>
                            @endforeach
                        @else
                            <a class="dropdown-item" href="#">No Journals Found.</a>
                        @endif
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('allnews') }}">Latest News</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('contact') }}">Contact Us <span class="sr-only">(current)</span></a>
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
<main class="contact-page pb-5">
    <div class="container">
        <div class="row p-5">
            @if($branches->count())
            @foreach($branches as $branch)
                <div class="col-md-6">
                    <h3 class="mb-5">{{ $branch->title }}</h3>
                    <p>
                        <strong>Address: </strong><a href="#map">{{ $branch->address }}</a>
                    </p>
                    <p><strong>Phone: </strong> <a href="tel: +49094120636123">{{ $branch->phone }}</a></p>
                    <p><strong>Email: </strong> <a href="mailto:info@gmpc-akademie.de" target="blank">{{ $branch->email }}</a></p>
                </div>
            @endforeach
            @else
                <p>No Branches Found.</p>
            @endif
            <div class="col-md-6">
                <form action="info@gmpc-akademie.de" method="post">
                    <div class="form-group">
                        <!-- <label for="exampleInputname">Your Name(required)</label> -->
                        <input name="name" type="text" class="form-control" id="exampleInputname"
                               placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleInputEmail1">Your Email(required)</label> -->
                        <input name="mail" type="email" class="form-control" id="exampleInputEmail1"
                               placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleInputsubject">Subject</label> -->
                        <input name="subject" type="text" class="form-control" id="exampleInputsbject"
                               placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <!-- <label for="exampleInputsubject">Your Message</label> -->
                        <textarea name="message" rows="5" class="form-control" id="exampleInputsbject"
                                  placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
        <div>
            <nav class="d-flex justify-content-end" aria-label="...">{{ $branches->links() }}</nav>
        </div>
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2615.076975035078!2d12.110721315681056!3d49.04715997930651!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479fc1db92dc0455%3A0x90255cdd6e759f8d!2sK%C3%B6tztinger%20Str.%207%2C%2093057%20Regensburg%2C%20Germany!5e0!3m2!1sen!2seg!4v1602952296481!5m2!1sen!2seg"
            width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0" id="map"></iframe>
    </div>
</main>
@endsection
