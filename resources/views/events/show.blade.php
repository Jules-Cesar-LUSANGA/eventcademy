<x-auth>

    <img src="{{ $event->getCover() }}" alt="Event cover" width="300">

    <h2>{{ $event->title }}</h2>

    @if (auth()->id() === $event->user_id)
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
        <img src="{{ $event->user->getAvatar() }}" style="border-radius: 50%;" alt="Avatar de l'auteur">
        <strong>{{ $event->user->name }}</strong>
    </div>

    <hr>

    @if ($event->price == null)
        <strong>Gratuit</strong>
    @else
        <strong>${{ $event->price }}</strong>
    @endif

</x-auth>