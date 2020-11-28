@extends('layouts.app', ['title' => __('Journal Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Journal')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Journal Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('journals.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('journals.store') }}" enctype="multipart/form-data" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Journal information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('issn') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-issn">{{ __('ISSN') }}</label>
                                    <input type="text" name="issn" id="input-issn" class="form-control form-control-alternative{{ $errors->has('issn') ? ' is-invalid' : '' }}" placeholder="{{ __('ISSN') }}" value="{{ old('issn') }}" required>

                                    @if ($errors->has('issn'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('issn') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('abbreviation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-abbreviation">{{ __('Abbreviation') }}</label>
                                    <input type="text" name="abbreviation" id="input-abbreviation" class="form-control form-control-alternative{{ $errors->has('abbreviation') ? ' is-invalid' : '' }}" placeholder="{{ __('Abbreviation') }}" value="{{ old('abbreviation') }}" required>

                                    @if ($errors->has('abbreviation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('abbreviation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('status') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-status">{{ __('Status') }}</label>
                                    <select name="status" required class="form-control">
                                        <option value="0">Coming Soon</option>
                                        <option value="1">Active</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
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
