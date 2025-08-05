<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }

        $authors = Author::all();
        return view('authors.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Accesso negato.');
        }

        Author::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);

        $insert = 'Elemento inserito!';
        return redirect()->route('authors.index')->with('success', $insert);
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname
        ]);
        return redirect()->route('authors.index')->with('success', 'Elemento modificato!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Elemento cancellato!');
    }
}
