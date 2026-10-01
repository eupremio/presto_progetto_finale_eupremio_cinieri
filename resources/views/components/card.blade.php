<div class="card mx-auto mb-4" style="width: 18rem;">

    <img
        src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/300/200' }}"
        class="card-img-top"
        alt="Immagine dell'articolo {{ $article->title }}"
    >

    <div class="card-body">

        <h5 class="card-title">
            {{ $article->title }}
        </h5>

        <p class="card-text">
            {{ $article->price }} €
        </p>

        <a
            href="{{ route('article.byCategory', $article->category) }}"
            class="card-link"
            style="margin-right: 10px;"
        >
            {{ $article->category->name }}
        </a>

        <a
            href="{{ route('article.show', $article) }}"
            class="btn btn-primary"
        >
            Dettaglio
        </a>

    </div>

</div>