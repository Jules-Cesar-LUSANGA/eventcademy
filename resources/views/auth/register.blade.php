<x-auth-form action="{{ route('register') }}" linkText="Connectez-vous à votre compte" linkRoute="{{ route('login') }}">

    <h1 class="font-bold text-2xl">S'inscrire</h1>

    <p class="my-2">Créez votre compte pour voir les évènements</p>

    <x-input-with-label name="name" text="Votre nom complet" />
    <x-input-with-label name="email" type="email" text="Votre e-mail" />
    <x-input-with-label name="password" type="password" text="Mot de passe" />

    <x-primary-button>S'inscrire</x-primary-button>
    
</x-auth-form>