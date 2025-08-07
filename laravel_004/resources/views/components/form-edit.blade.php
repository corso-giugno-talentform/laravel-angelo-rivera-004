<div class="row justify-content-center">
    <div class="col-lg-8">
        @if (session('success'))
            <x-alert color="alert-success"> {{ session('success') }}</x-alert>
        @endif

        <x-errors-all />

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
                    <img src="https://img.icons8.com/?size=100&id=0w8efhRZ2Ijj&format=png&color=000000" width="30"
                        height="30" alt="Add director" /> <img
                        src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExcmZraDZ6N2psMm0wNHZpdjhxemR0NHVkdXFvcHRtcnQ0dzhmaDE0YSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/aLPcVjHz13bnCrlM9D/giphy.gif"
                        width="30" height="30" alt="Add director" />
                </a>
            </div>
            <div class="mb-3">
                @foreach ($genres as $genre)
                    <div>
                        <input @if ($film->genres->contains($genre->id)) checked @endif name="genres[]" class="custom-checkbox"
                            type="checkbox" value="{{ $genre->id }}" id="checkDefault-{{ $genre->id }}">
                        <label class="form-check-label checkbox-label" for="checkDefault-{{ $genre->id }}">
                            {{ $genre->name }}
                        </label>
                    </div>
                @endforeach

                <a href="{{ route('genres.create') }}" type="button" class="mt-2 btn btn btn-success me-md-2">
                    <img src="https://img.icons8.com/?size=100&id=0w8efhRZ2Ijj&format=png&color=000000" width="30"
                        height="30" alt="Add genre" />
                    <img src="https://media1.giphy.com/media/v1.Y2lkPTc5MGI3NjExYXE5bm5zdjVrdno5bHFxdzFtNHdwd3k0ZW8wODZpazU3ODQzN3d6ZCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/8YHZREPQ6j8ikL83p9/giphy.gif"
                        width="30" height="30" alt="Add genre" />
                </a>
            </div>
            <div class="mb-3">
                <img style="height:100px" src="{{ Storage::url($film->cover) }}" alt="">
                <label for="cover" class="custom-file-label">Immagine Cover Attuale <img
                        src="https://img.icons8.com/?size=100&id=Er9eZ59WT9JZ&format=png&color=000000" width="30"
                        height="30" alt="Modify cover" /></label>
                <input class="@error('cover') is-invalid @enderror file-input" type="file" id="cover"
                    name="cover">
            </div>
            <button type="submit" class="btn btn-primary w-100">Aggiorna</button>
        </form>
    </div>
</div>
