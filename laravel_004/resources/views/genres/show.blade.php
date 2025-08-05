<x-navbar />
<x-main />
<section class="jumbotron-posts mb-4"
    style="background-image: url('{{ isset($film->cover) ? Storage::url($film->cover) : 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExeDI1bWNuZWJlcXBxcWd1cWttMjhlaWdpaXcwcHlhbWNoNnAyc2N1aCZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/AwJuJzp1pGrcfO51g6/giphy.gif' }}')">
</section>
<div class="container my-5">
    <div class="col hover-scale">
        <div class="card film-card">
            <div class="card-header text-center bg-primary text-white rounded-top">
                <h5 class="card-title mb-0">{{ $genre->name }}</h5>
            </div>
        </div>
    </div>
</div>
<x-footer />
