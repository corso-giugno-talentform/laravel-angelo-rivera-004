<x-main>
    <x-navbar />
    <section class="jumbotron-posts mb-4"
        style="background-image: url('{{ isset($film->cover) ? Storage::url($film->cover) : 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExeDI1bWNuZWJlcXBxcWd1cWttMjhlaWdpaXcwcHlhbWNoNnAyc2N1aCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/AwJuJzp1pGrcfO51g6/giphy.gif' }}')">
    </section>
    <div class="container my-5">
        <div class="col hover-scale">
            <div class="card film-card">
                <div class="card-header text-center bg-primary text-white rounded-top">
                    <h5 class="card-title mb-0">{{ $film->title }}</h5>
                </div>
                <div class="card-body">
                    <p class="film-description">{{ $film->description }}</p>
                    <div class="film-details d-flex flex-wrap justify-content-around mt-3">
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
            </div>
        </div>
    </div>
    <x-footer />
</x-main>
