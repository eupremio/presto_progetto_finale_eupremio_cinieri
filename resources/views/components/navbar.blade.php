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

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">
                        {{ __('ui.allArticles') }}
                    </a>
                </li>

                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-bs-toggle="dropdown"
                    >
                        {{ __('ui.categories') }}
                    </a>

                    <ul class="dropdown-menu">

                        @foreach ($categories as $category)

                            <li>
                                <a
                                    class="dropdown-item"
                                    href="{{ route('article.byCategory', $category) }}"
                                >
                                    {{ __('ui.' . $category->name) }}
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
                            {{ __('ui.insertArticle') }}
                        </a>
                    </li>

                    @if (Auth::user()->is_revisor)

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revisor.index') }}">
                                {{ __('ui.revisor') }}

                                <span class="badge rounded-pill bg-danger">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>

                    @else

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('become.revisor') }}">
                                {{ __('ui.becomeRevisor') }}
                            </a>
                        </li>

                    @endif

                @endauth

            </ul>

            <div class="d-flex align-items-center">
                <x-_locale lang="it" />
                <x-_locale lang="uk" />
                <x-_locale lang="es" />
            </div>

            <form
                class="d-flex me-3"
                role="search"
                action="{{ route('search.article') }}"
                method="GET"
            >
                <input
                    class="form-control me-2"
                    type="search"
                    name="query"
                    placeholder="{{ __('ui.search') }}"
                    aria-label="Search"
                >

                <button class="btn btn-outline-success" type="submit">
                    {{ __('ui.search') }}
                </button>
            </form>

            <ul class="navbar-nav">

                @auth

                    <li class="nav-item">
                        <span class="nav-link">
                            {{ __('ui.hello') }}, {{ Auth::user()->name }}
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
                            {{ __('ui.register') }}
                        </a>
                    </li>

                @endauth

            </ul>

        </div>

    </div>
</nav>