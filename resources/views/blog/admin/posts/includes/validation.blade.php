{{-- @error('title')
	<div class="col-md-11">
		<div class="alert alert-danger">{{ $message }}</div>
	</div>
@enderror
@error('article')
	<div class="col-md-11">
		<div class="alert alert-danger">{{ $message }}</div>
	</div>
@enderror --}}
@if ($errors->any())
	<div class="col-md-11">
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	</div>
@endif

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