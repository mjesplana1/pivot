<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Pizza;
use Livewire\Component;

class FavoritePizzas extends Component
{
    public $users;
    public $pizzas;
    public $selectedUserId;
    public $selectedPizzaIds = [];

    public function mount()
    {
        $this->users = User::with('favoritePizzas')->get();
        $this->pizzas = Pizza::all();
    }

    public function updatedSelectedUserId($value)
    {
        $this->selectedPizzaIds = User::find($value)->favoritePizzas->pluck('id')->toArray();
    }

    public function save()
    {
        $user = User::find($this->selectedUserId);
        $user->favoritePizzas()->sync($this->selectedPizzaIds);
        $this->users = User::with('favoritePizzas')->get();
    }

    public function render()
    {
        return view('livewire.favorite-pizzas');
    }
}
