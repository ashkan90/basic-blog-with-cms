@extends('layouts.app')

@section('content')

	<div class="card">
		  <div class="card-header">
		    Create a new Post 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('store.post') }}" enctype="multipart/form-data">
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="title">Title</label>
			    		<input type="text" name="title" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="content">Content</label>
			    		<textarea class="form-control" id="summernote" name="content" rows="5"></textarea>
			    	</div>
			    	<div class="form-group">
			    		<label for="category">Select a Category</label>
			    		<select id="category" name="category_id" class="form-control">
			    			@foreach($categories as $category)
			    				<option value="{{ $category->id }}">
			    					{{ $category->name }}
			    				</option>
		    				@endforeach
			    		</select>
			    	</div>
			    	<label for="tags">Select tags</label>
			    	@foreach($tags as $tag)
			    	<div class="form-check">
				  		<label class="form-check-label">
						    <input type="checkbox" class="form-check-input" value="{{$tag->id}}" name="tags[]">	{{	$tag->tag}}
						  </label>
					</div>
					@endforeach	<br>
			    	<div class="form-group">
			    		<label for="featured">Featured images</label>
			    		<input type="file" name="featured" class="form-control">
			    	</div> 	
			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Share Post
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type', 'success')}}";
            toastr.success("{{Session::get('message')}}");
        @endif

     	$(document).ready(function(){
     		$('#summernote').summernote();
     	});
    </script>
@endsection
