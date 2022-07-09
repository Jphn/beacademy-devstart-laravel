@extends('template.users')
@section('title', 'Novo Usuário')
@section('body')
	<h1>Novo Usuário</h1>

	@include('layout.error')

	<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="mb-3">
			<label for="name">Nome</label>
			<input type="text" class="form-control" id="name" name="name" placeholder="Nome" required>
		</div>
		<div class="mb-3">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" placeholder="Email@email.com" required>
		</div>
		<div class="mb-3">
			<label for="password">Senha</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="********" required>
		</div>
		<div class="mb-3">
			<label for="image">Selecione uma imagem</label>
			<input type="file" class="form-control" id="image" name="image">
		</div>
		<button type="submit" class="btn btn-primary">Enviar</button>
		<a class="btn btn-secondary" href="{{ url()->previous() }}">Voltar</a>
	</form>
@endsection