<!DOCTYPE html>
<html>
<head>
	<title>{{ $site->title }} - Search for {{ $term }}</title>
	@include('includes.import.head')
<body>
	@include('includes.header')

	<!-- Start Content -->
	<div class="main">
		<!-- Start Search Title  -->
		<section class="main-t">
			@if($posts->count() >= 1 and !is_null($term) )
			<h1> Search for {{ $term }} </h1>
			<h4> {{ $posts->count() }} Result(s) Found for {{ $term }} </h4>
			@endif
			@if($posts->count() == 0 or is_null($term))
			<h1> Nothing found for '{{ $term }}' </h1>
			<h4> Sorry, but nothing matched your search terms. Please try again with some different keywords. </h4>
			@endif
		</section>
		<!-- End Search Title -->

		<div class="container">
		<div class="row">


		<div class="col-lg-9 col-md-8 col-xs-12 col-sm-12 main-content">
		
			@if($posts->count() == 0 or is_null($term))
			<article class="main-d">
			<div class="content">
			<p> NOTHING FOUND FOR "{{ $term }}" </p>
			<hr/>
			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
			<form method="get" action="results" id="search" >
				<div class="searchblog">
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
				<div class="searchbox">
					<input type="search" name="term" class="form-control" id="Search" placeholder="Search..." value="{{ $term  }}">
				</div>
				</div>
			</form>
			</div>
			</article>
			@endif
			
				@if($posts->count() >= 1 and !is_null($term) )

					@foreach($posts as $post)
					<article class="main-d">

						<div class="img">
							<div class="main-hov">
								<h5>{{ $post->category->name }}</h5>
							</div>
							<img src="{{ asset($post->featured) }}" title="{{ $post->title }}" alt="{{ $post->title }}">
						</div>

						<div class="content">
							<h2><span><a href="">{{ $post->title }}</a></span></h2>
							{!! str_limit($post->content, 280) !!}
							<div class="read-btn">
								<a href="" class="btn btn-paleutism btn-lg"> Read More... </a>
							</div>
						</div>
						<div class="more-tabs">
							<div class="article-date">
							<p><strong>{{ $post->created_at->toFormattedDateString() }}</strong></p> 
							</div>
						</div>
					</article>
					@endforeach

			
					
				@endif	
				</div>
			
				@include('includes.import.sidebar')
			</div>	
		</div>
	
	</div>
	<!-- End Content -->
	
	@include('includes.import.footer')
</body>
</html>