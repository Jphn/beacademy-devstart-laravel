<div class="alert alert-{{ $alert[0] ?? 'danger' }} alert-dismissible" role="alert">
	<div>{{ $alert[1] ?? 'Algo deu errado com o alerta!' }}</div>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>