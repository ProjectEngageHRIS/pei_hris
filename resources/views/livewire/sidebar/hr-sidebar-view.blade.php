<header class="antialiased">
    <nav class="min-w-[350px] flex items-center justify-between w-full px-2 py-4 bg-white">
        <!-- Left Section: Image and Text -->
        <div class="flex flex-row items-center">
            <!-- Menu Button when smaller than large screen -->
            <div class="relative inline-block text-left">
                <button class="pl-4 xl:hidden" id="barDropdownButton">
                    <svg class="size-8 text-customGray1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"/>
                    </svg>
                </button>
                <!-- Menu Dropdown -->
                <div id="barDropdownMenu" class="absolute z-10 hidden w-40 mt-2 origin-top-right bg-white rounded-md shadow-lg center-0 ring-1 ring-black ring-opacity-5 focus:outline-none">
                    <div class="py-1">
                        <ul class="flex flex-col gap-y-1.5">
                            <a href="{{ route('HumanResourceDashboard') }}" class="block px-4 py-2 text-sm {{ request()->routeIs('HumanResourceDashboard') ? 'text-customRed' : 'text-gray-600' }} hover:bg-customRed hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M8.543 2.232a.75.75 0 0 0-1.085 0l-5.25 5.5A.75.75 0 0 0 2.75 9H4v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 1 1 2 0v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V9h1.25a.75.75 0 0 0 .543-1.268l-5.25-5.5Z" clip-rule="evenodd" />
                                </svg> Home
                            </a>
                            <a href="{{ route('HrDailyTimeRecord') }}" class="block px-4 py-2 text-sm {{ request()->routeIs('HrDailyTimeRecord') ? 'text-customRed' : 'text-gray-600' }} hover:bg-customRed hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z" clip-rule="evenodd" />
                                </svg> Attendance
                            </a>
                            <a href="{{ route('ActivitiesGallery') }}" class="block px-4 py-2 text-sm {{ request()->routeIs('ActivitiesGallery') ? 'text-customRed' : 'text-gray-600' }} hover:bg-customRed hover:text-white whitespace-nowrap">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z" clip-rule="evenodd" />
                                </svg> Announcements
                            </a>
                            <div class="relative group">
                                <div id="approveBDropdownButton" class="block px-4 py-2 text-sm {{ request()->routeIs('ApproveLeaveRequestTable') || request()->routeIs('ApproveHrTicketsTable') || request()->routeIs('ApproveChangeInformationTable') ? 'text-customRed' : 'text-gray-600' }} cursor-pointer hover:bg-customRed hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                        <path fillRule="evenodd" d="M4 2a1.5 1.5 0 0 0-1.5 1.5v9A1.5 1.5 0 0 0 4 14h8a1.5 1.5 0 0 0 1.5-1.5V6.621a1.5 1.5 0 0 0-.44-1.06L9.94 2.439A1.5 1.5 0 0 0 8.878 2H4Zm6.713 4.16a.75.75 0 0 1 .127 1.053l-2.75 3.5a.75.75 0 0 1-1.078.106l-1.75-1.5a.75.75 0 1 1 .976-1.138l1.156.99L9.66 6.287a.75.75 0 0 1 1.053-.127Z" clipRule="evenodd" />
                                    </svg> Approvals
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 ml-2">
                                        <path fillRule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clipRule="evenodd" />
                                    </svg>
                                </div>
                                <!-- Nested Dropdown Menu -->
                                <ul id="approveBDropdownMenu" class="absolute top-0 z-10 hidden w-40 ml-1 bg-white shadow-lg rounded-8px left-full ring-1 ring-black ring-opacity-5 group-hover:block">
                                    <div class="py-1">
                                        <a href="{{ route('ListLeaveRequestTable', ['index' => 'list'])  }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Approve Leave</a>
                                        <a href="{{ route('ApproveHrTicketsTable') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Approve HR Ticket</a>
                                        <a href="{{ route('ApproveChangeInformationTable') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Approve Changes</a>
                                    </div>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="{{route('HumanResourceDashboard')}}">
                <div class="flex pl-4 xl:pl-6 item-center">
                    <img src="{{ asset('assets/sllogo.png') }}" alt="Logo" class="mr-3 size-10">
                    <div class="flex flex-col">
                        <span class="text-xl font-semibold text-nowrap text-customRed mt-2">SL Group</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Center Section: Navigation Buttons -->
        <div class="hidden xl:static absolute min-h-fit left-0 top-[9%] w-auto xl:flex items-center px-5">
            <ul class="flex items-center gap-x-5">
                <!-- Home Button -->
                <a href="{{ route('HumanResourceDashboard') }}" class="w-32">
                    <button class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px {{ request()->routeIs('HumanResourceDashboard') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                        <path fill-rule="evenodd" d="M8.543 2.232a.75.75 0 0 0-1.085 0l-5.25 5.5A.75.75 0 0 0 2.75 9H4v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 1 1 2 0v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V9h1.25a.75.75 0 0 0 .543-1.268l-5.25-5.5Z" clip-rule="evenodd" />
                        </svg> Home
                    </button>
                </a>
                <!-- Attendance Button -->
                <a href="{{ route('HrDailyTimeRecord') }}" class="w-32">
                    <button class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px {{ request()->routeIs('HrDailyTimeRecord') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z" clip-rule="evenodd" />
                        </svg> Attendance
                    </button>
                </a>
                <!-- Announcements Button -->
                <a href="{{ route('ActivitiesGallery') }}" class="w-40">
                    <button class="w-40 font-sans text-sm font-medium shadow h-7 rounded-8px {{ request()->routeIs('ActivitiesGallery') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg class="inline-block w-5 h-5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M18.458 3.11A1 1 0 0 1 19 4v16a1 1 0 0 1-1.581.814L12 16.944V7.056l5.419-3.87a1 1 0 0 1 1.039-.076ZM22 12c0 1.48-.804 2.773-2 3.465v-6.93c1.196.692 2 1.984 2 3.465ZM10 8H4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h6V8Zm0 9H5v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3Z" clip-rule="evenodd"/>
                        </svg> Announcements
                    </button>
                </a>
                <!-- Approval Button -->
                <div class="relative inline-block text-left">
                    <button id="approveDropdownButton" class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px {{ request()->routeIs('ApproveLeaveRequestTable') || request()->routeIs('ApproveHrTicketsTable') || request()->routeIs('ApproveChangeInformationTable') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm6.585 1.08a.75.75 0 0 1 .336 1.005l-1.75 3.5a.75.75 0 0 1-1.16.234l-1.75-1.5a.75.75 0 0 1 .977-1.139l1.02.875 1.321-2.64a.75.75 0 0 1 1.006-.336Z" clip-rule="evenodd" />
                        </svg> Approvals
                    </button>
                    <!-- Approval Dropdown -->
                    <div id="approveDropdownMenu" class="absolute z-10 hidden w-40 mt-2 origin-top-right bg-white rounded-md shadow-lg center-0 ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            <a href="{{ route('ListLeaveRequestTable', ['type' => 'list']) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">Approve Leave</a>
                            <a href="{{ route('ApproveHrTicketsTable') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">Approve HR Tickets</a>
                            <a href="{{ route('ApproveChangeInformationTable') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">Approve Changes</a>
                        </div>
                    </div>
                </div>
            </ul>
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
                        @if($role_id == 61024)
                            <li>
                                <a href="{{route('LoginDashboard')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white dark:hover:bg-customRed dark:hover:text-white">Choose Portal</a>
                            </li>
                         @endif
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

        // Dropdown Notification
        const dropdownButtonNotification = document.getElementById('dropdownNotificationButton');
        const dropdownMenuNotification = document.getElementById('dropdownNotification');

        if (dropdownButtonNotification) {
            dropdownButtonNotification.addEventListener('click', function() {
                dropdownMenuNotification.classList.toggle('hidden');
            });
        }

        // Dropdown Requests
        const dropdownButtonRequests = document.getElementById('requestsDropdownButton');
        const dropdownMenuRequests = document.getElementById('requestsDropdownMenu');

        if (dropdownButtonRequests) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on mouse enter
            dropdownButtonRequests.addEventListener('mouseenter', function() {
                dropdownMenuRequests.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonRequests.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuRequests.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuRequests.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuRequests.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuRequests.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to button
            });
        }

        // Dropdown Request (Bar)
        const dropdownButtonRequestsB = document.getElementById('requestBDropdownButton');
        const dropdownMenuRequestsB = document.getElementById('requestBDropdownMenu');

        if (dropdownButtonRequestsB) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on mouse enter
            dropdownButtonRequestsB.addEventListener('mouseenter', function() {
                dropdownMenuRequestsB.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonRequestsB.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuRequestsB.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuRequestsB.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuRequestsB.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuRequestsB.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to button
            });
        }

        // Dropdown Tasks
        const dropdownButtonTasks = document.getElementById('tasksDropdownButton');
        const dropdownMenuTasks = document.getElementById('tasksDropdownMenu');

        if (dropdownButtonTasks) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on mouse enter
            dropdownButtonTasks.addEventListener('mouseenter', function() {
                dropdownMenuTasks.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonTasks.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuTasks.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuTasks.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuTasks.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuTasks.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to button
            });
        }

        // Dropdown Tasks (Bar)
        const dropdownButtonTasksB = document.getElementById('tasksBDropdownButton');
        const dropdownMenuTasksB = document.getElementById('tasksBDropdownMenu');

        if (dropdownButtonTasksB) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on mouse enter
            dropdownButtonTasksB.addEventListener('mouseenter', function() {
                dropdownMenuTasksB.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonTasksB.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuTasksB.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuTasksB.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuTasksB.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuTasksB.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to button
            });
        }

        // Dropdown Approvals
        const dropdownButtonApprove= document.getElementById('approveDropdownButton');
        const dropdownMenuApprove = document.getElementById('approveDropdownMenu');

        if (dropdownButtonApprove) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on mouse enter
            dropdownButtonApprove.addEventListener('mouseenter', function() {
                dropdownMenuApprove.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonApprove.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuApprove.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuApprove.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuApprove.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuApprove.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to button
            });
        }

        // Dropdown Approvals (Bar)
        const dropdownButtonApproveB = document.getElementById('approveBDropdownButton');
        const dropdownMenuApproveB = document.getElementById('approveBDropdownMenu');

        if (dropdownButtonApproveB) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on mouse enter
            dropdownButtonApproveB.addEventListener('mouseenter', function() {
                dropdownMenuApproveB.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonApproveB.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuApproveB.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuApproveB.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuApproveB.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuApproveB.classList.add('hidden');
                    }
                }, 50); // Delay closing to check if mouse moved to button
            });
        }

        // Dropdown Bar
        const dropdownButtonBar = document.getElementById('barDropdownButton');
        const dropdownMenuBar = document.getElementById('barDropdownMenu');

        if (dropdownButtonBar) {
            let isHoveringButton = false;
            let isHoveringMenu = false;

            // Open dropdown on click
            dropdownButtonBar.addEventListener('click', function() {
                dropdownMenuBar.classList.remove('hidden');
                isHoveringButton = true;
            });

            // Close dropdown on mouse leave from button or menu
            dropdownButtonBar.addEventListener('mouseleave', function() {
                isHoveringButton = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuBar.classList.add('hidden');
                    }
                }, 200); // Delay closing to check if mouse moved to menu
            });

            dropdownMenuBar.addEventListener('mouseenter', function() {
                isHoveringMenu = true;
            });

            dropdownMenuBar.addEventListener('mouseleave', function() {
                isHoveringMenu = false;
                setTimeout(function() {
                    if (!isHoveringButton && !isHoveringMenu) {
                        dropdownMenuBar.classList.add('hidden');
                    }
                }, 200); // Delay closing to check if mouse moved to button
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (dropdownButtonAvatarName && !dropdownButtonAvatarName.contains(event.target) && !dropdownMenuAvatarName.contains(event.target)) {
                dropdownMenuAvatarName.classList.add('hidden');
            }
            if (dropdownButtonNotification && !dropdownButtonNotification.contains(event.target) && !dropdownMenuNotification.contains(event.target)) {
                dropdownMenuNotification.classList.add('hidden');
            }
            if (dropdownButtonRequests && !dropdownButtonRequests.contains(event.target) && !dropdownMenuRequests.contains(event.target)) {
                dropdownMenuRequests.classList.add('hidden');
            }
            if (dropdownButtonTasks && !dropdownButtonTasks.contains(event.target) && !dropdownMenuTasks.contains(event.target)) {
                dropdownMenuTasks.classList.add('hidden');
            }
            if (dropdownButtonBar && !dropdownButtonBar.contains(event.target) && !dropdownMenuBar.contains(event.target)) {
                dropdownMenuBar.classList.add('hidden');
            }
            if (dropdownButtonApprove && !dropdownButtonApprove.contains(event.target) && !dropdownMenuApprove.contains(event.target)) {
                dropdownMenuApprove.classList.add('hidden');
            }
            if (dropdownButtonTasksB && !dropdownButtonTasksB.contains(event.target) && !dropdownMenuTasksB.contains(event.target)) {
                dropdownMenuTasksB.classList.add('hidden');
            }
            if (dropdownButtonApproveB && !dropdownButtonApproveB.contains(event.target) && !dropdownMenuApproveB.contains(event.target)) {
                dropdownMenuApproveB.classList.add('hidden');
            }
            if (dropdownButtonRequestsB && !dropdownButtonRequestsB.contains(event.target) && !dropdownMenuRequestsB.contains(event.target)) {
                dropdownMenuRequestsB.classList.add('hidden');
            }
        });
    });
</script>
