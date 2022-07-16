@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')
	<section>
		@includeWhen(session()->has('alert'), 'partial.alert', ['alert' => session()->get('alert')])

		<h1>Listagem de Usuários</h1>

		<div class="row">
			<div class="col-sm mt-2 mb-5">
				<a href="{{ route('users.create') }}" class="btn btn-info text-white">Adicionar</a>
			</div>

			<div class="col-sm mt2 mb-5">
				<form action="{{ route('users.index') }}" method="GET">
					<div class="input-group">
						<input type="search" name="search" class="form-control rounded">
						<button type="submit" class="btn btn-outline-primary">Pesquisar</button>
					</div>
				</form>
			</div>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>IMAGEM</th>
					<th>ID</th>
					<th>NOME</th>
					<th>EMAIL</th>
					<th>POSTAGENS</th>
					<th>DATA DE CADASTRO</th>
					<th>AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td>
							<img src="{{ asset('storage/' . (is_null($user->image) ? 'profile/default.jpg' : $user->image)) }}"
							     width="50px" height="50px" class="rounded-circle" alt="profile-image">
						</td>
						<th>{{ $user->id }}</th>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<a href="{{ route('posts.show', $user->id) }}"
							   class="btn btn-outline-secondary">{{ $user->posts()->count() }}</a>
						</td>
						<td>{{ formatDateTime($user->created_at) }}</td>
						<td><a href="{{ route('users.show', $user->id) }}"
						       class="btn btn-info text-white">Visualizar</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="justify-content-center pagination">
			{{ $users->links('pagination::bootstrap-4') }}
		</div>
	</section>
@endsection
