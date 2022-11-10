@extends('layouts.app')

@section('content')
<form class="bg-white p-4 m-4 rounded-md space-y-4" method="POST" action="{{ route('login') }}">
    @csrf

    <h2 class="text-center font-bold text-red-600 text-lg">Login</h2>
    <!-- Email -->
    <div>
        <input class="bg-white outline-none px-4 py-2 border-b-2 border-gray-300" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
        @error('email')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
        
     <!-- Password -->
     <div>
        <input class="bg-white outline-none px-4 py-2 border-b-2 border-gray-300" id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password">
        @error('password')
            <span role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <button class="w-full py-2 bg-red-600 border-b-2 border-red-800 text-white rounded-md hover:bg-red-700" type="submit">
        {{ __('Login') }}
    </button>
</form>
@endsection
