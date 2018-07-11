@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>Tag</th>
					<th>Editing</th>
					<th>Deleting</th>
				</thead>
				<tbody>
					@if($tags->count() > 0)
						@foreach($tags as $tag)
							<tr>
								<td>{{$tag->tag}}</td>
								<td><a href="{{route('tag.edit', ['id' => $tag->id])}}" class="btn btn-info">Edit</a></td>
								<td><a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-danger">Delete</a></td>
							</tr>
						@endforeach

					@else
						<tr>
							<th colspan="5" class="text-center">No entered tags</th>
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
