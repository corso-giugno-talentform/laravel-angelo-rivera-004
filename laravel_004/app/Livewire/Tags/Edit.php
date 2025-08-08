<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public Tag $tag;
    #[Validate('min:5', message: 'Inserisci almeno 5 caratteri',)]
    public $name;

    public function mount()
    {
        $this->name = $this->tag->name;
    }

    public function update()
    {
        $this->validate();
        $this->tag->update([
            'name' => $this->name,
        ]);
        request()->session()->flash('success', 'Elemento Aggiornato');
    }

    public function render()
    {
        return view('livewire.tags.edit');
    }
}
