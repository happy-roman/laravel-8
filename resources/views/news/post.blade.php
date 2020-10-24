@extends('layouts.app')
@section('content')
    <section class="container">
        <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->text }}</p>
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
    </section>
@endsection
