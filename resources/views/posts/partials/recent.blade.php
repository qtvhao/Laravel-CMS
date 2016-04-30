<?php
$recent_posts = App\Post::latest()->take(10)->get();
if (count($recent_posts) > 0) {
	echo '<h3>Recent Posts</h3>';
}
?>
<ul>
@foreach ($recent_posts as $post)
	<li>
		<a href="{{ route('posts.show',$post->id) }}" rel='bookmark'>{{ $post->title }}</a>
	</li>
@endforeach
</ul>
