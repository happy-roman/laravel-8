@extends('layout.app')
@section('content')

<section class="container">
    <h1>news of {{ $name }}</h1>
    <ul>
        <li class="my-3 nav-link font-weight-bold"><a href="<?=route('news.category.post', ['id'=> '1'])?>">news-1</a></li>
        <li class="my-3 nav-link font-weight-bold"><a href="<?=route('news.category.post', ['id'=> '2'])?>">news-2</a></li>
    </ul>
</section>

@endsection
