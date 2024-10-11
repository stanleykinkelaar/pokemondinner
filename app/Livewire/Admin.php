<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\Dish;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Admin extends Component
{
    use Toast, WithFileUploads;

    public array $colorsArray = [];
    public bool $showCreate = false;
    public bool $showIndex = true;

    public string $name = '';
    public $image = '';
    public string $type = '';
    public string $baseColor = '';
    public string $description = '';
    public string $ingredients = '';

    public function mount(): void
    {
        $this->formatColorNames();
    }

    #[Title('Admin')]
    public function render(): Application|Factory|\Illuminate\Contracts\View\View|View
    {
        return view('livewire.admin', [
            'colors' => $this->colorsArray,
            'cards' => Card::with('dish')->get(),
        ]);
    }

    public function formatColorNames(): void
    {
        $colorNames = [
            'slate', 'gray', 'zinc', 'neutral',
            'stone', 'orange', 'amber', 'yellow',
            'lime', 'green', 'emerald', 'teal',
            'cyan', 'sky', 'blue',
            'indigo', 'violet', 'purple',
            'fuchsia', 'pink', 'rose',
        ];

        foreach ($colorNames as $colorName) {
            $this->colorsArray[] = [
                'id' => $colorName,
                'name' => $colorName,
            ];
        }
    }

    public function saveCard(): void
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required',
            'type' => 'required',
            'baseColor' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
        ]);

        $image = $this->image->store('images', 'public');

        $dish = Dish::create([
            'name' => $this->name,
            'image' => $image,
            'type' => $this->type,
            'description' => $this->description,
            'ingredients' => $this->ingredients,
        ]);

        Card::create([
            'dish_id' => $dish->id,
            'color' => $this->baseColor,
        ]);

        $this->success('Card created successfully!');
        $this->reset();
    }

    public function selectCreate(): void
    {
        $this->showIndex = false;
        $this->showCreate = true;
    }

    public function selectIndex(): void
    {
        $this->showCreate = false;
        $this->showIndex = true;
    }

    public function activate($id): void
    {
        $card = Card::find($id);
        if ($card->active) {
            $card->active = false;
        } else {
            $card->active = true;
        }
        $card->save();

        $this->success('Done');
    }

    public function deleteCard(Card $card)
    {
        $card->delete();

        $this->success('Card deleted successfully!');
        $this->reset();
    }
}
