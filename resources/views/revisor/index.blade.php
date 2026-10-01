<x-layout>

    <div class="container py-5">

        <div class="row">
            <div class="col-12">

                @if (session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                @endif

            </div>
        </div>

        @if ($article_to_check)

            <div class="row justify-content-center">

                <div class="col-12 col-md-8">

                    <h1 class="text-center mb-5">
                        Articolo da revisionare
                    </h1>

                    <div class="card">

                        <div id="revisorCarousel" class="carousel slide">

                            <div class="carousel-inner">

                                @forelse ($article_to_check->images as $image)

                                    <div class="carousel-item @if($loop->first) active @endif">

                                        <img
                                            src="{{ $image->getUrl(300, 300) }}"
                                            class="d-block w-100"
                                            alt="Immagine articolo {{ $article_to_check->title }}"
                                        >

                                    </div>

                                @empty

                                    <div class="carousel-item active">

                                        <img
                                            src="https://picsum.photos/800/400"
                                            class="d-block w-100"
                                            alt="Immagine articolo {{ $article_to_check->title }}"
                                        >

                                    </div>

                                @endforelse

                            </div>

                            @if ($article_to_check->images->count() > 1)

                                <button
                                    class="carousel-control-prev"
                                    type="button"
                                    data-bs-target="#revisorCarousel"
                                    data-bs-slide="prev"
                                >
                                    <span class="carousel-control-prev-icon"></span>
                                </button>

                                <button
                                    class="carousel-control-next"
                                    type="button"
                                    data-bs-target="#revisorCarousel"
                                    data-bs-slide="next"
                                >
                                    <span class="carousel-control-next-icon"></span>
                                </button>

                            @endif

                        </div>

                        <div class="card-body">

                            <h2>
                                {{ $article_to_check->title }}
                            </h2>

                            <p>
                                {{ $article_to_check->description }}
                            </p>

                            <p>
                                Prezzo: {{ $article_to_check->price }} €
                            </p>

                            <p>
                                Categoria: {{ $article_to_check->category->name }}
                            </p>

                            <p>
                                Autore: {{ $article_to_check->user->name }}
                            </p>

                            @foreach ($article_to_check->images as $image)

                                <div class="card my-3">

                                    <div class="card-body">

                                        <h5 class="card-title">
                                            Analisi immagine {{ $loop->iteration }}
                                        </h5>

                                        <p>
                                            <i class="{{ $image->adult }}"></i>
                                            Adult
                                        </p>

                                        <p>
                                            <i class="{{ $image->spoof }}"></i>
                                            Spoof
                                        </p>

                                        <p>
                                            <i class="{{ $image->medical }}"></i>
                                            Medical
                                        </p>

                                        <p>
                                            <i class="{{ $image->violence }}"></i>
                                            Violence
                                        </p>

                                        <p>
                                            <i class="{{ $image->racy }}"></i>
                                            Racy
                                        </p>

                                    </div>

                                </div>

                            @endforeach

                            <div class="d-flex justify-content-between">

                                <form
                                    action="{{ route('reject.article', $article_to_check) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-danger" type="submit">
                                        Rifiuta
                                    </button>
                                </form>

                                <form
                                    action="{{ route('accept.article', $article_to_check) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <button class="btn btn-success" type="submit">
                                        Accetta
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @else

            <div class="row">
                <div class="col-12">

                    <h1 class="text-center">
                        Non ci sono articoli da revisionare
                    </h1>

                </div>
            </div>

        @endif

    </div>

</x-layout>