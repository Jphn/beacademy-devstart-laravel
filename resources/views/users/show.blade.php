@extends('template.users')
@section('title', $user->name)
@section('body')
	<section>
		<h1>Usuário - {{ $user->name }}</h1>

		<a class="btn btn-primary" href="{{ route('users.index') }}">Voltar</a>

		<table class="table">
			<thead>
				<tr>
					<th>IMAGEM</th>
					<th>ID</th>
					<th>NOME</th>
					<th>EMAIL</th>
					<th>DATA DE CADASTRO</th>
					<th>AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<img src="{{ asset('storage/' . (is_null($user->image) ? 'profile/default.jpg' : $user->image)) }}"
						     width="50px"
						     height="50px"
						     class="rounded-circle" alt="profile-image"></td>
					<th>{{ $user->id }}</th>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
					<td>
						<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-white">Editar</a>
						<button onclick="event.preventDefault(); document.getElementById('submit-form').submit();"
						        class="btn btn-danger text-white">Deletar
						</button>
					</td>
				</tr>
			</tbody>
		</table>

		<form id="submit-form" action="{{ route('user.delete', $user->id) }}" method="POST" hidden>
			@method('DELETE')
			@csrf
		</form>
	</section>
@endsection