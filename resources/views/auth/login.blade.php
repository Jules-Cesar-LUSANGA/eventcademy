<x-guest>
    <x-form action="{{ route('login') }}">

        <x-input-with-label name="email" type="email" text="Votre e-mail" />
        <x-input-with-label name="password" type="password" text="Mot de passe" />

        <button type="submit">Se connecter</button>
        <a href="{{ route('register') }}">Créer un nouveau compte</a>
    </x-form>
</x-guest>