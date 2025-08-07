<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    public function create()
    {

        return view('tags.create');
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }
}
