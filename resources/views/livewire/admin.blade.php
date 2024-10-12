<div class="py-16 px-8">
    <div class="flex gap-8">
        <x-mary-button wire:click="selectCreate">Create</x-mary-button>
        <x-mary-button wire:click="selectIndex">show</x-mary-button>
    </div>

    <div class="mt-8">
        @if($showCreate)
            <x-mary-form class="">
                <x-mary-input label="Naam" wire:model="name" placeholder="Naam"/>
                <x-mary-file label="Afbeelding" wire:model="image"/>
                <x-mary-input label="Type" wire:model="type" placeholder="Type"/>
                <x-mary-select label="Kleur" wire:model="baseColor" :options="$colorsArray"/>
                <x-mary-textarea label="Beschrijving" wire:model="description" placeholder="Beschrijving"/>
                <x-mary-markdown label="Ingrediënten" wire:model="ingredients" placeholder="Ingrediënten"/>
                <x-mary-button wire:click="saveCard">Opslaan</x-mary-button>
            </x-mary-form>
        @endif

        @if($showIndex)
            <div class="flex flex-col gap-8">
                @foreach($cards as $card)
                    <div wire:poll.5s wire:key="{{ $card->id }}" class="flex flex-col bg-slate-200 w-full h-full rounded p-4 gap-4">
                        @if($card->active)
                            <div class="w-full bg-green-400 text-center text-2xl text-black rounded">
                                ACTIVE!
                            </div>
                        @endif
                        <div class="flex flex-col gap-2 my-4">
                            <div class="h-60">
                                <img
                                    src="{{ asset($card->dish->image) }}"
                                    alt="Dish Image" class="w-full h-full object-cover rounded-lg shadow-xl">
                            </div>
                            <div class="">
                                <div class="text-black">
                                    name:
                                </div>
                                <div>{{ $card->dish->name }}</div>
                            </div>
                            <div class="">
                                <div class="text-black">
                                    type:
                                </div>
                                <div>{{ $card->dish->type }}</div>
                            </div>
                            <div class="">
                                <div class="text-black">
                                    description:
                                </div>
                                <div>{{ $card->dish->description }}</div>
                            </div>
                            <div class="">
                                <div class="text-black">
                                    ingredients:
                                </div>
                                <div>{{ $card->dish->ingredients }}</div>
                            </div>
                        </div>

                        <div class="mt-4 w-full flex flex-col gap-1">
                            <x-mary-button class="w-full" wire:navigate :link="route('edit', $card)">
                                edit
                            </x-mary-button>
                            <x-mary-button class="w-full" wire:click="activate({{ $card }})">
                                @if($card->active)
                                    deactivate
                                @else
                                    activate
                                @endif
                            </x-mary-button>
                            <x-mary-button class="w-full" wire:click="deleteCard({{ $card }})" wire:confirm="Sure?">
                                delete
                            </x-mary-button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
