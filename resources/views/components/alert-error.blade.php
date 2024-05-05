@session('error')
    <div id="message" class="text-red-600 mb-3 font-bold bg-red-200 p-3 border-l-4 border-red-950">
        {{ session('error') }}
    </div>
@endsession
