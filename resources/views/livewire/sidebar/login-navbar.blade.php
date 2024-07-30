<header class="antialiased py-4 bg-white px-2">
    <nav class="flex justify-between items-center w-[99%] mx-auto">
        <a href="{{route('LoginDashboard')}}">
            <div class="flex ml-2 item-center">
                <img src="{{ asset('assets\sllogo.png') }}" alt="Logo" class="w-10 h-10 mr-3">
                <div class="flex flex-col">
                    <span class="text-sm text-customGray">Powered by</span>
                    <span class="text-lg font-semibold text-nowrap text-customRed">SL Groups</span>
                </div>
            </div>
        </a>
        <div class="flex items-center lg:order-2">
            <button type="button" class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown">
                <span class="sr-only">Open user menu</span>
                @if($employeeImage)
                    @php
                        $employee_image = $this->getImage();
                    @endphp
                        <img class="w-8 h-8 rounded-full" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="user photo">
                    @else
                        <img class="w-8 h-8 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="user photo">
                @endif
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 w-56 text-base list-none bg-white rounded divide-y divide-gray-100 shadow" id="user-dropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm font-bold text-gray-900 dark:text-white">{{$employeeName}}</span>
                    <span class="block text-sm text-red-700 font-semibold truncate dark:text-gray-400">{{$employee_id}}</span>
                </div>
                <ul class="py-1 text-gray-500 dark:text-gray-400" aria-labelledby="dropdown">
                    <a href="{{ route('logout') }}" class="block ml-2 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white">
                        <li class="flex items-center ml-2 ">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                            </svg>
                            <span class="ml-2 text-gray-800">Sign out</span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </nav>
</header>
