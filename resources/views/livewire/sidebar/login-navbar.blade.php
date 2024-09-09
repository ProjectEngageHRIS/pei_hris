<header class="antialiased">
    <nav class="min-w-[350px] flex items-center justify-between w-full px-2 py-4 bg-white">
        <!-- Left Section: Image and Text -->
        <div class="flex flex-row items-center">
            <a href="{{route('HumanResourceDashboard')}}">
                <div class="flex pl-6 item-center">
                    <img src="{{ asset('assets/sllogo.png') }}" alt="Logo" class="mr-3 size-10">
                    <div class="flex flex-col">
                        <span class="text-sm text-customGray">Powered by</span>
                        <span class="text-lg font-semibold text-nowrap text-customRed">SL Group</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Right Section: Notification and Profile Buttons -->
        <div class="flex item-center gap-x-3.5">
            <!-- Profile Icon -->
            <div class="relative inline-block text-left">
                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="relative flex items-center text-sm font-medium rounded-full text-customGray1 pe-1 hover:text-customRed dark:hover:text-customRed md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-customGray1 dark:text-white" type="button">
                    @if($employeeImage)
                    @php
                        $employee_image = $this->getImage();
                    @endphp
                        <img class="w-8 h-8 rounded-full me-2" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="user photo">
                    @else
                        <img class="w-8 h-8 rounded-full me-2" src="{{ asset( 'assets/defaultuser.png') }}" alt="user photo"> 
                    @endif
                    @if(request()->routeIs('LoginDashboard'))
                        {{$employee_name}}
                    @endif
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownAvatarName" class="absolute right-0 z-10 hidden mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-customRed dark:divide-customRed top-12">
                    @if(request()->routeIs('LoginDashboard'))
                        <div class="px-4 py-3 text-sm text-customGray1 dark:text-white">
                            <div class="font-medium">{{$department}}</div>
                            <div class="truncate text-customRed">{{$employee_id}}</div>
                        </div>
                    @endif
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