@extends('layouts.app', ['title' => __('Research Topic Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Topic')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Research Topic Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('rtopics.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('rtopics.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Topic information') }}</h6>
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
                                <div class="form-group{{ $errors->has('overview') ? ' has-danger' : '' }}">
                                    <label class="form-control-label">{{ __('Overview') }}</label>
                                    <textarea name="overview" class="form-control form-control-alternative{{ $errors->has('overview') ? ' is-invalid' : '' }}" placeholder="{{ __('Overview') }}"></textarea>

                                    @if ($errors->has('overview'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('overview') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('editor1') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-editor1">{{ __('Editor') }}</label>
                                    <input type="text" name="editor1" id="input-editor1" class="form-control form-control-alternative{{ $errors->has('editor1') ? ' is-invalid' : '' }}" placeholder="{{ __('Editor') }}" value="{{ old('editor1') }}" required>

                                    @if ($errors->has('editor1'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('editor1') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('editor2') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-editor2">{{ __('Editor') }}</label>
                                    <input type="text" name="editor2" id="input-editor2" class="form-control form-control-alternative{{ $errors->has('editor2') ? ' is-invalid' : '' }}" placeholder="{{ __('Editor') }}" value="{{ old('editor2') }}" required>

                                    @if ($errors->has('editor2'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('editor2') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('editor3') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-editor3">{{ __('Editor') }}</label>
                                    <input type="text" name="editor3" id="input-editor3" class="form-control form-control-alternative{{ $errors->has('editor3') ? ' is-invalid' : '' }}" placeholder="{{ __('Editor') }}" value="{{ old('editor3') }}" required>

                                    @if ($errors->has('editor3'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('editor3') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('editor4') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-editor4">{{ __('Editor') }}</label>
                                    <input type="text" name="editor4" id="input-editor4" class="form-control form-control-alternative{{ $errors->has('editor4') ? ' is-invalid' : '' }}" placeholder="{{ __('Editor') }}" value="{{ old('editor4') }}" required>

                                    @if ($errors->has('editor4'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('editor4') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('journal_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-journal_id">{{ __('Journal') }}</label>

                                    <select name="journal_id" class="form-control" required>
                                        @foreach(App\Journal::all()->where('status', 1) as $journal)
                                            <option value="{{ $journal->id }}">{{ $journal->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('journal_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('journal_id') }}</strong>
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
