@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Edit blog settings
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('settings.update') }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="tag">Site name</label>
			    		<input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Contact e-mail</label>
			    		<input type="email" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Contact number</label>
			    		<input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="content">Address</label>
			    		<textarea class="form-control" name="address" rows="5">{{$settings->address}}</textarea>
			    	</div>			    	
			    	<div class="form-group">
			    		<label for="title">Footer Title</label>
			    		<input type="text" name="title" class="form-control" value="{{$settings->footer_title}}">
			    	</div>
			    	<div class="form-group">
			    		<label for="content">Address</label>
			    		<textarea class="form-control" name="address" rows="5">{{ $settings->footer_description }}</textarea>
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