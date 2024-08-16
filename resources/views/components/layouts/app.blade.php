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
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="icon" type="image/x-icon" href="{{asset('assets\sllogo.png')}}">
    <title>Employee Portal</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"> --}}
    {{-- <title>Document</title> --}}
</head>
<body class="overflow-x-hidden bg-gray-200">
    @extends('components.layouts.base')

    @section('body')
        {{-- <header> --}}
            {{-- The problem about responsiveness --}}
            @livewire('sidebar.sidebar-view')
        {{-- </header> --}}
        <main>
            <div class="p-8 main-content" style="margin-top: 5rem">
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