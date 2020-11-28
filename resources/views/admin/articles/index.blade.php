@extends('layouts.app', ['title' => __('Articles Management')])

@section('content')
    @include('layouts.headers.cards')
    @include('includes.errors')
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Articles') }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <form action="/admin/articles/create" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6 ml-2">
                                <div class="form-group">
                                    <input type="file" name="xml" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <input class="btn btn-primary" type="submit" name="import" value="Import XML">
                            </div>
                        </div>
                    </form>

                    @if(count($articles))
                        <div class="row">

                            @foreach($articles as $article)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ $article->journal->name }}
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $article->title;?></h5>
                                            <p class="card-text"><?php echo $article->abstract;?></p>
                                            <span style="font-weight: 600; color: black">Publication Date: </span><span>{{ date('F d, Y', strtotime($article->publication_date)) }}</span><br>
                                            <span style="font-weight: 600; color: black">Status: </span><span style="color: <?php if($article->status == 0){echo 'red';}else{echo 'green';}?> "><?php if($article->status == 0){echo 'In Press';}else{echo 'Publish';}?></span><br>
                                            <form method="POST" action="{{ route('articles.destroy', $article) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <input class="btn btn-danger btn-sm" type="button" name="deletejournal" value="Delete" onclick="confirm('{{ __("Are you sure you want to delete this article?") }}') ? this.parentElement.submit() : ''">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <p>No Articles Found.</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $articles->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection


