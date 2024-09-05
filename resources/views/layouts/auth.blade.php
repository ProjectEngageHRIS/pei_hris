@extends('components.layouts.base')

@section('body')
    @vite(['resources/css/app.css','resources/js/app.js'])
    <main class="min-w-[320px] w-full h-full min-h-screen bg-gray-200">
        <div wire:offline>
            <div class="flex items-center p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Warning alert!</span> You are offline. Check Your Internet Connection.
                </div>
            </div>
        </div>
        @yield('content')
        @isset($slot)
            {{ $slot }}
        @endisset
    </main>
@endsection
