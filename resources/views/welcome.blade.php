@extends('layouts.app')


@section('content')
<div class="content">
    <div class="title">
        Guestbook
    </div>    
    <div class="container" style="width: 700px" >
        @foreach ($blogeintrags as $blogeintrag)
            @component('com.blogeintrag')    
                @slot('titel') {{ $blogeintrag->titel }} @endslot
                @slot('date') {{ $blogeintrag->created_at->format('d-m-Y') }} @endslot
                @slot('inhalt') {{ $blogeintrag->inhalt }} @endslot           
                @slot('autor') {{ $blogeintrag->autor()->withTrashed()->first()->name }} @endslot           
            @endcomponent
        @endforeach
        {{ $blogeintrags->currentPage() }} / {{ ceil(App\Blogeintrag::all()->count()/5) }}
        {{ $blogeintrags->links() }}

    </div>            
</div>   
@endsection