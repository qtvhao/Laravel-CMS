<?php
$recent_posts = App\Post::latest()->take(10)->get();
if (count($recent_posts) > 0) {
	echo '<h3>Recent Posts</h3>';
}
?>
<style>.tags a{margin:2px;}</style>
<div class="tags">
@foreach ($recent_posts as $post)
	<a class='btn btn-default' href="{{ route('posts.show',$post->id) }}" rel='bookmark'>{{ $post->title }}</a>
@endforeach
</div>