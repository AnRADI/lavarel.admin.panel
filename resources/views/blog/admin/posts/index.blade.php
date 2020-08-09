@extends('layouts.app')

@section('content')
	<section class="all-categories">
		<div class="container">

			<ul class="all-categories__links">
				<li><a class="btn btn-primary" href="{{ route('blog.admin.categories.create') }}">Написать</a></li>
			</ul>

			<div class="all-categories__table decor-1">
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Автор</th>
							<th>Категория</th>
							<th>Заголовок</th>
							<th>Дата публикации</th>
						</tr>
					</thead>
					<tbody>
						@foreach($paginator as $post)
							<tr @if(!$post->is_published) style ="background-color: #ccc;" @endif>
								<td>{{ $post->id }}</td>
								<td>{{ $post->user->name }}</td>
								<td>{{ $post->blog_category->title }}</td>
								<td><a href="{{ route('blog.admin.categories.edit', $post->id) }}"> {{ $post->title }} </a></td>
								<td>{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d.M H:i') : '' }}</td>
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