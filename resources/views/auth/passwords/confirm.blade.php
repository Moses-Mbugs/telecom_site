@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl">
        <div>
            <img class="mx-auto h-16 w-auto object-contain" src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World Telecom">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Confirm Password
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                {{ __('Please confirm your password before continuing.') }}
            </p>
        </div>

        <form class="mt-8 space-y-6" action="{{ route('password.confirm') }}" method="POST">
            @csrf

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password" class="appearance-none rounded-md relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-purple-500 focus:border-purple-500 focus:z-10 sm:text-sm @error('password') border-red-500 @enderror" placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="font-medium text-purple-600 hover:text-purple-500 text-sm">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-purple-500 group-hover:text-purple-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                    </span>
                    {{ __('Confirm Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
