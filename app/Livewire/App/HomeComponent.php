<?php

namespace App\Livewire\App;

use Livewire\Component;
use Livewire\Attributes\Title;

class HomeComponent extends Component
{

    #[Title('Home Page')]
    public function render()
    {
        return view('livewire.app.home-component')->layout('livewire.app.layouts.base');
    }
}
