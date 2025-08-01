 <x-navbar />
 <x-main />
 <div class="container my-5">
     <div class="hero p-5 text-center bg-body-tertiary rounded-3">
         <h1 class="text-body-emphasis">{{ env('APP_NAME') }}</h1>
         <p class="lead">
             Benvenuto nel portale piu grande del mondo sui film.
         </p>
     </div>
     <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
         @foreach ($films as $film)
             <div class="col hover-scale">
                 <div class="card">
                     <img src="{{ isset($film->image) ? Storage::url($film->image) : 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExeDI1bWNuZWJlcXBxcWd1cWttMjhlaWdpaXcwcHlhbWNoNnAyc2N1aCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/AwJuJzp1pGrcfO51g6/giphy.gif' }}"
                         class="card-img-top" alt="...">
                     <div class="card-body">
                         <h5 class="card-title">{{ $film->name }}</h5>
                         <p class="card-text">{{ $film->desc }}</p>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
 <x-footer />
