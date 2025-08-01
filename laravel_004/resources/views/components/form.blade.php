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
                <label for="name" class="form-label">Titolo del film</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="" autocomplete="off" value="{{ old('name') }}">

            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Anno di Pubblicazione</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
                    name="year" placeholder="" autocomplete="off" value="{{ old('year') }}">

            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Descrizione del film</label>
                <textarea class="form-control @error('desc') is-invalid @enderror" id="messaggio" name="msg" rows="5"
                    placeholder="Descrizione breve" autocomplete="off">{{ old('desc') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Durata del film</label>
                <input type="number" class="form-control @error('duration') is-invalid @enderror" id="page"
                    name="page" rows="5" placeholder="Espressa in minuti" autocomplete="off"
                    value="{{ old('duration') }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine Cover</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    name="image">
            </div>
            <button type="submit" class="btn btn-primary w-100">Salva</button>
        </form>
    </div>
</div>
