@extends('layouts.master')

@section('content')
	<div class="card">
			<div class="card-header bg-danger text-white">
				<div class="row">
					<div class="col">
						ID
					</div>
					<div class="col">
						Titre
					</div>
					<div class="col">
						Utilisateur concerné
					</div>
					<div class="col">
						Utilisateur demandeur
					</div>
					<div class="col">
						Urgence
					</div>
					<div class="col">
						Date création
					</div>
					<div class="col">
						Statu
					</div>
				</div>
					
	    	</div>
	    	<div class="card-body text-left">
				@forelse($ddis as $ddi)
		    		<div class="row">
		    			<div class="col">
		    				DDI_{{$ddi->id}}
		    			</div>
		    			<div class="col">
		    				<a href="{{route('support.edit',$ddi->id)}}">{{$ddi->titre}}</a>
		    			</div>
		    			<div class="col">
			    			{{$ddi->concerne_user->nom.' '.$ddi->concerne_user->prenom}}
		    			</div>
		    			<div class="col">
		    				{{$ddi->demandeur_user->nom.' '.$ddi->demandeur_user->prenom}}
		    			</div>
		    			<div class="col">
		    				{{$ddi->urgence_ddi->libelle}}
		    			</div>
		    			<div class="col">
		    				{{$ddi->date_demande}}
		    			</div>
		    			<div class="col">
							{{$ddi->statu_ddi->libelle}}
						</div>
			    	</div>
				@empty
	    	</div>
	    </div>
		<p>Pas de ddi</p>
	@endforelse
@stop