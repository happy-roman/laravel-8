@extends('admin.index')
@section('content-admin')

    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>Редактирование прав пользователей</h1>

                    @forelse($users as $item)
                        <h3>{{ $item->name }}</h3>
                        @if($item->is_admin == 0)
                            <p>Пользователь не админ</p>
                        @else
                            <p>Админ</p>
                        @endif


                        <form method="post" action="{{ route('admin.users.destroy', $item) }}"
                              class="d-flex justify-content-between">
                            <a type="button" class="btn btn-outline-success rounded"
                               data-ripple-color="dark"
                               href="{{ route('admin.users.edit', $item) }}">Редактировать</a>
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-outline-danger rounded"
                                   data-ripple-color="dark"
                                   value="Удалить">
                        </form>

                        <hr>
                    @empty
                        Нет пользователей
                    @endforelse
                </div>
            </div>
        </div>
    </div>

@endsection
