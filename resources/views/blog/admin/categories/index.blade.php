@extends('layouts.app')

@section('content')
    <section class="all-categories">
        <div class="container">

            <div class="all-categories__links">
                <a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Добавить</a>
            </div>

            <div class="all-categories__table decor-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Категория</th>
                            <th>Родитель</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paginator as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('blog.admin.categories.edit', $item->id) }}"> {{ $item->title }} </a></td>
                                <td @if(in_array($item->parent_id, [0, 1])) style="color: #dee2e6" @endif>
                                    {{ $item->parent_id }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($paginator->total() > $paginator->count())

                <nav class="all-categories__pagination decor-1" aria-label="Page navigation example">
                    {{ $paginator }}
                </nav>
            @endif



        </div>
    </section>
@endsection
