<hr>
<h3>Search</h3>
<form action="{{ route('posts.search') }}" method="GET" class="form-inline" role="form">
	<div class="form-group">
		<label class="sr-only" for="fieldSearch">Search</label>
		<input name='q' class="form-control" id="fieldSearch" placeholder="keywords in title or content">
	</div>
	<button type="submit" class="btn btn-primary">Search</button>
</form>
<hr>
@include('posts.partials.recent')
<hr>
GitHub: https://github.com/qtvhao/Laravel-CMS