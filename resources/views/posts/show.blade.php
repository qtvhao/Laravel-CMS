@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				@include('posts.partials.item',['post'=>$post,'is_in_loop'=>false])
			</div>
			<div class="col-md-4">
				@include('partials.sidebar')
			</div>
		</div>
	</div>
@stop
