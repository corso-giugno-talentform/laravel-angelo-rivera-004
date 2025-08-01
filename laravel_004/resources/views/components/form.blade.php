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
        <form class="" action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ $id ?? '' }}
            <div class="mb-3">
                <label for="name" class="form-label">Titolo del libro</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="" autocomplete="off" value="{{ old('name') }}">

            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Anno di Scrittura</label>
                <input type="number" class="form-control @error('year') is-invalid @enderror" id="year"
                    name="year" placeholder="" autocomplete="off" value="{{ old('year') }}">

            </div>
            <div class="mb-3">
                <label for="page" class="form-label">Pagine del Libro</label>
                <input type="number" class="form-control @error('page') is-invalid @enderror" id="page"
                    name="page" rows="5" placeholder="" autocomplete="off" value="{{ old('page') }}">
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
