@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Create a new Tag 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('tag.store') }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="tag">Tag Name</label>
			    		<input type="text" name="tag" class="form-control">
			    	</div>

			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Add Tag
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection