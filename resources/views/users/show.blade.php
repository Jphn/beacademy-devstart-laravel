<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $user->name }}</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css
" crossorigin="anonymous">
</head>
<body>
	<main class="container">
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
	</main>
</body>
</html>