<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> --}}

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="icon" type="image/x-icon" href="{{asset('logo\sllogo.png')}}">
    <title>Employee Portal</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"> --}}
    {{-- <title>Document</title> --}}
</head>
<style>
    .bgindigo:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(54 47 120 / var(--tw-bg-opacity));
    }
    .bgindigo:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(180 198 252 / var(--tw-ring-opacity));
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(4px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    }
    .sidebar{
        --tw-bg-opacity: 1;
        background-color: rgb(66 56 157 / var(--tw-bg-opacity));
        }
    .bgindigo{
        --tw-bg-opacity: 1;
        background-color: rgb(66 56 157 / var(--tw-bg-opacity));
    }
    .textindigo{
        --tw-bg-opacity: 1;
        color: rgb(66 56 157 / var(--tw-bg-opacity));
    }
    .swipercolor{
        --tw-bg-opacity: 1;
        color: rgb(165 180 252 / var(--tw-bg-opacity));
    }
    .borderindigo{
        --tw-border-opacity: 1;
        border-color: rgb(141 162 251 / var(--tw-bg-opacity));
    }
    .hoverindigo:hover{
        --tw-bg-opacity: 1;
        background-color: rgb(54 47 120 / var(--tw-bg-opacity));
        color:white;
    }
    .frame{
        position: absolute;
        top: 50%;
        left: 50%;


        height: 200px;  
        margin-top: -200px;
        margin-left: -280px;
        border-radius: 8px;
    }
</style>
<body class="bg-gray-200">
@extends('components.layouts.base')

@section('body')

                @isset($slot)
                    {{ $slot }}
                @endisset
                {{-- <div class="p-4"> --}}
                    @yield('content')
                {{-- </div> --}}
@endsection




    
</body>
</html>