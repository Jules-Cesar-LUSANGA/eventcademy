@props(['events'])

<div class="grid grid-cols-4">
    @if ($events->first() !== null)
        @foreach ($events as $event)
            
            <div>
                <img src="{{ $event->getCover() }}" alt="Event cover" width="300">

                <h3>
                    <a href="{{ route('events.show', $event) }}">
                        {{ $event->title }}
                    </a>
                </h3>

                <h4>{{ $event->isPassed() }}</h4>
            </div>

        @endforeach
    @else
        <p style="color: yellow">Aucun évènement trouvé</p>
    @endif
</div>