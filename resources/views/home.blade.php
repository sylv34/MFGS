@extends('layouts.master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->droit->cadre)
                        You are logged in {{Auth::user()->nom}} section {{Auth::user()->droit->libelle}}!
                        @foreach($poles as $pole)
                            {{$pole->libelle}}
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
