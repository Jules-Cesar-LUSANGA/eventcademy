<x-auth>
    <div class="flex flex-col items-center">
        <h3>Informations de l'utilisateur</h3>
        <div class="text-center font-bold">
            <div class="flex items-center">
                <img src="{{ $user->getAvatar() }}" class="rounded-full h-28 w-28" alt="Avatar de l'utilisateur">
            </div>
            <h4>{{ $user->name }}</h4>
        </div>
    </div>

</x-auth>