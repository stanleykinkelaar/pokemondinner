<?php

namespace App\Livewire;

use App\Models\Card;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Component;

class PokemonCard extends Component
{
    public int $count = 0;

    public function render(): Factory|\Illuminate\Contracts\View\View|Application|View
    {
        return view('livewire.pokemon-card')
            ->with('cards', Card::query()->with('dish')->where('active', true)->get());
    }

    public function increment(): void
    {
        $this->count++;
    }
}
