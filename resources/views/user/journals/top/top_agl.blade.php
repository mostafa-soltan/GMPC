<?php
use App\Models\Article;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

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
                            <a class="nav-link text-uppercase" href="{{ route('journal', $journal) }}">Journal <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('scope', $journal) }}">Aims & Scope</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" href="{{ route('articles', $journal) }}">Articles</a>
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
                    <article class="AG">
                        <div>
                            <h4 class="text-center mb-4">Author Guidlines </h4>
                            <h5 class="head pl-2">Types of Paper </h5>
                            <ul>
                                <li>Thesis Review</li>
                                <li>Opinion</li>
                            </ul>
                            <p class="pl-3">Articles must be as concise as possible. They should not occupy more than
                                five printed
                                journal pages, including figures, tables, and references, as a general rule (maximum
                                1500 words, Arial 10 pt, single-spaced, minimum 2 cm margins). The number of references
                                should be limited to 15. The authors must use the <a
                                    href="{{ asset('ui-assets') }}/resourses/GMPC-TOP-Template.docx" class="main-color">Microsoft Word
                                    template</a> to prepare their manuscripts. </p>
                        </div>
                        <div>
                            <h5 class="head pl-2">Accepted File Formats </h5>
                            <p class="pl-3">The authors must use the <a
                                    href="{{ asset('ui-assets') }}/resourses/GMPC-TOP-Template.docx" class="main-color">Microsoft Word
                                    template</a> to prepare their manuscripts. Using
                                the template file will substantially shorten the time to complete copy-editing and
                                publication of accepted manuscripts. <br>
                                Manuscripts prepared in Microsoft Word must be converted into a single
                                file before submission. When preparing manuscripts in Microsoft Word, the
                                <strong><em>authors must use the GMPC TOP Microsoft Word template</em></strong> file.
                                Please insert your graphics (schemes, tables, figures, etc.) in the main text after the
                                paragraph of its first citation. <br>
                                All manuscripts must contain the required sections: Author Information, Abstract,
                                Keywords, Background, Summary or main text, Conclusions, Figures, and Tables with
                                Captions, Funding Information, Conflict of Interest, and other Ethics Statements.
                            </p>
                        </div>
                        <div>
                            <h5 class="head pl-2">Cover Letter </h5>
                            <p class="pl-3">A cover letter must be included with each manuscript submission. It should
                                be concise and
                                explain why the paper's content is significant, placing the findings in the context of
                                existing work and why it fits the scope of the journal. Confirm that neither the
                                manuscript nor any parts of its content are currently under consideration or published
                                in another journal. The names of proposed and excluded reviewers should be provided in
                                the submission system, not in the cover letter.
                            </p>
                        </div>
                        <div>
                            <h5 class="head pl-2">Publication Fees </h5>
                            <p class="pl-3">The <strong><em>GMPC TOP</em></strong> charges an Article Processing Charge
                                of 500,00 €
                                for accepted thesis reviews and opinion to cover copy-editing and production costs of
                                the journal, for hosting the website, publishing articles online, preparing HTML, XML,
                                and PDF versions of the article, and submitting the articles in electronic citation
                                database like CrossRef, plus VAT or local taxes where applicable.
                            </p>
                            <p class="text-underline font-weight-bold text-center pl-3">
                                Since we do not want to make the payment capability to be a barrier, if you or your
                                institution is unable to cover the costs, you may apply for a complete or partial waiver
                                at the time of submission. Please download the APC waiver request from the author
                                resources to explain the reasons for your request and send it to <a
                                    href="mailto:waiver@gmpc-akademie.de" target="blank"
                                    class="main-color">waiver@gmpc-akademie.de</a>.
                            </p>
                        </div>
                        <div>
                            <h5 class="head pl-2">During submission, ensure that the following items are present </h5>
                            <p class="pl-3">One author has been designated as the corresponding author with contact
                                details,
                                including an E-mail address and full postal address. <br>
                                All necessary files have been uploaded: Manuscript following the provided templates
                                include abstract, keywords, all figures, and tables (include relevant captions, titles,
                                description, footnotes), conflict of interest, funding statement, acknowledgment, and
                                references.

                            </p>
                        </div>
                        <div>
                            <h5 class="head pl-2">Further considerations </h5>
                            <ul>
                                <li>The manuscript has been written in American English and has been 'spell and grammar
                                    checked'. </li>
                                <li>All references mentioned in the Reference List are cited in the text, and vice
                                    versa. </li>
                                <li>Permission has been obtained for the use of copyrighted material from other sources
                                    (including the Internet). </li>
                            </ul>
                        </div>
                        <div>
                            <h5 class="head pl-2">Preparation of the Manuscript</h5>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="FP-tab" data-toggle="tab" href="#FP" role="tab"
                                       aria-controls="nav-home" aria-selected="true">The front part and title page
                                        information </a>
                                    <a class="nav-link" id="MS-tab" data-toggle="tab" href="#MS" role="tab"
                                       aria-controls="nav-profile" aria-selected="false">Manuscript Sections </a>
                                    <a class="nav-link" id="BP-tab" data-toggle="tab" href="#BP" role="tab"
                                       aria-controls="nav-profile" aria-selected="false">Back part of the manuscript
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active p-4" id="FP" role="tabpanel"
                                     aria-labelledby="FP-tab">
                                    <p> <strong>Title: </strong>Concise and informative. Titles are often used in
                                        information-retrieval systems. Avoid abbreviations and formulae where possible.
                                        The title of the thesis review should be different from the thesis title.
                                    </p>
                                    <p> <strong>Author names and affiliations: </strong>Please clearly indicate the
                                        given
                                        name(s) and family name(s) of each author and check that all names are
                                        accurately spelled. Present the authors' affiliation addresses (where the actual
                                        work was done) below the names. Indicate all affiliations with a lower-case
                                        superscript number immediately after the author's name and in front of the
                                        appropriate address. Provide the full postal address of each affiliation,
                                        including the country name and, if available, the e-mail address of each author.
                                    </p>
                                    <p> <strong>Corresponding author: </strong>Indicate who will handle correspondence
                                        at all stages of refereeing and publication, also post-publication. This
                                        responsibility includes answering any future queries about Methodology and
                                        Materials. Ensure that the e-mail address is given and that contact details are
                                        kept up to date by the corresponding author.
                                    </p>
                                    <p> <strong>Abstract:</strong> The abstract should be about 100 words maximum. It
                                        should contain background stating the question addressed in a broad context and
                                        highlight the purpose of the study. Briefly describe the main materials and
                                        methods applied. Summarize the main findings and results and indicate the main
                                        conclusions or interpretations.
                                    </p>
                                    <p> <strong>Keywords: </strong>Three to seven keywords need to be added after the
                                        abstract.
                                    </p>
                                </div>
                                <div class="tab-pane fade p-4" id="MS" role="tabpanel" aria-labelledby="MS-tab">
                                    <p> <strong>Background: </strong>Please provide background information in a broad
                                        context
                                        and highlight why it is essential. It should define the work's aims and
                                        objectives and its significance, including specific hypotheses being tested. The
                                        introduction should be understandable to scientists working outside the topic of
                                        the paper.
                                    </p>
                                    <p> <strong>Materials and Methods:</strong>They should be described as the
                                        methodology in brief with references.
                                    </p>
                                    <p>
                                        <strong>Summary or Main text:</strong> Please provide a concise and precise
                                        description
                                        of findings and the experimental results, their interpretation, and the
                                        experimental conclusions are drawn. Tables and figures should be inserted in
                                        this section. The authors should discuss the results in chapters based on the
                                        thesis arrangements or the author's opinions. Recommendation and future research
                                        directions may also be mentioned. This section may be divided into several
                                        paragraphs or subsections.
                                    </p>
                                    <p> <strong>Conclusions:</strong>This section is obligatory but can be added to the
                                        summary.
                                    </p>
                                </div>
                                <div class="tab-pane fade p-4" id="BP" role="tabpanel" aria-labelledby="BP-tab">
                                    <p>
                                        <strong>Data information:</strong> This section is mandatory in the thesis
                                        review. It will include the full name of the degree holder, the university's
                                        name where the degree has been obtained, year of graduation, the language of the
                                        thesis, and a link for the full dissertation if it is available in original
                                        languages.
                                    </p>
                                    <p> <strong>References:</strong> Please ensure that every reference cited in the
                                        text is also present in the reference list. References should be checked
                                        carefully for accuracy and corrected to ensure the format matches
                                        precisely as in the template. Only essential references should be included.
                                        Authors can download the <a
                                            href="{{ asset('ui-assets') }}/resourses/GMPC-Endnote-Style.ens">GMPC
                                            reference endnote style</a>.
                                    <p>Text citations: </p>
                                    <ul>
                                        <li>Use the names and dates in parentheses, e.g., as previously described
                                            (Wareth et al., 2020) or (Jones, 2020). </li>
                                        <li>If two or more references by the same author(s) published in the same
                                            year are cited, they should be distinguished from each other by placing
                                            a, b, etc. after the year, e.g., (Song, 2020a, b; Hotzel and Patrik,
                                            2019a, b). </li>
                                        <li>Submitted articles and personal communications are not acceptable. </li>
                                    </ul>
                                    <p>Bibliography: </p>
                                    <ul>
                                        <li>Please follow the format of the sample references and citations, as
                                            shown in this Guide. </li>
                                        <li>Using reference management software requires the authors to download and
                                            use the <a href="{{ asset('ui-assets') }}/resourses/GMPC-Endnote-Style.ens">GMPC
                                                reference
                                                endnote style guidelines</a> </li>
                                        <li>FOR EXAMPLE: use the following style for references:
                                            <ul>
                                                <li class="mb-3">
                                                    <p class="mb-1">Journal article:</p>
                                                    Yang, G., Chowdury, S., Hodges, E., Rahman, M.Z., Jang, Y.,
                                                    Hossain, M.E., Jones, J., Stark, T.J., Di, H., Cook, P.W. et
                                                    al., 2019. Detection of highly pathogenic avian influenza
                                                    A(H5N6) viruses in waterfowl in Bangladesh, Virology, 534,
                                                    36-44.
                                                    <a href="https://doi.org/10.1016/j.virol.2019.05.011"
                                                       target="blank">https://doi.org/10.1016/j.virol.2019.05.011</a>
                                                </li>
                                                <li class="mb-3">
                                                    <p class="mb-1">For books:</p>
                                                    Douglas, R.G., and Samant, V.B., 2013. 3 - The vaccine industry.
                                                    Vaccines (Sixth Edition), 2013, (W.B. Saunders, London), 33-43.
                                                    <a href="http://dx.doi.org/10.1016/B978-1-4557-0090-5.00018-5"
                                                       target="blank">http://dx.doi.org/10.1016/B978-1-4557-0090-5.00018-5</a>
                                                </li>
                                                <li class="mb-3">
                                                    <p class="mb-1">Book section:</p>
                                                    McCauley, J.W., Hongo, S., Kaverin, N.V., Kochs, G., Lamb, R.A.,
                                                    Matrosovich, M.N., Perez, D.R., Palese, P., Presti, R.M.,
                                                    Rimstad, E. et al., 2017. Orthomyxoviridae. 2017, (Elsevier,
                                                    389-410.
                                                    <a href="http://dx.doi.org/10.1016/B978-0-12-800946-8.00021-0"
                                                       target="blank">http://dx.doi.org/10.1016/B978-0-12-800946-8.00021-0</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection

