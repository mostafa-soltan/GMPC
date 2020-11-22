@extends('layouts.app', ['title' => __('Branch Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Branches') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('branches.create') }}" class="btn btn-sm btn-primary">{{ __('Add Branch') }}</a>
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
                    @if(count($branches))
                        <div class="row">

                            @foreach($branches as $branch)
                                <div class="col-sm-4">
                                        <div class="card" style="width: 20rem;">
                                            <div class="card-body">
                                                <h4 class="card-title">{{ $branch->title }}</h4>
                                                <Span style="font-weight: 600;">Address: </Span><p class="card-text">{{ $branch->address }}</p>
                                                <span style="font-weight: 600;">Phone: </span><h5 class="card-title">{{ $branch->phone }}</h5>
                                                <span style="font-weight: 600;">Email: </span><h5 class="card-title">{{ $branch->email }}</h5>
                                                <form method="POST" action="{{ route('branches.destroy', $branch) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('branches.edit', $branch) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <input class="btn btn-danger btn-sm" type="button" name="deletenew" value="Delete" onclick="confirm('{{ __("Are you sure you want to delete this branch?") }}') ? this.parentElement.submit() : ''">
                                                </form>
                                            </div>
                                        </div>
                                </div>
                            @endforeach

                        </div>
                    @else
                        <p>No Branches Found.</p>
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $branches->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
