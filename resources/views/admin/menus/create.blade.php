@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Create a new menu 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('menu.store') }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="name">Menu Name</label>
			    			<label for="main" class="form-check-label">
			    			<input type="checkbox" name="main">	Make main menu
			    		</label>
			    		<input type="text" name="name" class="form-control">
			    	</div>
			    	<label for="category">Categories</label>
			    	@foreach($categories as $category)
			    	<div class="form-group">
			    		<input type="checkbox" name="category[]" value="{{$category->id}}">
			    		{{$category->name}}
			    	</div>
			    	@endforeach

			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Add Menu
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection