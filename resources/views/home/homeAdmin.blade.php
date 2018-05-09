@extends('layouts.content')

@section('content-cadre-stat')
	{!! $chart->container() !!}	
	{!! $chart->script() !!}
@stop

@section('content-cadre-ddi')
	<div class="card">
		<div class="card-header bg-danger text-white">
			<h5>Vos DDI</h5>
		</div>
		<div class="card-body text-center">
			<ul class="list-group">
				<li class="list-group-item text-center">
					<div class="row">
						<div class="col">
							<strong>Titre</strong>
						</div>
						<div class="col">
							<strong>Urgence</strong>
						</div>
						<div class="col">
							<strong>Statut</strong>
						</div>
					</div>
				</li>
				@forelse($data['ddis'] as $ddi)
					<li class="list-group-item">
						<div class="row">
							<div class="col">
								<a href="{{route('support.edit',$ddi->id)}}">{{$ddi->titre}}</a>
							</div>
							<div class="col {{$ddi->urgence_ddi->id==4 ? 'text-danger font-weight-bold' : ''}}">
								{{$ddi->urgence_ddi->libelle}}
							</div>
							<div class="col">
								{{$ddi->statu_ddi->libelle}}
							</div>
						</div>
					</li>
				@empty
					<p>Pas de DDI. Bien joué !</p>
				@endforelse
			</ul>
		</div>
	</div>
@stop