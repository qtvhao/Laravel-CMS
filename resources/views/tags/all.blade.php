<?php
$tags = App\Tag::select(['id', 'name'])->take(10)->get();
if (count($tags) > 0) {
	echo '<h3>Tags</h3>';
}
?>
<style type="text/css">	.tags a{margin:2px;}</style>
<div class='tags'>
@foreach ($tags as $tag)
		<a class='btn btn-default' href="{{ route('tags.show',$tag->id) }}">{{ $tag->name }}</a>
@endforeach
</div>