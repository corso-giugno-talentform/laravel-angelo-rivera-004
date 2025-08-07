<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('min:5')]
    public $name = '';

    public function store()
    {
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
