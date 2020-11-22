<?php
use App\Article;
use App\Journal;
use App\Lnew;
use App\Researchtopic;
$active_journals = Journal::orderBy('id', 'desc')->where('status', 1)->get();
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
                        <li class="nav-item active">
                            <a class="nav-link text-uppercase" href="{{ route('scope', $journal) }}">Aims & Scope <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="articles.html">Articles</a>
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
                        <div class="volumes mt-3 p-2 effect3">
                            <h5>Browse volumes </h5>
                            <p class="vol-btn">
                                <button class="btn btn-info" type="button" data-toggle="collapse"
                                        data-target="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                    Vol. 1 (2021) <i class="fas fa-plus fa-minus"></i>
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body">
                                    <ul>
                                        <li><a href="issue.html">Issue 1</a></li>
                                        <li><a href="issue.html">Issue 2</a></li>
                                        <li><a href="issue.html">Issue 3</a></li>
                                        <li><a href="issue.html">Issue 4</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
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
                        <div>
                            <h5 class="head pl-2">Scope </h5>
                            <p class="pl-3">
                                The <strong><em>GMPC TOP</em></strong> is an open access, peer-reviewed journal that
                                considers articles on all aspects of scientific research. The journal aims to show the
                                scientific works and opinions of high value that are difficult to access internationally
                                because they are written in languages other than English. The journal will give master
                                and Ph.D. students the chance to publish summaries of their thesis on an international
                                platform. Moreover, we intend to provide an opportunity for the pioneers in the sciences
                                to show their opinions in a global portal. Sections include but not limited to:
                            </p>
                            <ul class="ml-3">
                                <li>Medical and Health Sciences.</li>
                                <li>Agricultural sciences. </li>
                                <li>Natural sciences and Biology. </li>
                                <li>Engineering and technology. </li>
                                <li>Social sciences. </li>
                                <li>Humanities. </li>
                            </ul>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
