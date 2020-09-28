@extends('layout.app')
@section('content')
    <section class="container">
        <ul>
            <li class="my-3 nav-link font-weight-bold"><a href="<?=route('#', ['id'=> 1])?>">Post-1</a></li>
            <li class="my-3 nav-link font-weight-bold"><a href="<?=route('#', ['id'=> 2])?>">Post-2</a></li>
        </ul>
    </section>
@endsection
