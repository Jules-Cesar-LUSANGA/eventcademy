<x-auth>
    <h1>Ajouter un évenement</h1>

    <x-form action="{{ route('events.store') }}">

        <x-input-with-label name="cover" text="Image de couverture" type="file" />
        <x-input-with-label name="title" text="Titre de l'évenement" />
        <x-input-with-label name="date" text="Date" type="date" />
        <x-input-with-label name="start_at" text="Début" type="time" />
        <x-input-with-label name="end_at" text="Fin" type="time" />
        <x-input-with-label name="price" text="Prix" type="number" placeholder="Laissez vide si gratuit" nullable />
        <x-input-with-label name="location" text="Adresse" />
        
        <x-textarea-with-label name="description" text="Description de l'évenement" type="number" nullable/>

        <button type="submit">Publier</button>
    </x-form>
</x-auth>
