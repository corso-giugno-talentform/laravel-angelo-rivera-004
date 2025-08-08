<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
    public function delete($id)
    {

        $tag = Tag::find($id);
        $tag->delete();

        request()->session()->flash('success', 'Elemento Cancellato!');
        $this->dispatch('refresh-component');
    }

    #[On('refresh-component')]
    public function render()
    {
        $tags = Tag::all();
        return view('livewire.tags.index', compact('tags'));
    }
}
