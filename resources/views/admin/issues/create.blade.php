@extends('layouts.app', ['title' => __('Issue Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Issue')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Issue Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('issues.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('issues.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Issue information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('issue_no') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-issue_no">{{ __('Issue No.') }}</label>
                                    <input type="number" name="issue_no" id="input-issue_no" class="form-control form-control-alternative{{ $errors->has('issue_no') ? ' is-invalid' : '' }}" placeholder="{{ __('Issue No.') }}" value="{{ old('issue_no') }}" required autofocus>

                                    @if ($errors->has('issue_no'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('issue_no') }}</strong>
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
