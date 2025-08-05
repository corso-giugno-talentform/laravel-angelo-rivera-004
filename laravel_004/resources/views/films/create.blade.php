<x-navbar />
<x-main />
<section class="p-5">
    <h2 class="text-center mb-5">Inserisci il film</h2>
    <x-form-create :authors="$authors" :genres="$genres" />
</section>
<x-footer />
