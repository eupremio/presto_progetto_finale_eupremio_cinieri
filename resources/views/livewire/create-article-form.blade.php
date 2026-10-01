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

        <div class="mb-3">

            <label for="images" class="form-label">
                Immagini
            </label>

            <input
                type="file"
                id="images"
                class="form-control"
                wire:model="temporary_images"
                multiple
            >

            @error('temporary_images.*')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            @error('temporary_images')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>

        @if (!empty($images))

            <div class="row mb-3">

                @foreach ($images as $key => $image)

                    <div
                        class="col-6 col-md-3 text-center mb-3"
                        wire:key="{{ $key }}"
                    >

                        <img
                            src="{{ $image->temporaryUrl() }}"
                            class="img-fluid img-thumbnail"
                            alt="Anteprima immagine"
                        >

                        <button
                            type="button"
                            class="btn btn-danger mt-2"
                            wire:click="removeImage({{ $key }})"
                        >
                            Rimuovi
                        </button>

                    </div>

                @endforeach

            </div>

        @endif

        <button type="submit" class="btn btn-primary">
            Crea articolo
        </button>

    </form>

</div>