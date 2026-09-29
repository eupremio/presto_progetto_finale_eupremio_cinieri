<div>

    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="store">

        <div class="mb-3">
            <label for="title" class="form-label">Titolo</label>

            <input
                type="text"
                id="title"
                class="form-control"
                wire:model.blur="title"
            >

            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>

            <textarea
                id="description"
                class="form-control"
                wire:model.blur="description"
            ></textarea>

            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Prezzo</label>

            <input
                type="number"
                step="0.01"
                id="price"
                class="form-control"
                wire:model.blur="price"
            >

            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>

            <select
                id="category"
                class="form-select"
                wire:model.blur="category"
            >
                <option value="">Scegli una categoria</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach

            </select>

            @error('category')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Crea articolo
        </button>

    </form>

</div>