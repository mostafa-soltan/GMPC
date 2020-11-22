@extends('layouts.app', ['title' => __('Latest News Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add New')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Latest News Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('lnews.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('lnews.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('New information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Body') }}</label>
                                    <textarea name="body" class="form-control form-control-alternative{{ $errors->has('body') ? ' is-invalid' : '' }}" placeholder="{{ __('Body') }}"></textarea>

                                    @if ($errors->has('body'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('body') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('author') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-author">{{ __('Author') }}</label>
                                    <input type="text" name="author" id="input-author" class="form-control form-control-alternative{{ $errors->has('author') ? ' is-invalid' : '' }}" placeholder="{{ __('Author') }}" value="{{ old('author') }}" required>

                                    @if ($errors->has('author'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('author') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('publish_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-publish_date">{{ __('Publish Date') }}</label>
                                    <input type="date" name="publish_date" id="input-publish_date" class="form-control form-control-alternative{{ $errors->has('publish_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Publish Date') }}" value="{{ old('publish_date') }}" required>

                                    @if ($errors->has('publish_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('publish_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-image">{{ __('Image') }}</label>
                                    <input type="file" name="image" id="input-image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}">

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
