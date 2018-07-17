@extends('layouts.app')

@section('content')

	<div class="card">
		  <div class="card-header">
		    Update a Post 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('update.post', ['id' => $post->id]) }}" enctype="multipart/form-data">
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="title">Title</label>
			    		<input type="text" name="title" class="form-control" value="{{ $post->title }}">
			    	</div>
			    	<div class="form-group">
			    		<label for="content">Content</label>
			    		<textarea class="form-control" id="content" name="content" rows="5">{{ $post->content }}</textarea>
			    	</div>
			    	<div class="form-group">
			    		<label for="category">Select a Category</label>
			    		<select id="category" name="category_id" class="form-control">
			    			@foreach($categories as $category)
			    				<option value="{{ $category->id }}"
			    					@if($post->category_id == $category->id)
			    						selected
			    					@endif
			    					>
			    					{{ $category->name }}
			    				</option>
		    				@endforeach
			    		</select>
			    	</div>
			    	<label for="tags">Select tags</label>
			    	@foreach($tags as $tag)
			    	<div class="form-check">
				  		<label class="form-check-label">
						    <input type="checkbox" class="form-check-input" value="{{$tag->id}}" name="tags[]"
						    	@foreach($post->tags as $t)
						    		@if($tag->id == $t->id)
						    			checked
					    			@endif
						    	@endforeach

						    >{{$tag->tag}}
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
			    				Update Post
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
	<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type', 'success')}}";
            toastr.success("{{Session::get('message')}}");
        @endif
    </script>
@endsection