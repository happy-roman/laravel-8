@extends('layout.app')
@section('content')

<section class="container">
    <h1 class="font-weight-bold">News of {{ $category }}</h1>
    <hr>
    @if($news)
        @forelse($news as $item)
            <ul>
                <h3 class="font-weight-bold">{{ $item['title'] }}</h3>
                @if (!$item['isPrivate'])
                    <li class="my-3 nav-link font-weight-bold">
                        <a href="{{ route('news.category.post', $item['id']) }}">Подробнее..</a>
                    </li>
                @endif
            </ul>
        @empty
            Нет новостей
        @endforelse
    @endif

</section>

@endsection
