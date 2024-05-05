<x-auth>
    <div class="flex flex-col items-center h-screen">

        <h1 class="font-bold text-2xl mb-2">Editer mon profil</h1>

        <img src="{{ auth()->user()->getAvatar() }}" class=" h-40 w-40 rounded-full" alt="Avatar de l'utilisateur">

        <x-form action="{{ route('profile.update') }}" method="put" class="shadow-lg shadow-slate-500 p-4">

            <h3 class="font-bold text-lg my-3">Informations personnelles</h3>
            
            <x-input-with-label name="avatar" type="file" text="Votre avatar" nullable/>
            <x-input-with-label name="name" text="Votre nom complet" value="{{ auth()->user()->name }}" />
            <x-input-with-label name="email" type="email" text="Votre e-mail" value="{{ auth()->user()->email }}" />
            <x-primary-button>Enregistrer</x-primary-button>

        </x-form>


        
        <div class="py-5">
            <x-form action="{{ route('profile.update-password') }}" method="put" class="shadow-lg shadow-slate-400 p-4">
                <h3 class="font-bold text-lg my-3">Mot de passe</h3>
                <x-input-with-label name="current_password" type="password" text="Mot de passe actuel" />
                <x-input-with-label name="new_password" type="password" text="Nouveau mot de passe" />
                <x-primary-button>Enregistrer</x-primary-button>
            </x-form>
        </div>

    </div>
</x-auth>
