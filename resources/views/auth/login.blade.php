@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-8/12 bg-white p-6 rounded-lg">
        <form action="{{ route('login')}}" method="post">

            @if(session('status'))
            {{ session('status') }}
            @endif

            @csrf
            <div class="mb-4">
                <label for="email" class="sr-only">Email</label>
                <input type="email" name="email" placeholder="Your email" class="bg-gray-100 border-2 w-full p-4 rounded-lg" value=" {{ old('email') }} ">
                @error('email')
                <div>
                    {{ $message }}
                </div>

                @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password" placeholder="Password" class="bg-gray-100 border-2 w-full p-4 rounded-lg">
                @error('password')
                <div>
                    {{ $message }}
                </div>

                @enderror
            </div>
            <div class="mb-4">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember">Remember me</label>
                </div>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded w-full">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection