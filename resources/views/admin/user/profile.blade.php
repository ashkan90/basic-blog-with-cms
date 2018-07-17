@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Edit your profile
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="name">Username</label>
			    		<input type="text" name="name" value="{{$user->name}}" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="email">E-mail</label>
			    		<input type="email" name="email" value="{{$user->email}}" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="password">New Password</label>
			    		<input type="password" name="password" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="avatar">Upload new Avatar</label>
			    		<input type="file" name="avatar" class="form-control">
			    	</div>

		    		<div class="form-group">
			    		<label for="content">About you</label>
			    		<textarea class="form-control" name="about" rows="5">
			    			{{$user->profile->about}}
			    		</textarea>
			    	</div>

			    	<!--Social-->
			    	<div class="form-group">
			    		<label for="facebook">Facebook</label>
			    		<input type="text" value="{{$user->profile->facebook}}" name="facebook" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="twitter">Twitter</label>
			    		<input type="text" value="{{$user->profile->twitter}}" name="twitter" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="pinterest">Pinterest</label>
			    		<input type="text" value="{{$user->profile->pinterest}}" name="pinterest" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="instagram">Instagram</label>
			    		<input type="text" name="instagram" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Update your profile
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection