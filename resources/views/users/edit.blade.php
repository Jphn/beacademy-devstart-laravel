@extends('template.users')
@section('title', "Editar - {$user->name}")
@section('body')
<h1>Novo Usuário</h1>

@include('layout.error')

<form action="{{ route('user.update', $user->id) }}" method="POST">
	@method('PUT')
	@csrf
	<div class="mb-3">
		<label for="name">Nome</label>
		<input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
	</div>
	<div class="mb-3">
		<label for="email">Email</label>
		<input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" required>
	</div>
	<div class="mb-3">
		<label for="password">Senha</label>
		<input type="password" class="form-control" id="password" name="password">
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
</form>
@endsection