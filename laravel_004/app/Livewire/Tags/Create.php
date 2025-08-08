<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('min:5', message: 'Inserisci almeno 5 caratteri',)]
    public $name = '';

    public function store()
    {
        $this->validate();
        Tag::create([
            'name' => $this->name,
        ]);
        request()->session()->flash('success', 'Elemento Inserito');
        $this->name = '';
    }
    public function render()
    {
        return view('livewire.tags.create');
    }
}
