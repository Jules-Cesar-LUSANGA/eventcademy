<x-auth>
    <div class="flex flex-col items-center justify-center h-screen">
        
        <div class="shadow-lg shadow-slate-300 p-4">

            <h1 class="font-bold text-center text-lg uppercase mb-3">Modifier l'évenement</h1>

            <x-form action="{{ route('events.update', $event) }}" method="put">

                <x-input-with-label name="title" text="Titre de l'évenement" value="{{ $event->title }}" />
            
                <x-input-with-label name="date" text="Date" type="date" value="{{ $event->date }}" />
                <x-input-with-label name="cover" text="Image de couverture" type="file" nullable />
                
                <div class="grid grid-cols-2">
                    <x-input-with-label name="start_at" text="Début" type="time" value="{{ $event->start_at }}" />
                    <x-input-with-label name="end_at" text="Fin" type="time" value="{{ $event->end_at }}" />
                </div>

                <x-input-with-label name="price" text="Prix ($)" type="number" value="{{ $event->price }}" nullable />
                <x-input-with-label name="location" text="Adresse" value="{{ $event->location }}" />
            
                <x-textarea-with-label name="description" text="Description de l'évenement" value="{{ $event->description }}"/>
                
                <div class="flex justify-end mt-3">
                    <x-primary-button class="px-4">Modifier</x-primary-button>
                </div>
            </x-form>

        </div>
    </div>
</x-auth>
