<div  x-init="initFlowbite();" class="p-4 main-content">
    <div class="rounded-lg ">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed ">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg> Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{route('AttendanceTable')}}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 ">Daily Time Record</a>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">Daily Time Record</h2>
        <div class="flex justify-end mt-7">
            <button id="generate-record-btn" class="place-items-end mb-2 font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="inline-block w-4 h-4 mr-2">
                <path d="M5.75 7.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM5 10.25a.75.75 0 1 1 1.5 0 .75.75 0 0 1-1.5 0ZM10.25 7.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM7.25 8.25a.75.75 0 1 1 1.5 0 .75.75 0 0 1-1.5 0ZM8 9.5A.75.75 0 1 0 8 11a.75.75 0 0 0 0-1.5Z" />
                <path fill-rule="evenodd" d="M4.75 1a.75.75 0 0 0-.75.75V3a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2V1.75a.75.75 0 0 0-1.5 0V3h-5V1.75A.75.75 0 0 0 4.75 1ZM3.5 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v4.5a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V7Z" clip-rule="evenodd" />
              </svg>
              Generate Record
            </button>
        </div>
        <div id="date-range-picker" class="flex-col items-center hidden p-5 bg-white rounded-lg shadow-lg">
            <div class="flex w-full mb-4">
                <div class="w-1/2 pr-2">
                    <label for="start-date"  class="block text-sm font-medium text-customGray1">Start Date</label>
                    <input type="date" id="start-date" wire:model="start_date" class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-customRed focus:border-customRed">
                </div>
                <div class="w-1/2 pl-2">
                    <label for="end-date" class="block text-sm font-medium text-customGray1">End Date</label>
                    <input type="date" id="end-date" wire:model="end_date" class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-customRed focus:border-customRed">
                </div>
            </div>
            <div class="flex justify-end w-full mb-4">
                <button  id="cancel-btn" class="text-gray-500 border  hover:bg-gray-400 hover:text-gray-100 font-medium rounded-8px text-sm px-5 py-2.5  shadow">Cancel</button>
                <form wire:submit.prevent="generateRecord" method="POST">
                    <button  type="submit"   id="export-btn" class="font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 ml-2 shadow">Export</button>
                </form>
            </div>
        </div>
    </div> <br>
    <div class="col-span-3 gap-4">
        <div class="w-full col-span-2 p-4 pb-4 bg-white rounded-lg shadow md:p-4 ">
            <div class="flex justify-between">
                <div>
                    <p class="text-2xl font-bold text-customRed " style="word-break: break-word;">Summary</p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-customGreen  text-center">
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid items-center justify-between grid-cols-1 border-t border-gray-200 ">
                <div class="flex items-center justify-between">
                    <!-- Button -->
                    <button
                        id="dropdownDefaultButton"
                        data-dropdown-toggle="lastDaysdropdown"
                        data-dropdown-placement="bottom"
                        class="inline-flex items-center mt-2 text-sm font-medium text-center text-gray-900 hover:text-gray-900 "
                        type="button" >
                        <span class="text-customRed ">{{$chartFilter}}</span>
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown" class="relative z-50 hidden w-20 bg-white divide-y divide-gray-100 rounded-lg shadow ">
                        <ul class="py-2 text-sm text-gray-900 " aria-labelledby="dropdownDefaultButton">
                            <a wire:click.prevent="setFilter('Weekly')" class="block px-4 py-2 cursor-pointer hover:bg-customRed hover:text-white">Weekly</a>
                            <a wire:click.prevent="setFilter('Monthly')" class="block px-4 py-2 cursor-pointer hover:bg-customRed hover:text-white">Monthly</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <br>
    <div class="w-full mt-4  bg-white rounded-t-lg shadow-md" >
        <div class="p-4 overflow-x-auto">
            <div class="inline-block min-w-full box-border">
                <div class="flex flex-wrap pb-1 items-center justify-between w-full  space-y-4 min-[567px]:space-y-0  flex-column sm:flex-row ">
                    <div class="flex space-x-1 overflow-x-auto pl-1" style="padding-bottom: 0.05rem">
 
                    {{-- Phase Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="daysDropdown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 min-w-[80px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-3" type="button">
                        
                        Day {{$dayFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    @php
                        use Carbon\Carbon;
                    
                        $year = $yearFilter; // Dynamically set this as needed
                        $month = $monthFilter; // Dynamically set this as needed
                        // @dd($currentMonth, $monthFilter);
                        // if($month != "all"){
                            $daysInMonth = Carbon::create($yearFilter, $monthFilter != "all" ? $monthFilter : $currentMonth)->daysInMonth;
                        // }
                        // dump($daysInMonth, $year, $month );
                    @endphp
                        
                    <div id="daysDropdown" class="z-50 hidden w-48 mt-2 max-h-60 overflow-y-scroll bg-white divide-y divide-gray-100 rounded-lg shadow">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <label for="dayFilter-radio-all" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="dayFilter-radio-all" type="radio" wire:model.live="dayFilter" value="all" name="dayFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="dayFilter-radio-all" class="cursor-pointer"> &nbsp; All </label>
                                </label>
                            </li>
                            @for ($day = 1; $day <= $daysInMonth; $day++)
                                <li>
                                    <label for="dayFilter-radio-{{ $day }}" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                        <input id="dayFilter-radio-{{ $day }}" type="radio" wire:model.live="dayFilter" value="{{ $day }}" name="dayFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                        <label for="dayFilter-radio-{{ $day }}" class="cursor-pointer"> &nbsp; Day {{ $day }} </label>
                                    </label>
                                </li>
                            @endfor
                        </ul>
                    </div>

                    {{-- Month Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="monthDropdown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 min-w-[80px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-3" type="button">
                        {{-- <svg class="w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"/>
                        </svg>
                        --}}
                        {{$monthFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Month Dropdown menu -->
                    <div id="monthDropdown" class="z-50 hidden w-48 mt-2 max-h-60 overflow-y-scroll bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <label for="monthFilter-radio-12" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-12" type="radio" wire:model.live="monthFilter" value="all" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-12" class="cursor-pointer"> &nbsp; All </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-0" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-0" type="radio" wire:model.live="monthFilter" value="1" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-0" class="cursor-pointer"> &nbsp; January </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-1" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-1" type="radio" wire:model.live="monthFilter" value="2" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-1" class="cursor-pointer"> &nbsp; February </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-2" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-2" type="radio" wire:model.live="monthFilter" value="3" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-2" class="cursor-pointer"> &nbsp; March </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-3" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-3" type="radio" wire:model.live="monthFilter" value="4" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-3" class="cursor-pointer"> &nbsp; April </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-4" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-4" type="radio" wire:model.live="monthFilter" value="5" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-4" class="cursor-pointer"> &nbsp; May </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-5" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-5" type="radio" wire:model.live="monthFilter" value="6" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-5" class="cursor-pointer"> &nbsp; June </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-6" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-6" type="radio" wire:model.live="monthFilter" value="7" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-6" class="cursor-pointer"> &nbsp; July </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-7" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-7" type="radio" wire:model.live="monthFilter" value="8" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-7" class="cursor-pointer"> &nbsp; August </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-8" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-8" type="radio" wire:model.live="monthFilter" value="9" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-8" class="cursor-pointer"> &nbsp; September </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-9" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-9" type="radio" wire:model.live="monthFilter" value="10" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-9" class="cursor-pointer"> &nbsp; October </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-10" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-10" type="radio" wire:model.live="monthFilter" value="11" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-10" class="cursor-pointer"> &nbsp; November </label>
                                </label>
                            </li>
                            <li>
                                <label for="monthFilter-radio-11" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="monthFilter-radio-11" type="radio" wire:model.live="monthFilter" value="12" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="monthFilter-radio-11" class="cursor-pointer"> &nbsp; December </label>
                                </label>
                            </li>
                        </ul>
                    </div>

                    {{-- Year Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="yearDropDown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 min-w-[40px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-3" type="button">
                        {{-- <svg class="w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                        </svg> --}}
                        {{$yearFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="yearDropDown" class="z-50 hidden w-48 mt-2 max-h-60 overflow-y-scroll bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <!-- All option -->
                            {{-- <li>
                                <label for="yearFilter-radio-all" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                    <input id="yearFilter-radio-all" type="radio" wire:model.live="yearFilter" value="all" name="yearFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                    <label for="yearFilter-radio-all" class="cursor-pointer"> &nbsp; All </label>
                                </label>
                            </li> --}}
                            <!-- Dynamic years -->
                            <?php
                            $currentYear = 2024; // Set to the current year or desired starting year
                            for ($year = $currentYear; $year >= 1999; $year--) {
                                echo '<li>
                                        <label for="yearFilter-radio-' . $year . '" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="yearFilter-radio-' . $year . '" type="radio" wire:model.live="yearFilter" value="' . $year . '" name="yearFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="yearFilter-radio-' . $year . '" class="cursor-pointer"> &nbsp; ' . $year . ' </label>
                                        </label>
                                    </li>';
                            }
                            ?>
                        </ul>
                    </div>

                    </div>
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative max-[567px]:pl-1  ">
                        <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                            <svg class="w-5 h-5 text-gray-900" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" wire:model.live.debounce.250ms="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 bg-gray-50 focus:ring-customRed focus:border-customRed border-text w-full max-[567px]:w-282 lg:w-full xl:w-full"  placeholder="Search like: 2024-01-01">
                    </div>
                </div>
            </div>
        </div>
</div>
<div id="data-table" class="relative overflow-x-auto">
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
                            <div class="flex max-[600px]:justify-start pl-14 md:pl-0 justify-center items-center" style="padding-top: 40px">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <p class="text-xl font-semibold text-customRed">Nothing to show</p>
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
                            @else
                                {{-- @dd($data->late) --}}
                                @if ($data->late == 1)
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-customRed rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                        Late & {{$data->type ?? 'No Time Out'}}
                                    </span>
                                @else
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-gray-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                        {{$data->type ?? 'No Time Out'}}
                                    </span>
                                @endif

                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ Illuminate\Support\Carbon::parse($data->attendance_date)->format('l') }}
                        </td>
                        @php
                            $timeIn = \Carbon\Carbon::parse($data->time_in);
                            $timeOut = \Carbon\Carbon::parse($data->time_out);
                            if($timeIn->isSameDay($timeOut)){
                                $timeIn = $timeIn->format('H:i:s');
                                $timeOut = $timeOut->format('H:i:s');
                            }
                        @endphp
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{ $timeIn }}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{ $timeOut }}
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
<div wire:loading wire:target="generateRecord" class="load-over z-50">
    <div wire:loading wire:target="generateRecord" class="loading-overlay">
        <div class="flex flex-col justify-center items-center">
            <div class="spinner"></div>
            <p>Exporting your Records...</p>
        </div>
    </div>
</div>

<div wire:loading wire:target="electedDate, dayFilter, monthFilter, yearFilter, search" class="fixed inset-x-0 top-1/4 flex justify-center pointer-events-none z-50">
    <div class="z-50 mt-4">
        <div id="toast-container" class="flex items-center justify-center w-full h-full">
            <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 border-6 border-white text-customRed bg-white bg-opacity-90 rounded-lg shadow"
                style="top: 90px; left: 50%; transform: translateX(-50%); z-index: 60;"
                role="alert">
                <div role="status">
                    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-customRed" viewBox="0 0 100 101" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
                <div class="text-sm font-normal ms-3 text-center">Updating Table</div>
            </div>
        </div>
    </div>
</div>
{{-- <style>
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
        top: 40%;
        left: 0;
        width: 100%;
        height: 100%;
        
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

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .loading-overlay p {
        margin: 0;
        font-size: 18px;
        font-weight: bold;
    }
</style> --}}
<div  class="w-full p-4 overflow-x-auto bg-gray-100 rounded-b-lg">
    {{ $DtrData->links(data : ['scrollTo' => false])}}
</div>

<script>
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
    document.getElementById('generate-record-btn').addEventListener('click', function() {
        document.getElementById('date-range-picker').classList.toggle('hidden');
    });

    document.getElementById('cancel-btn').addEventListener('click', function() {
        document.getElementById('date-range-picker').classList.add('hidden');
    });

    // document.getElementById('export-btn').addEventListener('click', function() {
    //     // Handle export functionality here
    //     alert('Exporting data...');
    // });

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
        }
    };

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
                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    min: 1,
                    max: 12,
                },
                yaxis: {
                    min: 1,
                    max: 31
                }
            })
        })
    });

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
    });
</script>
