@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Categories news</h1>
        <hr>
        <ul>
            @foreach($categories as $item)
                <li class="my-3 nav-link font-weight-bold"><a href="{{route('news.category.name', $item->slug)}}">{{ $item->title }}</a></li>
            @endforeach
        </ul>
    </section>
@endsection
