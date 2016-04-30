<form action="{{ $action }}" class="form-horizontal" method="POST" accept-charset="utf-8">
<div class="form-group">
	<legend>{{ $title }}</legend>
</div>

{{ method_field($method) }}
{{ csrf_field() }}

<div class="form-group">
	<label for="inputTitle" class="col-sm-2 control-label">Title:</label>
	<div class="col-sm-10">
		<input type="text" name="title" id="inputTitle" class="form-control" value="{{$post->title or ''}}">
	</div>
</div>
<div class="form-group">
	<label for="textareaContent" class="col-sm-2 control-label">Content:</label>
	<div class="col-sm-10">
		<textarea name="content" id="textareaContent" class="form-control" rows="7">{{ $post->content or '' }}</textarea>
	</div>
</div>
<div class="form-group">
	<label for="textareaExcerpt" class="col-sm-2 control-label">Excerpt:</label>
	<div class="col-sm-10">
		<textarea name="excerpt" id="textareaExcerpt" class="form-control" rows="5">{{ $post->excerpt or '' }}</textarea>
	</div>
</div>
<div class="form-group">
	<label for="inputThumbnailUrl" class="col-sm-2 control-label">Thumbnail Image Url:</label>
	<div class="col-sm-10">
		<input type="text" name="thumbnail_url" id="inputThumbnailUrl" class="form-control" value="{{ $post->thumbnail_url or ''}}">
	</div>
</div>
@if (isset($post) and !is_null($post->thumbnail_url))
<div>
	<div class="col-sm-2">
		<strong>Current Thumbnail Image</strong>
	</div>
	<div class="col-sm-10">
		<img src="{{ $post->thumbnail_url or '' }}" alt="Thumbnail Image">
	</div>
</div>
@endif
<div class="form-group">
	<label for="inputStatus" class="col-sm-2 control-label">Status:</label>
	<div class="col-sm-10">
	@foreach (['publish','draft'] as $status)
		<div class="radio">
			<label>
				<input type="radio" name="status" id="inputStatus" value="{{ $status }}"@if (isset($post) and $post->status==$status) checked="checked"@endif {{($status=='publish' and !isset($post))?'checked':'' }}>
				<span class="text-capitalize">{{ $status }}</span>
			</label>
		</div>
	@endforeach
</div>
</div>
@if (isset($post))
<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2">
		@if (is_null($post->deleted_at))
			<input type="submit" name="_method" id="inputTrash" class="btn btn-danger" value="Delete" title="Move to trash">
		@else
			<div class="checkbox">
				<label>
					<input type="checkbox" id="inputTrash" name='restore' value="1">
					Restore from trash
				</label>
			</div>
		@endif
	</div>
</div>
@endif
<div class="form-group">
	<div class="col-sm-10 col-sm-offset-2">
		<button type="submit" class="btn btn-primary">{{ $title }}</button>
	</div>
</div>
</form>
