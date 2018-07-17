<!-- Start Latest Posts Widget -->
<div class="panel panel-pale">
	<div class="panel-heading" role="tab" id="headingTwo">
		<h4 class="panel-title"><a class="" role="button" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Latest Posts</a></h4>
	</div>
	<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
		<div class="panel-body">
			@foreach($latest_post as $post)
			<div class="panel-post">
				
				<img src="{{ asset($post->featured) }}" title="{{ $post->title }}" alt="{{ $post->title }}">
			<div class="desc">
				<h5><a href="{{ route('single', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></h5>
				<p>{{ $post->created_at->toFormattedDateString() }}</p>
			</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!-- End Latest Posts Widget -->