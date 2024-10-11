<?php

namespace App\Livewire\Admin;

use App\Models\Card;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class Edit extends Component
{
    use Toast, WithFileUploads;

    public string $name = '';
    public $image;
    public string $type = '';
    public string $baseColor = '';
    public string $description = '';
    public string $ingredients = '';

    public array $colorsArray = [];

    public int $cardId;

    public function mount(Card $card): void
    {
        $this->formatColorNames();

        $this->name = $card->dish->name;
        $this->image = $card->dish->image;
        $this->type = $card->dish->type;
        $this->baseColor = $card->color;
        $this->description = $card->dish->description;
        $this->ingredients = $card->dish->ingredients;

        $this->cardId = $card->id;
    }

    #[Title('Edit Card')]
    public function render(Card $card)
    {
        return view('livewire.admin.edit')
            ->with('card', $card->with('dish')->first());
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

    public function saveEdit(): void
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
            'baseColor' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
        ]);

        $card = Card::find($this->cardId);

        $card->update([
            'color' => $this->baseColor,
        ]);

        if ($this->image !== $card->dish->image) {
            $image = $this->image->store('images', 'public');
        }

        $card->dish->update([
            'name' => $this->name,
            'image' => $image ?? $this->image,
            'type' => $this->type,
            'description' => $this->description,
            'ingredients' => $this->ingredients,
        ]);

        $this->redirect(route('admin.index'));
    }
}
