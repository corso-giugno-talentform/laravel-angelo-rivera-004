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
                <img src="https://img.icons8.com/?size=100&id=0w8efhRZ2Ijj&format=png&color=000000" width="30"
                    height="30" alt="Add film" />
                <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExemdoZW1yNnZmZjZ1amFlYjB0ZnRhMDl2azRyOHU5Z2g0bnNodmZmeiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/dxYLswAT6kMtUdv71h/giphy.gif"
                    width="30" height="30" alt="Add film" />
            </a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Genere</th>
                    <th scope="col">Regista</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($films as $film)
                    <tr>
                        <th scope="row">#{{ $film->id }}</th>
                        <td>
                            <img class="card-img-top" style="width:3rem; height:3rem;"
                                src="{{ isset($film->cover) ? Storage::url($film->cover) : 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExbTFodHo4a2FiYWY5dW12ejJ4MWk4czBrcXZ0YmQ1ZXJvM3pncGl2diZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/m9ppt2Z9tiaK1crjHw/giphy.gif' }}"
                                alt="..." />
                        </td>
                        <td>{{ $film->title }}</td>
                        <td>
                            @foreach ($film->genres as $genre)
                                {{ $genre->name }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $film->author->firstname . ' ' . $film->author->lastname }}</td>
                        <td>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="{{ route('films.show', ['film' => $film]) }}" class="btn btn-primary me-md-2">
                                    <img src="https://img.icons8.com/?size=100&id=119267&format=png&color=000000"
                                        width="30" height="30" alt="Play" />
                                </a>
                                @auth
                                    @if (auth()->user()->is_admin)
                                        <a href="{{ route('films.edit', ['film' => $film]) }}"
                                            class="btn btn-warning me-md-2">
                                            <img src="https://img.icons8.com/?size=100&id=tKvnEzfDG1hI&format=png&color=000000"
                                                width="30" height="30" alt="Modify" />
                                        </a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $film->id }}">
                                            <img src="https://img.icons8.com/?size=100&id=x4eY9knZ24Hv&format=png&color=000000"
                                                width="30" height="30" alt="Delete" />
                                        </button>

                                        <div class="modal fade" id="deleteModal-{{ $film->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel-{{ $film->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $film->id }}">
                                                            Eliminazione Film</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Chiudi"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare "{{ $film->title }}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{ route('films.destroy', ['film' => $film]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Annulla</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{ $films->links() }}
    </div>
</div>
<x-footer />
