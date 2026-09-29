<x-layout>

    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center">
            <div class="col-12 col-md-6">

                <h1 class="text-center mb-4">Accedi</h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

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

                    <button type="submit" class="btn btn-primary">
                        Accedi
                    </button>
                </form>

            </div>
        </div>
    </div>

</x-layout>