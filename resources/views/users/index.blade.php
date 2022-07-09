@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')
	<section>
		<h1>Listagem de Usuários</h1>
		<a href="{{ route('users.create') }}" class="btn btn-info text-white">Adicionar</a>
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
				@foreach ($users as $user)
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