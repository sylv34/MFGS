@extends('layouts.master')

@section('content')
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	<div class="card">
		<div class="card-header bg-danger text-white text-center">
			<strong class="text-uppercase">{{$ddi->titre}}</strong>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col">
					<div class="row mb-4">
						<div class="col text-center">
							<strong>DDI_{{$ddi->id}}</strong>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col text-right">
							<strong>Urgence : </strong>
						</div>
						<div class="col text-left {{$ddi->urgence_ddi->id==4 ? 'text-danger' : ''}}">
							{{$ddi->urgence_ddi->libelle}}
						</div>
					</div>
					<div class="row mt-4">
						<div class="col text-right">
							<strong>Statut :</strong>
						</div>
						<div class="col text-left">
							<form method="POST" action="{{route('support.update', $ddi->id)}} ">
								@csrf
								@method('PUT')
								<select name="statut">
									@foreach($statuts as $statut)
										  <option value="{{$statut->id}}" {{$ddi->statu_ddi_id == $statut->id ?'selected':''}}>{{$statut->libelle}}</option>
									@endforeach
								</select>
						</div>
					</div>
					<div class="row mt-4">
						<div class="col text-right">
							<strong>Demandeur : </strong>
						</div>
						<div class="col text-left">
							{{$ddi->demandeur_user->nom}} {{$ddi->demandeur_user->prenom}}
						</div>
					</div>
					<div class="row mt-4">
						<div class="col text-right">
							<strong>Concerné : </strong>
						</div>
						<div class="col text-left">
							{{$ddi->concerne_user->nom}} {{$ddi->concerne_user->prenom}}
						</div>
					</div>
					<div class="row mt-4">
						<div class="col text-right">
							<strong>Date demande : </strong>
						</div>
						<div class="col text-left">
							{{$ddi->date_demande}}
						</div>
					</div>
				</div>
				<div class="col">
					<div class="row mt-4">
						<div class="col text-center">
							<strong>{{$ddi->contenu}}</strong>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4">
				<div class="col">
						<div class="row">
							<div class="col text-center">
      							<textarea id="commentaire" name="commentaires" rows="10" cols="100" placeholder="{{$ddi->commentaires ??'Inscrire les commentaires ici'}}">{{$ddi->commentaires}}</textarea>
							</div>
						</div>
						<div class="row">
							<div class="col text-right">
								<a class="btn btn-danger mt-4" href="{{route('support.visu')}}" role="button">Retour</a>
							</div>
							<div class="col text-left">
								<button class="btn btn-danger mt-4" type="submit">Enregistrer</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@stop