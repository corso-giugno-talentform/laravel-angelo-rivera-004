<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {

        $films = Film::all();

        return view('films.index', compact('films'));
    }

    public function create()
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
        Film::create([
            'name' => $request->name,
            'year' => $request->year,
            'desc' => $request->desc,
            'duration' => $request->duration,
            'image' => $request->file('image')->store('cover', 'public')
        ]);


        $insert = 'Elemento inserito!';
        return redirect()->route('films.index')->with('success', $insert);
    }
}
