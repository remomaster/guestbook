@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Neuer Blogeintrag</div>

                <div class="card-body">                    
                    <form method="POST" action="{{ route('blogeintrag.store') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="titel" class="col-md-4 col-form-label text-md-right">{{ __('Titel') }}</label>

                            <div class="col-md-6">
                                <input id="titel" type="text" class="form-control @error('titel') is-invalid @enderror" name="titel" value="{{ old('Titel') }}" required autofocus>

                                @error('titel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inhalt" class="col-md-4 col-form-label text-md-right">{{ __('Eintrag') }}</label>

                            <div class="col-md-6">
                                <textarea id="inhalt" class="form-control @error('inhalt') is-invalid @enderror" name="inhalt" value="{{ old('Eintrag') }}" required ></textarea>
                                @error('inhalt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('veröffentlichen') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
