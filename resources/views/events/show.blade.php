<x-auth>

    <div class="flex justify-center">
        <img src="{{ $event->getCover() }}" alt="Event cover" class="h-72 w-10/12">
    </div>

    <h2>
        <span>{{ $event->title }}</span>
        <strong> - {{ $event->isPassed() }}</strong>
    </h2>

    @if (auth()->id() === $event->user_id and $event->isPassed(getBoolVal:true) == false)
        <a href="{{ route('events.edit', $event) }}">Editer</a>

        <x-form action="{{ route('events.destroy', $event) }}" method="delete">
            <button type="submit">Supprimer</button>
        </x-form>

    @endif

    <h4>{{ $event->date }}</h4>
    <h4>{{ $event->location }}</h4>

    <hr>

    <h4>Fuseau horaire</h4>
    <h4>GMT+2</h4>

    <div style="display: inline-block">
        <strong>Début</strong> <br>

        <p>{{ $event->start_at }}</p>
    </div>

    <div style="display: inline-block">
        <strong>Fin</strong> <br>

        <p>{{ $event->end_at }}</p>
    </div>

    <div>
        <h4>Déscription</h4>

        <p>
            {{ $event->description }}
        </p>
    </div>

    <div>
        <span>Publié par</span> <br>


        <a href="{{ route('profile.show', $event->user) }}">
            <img src="{{ $event->user->getAvatar() }}" class="rounded-full h-24 w-24" alt="Avatar de l'auteur">
            <strong>{{ $event->user->name }}</strong>
        </a>


    </div>

    <hr>

    @if ($event->price == null)
        <strong>Gratuit</strong>
    @else
        <strong>${{ $event->price }}</strong>
    @endif


    <div>
        @if ($event->reservations->first() !== null)
        
            <strong>Participants</strong>
            <div id="reservations-avatars">
                @foreach ($event->reservations as $reservation)
                
                    <a href="{{ route('profile.show', $reservation->user) }}" class=" inline-block mr-2">
                        <img src="{{ $reservation->user->getAvatar() }}" class="rounded-full h-24 w-24" alt="Avatar du participant">
                    </a>
                @endforeach
            </div>
        @endif


        @if (auth()->id() !== $event->user_id and $event->isPassed(getBoolVal:true) == false)
            
            <hr>

            @if ($event->isReserved())
                
                <x-form action="{{ route('reservations.unset', $event) }}" method="delete">
                    <x-danger-button type="submit">J'annule</x-danger-button>
                </x-form>

            @else
                
                <x-form action="{{ route('reservations.set', $event) }}">
                    <x-primary-button type="submit">J'y serais</x-primary-button>
                </x-form>

            @endif

        @endif
    </div>


</x-auth>