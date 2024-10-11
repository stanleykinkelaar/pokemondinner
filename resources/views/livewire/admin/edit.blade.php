<div>
    <x-mary-form class="">
        <x-mary-input label="Naam" wire:model="name" placeholder="Naam"/>
        <x-mary-file label="Afbeelding" wire:model="image"/>
        <x-mary-input label="Type" wire:model="type" placeholder="Type"/>
        <x-mary-select label="Kleur" wire:model="baseColor" :options="$colorsArray"/>
        <x-mary-textarea label="Beschrijving" wire:model="description" placeholder="Beschrijving"/>
        <x-mary-markdown label="Ingrediënten" wire:model="ingredients" placeholder="Ingrediënten"/>
        <x-mary-button wire:click="saveEdit">Opslaan</x-mary-button>
    </x-mary-form>
</div>
