<div class="row justify-content-center">
    <div class="col-lg-8">
        @if (session('success'))
            <x-alert color="alert-success"> {{ session('success') }}</x-alert>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
        <form class="" action="{{ route('films.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ $id ?? '' }}
            <div class="mb-3">
                <label for="title" class="form-label">Titolo del film</label>
                <input type="text" class="@error('title') is-invalid @enderror" id="title" name="title"
                    placeholder="Inserisci il titolo" autocomplete="off" value="{{ old('title') }}">

            </div>
            <div class="mb-3">
                <label for="release_year" class="form-label">Anno di Pubblicazione</label>
                <input type="number" class="@error('release_year') is-invalid @enderror" id="release_year"
                    name="release_year" placeholder="Inserisci l'anno" autocomplete="off"
                    value="{{ old('release_year') }}">

            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genere del film</label>
                <input type="text" class="@error('genre') is-invalid @enderror" id="genre" name="genre"
                    placeholder="Inserisci il genere" autocomplete="off" value="{{ old('genre') }}">

            </div>
            <div class="mb-3">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione del film</label>
                    <textarea id="description" name="description" placeholder="Inserisci la descrizione"
                        class="@error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Durata del film</label>
                <input type="number" class="@error('duration') is-invalid @enderror" id="duration" name="duration"
                    rows="5" placeholder="Espressa in minuti" autocomplete="off" value="{{ old('duration') }}">
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Immagine Cover</label>
                <input class="@error('cover') is-invalid @enderror" type="file" id="cover" name="cover">
            </div>
            <button type="submit" class="btn btn-primary w-100">Salva</button>
        </form>
    </div>
</div>
