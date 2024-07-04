<div class="p-4 main-content">
    <div class="rounded-lg dark:border-gray-700">
        <nav class="flex mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed dark:text-gray-400 dark:hover:text-white">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('AttendanceTable')}}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Daily Time Record</a>
                </div>
            </li>
            {{-- <li aria-current="page">
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="text-sm font-medium text-gray-500 ms-1 md:ms-2 dark:text-gray-400">Flowbite</span>
                </div>
            </li> --}}
            </ol>
        </nav>
        <h2 class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Daily Time Record</h2>

        <div class="flex justify-end mt-4">
            <button id="open-modal" class="text-customRed bg-navButton mb-2 hover:bg-customRed hover:text-white font-medium rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                Generate Record
            </button>
        </div>
        
        <!-- Change Status Modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50">
            <div class="relative w-full max-w-md p-4">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Change Status</h3>
                        <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" id="close-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5">
                        <form wire:submit.prevent="generateRecord" method="POST">
                            <div class="grid grid-cols-1 gap-4 mb-4  ">

                            <div  class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700  ">
                                <div id="start_date_container" class="w-full justify-center">
                                    <label for="start_date"
                                        class="block  mb-2 text-sm font-semibold text-gray-900 dark:text-white ">Start Date<span class="text-red-600">*</span></label>
                                    <input type="date" name="start_date" id="start_date" wire:model="start_date" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="" >
                                    @error('start_date')
                                        <div class="transition transform alert alert-danger text-sm"
                                        x-data x-init="document.getElementById('start_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('start_date_container').focus();" >
                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                        </div> 
                                    @enderror       
                                </div>
                                <div id="end_date_container" class="w-full justify-center">
                                    <label for="end_date"
                                        class="block  mb-2 text-sm font-semibold text-gray-900 dark:text-white ">End Date<span class="text-red-600">*</span></label>
                                    <input type="date" name="end_date" id="end_date" wire:model="end_date" 
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                    @error('end_date')
                                        <div class="transition transform alert alert-danger text-sm"
                                        x-data x-init="document.getElementById('end_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('end_date_container').focus();" >
                                            <span class="text-red-500 text-xs" > {{$message}}</span>
                                        </div> 
                                    @enderror       
                                </div>
                            </div>
                               
                                <button type="submit" class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white ring-1 ring-customRed shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-end">
                                    Update
                                </button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        
        <script>

            document.addEventListener('livewire:init', function () {
                            Livewire.on('triggerClose', () => {
                                closeModal();
                            });
                        });

            document.getElementById('open-modal').addEventListener('click', function() {
                const modal = document.getElementById('crud-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
            
            document.getElementById('close-modal').addEventListener('click', function() {
                closeModal();
            });
            
            // document.getElementById('update-button').addEventListener('click', function() {
            //     closeModal();
            // });
            
            function closeModal() {
                const modal = document.getElementById('crud-modal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        </script>
        

    </div>
    <br>
    <div class="col-span-3 gap-4">
    <div class="w-full col-span-2 p-4 pb-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-4 ">
        <div class="flex justify-between">
        <div>
            <p class="text-2xl font-bold text-customRed dark:text-gray-400" style="word-break: break-word;">Summary</p>
        </div>
        <div
            class="flex items-center px-2.5 py-0.5 text-base font-semibold text-customGreen dark:text-customGreen text-center">
            <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
            </svg>
        </div>
        </div>
        <div id="area-chart"></div>
        <div class="grid items-center justify-between grid-cols-1 border-t border-gray-200 dark:border-gray-700">
        <div class="flex items-center justify-between" >
            <!-- Button -->
            <button
            id="dropdownDefaultButton"
            data-dropdown-toggle="lastDaysdropdown"
            data-dropdown-placement="bottom"
            class="inline-flex items-center mt-2 text-sm font-medium text-center text-gray-900 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white"
            type="button" >
            <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="lastDaysdropdown" class="z-50 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-900 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a wire:click.prevent="setFilter('weekly')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Weekly</a>
                </li>
                <li>
                    <a wire:click.prevent="setFilter('monthly')" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Yearly</a>
                </li>
                </ul>
            </div>
    
        </div>
        </div>
    </div>
    </div>
    <br>


    <!-- Modal toggle -->
    {{-- <div class="grid grid-cols-1 mb-4">
    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block  text-white bg-indigo-800 hover:bg-indigo-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-end" type="button">
        Export DTR
    </button>
    </div> --}}
    <!-- Main modal -->
    {{-- <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Choose Months  <br>(Multiple is allowed | Max:12)
                </h3>
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="crud-modal-form" class="p-4 md:p-5">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Months</label>
                        <select multiple style="width:100%" class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @php
                                $ctr = 0;
                            @endphp
                            <optgroup label="" >  </optgroup>
                            <optgroup label="Current Year" ></optgroup>
                            @foreach($options as $value => $label)
                                @if ($ctr == $currentMonth)
                                    <optgroup label="" > Previous Years </optgroup>
                                    <optgroup label="Previous Years" > Previous Years </optgroup>
                                @endif
                                <option value="{{ $value }}">{{ $label }}</option>
                                @php
                                    $ctr++;
                                @endphp
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="button" wire:click.prevent="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-end">
                    Export
                </button>
            </form>
        </div>
    </div>
    </div>   --}}
    {{-- <script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option',
            closeOnSelect: false,
        }).on('change', function() {
            let data = $(this).val();
            console.log(data);
            @this.dateChosen = data;
        });
    
        // Toggle modal visibility when form submission is completed
        Livewire.on('formSubmitted', () => {
            $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
        });
    });
    </script> --}}
    <br>
    <div class="overflow-x-auto bg-white rounded-t-lg shadow-md ">
        <div class="flex flex-wrap items-center justify-between p-4 pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
            <div>
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="z-50 inline-flex items-center shadow h-10 p-2 focus:ring-1 focus:border-1 focus:ring-customRed focus:border-customRed font-medium text-sm px-3 py-1.5 bg-navButton text-gray-900 rounded-8px hover:bg-customRed hover:text-white" type="button">
                    <svg class="w-3 h-3 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                    </svg>
                    {{$filterName}}
                    <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownRadio" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                {{-- <div class="top-0 right-0 z-50 hidden mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700" id="dropdownRadio"> --}}
                    <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                        <li>
                            <div class="flex items-center p-2 bg-navButton w-55 h-7 text-activeButton rounded-8px hover:bg-customRed hover:text-white">
                                <input id="filter-radio-example-1" type="radio" wire:model.live="filter" value="0" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-customRed dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; All </input>
                                {{-- <label for="filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300" >All</label> --}}
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                <input id="filter-radio-example-1" type="radio" wire:model.live="filter" value="1" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp;  Today </input>
                                {{-- <label for="filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300" >Last day</label> --}}
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                <input checked="" id="filter-radio-example-2" type="radio" wire:model.live="filter" value="2" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-customRed dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp;  Last 7 days </input>
                                {{-- <label for="filter-radio-example-2" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last 7 days</label> --}}
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                <input id="filter-radio-example-3" type="radio" wire:model.live="filter" value="3" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-customRed dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; Last 30 days   </input>
                                {{-- <label for="filter-radio-example-3" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last 30 days</label> --}}
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                <input id="filter-radio-example-4" type="radio" wire:model.live="filter" value="4" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-customRed dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp;  Last 6 Months </input>
                                {{-- <label for="filter-radio-example-4" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last 6 Months</label> --}}
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                <input id="filter-radio-example-5" type="radio" wire:model.live="filter" value="5" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-customRed dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp;  Last year</input>
                                {{-- <label for="filter-radio-example-5" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last year</label> --}}
                            </div>
                        </li>
                    </ul>
                    </div>
                </div>
        
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                        <svg class="w-5 h-5 text-customGray1 dark:text-customGray" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" wire:model.live="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 w-80 bg-gray-50 focus:ring-customRed focus:border-customRed dark:bg-customGray dark:border-customGray border-text dark:placeholder-customGray dark:text-white dark:focus:ring-customRed dark:focus:border-customRed" placeholder="Search like: 2024-01-01 ">
        
                </div>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full pb-4 text-sm text-left text-gray-500 rtl:text-right ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center"> No. </th>
                        <th scope="col" class="px-6 py-3 text-center"> Date </th>
                        <th scope="col" class="px-6 py-3 text-center"> Type </th>
                        <th scope="col" class="px-6 py-3 text-center"> Day of the Week </th>
                        <th scope="col" class="px-6 py-3 text-center"> Time In </th>
                        <th scope="col" class="px-6 py-3 text-center"> Time Out </th>
                        <th scope="col" class="px-6 py-3 text-center"> Undertime </th>
                        <th scope="col" class="px-6 py-3 text-center"> Overtime </th>
                    </tr>
                </thead>
                <div>
                    <div wire:ignore>
                        <tbody class="pb-4">
                            @if ($DtrData->isEmpty())
                            <tr class="bg-white border-b hover:bg-gray-50 ">
                                <th scope="col" colspan="8" class="justify-center" style="padding-bottom: 40px">
                                    <div class="flex justify-center " style="padding-top: 40px">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mt-1 mr-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                        <p class="items-center text-xl font-semibold text-customRed "> Nothing to show</p>
                                    </div>
                                </th>
                            </tr>
                            @else
                            <div>
                                @php
                                    $ctr = 0;
                                    $pageIndex = ($DtrData->currentpage() - 1) * $DtrData->perpage() + $ctr ;
                                @endphp
                            </div>
                            @foreach ($DtrData as $index =>$data)
                            <div>
                                @php
                                    $ctr = $ctr + 1;
                                @endphp
                            </div>
                            <tr class="bg-white border-b hover:bg-gray-50 ">
                                <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
                                    {{$pageIndex + $ctr}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                        {{$data->attendance_date }}
                                    </span>
                                </th>
                                @php
        
                                @endphp
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    @if ($data->type == "Wholeday")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                            {{$data->type}}
                                        </span>
                                    @elseif ($data->type == "Overtime")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-blue-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                            {{$data->type}}
                                        </span>
                                    @elseif ($data->type == "Undertime")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-red-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                            {{$data->type}}
                                        </span>
                                    @elseif ($data->type == "Half-Day")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                            {{$data->type}}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-center">
                                    {{ Illuminate\Support\Carbon::parse($data->attendance_date)->format('l') }}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{$data->time_in}}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{$data->time_out}}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{$data->undertime}}
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap">
                                    {{$data->overtime}}
                                </td>
                            </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </div>
                </div>
            </table>
        </div>
        <div class="w-full p-4 overflow-x-auto bg-gray-100 rounded-b-lg">
            {{ $DtrData->links()}}
        </div>
    </div>
    </div>
    </div>
    
