<x-main>
    <x-navbar />
    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">

        <div class="container mt-5">
            <div class="align-middle gap-2 d-flex justify-content-between">
                <h3>Elenco Tags esistenti</h3>
                <form class="d-flex" role="search" action="#" method="POST">
                    <input class="form-control me-2" name="search" type="search" placeholder="Cerca Film"
                        aria-label="Search">
                </form>
                <a href="{{ route('tags.create') }}" type="button" class="btn btn btn-success me-md-2">
                    Crea Nuovo Tag
                </a>
            </div>
            <table class="table border mt-2">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <th scope="row">#{{ $tag->id }}</th>
                            <td>{{ $tag->name }}</td>
                            <td>

                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                    <a href="{{ route('tags.show', ['tag' => $tag]) }}" class="btn btn-primary me-md-2">
                                        Visualizza
                                    </a>
                                    @auth
                                        @if (auth()->user()->is_admin)
                                            <a href="{{ route('tags.edit', ['tag' => $tag]) }}"
                                                class="btn btn-warning me-md-2">
                                                Modifica
                                            </a>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal-{{ $tag->id }}">
                                                Elimina
                                            </button>

                                            {{-- <div class="modal fade" id="deleteModal-{{ $tag->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="deleteModalLabel-{{ $tag->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="deleteModalLabel-{{ $tag->id }}">
                                                                Eliminazione Film</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Chiudi"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Sei sicuro di voler eliminare "{{ $tag->name }}"?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="{{ route('tags.destroy', ['tag' => $tag]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger">Elimina</button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Annulla</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
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
</x-main>
