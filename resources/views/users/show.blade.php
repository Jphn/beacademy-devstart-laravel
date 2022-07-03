@extends('template.users')
@section('title', $user->name)
@section('body')
<section>
	<h1>Usuário - {{ $user->name }}</h1>
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
			<tr>
				<th>{{ $user->id }}</th>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ date('d/m/Y - H:i', strtotime($user->created_at)) }}</td>
				<td>
					<a href="" class="btn btn-warning text-white">Editar</a>
					<a href="" class="btn btn-danger text-white">Deletar</a>
				</td>
			</tr>
		</tbody>
	</table>
</section>
@endsection