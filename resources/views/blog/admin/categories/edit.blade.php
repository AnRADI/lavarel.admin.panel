@extends('layouts.app')

@section('content')
	<section class="edit-category">
		@if($item->exists)
			{{ Form::open(['route' => ['blog.admin.categories.update', $item->id], 'method' => 'patch']) }}
		@else
			{{ Form::open(['route' => ['blog.admin.categories.store'], 'method' => 'post']) }}
		@endif
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
								<ul>
									<li><a class="active" href="#">Основные данные</a></li>
								</ul>
								<div>
									{{ Form::label('title', 'Заголовок') }}
									{{ Form::text('title', $item->title) }}
								</div>
								<div>
									{{ Form::label('slug', 'Идентификатор') }}
									{{ Form::text('slug', $item->slug) }}
								</div>
								<div>
									{{ Form::label('parent_id', 'Родитель') }}
									<div>
										{{ Form::select('parent_id', $selectList, null, ['placeholder' => 'Выберите категорию']) }}
										<i class="fas fa-chevron-down"></i>
									</div>
								</div>
								<div>
									{{ Form::label('description', 'Описание') }}
									{{ Form::textarea('description', old('description', $item->description), ['rows' => '3']) }}
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="edit-category__save decor-1">
								{{ Form::submit('Сохранить', ['class' => 'btn btn-primary']) }}
							</div>

							@if($item->exists)
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
										{{ Form::label(null, 'Удалено') }}
										{{ Form::text(null, $item->deleted_at, ['disabled']) }}
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>
			{{ Form::close() }}
	</section>
@endsection