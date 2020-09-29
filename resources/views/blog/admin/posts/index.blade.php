@extends('layouts.app')

@section('content')
	<section class="all-categories">
		<div class="container">

			<div class="row">

				@include('blog.admin.posts.includes.validation')

				<div class="col-md-11">
					<ul class="all-categories__links">
						<li><a class="btn btn-primary" href="{{ route('blog.admin.posts.create') }}">Написать</a></li>
					</ul>
				</div>

				<div class="col-md-11">
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
										<td>{{ $post->blogCategory->title }}</td>
										<td><a href="{{ route('blog.admin.posts.edit', $post->id) }}"> {{ $post->title }} </a></td>
										<td>{{ $post->isPublishedAt }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>


			</div>



			@if($paginator->total() > $paginator->count())

				<nav class="all-categories__pagination decor-1" aria-label="Page navigation example">
					{{ $paginator }}
				</nav>
			@endif



		</div>
	</section>
@endsection