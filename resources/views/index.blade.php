@extends('layouts.frontend')

@section('content')
    @foreach($posts as $post)
    <article class="main-d">

        <div class="img">
            <div class="main-hov">
                <a href="{{ route('category', ['category' => $post->category->slug]) }}"><h5>{{ $post->category->name }}</h5></a>
            </div>
            <a href="{{ route('single', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">
            <img src="{{ asset($post->featured) }}" title="{{$post->title}}" alt="{{$post->title}}">
            </a>
        </div>

        <div class="content">
            <span class="badge badge-pill badge-success">
                {{ ucfirst($post->user->name) }}
            </span>
            <h2><span><a href="{{ route('single', ['category' => $post->category->slug, 'slug' => $post->slug]) }}">{{ $post->title }}</a></span></h2>
            {{ str_limit($post->content, 280) }}
            <div class="read-btn">
                <a href="" class="btn btn-paleutism btn-lg"> Read More... </a>                             
            </div>
        </div>
        <div class="more-tabs">
            <div class="article-date">
            <p>{{$post->created_at->toFormattedDateString()}}</p> 
            </div>
        </div>
    </article>
    @endforeach
@endsection
