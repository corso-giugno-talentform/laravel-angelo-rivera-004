 <x-navbar />
 <x-main />
 <div class="container my-5">
     <div class="p-5 text-center bg-body-tertiary rounded-3">
         <h1 class="text-body-emphasis">{{ env('APP_NAME') }}</h1>
         <p class="lead">
             Benvenuto nel portale piu grande del mondo sui libri.
         </p>
     </div>
     <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
         @foreach ($films as $film)
             <div class="col hover-scale">
                 <div class="card">
                     <img src="{{ isset($film->image) ? Storage::url($film->image) : 'https://img.icons8.com/?size=100&id=1Z0XRfLWlnbO&format=png&color=000000' }}"
                         class="card-img-top" alt="...">
                     <div class="card-body">
                         <h5 class="card-title">{{ $film->name }}</h5>
                         <p class="card-text">This is a longer card with supporting text below as a natural lead-in
                             to
                             additional content. This content is a little bit longer.</p>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
 <x-footer />
