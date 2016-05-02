<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Auth;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller {
	function __construct() {
		$this->middleware('auth', ['except' => [
			'index',
			'show',
		]]);
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$clauses = \Request::except('page');
		$posts = Post::where($clauses)->latest()->paginate(5);
		$posts = $posts->appends($clauses);
		return view('posts.list', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$new_post = new Post();
		$new_post->user_id = Auth::user()->id;
		$new_post->fill($request->all())->save();
		return redirect()->route('posts.edit', $new_post->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$post = Post::findOrFail($id);
		return view('posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$post = Post::withTrashed()->findOrFail($id);
		return view('posts.edit', compact('post'));
	}

	/**
	 * Update the specified resource in storage. Restore if deleted.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$post = Post::withTrashed()->findOrFail($id);
		if (Gate::denies('update-post', $post)) {
			abort(403);
		}
		$post->update($request->all());
		if ($request->restore) {
			$post->restore();
		}
		return back();
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$post = Post::findOrFail($id);
		abort_if(Gate::denies('delete-post', $post), 403);
		$post->delete();
		return back();
	}
}
