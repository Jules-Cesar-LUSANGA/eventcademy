<x-guest>
    <x-form action="{{ route('login') }}">
       <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">

            @error('email')
                <p style="color: red;">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="{{ old('password') }}">

            @error('password')
                <p style="color: red;">
                    {{ $message }}
                </p>
            @enderror   
        </div>

        <button type="submit">Login</button>
        <a href="{{ route('register') }}">Create your account</a>
    </x-form>
</x-guest>