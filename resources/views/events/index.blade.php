<x-auth>
    <div>
        @if ($events->first() !== null)
            @foreach ($events as $event)
                
                <div>
                    <img src="{{ $event->getCover() }}" alt="Event cover" width="300">

                    <h3>
                        <a href="{{ route('events.show', $event) }}">
                            {{ $event->title }}
                        </a>
                    </h3>
                </div>

            @endforeach
        @else
            <p style="color: yellow">Aucun évènement trouvé</p>
        @endif
    </div>
</x-auth>