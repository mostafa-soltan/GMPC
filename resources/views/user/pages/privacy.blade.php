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
            <h2 class="text-center mt-3">GMPC Privacy Policy</h2>
            <div class="pl-4 pr-4 text-justify">
                <p>The privacy of GMPC users on the Internet is an essential concern for the company.
                    Thus, this policy
                    outlines the regulations to protect our customer privacy, data collection and management. GMPC is a
                    dynamic international organization founded in Germany. GMPC is committed to publish high-quality
                    journals, conference proceedings, and books in different aspects of life sciences to improve
                    knowledge
                    dissemination. This Privacy Policy applies to all websites and services that GMPC provides.</p>
                <ul>
                    <li><strong>Protection of Customers Information: </strong>All data we collect from our websites is
                        protected against third parties' unauthorized access. The data are protected by using the most
                        guaranteed security technologies.</li>
                    <li><strong>Website Usage Information: </strong>Using or visiting GMPC websites is tracked in our
                        web server log files and all Log Data may be used by GMPC for statistical purposes and
                        improvement the structure and content presentation. The usage information we collect (using HTTP
                        Cookies) includes referring URLs, browser and device characteristics, IP address, operating
                        system, as well as dates and times of website visits. The third-party services, such as social
                        login and social sharing, are offered to third party sites. Information collected by third party
                        operators themselves will be governed by their own privacy policies. GMPC does not authorize,
                        endorse, or recommend products or services contained in such pop-up’s advertisements. GMPC
                        website may use Google Analytics to collect information to gather reports helping to improve our
                        site presentation or services. The cookies collect information in an anonymous form. Please
                        check Google’s Privacy Policy <a class="main-color"
                                                         href="https://policies.google.com/privacy?hl=en">https://policies.google.com/privacy?hl=en</a>.
                    </li>
                    <li><strong>User Accounts and Registration: </strong>Upon registering a user account, users will be
                        asked to provide some personal information, including, but not limited to, the name, valid
                        e-mail address, affiliation, postal address, phone number, password, academic degree, position
                        within the institution or organization, and research interests. Some of this information is
                        required to set up the user account properly. GMPC may use this information for article
                        publication and/or assigning reviewers and editors for GMPC journals. Contacting GMPC users may
                        include emails for new services, products, or publications and other advertising. If the
                        personal information was provided to us by a third party, GMPC may still use this information in
                        the same manner as described above. Users will have the ability to opt-out of receiving such
                        e-mails by unsubscribing or contacting the GMPC at <a class="main-color"
                                                                              href="info@gmpc-akademie.de.">info@gmpc-akademie.de</a>. <br>
                        As an international publisher, the user’s personal data may be transferred outside of the user’s
                        country for storage purposes on our servers. However, all necessary actions to protect privacy
                        are applicable to the transferred data.</li>
                    <li><strong>GMPC Users Rights: </strong>registered users will be able to access their account at any
                        time and make corrections or updates. Collected data are available for registered users upon
                        request, including all personal information that we possess. Users have the right to request the
                        deleting of the account and personal information when the users deactivate their active account.
                        However, some personal information may remain in storage for a certain period to comply with our
                        (legal) obligations and to resolve disputes.
                    </li>
                    <li><strong>Linked Websites: </strong>GMPC may link to other websites not controlled by us e.g.
                        Journal Management System websites. Hence, GMPC does not held responsibility or liability for
                        other websites' privacy practices, their services, or contents.
                    </li>
                    <li><strong>Privacy policy changes and updates: </strong>We reserve the right to amend or change
                        this Privacy Policy at any time by posting changes without prior notice. Periodical check of the
                        GMPC Privacy Policy is highly recommended. Continuing use of the GMPC website and services means
                        that the updated policy has been accepted and agreed upon by the users.</li>
                </ul>
                <p class="text-center">Contact us: If you have any enquiry about GMPC Privacy Policy, please contact us
                    at <a class="main-color" href="info@gmpc-akademie.de">info@gmpc-akademie.de</a>. </p>
                <p class="text-center">This Privacy Policy was last updated on 1/12/2020</p>

            </div>
        </div>
    </main>
@endsection
