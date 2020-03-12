@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Deine Blogeinträge</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($blogeintrags as $blogeintrag)
                        @component('com.blogeintrag')    
                            @slot('titel') {{ $blogeintrag->titel }} @endslot
                            @slot('date') {{ $blogeintrag->created_at->format('d-m-Y') }} @endslot
                            @slot('inhalt') {{ $blogeintrag->inhalt }} @endslot           
                            @slot('autor') {{ $blogeintrag->autor->name }} @endslot           
                        @endcomponent
                    @endforeach
                    {{ $blogeintrags->currentPage() }} / {{ ceil(App\Blogeintrag::whereUser_id(Auth::id())->count()/5) }}
                    {{ $blogeintrags->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
