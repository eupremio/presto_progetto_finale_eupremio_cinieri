<x-layout>

    <div class="container">
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
    </div>

</x-layout>