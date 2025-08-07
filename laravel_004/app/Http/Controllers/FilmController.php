<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Author;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FilmController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return view('films.index', compact('authors'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }
        $authors = Author::all();
        $genres = Genre::all();
        return view('films.create', compact('authors', 'genres'));
    }

    public function store(StoreFilmRequest $request)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }

        $film = Film::create([
            'title' => $request->title,
            'release_year' => $request->release_year,
            'duration' => $request->duration,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'cover' => $request->file('cover')->store('cover', 'public')
        ]);

        $film->genres()->attach($request->genres);
        $insert = 'Elemento inserito!';
        return redirect()->route('films.index')->with('success', $insert);
    }

    public function show(Film $film)
    {
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('films.edit', compact('film', 'authors', 'genres'));
    }

    public function update(Film $film, Request $request)
    {
        $cover = $film->cover;
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store('cover', 'public');
        }

        $film->update([
            'title' => $request->title,
            'release_year' => $request->release_year,
            'duration' => $request->duration,
            'description' => $request->description,
            'author_id' => $request->author_id,
            'cover' => $cover
        ]);

        $film->genres()->sync($request->genres);

        return redirect()->route('films.index')->with('success', 'Elemento modificato!');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Elemento cancellato!');
    }
}
