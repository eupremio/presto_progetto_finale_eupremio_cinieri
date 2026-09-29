<x-layout>

    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-12 col-md-6">

                <h1 class="text-center mb-4">Registrati</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>

                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-control"
                            value="{{ old('email') }}"
                        >

                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>

                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-control"
                        >

                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">
                            Conferma password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            id="password_confirmation"
                            class="form-control"
                        >
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Registrati
                    </button>
                </form>

            </div>
        </div>
    </div>

</x-layout>