<header class="px-2 py-4 bg-white">
    <nav class="flex justify-between items-center w-[99%] mx-auto">
        <!-- Left Section: Image and Text -->
        <div class="flex flex-row items-center">
            <!-- Menu Button when smaller than large screen -->

            <a href="{{route('ITDashboard')}}">
                <div class="flex item-center">
                    <img src="{{ asset('assets/sllogo.png') }}" alt="Logo" class="w-10 h-10 mr-3">
                    <div class="flex flex-col">
                        <span class="text-sm text-customGray">Powered by</span>
                        <span class="text-lg font-semibold text-nowrap text-customRed">SL Groups</span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Right Section: Notification and Profile Buttons -->
        <div class="flex item-center gap-x-3.5">
            <!-- Profile Icon -->
            <div class="relative inline-block text-left">
                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="relative flex items-center text-sm font-medium rounded-full text-customGray1 pe-1 hover:text-customRed dark:hover:text-customRed md:me-0 focus:ring-4 focus:ring-gray-100 dark:focus:ring-customGray1 dark:text-white" type="button">
                    <img class="w-8 h-8 rounded-full me-2" src="{{ asset( 'assets/defaultuser.png') }}" alt="user photo"> {{$employee_name}}
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownAvatarName" class="absolute right-0 z-10 hidden mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow-lg w-44 dark:bg-customRed dark:divide-customRed top-12">
                    <div class="px-4 py-3 text-sm text-customGray1 dark:text-white">
                        <div class="font-medium">{{$department}}</div>
                        <div class="truncate">{{$employee_id}}</div>
                    </div>
                    <ul class="py-2 text-sm text-customGray1 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
                        <li>
                            <a href="{{route('profile')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white ">My Profile</a>
                        </li>
                        <li>
                            <a href="{{route('ChangePassword')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white ">Change Password</a>
                        </li>
                        @if($role_id != 1)
                            <li>
                                <a href="{{route('LoginDashboard')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white ">Choose Portal</a>
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
