@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 >Admin-page</h1>
            @include('admin.menu-admin')
            @yield('content-admin')
        </div>
    </div>
</div>
@endsection
