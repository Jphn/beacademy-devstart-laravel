@extends('template.users')
@section('title', 'Postagens')
@section('body')
	<section>
		<h1>Listagem de Postagens</h1>
		<a href="#" class="btn btn-info text-white">Adicionar</a>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>USUÁRIO</th>
					<th>TÍTULO</th>
					<th>CONTEÚDO</th>
					<th>DATA DE CADASTRO</th>
					<th>AÇÕES</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($posts as $post)
					<tr>
						<th>{{ $post->id }}</th>
						<td>{{ $post->user->name }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ $post->post }}</td>
						<td>{{ date('d/m/Y - H:i', strtotime($post->created_at)) }}</td>
						<td><a href="{{ route('users.show', $post->id) }}"
						       class="btn btn-info text-white">Visualizar</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section>
@endsection