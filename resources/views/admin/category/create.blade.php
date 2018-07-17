@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Create a new Category 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('store.category') }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="name">Category Name</label>
			    		<input type="text" name="name" class="form-control">
			    	</div>

			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Add Category
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection