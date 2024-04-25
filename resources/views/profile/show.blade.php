<x-auth>
    <h3>Informations de l'utilisateur</h3>

    <div style="text-align: center">
        <img src="{{ $user->getAvatar() }}" style="border-radius: 50%;" alt="Avatar de l'utilisateur"r>
        <h4>{{ $user->name }}</h4>
    </div>

</x-auth>