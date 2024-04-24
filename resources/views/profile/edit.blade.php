<x-auth>
    <h1>Editer mon profil</h1>

    <h3>Informations personnelles</h3>
    <img src="{{ auth()->user()->getAvatar() }}" alt="Avatar de l'utilisateur">

    <x-form action="{{ route('profile.update') }}" method="put">
        <x-input-with-label name="avatar" type="file" text="Votre avatar" nullable/>

        <x-input-with-label name="name" text="Votre nom complet" value="{{ auth()->user()->name }}" />
        <x-input-with-label name="email" type="email" text="Votre e-mail" value="{{ auth()->user()->email }}" />

        <button type="submit">Enregistrer</button>
    </x-form>

    <h3>Mot de passe</h3>

    <x-form action="{{ route('profile.update-password') }}" method="put">
        <x-input-with-label name="current_password" type="password" text="Mot de passe actuel" />
        <x-input-with-label name="new_password" type="password" text="Nouveau mot de passe" />

        <button type="submit">Enregistrer</button>
    </x-form>
</x-auth>
