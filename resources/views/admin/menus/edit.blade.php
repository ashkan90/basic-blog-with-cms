@extends('layouts.app')

@section('content')

	<div class="card">
		  <div class="card-header">
		    Update Menu 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('menu.update', ['id' => $menus->id]) }}" enctype="multipart/form-data">
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="title">Menu name</label>
			    		<label for="main" class="form-check-label">
			    			<input type="checkbox" name="main"			    			 @if($menus->main == 1)
			    			 		checked
			    			 	 @endif
			    			>	Make main menu
			    		</label>
			    		<input type="text" name="name" class="form-control" value="{{ $menus->name }}">
			    	</div>
			    	<label for="category">Select categories</label>
			    	@foreach($categories as $category)
			    		<div class="form-group">
		    				<label class="form-check-label">
		    					<input type="checkbox" name="category[]" value="{{ $category->id }}" 
		    						@foreach($menus->categories as $c)
		    							@if($category->id == $c->id)
		    								checked
	    								@endif
		    						@endforeach
		    					>	{{$category->name}}
		    				</label>
			    		</div>
			    	@endforeach
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