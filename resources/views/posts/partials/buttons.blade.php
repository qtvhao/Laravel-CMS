	<div>
	@if (isset($is_in_loop) and $is_in_loop)
		<a href='{{ route('posts.show', $post->id) }}' class="btn btn-default">View Post</a>
	@endif
	<a href='{{ route('posts.create') }}' class="btn btn-default">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	</a>
@can('edit', $post)
    <a href='{{ route('posts.edit', $post->id) }}' class="btn btn-default">
		<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
	</a>
@endcan
	</div>