<script>
    const options = {
    chart: {
    height: "100%",
    maxHeight: "100%",
    maxWidth: "100%",
    type: "area",
    fontFamily: "Inter, sans-serif",
    animations: {
        enabled: false,
    },
    padding: {
        // left: 100, // Adjust the left padding to create more space for the y-axis labels
        // right: 50, // Adjust the right padding if needed
        // top: 20, // Adjust the top padding if needed
        // bottom: 20 // Adjust the bottom padding if needed
    },
    dropShadow: {
        enabled: false,
    },
    toolbar: {
        show: false,
    },
    },
    tooltip: {
    enabled: true,
    x: {
        show: true,
    },
    },
    fill: {
    type: "gradient",
    gradient: {
        opacityFrom: 0.55,
        opacityTo: 0,
        shade: "#A90024",
        gradientToColors: ["#A90024"],
    },
    },
    dataLabels: {
    enabled: false,
    },
    stroke: {
    width: 6,
    },
    grid: {
    show: true,
    strokeDashArray: 4,
    padding: {
        left: 20,
        right: 0,
        bottom: 0,
        top: 0
    },
    },
    tooltip: {
        enabled: true,
    },
    series: [
    {
        name: "Weekly Count",
        data: @json($data),
        color: "#A90024",
    },
    ],
    yaxis: {
        labels: {
        show: true,
        },
        min: 1,
        max: 7,
        axisBorder: {
        show: true,
        },
        axisTicks: {
        show: true,
        }
    },
    xaxis: {
    categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
    labels: {
        show: true,
    },
    beginAtZero: true,
        min: 1,
        max: 5,
    axisBorder: {
        show: true,
    },
    axisTicks: {
        show: true,
    }
    },
    }
    
    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();
    
    document.addEventListener('livewire:init', () => {
        Livewire.on('refresh-monthly-chart', (chartData) => {
        chart.updateSeries([{
            name: "Monthly Count",
            data: chartData.data,
        }])
        chart.updateOptions({
            xaxis: {
            categories: ['January',
                            'February',
                            'March',
                            'April',
                            'May',
                            'June',
                            'July',
                            'August',
                            'September',
                            'October',
                            'November',
                            'December'],
            min: 1,
            max: 12,
            },
            yaxis: {
            min: 1,
            max: 31
            }
        })
        })
    })
    document.addEventListener('livewire:init', () => {
        Livewire.on('refresh-weekly-chart', (chartData) => {
        chart.updateSeries([{
            name: "Weekly Count",
            data: chartData.data,
        }])
        chart.updateOptions({
            xaxis: {
            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            min: 1,
            max: 5,
            },
            yaxis: {
            min: 1,
            max: 7
            }
        })
        })
    })
    
</script>

