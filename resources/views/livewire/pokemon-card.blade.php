<div wire:poll.5s class="flex flex-col gap-8">
    @forelse($cards as $card)
        <div wire:key="{{ $card->id }}"
            class="w-80 p-4 rounded-lg shadow-lg bg-{{ $card->color }}-200 border-4 border-{{ $card->color }}-500 relative">
            <!-- Dish Image -->
            <div class="w-full h-40 bg-{{ $card->color }}-200 rounded-lg mb-4">
                <img
                    src="{{ asset($card->dish->image) }}"
                    alt="Dish Image" class="w-full h-full object-cover rounded-lg shadow-xl">
            </div>
            <!-- Dish Name -->
            <h2 class="text-lg font-bold text-gray-800 uppercase mb-2">{{ $card->dish->name }}</h2>
            <!-- Dish Type (like Pokémon type) -->
            <div
                class="text-sm font-semibold bg-teal-600 text-white px-2 py-1 rounded-lg inline-block mb-2">
                {{ $card->dish->type }}-type
            </div>
            <!-- Dish Description -->
            <p class="text-sm text-gray-700 mb-2">{{ $card->dish->description }}</p>
            <!-- Ingredients (as moves) -->
            <div class="text-gray-800 mb-2">
                <p class="font-semibold">Ingrediënten:</p>
                <div class="ml-4 text-sm">
                    {!! Str::markdown($card->dish->ingredients) !!}
                </div>
            </div>
        </div>
    @empty
        <div class="text-center">
            <span class="text-5xl tracking-widest">Hou nog effe je gemak!</span>
        </div>
        <div class="text-center">
            <span class="text-3xl tracking-widest">Er zijn nog geen Pokémon menu kaarten gemaakt.</span>
        </div>

        <div class="mt-8 text-center">
            <span class="text-2xl tracking-widest">Wel kun je effe lopen te klikken</span>
        </div>

        <div class="w-full items-center justify-center flex flex-row gap-4">
            <div class="text-4xl">
                {{ $count }}
            </div>
            <x-mary-button wire:click="increment">+</x-mary-button>
        </div>

        @if($count >= 69)
            <div class="mt-8 text-center">
                <span class="text-4xl tracking-widest underline">Doet niks, maar is wel leuk toch?</span>
            </div>
        @endif
    @endforelse

</div>
