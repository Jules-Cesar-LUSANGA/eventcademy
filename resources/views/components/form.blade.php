@props([
    'action',
    'method' => null,
])

<form enctype="multipart/form-data" action="{{ $action }}" method="post" {{ $attributes }}>
    @csrf

    @method($method == null ?  'post' : $method)

    {{ $slot }}
</form>