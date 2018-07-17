<!DOCTYPE html>
<html>
<head>
	<title>{{ $site->title }} - {{ $tag->tag }}</title>
	@include('includes.import.head')
<body>
	@include('includes.header')
	
	<!-- Start Content -->
	<div class="main">
		<!-- Start Category Title and Description -->
		<section class="main-t">
			<h1> {{ $tag->tag }} </h1>
			<h4> Tag Description </h4>
		</section>
		<!-- End Category Title and Description -->
		
		<div class="container">
			<div class="row">
		
				<div class="col-lg-9 col-md-8 col-xs-12 col-sm-12 main-content">	
					<!-- Start Posts Loop -->
					@if($tag->posts()->count())
					@foreach($tag->posts as $post)
					<article class="main-d">
						<div class="img">
							<div class="main-hov">
								<a href="{{ route('category', ['category' => $category->slug]) }}"><h5>{{ $category->name }}</h5></a>
							</div>
							<a href="{{ route('single', ['category' => $category->slug, 'slug' => $post->slug]) }}">
								<img src="{{ asset($post->featured) }}" title="{{ $post->title }}" alt="{{ $post->title }}">
							</a>
						</div>

						<div class="content">
							<span class="badge badge-pill badge-success">
				                {{ ucfirst($post->user->name) }}
				            </span>
							<h2><span><a href="{{ route('single', ['category' => $category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></span></h2>
							{{ str_limit($post->content, 280) }}
							<div class="read-btn">
								
								<a href="{{ route('single', ['category' => $category->slug, 'slug' => $post->slug]) }}" class="btn btn-paleutism btn-lg"> Read More... </a>								
							</div>
						</div>
						<div class="more-tabs">
							<div class="article-date">
							<p><strong>{{ $post->created_at->toFormattedDateString() }}</strong></p> 
							</div>
						</div>
					</article>
					@endforeach
					@else
					<article class="main-d">
						<div class="content">
							<p> No Posts Found in  {{ $tag->tag }} </p>
							</hr>
							<p>Sorry, but No posts found in  {{ $tag->tag }}. Feel free to search our website.</p>
						<form method="get" action="search.php" id="search">
							<div class="searchblog">
								<button type="submit">
								<i class="fa fa-search"></i>
								</button>
							<div class="searchbox">
								<input type="search" name="search" class="form-control" id="Search" placeholder="Search..." value="">
							</div>
							</div>
						</form>
						</div>
					</article>
					@endif
					<!-- End Posts Loop -->
				
					<!-- Start Pagination -->
					
					<!-- End Pagination -->
				</div>
				
				
			</div>	
		</div>
	
	</div>
	<!-- End Content -->

	@include('includes.import.footer')