<div class="flex flex-col items-stretch mt-14 lg:mt-10 lg:flex-row gap-y-6 lg:justify-center lg:items-start">
    <div class="lg:p-6 pt-5 mt-[-70px]">
        <div wire:ignore class="lg:w-[350px] lg:h-[210px] overflow-hidden bg-white rounded-lg  shadow-lg">
            <header>
                <img class="object-cover w-full h-50" src="{{asset('assets\header.png')}}" alt="Header Photo">
            </header>
            <div class="flex items-center pl-4 mb-4 -mt-12">
                    @if($employeeImage)
                        @php
                            $employee_image = $this->getImage();
                        @endphp
                            <img class="w-20 h-20 border-4 border-white rounded-full " src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="user photo">
                        @else
                            <img class="w-20 h-20 border-4 border-white rounded-full "src="{{ asset( 'assets/defaultuser.png') }}" alt="user photo">
                    @endif
                    {{-- <img class="w-20 h-20 border-4 border-white rounded-full" src="{{asset('assets/header.png')}}" alt="Profile Icon"> --}}
            </div>
            <div class="pl-5 mb-2 text-left">
                <h2 class="text-xl font-semibold text-customGray1">Good {{$period}}, {{$employee_name}}</h2>
            </div>
            <div class="px-5 pb-5 text-sm text-left text-customGray1">
                <p>{{$position}}, {{$department}}</p>
            </div>
        </div>
        <div class="flex flex-col items-center mt-4 overflow-hidden bg-white rounded-lg shadow-lg lg:w-full lg:max-w-lg lg:h-120">
            <div class = "w-full mb-6">
                <div wire:ignore >
                    <div class="flex flex-col mt-5 mb-6 text-center lg-items-center ">
                        <p class="px-20 text-sm font-regular text-customGray1">{{ now()->format('F j, Y') }}</p>
                        <p id="current-time" class="px-20 text-sm text-customGray1 font-regular">{{ now('Asia/Manila')->format('g:i:s A') }}</p>
                        <hr class="my-4 border-gray-300">
                    </div>
                    <div wire:poll.1ms class="flex justify-center w-full px-4 mb-4">
                        <button wire:click.prevent="checkIn" class="flex items-center justify-center px-4 mr-4 text-sm font-medium shadow bg-navButton rounded-10px w-28 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white"
                            @if($timeInFlag) disabled @endif>
                            Time In
                        </button>
                        <button id="check_out" type="submit" class="flex items-center justify-center px-4 text-sm font-medium shadow bg-navButton rounded-10px w-28 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white"
                            @if($timeOutFlag) disabled @endif>
                            Time Out
                        </button>
                    </div>
                </div>
            </div>
            <div wire:poll.1ms  class="grid grid-cols-2 gap-4 px-10 mb-6 text-center">
                <div class="">
                    <p class="text-sm font-medium text-customGray1">Time In:</p>
                    <p class="text-sm font-medium text-customRed">{{$timeIn ?? "N/A"}} </p>
                </div>
                <div class="">
                    <p class="text-sm font-medium text-customGray1">Time Out:</p>
                    <p class="text-sm font-medium text-customRed">{{$timeOut ?? "N/A"}}</p>
                </div>
                <div class="items-center col-span-2 mt-6">
                    <div class="">
                        <p class="text-sm font-medium text-customGray1">Number of Hours:</p>
                        <p class="text-sm font-medium text-customRed">{{$currentTimeIn ?? "N/A"}}</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center mb-6 px-15">
                <a href="{{ route('AttendanceTable') }}" class="w-full">
                    <button class="flex items-center px-3 ml-2 text-sm font-medium shadow bg-navButton w-58 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white"> Generate Daily Log Record </button>
                </a>
            </div>
        </div>
    </div>

    <!-- Center Container -->
    <div class="grid grid-cols-1 gap-4">
        @if ($activities->isEmpty())
            <div class="xl:w-128 pt-5 text-center pb-5 bg-white rounded-lg shadow-lg mb-10 xl:mt-[-45px] mt-[0px]">
                <div class="flex flex-col items-start mb-2">
                    <img class="border-4 border-white w-200 h-200 "src="{{ asset( 'assets/announcement.png') }}" alt="user photo">
                </div>

            </div>
        @else
            @foreach ($activities as $activity)
                <div class="xl:w-full xl:max-w-xl pt-5 text-center bg-white rounded-lg shadow-lg mb-10 xl:mt-[-45px] mt-[0px]">
                    <div class="flex items-center px-6 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 mr-2 text-customGray1">
                            <path d="M5.85 3.5a.75.75 0 0 0-1.117-1 9.719 9.719 0 0 0-2.348 4.876.75.75 0 0 0 1.479.248A8.219 8.219 0 0 1 5.85 3.5ZM19.267 2.5a.75.75 0 1 0-1.118 1 8.22 8.22 0 0 1 1.987 4.124.75.75 0 0 0 1.48-.248A9.72 9.72 0 0 0 19.266 2.5Z" />
                            <path fill-rule="evenodd" d="M12 2.25A6.75 6.75 0 0 0 5.25 9v.75a8.217 8.217 0 0 1-2.119 5.52.75.75 0 0 0 .298 1.206c1.544.57 3.16.99 4.831 1.243a3.75 3.75 0 1 0 7.48 0 24.583 24.583 0 0 0 4.83-1.244.75.75 0 0 0 .298-1.205 8.217 8.217 0 0 1-2.118-5.52V9A6.75 6.75 0 0 0 12 2.25ZM9.75 18c0-.034 0-.067.002-.1a25.05 25.05 0 0 0 4.496 0l.002.1a2.25 2.25 0 1 1-4.5 0Z" clip-rule="evenodd" />
                        </svg>
                        <h2 class="text-base font-semibold text-customGray1">{{ $activity->type }}</h2>
                    </div>
                    <div class="px-8 text-xs text-justify text-customGray">
                        <p class="flex items-center">
                            <span>Published by: {{ $activity->publisher }}</span>
                            <span class="mx-1">•</span>
                            <span>Date and Time Published: {{ $activity->published_date }}</span>
                        </p>
                    </div>
                    @if($activity->poster)
                        <div class="px-4 py-4">
                            <img src="{{ asset('storage/' . $activity->poster) }}" alt="" class="mx-auto rounded-lg shadow-lg py-auto">
                        </div>
                    @endif
                    <div class="my-4 border-t border-gray-300"></div>
                    <div class="px-8 py-2 pb-5 text-justify">
                        <p class="text-xs font-semibold text-customGray1">Subject: {{ $activity->subject }}</p>
                        <p class="mt-2 text-xs text-customGray font-regular">{{ $activity->description }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>




    <!-- Right Side Containers -->
    <div wire:ignore class="flex flex-col lg:items-center items-stretch lg:ml-5 mt-[-45px]">
    <!-- Pending Tasks -->
        <div class="items-stretch mb-4 bg-white rounded-lg shadow-lg lg:w-64">
            <div class="pt-4 pb-4">
                <div class="flex items-center ">
                    <h2 class="ml-4 text-base font-semibold text-customGray1">Tasks Available</h2>
                </div>
                <hr class="my-4 border-gray-300">

                @if ($tasks->isEmpty())
                    <p class="text-sm text-center text-customGray">No pending tasks</p>
                @else
                    <div class="px-4">
                        @foreach ($tasks as $index => $task)
                            <div class="grid grid-cols-12 items-start my-2 gap-y-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="col-span-1 size-6 text-customRed">
                                    <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0 1 18 9.375v9.375a3 3 0 0 0 3-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 0 0-.673-.05A3 3 0 0 0 15 1.5h-1.5a3 3 0 0 0-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6ZM13.5 3A1.5 1.5 0 0 0 12 4.5h4.5A1.5 1.5 0 0 0 15 3h-1.5Z" clip-rule="evenodd" />
                                    <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V9.375ZM6 12a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V12Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 15a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V15Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM6 18a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V18Zm2.25 0a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                                </svg>
                              <a class="col-span-11 ml-4 text-sm text-justify text-customRed line-clamp-3 hover:underline" href="{{ route('MyTasksView', ['index' => $task['form_id']]) }}"> <p >{{ $task->task_title }}</p> </a> 
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('TasksTable') }}" class="-mb-4 flex flex-row-reverse w-auto  text-sm font-medium p-4 text-customRed hover:underline"> View all </a>
                @endif
            </div>
        </div>
        <!-- Quick Actions -->
        <div class="mb-4 bg-white rounded-lg shadow-lg lg:w-64 ">
            <div class="pt-4 pb-4">
                <h2 class="mb-4 ml-4 text-base font-semibold text-customGray1">Quick Actions</h2>
                <hr class="w-full my-4 border-gray-300">
                <!-- Buttons -->
                    <div class="flex flex-col">
                        <a href="{{route('TasksTable')}}"  id="myButton" class="flex items-center justify-center px-4 mb-2 ml-4 mr-4 text-sm font-medium shadow bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
                           My Tasks
                        </a>
                        <a href="{{route('HrTicketsTable')}}"  id="navButton"  class="flex items-center justify-center px-4 mb-2 ml-4 mr-4 text-sm font-medium shadow bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
                            HR Tickets
                        </a>
                        <a href="{{route('ItHelpDeskTable')}}" class="flex items-center justify-center px-4 mb-2 ml-4 mr-4 text-sm font-medium shadow bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
                            IT Helpdesk
                        </a>
                        <a href="{{route('LeaveRequestTable')}}" class="flex items-center justify-center px-4 mb-2 ml-4 mr-4 text-sm font-medium shadow bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
                            Leave Requests
                        </a>
                    </div>
            </div>
        </div>
        <!-- Upcoming Leaves -->
        <div class="mb-4 bg-white rounded-lg shadow-lg lg:w-64">
            <div class="pt-4 pb-4">
                <h2 class="mb-4 ml-4 text-base font-semibold text-customGray1">Upcoming Leaves</h2>
                <hr class="my-4 border-gray-300">

                @if ($leave_requests->isEmpty())
                    <p class="text-sm text-center text-customGray">No pending leaves</p>
                @else
                    <div class="flex flex-col items-center mr-5">
                        @foreach ($leave_requests as $request)
                            <div class="flex items-center my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="ml-5 size-6 text-customRed">
                                    <path d="M12.75 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM7.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM8.25 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM9.75 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM10.5 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM12.75 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM14.25 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 17.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 15.75a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5ZM15 12.75a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM16.5 13.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" />
                                    <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
                                </svg>
                                <a  class="ml-2 flex" href="{{route('LeaveRequestView', ['index' => $request->form_id])}}">
                                    <p class=" text-xs text-center text-customRed">{{ $request->inclusive_start_date }}</p>
                                    <span class="text-xs text-center text-customRed">-</span>
                                    <p class="text-xs text-center text-customRed">{{ $request->inclusive_end_date }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>


        <div id="warning_pop_up" tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
            <div class="relative w-full max-w-md max-h-full p-4">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button id="close-warning_pop_up_x" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form wire:submit.prevent="checkOut" method="POST"  class="p-4 md:p-5">
                        <div class="p-4 text-center md:p-5">
                            <svg class="w-12 h-12 mx-auto mb-4 text-orange-300 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you certain about checking out?</h3>
                            <button type="submit" class="text-white bg-orange-400 hover:bg-orange-700  dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes
                            </button>
                            <button id="close-warning_pop_up_cancel" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-orange-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="toast-container-checkin" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-800 bg-opacity-50">
            <div id="toast-success-checkin" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60 dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="text-sm font-normal ms-3">Checked in successfully!</div>
                <button id="close-toast-checkin" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="toast-container-checkout" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-800 bg-opacity-50">
            <div id="toast-success" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60 dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="text-sm font-normal ms-3">Checked out successfully!</div>
                <button id="close-toast-checkout" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="toast-danger" tabindex="-1" class="fixed z-50 flex items-center justify-center hidden w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="text-sm font-normal ms-3">You have already checked in. Try again tomorrow!</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>

        
        {{-- <div id="toast-warning" tabindex="-1" class="fixed z-50 flex items-center justify-center hidden w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                </svg>
                <span class="sr-only">Warning icon</span>
            </div>
            <div class="text-sm font-normal ms-3">You Have Already Checked In. Try Again Tomorrow</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div> --}}



    </div>


    </div>

    <script>
        function updateTime() {
            const options = { timeZone: 'Asia/Manila', hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' };
            const now = new Date().toLocaleTimeString('en-US', options);
            document.getElementById('current-time').textContent = now;
        }
        setInterval(updateTime, 1000); // Update every second
        updateTime(); // Initial call to display time immediately

        document.addEventListener('DOMContentLoaded', (event) => {
            const updateButton = document.getElementById('check_out');
            const warning_modal = document.getElementById('warning_pop_up');
            // const crud_modal = document.getElementById('crud-modal');
            // const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');

            updateButton.addEventListener('click', (e) => {
                // e.preventDefault();
                warning_modal.classList.remove('hidden');
                // crud_modal.classList.add('hidden');
            });
        });


        const closeWarningButtonX = document.getElementById('close-warning_pop_up_x');
            closeWarningButtonX.addEventListener('click', () => {
                const warning_modal = document.getElementById('warning_pop_up');
                if (warning_modal) {
                    warning_modal.classList.add('hidden');
                }
            });

        const closeWarningButtonCancel = document.getElementById('close-warning_pop_up_cancel');
            closeWarningButtonCancel.addEventListener('click', () => {
                const warning_modal = document.getElementById('warning_pop_up');
                if (warning_modal) {
                    warning_modal.classList.add('hidden');
                }
            });



        document.addEventListener('livewire:init', function () {
            Livewire.on('triggerSuccessCheckIn', () => {
                const toastContainer = document.getElementById('toast-container-checkin');
                const modal = document.getElementById('toast-success-checkin');
                if (toastContainer) {
                    toastContainer.classList.remove('hidden');
                    setTimeout(() => {
                        toastContainer.classList.add('hidden');
                    }, 3000); // Hide after 5 seconds
                }
            });
        });

        const closeToastButtonCheckIn = document.getElementById('close-toast-checkin');
            closeToastButtonCheckIn.addEventListener('click', () => {
                    const closeToastButtonCheckIn = document.getElementById('toast-container-checkin');
                    if (closeToastButtonCheckIn) {
                        closeToastButtonCheckIn.classList.add('hidden');
                    }
        });

        document.addEventListener('livewire:init', function () {
            Livewire.on('triggerSuccessCheckOut', () => {
                const toastContainer = document.getElementById('toast-container-checkout');
                // const modal = document.getElementById('toast-success-checkout');
                const warning_modal = document.getElementById('warning_pop_up');

                if (toastContainer) {
                    toastContainer.classList.remove('hidden');
                    warning_modal.classList.add('hidden');
                    setTimeout(() => {
                        toastContainer.classList.add('hidden');
                    }, 3000); // Hide after 5 seconds
                }
            });
        });

        const closeToastButtonCheckOut = document.getElementById('close-toast-checkout');
            closeToastButtonCheckOut.addEventListener('click', () => {
                    const closeToastButtonCheckOut = document.getElementById('toast-container-checkout');
                    if (closeToastButtonCheckOut) {
                        closeToastButtonCheckOut.classList.add('hidden');
                    }
        });


        // const closeToastButton = document.getElementById('close-toast');
        //     closeToastButton.addEventListener('click', () => {
        //             const toastContainer = document.getElementById('toast-container-checkout');
        //             if (toastContainer) {
        //                 toastContainer.classList.add('hidden');
        //             }
        // });





        // Livewire.on('triggerDangerCheckIn', () => {
        //     // Show the modale
        //     const modal = document.getElementById('toast-danger');
        //     if (modal) {
        //         modal.classList.remove('hidden');

        //         setTimeout(() => {
        //         modal.classList.add('hidden');
        //         }, 5000); // 5000 milliseconds = 5 seconds

        //     }
        // });

        // Livewire.on('triggerWarning', () => {
        //     // Show the modale
        //     const modal = document.getElementById('toast-success');
        //     if (modal) {
        //         modal.classList.remove('hidden');

        //         setTimeout(() => {
        //         modal.classList.add('hidden');
        //         }, 5000); // 5000 milliseconds = 5 seconds

        //     }
        // });


    </script>
