<x-main>
    <x-navbar />
    <section class="p-5">
        <h2 class="text-center mb-5">Modifica i dati</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session('success'))
                    <x-alert color="alert-success"> {{ session('success') }}</x-alert>
                @endif

                <x-errors-all />

                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Tag del film</label>
                        <input wire:model="name" type="text" class="@error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Inserisci il tag" autocomplete="off">

                    </div>
                    <button wire:click="update" type="button" class="btn btn-primary w-100">Aggiorna</button>
                </form>
            </div>
        </div>
    </section>
    <x-footer />
</x-main>
