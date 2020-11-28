<?php

use App\Models\Article;
use App\Models\Editor;
use App\Models\Journal;
use App\Models\Lnew;
use App\Models\Researchtopic;

$articles_count = Article::all()->count();
$articlespub_count = Article::all()->where('status', 1)->count();
$articlesinpress_count = Article::all()->where('status', 0)->count();
$journals_count = Journal::all()->count();
$journalsactive_count = Journal::all()->where('status', 1)->count();
$journalscoms_count = Journal::all()->where('status', 0)->count();
$editors_count = Editor::all()->count();
$editorsed_count = Editor::all()->where('chief_in_editor', 0)->count();
$Chiefineditors_count = Editor::all()->where('chief_in_editor', 1)->count();
$lnews_count = Lnew::all()->count();
$rtopics_count = Researchtopic::all()->count();

?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Articles</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="/admin/articles">{{ $articles_count }}</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="far fa-newspaper"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="font-weight-600">Publish: </span><span  class="text-success mr-2 font-weight-600">{{ $articlespub_count }}</span><br>
                                <span class="font-weight-600">In Press: </span><span class="text-danger mr-2 font-weight-600">{{ $articlesinpress_count }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Journals</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="/admin/journals">{{ $journals_count }}</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="font-weight-600">Active: </span><span  class="text-success mr-2 font-weight-600">{{ $journalsactive_count }}</span><br>
                                <span class="font-weight-600">Coming Soon: </span><span class="text-danger mr-2 font-weight-600">{{ $journalscoms_count }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Editors</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="/admin/editors">{{ $editors_count }}</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-user-edit"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="font-weight-600">Editors In Chief: </span><span  class="text-success mr-2 font-weight-600">{{ $Chiefineditors_count }}</span><br>
                                <span class="font-weight-600">Editors: </span><span class="text-danger mr-2 font-weight-600">{{ $editorsed_count }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Research Topics</h5>
                                    <span class="h2 font-weight-bold mb-0"><a href="/admin/rtopics">{{ $rtopics_count }}</a></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
