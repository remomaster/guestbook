@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nachname" class="col-md-4 col-form-label text-md-right">{{ __('Nachname') }}</label>

                            <div class="col-md-6">
                                <input id="nachname" type="text" class="form-control @error('nachname') is-invalid @enderror" name="nachname" value="{{ old('nachname') }}" required autocomplete="nachname">

                                @error('nachname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                
                                <ul>
                                    <li>@error('password') <span class="invalid-feedback" style="display: block; font-size: 0.9rem;" role="alert"><strong> @enderror Min. 8 Zeichen</strong></span></li>
                                    <li>@error('password') <span class="invalid-feedback" style="display: block; font-size: 0.9rem;" role="alert"><strong> @enderror Min. 1 Grossbuchstaben, Kleinbuchstaben, Sonderzeichen und Zahl</li>
                                </ul>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="geburtstag" class="col-md-4 col-form-label text-md-right">{{ __('Geburtstag') }}</label>

                            <div class="col-md-6">
                                <input id="geburtstag" type="date" class="form-control @error('geburtstag') is-invalid @enderror" name="geburtstag" value="{{ old('geburtstag') }}" required autocomplete="geburtstag">

                                @error('geburtstag')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="geschlecht" class="col-md-4 col-form-label text-md-right">{{ __('Geschlecht') }}</label>

                            <div class="col-md-6">
                                <div style="margin-bottom: 5px" >                         
                                    <label style="float: left" for="geschlechtM">Männlich</label>
                                    <input style="width: 30%" id="geschlechtM" type="radio" class="form-control @error('geschlecht') is-invalid @enderror" name="geschlecht" value="Mann" required >   
                                </div>
                                <div>                          
                                    <label style="float: left" for="geschlechtF">Weiblich</label>
                                    <input style="width: 30%" id="geschlechtF" type="radio" class="form-control @error('geschlecht') is-invalid @enderror" name="geschlecht" value="Frau" required >  
                                </div>
                                

                                @error('geschlecht')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
