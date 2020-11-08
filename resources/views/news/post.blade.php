@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="card-img" style="background-image: url({{$news->image ?? asset('storage/default.jpeg')}})"></div>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->description }}</p>
        <a href="{{ $news->link }}" target="_blank">Читать из источника</a>
        @if( Auth::user() && Auth::user()->is_admin !== 0)
            <form method="POST" action="{{ route('admin.news.destroy', $news) }}"
                  class="d-flex justify-content-between">
                <a type="button" class="btn btn-outline-success rounded"
                   data-ripple-color="dark"
                   href="{{ route('admin.news.edit', $news) }}" methods="put">Редактировать</a>
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-outline-danger rounded"
                       data-ripple-color="dark"
                       value="Удалить">
            </form>
        @endif
    </section>
@endsection
