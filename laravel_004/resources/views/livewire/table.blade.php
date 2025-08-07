<div>
    <div class="align-middle gap-2 d-flex justify-content-between">
        <h3>Elenco Film inseriti</h3>
        <div>
            <form class="d-flex" role="search">
                <input class="me-2" wire:model.live="search" name="search" type="search" placeholder="Cerca Film"
                    aria-label="Search">
            </form>
        </div>
        <div>
            <a href="{{ route('films.create') }}" type="button" class="btn btn btn-success me-md-2">
                <img src="https://img.icons8.com/?size=100&id=0w8efhRZ2Ijj&format=png&color=000000" width="30"
                    height="30" alt="Add film" />
                <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExemdoZW1yNnZmZjZ1amFlYjB0ZnRhMDl2azRyOHU5Z2g0bnNodmZmeiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/dxYLswAT6kMtUdv71h/giphy.gif"
                    width="30" height="30" alt="Add film" />
            </a>
        </div>
    </div>
    <table class="netflix-table mt-2">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Immagine</th>
                <th scope="col">Titolo</th>
                <th scope="col">Genere</th>
                <th scope="col">Regista</th>
                <th scope="col" class="text-end">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($films as $film)
                <tr>
                    <th scope="row">#{{ $film->id }}</th>
                    <td>
                        <img class="film-thumbnail" style="width:3rem; height:3rem;"
                            src="{{ $film->cover ? Storage::url($film->cover) : 'https://media3.giphy.com/media/v1.Y2lkPTc5MGI3NjExbTFodHo4a2FiYWY5dW12ejJ4MWk4czBrcXZ0YmQ1ZXJvM3pncGl2diZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/m9ppt2Z9tiaK1crjHw/giphy.gif' }}"
                            alt="Copertina di {{ $film->title }}" />
                    </td>
                    <td>{{ $film->title }}</td>
                    <td>
                        @foreach ($film->genres as $genre)
                            <span class="badge-netflix">{{ $genre->name }}</span>
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $film->author->firstname }} {{ $film->author->lastname }}</td>
                    <td class="text-end">
                        <!-- Azioni: visualizza, modifica, elimina -->
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('films.show', ['film' => $film]) }}" class="btn-netflix"
                                title="Visualizza">
                                <img src="https://img.icons8.com/?size=100&id=119267&format=png&color=000000"
                                    width="20" height="20" />
                            </a>
                            @auth
                                @if (auth()->user()->is_admin)
                                    <a href="{{ route('films.edit', ['film' => $film]) }}" class="btn-netflix"
                                        title="Modifica">
                                        <img src="https://img.icons8.com/?size=100&id=tKvnEzfDG1hI&format=png&color=000000"
                                            width="20" height="20" />
                                    </a>
                                    <!-- Pulsante elimina con modal -->
                                    <button type="button" class="btn-netflix" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal-{{ $film->id }}" title="Elimina">
                                        <img src="https://img.icons8.com/?size=100&id=x4eY9knZ24Hv&format=png&color=000000"
                                            width="20" height="20" />
                                    </button>
                                    <!-- Modal elimina -->
                                    <div class="modal fade" id="deleteModal-{{ $film->id }}" tabindex="-1"
                                        aria-labelledby="deleteModalLabel-{{ $film->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-dark text-white">
                                                <div class="modal-header border-bottom-0">
                                                    <h5 class="modal-title" id="deleteModalLabel-{{ $film->id }}">
                                                        Eliminare film</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Chiudi"></button>
                                                </div>
                                                <div class="modal-body">Sei sicuro di voler eliminare
                                                    "{{ $film->title }}"?
                                                </div>
                                                <div class="modal-footer border-top-0">
                                                    <form action="{{ route('films.destroy', ['film' => $film]) }}"
                                                        method="POST" class="d-inline">
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
</div>
