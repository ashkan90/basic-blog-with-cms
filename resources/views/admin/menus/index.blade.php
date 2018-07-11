@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-body">
			<table class="table table-hover">
				<thead>
					<th>Menu name</th>
					<th>Editing</th>
					<th>Deleting</th>
				</thead>
				<tbody>
					@if($menus->count() > 0)
						@foreach($menus as $menu)
							<tr>
								<td>{{$menu->name}}</td>
								<td><a href="{{ route('menu.edit', ['id' => $menu->id]) }}" class="btn btn-info">Edit</a></td>
								<td><a href="{{ route('menu.delete', ['id' => $menu->id]) }}" class="btn btn-danger">Delete</a></td>
							</tr>
						@endforeach

					@else
						<tr>
							<th colspan="5" class="text-center">No entered menu</th>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
	</div>
@endsection
