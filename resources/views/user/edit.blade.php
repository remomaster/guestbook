@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bearbeite: {{ $euser->name }}</div>

                <div class="card-body">
                    <form id="updateform" method="POST" action="{{ route('user.update', $euser) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $euser->name }}" autofocus>

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
                                <input id="nachname" type="text" class="form-control @error('nachname') is-invalid @enderror" name="nachname" value="{{ $euser->nachname }}">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $euser->email }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="geburtstag" class="col-md-4 col-form-label text-md-right">{{ __('Geburtstag') }}</label>

                            <div class="col-md-6">
                                <input id="geburtstag" type="date" class="form-control @error('geburtstag') is-invalid @enderror" name="geburtstag" value="{{ $euser->geburtstag->format('Y-m-d') }}" >

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
                                    <input style="width: 30%" id="geschlechtM" type="radio" class="form-control @error('geschlecht') is-invalid @enderror" name="geschlecht" value="Mann" @if ($euser->geschlecht == 'Mann') checked @endif>   
                                </div>
                                <div>                          
                                    <label style="float: left" for="geschlechtF">Weiblich</label>
                                    <input style="width: 30%" id="geschlechtF" type="radio" class="form-control @error('geschlecht') is-invalid @enderror" name="geschlecht" value="Frau" @if ($euser->geschlecht == 'Frau') checked @endif>  
                                </div>
                                

                                @error('geschlecht')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Rechte') }}</label>

                            <div class="col-md-6">
                                <select name="role">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" @if ($euser->role->is($role)) selected @endif>{{ $role->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                    </form>
                    <div class="row">
                        <div class="col-md-1  offset-md-4" style="inline">
                            <button type="submit" form="updateform" class="btn btn-primary">
                                speichern
                            </button>
                        </div>
                    <form action="{{ route('user.index') }}" id="back"></form> 
                        <div class="col-md-1  offset-md-1" style="inline">
                            <button type="submit" form="back" class="btn btn-primary" >
                                zurück
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
