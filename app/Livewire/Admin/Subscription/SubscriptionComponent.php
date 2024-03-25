<?php

namespace App\Livewire\Admin\Subscription;

use Livewire\Component;
use App\Models\Subscription;
use Livewire\WithPagination;

class SubscriptionComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm, $sortBy = 'created_at', $sortDirection = 'DESC';
    public $edit_id, $delete_id, $missing_status;

    public function setSortBy($sortByField)
    {
        if ($this->sortBy === $sortByField) {
            $this->sortDirection = ($this->sortDirection ==  "ASC") ? 'DESC' : "ASC";
            return;
        }
        $this->sortBy = $sortByField;
        $this->sortDirection = 'DESC';
    }

    public function updateSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $subscriptions = Subscription::where('amount', 'like', '%' . $this->searchTerm . '%')
            ->orderBy($this->sortBy, $this->sortDirection)
            ->paginate($this->sortingValue);
        $this->dispatch('reload_scripts');
        return view('livewire.admin.subscription.subscription-component', ['subscriptions' => $subscriptions])->layout('livewire.admin.layouts.base');
    }
}
