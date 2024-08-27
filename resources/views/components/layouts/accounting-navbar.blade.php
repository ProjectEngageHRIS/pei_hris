<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Accounting Portal</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="flex flex-col h-full min-h-screen bg-gray-200">
    @extends('components.layouts.base')

    @section('body')
        <header class="sticky top-0 z-30 bg-white shadow">
            @livewire('sidebar.accounting-navbar-view')
        </header>
        <main class="p-8 min-w-[350px] w-full">
            @isset($slot)
                {{ $slot }}
            @endisset
        </main>
    @endsection
</body>
</html>
