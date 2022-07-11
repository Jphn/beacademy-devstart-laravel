@extends('template.users')

@section('title', "Postagens de {$user->name}")

@section('body')
	<h1>Postagens do {{ $user->name }}</h1>

	@foreach($posts as $post)
		<div class="mb-3">
			<h2 class="form-label">
				{{ $post->title }}
			</h2>
			<label class="form-label">
				Postagem Nº: {{ $post->id }}
			</label>
			<br>
			<label class="form-label">
				Status: {{ $post->active ? 'Ativo' : 'Desativada' }}
			</label>
			<br>
			<label class="form-label">
				Conteúdo
			</label>
			<br>
			<textarea class="form-control" rows="3">{{ $post->post }}</textarea>
		</div>
	@endforeach
@endsection