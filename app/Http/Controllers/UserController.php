<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Symfony\Component\HttpFoundation\Request;
use App\Exceptions\UserControllerException;

class UserController extends Controller
{
	public function __construct(User $user)
	{
		$this->model = $user;
	}

	public function index(Request $req)
	{
		$users = $this->model->getUsers($req->search ?? null);

		return view('users.index', compact('users'));
	}

	public function show($id)
	{
		$user = User::find($id);

		if ($user)
			return view('user.show', compact('user'));

		throw new UserControllerException('Usuário não encontrado.');
	}

	public function edit($id)
	{
		$user = $this->model->findOrFail($id);

		return view('users.edit', compact('user'));
	}

	public function update(StoreUpdateUserFormRequest $req, $id)
	{
		$user = $this->model->findOrFail($id);

		$data = $req->all();
		unset($data['password']);

		$data['is_admin'] = $data['is_admin'] ?? false;

		if ($req['image'])
			$data['image'] = $req['image']->store('profile', 'public');

		if ($req->password)
			$data['password'] = bcrypt($req->password);

		$user->update($data);

		return redirect()->route('users.index')->with('alert', ['success', "{$data['name']} foi atualizado(a) com sucesso!"]);
	}

	public function store(StoreUpdateUserFormRequest $req)
	{
		$data = $req->all();

		if ($req['image'] != null)
			$data['image'] = $req['image']->store('profile', 'public');

		$data['password'] = bcrypt($data['password']);

		$this->model->create($data);

		return redirect()->route('users.index')->with('alert', ['success', "{$data['name']} foi adicionado(a) com sucesso!"]);
	}

	public function create()
	{
		return view('users.create');
	}

	public function delete($id)
	{
		$user = $this->model->findOrFail($id);
		$user->delete();

		return redirect()->route('users.index')->with('alert', ['danger', 'Deletado com sucesso sucesso!']);
	}

	public function admin()
	{
		return view('admin.index');
	}
}
