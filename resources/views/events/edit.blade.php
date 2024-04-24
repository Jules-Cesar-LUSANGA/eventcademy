<x-auth>
    <h1>Modifier l'évenement</h1>

    <x-form action="{{ route('events.update', $event) }}" method="put">

        <x-input-with-label name="cover" text="Image de couverture" type="file" nullable />
        <x-input-with-label name="title" text="Titre de l'évenement" value="{{ $event->title }}" />
        <x-input-with-label name="date" text="Date" type="date" value="{{ $event->date }}" />
        <x-input-with-label name="start_at" text="Début" type="time" value="{{ $event->start_at }}" />
        <x-input-with-label name="end_at" text="Fin" type="time" value="{{ $event->end_at }}" />
        <x-input-with-label name="price" text="Prix" type="number" value="{{ $event->price }}" nullable />
        <x-input-with-label name="location" text="Adresse" value="{{ $event->location }}" />
        
        <x-textarea-with-label name="description" text="Description de l'évenement" value="{{ $event->description }}" type="number" nullable/>

        <button type="submit">Publier</button>
    </x-form>
</x-auth>
