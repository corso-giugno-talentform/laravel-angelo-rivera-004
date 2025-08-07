<x-main>
    <x-navbar />
    <section class="p-5">
        <h2 class="text-center mb-5">Modifica i dati</h2>
        <x-form-edit :film="$film" :authors="$authors" :genres="$genres" />
    </section>
    <x-footer />
</x-main>
