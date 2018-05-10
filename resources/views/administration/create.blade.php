@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-header bg-danger text-white text-center">
			<strong class="text-uppercase">Ajouter un utilisateur</strong>
		</div>
		<div class="card-body">
			<form action="{{route('administration.store')}}" method="POST">
				@csrf
				<div class="form-row col">
					<div class="form-group col-md-4">
						<label for="nom">Nom*</label>
						<input type="text" name="nom" id="nom" class="form-control">
						<small class="text-danger">{{$errors->first('nom')}}</small>
					</div>
					<div class="form-group col-md-4 ml-4">
						<label for="prenom">Prénom* </label>
						<input type="text" name="prenom" id="prenom" class="form-control">
						<small class="text-danger">{{$errors->first('prenom')}}</small>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="email">Email*</label>
					<input type="email" name="email" id="email" class="form-control">
					<small class="text-danger">{{$errors->first('email')}}</small>
				</div>
				<div class="form-row col">
					<div class="form-group col-md-4">
						<label for="pw">Mot de passe*</label>
						<input type="password" name="pw" id="pw" class="form-control">
						<small class="text-danger">{{$errors->first('pw2')}}</small>
					</div>
					<div class="form-group col-md-4 ml-4">
						<label for="pw2">Confirmation*</label>
						<input type="password" name="pw2" id="pw2" class="form-control">
					</div>
				</div>
				<div class="form-row col align-items-start">
					<div class="form-group col-md-4">
						<label for="service">Service</label>
						<select id="service" name="service" class="form-control">
							@foreach($services as $service)
								<option value="{{$service->id}}">{{$service->libelle}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col custom-control custom-control-inline my-auto ml-4">
						<div class="custom-checkbox col">
							<input class="custom-control-input" type="checkbox" id="cadre" name="cadre" >
							<label class="custom-control-label ml-2" for="cadre">
							Cadre
							</label>
						</div>
						<div class="custom-checkbox col">
						  <input class="custom-control-input checkbox-danger" type="checkbox" id="admin" name="admin">
						  <label class="custom-control-label ml-2" for="admin">
						    Administrateur
						  </label>
						</div>
					</div>
				</div>
				<div class="form-row mt-4 text-center">
					<div class="form-group col">
						<button type="submit" class="btn btn-danger">Envoyer</button>
					</div>
				</div>
			</form>
		</div>
	</div>
@stop