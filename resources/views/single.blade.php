<!DOCTYPE html>
<html>
<title>{{ $site->title }} - {{ $post->title }}</title>
@include('includes.import.head')
<body>
	@include('includes.header')	
	<!-- Start Content -->

	<div class="main">
		<!-- Start Post Title and Subtitle -->	
		<section class="main-t">
			<h1> {{ $post->title }} </h1>
			<h4> SubTitle </h4>
		</section>
		<!-- End Post Title and Subtitle -->	
		
		<div class="container">

		<div class="row">

			<div class="col-lg-9 col-md-8 col-xs-12 col-sm-12">

				<article class="main-d post">
					<div class="img">
					<img src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
					<div class="share">
					<div class="activ-s">
					<ul class="btn-s">
					<li>
						<a target="_blank" href=""><i class="fa fa-facebook"></i> 
						</a>
					</li>
					<li>
						<a target="_blank" href=""><i class="fa fa-twitter"></i> 
						</a>
					</li>
					<li>
						<a target="_blank" href=""><i class="fa fa-google-plus"></i>
						</a>
					</li>
					<li>
						<a target="_blank" href=""><i class="fa fa-linkedin"></i></a>
					</li>
					<li>
						<a target="_blank" href=""><i class="fa fa-reddit"></i></a>
					</li>
					<li>
						<a target="_blank" href="mailto"><i class="fa fa-envelope-o"></i>
						</a>
					</li>
					</ul>
					<i class="fa fa-share-alt"></i>
					</div>
					</div>
					</div>

					<div class="content post">
						<span class="badge badge-pill badge-success">
			                Author: {{ ucfirst($post->user->name) }}
			            </span>&nbsp;&nbsp;&nbsp;

		            	<span class="badge badge-default">
						{{ $post->category->name }}
						</span>					
						<h2><span>{{ $post->title }}</span></h2>
						{!! $post->content !!}
						</br>
						<h3><span>Share this entry</span></h3>
						<a href="" class="icon-link facebook fill"><i class="fa fa-facebook"></i>
						</a>
						<a href="" class="icon-link linkedin fill"><i class="fa fa-linkedin"></i>
						</a>
						<a href="" class="icon-link twitter fill"><i class="fa fa-twitter"></i>
						</a>
						<a href="" class="icon-link google-plus fill"><i class="fa fa-google-plus"></i>
						</a>
						<a href="" class="icon-link reddit fill"><i class="fa fa-reddit"></i>
						</a>
						<a href="" class="icon-link tumblr fill"><i class="fa fa-tumblr"></i>
						</a>						
						<a href="" class="icon-link pinterest fill"><i class="fa fa-pinterest"></i>
						</a>
						<a href="mailto" class="icon-link envelope fill"><i class="fa fa-envelope"></i>
						</a>
						<div class="text-center">
							@foreach($post->tags()->get() as $tags)
								<a href="{{ route('tag', ['tag' => $tags->slug]) }}">
									<span class="badge badge-pill badge-success">
										{{ $tags->tag }}
									</span>
								</a>
							@endforeach
						</div>
					</div>
					<!-- comment -->
				
				</article>

			</div>

			@include('includes.import.sidebar')

		</div>

		</div>
	</div>
	<!-- End Content -->

	@include('includes.import.footer')
</body>
</html>