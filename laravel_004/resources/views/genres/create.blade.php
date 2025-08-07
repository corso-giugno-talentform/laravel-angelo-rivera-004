<x-main>
    <x-navbar />
    <section class="p-5">
        <h2 class="text-center mb-5">Aggiungi il genere di film</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session('success'))
                    <x-alert color="alert-success"> {{ session('success') }}</x-alert>
                @endif

                <x-errors-all />

                <form class="" action="{{ route('genres.store') }}" method="POST">
                    @csrf
                    {{ $id ?? '' }}
                    <div class="mb-3">
                        <label for="name" class="form-label">Genere del film</label>
                        <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name"
                            placeholder="Inserisci il genere" autocomplete="off" value="{{ old('name') }}">

                    </div>
                    <button type="submit" class="btn btn-primary w-100">Salva</button>
                </form>
            </div>
        </div>

    </section>
    <x-footer />
</x-main>
