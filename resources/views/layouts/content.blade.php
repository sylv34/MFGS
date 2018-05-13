@extends('layouts.master')

@section('content')
<div class="row mt-4">
	<div class="col-lg-12">
		<img src="{{asset('img/logos-activite.jpg')}}" alt="logo_mfgs" class="rounded mx-auto d-block">
	</div>
</div>
<div class="row mt-2 mb-4">
	<div class="col-lg-12">
		<h4 class="text-muted text-center">Nous sommes le {{now()->format('d / m / Y')}}</h4>
	</div>
</div>
<style type="text/css">

</style>
<div class="row text-center">
	<div class="col mx-auto">
		@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif
		<div class="card-group">
			<div class="card">
				<div class="card-header bg-danger text-white" id="liens">
					<h5 class="mb-0">
						Vos Liens
					</h5>
				</div>
				<div class="card-body text-left">
					<table class="table">
						<tbody class="text-left">
							@forelse($data['links'] as $link)
							@if($loop->iteration % 2==1)
							<tr>
								@endif
								<td>
									<a class="text-danger  mb-4" href="{{$link->path}}" role="button">
										<span>
											<img src="http://www.google.com/s2/favicons?domain={{parse_url($link->path)['host']}}" />
										</span>
										<span class="ml-3">{{$link->nom}}</span>
									</a>
								</td>
								@if($loop->iteration % 2==0)
							</tr>
							@endif
							@empty
							Pas de lien enregistré
							@endforelse
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="mx-auto ">
						{{$data['links']->links()}}	
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-danger text-white" id="headingOne">
					<h5 class="mb-0">
						Vos Notes récentes
					</h5>
				</div>
				<div class="card-body">
					<ul class="list-group">
						<li class="list-group-item text-center">
							<div class="row">
								<div class="col-lg-6">
									<strong>Titre</strong>
								</div>
								<div class="col-lg-4">
									<strong>Date publication</strong>
								</div>
								<div class="col-lg-1">

								</div>
								<div class="col-lg-1">
									
								</div>
							</div>
						</li>
						@forelse($data['notes'] as $note)
						<li class="list-group-item">
							<div class="row">
								<div class="col-lg-6 text-left">
									{{$note->titre}}
								</div>
								<div class="col-lg-4">
									{{$note->datePublication}}
								</div>
								<div class="col-lg-1">
									<a href="{{route('note.show', $note->id)}}" target='_blank'><img src="{{asset('img/visu.ico')}}"></a>
								</div>
								<div class="col-lg-1">
									<a href="{{route('note.download', $note->id)}}" target='_blank'><img src="{{asset('img/download.ico')}}"></a>
								</div>
							</div>
						</li>
						@empty
						<p>Pas de note disponible</p>
						@endforelse
					</ul>
				</div>
			</div>
		</div>
	</div>		
</div>
<div class="row text-center">
	<div class="col mx-auto">
		<div class="card-group">
			@yield('content-cadre-ddi')
			<div class="card">
				<div class="card-header bg-danger text-white" id="headingOne">
					<h5>
						Vos Statistiques
					</h5>
				</div>
				<div class="card-body">
					@yield('content-cadre-stat')
				</div>
			</div>
		</div>
	</div>
</div>
@stop