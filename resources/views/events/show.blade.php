<x-auth>

    <div class="flex justify-center items-center">
        <img src="{{ $event->getCover() }}" alt="Event cover" class="rounded-xl h-72 max-w-full mx-auto">
    </div>

    <h2 class="my-2">
        <span class="text-3xl font-bold">{{ $event->title }}</span>

        <strong 
            class="text-{{ $event->isPassed(getBoolVal:true) ? 'red' : 'gray' }}-500 ml-2"
        >
            {{ $event->isPassed() }}
        </strong>

    </h2>

    @if (auth()->id() === $event->user_id and $event->isPassed(getBoolVal:true) == false)
    
    <div class="flex space-x-2 mb-4">
        <a href="{{ route('events.edit', $event) }}" class="text-blue-500 hover:underline">Editer</a>
        <x-form action="{{ route('events.destroy', $event) }}" method="delete">
            <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
        </x-form>
    </div>

    @endif

    <div class="flex items-center mb-1">
        <h4 class="text-lg font-medium mr-4">Prix :</h4>
        <p class="text-gray-700">{{ $event->price != null ? $event->price . ' $' : 'Gratuit' }}</p>
    </div>

    <div class="flex items-center mb-1">
        <h4 class="text-lg font-medium mr-4">Date :</h4>
        <p class="text-gray-700">{{ $event->date }}</p>
    </div>
    
    <div class="flex items-center mb-1">
        <h4 class="text-lg font-medium mr-4">Lieu :</h4>
        <p class="text-gray-700">{{ $event->location }}</p>
    </div>

    <div class="flex items-center mb-1">
        <h4 class="text-lg font-medium mr-4">Fuseau horaire :</h4>
        <p class="text-gray-700">GMT+2</p>
    </div>
    
    <div class="flex mb-4 items-center">
        <div class="mr-10">
            <strong class="text-lg font-medium">Début</strong>
            <p class="text-gray-700">{{ $event->start_at }}</p>
        </div>
        <div>
            <strong class="text-lg font-medium">Fin</strong>
            <p class="text-gray-700">{{ $event->end_at }}</p>
        </div>
    </div>
    
    <div class="mb-4">
        <h4 class="text-lg font-medium mb-2">Description :</h4>
        <p class="text-gray-700">{{ $event->description }}</p>
    </div>
    
    <div class="flex items-center mb-4">
        <span class="font-bold mr-2">Publié par :</span>
        <a href="{{ route('profile.show', $event->user) }}" class="flex items-center">
            <img src="{{ $event->user->getAvatar() }}" class="rounded-full h-10 w-10 mr-2" alt="Avatar de l'auteur">
            <strong class="text-gray-700">{{ $event->user->name }}</strong>
        </a>
    </div>

    <div>
        @if ($event->reservations->first() !== null)
            <div class="mb-4">
                <strong>Participants :</strong>
                <div id="reservations-avatars" class="flex space-x-2">
                    @foreach ($event->reservations as $reservation)
                        <a href="{{ route('profile.show', $reservation->user) }}" class="rounded-full h-10 w-10 overflow-hidden">
                            <img src="{{ $reservation->user->getAvatar() }}" class="object-cover" alt="Avatar du participant">
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    
        @if (auth()->id() !== $event->user_id and $event->isPassed(getBoolVal:true) == false)
            
            <hr class="mb-4">
    
            @if ($event->isReserved())

                <x-form action="{{ route('reservations.unset', $event) }}" method="delete">
                    <x-danger-button type="submit">J'annule ma participation</x-danger-button>
                </x-form>

            @else

            <x-form action="{{ route('reservations.set', $event) }}">
                <x-primary-button type="submit">Je participe</x-primary-button>
            </x-form>

            @endif
        @endif
</div>



</x-auth>