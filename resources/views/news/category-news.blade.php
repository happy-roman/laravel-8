@extends('layouts.app')
@section('content')

<section class="container">
    <h1 class="font-weight-bold">News of {{ $category->title }}</h1>
    <hr>
    @if($news)
        @forelse($news as $item)
            <ul>
                <h3 class="font-weight-bold">{{ $item->title }}</h3>
                <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
                @if (!$item->isPrivate || Auth::check())
                    <li class="my-3 nav-link font-weight-bold">
                        <a href="{{ route( 'news.category.post', $item->id ) }}">Подробнее..</a>
                    </li>
                @endif
                <hr>
            </ul>
        @empty
            Нет новостей
        @endforelse
    @endif

</section>

@endsection
