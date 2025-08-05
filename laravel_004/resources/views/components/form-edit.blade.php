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
        <form class="" action="{{ route('films.update', ['film' => $film]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            {{ $id ?? '' }}
            <div class="mb-3">
                <label for="title" class="form-label">Titolo del film</label>
                <input type="text" class="@error('title') is-invalid @enderror" id="title" name="title"
                    placeholder="Inserisci il titolo" autocomplete="off" value="{{ $film->title }}">

            </div>
            <div class="mb-3">
                <label for="release_year" class="form-label">Anno di Pubblicazione</label>
                <input type="number" class="@error('release_year') is-invalid @enderror" id="release_year"
                    name="release_year" placeholder="Inserisci l'anno" autocomplete="off"
                    value="{{ $film->release_year }}">

            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genere del film</label>
                <input type="text" class="@error('genre') is-invalid @enderror" id="genre" name="genre"
                    placeholder="Inserisci il genere" autocomplete="off" value="{{ $film->genre }}">

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione del film</label>
                <textarea class="@error('description') is-invalid @enderror" id="description" name="description" rows="5"
                    placeholder="Descrizione breve" autocomplete="off">{{ $film->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Durata del film</label>
                <input type="number" class="@error('duration') is-invalid @enderror" id="duration" name="duration"
                    rows="5" placeholder="Espressa in minuti" autocomplete="off" value="{{ $film->duration }}">
            </div>
            <div class="mt-5 mb-4 select-wrapper">
                <label for="author" class="form-label">Regista Attuale</label>
                <select name="author_id" class="custom-netflix-select" id="inputAuthor">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}"
                            {{ $author->id == $film->author_id ? 'selected' : 'Sconosciuto' }}>
                            {{ $author->firstname . ' ' . $author->lastname }}
                        </option>
                    @endforeach
                </select>
                <a href="{{ route('authors.create') }}" type="button" class="mt-2 btn btn btn-success me-md-2">
                    Crea Nuovo Autore
                </a>
            </div>
            <div class="mb-3">
                @foreach ($genres as $genre)
                    <div class="form-check ">
                        <input @if ($film->genres->contains($genre->id)) checked @endif name="genres[]" class="form-check-input"
                            type="checkbox" value="{{ $genre->id }}" id="checkDefault-{{ $genre->id }}">
                        <label class="form-check-label" for="checkDefault-{{ $genre->id }}">
                            {{ $genre->name }}
                        </label>
                    </div>
                @endforeach

                <a href="{{ route('genres.create') }}" type="button" class="mt-2 btn btn btn-success me-md-2">
                    Crea Nuovo Genere
                </a>
            </div>
            <div class="mb-3">
                <img style="height:100px" src="{{ Storage::url($film->cover) }}" alt="">
                <label for="cover" class="form-label">Immagine Cover Attuale</label>
                <input class="@error('cover') is-invalid @enderror" type="file" id="cover" name="cover">
            </div>
            <button type="submit" class="btn btn-primary w-100">Aggiorna</button>
        </form>
    </div>
</div>
