@extends('layouts.app')

@section('content')
	<section class="edit-category">

		{{ Form::open(['route' => ['blog.admin.posts.update', $item->id], 'method' => 'patch']) }}
			<div class="container">
				<div class="row">

					@error('title')
						<div class="col-md-11">
							<div class="alert alert-danger fade show" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								{{ $message }}
							</div>
						</div>
					@enderror
					@if(session('success'))
						<div class="col-md-11">
							<div class="alert alert-success fade show" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								{{ session()->get('success') }}
							</div>
						</div>
					@endif

					<div class="col-md-8">
						<div class="edit-category__left decor-1">

							<ul class="nav nav-tabs" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link active" id="main-data-tab" data-toggle="tab" href="#main-data" role="tab" aria-controls="main-data" aria-selected="true">Основные данные</a>
								</li>

								<li class="nav-item" role="presentation">
									<a class="nav-link" id="additional-data-tab" data-toggle="tab" href="#additional-data" role="tab" aria-controls="additional-data" aria-selected="false">Доп. данные</a>
								</li>
							</ul>

							<div class="tab-content">

								<div class="tab-pane fade show active" id="main-data" role="tabpanel" aria-labelledby="main-data-tab">
									<div class="form-group">
										{{ Form::label('title', 'Заголовок') }}
										{{ Form::text('title', $item->title, ['class' => 'form-control']) }}
									</div>
									<div class="form-group">
										{{ Form::label('content-row', 'Статья') }}
										{{ Form::textarea('content-row', $item->content_row, ['rows' => '20']) }}
									</div>
								</div>

								<div class="tab-pane fade" id="additional-data" role="tabpanel" aria-labelledby="additional-data-tab">
									<div class="form-group">
										{{ Form::label('category_id', 'Категория') }}
										<div>
											{{ Form::select('category_id', $selectList, $item->blog_category_id, ['placeholder' => 'Выберите категорию']) }}
											<i class="fas fa-chevron-down"></i>
										</div>
									</div>
									<div class="form-group">
										{{ Form::label('slug', 'Идентификатор') }}
										{{ Form::text('slug', $item->slug) }}
									</div>
									<div class="form-group">
										{{ Form::label('excerpt', 'Выдержка') }}
										{{ Form::textarea('excerpt', $item->excerpt, ['rows' => '3']) }}
									</div>
									<div class="form-group">
										{{ Form::checkbox('is_published', $item->is_published, $item->is_published) }}
										{{ Form::label('is_published', 'Опубликовано') }}
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="col-md-3">
						<div class="edit-category__save decor-1">
							{{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
						</div>

						<ul class="edit-category__info decor-1">
							<li>ID: {{ $item->id }} </li>
						</ul>

						<div class="edit-category__status decor-1">
							<div>
								{{ Form::label(null, 'Создано') }}
								{{ Form::text(null, $item->created_at, ['disabled']) }}
							</div>
							<div>
								{{ Form::label(null, 'Изменено') }}
								{{ Form::text(null, $item->updated_at, ['disabled']) }}
							</div>
							<div>
								{{ Form::label(null, 'Опубликовано') }}
								{{ Form::text(null, $item->published_at, ['disabled']) }}
							</div>
						</div>
					</div>

				</div>
			</div>
		{{ Form::close() }}

	</section>
@endsection