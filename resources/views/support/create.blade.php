@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-header bg-danger text-white text-center font-weight-bold">
			Envoyer une demande d'intervention
		</div>
		<div class="card-body">
			<form action="{{route('support.store')}}", method="POST">
				@csrf
				<div class="form-row col">
					<div class="form-group col-md-2">
						<label for="service">Service concerné : </label>
						<select id="service" name="service" class="form-control">
							@foreach($data['libelles'] as $libelle)
								<option value="{{$libelle->id}}" >{{$libelle->libelle}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group col-md-4 ml-4">
						<label for="userConcerne">Utilisateur concerné : </label>
						<select name="userConcerne" class="form-control">
							@foreach($data['users'] as $user)
								<option value="{{$user->id}}" >{{$user->nom}} {{$user->prenom}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-row col">
					<div class="form-group col-md-2">
						<label for="urgence">Urgence : </label>
						<select id="urgence" name="urgence" class="form-control">
							@foreach($data['urgence'] as $urgence)
								<option value="{{$urgence->id}}">{{$urgence->libelle}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<label for="titre">Description courte</label>
					<input type="text" name="titre" class="form-control" id="titre" aria-describedby="titreHelp" placeholder="Entrez un description courte">
					<small id="titreHelp" class="form-text text-muted">Max 200 caractères.</small>
				</div>
				<div class="form-group col">
					<label for="contenu">Description de votre demande</label>
					<textarea class="form-control" id="contenu" name="contenu" placeholder="Entrez une déscription précise de votre demande" aria-describedby="contenuHelp" rows="10"></textarea>
					<small id="titreHelp" class="form-text text-muted">N'oubliez pas d'être précis dans votre demande</small>
				</div>
				<div class="col">
					<button type="submit" class="btn btn-danger">Envoyer</button>
				</div>
			</form>
		</div>
	</div>
@stop