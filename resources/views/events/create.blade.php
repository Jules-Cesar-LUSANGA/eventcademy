<x-auth>
    
    <div class="flex flex-col items-center justify-center h-screen">
        
        <div class="shadow-lg p-4">
            <h1 class="text-center text-lg uppercase font-bold mb-3">Publier un évenement</h1>
            
            <x-form action="{{ route('events.store') }}">
            
                <x-input-with-label name="title" text="Titre de l'évenement" />
            
                <x-input-with-label name="date" text="Date" type="date" />
                <x-input-with-label name="cover" text="Image de couverture" type="file" />
               
                <div class="grid grid-cols-2">
                    <x-input-with-label name="start_at" text="Début" type="time" />
                    <x-input-with-label name="end_at" text="Fin" type="time" />
                </div>
            
                <x-input-with-label name="price" text="Prix ($)" type="number" placeholder="Laissez vide si gratuit" nullable />
                <x-input-with-label name="location" text="Adresse" />
            
                <x-textarea-with-label name="description" text="Description de l'évenement"/>
                
                <div class="flex justify-end mt-3">
                    <x-primary-button class="px-4">Publier</x-primary-button>
                </div>
                
            </x-form>
        </div>

    </div>

</x-auth>
