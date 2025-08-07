<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $number = 0;
    public $showHide = true;

    public function increment()
    {
        $this->count++;
    }

    public function increment10()
    {
        $this->count += 10;
    }

    public function incrementcustom()
    {
        $this->count += $this->number;
    }

    public function decrement()
    {
        $this->count--;
    }

    public function mostraNascondi()
    {
        $this->showHide = !$this->showHide;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
