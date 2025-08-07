<div>
    <section class="p-5">
        <h2 class="text-center mb-5">Aggiungi un Tag</h2>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                @if (session('success'))
                    <x-alert color="alert-success"> {{ session('success') }}</x-alert>
                @endif

                <x-errors-all />

                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Tag</label>
                        <input wire:model.live.debounce.300ms="name" type="text"
                            class="@error('name') is-invalid @enderror" id="name" placeholder="Inserisci il tag"
                            autocomplete="off">

                    </div>
                    <button wire:click="store" type="button" class="btn btn-primary w-100">Salva</button>
                </form>
            </div>
        </div>

    </section>
</div>
