<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;

class Table extends Component
{

    public $search = '';

    public function render()
    {
        if ($this->search) {
            // $films = Film::where('title', 'LIKE', '%' . request()->search . '%')->get();
            $films = Film::search($this->search)->get();
        } else {
            // $films = Film::simplePaginate(4);
            $films = Film::all();
        }
        return view('livewire.table', compact('films'));
    }
}
