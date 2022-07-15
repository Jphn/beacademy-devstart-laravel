@extends('template.users')

@section('title', 'Dashboard')

@section('body')
	<div class="card">
		<img src="https://www.setting.com.br/wp-content/uploads/2019/11/dashboard-para-empresas-logistica.png"
		     alt="dashboard" class="card-img-top">
		<div class="card-body">
			<h5 class="card-title">Bem-vindo {{ Auth::user()->name }}</h5>
			<p class="card-text">
				#payLivre #beAcademy #laravel9
			</p>
		</div>
	</div>
@endsection