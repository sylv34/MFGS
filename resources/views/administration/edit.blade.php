@extends('layouts.master')

@section('content')
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	<div class="card">
		<div class="card-header bg-danger text-white text-center">
			<strong class="text-uppercase">Modifier les informations d'un utilisateur</strong>
		</div>
		<div class="card-body">
			<form action="{{route('administration.update', $data['user']->id)}}" method="POST">
				@csrf
				@method('PUT')
				<div class="form-row col">
					<div class="form-group col-md-4">
						<label for="nom">Nom</label>
						<input type="text" name="nom" id="nom" class="form-control" value="{{$data['user']->nom}}">
					</div>
					<div class="form-group col-md-4 ml-4">
						<label for="prenom">Prénom </label>
						<input type="text" name="prenom" id="prenom" class="form-control" value="{{$data['user']->prenom}}">
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" value="{{$data['user']->email}}">
				</div>
				<div class="form-row col">
					<div class="form-group col-md-5">
						<label for="password">Mot de passe</label>
						<input type="text" name="password" id="password" class="form-control" aria-describedby="passwordHelp">
						<small id="passwordHelp" class="form-text text-muted">Ne rien mettre si le mot de passe ne doit pas être changé</small>
					</div>
					<div class="form-group col-md-5 ml-4">
						<label for="passwordBis">Retaper</label>
						<input type="text" name="passwordBis" id="passwordBis" class="form-control">
					</div>
				</div>
				<div class="form-row col">
					<div class="form-group col-md-5">
						<label for="service">Service</label>
						<select id="service" name="service" class="form-control">
							@foreach($data['services'] as $service)
								<option value="{{$service->id}}">{{$service->libelle}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-5 ml-4">
						<label for="passwordBis">Retaper</label>
						<input type="text" name="passwordBis" id="passwordBis" class="form-control">
					</div>
				</div>
			</form>
		</div>
	</div>
@stop

        <!--Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('isAdmin')->default(false);
            $table->rememberToken();
            $table->unsignedInteger('droit_id');
        });-->