@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
			<hr>
			{{$posts->render()}}
				@forelse ($posts as $post)
					@include('posts.partials.item',['post'=>$post,'is_in_loop'=>true])
				@empty
					Nothing Found.
				@endforelse
				{{$posts->render()}}
			</div>
			<div class="col-md-4">
				@include('partials.sidebar')
			</div>
		</div>
	</div>
@stop
