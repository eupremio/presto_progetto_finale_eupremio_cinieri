<x-layout>

    <div class="container py-5">

        <div class="row">

            <div class="col-12">
                <h1 class="text-center">
                    Risultati per: {{ $query }}
                </h1>
            </div>

        </div>

        <div class="row justify-content-center">

            @forelse ($articles as $article)

                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>

            @empty

                <div class="col-12">
                    <h3 class="text-center">
                        Nessun articolo corrisponde alla tua ricerca
                    </h3>
                </div>

            @endforelse

        </div>

        <div class="row">

            <div class="col-12">
                {{ $articles->links() }}
            </div>

        </div>

    </div>

</x-layout>