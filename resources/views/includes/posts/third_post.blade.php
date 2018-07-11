<article class="hentry post post-standard has-post-thumbnail sticky">
@if($third_post)
<div class="post-thumb">
    <img src="{{ $third_post->featured }}" alt="{{ $third_post->title }}">
    <div class="overlay"></div>
    <a href="{{ $third_post->featured }}" class="link-image js-zoom-image">
        <i class="seoicon-zoom"></i>
    </a>
    <a href="#" class="link-post">
        <i class="seoicon-link-bold"></i>
    </a>
</div>

<div class="post__content">

    <div class="post__content-info">

            <h2 class="post__title entry-title text-center">
                <a href="{{ route('post.single', ['category' => $third_post->category->name, 'slug' => $third_post->slug]) }}">{{ $third_post->title }}</a>
            </h2>

            <div class="post-additional-info">

                <span class="post__date">

                    <i class="seoicon-clock"></i>

                    <time class="published" datetime="2016-04-17 12:00:00">
                        {{ $third_post->created_at->toFormattedDateString() }}
                    </time>

                </span>

                <span class="category">
                    <i class="seoicon-tags"></i>
                    <a href="{{ route('category.single', ['category' => $third_post->category->name]) }}">{{ $third_post->category->name }}</a>
                </span>

                <span class="post__comments">
                    <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                    6
                </span>

            </div>
    </div>
</div>
@endif
</article>
