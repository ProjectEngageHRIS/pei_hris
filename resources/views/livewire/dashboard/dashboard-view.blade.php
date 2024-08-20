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
            <div class ="w-full mb-6" x-data="{checkOut: false}">
                <div wire:ignore>
                    <div class="flex flex-col mt-5 mb-6 text-center lg-items-center ">
                        <p class="px-20 text-sm font-regular text-customGray1">{{ now()->format('F j, Y') }}</p>
                        <p id="current-time" class="px-20 text-sm text-customGray1 font-regular">{{ now('Asia/Manila')->format('g:i:s A') }}</p>
                        <hr class="my-4 border-gray-300">
                    </div>
                    @if ($leaveIndicator)
                        
                    <div class="flex justify-center w-full px-4 mb-4">
                        <p class=" text-base text-center ">You are currently on <br> <span class="font-semibold text-customRed"> {{$leaveIndicator}}</span>. <br> It is recommended to not  <br> time in and out  <br> during the period </p>
                    </div>
                    @endif
            
                    <div wire:poll.1ms class="flex justify-center w-full px-4 mb-4">
                        <button wire:click.once="checkInLocation" class="flex items-center justify-center px-4 mr-4 text-sm font-medium shadow bg-navButton rounded-10px w-28 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white"
                            @if($timeInFlag ) disabled style="cursor: not-allowed;" @endif>
                            Time In
                        </button>
                        <button @click="checkOut = true" class="flex items-center justify-center px-4 text-sm font-medium shadow bg-navButton rounded-10px w-28 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white"
                            @if($timeOutFlag ) disabled style="cursor: not-allowed;" @endif>
                            Time Out
                        </button>
                    </div>
                </div>
                <script>
                document.addEventListener('livewire:init', function () {
                    Livewire.on('triggerLocationCheckIn', (itemId) => {
                        Livewire.dispatch('startLoading');
                        if (navigator.geolocation) {
                            getLocation(0); // Start with 0 retries
                            @this.loading = true;
                        } else {
                            console.error("Geolocation is not supported by this browser.");
                        }
                    });

                    function getLocation(retries) {
                        navigator.geolocation.getCurrentPosition(
                            function(position) {
                                var latitude = position.coords.latitude;
                                var longitude = position.coords.longitude;
                                var accuracy = position.coords.accuracy;

                                console.log(`Latitude: ${latitude}, Longitude: ${longitude}, Accuracy: ${accuracy} meters`);

                                if (accuracy > 100 && retries < 3) { // Retry if accuracy is poor and retries are less than 3
                                    console.warn('Poor accuracy, retrying geolocation...');
                                    setTimeout(() => getLocation(retries + 1), 5000); // Retry after 5 seconds
                                } else {
                                    // Proceed with the best available location
                                    console.log(accuracy > 100 ? 'Accuracy remains poor, using best available location.' : 'Good accuracy, using current location.');
                                    getAddressFromCoordinates(latitude, longitude);
                                }
                            },
                            function(error) {
                                console.error("Geolocation error:", error);
                            },
                            {
                                enableHighAccuracy: true,
                                timeout: 10000, // Timeout after 10 seconds
                                maximumAge: 0 // No cached position
                            }
                        );
                    }

                    function getAddressFromCoordinates(lat, lng) {
                        var url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&addressdetails=1`;

                        fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            if (data && data.address) {
                                var address = [
                                    data.address.road, 
                                    data.address.city || data.address.town || data.address.village,
                                    data.address.state,
                                    data.address.country
                                ].filter(Boolean).join(', ');

                                console.log('Address:', address);
                                // Update Livewire component with address data
                                Livewire.dispatch('checkInLocation', {
                                    // latitude: lat,
                                    // longitude: lng,
                                    address: address
                                });
                                // Use the address in your application
                            } else {
                                console.error('Geocoding error:', data);
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                    }
                });
                </script>



            <div x-cloak  x-ref="checkout-modal" 
                x-show="checkOut" 
                @keydown.window.escape="open = false" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                tabindex="-1" 
                class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                id="checkout-modal">
                <div x-show="checkOut" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="transform opacity-0 scale-90"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-90"
                        class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" @click="checkOut = false"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5">
                        <div class="text-center">
                                <svg class="w-12 h-12 mx-auto mb-4 text-orange-300 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you certain about Checking Out?</h3>
                            <button wire:click.once="checkOutLocation" class="text-white bg-orange-600 hover:bg-orange-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Yes
                            </button>
                            <button @click="checkOut = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                No
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
document.addEventListener('livewire:init', function () {
    Livewire.on('triggerLocationCheckOut', (itemId) => {
        Livewire.dispatch('startLoading');
        if (navigator.geolocation) {
            watchLocation(0); // Start watching location with 0 retries
            @this.loading = true;
        } else {
            console.error("Geolocation is not supported by this browser.");
        }
    });

    function watchLocation(retries) {
        let watchId;
        let bestAccuracy = Infinity;

        watchId = navigator.geolocation.watchPosition(
            function(position) {
                const { latitude, longitude, accuracy } = position.coords;

                console.log(`Latitude: ${latitude}, Longitude: ${longitude}, Accuracy: ${accuracy} meters`);

                if (accuracy < bestAccuracy) {
                    bestAccuracy = accuracy;
                    // Fetch the address immediately with the improved accuracy
                    getAddressFromCoordinates(latitude, longitude);
                }

                if (accuracy < 50 || retries >= 3) { // Stop if accuracy is below 50 meters or retries are exhausted
                    console.log('Stopping watchPosition due to sufficient accuracy or retries.');
                    navigator.geolocation.clearWatch(watchId); // Stop watching position
                } else {
                    console.warn('Accuracy still not sufficient, continuing to watch for better accuracy...');
                    retries++;
                }
            },
            function(error) {
                console.error("Geolocation error:", error);
                navigator.geolocation.clearWatch(watchId); // Stop watching if there's an error
            },
            {
                enableHighAccuracy: true,
                timeout: 10000, // Timeout for each position update attempt
                maximumAge: 0 // No cached position
            }
        );
    }

    function getAddressFromCoordinates(lat, lng) {
        const url = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&addressdetails=1`;

        fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.address) {
                const address = [
                    data.address.road, 
                    data.address.city || data.address.town || data.address.village,
                    data.address.state,
                    data.address.country
                ].filter(Boolean).join(', ');

                console.log('Address:', address);
                // Update Livewire component with address data
                Livewire.dispatch('checkOutLocation', {
                    address: address
                });
            } else {
                console.error('Geocoding error:', data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});


            </script>

            <style>
            .load-over {
                position: fixed;
                background: rgba(255, 255, 255, 0.8);
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .loading-overlay {
                position: fixed;
                top: 0; /* Start from the top */
                left: 0;
                width: 100%;
                height: 100%; /* Cover the full height of the viewport */
                
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                font-family: Arial, sans-serif;
                color: #AC0C2E;
                pointer-events: none; /* Makes sure the overlay is not interactable */
            }

            .spinner {
                border: 8px solid rgba(172, 12, 46, 0.3);
                border-top: 8px solid #AC0C2E;
                border-radius: 50%;
                width: 60px;
                height: 60px;
                animation: spin 1s linear infinite;
                margin-bottom: 20px; /* Adjust margin to add space between spinner and text */
            }

                        </style>

            <!-- Loading screen -->
            <div x-show="loading" x-data="{ loading: false, action: '' }"
                x-init="$wire.on('startLoading', event => { loading = true; action = event.action }); $wire.on('stopLoading', () => loading = false);">
                <div class="load-over z-50">
                    <div class="loading-overlay z-50">
                        <div class="flex flex-col items-center justify-center">
                            <div class="spinner"></div>
                            <p x-text="action ? 'Processing ' + action + '...' : 'Loading...'"></p>
                        </div>
                    </div>
                </div>
            </div>

            </div>
                <div  class="grid grid-cols-2 gap-4 px-10 mb-6 text-center">
                    <div class="">
                        <p class="text-sm font-medium text-customGray1">Time In:</p>
                        <p class="text-sm font-medium text-customRed">{{$timeIn ? $timeIn->format('h:i:s A') : "N/A"}} </p>
                    </div>
                    <div class="">
                        <p class="text-sm font-medium text-customGray1">Time Out:</p>
                        <p class="text-sm font-medium text-customRed">{{$timeOut ? $timeOut->format('h:i:s A') : "N/A"   }}</p>
                    </div>
                    <div  class="items-center col-span-2 mt-6">
                        <div class="">
                            <p class="text-sm font-medium text-customGray1">Number of Hours:</p>
                            @if ($timeIn && $timeOut)
                                <p class="px-20 text-sm text-customGray1 font-regular">{{$timeDifference}}</p>
                            @elseif($timeIn)
                                <p id="time-difference" data-time-in="{{$timeIn}}" class="px-20 text-sm text-customGray1 font-regular"></p>
                            @else
                                <p class="px-20 text-sm text-customGray1 font-regular">N/A</p>
                            @endif
                            
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
                        <p class="flex flex-col sm:flex-row items-center">
                            <span class="sm:mr-2">Published by: {{ $activity->publisher }}</span>
                            <span class="hidden sm:inline mx-1">•</span>
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
                        {{-- <a href="{{route('TasksTable')}}"  id="myButton" class="flex items-center justify-center px-4 mb-2 ml-4 mr-4 text-sm font-medium shadow bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
                           My Tasks
                        </a> --}} 
                        <a href="#" @click="getLocalStorage"  id="myButton" class="flex items-center justify-center px-4 mb-2 ml-4 mr-4 text-sm font-medium shadow bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
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
                    {{-- <script>
                        function getLocalStorage(){
                            let deviceId = localStorage.getItem('device_id');
                            
                            // Generate a unique ID, e.g., using a UUID library
                            // deviceId = generateUniqueId(); // Implement this function
                            // localStorage.setItem('device_id', deviceId);
                            alert(deviceId )
                        }
                        // Example function to generate a unique ID
                        function generateUniqueId() {
                            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                                var r = Math.random() * 16 | 0, v = c === 'x' ? r : (r & 0x3 | 0x8);
                                return v.toString(16);
                            });
                        }
                    </script> --}}
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




        <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                @trigger-success-checkin.window="showToast = true; toastType = 'success'; toastMessage = 'Checked In Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
                @trigger-success-checkout.window="showToast = true; toastType = 'success'; toastMessage = 'Checked Out Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
                @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)">
            <div id="toast-container" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50" x-show="showToast">
            <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60" role="alert"
                x-show="showToast"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
            <div :class="{'text-green-500 bg-green-100': toastType === 'success', 'text-red-500 bg-red-100': toastType === 'error'}" class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 rounded-lg">
                <svg x-show="toastType === 'success'" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <svg x-show="toastType === 'error'" class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 18a8 8 0 1 0-8-8 8 8 0 0 0 8 8Zm-1-13a1 1 0 1 1 2 0v6a1 1 0 0 1-2 0V5Zm0 8a1 1 0 1 1 2 0v.01a1 1 0 0 1-2 0V13Z"/>
                </svg>
                <span class="sr-only" x-text="toastType === 'success' ? 'Success' : 'Error'"></span>
            </div>
            <div class="text-sm font-normal ms-3" x-text="toastMessage"></div>
            <button id="close-toast" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" aria-label="Close" @click="showToast = false">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
                </div>
            </div>
        </div>

        {{-- <div id="toast-container-checkin" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-800 bg-opacity-50">
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
        </div> --}}

        
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

        const timeInElement = document.getElementById('time-difference');
        const timeInString = timeInElement.getAttribute('data-time-in');

        if (timeInString) {
            // Ensure timeInString is in the format "HH:MM:SS" if using only time
            const [hours, minutes, seconds] = timeInString.split(' ')[1].split(':').map(Number);

            // Create a Date object for timeInDate with today's date
            const nowManilaDate = new Date();
            const timeInDate = new Date(nowManilaDate);
            timeInDate.setHours(hours, minutes, seconds, 0);

            // Calculate the difference in milliseconds
            const differenceInMilliseconds = nowManilaDate - timeInDate;

            // Convert to hours, minutes, and seconds
            const diffHours = Math.floor(differenceInMilliseconds / (1000 * 60 * 60));
            const diffMinutes = Math.floor((differenceInMilliseconds % (1000 * 60 * 60)) / (1000 * 60));
            const diffSeconds = Math.floor((differenceInMilliseconds % (1000 * 60)) / 1000);

            // Format the difference as hh:mm:ss
            const formattedDifference = `${String(diffHours).padStart(2, '0')}:${String(diffMinutes).padStart(2, '0')}:${String(diffSeconds).padStart(2, '0')}`;
            document.getElementById('time-difference').textContent = formattedDifference;
        } else {
            // document.getElementById('time-difference').textContent = ;
            console.error('timeInString is undefined or null');
        }
    }

    // Call the updateTime function every second for smooth updates
    function updateTimeSmooth() {
        updateTime();
        requestAnimationFrame(updateTimeSmooth);
    }

    document.addEventListener('DOMContentLoaded', () => {
        requestAnimationFrame(updateTimeSmooth);
    });

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success-checkout'));
            const modal = document.querySelector(`[x-ref="checkout-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.checkOut = false; // Open the modal
        });
        Livewire.on('triggerError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="checkout-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.checkOut = false; // Open the modal
        });
    });


    

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


      


    </script>
