<div  class="p-4 main-content">
    <div class="rounded-lg ">
        <nav class="flex mb-2" aria-label="Breadcrumb">
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
        <h2 class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl ">Daily Time Record</h2>
        <div x-data="{ showModal: false }" @keydown.escape.window="showModal = false">
            <div class="flex justify-end mt-4">
                <button id="generate-record-btn" @click="showModal = true" class="place-items-end mb-2 font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                    <!-- Button Content -->
                    Generate Record
                </button>
            </div>
        
            <!-- Modal Background Overlay -->
            <div x-cloak x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 z-40" @click="showModal = false"></div>
        
            <!-- Modal -->
            <div x-cloak x-show="showModal" x-transition class="fixed inset-0 z-50 flex items-center justify-center">
                <div class="relative w-full max-w-md p-4 bg-white rounded-lg shadow">
                    <!-- Modal content -->
                    <div class="relative h-full">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Generate Record
                            </h3>
                            <button type="button" @click="showModal = false" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4  max-h-[450px]">
                            <form wire:submit.prevent="generateRecord" method="POST">
                                <select id="selectedEmployee" name="selectedEmployee" wire:model.live="selectedEmployee"
                                    class="bg-gray-50 shadow-inner border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                    <option value="All">All</option>
                                    @foreach($employeeNames as $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                <div>
                                    <label for="timein" class="block mb-2 text-sm font-medium text-customGray1">Date From <span class="text-red-600">*</span></label>
                                    <input type="date" name="timein" id="timein" wire:model.live="start_date" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                </div>
                                <div>
                                    <label for="timeout" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Date To <span class="text-red-600">*</span></label>
                                    <input type="date" name="timeout" id="timeout" wire:model.live="end_date" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                </div>
                                <div class="flex justify-end w-full mt-4 mb-4">
                                    <button id="cancel-btn" @click="showModal = false" type="button" class="text-gray-500 border hover:bg-gray-400 hover:text-gray-100 font-medium rounded-8px text-sm px-5 py-2.5 shadow">Cancel</button>
                                    <button type="submit" class="font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 ml-2 shadow">Export</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
            
    </div> <br>
        
    <div class="col-span-3 gap-4">
        <div class="overflow-x-auto">
            <div class="flex flex-col w-full gap-4 p-4 bg-white rounded-lg shadow h-fit min-w-[1024px]">
                <div class="flex items-center space-x-2">
                    <p class="text-sm font-semibold">Today is</p>
                    <p class="text-sm font-semibold text-customRed">{{ now()->format('F j, Y') }}</p>
                    <p class="text-sm font-semibold">|</p>
                    <p id="current-time" class="text-sm font-semibold text-customRed">{{ now('Asia/Manila')->format('g:i:s A') }}</p>
                </div>
                <table  wire:ignore class="flex flex-col gap-4">
                    <thead>
                        <tr class="flex text-sm font-medium text-center">
                            <th scope="col" class="flex-1">No. of Absents</th>
                            <th scope="col" class="flex-1">No. of Whole Day</th>
                            <th scope="col" class="flex-1">No. of Overtime</th>
                            <th scope="col" class="flex-1">No. of Undertime</th>
                            <th scope="col" class="flex-1">No. of No Time Out</th>
                            <th scope="col" class="flex-1">No. of On Leave</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="flex text-sm font-medium text-center">
                            <td class="flex-1">1</td>
                            <td class="flex-1">2</td>
                            <td class="flex-1">3</td>
                            <td class="flex-1">4</td>
                            <td class="flex-1">5</td>
                            <td class="flex-1">6</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="w-full col-span-2 p-4 pb-4 bg-white rounded-lg shadow md:p-4 ">
            <div class="flex justify-between">
                <div>
                    <p class="text-xl font-bold text-customRed " style="word-break: break-word;">Daily Time-In Overview <span class="text-customGray">@if($this->filter == "Weekly") ({{$monthFilterName}} {{$yearFilterName}}) @else {{$yearFilterName}}  @endif</span></p>
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

    <div wire:ignore class="relative bg-white rounded-t-lg shadow-md ">
        <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg">
            <!-- Add user button -->
            <div>
                {{-- Phase Filter --}}
                <button id="dropdownRadioButton" data-dropdown-toggle="daysDropdown" class="shadow hover:text-white z-50 inline-flex items-center h-10 p-2 hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                    
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
                <button id="dropdownRadioButton" data-dropdown-toggle="monthDropdown" class="shadow hover:text-white z-50 inline-flex items-center h-10 p-2 hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm px-3 py-1.5" type="button">
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
                <button id="dropdownRadioButton" data-dropdown-toggle="yearDropDown" class="shadow hover:text-white z-50 inline-flex items-center h-10 p-2 hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm px-3 py-1.5" type="button">
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
            <div class="flex flex-row pr-2">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users" wire:model.change="search" class="block text-sm text-gray-900 border border-gray-300 shadow-inner rounded-8px ps-10 pe-10 max-w-80 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
                </div>
                <!-- Filter Sidebar -->
                <div class="absolute rounded-lg right-8 hover:text-customRed">
                    <div x-data="{
                        filterOpen: false,
                        employeeTypeOpen: false,
                        departmentOpen: false,
                        companyOpen: false,
                        genderOpen: false,
                        employeeTypeCount: 0,
                        departmentCount: 0,
                        companyCount: 0,
                        genderCount: 0,
                        updateEmployeeTypeCount() {
                            this.employeeTypeCount = document.querySelectorAll('.employeeTypeOpen .filter-checkbox:checked').length;
                        },
                        updateDepartmentCount() {
                            this.departmentCount = document.querySelectorAll('.departmentOpen .filter-checkbox:checked').length;
                        },
                        updateCompanyCount() {
                            this.companyCount = document.querySelectorAll('.companyOpen .filter-checkbox:checked').length;
                        },
                        updateGenderCount() {
                            this.genderCount = document.querySelectorAll('.genderOpen .filter-checkbox:checked').length;
                        },
                        clearAllFilters() {
                            document.querySelectorAll('.filter-checkbox').forEach(checkbox => checkbox.checked = false);
                            this.employeeTypeCount = 0;
                            this.departmentCount = 0;
                            this.companyCount = 0;
                            this.genderCount = 0;
                        }
                        }" class="relative">

                        <!-- Filter Icon Button -->
                        <button @click="filterOpen = !filterOpen" class="flex items-center justify-center w-10 h-10 right-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-3 text-customGray hover:text-customRed">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                            </svg>
                        </button>
                        <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 w-64 mt-2 space-y-2 bg-white border rounded shadow-lg right-1">
                            <!-- Clear All Button -->
                            <div class="px-4 py-2">
                                <button wire:click="clearAllFilters" @click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-customRed hover:text-red-900">
                                    Clear All
                                </button>
                            </div>
                            <!-- Employee Type Dropdown Button -->
                            <div class="px-2">
                                <button @click="employeeTypeOpen = !employeeTypeOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Employee Type
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="employeeTypeCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="employeeTypeCount"></span>
                                </button>
                                <div x-show="employeeTypeOpen" @click.away="employeeTypeOpen = false" class="w-full mt-2 space-y-2 employeeTypeOpen">
                                    <hr class="my-4 border-gray-300">
                                    {{-- @foreach($employeeTypesFilter as $type => $checked) --}}
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="employeeTypesFilter.Internals"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Internals</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="employeeTypesFilter.OJT" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">OJT</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="employeeTypesFilter.PEI-CCS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI-CCS</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="employeeTypesFilter.RAPID" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Rapid</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="employeeTypesFilter.RAPIDMOBILITY" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Rapid Mobility</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="employeeTypesFilter.UPSKILLS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Upskills</label>
                                    </div>
                                {{-- @endforeach --}}
                                </div>
                            </div>
                            <!-- Department Dropdown Button -->
                            <div class="px-2">
                                <button @click="departmentOpen = !departmentOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Department
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="departmentCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="departmentCount"></span>
                                </button>
                                <div x-show="departmentOpen" @click.away="departmentOpen = false" class="w-full mt-2 space-y-2 departmentOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.HR AND ADMIN" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">HR and Admin</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Recruitment" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Recruitment</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.CXS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">CXS</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Overseas Recruitment" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Overseas Recruitment</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.PEI/SL Temps DO-174" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI/SL Temps DO-174</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Corporate Accounting and Finance" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Corporate Accounting and Finance</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Accounting Operations" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Accounting Operations</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Company Dropdown Button -->
                            <div class="px-2">
                                <button @click="companyOpen = !companyOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Company
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="companyCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="companyCount"></span>
                                </button>
                                <div x-show="companyOpen" @click.away="companyOpen = false" class="w-full mt-2 space-y-2 companyOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="departmentTypesFilter.PEI" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="departmentTypesFilter.SL SEARCH"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">SL SEARCH</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="departmentTypesFilter.SL TEMPS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">SL TEMPS</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="departmentTypesFilter.WESEARCH" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">WESEARCH</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="departmentTypesFilter.PEI-UPSKILLS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI-UPSKILLS</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Gender Dropdown Button -->
                            <div class="px-2 pb-2">
                                <button @click="genderOpen = !genderOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Gender
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="genderCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="genderCount"></span>
                                </button>
                                <div x-show="genderOpen" @click.away="genderOpen = false" class="w-full mt-2 space-y-2 genderOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="genderTypesFilter.Female" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateGenderCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Female</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="genderTypesFilter.Male"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateGenderCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Male</label>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <th scope="col" class="px-6 py-3 text-center"> Employee ID / Name / Deparment </th>
                    <th scope="col" class="px-6 py-3 text-center"> Date </th>
                    <th scope="col" class="px-6 py-3 text-center"> Type </th>
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
                            <th scope="row" class="flex items-center justify-center px-6 py-4 text-gray-900  whitespace-nowrap ">
                                <div class="ps-3 text-center">
                                    <div class="text-base font-semibold">{{$data->employee->first_name}} {{$data->employee->middle_name}} {{$data->employee->last_name}} </div>
                                    <div class="font-normal  text-center text-gray-500">{{$data->employee_id}} | {{$data->employee->department}}</div>
                                </div>
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
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                                        Whole Day
                                    </span>
                                @elseif ($data->type == "Overtime")
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-blue-900 bg-blue-100 rounded-lg text-nowrap me-2">
                                        Overtime
                                    </span>
                                @elseif ($data->type == "Undertime")
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-red-900 bg-red-100 rounded-lg text-nowrap me-2">
                                        Undertime
                                    </span>
                                @elseif ($data->type == "Half-Day")
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-yellow-900 bg-yellow-100 rounded-lg text-nowrap me-2">
                                        Half-Day
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
                        @php
                            $timeIn = \Carbon\Carbon::parse($data->time_in);
                            $timeOut = \Carbon\Carbon::parse($data->time_out);
                            if($timeIn->isSameDay($timeOut)){
                                $timeIn = $timeIn->format('H:i:s');
                                $timeOut = $timeOut->format('H:i:s');
                            }
                        @endphp

                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{ $timeOut }}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{ $timeIn }}
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

<div wire:loading wire:target="selectedDate, search, generateRecord" class="load-over z-50">
    <div wire:loading wire:target="selectedDate, search, generateRecord" class="loading-overlay">
        <div class="flex flex-col justify-center items-center">
            <div class="spinner"></div>
            <p>Updating Table...</p>
        </div>
    </div>
</div>
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
</style>

<div  class="w-full p-4 overflow-x-auto bg-gray-100 rounded-b-lg">
    {{ $DtrData->links(data : ['scrollTo' => false])}}
</div>


<script>
    function updateTime() {
        const options = { timeZone: 'Asia/Manila', hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const now = new Date().toLocaleTimeString('en-US', options);
        document.getElementById('current-time').textContent = now;
    }
    setInterval(updateTime, 1000); // Update every second
    updateTime(); // Initial call to display time immediately
    
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
                    stepSize: 1, // Number of ticks on the y-axis
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
                    stepSize: 1, // Number of ticks on the y-axis
                }
            })
        })
    });
</script>