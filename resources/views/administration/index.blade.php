@extends('layouts.master')

@section('content')
	<div class="card">
		<div class="card-header bg-danger text-white text-center font-weight-bold">
			Utilisateurs enregistrés
    	</div>
    	<div class="card-body">
	    	<table class="table table-striped">
	    		<thead class="text-center">
				    <tr class="text-danger">
						<th scope="col">ID</th>
						<th class="text-left" scope="col">Nom Prénom</th>
						<th scope="col">Email</th>
						<th scope="col">Service</th>
						<th scope="col">Cadre (oui/non)</th>
						<th scope="col">Administrateur(oui/non)</th>
				    </tr>
				</thead>
	    		<tbody class="text-center">
					@foreach($users as $user)
					    <tr>
					    	<td>{{$user->id}}</td>
					    	<td class="text-left"><a href="{{route('administration.edit',$user->nom)}}" class="">{{$user->nom}} {{$user->prenom}}</a></td>
					    	<td>{{$user->email}}</td>
					    	<td>{{$user->droit->libelle}}</td>
					    	<td>{{$user->isCadre() ? 'Oui' : 'Non'}} </td>
					    	<td>{{$user->isAdmin ? 'Oui' : 'Non'}}</td>
					    </tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@stop