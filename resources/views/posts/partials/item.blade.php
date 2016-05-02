<?php
//param is_in_loop
//param post
$heading_tag = is_null($post->thumbnail_url) ? '' : "<img src='$post->thumbnail_url'>";
$heading_tag .= $is_in_loop ? "<a rel='bookmark' href='" . route('posts.show', $post->id) . "'><h2>$post->title</h2></a>" : "<h1>$post->title</h1>";
?>
<hr>
<article id="post-{{ $post->id }}" class="post">
	<header>
		{!!$heading_tag!!}
		by <a href="{{ route('posts.index',['user_id'=>$post->user->id]) }}">{{$post->user->name}}</a>,
		<time datetime="{{ $post->updated_at }}">{{ $post->updated_at }}</time>
	</header>
	<section>
		{{$is_in_loop ? $post->excerpt : $post->content}}
	</section>
	<div>Tags:
			@foreach ($post->tags as $tag)
				<a href="{{ route('tags.show',$tag->id) }}" title="{{$tag->name}}">{{$tag->name}}</a>
			@endforeach
	</div>
@include('posts.partials.buttons')
</article>
