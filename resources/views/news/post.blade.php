@extends('layout.app')
@section('content')
    <section class="container">
        <div class="card-img" style="background-image: url({{$item->image ?? asset('storage/default.jpeg')}})"></div>
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->text }}</p>
        <a type="button" class="btn btn-outline-info rounded " data-ripple-color="dark" href="{{ route('admin.edit') }}">Изменить</a>
        <a type="button" class="btn btn-outline-danger rounded " data-ripple-color="dark" href="{{ route('admin.delete') }}">Удалить</a>
    </section>
@endsection
