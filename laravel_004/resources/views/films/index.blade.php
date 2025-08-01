<x-main />
<x-navbar />
<div class="rounded-3 py-5 px-4 px-md-5 mb-5">

    <div class="container mt-5">
        <div class="align-middle gap-2 d-flex justify-content-between">
            <h3>Elenco Film inseriti</h3>
            <form class="d-flex" role="search" action="#" method="POST">
                <input class="form-control me-2" name="search" type="search" placeholder="Cerca Film"
                    aria-label="Search">
            </form>
            <a href="{{ route('films.create') }}" type="button" class="btn btn btn-success me-md-2">
                Crea Nuovo Film
            </a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Titolo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <th scope="row">#{{ $film->id }}</th>
                        <td>
                            <img class="card-img-top" style="width:3rem"
                                src="{{ isset($film->image) ? Storage::url($film->image) : 'https://img.icons8.com/?size=100&id=1Z0XRfLWlnbO&format=png&color=000000' }}"
                                alt="..." />
                        </td>
                        <td>{{ $film->name }}</td>
                        <td>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="#" class="btn btn-primary me-md-2">
                                    Visualizza
                                </a>
                                @auth
                                    <a href="#" class="btn btn-warning me-md-2">
                                        Modifica
                                    </a>
                                    <button type="button" class="btn btn-danger me-md-2">Elimina</button>
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<x-footer />
