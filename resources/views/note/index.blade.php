@extends('layouts.master')

@section('content')
<div class="card">
	<div class="card-header bg-danger text-white text-center font-weight-bold">
		Notes
	</div>
	<div class="card-body">
		<table class="table table-striped">
			<thead class="text-center">
				<tr class="text-danger">
					<th scope="col-lg-1">ID</th>
					<th scope="col-lg-6">Titre</th>
					<th scope="col-lg-3">Date publication</th>
					<th scope="col-lg-1">Visualiser</th>
					<th scope="col-lg-1">Télécharger</th>
				</tr>
			</thead>
			<tbody class="text-center">
				@forelse($notes as $note)
				<tr>
					<td class="col-lg-1">
						{{$note->id}}
					</td>
					<td class="col-lg-6 text-left">
						{{$note->titre}}
					</td>
					<td class="col-lg-3">
						{{$note->datePublication}}
					</td>
					<td class="col-lg-1">
						<a href="{{route('note.show', $note->id)}}" target='_blank'><img src="{{asset('img/visu.ico')}}"></a>
					</td>
					<td class="col-lg-1">
						<a href="{{route('note.download', $note->id)}}" target='_blank'><img src="{{asset('img/download.ico')}}"></a>
					</td>
				</tr>
				@empty
				<p>Pas de note disponible</p>
				@endforelse
			</tbody>
		</table>
	</div>
</div>
@stop