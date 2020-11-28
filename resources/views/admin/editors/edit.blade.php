@extends('layouts.app', ['title' => __('Editor Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Edit Editor')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Editor Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('editors.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('editors.update', $editor) }}" autocomplete="off">
                            @csrf
                            @method('PATCH')

                            <h6 class="heading-small text-muted mb-4">{{ __('Editor information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ $editor->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('affiliation') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-affiliation">{{ __('Affiliation') }}</label>
                                    <input type="text" name="affiliation" id="input-affiliation" class="form-control form-control-alternative{{ $errors->has('affiliation') ? ' is-invalid' : '' }}" placeholder="{{ __('Affiliation') }}" value="{{ $editor->affiliation }}" required>

                                    @if ($errors->has('affiliation'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('affiliation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('chief_in_editor') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-chief_in_editor">{{ __('Status') }}</label>

                                    <select name="chief_in_editor" class="form-control">
                                        <option <?php if ($editor->chief_in_editor == 0){ echo 'selected';} ?> value="0">Editor</option>
                                        <option <?php if ($editor->chief_in_editor == 1){ echo 'selected';} ?> value="1">Editor In Chief</option>
                                    </select>

                                    @if ($errors->has('chief_in_editor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('chief_in_editor') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('journal_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-journal_id">{{ __('Journal') }}</label>

                                    <select name="journal_id" class="form-control" required>
                                        @foreach(App\Models\Journal::all() as $journal)
                                            <option <?php if ($editor->journal->id == $journal->id){ echo 'selected';} ?> value="{{ $journal->id }}">{{ $journal->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('journal_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('journal_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
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
