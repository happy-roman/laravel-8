@extends('admin.index')

@section('content-admin')

        <div class="row justify-content-center mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>Редактирование новостей</h1>
                        @forelse($news as $item)
                            <h3>{{ $item->title }}</h3>
                            <a href="{{ route( 'news.category.post', $item->id ) }}">Подробнее..</a>


                            <div class="d-flex justify-content-between">
                                <a type="button" class="btn btn-outline-success rounded" data-ripple-color="dark"
                                   href="{{ route('admin.edit', $item) }}">Редактировать</a>
                                <a type="button" class="btn btn-outline-danger rounded" data-ripple-color="dark"
                                   href="{{ route('admin.destroy', $item) }}">Удалить</a>
                            </div>


                            <hr>
                        @empty
                            Нет новостей
                        @endforelse
{{--                        {{ $news->links() }}--}}
                    </div>
                </div>
            </div>
        </div>


@endsection


