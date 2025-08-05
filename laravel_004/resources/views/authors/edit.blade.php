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
            <form class="" action="{{ route('authors.update', ['author' => $author]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method ('PUT')
                {{ $id ?? '' }}
                <div class="mb-3">
                    <label for="firstname" class="form-label">Nome del Regista</label>
                    <input type="text" class="@error('firstname') is-invalid @enderror" id="firstname"
                        name="firstname" placeholder="Inserisci il nome" autocomplete="off"
                        value="{{ $author->firstname }}">

                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Cognome del Regista</label>
                    <input type="text" class="@error('lastname') is-invalid @enderror" id="lastname" name="lastname"
                        placeholder="Inserisci il cognome" autocomplete="off" value="{{ $author->lastname }}">

                </div>
                <button type="submit" class="btn btn-primary w-100">Aggiorna</button>
            </form>
        </div>
    </div>
</section>
<x-footer />
