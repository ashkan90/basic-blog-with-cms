@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Edit blog settings
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('update.setting') }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="tag">Site URL</label>
			    		<input type="text" name="url" class="form-control" value="{{$settings->url}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Site Title</label>
			    		<input type="text" name="title" class="form-control" value="{{$settings->title}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Site Name</label>
			    		<input type="text" name="name" class="form-control" value="{{$settings->name}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Site Description</label>
			    		<input type="text" name="description" class="form-control" value="{{$settings->description}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Site Keywords</label>
			    		<input type="text" name="keywords" class="form-control" value="{{$settings->keywords}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Contact e-mail</label>
			    		<input type="email" name="email" class="form-control" value="{{$settings->email}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Contact number</label>
			    		<input type="text" name="phone" class="form-control" value="{{$settings->phone}}">
			    	</div>
		    		<div class="form-group">
			    		<label for="tag">Country</label>
			    		<input type="text" name="country" class="form-control" value="{{$settings->country}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">City</label>
			    		<input type="text" name="city" class="form-control" value="{{$settings->city}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="title">Copyright</label>
			    		<input type="text" name="copyright" class="form-control" value="{{$settings->copyright}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="content">Address</label>
			    		<textarea class="form-control" name="address" rows="5">{{ $settings->address }}</textarea>
			    	</div>
			    	<div class="form-group">
			    		<label for="logo">Logo</label>
			    		<input type="file" name="logo" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Update settings
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>

@endsection