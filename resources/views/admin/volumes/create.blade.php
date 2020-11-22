@extends('layouts.app', ['title' => __('Volume Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Volume')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Volume Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('volumes.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('volumes.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Volume information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('volume_no') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-volume_no">{{ __('Volume No.') }}</label>
                                    <input type="number" name="volume_no" id="input-volume_no" class="form-control form-control-alternative{{ $errors->has('volume_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Volume No.') }}" value="{{ old('volume_no') }}" required autofocus>

                                    @if ($errors->has('volume_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('volume_no') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-year">{{ __('YEAR') }}</label>
                                    <input type="number" name="year" id="input-year" class="form-control form-control-alternative{{ $errors->has('year') ? ' is-invalid' : '' }}" placeholder="{{ __('Year') }}" value="{{ old('year') }}" required>

                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('year') }}</strong>
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
