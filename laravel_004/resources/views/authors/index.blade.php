<x-main />
<x-navbar />
<div class="rounded-3 py-5 px-4 px-md-5 mb-5">

    <div class="container mt-5">
        <div class="align-middle gap-2 d-flex justify-content-between">
            <h3>Elenco Registi inseriti</h3>
            <form class="d-flex" role="search" action="#" method="POST">
                <input class="form-control me-2" name="search" type="search" placeholder="Cerca Film"
                    aria-label="Search">
            </form>
            <a href="{{ route('authors.create') }}" type="button" class="btn btn btn-success me-md-2">
                Crea Nuovo Regista
            </a>
        </div>
        <table class="table border mt-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr>
                        <th scope="row">#{{ $author->id }}</th>
                        <td>{{ $author->firstname }}</td>
                        <td>{{ $author->lastname }}</td>
                        <td>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                <a href="{{ route('authors.show', ['author' => $author]) }}"
                                    class="btn btn-primary me-md-2">
                                    Visualizza
                                </a>
                                @auth
                                    @if (auth()->user()->is_admin)
                                        <a href="{{ route('authors.edit', ['author' => $author]) }}"
                                            class="btn btn-warning me-md-2">
                                            Modifica
                                        </a>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal-{{ $author->id }}">
                                            Elimina
                                        </button>

                                        <div class="modal fade" id="deleteModal-{{ $author->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel-{{ $author->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel-{{ $author->id }}">
                                                            Eliminazione Film</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Chiudi"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare "{{ $author->firstname }}"?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form
                                                            action="{{ route('authors.destroy', ['author' => $author]) }}"
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
    </div>
</div>
<x-footer />
