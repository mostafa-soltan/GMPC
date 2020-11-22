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
                            <a class="nav-link text-uppercase" href="{{ route('journal', $journal) }}">Journal <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('scope', $journal) }}">Aims & Scope</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="articles.html">Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('researchtopics', $journal) }}">Research Topics</a>
                        </li>
                        <li class="nav-item dropdown active">
                            <a class="nav-link dropdown-toggle text-uppercase" href="" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                For Authors <span class="sr-only">(current)</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item active" href="{{ route('agl', $journal) }}">Author guidlines</a>
                                <a class="dropdown-item" href="{{ route('ares', $journal) }}">Author resources</a>
                                <a class="dropdown-item" href="https://www.ejmanager.com/my/gjm/index.php" target="blank">Submit</a>
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
    <main class="resources">
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
                        <h4 class="text-center mb-4">Author resources </h4>
                        <div>
                            <h5 class="head pl-2">Why publish in GMPC?</h5>
                            <ul>
                                <li>GMPC considers all submitted manuscripts to review without selection bias.</li>
                                <li>GMPC provides fairness of review and speed publication.</li>
                                <li>GMPC editorial board and reviewers are selected among the best researchers in their
                                    areas of expertise.</li>
                                <li>GMPC disseminates accepted manuscripts globally.</li>
                            </ul>
                            <div class="text-center">
                                <img src="{{ asset('ui-assets') }}/imgs/Author-resources.jpg" alt="author resources"
                                     class="img-fluid p-2 AR-map">
                            </div>
                        </div>
                        <div>
                            <h5 class="head pl-2">Submission</h5>
                            <ul>
                                <li>GMPC provides an easy submission system to facilitate the submission process.</li>
                                <li>GMPC allows authors to suggest the potential reviewers and to exclude reviewers that
                                    might have conflict of interest.</li>
                                <li>GMPC promotes article submission through email alerts.</li>
                                <li>GMPC encourages authors to use the available templates that facilitate the peer
                                    review process.</li>
                                <li>For manuscript preparation please use <a
                                        href="{{ asset('ui-assets') }}/resourses/GMPC-TOP-Author-guidlines.pdf"
                                        download="GMPC TOP Author guidlines.pdf">GMPC author Guidelines.</a></li>
                                <li>For submission, please register yourself with GMPC and <a
                                        href="https://www.ejmanager.com/my/gto/index.php" target="blank">log in </a>to the
                                    editorial system to start submission.</li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="head pl-2">Editorial office</h5>
                            <ul>
                                <li>GMPC provides the top researchers in their fields as editors.</li>
                                <li>Within 48 hours after submission, editors will check the manuscript for adequate
                                    methodology, ethical standards, accurate analysis and language. After fulfilling
                                    these
                                    criteria, editors invites reviewers that are selected
                                    among researchers in their fields.
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="head pl-2">Reviewing</h5>
                            <ul>
                                <li>Within 2 weeks, reviewrs will send their Independent Review Reports. Authors are
                                    asked to revise their manuscript and send their feedback or even re-submitt new
                                    manuscript if necessary.</li>
                                <li>The editorial decision is taken, and you immediately receive the notification within
                                    one week after submitting the revised manuscript.</li>
                                <li>In case of accepted manuscripts “Congratulations, your article was accepted!”
                                    authors are asked kindly to pay and article processing charges (APC).</li>
                                <li>The GMPC provides complete or partial waiver for authors who are unable to cover the
                                    costs, and if the waiver request has been sent to the editorial office explaining
                                    the reasons for your request at the time of submission.
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="head pl-2">Production</h5>
                            <ul>
                                <li>Accepted manuscripts will be adapted according to the GMPC style. Figures, images,
                                    and tables of high quality will be used <a
                                        href="{{ asset('ui-assets') }}/resourses/GMPC-TOP-Author-guidlines.pdf"
                                        download="GMPC TOP Author guidlines.pdf">(Authors Guidelines).</a> Proofs
                                    will be sent to authors to be checked and confirmed.
                                    For any enquiry, please contact GMPC production office. </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="head pl-2">Post Publication services</h5>
                            <ul>
                                <li>After production, articles will be published electronically in the Specialty Journal
                                    in PDF formats. Papers will be dynamically evaluated for total views, downloads, and
                                    citations. GMPC will update the authors about their
                                    articles impacts. For any inquiry regarding post publication services, please
                                    contact GMPC Editorial Office. </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="head pl-2">Contact GMPC Editorial Office</h5>
                            <ul>
                                <li><strong>Address:</strong> Kötztinger Straße 7,93057 Regensburg, Germany</li>
                                <li><strong>Phone:</strong> <a href="tel:+49 (0) 94120636123">+49 (0) 94120636123</a>
                                </li>
                                <li><strong>Email:</strong> <a href="mailto:editor-top@gmpc-akademie.de"
                                                               target="blank">editor-top@gmpc-akademie.de</a></li>
                            </ul>
                        </div>
                        <div class="downloads">
                            <h5 class="head pl-2">Downloads</h5>
                            <div class="d-flex text-center font-weight-bold">
                                <a href="{{ asset('ui-assets') }}/resourses/GMPC-TOP-Author-guidlines.pdf"
                                   download="GMPC TOP Author guidlines.pdf" target="blank">
                                    <img src="https://cdn.fileinfo.com/img/icons/files/128/pdf-74.png" alt="pdf icon">
                                    <p>ATHOR <br> GUIDLINES</p>
                                </a>
                                <a href="{{ asset('ui-assets') }}/resourses/GMPC-TOP-Template.docx">
                                    <img src="https://cdn.fileinfo.com/img/icons/apps/128/microsoft_word.png"
                                         alt="word icon">
                                    <p>GMPC TOP WORD <br> TEMPLATE</p>
                                </a>
                                <a href="{{ asset('ui-assets') }}/resourses/Application-for-APC-waiver.docx">
                                    <img src="https://cdn.fileinfo.com/img/icons/apps/128/microsoft_word.png"
                                         alt="word icon">
                                    <p>APC WAIVER <br> REQUEST</p>
                                </a>
                                <a href="{{ asset('ui-assets') }}/resourses/GMPC-Endnote-Style.ens">
                                    <img src="https://cdn.fileinfo.com/img/icons/files/128/ens-7363.png" alt="ENS icon">
                                    <p>GMPC ENDNOTE <br> STYLE</p>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
