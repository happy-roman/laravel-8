@extends('layout.app')
@section('content')
    <section class="container">
        <h2>{{ $news['title'] }}</h2>
        <p>{{ $news['text'] }}</p>
    </section>
@endsection
