@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Alle Benutzer</div>

                <div class="card-body">
                    <table class="usertable">
                        <tr>
                            <th>Name</th>
                            <th>Nachname</th>
                            <th>Email</th>
                            <th>Geburtstag</th>
                            <th>Geschlecht</th>
                            <th>Registriert</th>
                            <th>Rechte</th>
                            <th></th>
                            </th>
                        </tr>
                        @foreach ($users as $user)
                        @component('com.usereintrag')    
                            @slot('user') {{ $user->id }} @endslot        
                            @slot('name') {{ $user->name }} @endslot        
                            @slot('nachname') {{ $user->nachname }} @endslot        
                            @slot('email') {{ $user->email }} @endslot        
                            @slot('geburtstag') {{ $user->geburtstag->format('d-m-Y') }} @endslot        
                            @slot('geschlecht') {{ $user->geschlecht }} @endslot        
                            @slot('registriert') {{ $user->created_at }} @endslot        
                            @slot('rechte') {{ $user->role->title }} @endslot        
                        @endcomponent
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
