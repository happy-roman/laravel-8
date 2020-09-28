@extends('layout.app')
@section('content')
    <section class="container">
        <ul>
            <li class="my-3 nav-link font-weight-bold"><a href="<?=route('news.category.name', ['name'=> 'category-1'])?>">category-1</a></li>
            <li class="my-3 nav-link font-weight-bold"><a href="<?=route('news.category.name', ['name'=> 'category-2'])?>">category-2</a></li>
        </ul>
    </section>
@endsection
