<x-navbar />
<x-main />
<section class="p-5">
    <h2 class="text-center mb-5">Modifica i dati</h2>
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
            <form class="" action="{{ route('genres.update', ['genre' => $genre]) }}" method="POST">
                @csrf
                @method ('PUT')
                {{ $id ?? '' }}
                <div class="mb-3">
                    <label for="name" class="form-label">Genere del film</label>
                    <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Inserisci il genere" autocomplete="off" value="{{ $genre->name }}">

                </div>
                <button type="submit" class="btn btn-primary w-100">Aggiorna</button>
            </form>
        </div>
    </div>
</section>
<x-footer />
