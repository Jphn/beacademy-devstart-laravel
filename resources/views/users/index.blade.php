@extends('template.users')
@section('title', 'Listagem de Usuários')
@section('body')
<section>
	<h1>Listagem de Usuários</h1>
	<a href="{{ route('users.create') }}" class="btn btn-info text-white">Adicionar</a>
	<table class="table">
		<thead>
			<tr>
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
				<th>{{ $user->id }}</th>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
				<td><a href="{{ route('users.show', $user->id) }}" class="btn btn-info text-white">Visualizar</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</section>
@endsection