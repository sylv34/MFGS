@guest
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #dc3545;">
    <a class="navbar-brand" href="{{route('login')}}"><img src="{{asset('img/logo.jpg')}}" alt="logo_mfgs" width="50" height="50"></a>
    @else
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #dc3545;">
        <a class="navbar-brand" href="{{route('home',[Auth::user()->nom])}}"><img src="{{asset('img/logo.jpg')}}" alt="logo_mfgs" width="50" height="50"></a>
        <ul class="navbar-nav">
            <style type="text/css">
            .nav-item{
                font-weight: bold;
            }
        </style>
        <li class="nav-item active">

            <a class="nav-link" href="{{route('home',[Auth::user()->nom])}}">Accueil {!!url()->current()==route('home') ? '<span class="sr-only">(current)</span>' : ''!!}</a>
        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="support" >Notes</a>
            <div class="dropdown-menu" aria-labelledby="support">
                <a class="dropdown-item" href="{{route('note.create')}}">Envoyer une note</a>
                <a class="dropdown-item" href="{{route('home')}}">Consulter les notes</a>
            </div>
        </li>
        @if(Auth::User()->droit->cadre)
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="support" >Support</a>
            <div class="dropdown-menu" aria-labelledby="support">
                <a class="dropdown-item" href="{{route('support.create')}}">Envoyer une demande</a>
                <a class="dropdown-item" href="{{route('support.visu')}}">Consulter les demandes</a>
            </div>
        </li>
        @endif

        @if(Auth::User()->isAdmin)
        <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="user" >Utilisateur</a>
            <div class="dropdown-menu" aria-labelledby="user">
                <a class="dropdown-item" href="{{route('administration.create')}}">Créer</a>
                <a class="dropdown-item" href="{{route('administration.index')}}">Consulter</a>
            </div>
        </li>
        @endif
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown ">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }}<span class="caret"></span>
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
</ul>
@endguest
</nav>
