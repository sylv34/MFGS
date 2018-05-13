@extends('layouts.master')

@section('content')
<div class="card">
	<div class="card-header bg-danger text-white text-center">
		<strong class="text-uppercase">Ajouter une note</strong>
	</div>
	<div class="card-body">
		<form action="{{route('note.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="form-row">
				<div class="form-group col border-right mr-4 pr-4">
					<fieldset>
						<legend>Note</legend>
						<label for="titre">Titre*</label>
						<input type="text" name="titre" id="titre" class="form-control">
						<small class="text-danger">{{$errors->first('titre')}}</small>
						<div class="input-group mt-5">
							<input type="file" class="form-control-file" id="inputGroupFile01" name="note">
							<label for="inputGroupFile01">Choisir un fichier *.pdf uniquement</label>
						</div>
						<small class="text-danger">{{$errors->first('note')}}</small>
					</fieldset>
				</div>
				<div class="custom-checkbox col">
					<fieldset>
						<legend>Services</legend>
						<div class="form-group custom-control custom-control-inline">
							<input class="custom-control-input" type="checkbox" id="info" name="info" >
							<label class="custom-control-label ml-2" for="info">
								Informatique
							</label>
						</div>
						@foreach($libelles as $libelle)
						<div class="form-group custom-control custom-control-inline">
							<input class="custom-control-input" type="checkbox" id="{{$libelle->libelle}}" name="{{$libelle->id}}" >
							<label class="custom-control-label ml-2" for="{{$libelle->libelle}}">
								{{$libelle->libelle}}
							</label>
						</div>
						@endforeach
						<div class="form-group custom-control custom-control-inline">
							<input class="custom-control-input" type="checkbox" id="tout" name="tout" >
							<label class="custom-control-label ml-2" for="tout">
								Tout le monde
							</label>
						</div>
					</fieldset>
					<fieldset class="mt-4">
						<legend>Autre</legend>
						<div class="form-group custom-control custom-control-inline mt-2">
							<div class="custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="cadre" name="cadre" >
								<label class="custom-control-label ml-2" for="cadre">
									Cadre
								</label>
							</div>
						</div>
					</fieldset>
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