@extends('layout.app')
@section('content')
    <section class="container">
        @if($news)

                <h2>{{ $news['title'] }}</h2>
                <p>{{ $news['text'] }}</p>

        @else
            <p class="h-2 font-weight-bold">Такой новости нет</p>
        @endif
    </section>
@endsection
