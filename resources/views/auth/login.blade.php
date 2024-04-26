<x-auth-form action="{{ route('login') }}" linkText="Créer un nouveau compte" linkRoute="{{ route('register') }}">

    <h1 class="font-bold text-2xl">Se connecter</h1>

    <p class="my-2">Connectez-vous à votre compte pour voir les évènements</p>

    <x-input-with-label name="email" type="email" text="Votre e-mail" />
    <x-input-with-label name="password" type="password" text="Mot de passe" />
    
    <x-primary-button>Se connecter</x-primary-button>
    
</x-auth-form>