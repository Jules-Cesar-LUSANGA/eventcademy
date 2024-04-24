@props([
    'action',
    'method' => null,
])

<form enctype="multipart/form-data" action="{{ $action }}" method="post">
    @csrf

    @method($method == null ?  'post' : $method)

    {{ $slot }}
</form>