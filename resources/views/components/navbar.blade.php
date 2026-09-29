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
                    <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">
                        Tutti gli articoli
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        Categorie
                    </a>

                    <ul class="dropdown-menu">

                        @foreach ($categories as $category)

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('article.byCategory', $category) }}"
                                >
                                    {{ $category->name }}
                                </a>
                            </li>

                            @if (!$loop->last)
                                <li><hr class="dropdown-divider"></li>
                            @endif

                        @endforeach

                    </ul>
                </li>

                @auth

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('create.article') }}">
                            Inserisci articolo
                        </a>
                    </li>

                    @if (Auth::user()->is_revisor)

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revisor.index') }}">
                                Revisore

                                <span class="badge rounded-pill bg-danger">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('become.revisor') }}">
                                Diventa revisore
                            </a>
                        </li>

                    @endif

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