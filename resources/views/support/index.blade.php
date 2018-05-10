@extends('layouts.master')

@section('content')
	@if (session('status'))
	    <div class="alert alert-success">
	        {{ session('status') }}
	    </div>
	@endif
	<div class="card">
		<div class="card-header bg-danger text-white text-center font-weight-bold">
			Demandes d'intervention
    	</div>
    	<div class="card-body">
	    	<table class="table table-striped">
	    		<thead class="text-center">
				    <tr class="text-danger">
						<th scope="col">ID</th>
						<th scope="col">Titre</th>
						<th scope="col">Utilisateur concerné</th>
						<th scope="col">Utilisateur demandeur</th>
						<th scope="col">Urgence</th>
						<th scope="col">Date création</th>
						<th scope="col">Statut</th>
				    </tr>
				</thead>
	    		<tbody class="text-center">
					@forelse($ddis as $ddi)
					    <tr>
					    	<td>DDI_{{$ddi->id}}</td>
					    	<td><a href="{{route('support.edit',$ddi->id)}}" class="">{{$ddi->titre}}</a></td>
					    	<td>{{$ddi->concerne_user->nom.' '.$ddi->concerne_user->prenom}}</td>
					    	<td>{{$ddi->demandeur_user->nom.' '.$ddi->demandeur_user->prenom}}</td>
					    	<td class="{{$ddi->isUrgent()}}">{{$ddi->urgence_ddi->libelle}}</td>
					    	<td>{{$ddi->date_demande}}</td>
					    	<td>{{$ddi->statu_ddi->libelle}}</td>
					    </tr>
					@empty
						<p>Pas de ddi</p>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@stop