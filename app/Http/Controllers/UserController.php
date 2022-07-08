<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;

class UserController extends Controller
{
	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function index()
	{
		$users = User::all();

		return view('users.index', compact('users'));
	}

	public function show($id)
	{
		if (!$user = User::find($id))
			return redirect()->route('users.index');

		return view('users.show', compact('user'));
	}

	public function store(StoreUpdateUserFormRequest $req)
	{
		$data = $req->all();

		$data['image'] = $req['image']->store('profile', 'public');

		$data['password'] = bcrypt($data['password']);

		$this->model->create($data);

		return redirect()->route('users.index');
	}

	public function create()
	{
		return view('users.create');
	}

	public function edit($id)
	{
		if (!$user = $this->model->find($id))
			return redirect()->route('users.index');

		return view('users.edit', compact('user'));
	}

	public function update(StoreUpdateUserFormRequest $req, $id)
	{
		if (!$user = $this->model->find($id))
			return redirect()->route('users.index');

		$data = $req->only('name', 'email');

		if ($req->password)
			$data['password'] = bcrypt($req->password);

		$user->update($data);

		return redirect()->route('users.show', $id);
	}

	public function delete($id)
	{
		if (!$user = $this->model->find($id))
			$user->delete();

		return redirect()->route('users.index');
	}
}
