@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    <div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Latest Articles</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/admin/articles" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Article Title</th>
                                    <th scope="col">Journal Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Publish Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach(App\Models\Article::orderBy('id', 'desc')->paginate(5) as $article)
                                        <tr>
                                            <td title="{{ $article->title }}">{{ \Str::limit($article->title, 50) }}</td> <?php //ToDo::anchor link to article show ?>
                                            <td>{{ $article->journal->name }}</td>
                                            <td style="<?php if ($article->status == 1){echo 'color:green';}else{echo 'color:red';} ?>"> <?php if ($article->status == 1){echo 'Publish';}else{echo 'In Press';} ?> </td>
                                            <td>{{ date('F d, Y',strtotime($article->publication_date)) }}</td>
                                        </tr>
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mb-5 mb-xl-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Latest News</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/admin/lnews" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Body</th>
                                <th scope="col">Author</th>
                                <th scope="col">Publish Date</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(App\Models\Lnew::orderBy('id', 'desc')->paginate(5) as $lnew)
                                <tr>
                                    <td title="{{ $lnew->title }}">{{ \Str::limit($lnew->title,20) }}</td> <?php //ToDo::anchor link to article show ?>
                                    <td title="{{ $lnew->body }}">{{ \Str::limit($lnew->body, 50) }}</td>
                                    <td>{{ $lnew->author }}</td>
                                    <td>{{ date('F d, Y',strtotime($lnew->publish_date)) }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 mb-5 mb-xl-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Latest Research Topics</h3>
                            </div>
                            <div class="col text-right">
                                <a href="/admin/rtopics" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Journal Name</th>
                                <th scope="col">Editors</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach(App\Models\Researchtopic::orderBy('id', 'desc')->paginate(5) as $rtopic)
                                <tr>
                                    <td title="{{ $rtopic->title }}">{{ \Str::limit($rtopic->title, 30) }}</td> <?php //ToDo::anchor link to article show ?>
                                    <td>{{ $rtopic->journal->name }}</td>
                                    <td>
                                        <ul>
                                           <li>{{ $rtopic->editor1 }}</li>
                                           <li>{{ $rtopic->editor2 }}</li>
                                           <li>{{ $rtopic->editor3 }}</li>
                                           <li>{{ $rtopic->editor4 }}</li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
