@props(['events'])

<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @if ($events->first() !== null)
        @foreach ($events as $event)
            
            <div class="h-min m-1 mb-3 max-w-sm rounded overflow-hidden shadow-lg">
                <img src="{{ $event->getCover() }}" alt="Event cover" class="w-full h-72">

                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">
                        <a href="{{ route('events.show', $event) }}"  class="text-blue-500">
                            {{ $event->title }}
                        </a>
                    </div>
                    <p 
                        class="text-{{ $event->isPassed(getBoolVal:true) ? 'red' : 'gray' }}-500 text-base font-bold"
                    >{{ $event->isPassed() }}</p>
                </div>
            </div>

        @endforeach
    @else
        <p class="text-blue-500">Aucun évènement trouvé</p>
    @endif
</div>

