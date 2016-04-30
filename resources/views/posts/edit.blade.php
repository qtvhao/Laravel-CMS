@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			@include('posts.partials.form',['action'=>route('posts.update',$post->id),'method'=>'PUT','title'=>'Edit Post'])
		</div>
	</div>
@stop
