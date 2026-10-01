<x-layout>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-12 col-md-6">

                <div id="articleCarousel" class="carousel slide">

                    <div class="carousel-inner">

                        @forelse ($article->images as $image)

                            <div class="carousel-item @if($loop->first) active @endif">

                                <img
                                    src="{{ Storage::url($image->path) }}"
                                    class="d-block w-100"
                                    alt="Immagine articolo {{ $article->title }}"
                                >

                            </div>

                        @empty

                            <div class="carousel-item active">

                                <img
                                    src="https://picsum.photos/800/500"
                                    class="d-block w-100"
                                    alt="Immagine articolo {{ $article->title }}"
                                >

                            </div>

                        @endforelse

                    </div>

                    @if ($article->images->count() > 1)

                        <button
                            class="carousel-control-prev"
                            type="button"
                            data-bs-target="#articleCarousel"
                            data-bs-slide="prev"
                        >
                            <span class="carousel-control-prev-icon"></span>
                        </button>

                        <button
                            class="carousel-control-next"
                            type="button"
                            data-bs-target="#articleCarousel"
                            data-bs-slide="next"
                        >
                            <span class="carousel-control-next-icon"></span>
                        </button>

                    @endif

                </div>

            </div>

            <div class="col-12 col-md-6">

                <h1>
                    {{ $article->title }}
                </h1>

                <h3>
                    {{ $article->price }} €
                </h3>

                <p>
                    {{ $article->description }}
                </p>

                <p>
                    Categoria:
                    <a href="{{ route('article.byCategory', $article->category) }}">
                        {{ $article->category->name }}
                    </a>
                </p>

                <p>
                    Pubblicato da:
                    {{ $article->user->name }}
                </p>

            </div>

        </div>

    </div>

</x-layout>