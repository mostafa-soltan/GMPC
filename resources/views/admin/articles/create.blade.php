@extends('layouts.app', ['title' => __('Articles Management')])

@section('content')
    @include('admin.users.partials.header', ['title' => __('Add Article')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Article Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('articles.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/admin/articles" enctype="multipart/form-data" autocomplete="off">
                            @csrf


                            <h6 class="heading-small text-muted mb-4">{{ __('Article information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
                                    <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="{{ $xml->record->title }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('abstract') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-abstract">{{ __('Abstract') }}</label>
                                    <textarea name="abstract" id="editor" class="form-control form-control-alternative{{ $errors->has('abstract') ? ' is-invalid' : '' }}" placeholder="{{ __('Abstract') }}" required autofocus>
                                        {{ $xml->record->abstract }}
                                    </textarea>

                                    @if ($errors->has('abstract'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('abstract') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('pdf_file') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-pdf_file">{{ __('PDF') }}</label>
                                    <input type="file" name="pdf_file" id="input-pdf_file" class="form-control form-control-alternative{{ $errors->has('pdf_file') ? ' is-invalid' : '' }}" required>

                                    @if ($errors->has('pdf_file'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('pdf_file') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <!--
                                <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-link">{{ __('PDF Link') }}</label>
                                    <input type="text" name="link" id="input-link" class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('PDF Link') }}" value="{{ $xml->record->fullTextUrl }}" required autofocus>

                                    @if ($errors->has('link'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('link') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                -->
                                <div class="form-group{{ $errors->has('publication_date') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-publication_date">{{ __('Publication Date') }}</label>
                                    <input type="date" name="publication_date" id="input-publication_date" class="form-control form-control-alternative{{ $errors->has('publication_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Publication Date') }}" value="{{ $xml->record->publicationDate }}" required autofocus>

                                    @if ($errors->has('publication_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('publication_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span>* {{ $xml->record->journalTitle }}</span>
                                <div class="form-group{{ $errors->has('journal_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-journal_id">{{ __('Journal') }}</label>
                                    <select name="journal_id" class="form-control" required>
                                        @foreach(App\Models\Journal::all()->where('status', 1) as $journal)
                                            <option <?php if (strtolower($xml->record->journalTitle) == strtolower($journal->name)){echo 'selected';} ?> value="<?php if (strtolower($xml->record->journalTitle) == strtolower($journal->name)){echo $journal->id;} ?>">{{ $journal->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('journal_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('journal_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span>* {{ $xml->record->volume }}</span>
                                <div class="form-group{{ $errors->has('volume') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-volume">{{ __('Volume') }}</label>
                                    <input type="text" name="volume" id="input-volume" class="form-control form-control-alternative{{ $errors->has('volume') ? ' is-invalid' : '' }}" placeholder="{{ __('Volume') }}" value="{{ $xml->record->volume }}" >

                                    @if ($errors->has('volume'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('volume') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span>* {{ $xml->record->issue }}</span>
                                <div class="form-group{{ $errors->has('issue') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-issue">{{ __('Issue') }}</label>
                                    <input type="text" name="issue" id="input-issue" class="form-control form-control-alternative{{ $errors->has('issue') ? ' is-invalid' : '' }}" placeholder="{{ __('Issue') }}" value="{{ $xml->record->issue }}" >

                                    @if ($errors->has('issue'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('issue') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <span>* Article year must be <strong>match</strong> with volume year</span>
                                <div class="form-group{{ $errors->has('year') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-year">{{ __('Year') }}</label>
                                    <input type="text" name="year" id="input-year" class="form-control form-control-alternative{{ $errors->has('year') ? ' is-invalid' : '' }}" placeholder="{{ __('Year') }}" value="{{ old('year') }}" required autofocus>

                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('rtopic') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-rtopic">{{ __('Research Topic') }}</label>
                                    <select name="rtopic_id" class="form-control" required>
                                        @foreach(App\Models\Researchtopic::all() as $researchtopic)
                                            <option value="{{ $researchtopic->id }}">{{ $researchtopic->title }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('rtopic'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rtopic_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('stauts') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-stauts">{{ __('Status') }}</label>
                                <select name="status" class="form-control" required>
                                        <option value="0">In Press</option>
                                        <option value="1">Publish</option>
                                </select>
                                @if ($errors->has('stauts'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('stauts') }}</strong>
                                        </span>
                                @endif
                            </div>
                                <div class="form-group{{ $errors->has('start_page') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-start_page">{{ __('First Page') }}</label>
                                    <input type="number" name="start_page" id="input-start_page" class="form-control form-control-alternative{{ $errors->has('start_page') ? ' is-invalid' : '' }}" placeholder="{{ __('First Page') }}" value="{{ $xml->record->startPage }}" >

                                    @if ($errors->has('start_page'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('start_page') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('end_page') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-end_page">{{ __('Last Page') }}</label>
                                    <input type="number" name="end_page" id="input-end_page" class="form-control form-control-alternative{{ $errors->has('end_page') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Page') }}" value="{{ $xml->record->endPage }}" required autofocus>

                                    @if ($errors->has('end_page'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('end_page') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('doi') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-doi">{{ __('DOI') }}</label>
                                    <input type="text" name="doi" id="input-doi" class="form-control form-control-alternative{{ $errors->has('doi') ? ' is-invalid' : '' }}" placeholder="{{ __('DOI') }}" value="{{ $xml->record->doi }}" required autofocus>

                                    @if ($errors->has('doi'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('doi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('authors') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-authors">{{ __('Authors') }}</label>
                                        <input type="text" name="authors" id="input-authors" class="form-control form-control-alternative{{ $errors->has('authors') ? ' is-invalid' : '' }}" placeholder="{{ __('Authors') }}" value="@foreach($xml->xpath('//author') as $author) {{ $author->name }} @endforeach" required autofocus>
                                    @if ($errors->has('authors'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('authors') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('keywords') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-keywords">{{ __('Keywords') }}</label>
                                        <input type="text" name="keywords" id="input-keywords" class="form-control form-control-alternative{{ $errors->has('keywords') ? ' is-invalid' : '' }}" placeholder="{{ __('Keywords') }}" value="@foreach($xml->xpath('//keyword') as $keyword){{ $keyword }} @endforeach" required autofocus>
                                    @if ($errors->has('keywords'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('keywords') }}</strong>
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

