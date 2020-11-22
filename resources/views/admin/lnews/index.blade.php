@extends('layouts.app', ['title' => __('Latest News Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Latest News') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('lnews.create') }}" class="btn btn-sm btn-primary">{{ __('Add New') }}</a>
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
                    @if(count($lnews))
                        <div class="row">

                            @foreach($lnews as $new)
                                <div class="col-sm-3">
                                    <div class="card" style="width: 14.5rem;">
                                        @if($new->photo)
                                            <img height="150" width="180" src="/images/{{ $new->photo->filename }}" class="card-img-top" alt="news photo">
                                        @else
                                            <img height="150" width="180" src="/images/default.jpg" class="card-img-top" alt="news photo">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title" title="{{ $new->title }}">{{ \Str::limit($new->title, 20) }}</h5>
                                            <h5 class="card-title"><span style="font-weight: bold;">Author: </span>{{ $new->author }}</h5>
                                            <h5 class="card-title"><span style="font-weight: bold;">Publish Date: </span>{{ $new->publish_date }}</h5>
                                            <p class="card-text">{{ \Str::limit($new->body) }}</p>

                                            <form method="POST" action="{{ route('lnews.destroy', $new) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('lnews.edit', $new) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('lnews.show', $new) }}" class="btn btn-primary btn-sm">Show</a>
                                                <input class="btn btn-danger btn-sm" type="button" name="deletenew" value="Delete" onclick="confirm('{{ __("Are you sure you want to delete this new?") }}') ? this.parentElement.submit() : ''">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <p>No Journals Found.</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $lnews->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
