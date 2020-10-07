@extends('admin.index')

@section('content-admin')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.create') }}">

                            @csrf

                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control"
                                       value="">{{--{{ old('title') }}--}}
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category_id" id="newsCategory" class="form-control">

                                    @forelse($categories as $item)
                                        <option  value="{{ $item['id'] }}">{{ $item['title'] }}</option>
                                        {{--@if ($item['id'] == old('category_id')) selected @endif--}}
                                    @empty
                                        <option value="0">Нет категорий</option>
                                    @endforelse

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control">{{--{{ old('text') }}--}}</textarea>
                            </div>

                            <div class="form-check">
                                {{--@if (old('isPrivate')) checked @endif--}}
                                <input  id="newsPrivate" name="isPrivate" type="checkbox" value="1"
                                       class="form-check-input">
                                <label for="newsPrivate">Приватная</label>

                            </div>

                            <div class="form-group">
                                <input class="btn btn-outline-primary rounded" type="submit" value="Добавить новость">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
