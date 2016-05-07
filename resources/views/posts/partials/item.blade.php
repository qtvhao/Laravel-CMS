<?php
//param is_in_loop
//param post
$heading_tag = is_null($post->thumbnail_url) ? '' : "<img src='$post->thumbnail_url'>";
$heading_tag .= $is_in_loop ? "<a rel='bookmark' href='" . route('posts.show', $post->id) . "'><h2>$post->title</h2></a>" : "<h1>$post->title</h1>";
?>
<hr>
<style>
	article img{
		max-width: 100%;
	}
</style>
<article id="post-{{ $post->id }}" class="post">
	<header>
		{!!$heading_tag!!}
		by <a href="{{ route('posts.index',['user_id'=>$post->user->id]) }}">{{$post->user->name}}</a>,
		<time datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time>
	</header>
	<section>
	@inject('Markdown', 'GrahamCampbell\Markdown\Facades\Markdown')
		@if ($is_in_loop)
			{{$post->excerpt}}
		@else
			{!!Markdown::convertToHtml($post->content)!!}
		@endif
	</section>
	<div>Tags:
@foreach ($post->tags as $key=>$tag)
@if ($key>0),@endif <a href="{{ route('tags.show',$tag->id) }}" title="{{$tag->name}}">{{$tag->name}}</a>@endforeach
	</div>
@include('posts.partials.buttons')
</article>
