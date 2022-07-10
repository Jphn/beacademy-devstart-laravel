<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
	protected $post;
	protected $user;

	public function __construct(User $user, Post $post)
	{
		$this->user = $user;
		$this->post = $post;
	}

	public function index()
	{
		$posts = $this->post->all();

		return view('post.index', compact('posts'));
	}
}
