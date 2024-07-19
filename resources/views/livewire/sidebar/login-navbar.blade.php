<header class="antialiased">
    <nav class="fixed top-0 z-50 w-full pb-4 bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
        <div class="flex flex-wrap justify-between items-center">
            <div class="flex justify-start items-center">
                 {{-- <button id="toggleSidebar" aria-expanded="true" aria-controls="logo-sidebar" data-dropdown-toggle="logo-sidebar" class=" p-2 mr-3 text-gray-600 rounded cursor-pointer lg:inline hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                     <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12"> <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h14M1 6h14M1 11h7"/> </svg>
                 </button> --}}
                
                <a href="#"><img src="{{ asset('assets\sllogo.png') }}" id="plm-logo" style="height:100% height: auto; min-height: 30px; max-height: 75px;"  alt="SL Logo">
                </a>
                
             </div>
            <div class="flex items-center lg:order-2">
                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="relative flex items-center text-sm font-medium rounded-full text-customGray1 pe-1 hover:text-customRed dark:hover:text-customRed md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-customGray1 dark:text-white" type="button">
                    @if($employeeImage)
                        @php
                            $employee_image = $this->getImage();
                        @endphp
                            <img class="w-8 h-8 rounded-full me-2" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="user photo">
                        @else
                            <img class="w-8 h-8 rounded-full me-2" src="{{ asset( 'assets/defaultuser.png') }}" alt="user photo"> 
                    @endif
                    {{$employee_name}}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAvatarName" class="absolute right-0 z-10 hidden mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-customRed dark:divide-customRed top-12">
                    <div class="px-4 py-3 text-sm text-customGray1 dark:text-white">
                        <div class="font-medium">{{$department}}</div>
                        <div class="truncate text-customRed">{{$employee_id}}</div>
                    </div>
                    <ul class="py-2 text-sm text-customGray1 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
                        <li>
                            <a href="{{route('EmployeeDashboard')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white dark:hover:bg-customRed dark:hover:text-white">Employee Portal</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-customRed hover:text-white dark:hover:bg-customRed dark:hover:text-white">Account Settings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-customGray1 hover:bg-customRed hover:text-white dark:hover:bg-customRed dark:hover:text-white">Sign out</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
 </header>
 <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Dropdown Avatar Name
        const dropdownButtonAvatarName = document.getElementById('dropdownAvatarNameButton');
        const dropdownMenuAvatarName = document.getElementById('dropdownAvatarName');

        if (dropdownButtonAvatarName) {
            dropdownButtonAvatarName.addEventListener('click', function() {
                dropdownMenuAvatarName.classList.toggle('hidden');
            });
        }
    });
    
 </script>