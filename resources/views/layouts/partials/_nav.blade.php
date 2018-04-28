<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="{{route('home')}}"><img src="{{asset('img/logo.jpg')}}" alt="logo_mfgs" width="50" height="50"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    @guest
    @else
        <ul class="navbar-nav justify-content-center">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Notes</a>
            </li>

            @if(Auth::User()->droit->cadre)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="support" >Support</a>
                    <div class="dropdown-menu" aria-labelledby="support">
                        <a class="dropdown-item" href="#">Envoyer une demande</a>
                        <a class="dropdown-item" href="#">Consulter les demandes</a>
                    </div>
                </li>
            @endif

            @if(Auth::User()->isAdmin)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="user" >Utilisateur</a>
                    <div class="dropdown-menu" aria-labelledby="user">
                        <a class="dropdown-item" href="#">Créer</a>
                        <a class="dropdown-item" href="#">Consulter</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" id="pole" >Pôles</a>
                    <div class="dropdown-menu" aria-labelledby="pole">
                        <a class="dropdown-item" href="#">Audition</a>
                        <a class="dropdown-item" href="#">Clinique</a>
                        <a class="dropdown-item" href="#">Communication</a>
                        <a class="dropdown-item" href="#">Comptabilite</a>
                        <a class="dropdown-item" href="#">EHPAD</a>
                        <a class="dropdown-item" href="#">Informatique</a>
                        <a class="dropdown-item" href="#">Logement</a>
                        <a class="dropdown-item" href="#">Optique</a>
                        <a class="dropdown-item" href="#">SSIAD</a>
                    </div>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown ">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nom }} <span class="caret"></span>
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
