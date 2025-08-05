<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Author;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::simplePaginate(4);
        $authors = Author::all();
        return view('films.index', compact('films', 'authors'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }
        $authors = Author::all();
        return view('films.create', compact('authors'));
    }

    public function store(StoreFilmRequest $request)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }

        Film::create([
            'title' => $request->title,
            'release_year' => $request->release_year,
            'duration' => $request->duration,
            'description' => $request->description,
            'genre' => $request->genre,
            'author_id' => $request->author_id,
            'cover' => $request->file('cover')->store('cover', 'public')
        ]);

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
        return view('films.edit', compact('film', 'authors'));
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
            'genre' => $request->genre,
            'author_id' => $request->author_id,
            'cover' => $cover
        ]);

        return redirect()->route('films.index')->with('success', 'Elemento modificato!');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('films.index')->with('success', 'Elemento cancellato!');
    }
}
