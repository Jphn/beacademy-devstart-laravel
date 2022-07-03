<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listagem de Usuários</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css
" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<section>
			<h1>Listagem de Usuários</h1>
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
	</main>
</body>
</html>