<x-guest>
    <x-form action="{{ route('register') }}">

        <x-input-with-label name="name" text="Votre nom complet" />
        <x-input-with-label name="email" type="email" text="Votre e-mail" />
        <x-input-with-label name="password" type="password" text="Mot de passe" />

        <button type="submit">S'inscrire</button>
        <a href="{{ route('login') }}">Connectez-vous à votre compte</a>
        
    </x-form>
</x-guest>