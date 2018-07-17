@extends('layouts.app')

@section('content')
	<div class="card">
		  <div class="card-header">
		    Create a new user 
		  </div>

		  <div class="card-body">
			    <form method="post" action="{{ route('user.store') }}" >
			    	{{csrf_field()}}
			    	<div class="form-group">
			    		<label for="tag">Name</label>
			    		<input type="text" name="name" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">E-mail</label>
			    		<input type="email" name="email" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="tag">Password</label>
			    		<input type="password" name="password" class="form-control">
			    	</div>
			    	<div class="form-radio">
				  		<label class="form-radio-label">
						    <input type="radio" class="form-radio-input" name="permission[]">	Admin
						  </label>
					</div>
					<div class="form-radio">
				  		<label class="form-check-label">
						    <input type="radio" class="form-radio-input" name="permission[]">	Normal
						  </label>
					</div>
			    	<div class="form-group">
			    		<div class="text-center">
			    			<button class="btn btn-success" type="submit">
			    				Create new user
			    			</button>
			    		</div>
			    	</div>

			    </form>
		  </div>
	</div>
@endsection