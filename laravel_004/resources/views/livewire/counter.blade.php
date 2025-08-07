<div>
    <x-main>
        <x-navbar />
        <div class="container">
            <h1>{{ $count }}</h1>
            <button wire:click="increment">+</button>
            <button wire:click="increment10">+10</button>
            <button wire:click="decrement" :disabled="{{ $count < 1 }}">-</button>
            <div class="d-flex w-25 my-5">
                <button wire:click="incrementcustom">+ {{ $number }}</button>
                <input type="number" class="me-2" wire:model.live.debounce.300ms="number"
                    placeholder="Inserisci il valore da aggiungere" wire:model="{{ $number }}">
            </div>
            <div>
                <button class="mb-3" wire:click="mostraNascondi">Mostra/Nascondi</button>
                @if ($showHide)
                    <p>Contenuto da mostrare o nascondere</p>
                @endif
            </div>
        </div>
        <x-footer />
    </x-main>
</div>
