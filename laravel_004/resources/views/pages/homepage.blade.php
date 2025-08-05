 <x-navbar />
 <x-main />
 <div class="container my-5">
     @if (session('error'))
         <x-alert color="alert-danger">{{ session('error') }}</x-alert>
     @endif
     <div class="hero p-5 text-center bg-body-tertiary rounded-3">
         <h1 class="text-body-emphasis">{{ env('APP_NAME') }}</h1>
         <p class="lead">
             Benvenuto nel portale piu grande del mondo sui film.
         </p>
     </div>
     <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
         @foreach ($films as $film)
             <div class="col">
                 <div class="card hover-scale">
                     <img src="{{ isset($film->cover) ? Storage::url($film->cover) : 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExeDI1bWNuZWJlcXBxcWd1cWttMjhlaWdpaXcwcHlhbWNoNnAyc2N1aCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/AwJuJzp1pGrcfO51g6/giphy.gif' }}"
                         class="card-img-top" alt="...">
                     <div class="card-body">
                         <h5 class="card-title text-center bg-primary text-white rounded-bottom py-1">
                             {{ $film->title }}
                         </h5>
                     </div>
                     <div class="detail-item text-center m-2">
                         <i class="fas fa-calendar-alt"></i>
                         <p class="mb-0"><strong>Anno:</strong> {{ $film->release_year }}</p>
                     </div>
                     <div class="detail-item text-center m-2">
                         <i class="fas fa-clock"></i>
                         <p class="mb-0"><strong>Durata:</strong> {{ $film->duration }} min</p>
                     </div>
                     <div class="detail-item text-center m-2">
                         <i class="fas fa-film"></i>
                         <p class="mb-0"><strong>Genere:</strong>
                             @foreach ($film->genres as $genre)
                                 {{ $genre->name }}@if (!$loop->last)
                                     ,
                                 @endif
                             @endforeach
                         </p>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
 <x-footer />
