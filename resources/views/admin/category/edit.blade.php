@extends('layouts.app')

@section('content')
	@include('admin.includes.error')
	<div class="card">
		  <div class="card-header">
		    Update Category: {{$category->name}} 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('category.update', ['id' => $category->id]) }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="name">Category Name</label>
			    		<input type="text" name="name" class="form-control" value="{{$category->name}}">
			    	</div>

			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Edit Category
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection