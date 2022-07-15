<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css
"
	      crossorigin="anonymous">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="#">Laravel9</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
				        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('users.index') }}">Usuários</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('posts.index') }}">Postagens</a>
						</li>
						@if(Auth::user()->is_admin == true)
							<li class="nav-item">
								<a class="nav-link" href="{{ route('admin.index') }}">Dashboard</a>
							</li>
						@endif
					</ul>
				</div>
				<p>{{ Auth::user()->name }}</p>
				<form action="{{ route('logout') }}" method="POST">
					@csrf
					<button type="submit">Sair</button>
				</form>
			</div>
		</nav>
	</header>

	<main class="container">
		@yield('body')
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
	        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
	        crossorigin="anonymous"></script>
</body>

</html>
