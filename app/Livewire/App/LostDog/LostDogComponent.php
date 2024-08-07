<?php

namespace App\Livewire\App\LostDog;

use App\Models\LostDog;
use Livewire\Component;
use Livewire\WithPagination;

class LostDogComponent extends Component
{
    use WithPagination;
    public $sortingValue = 12, $searchTerm, $searchByGenderTerm, $searchByBreedTerm, $searchByAddressTerm;

    public function render()
    {
        $lost_dogs = LostDog::where('address', 'like', '%' . $this->searchByAddressTerm . '%')

            ->when($this->searchByGenderTerm !== null && $this->searchByGenderTerm !== '', function ($query) {
                return $query->where('gender', $this->searchByGenderTerm);
            })

            ->when($this->searchByBreedTerm !== null && $this->searchByBreedTerm !== '', function ($query) {
                return $query->where('breed', $this->searchByBreedTerm);
            })

            ->inRandomOrder()->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');

        return view('livewire.app.lost-dog.lost-dog-component', ['lost_dogs' => $lost_dogs])->layout('livewire.app.layouts.base');
    }
}
