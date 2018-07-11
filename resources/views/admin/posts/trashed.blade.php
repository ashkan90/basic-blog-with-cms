@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>Image</th>
					<th>Title</th>
					<th>Edit</th>
					<th>Restore</th>
					<th>Delete</th>
				</thead>
				<tbody>
					@if($posts->count() > 0)
						@foreach($posts as $post)
							<tr>
								<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="50px" height="50px"></td>
								<td>{{$post->title}}</td>
								<td><a href="#" class="btn btn-info">Edit</a></td>
								<td><a href="{{ route('post.restore',['id' => $post->id]) }}" class="btn btn-success">Restore</a></td>
								<td><a href="{{ route('post.kill',['id' => $post->id]) }}" class="btn btn-danger">Delete</a></td>
							</tr>
						@endforeach
					@else
						<tr>
							<th colspan="5" class="text-center">No trashed post</th>
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
