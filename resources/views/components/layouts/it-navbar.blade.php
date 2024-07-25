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
        <title>Employee Portal</title>
        @vite(['resources/css/app.css','resources/js/app.js'])
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
    </style>
    <body class="overflow-x-hidden bg-gray-200">
    @extends('components.layouts.base')

    @section('body')
        <header>
            @livewire('sidebar.it-navbar-view')
        </header>
        <main>
            <div class="p-8 main-content">
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
            </div>
        </main>
        <script>
            // Get the toggle button
            const toggleButton = document.getElementById('toggleSidebar');
            // Get the dropdown element
            const logoSidebar = document.getElementById('logo-sidebar');
            // Initialize a flag to track the first click
            let firstClick = true;

            // Define the SVG icons
            const closeIcon = `<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h14M1 6h14M1 11h7"/>
                            </svg>`;
            const openIcon = `<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>`;

            // Set the initial icon
            toggleButton.innerHTML = closeIcon;

            // Toggle dropdown visibility and content padding when the button is clicked
            toggleButton.addEventListener('click', function(event) {
                // If it's the first click, do nothing
                if (firstClick) {
                    firstClick = false;
                    return;
                }

                // Toggle dropdown visibility
                const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
                toggleButton.setAttribute('aria-expanded', String(!isExpanded));
                logoSidebar.classList.toggle('hidden');
                if (!isExpanded && window.innerWidth <= 640) {
                    logoSidebar.style.display = 'block';
                } else {
                    logoSidebar.style.display = '';
                }

                // Toggle content padding
                const mainContent = document.getElementById('padding-content');
                mainContent.classList.toggle('sm:ml-64');

                // Change the icon
                toggleButton.innerHTML = isExpanded ? openIcon : closeIcon;

                // Prevent event propagation to avoid closing the sidebar
                event.stopPropagation();
            });

            // Hide the dropdown by default on screens narrower than 640 pixels
            if (window.innerWidth <= 640) {
            logoSidebar.classList.add('hidden');
            }
        </script>
    @endsection
    </body>
</html>
