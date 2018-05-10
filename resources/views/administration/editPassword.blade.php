@extends('layouts.master')
@section('content')
	<div class="card">
		<div class="card-header bg-danger text-white text-center">
			<strong class="text-uppercase">Modifier le mot de passe de {{$user->nom}} {{$user->prenom}}</strong>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-4 mx-auto">
					<form action="{{route('administration.updatePassword', $user->id)}}" method="POST" class="text-center mx-auto">
						@csrf
						@method('PUT')
						<div class="form-group col">
							<label for="pw">Nouveau mot de passe</label>
							<input type="password" name="pw" id="pw" class="form-control" placeholder="Entrez le nouveau mot de passe">
						</div>
						<div class="form-group col">
							<label for="pw2">Retapez </label>
							<input type="password" name="pw2" id="pw2" class="form-control" placeholder="Retapez le mot de passe">
							<small class="text-danger">{{$errors->first()}}</small>
						</div>
						<div class="form-row mt-4 text-center">
							<div class="form-group col">
								<button type="submit" class="btn btn-danger">Modifier</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop