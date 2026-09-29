<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">

        <a class="navbar-brand" href="{{ route('homepage') }}">
            Presto.it
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('homepage') }}">
                        Home
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.article') }}">
                            Inserisci articolo
                        </a>
                    </li>
                @endauth

            </ul>

            <ul class="navbar-nav">

                @auth

                    <li class="nav-item">
                        <span class="nav-link">
                            Ciao, {{ Auth::user()->name }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="btn nav-link">
                                Logout
                            </button>
                        </form>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Registrati
                        </a>
                    </li>

                @endauth

            </ul>

        </div>
    </div>
</nav>