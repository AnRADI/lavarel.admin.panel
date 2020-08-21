@extends('layouts.app')

@section('content')
	<section class="edit-category">
		<div class="container">

			{{ Form::open(['route' => ['blog.admin.posts.update', $row->id], 'method' => 'patch']) }}
				<div class="row">

					@include('blog.admin.posts.includes.validation')

					<div class="col-md-8">
						<div class="edit-category__left card">
							<div class="card-header">
								@if($row->is_published)
									Опубликовано
								@else
									Черновик
								@endif
							</div>

							<div class="card-body">
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
											{{ Form::text('title', $row->title, ['class' => 'form-control']) }}
										</div>
										<div class="form-group">
											{{ Form::label('article', 'Статья') }}
											{{ Form::textarea('article', $row->article, ['class' => 'form-control', 'rows' => '20']) }}
										</div>
									</div>

									<div class="tab-pane fade" id="additional-data" role="tabpanel" aria-labelledby="additional-data-tab">
										<div class="form-group">
											{{ Form::label('blog_category_id', 'Категория') }}
											<div class="edit-category__select">
												{{ Form::select('blog_category_id', $selectList, $row->blog_category_id, ['placeholder' => 'Выберите категорию', 'class' => 'form-control']) }}
												<i class="fas fa-chevron-down"></i>
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('slug', 'Идентификатор') }}
											{{ Form::text('slug', $row->slug, ['class' => 'form-control']) }}
										</div>
										<div class="form-group">
											{{ Form::label('excerpt', 'Выдержка') }}
											{{ Form::textarea('excerpt', $row->excerpt, ['class' => 'form-control', 'rows' => '3']) }}
										</div>
										<div class="form-check">
											{{ Form::hidden('is_published', 0) }}
											{{ Form::checkbox('is_published', 1, $row->is_published, ['id' => 'is_published', 'class' => 'form-check-input']) }}
											{{ Form::label('is_published', 'Опубликовано', ['class' => 'form-check-label']) }}
										</div>
									</div>
								</div>
							</div>


						</div>
					</div>

					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								{{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
							</div>
						</div>

						<div class="card">
							<div class="card-body">
								<ul>
									<li>ID: {{ $row->id }} </li>
								</ul>
							</div>
						</div>

						<div class="edit-category__status card">
							<div class="card-body">
								<div class="form-group">
									{{ Form::label(null, 'Создано') }}
									{{ Form::text(null, $row->created_at, ['class' => 'form-control', 'disabled']) }}
								</div>
								<div class="form-group">
									{{ Form::label(null, 'Изменено') }}
									{{ Form::text(null, $row->updated_at, ['class' => 'form-control', 'disabled']) }}
								</div>
								<div class="form-group">
									{{ Form::label(null, 'Опубликовано') }}
									{{ Form::text(null, $row->published_at, ['class' => 'form-control', 'disabled']) }}
								</div>
							</div>
						</div>
					</div>

				</div>
			{{ Form::close() }}

			{{ Form::open(['route' => ['blog.admin.posts.destroy', $row->id], 'method' => 'delete']) }}
				<div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="card-body ml-auto">
								<button class="btn btn-link" type="submit">Удалить</button>
							</div>
						</div>
					</div>
				</div>
			{{ Form::close() }}

		</div>
	</section>
@endsection