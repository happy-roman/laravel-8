@extends('layout.app')
@section('content')
    <section class="container">
        <ul>
            <li><a href="{{url('post/1')}}">Post-1</a></li>
            <li><a href="{{url('post/2')}}">Post-2</a></li>
        </ul>


    </section>
@endsection
