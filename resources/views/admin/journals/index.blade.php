@extends('layouts.app', ['title' => __('Journal Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Journals') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('journals.create') }}" class="btn btn-sm btn-primary">{{ __('Add Journal') }}</a>
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

                    @if(count($journals))
                    <div class="row">

                        @foreach($journals as $journal)
                        <div class="col-sm-3">
                            <div class="card" style="width: 14.5rem;">
                                @if($journal->photo)
                                    <img height="150" width="180" src="/images/{{ $journal->photo->filename }}" class="card-img-top" alt="journal photo">
                                @else
                                    <img height="150" width="180" src="/images/default.jpg" class="card-img-top" alt="journal photo">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $journal->name }}</h5>
                                    <p class="card-text"><span style="font-weight: bold">ISSN:</span> {{ $journal->issn }}</p>
                                    <h5 style="color: {{ $journal->status == 1 ? 'Green' : 'Red' }}">{{ $journal->status == 1 ? 'Active' : 'Coming Soon' }}</h5>

                                    <form method="POST" action="{{ route('journals.destroy', $journal) }}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('journals.edit', $journal) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <input class="btn btn-danger btn-sm" type="button" name="deletejournal" value="Delete" onclick="confirm('{{ __("Are you sure you want to delete this journal?") }}') ? this.parentElement.submit() : ''">
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
                            {{ $journals->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
