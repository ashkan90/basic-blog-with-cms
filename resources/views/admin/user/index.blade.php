@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Name</th>
					<th>Presmissions</th>
					<th>Delete</th>
				</thead>
				<tbody>
					@if($users->count() > 0)
						@foreach($users as $user)
							<tr>
								<td>
									<img src="{{asset($user->profile->avatar)}}" alt="{{$user->profile->avatar}}" width="60px" height="60px" style="border-radius: 50%;">
								</td>
								<td>{{$user->name}}</td>
								<td>
									@if($user->admin == 1)
										<a href="{{route('user.not.admin', ['id' => $user->id])}}" class="btn btn-danger">Remove permissions</a>
									@else
										<a href="{{route('user.admin', ['id' => $user->id])}}" class="btn btn-success">Make admin</a>
									@endif
								</td>
								<td>
									@if(Auth::id() != $user->id)
										<a href="{{route('user.delete', ['id' => $user->id])}}" class="btn btn-danger">Delete</a>
									@endif
								</td>
							</tr>
						@endforeach

					@else
						<tr>
							<th colspan="5" class="text-center">No users</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{Session::get('alert-type', 'info')}}";
            switch(type){
            	case 'info':toastr.info("{{Session::get('message')}}");
            		break;
        		case 'success':toastr.success("{{Session::get('message')}}");
            		break;
        		case 'error':toastr.error("{{ Session::get('message') }}");
		            break;
	            case 'warning':toastr.warning("{{ Session::get('message') }}");
	            	break;

            }
            
        @endif
        
    </script>
@endsection
