<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <link rel="icon" type="image/x-icon" href="{{asset('assets\sllogo.png')}}">
        <title>IT Portal</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="flex flex-col h-full min-h-screen bg-gray-200">
        @extends('components.layouts.base')

        @section('body')
            <header class="sticky top-0 z-30 bg-white shadow">
                @livewire('sidebar.it-navbar-view')
            </header>
            <main class="p-8 min-w-[350px] w-full">
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
                @isset($slot)
                    {{ $slot }}
                @endisset
                <div>
                    @yield('content')
                </div>
            </main>
        @endsection
    </body>
</html>
