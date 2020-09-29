@extends('layouts.app')

@section('content')
	<section class="edit-category">
		<div class="container">

			{{ Form::open(['route' => ['blog.admin.posts.store'], 'method' => 'post']) }}
				<div class="row">

					@include('blog.admin.posts.includes.validation')

					<div class="col-md-8">
						<div class="edit-category__left card">
							<div class="card-header">
								Черновик
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
											{{ Form::text('title', null, ['class' => 'form-control']) }}
										</div>
										<div class="form-group">
											{{ Form::label('article', 'Статья') }}
											{{ Form::textarea('article', null, ['class' => 'form-control', 'rows' => '20']) }}
										</div>
									</div>

									<div class="tab-pane fade" id="additional-data" role="tabpanel" aria-labelledby="additional-data-tab">
										<div class="form-group">
											{{ Form::label('blog_category_id', 'Категория') }}
											<div class="edit-category__select">
												{{ Form::select('blog_category_id', $selectList, null, ['placeholder' => 'Выберите категорию', 'class' => 'form-control']) }}
												<i class="fas fa-chevron-down"></i>
											</div>
										</div>
										<div class="form-group">
											{{ Form::label('slug', 'Идентификатор') }}
											{{ Form::text('slug', null, ['class' => 'form-control']) }}
										</div>
										<div class="form-group">
											{{ Form::label('excerpt', 'Выдержка') }}
											{{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '3']) }}
										</div>
										<div class="form-check">
											{{ Form::hidden('is_published', 0) }}
											{{ Form::checkbox('is_published', 1, false, ['id' => 'is_published', 'class' => 'form-check-input']) }}
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
					</div>

				</div>
			{{ Form::close() }}

		</div>
	</section>
@endsection