@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl">
        <div>
            <img class="mx-auto h-16 w-auto object-contain" src="{{ asset('images/safe_world_logo_cropped_transparent.png') }}" alt="Safe World Telecom">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Verify Your Email Address
            </h2>
        </div>

        @if (session('resent'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ __('A fresh verification link has been sent to your email address.') }}</span>
            </div>
        @endif

        <div class="text-sm text-gray-600">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        </div>

        <form class="mt-4" action="{{ route('verification.resend') }}" method="POST">
            @csrf
            <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-200">
                {{ __('click here to request another') }}
            </button>
        </form>
    </div>
</div>
@endsection
