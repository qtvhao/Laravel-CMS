@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			@include('posts.partials.form',['action'=>route('posts.store'),'method'=>'POST','title'=>'Create New Post'])
		</div>
	</div>
@stop
