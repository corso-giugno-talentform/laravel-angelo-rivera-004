<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFilmRequest;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return view('films.index', compact('films'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }
        return view('films.create');
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
            'cover' => $request->file('cover')->store('cover', 'public')
        ]);

        $insert = 'Elemento inserito!';
        return redirect()->route('films.index')->with('success', $insert);
    }
}
