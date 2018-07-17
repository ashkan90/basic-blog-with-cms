@extends('layouts.app')

@section('content')
	@include('admin.includes.error')
	<div class="card">
		  <div class="card-header">
		    Update Tag: {{$tag->tag}} 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('update.tag', ['id' => $tag->id]) }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="tag">Tag Name</label>
			    		<input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
			    	</div>

			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Edit Tag
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection