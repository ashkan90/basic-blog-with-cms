@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-lg-3">
		<div class="card border-success">
			<div class="card-header text-center">Registred Accounts</div>
			<div class="card-body text-success text-center">
				<h5 class="card-title">{{ $user->count() }}</h5>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="card border-success">
			<div class="card-header text-center">Published Posts</div>
			<div class="card-body text-success text-center">
				<h5 class="card-title">{{ $post->count() }}</h5>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="card border-success">
			<div class="card-header text-center">Published Tags</div>
			<div class="card-body text-success text-center">
				<h5 class="card-title">{{ $tag->count() }}</h5>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="card border-success">
			<div class="card-header text-center">Published Category</div>
			<div class="card-body text-success text-center">
				<h5 class="card-title">{{ $category->count() }}</h5>
			</div>
		</div>
	</div>

</div>

<div class="row" style="margin-top: 2.8%">

	<div class="col-lg-3">
		<div class="card border-success">
			<div class="card-header text-center">Trashed Posts</div>
			<div class="card-body text-success text-center">
				<h5 class="card-title">{{ $trashed_post }}</h5>
			</div>
		</div>
	</div>

	<div class="col-lg-3">
		<div class="card border-success">
			<div class="card-header text-center">Created Menus</div>
			<div class="card-body text-success text-center">
				<h5 class="card-title">{{ $menu }}</h5>
			</div>
		</div>
	</div>

</div>


@endsection
