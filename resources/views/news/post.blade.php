@extends('layout.app')
@section('content')
    <section class="container">
        <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->text }}</p>
    </section>
@endsection
