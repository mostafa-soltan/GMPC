@extends('layouts.app', ['title' => __('Research Topic Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Research Topics') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('rtopics.create') }}" class="btn btn-sm btn-primary">{{ __('Add Topic') }}</a>
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
                    @if(count($rtopics))
                        <div class="row">

                            @foreach($rtopics as $topic)
                                <div class="col-sm-4">
                                    <div class="card">
                                        @if($topic->photo)
                                            <img height="150" width="180" src="/images/{{ $topic->photo->filename }}" class="card-img-top" alt="news photo">
                                        @else
                                            <img height="150" width="180" src="/images/default.jpg" class="card-img-top" alt="news photo">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $topic->title }}</h5>
                                            <h5 class="card-title" style="margin:0; padding:0; font-weight: bold">Editors:</h5>
                                            <span>- {{ $topic->editor1 }}</span><br>
                                            <span>- {{ $topic->editor2 }}</span><br>
                                            <span>- {{ $topic->editor3 }}</span><br>
                                            <span>- {{ $topic->editor4 }}</span>
                                            <p class="card-text" title="{{ $topic->overview }}">{{ \Str::limit($topic->overview, 50) }}</p>
                                            <hr style="margin: 0; padding: 0;">
                                            <h6 style="margin: 0; padding: 0; font-weight: bold;">Journal Name:</h6>
                                            <span>{{ $topic->journal->name }}</span>

                                            <form method="POST" action="{{ route('rtopics.destroy', $topic) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('rtopics.edit', $topic) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="{{ route('rtopics.show', $topic) }}" class="btn btn-primary btn-sm">Show</a>
                                                <input class="btn btn-danger btn-sm" type="button" name="deletenew" value="Delete" onclick="confirm('{{ __("Are you sure you want to delete this topic?") }}') ? this.parentElement.submit() : ''">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <p>No Research Topics Found.</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $rtopics->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
