@extends('layouts.master')

@section('content')
	<div class="row mt-4">
		<div class="col-lg-12">
			<img src="{{asset('img/logos-activite.jpg')}}" alt="logo_mfgs" class="rounded mx-auto d-block">
		</div>
	</div>
	<div class="row mt-2 mb-4">
		<div class="col-lg-12">
			<h4 class="text-muted text-center">Nous sommes le {{now()->format('d M Y')}}</h4>
		</div>
	</div>
	<style type="text/css">
		
	</style>
	<div class="row text-center">
		<div class="col-lg-12 mx-auto">
			<div class="card-group">
				<div class="card">
					<div class="card-header bg-danger text-white" id="liens">
						<h5 class="mb-0">
							Vos Liens
						</h5>
			    	</div>
			    	<div class="card-body text-left">
			    		<ul class="list-unstyled">
				    		@forelse($links as $link)
				    			@if($link->user_id==Auth::User()->id)
				    				<li><a href="{{$link->path}}" class="btn btn-primary"">{{$link->nom}}</a></li>
				    			@endif
				    		@empty
				    			<p>Pas de lien enregistré</p>
				    		@endforelse
			    		</ul>
			    	</div>
			    </div>
				<div class="card">
					<div class="card-header bg-danger text-white" id="headingOne">
						<h5 class="mb-0">
							Vos Statistiques
						</h5>
			    	</div>
			    	<ul class="list-group list-group-flush">
			    		<li class="list-group-item">
			    			@if(Auth::User()->droit->cadre)
			    				<h6 class="text-danger">Vos Objectifs</h6>
			    			@endif
			    			<p class="text-left">Ici les objectifs</p>
			    		</li>
			    		@yield('content-cadre-stat')
			    	</ul>
			    </div>
				<div class="card">
					<div class="card-header bg-danger text-white" id="headingOne">
						<h5 class="mb-0">
							Vos Notes récentes
						</h5>
			    	</div>
			    	<div class="card-body">
			    		<p class="card-text">ICI SE TROUVERA LES NOTES RECENTES</p>
			    	</div>
			    </div>
			</div>
		</div>		
	</div>
	<div class="row text-center">
		<div class="col-lg-12 mx-auto">
			<div class="card-group">
				<div class="card">
					<div class="card-header bg-danger text-white">
						<h5>
							Vos évenements
						</h5>
					</div>
					<div class="card-body">
						ICI LES EVENEMENTS
					</div>
				</div>
				@yield('content-cadre-ddi')
			</div>
		</div>
	</div>
@stop