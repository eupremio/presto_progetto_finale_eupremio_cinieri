<x-layout>

    <div class="container">

        @if (session()->has('message'))
            <div class="row justify-content-center pt-4">
                <div class="col-12 col-md-8">
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                </div>
            </div>
        @endif

        <div class="row min-vh-100 align-items-center">
            <div class="col-12 text-center">

                <h1>Presto.it</h1>

                <p>Compra e vendi quello che vuoi.</p>

                @auth
                    <a href="{{ route('create.article') }}" class="btn btn-primary">
                        Inserisci articolo
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary">
                        Accedi per inserire un articolo
                    </a>
                @endauth

            </div>
        </div>

        <div class="row justify-content-center align-items-center py-5">

            <div class="col-12">
                <h2 class="text-center">
                    I nostri annunci
                </h2>
            </div>

            @forelse ($articles as $article)

                <div class="col-12 col-md-4">
                    <x-card :article="$article" />
                </div>

            @empty

                <div class="col-12">
                    <h3 class="text-center">
                        Non sono ancora stati creati articoli
                    </h3>
                </div>

            @endforelse

        </div>

    </div>

</x-layout>