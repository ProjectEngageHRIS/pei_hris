<header class="antialiased ">
    <nav class="fixed flex justify-between items-center w-full mx-auto top-0 z-50  pb-4 bg-white border-gray-200 px-4 lg:px-6 py-2.5 dark:bg-gray-800">
    {{-- <nav class="flex justify-between items-center w-[99%] mx-auto"> --}}
        <!-- Left Section: Image and Text -->
        <div class="flex flex-row items-center">
            <!-- Menu Button when smaller than large screen -->
            <div x-data="{ openMobileBar: false }" class="relative inline-block text-left">
                <!-- Button to toggle dropdown -->
                <button @click="openMobileBar = !openMobileBar"  class="pr-4 xl:hidden" id="barDropdownButton">
                    <svg class="size-8 text-customGray1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2 3.75A.75.75 0 0 1 2.75 3h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 3.75ZM2 8a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 8Zm0 4.25a.75.75 0 0 1 .75-.75h10.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z"/>
                    </svg>
                </button>
                
                <!-- Dropdown Menu -->
                <div x-show="openMobileBar" 
                     @click.away="openMobileBar = false" 
                     {{-- @mouseleave="openMobileBar = false" --}}
                     x-transition:enter="transition ease-out duration-300" 
                     x-transition:enter-start="transform -translate-y-2 opacity-0" 
                     x-transition:enter-end="transform translate-y-0 opacity-100" 
                     x-transition:leave="transition ease-in duration-300" 
                     x-transition:leave-start="transform translate-y-0 opacity-100" 
                     x-transition:leave-end="transform -translate-y-2 opacity-0"  
                     id="barDropdownMenu" 
                     class="absolute z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
                    <div class="py-1">
                        <ul class="flex flex-col gap-y-1.5">
                            <a href="{{ route('EmployeeDashboard') }}" wire:navigate.hover class="block px-4 py-2 text-sm {{ request()->routeIs('EmployeeDashboard') ? 'text-customRed' : 'text-gray-600' }} hover:bg-customRed hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M8.543 2.232a.75.75 0 0 0-1.085 0l-5.25 5.5A.75.75 0 0 0 2.75 9H4v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 1 1 2 0v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V9h1.25a.75.75 0 0 0 .543-1.268l-5.25-5.5Z" clip-rule="evenodd" />
                                </svg> Home
                            </a>
                            <a href="{{ route('AttendanceTable') }}"  class="block px-4 py-2 text-sm {{ request()->routeIs('AttendanceTable') ? 'text-customRed' : 'text-gray-600' }} hover:bg-customRed hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                    <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z" clip-rule="evenodd" />
                                </svg> Attendance
                            </a>
                            <div x-data="{ requestMobileOpen: false }" @click="requestMobileOpen= true" @click.away="requestMobileOpen = false" class="relative group">
                                <div id="requestBDropdownButton" class="block px-4 py-2 text-sm {{ request()->routeIs('LeaveRequestTable') || request()->routeIs('HrTicketsTable') || request()->routeIs('ItHelpDeskTable') || request()->routeIs('changeInformation') ? 'text-customRed' : 'text-gray-600' }} cursor-pointer hover:bg-customRed hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                        <path fill-rule="evenodd" d="M4 2a1.5 1.5 0 0 0-1.5 1.5v9A1.5 1.5 0 0 0 4 14h8a1.5 1.5 0 0 0 1.5-1.5V6.621a1.5 1.5 0 0 0-.44-1.06L9.94 2.439A1.5 1.5 0 0 0 8.878 2H4Zm1 5.75A.75.75 0 0 1 5.75 7h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 5 7.75Zm0 3a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                    </svg> Requests
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 ml-[10px]">
                                        <path fillRule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clipRule="evenodd" />
                                    </svg>
                                </div>
                                <!-- Nested Dropdown Menu -->
                                <ul x-show="requestMobileOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform -translate-x-2 opacity-0" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-x-0 opacity-100" x-transition:leave-end="transform -translate-x-2 opacity-0" id="requestBDropdownMenu" class="absolute top-0 z-10  w-40 ml-1 bg-white shadow-lg rounded-8px left-full ring-1 ring-black ring-opacity-5 group-hover:block">
                                    <div class="py-1">
                                        <a href="{{ route('LeaveRequestTable') }}"  wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Leave Request</a>
                                        <a href="{{ route('HrTicketsTable') }}" wire:navigate.hover  class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">HR Tickets</a>
                                        <a href="{{ route('ItHelpDeskTable') }}"  wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">IT Helpdesk</a>
                                        <a href="{{ route('ChangeInformationTable') }}"  wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Change Personal Information</a>
                                        <hr class="border-gray-400">
                                        <a href="{{ route('HrTicketsTable', ['type' => 'overtime']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Overtime Approval</a>
                                        <a href="{{ route('HrTicketsTable', ['type' => 'undertime']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Undertime Approval</a>
                                        <a href="{{ route('LeaveRequestTable', ['type' => 'adviseslip']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Advise Slip</a>
                                        <a href="{{ route('HrTicketsTable', ['type' => 'coe'])  }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Certificate of Employment</a>
                                        <a href="{{ route('HrTicketsTable', ['type' => 'procurement']) }}"  wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Procurement</a>
                                        <a href="{{ route('HrTicketsTable', ['type' => 'internalcontrol']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Internal Audit</a>
                                        <a href="{{ route('HrTicketsTable', ['type' => 'requestmeeting'])  }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Meeting Request</a>
                                        <a href="{{ route('HrTicketsTable', ['type' => 'officeadmin']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Office Admin</a>
                                    </div>
                                </ul>
                            </div>
                            @if(in_array($role_id, [4, 6, 7]))
                                <div x-data="{ approvalMobileOpen: false }"  class="relative group">
                                    <div @click="approvalMobileOpen = true" @click.away="approvalMobileOpen = false"   id="approveBDropdownButton" class="block px-4 py-2 text-sm {{ request()->routeIs('ApproveLeaveRequestTable') || request()->routeIs('ApproveHrTicketsTable') ? 'text-customRed' : 'text-gray-600' }} cursor-pointer hover:bg-customRed hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                            <path fillRule="evenodd" d="M4 2a1.5 1.5 0 0 0-1.5 1.5v9A1.5 1.5 0 0 0 4 14h8a1.5 1.5 0 0 0 1.5-1.5V6.621a1.5 1.5 0 0 0-.44-1.06L9.94 2.439A1.5 1.5 0 0 0 8.878 2H4Zm6.713 4.16a.75.75 0 0 1 .127 1.053l-2.75 3.5a.75.75 0 0 1-1.078.106l-1.75-1.5a.75.75 0 1 1 .976-1.138l1.156.99L9.66 6.287a.75.75 0 0 1 1.053-.127Z" clipRule="evenodd" />
                                        </svg> Approvals
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 ml-2">
                                            <path fillRule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clipRule="evenodd" />
                                        </svg>
                                    </div>
                                    <!-- Nested Dropdown Menu -->
                                    <ul x-show="approvalMobileOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform -translate-x-2 opacity-0" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-x-0 opacity-100" x-transition:leave-end="transform -translate-x-2 opacity-0" id="approveBDropdownMenu" class="absolute top-0 z-10  w-40 ml-1 bg-white shadow-lg rounded-8px left-full ring-1 ring-black ring-opacity-5 group-hover:block">
                                        <div class="py-1">
                                            <a href="{{ route('ApproveLeaveRequestTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">Approve Leave</a>
                                            <a href="{{ route('ApproveHrTicketsTable') }}"  wire:navigate.hover class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">Approve HR Ticket</a>
                                        </div>
                                    </ul>
                                </div>
                            @endif
                            <a href="{{ route('PayrollTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm {{ request()->routeIs('PayrollTable') ? 'text-customRed' : 'text-gray-600' }} hover:bg-customRed hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                    <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5V5h14v-.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                                    <path fill-rule="evenodd" d="M15 7H1v4.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V7ZM3 10.25a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5a.75.75 0 0 1-.75-.75Zm3.75-.75a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5h-2.5Z" clip-rule="evenodd" />
                                </svg> Payroll
                            </a>
                            <div x-data="{ tasksMobileOpen: false }" class="relative group">
                                <div @click="tasksMobileOpen = true" @click.away="tasksMobileOpen = false" id="tasksBDropdownButton" class="block px-4 py-2 text-sm {{ request()->routeIs('TasksTable') || request()->routeIs('AssignedTasksTable') || request()->routeIs('TasksForm') ? 'text-customRed' : 'text-gray-600' }} cursor-pointer hover:bg-customRed hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                        <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd" />
                                        <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm6.585 1.08a.75.75 0 0 1 .336 1.005l-1.75 3.5a.75.75 0 0 1-1.16.234l-1.75-1.5a.75.75 0 0 1 .977-1.139l1.02.875 1.321-2.64a.75.75 0 0 1 1.006-.336Z" clip-rule="evenodd" />
                                    </svg> Tasks
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 ml-[35px]">
                                        <path fillRule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clipRule="evenodd" />
                                    </svg>
                                </div>
                                <!-- Nested Dropdown Menu -->
                                <ul x-show="tasksMobileOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform -translate-x-2 opacity-0" x-transition:enter-end="transform translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-x-0 opacity-100" x-transition:leave-end="transform -translate-x-2 opacity-0" id="tasksBDropdownMenu" class="absolute top-0 z-10  w-40 ml-1 bg-white shadow-lg rounded-8px left-full ring-1 ring-black ring-opacity-5 group-hover:block">
                                    <div class="py-1">
                                    <a href="{{ route('TasksTable') }}" wire:navigate:hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">My Tasks</a>
                                    <a href="{{ route('AssignedTasksTable') }}" wire:navigate:hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Assigned Tasks</a>
                                    <a href="{{ route('TasksForm') }}" wire:navigate:hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Assign Tasks</a>
                                    </div>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
            <a href="{{route('EmployeeDashboard')}}">
                <div class="flex ml-2 item-center">
                    <img src="{{ asset('assets\sllogo.png') }}" alt="Logo" class="w-10 h-10 mr-3">
                    <div class="flex flex-col">
                        <span class="text-sm text-customGray">Powered by</span>
                        <span class="text-lg font-semibold text-nowrap text-customRed">SL Groups</span>
                    </div>
                </div>
            </a>
        </div>
        <!-- Center Section: Navigation Buttons -->
        <div class="invisible xl:visible xl:static absolute min-h-fit left-0 top-[9%] w-auto flex items-center px-5">
            <ul class="flex items-center gap-x-5">
                <!-- Home Button -->
                <a href="{{ route('EmployeeDashboard') }}" wire:navigate.hover class="w-32"> 
                    <button class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px {{ request()->routeIs('EmployeeDashboard') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path fill-rule="evenodd" d="M8.543 2.232a.75.75 0 0 0-1.085 0l-5.25 5.5A.75.75 0 0 0 2.75 9H4v4a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 1 1 2 0v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V9h1.25a.75.75 0 0 0 .543-1.268l-5.25-5.5Z" clip-rule="evenodd" />
                        </svg> Home
                    </button>
                </a>

                <!-- Attendance Button -->
                <a href="{{ route('AttendanceTable') }}"  class="w-32">
                    <button class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px h-114 {{ request()->routeIs('AttendanceTable') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path fill-rule="evenodd" d="M4 1.75a.75.75 0 0 1 1.5 0V3h5V1.75a.75.75 0 0 1 1.5 0V3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2V1.75ZM4.5 6a1 1 0 0 0-1 1v4.5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-7Z" clip-rule="evenodd" />
                        </svg> Attendance
                    </button>
                </a>

                <!-- Requests Button -->
                <div x-data="{ requestPcOpen: false }" @mouseover="requestPcOpen= true" @mouseleave="requestPcOpen = false"  class="relative inline-block text-left">
                    <!-- Requests Button -->
                    <button id="requestsDropdownButton" class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px h-114
                        {{ request()->routeIs('LeaveRequestTable') || request()->routeIs('HrTicketsTable') || request()->routeIs('ItHelpDeskTable') || request()->routeIs('changeInformation') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path fillRule="evenodd" d="M4 2a1.5 1.5 0 0 0-1.5 1.5v9A1.5 1.5 0 0 0 4 14h8a1.5 1.5 0 0 0 1.5-1.5V6.621a1.5 1.5 0 0 0-.44-1.06L9.94 2.439A1.5 1.5 0 0 0 8.878 2H4Zm1 5.75A.75.75 0 0 1 5.75 7h4.5a.75.75 0 0 1 0 1.5h-4.5A.75.75 0 0 1 5 7.75Zm0 3a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5h-4.5a.75.75 0 0 1-.75-.75Z" clipRule="evenodd" />
                        </svg> Requests
                    </button>
                    <!-- Request Dropdown -->
                    <div x-show="requestPcOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform -translate-y-2 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-y-0 opacity-100" x-transition:leave-end="transform -translate-y-2 opacity-0" id="requestsDropdownMenu" class="absolute z-10 mt-2 w-40 bg-white rounded-md shadow-lg">
                        <div class="py-1">
                            <a href="{{ route('LeaveRequestTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Leave Request</a>
                            <a href="{{ route('HrTicketsTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">HR Tickets</a>
                            <a href="{{ route('ItHelpDeskTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">IT Helpdesk</a>
                            <a href="{{ route('ChangeInformationTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Change Personal Information</a>
                            <hr class="border-gray-400">
                            <a href="{{ route('HrTicketsTable', ['type' => 'overtime']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Overtime Approval</a>
                            <a href="{{ route('HrTicketsTable', ['type' => 'undertime']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Undertime Approval</a>
                            <a href="{{ route('LeaveRequestTable', ['type' => 'adviseslip']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Advise Slip</a>
                            <a href="{{ route('HrTicketsTable', ['type' => 'coe'])  }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Certificate of Employment</a>
                            <a href="{{ route('HrTicketsTable', ['type' => 'procurement']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Procurement</a>
                            <a href="{{ route('HrTicketsTable', ['type' => 'internalcontrol']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Internal Audit</a>
                            <a href="{{ route('HrTicketsTable', ['type' => 'requestmeeting'])  }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Meeting Request</a>
                            <a href="{{ route('HrTicketsTable', ['type' => 'officeadmin']) }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Office Admin</a>
                        </div>
                    </div>
                </div>
                



                <!-- Approval Button -->
                @if(in_array($role_id, [4, 6, 7]))
                    <div x-data="{ approvalPcOpen: false }" @mouseover="approvalPcOpen = true" @mouseleave="approvalPcOpen = false" class="relative inline-block text-left">
                        <button id="approveDropdownButton" class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px h-114
                            {{ request()->routeIs('ApproveLeaveRequestTable') || request()->routeIs('ApproveHrTicketsTable') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                                <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm6.585 1.08a.75.75 0 0 1 .336 1.005l-1.75 3.5a.75.75 0 0 1-1.16.234l-1.75-1.5a.75.75 0 0 1 .977-1.139l1.02.875 1.321-2.64a.75.75 0 0 1 1.006-.336Z" clip-rule="evenodd" />
                            </svg> Approvals
                        </button>
                        <!-- Approval Dropdown -->
                        <div x-show="approvalPcOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform -translate-y-2 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-y-0 opacity-100" x-transition:leave-end="transform -translate-y-2 opacity-0" id="approveDropdownMenu" class="absolute z-10 w-40 mt-2 origin-top-right bg-white rounded-md shadow-lg center-0 ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <a href="{{ route('ApproveLeaveRequestTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Approve Leave</a>
                                <a href="{{ route('ApproveHrTicketsTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Approve HR Tickets</a>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Payroll Button -->
                <a href="{{ route('PayrollTable') }}" wire:navigate.hover class="w-32">
                    <button class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px h-114 {{ request()->routeIs('PayrollTable') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path d="M2.5 3A1.5 1.5 0 0 0 1 4.5V5h14v-.5A1.5 1.5 0 0 0 13.5 3h-11Z" />
                            <path fill-rule="evenodd" d="M15 7H1v4.5A1.5 1.5 0 0 0 2.5 13h11a1.5 1.5 0 0 0 1.5-1.5V7ZM3 10.25a.75.75 0 0 1 .75-.75h.5a.75.75 0 0 1 0 1.5h-.5a.75.75 0 0 1-.75-.75Zm3.75-.75a.75.75 0 0 0 0 1.5h2.5a.75.75 0 0 0 0-1.5h-2.5Z" clip-rule="evenodd" />
                        </svg> Payroll
                    </button>
                </a>
                <!-- Tasks Button -->
                <div x-data="{ tasksPcOpen: false }" @mouseover="tasksPcOpen = true" @mouseleave="tasksPcOpen = false" class="relative inline-block text-left">
                    <button id="tasksDropdownButton" class="w-32 font-sans text-sm font-medium shadow h-7 rounded-8px h-114
                        {{ request()->routeIs('TasksTable') || request()->routeIs('AssignedTasksTable') || request()->routeIs('TasksForm') ? 'bg-customRed text-white' : 'bg-navButton text-gray-600 hover:bg-customRed hover:text-white' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="inline-block w-5 h-5 mr-2">
                            <path fill-rule="evenodd" d="M11.986 3H12a2 2 0 0 1 2 2v6a2 2 0 0 1-1.5 1.937V7A2.5 2.5 0 0 0 10 4.5H4.063A2 2 0 0 1 6 3h.014A2.25 2.25 0 0 1 8.25 1h1.5a2.25 2.25 0 0 1 2.236 2ZM10.5 4v-.75a.75.75 0 0 0-.75-.75h-1.5a.75.75 0 0 0-.75.75V4h3Z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M2 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7Zm6.585 1.08a.75.75 0 0 1 .336 1.005l-1.75 3.5a.75.75 0 0 1-1.16.234l-1.75-1.5a.75.75 0 0 1 .977-1.139l1.02.875 1.321-2.64a.75.75 0 0 1 1.006-.336Z" clip-rule="evenodd" />
                        </svg> Tasks
                    </button>
                    <!-- Task Dropdown -->
                    <div x-show="tasksPcOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="transform -translate-y-2 opacity-0" x-transition:enter-end="transform translate-y-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="transform translate-y-0 opacity-100" x-transition:leave-end="transform -translate-y-2 opacity-0" id="tasksDropdownMenu" class="absolute z-10  w-40 mt-2 origin-top-right bg-white rounded-md shadow-lg center-0 ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1">
                            <a href="{{ route('TasksTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">My Tasks</a>
                            <a href="{{ route('AssignedTasksTable') }}" wire:navigate.hover class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Assigned Tasks</a>
                            <a href="{{ route('TasksForm') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-customRed hover:text-white">Assign a Task</a>

                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <!-- Right Section: Notification and Profile Buttons -->
        <div class="flex item-center gap-x-3.5">
            <!-- Notification -->
            {{-- <div class="relative inline-block text-left">
                <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center text-sm font-medium text-center text-customGray hover:text-customRed focus:outline-none dark:hover:text-white dark:text-customGray" type="button">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                        <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z"/>
                    </svg>
                    <div class="absolute block w-5 h-5 text-white border-2 border-white rounded-full bg-customRed -top-1.5 start-3 dark:border-gray-900 text-[10px]">2</div>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownNotification" class="absolute right-0 z-10 hidden w-64 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-lg shadow-lg dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
                    <div class="block px-4 py-2 text-sm font-medium text-center text-gray-700 rounded-t-lg bg-gray-50 dark:bg-gray-800 dark:text-white"> Notifications </div>
                    <div class="divide-y divide-gray-100 dark:divide-gray-700">
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="profilepicture.jpg" alt="Profile Picture">
                                <div class="absolute flex items-center justify-center w-5 h-5 -mt-5 border border-white rounded-full bg-customRed ms-6 dark:border-gray-800">
                                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"/>
                                        <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full ps-3">
                                <div class="text-gray-500 text-xs mb-1.5 dark:text-gray-400">New task from <span class="font-semibold text-customGray1 dark:text-white">Jese Leos</span>: "Compile documents"</div>
                                <div class="text-xs text-customRed dark:text-customRed">a few moments ago</div>
                            </div>
                        </a>
                        <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="profilepicture.jpg" alt="Profile Picture">
                                <div class="absolute flex items-center justify-center w-5 h-5 -mt-5 border border-white rounded-full bg-customRed ms-6 dark:border-gray-800">
                                    <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                                        <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z"/>
                                        <path d="M4.439 9a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full ps-3">
                                <div class="text-gray-500 text-xs mb-1.5 dark:text-gray-400">New task from <span class="font-semibold text-customGray1 dark:text-white">Jese Leos</span>: "Compile documents"</div>
                                <div class="text-xs text-customRed dark:text-customRed">a few moments ago</div>
                            </div>
                        </a>
                    </div>
                    <!-- Additional notification items here -->
                    <a href="#" class="block py-2 text-sm font-medium text-center rounded-b-lg text-customGray1 bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-customRed dark:text-white">
                        <div class="inline-flex items-center ">
                            <svg class="w-4 h-4 text-sm text-gray-700 me-2 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
            </div> --}}

            <!-- Profile Icon -->
            <div wire:replace.self class="relative inline-block text-left">
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
                <div id="dropdownAvatarName" class="absolute right-0 z-10 hidden mt-2 origin-top-right bg-white divide-y divide-gray-300 rounded-lg shadow-lg w-44 dark:bg-customRed dark:divide-customRed top-12">
                    <div class="px-4 py-3 text-sm text-customGray1 dark:text-white">
                        <div class="font-medium">{{$department}}</div>
                        <div class="truncate text-customRed">{{$employee_id}}</div>
                    </div>
                    <ul class="py-2 text-sm text-customGray1 dark:text-gray-200" aria-labelledby="dropdownAvatarNameButton">
                        <li>
                            <a href="{{route('profile')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white dark:hover:bg-customRed dark:hover:text-white">My Profile</a>
                        </li>
                        <li>
                            <a href="{{route('ChangePassword')}}" class="block px-4 py-2 hover:bg-customRed hover:text-white dark:hover:bg-customRed dark:hover:text-white">Change Password</a>
                        </li>
                        @if($role_id != 1)
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

        // // Dropdown Bar
        // const dropdownButtonBar = document.getElementById('barDropdownButton');
        // const dropdownMenuBar = document.getElementById('barDropdownMenu');

        // if (dropdownButtonBar) {
        //     let isHoveringButton = false;
        //     let isHoveringMenu = false;

        //     // Open dropdown on click
        //     dropdownButtonBar.addEventListener('click', function() {
        //         dropdownMenuBar.classList.remove('hidden');
        //         isHoveringButton = true;
        //     });

        //     // Close dropdown on mouse leave from button or menu
        //     dropdownButtonBar.addEventListener('mouseleave', function() {
        //         isHoveringButton = false;
        //         setTimeout(function() {
        //             if (!isHoveringButton && !isHoveringMenu) {
        //                 dropdownMenuBar.classList.add('hidden');
        //             }
        //         }, 200); // Delay closing to check if mouse moved to menu
        //     });

        //     dropdownMenuBar.addEventListener('mouseenter', function() {
        //         isHoveringMenu = true;
        //     });

        //     dropdownMenuBar.addEventListener('mouseleave', function() {
        //         isHoveringMenu = false;
        //         setTimeout(function() {
        //             if (!isHoveringButton && !isHoveringMenu) {
        //                 dropdownMenuBar.classList.add('hidden');
        //             }
        //         }, 200); // Delay closing to check if mouse moved to button
        //     });
        // }

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
            // if (dropdownButtonBar && !dropdownButtonBar.contains(event.target) && !dropdownMenuBar.contains(event.target)) {
            //     dropdownMenuBar.classList.add('hidden');
            // }
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