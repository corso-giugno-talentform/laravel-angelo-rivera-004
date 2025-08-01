<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand text-white d-flex gap-2 hover-scale" href="{{ route('pages.homepage') }}"><img
                src="https://img.icons8.com/?size=100&id=PrR9uwml5KOs&format=png&color=000000" width="30"
                height="30" alt="Logo" />{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Nascondi/Mostra menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-white hover-scale" href="{{ route('pages.homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover-scale" href="{{ route('films.create') }}">Crea Film</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover-scale" href="{{ route('films.index') }}">Visualizza Lista
                            Film</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white hover-scale" href="{{ route('pages.homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white hover-scale" href="{{ route('films.create') }}">Crea Film</a>
                    </li>
                    @if (auth()->user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link text-white hover-scale" href="{{ route('films.index') }}">Gestisci Film</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white hover-scale" href="{{ route('films.index') }}">Visualizza Lista
                                Film</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <p class="nav-link text-white hover-scale mt-3">Ciao, {{ Auth::user()->name }}</p>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link text-white hover-scale" type="submit">Logout</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
