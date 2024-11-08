<div class="main-content">
    <div class="p-4 rounded-lg dark:border-gray-700">
        <nav class="flex mb-4" aria-label="Breadcrumb">
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
                <a href="{{route('HrTicketsTable', ['type' => $type])}}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">HR Tickets</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">HR Ticketing</h2>

        {{-- <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 w-full min-[450px]:w-1/3  lg:w-1/3">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h4 class="mb-2 text-lg font-bold tracking-tight text-gray-900 whitespace-normal dark:text-white xl:whitespace-nowrap">Vacation Credits</h4>
                <p class="text-3xl font-semibold text-red-600 dark:text-gray-400">{{$vacationCredits ?? 0.00}}</p>
            </div>
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h4 class="mb-2 text-lg font-bold tracking-tight text-gray-900 whitespace-normal dark:text-white xl:whitespace-nowrap">Sick Credits</h4>
                <p class="text-3xl font-semibold text-red-600 dark:text-gray-400">{{$sickCredits ?? 0.00}}</p>
            </div>
        </div> --}}


        <div class="flex flex-row-reverse self-end mb-4">
            <button type="button" onclick="location.href='{{ route('HrTicketsForm', ['type' => $type]) }}'" class="text-nowrap border-2 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="inline-block w-4 h-4 mr-2 align-middle">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                </svg>
                Submit HR Ticket
            </button>
        </div>

        <div class="w-full  mt-4  bg-white rounded-t-lg shadow-md" >
            <div class="p-4 overflow-x-auto">
                <div class="inline-block min-w-full box-border">
                    <div class="flex  flex-wrap pb-1 items-center justify-between w-full  space-y-4 min-[507px]:space-y-0  flex-column sm:flex-row ">
                        <div class="flex space-x-3 pl-1" style="padding-bottom: 0.05rem">
                        {{-- Date Filter --}}
                        <button id="dropdownRadioButton" data-dropdown-toggle="dateDropDown" class="shadow hover:text-white z-20 inline-flex items-center h-10 p-2 hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm  py-1.5" style="padding-left: 0.60rem; padding-right: 0.60rem "  type="button">
                                <svg class="w-3 h-3 me-3"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                                </svg>
                                {{$dateFilterName}}
                                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dateDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <label for="date_filter-radio-0" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white ">
                                            <input id="date_filter-radio-0" type="radio" wire:model.live="date_filter" value="0" name="date_filter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-0" class="cursor-pointer"> &nbsp; All </label> </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="date_filter-radio-1" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white ">
                                            <input id="date_filter-radio-1" type="radio" wire:model.live="date_filter" value="1" name="date_filter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white hover focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-1" class="cursor-pointer"> &nbsp;  Today </label> </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="date_filter-radio-2" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white ">
                                            <input checked="" id="date_filter-radio-2" type="radio" wire:model.live="date_filter" value="2" name="date_filter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-2" class="cursor-pointer"> &nbsp; This Week </label> </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="date_filter-radio-3" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white ">
                                            <input id="date_filter-radio-3" type="radio" wire:model.live="date_filter" value="3" name="date_filter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 ">  <label for="date_filter-radio-3" class="cursor-pointer"> &nbsp; This Month </label></input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="date_filter-radio-4" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white ">
                                            <input id="date_filter-radio-4" type="radio" wire:model.live="date_filter" value="4" name="date_filter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-4" class="cursor-pointer"> &nbsp; Last 6 Months </label> </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="date_filter-radio-5" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white ">
                                            <input id="date_filter-radio-5" type="radio" wire:model.live="date_filter" value="5" name="date_filter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 ">  <label for="date_filter-radio-5" class="cursor-pointer"> &nbsp; This Year</label>  </input>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            {{-- Status Filter --}}
                            <button id="dropdownRadioButton" data-dropdown-toggle="statusDropDown" class=" z-20 inline-flex items-center hover:text-white text-gray-900 bg-navButton  h-10 p-2 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm  py-1.5" style="padding-left: 0.60rem; padding-right: 0.60rem "   type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 me-3"s>
                                    <path fill-rule="evenodd" d="M5.25 2.25a3 3 0 0 0-3 3v4.318a3 3 0 0 0 .879 2.121l9.58 9.581c.92.92 2.39 1.186 3.548.428a18.849 18.849 0 0 0 5.441-5.44c.758-1.16.492-2.629-.428-3.548l-9.58-9.581a3 3 0 0 0-2.122-.879H5.25ZM6.375 7.5a1.125 1.125 0 1 0 0-2.25 1.125 1.125 0 0 0 0 2.25Z" clip-rule="evenodd" />
                                </svg>
                                {{$statusFilterName}}
                                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="statusDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <label for="status_filter-radio-0" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-gray-200 hover:text-customGray1">
                                            <input id="status_filter-radio-0" type="radio" wire:model.live="status_filter" value="0" name="status_filter-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 cursor-pointer focus:ring-gray-600 focus:ring-2">
                                            <label for="status_filter-radio-0" class="cursor-pointer ml-2">All</label>
                                        </label>
                                    </li>   
                                    <li>
                                        <label for="status_filter-radio-1" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customGreen hover:text-white ">
                                            <input id="status_filter-radio-1" type="radio" wire:model.live="status_filter" value="1" name="status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2 "> <label for="status_filter-radio-1" class="cursor-pointer">&nbsp; Completed </label> </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="status_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white ">
                                            <input checked="" id="status_filter-radio-2" type="radio" wire:model.live="status_filter" value="2" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2 "> <label for="status_filter-radio-2" class="cursor-pointer"> &nbsp; Pending </label></input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="status_filter-radio-4"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                            <input id="status_filter-radio-4" type="radio" wire:model.live="status_filter" value="4" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="status_filter-radio-4" class="cursor-pointer">&nbsp; Declined</label>  </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="status_filter-radio-4"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-red-600 hover:text-white ">
                                            <input id="status_filter-radio-4" type="radio" wire:model.live="status_filter" value="4" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-red-600 ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="status_filter-radio-3" class="cursor-pointer">&nbsp; Cancelled</label>  </input>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            {{-- Type Filter --}}
                            <button id="dropdownRadioButton" data-dropdown-toggle="typeDropdown" class=" z-20 inline-flex items-center hover:text-white text-gray-900 bg-navButton  h-10 p-2 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm  py-1.5" style="padding-left: 0.60rem; padding-right: 0.60rem "  type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 me-3">
                                    <path fill-rule="evenodd" d="M1.5 6.375c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v3.026a.75.75 0 0 1-.375.65 2.249 2.249 0 0 0 0 3.898.75.75 0 0 1 .375.65v3.026c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 17.625v-3.026a.75.75 0 0 1 .374-.65 2.249 2.249 0 0 0 0-3.898.75.75 0 0 1-.374-.65V6.375Zm15-1.125a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0V6a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0v.75a.75.75 0 0 0 1.5 0v-.75Zm-.75 3a.75.75 0 0 1 .75.75v.75a.75.75 0 0 1-1.5 0v-.75a.75.75 0 0 1 .75-.75Zm.75 4.5a.75.75 0 0 0-1.5 0V18a.75.75 0 0 0 1.5 0v-.75ZM6 12a.75.75 0 0 1 .75-.75H12a.75.75 0 0 1 0 1.5H6.75A.75.75 0 0 1 6 12Zm.75 2.25a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" clip-rule="evenodd" />
                                </svg>
                                
                                
                                {{$typeFilterName}}
                                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="typeDropdown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                                <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <label for="type_filter-radio-0" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-gray-300 hover:text-black">
                                            <input id="type_filter-radio-0" type="radio" wire:model.live="type_filter" value="0" name="type_filter-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 cursor-pointer focus:ring-gray-600 focus:ring-2">
                                            <label for="type_filter-radio-0" class="cursor-pointer ml-2">All</label>
                                        </label>
                                    </li>   
                                    <li>
                                        <label for="type_filter-radio-1" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-green-600 hover:text-white">
                                            <input id="type_filter-radio-1" type="radio" wire:model.live="type_filter" value="1" name="type_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2"> 
                                            <label for="type_filter-radio-1" class="cursor-pointer">&nbsp; HR Internal</label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="type_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-600 hover:text-white">
                                            <input checked="" id="type_filter-radio-2" type="radio" wire:model.live="type_filter" value="2" name="type_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2"> 
                                            <label for="type_filter-radio-2" class="cursor-pointer" > &nbsp; Internal Control</label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="type_filter-radio-3" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-red-700 hover:text-white">
                                            <input id="type_filter-radio-3" type="radio" wire:model.live="type_filter" value="3" name="type_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-red-700 ring-2 ring-white focus:ring-red-700 focus:ring-2"> 
                                            <label for="type_filter-radio-3" class="cursor-pointer">&nbsp; HR Operations</label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="type_filter-radio-4" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-blue-600 hover:text-white">
                                            <input id="type_filter-radio-4" type="radio" wire:model.live="type_filter" value="4" name="type_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-blue-600 ring-2 ring-white focus:ring-blue-600 focus:ring-2"> 
                                            <label for="type_filter-radio-4" class="cursor-pointer">&nbsp; HR</label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="type_filter-radio-5" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-purple-600 hover:text-white">
                                            <input id="type_filter-radio-5" type="radio" wire:model.live="type_filter" value="5" name="type_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-purple-600 ring-2 ring-white focus:ring-purple-600 focus:ring-2"> 
                                            <label for="type_filter-radio-5" class="cursor-pointer">&nbsp; Office Admin</label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="type_filter-radio-6" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-teal-600 hover:text-white">
                                            <input id="type_filter-radio-6" type="radio" wire:model.live="type_filter" value="6" name="type_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-teal-600 ring-2 ring-white focus:ring-teal-600 focus:ring-2"> 
                                            <label for="type_filter-radio-6" class="cursor-pointer">&nbsp; Procurement</label>
                                        </label>
                                    </li>
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
                            <input type="text" id="table-search" wire:model.live.debounce.1000ms="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 bg-gray-50 focus:ring-customRed focus:border-customRed border-text w-264 min-[507px]:w-24 min-[524px]:w-28 min-[540px]:w-32 min-[555px]:w-36 min-[570px]:w-40 min-[585px]:w-44 min-[600px]:w-48  min-[616px]:w-52  min-[635px]:w-56 min-[650px]:w-60 min-[710px]:w-300"  placeholder="Search like: January 1, 2024">
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full pb-4 text-sm text-left text-gray-500 h-fit rtl:text-right dark:text-gray-400" style="overflow-y:hidden;" >
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            {{-- <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-center">
                                Form No.
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Date Applied
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Concerned Employee
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Ticket Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Request Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Ticket Info
                            </th>
                            {{-- <th scope="col" class="px-6 py-3 text-center">
                                Reason
                            </th> --}}
                            <th scope="col" class="px-6 py-3 text-center">
                                Actions
                            </th>

                        </tr>
                    </thead>
                    <div>
                        <div>
                            <tbody class="pb-4">

                            @if ($HrTicketData->isEmpty())
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                        <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px">
                                            <div class="flex max-[600px]:justify-start pl-14 md:pl-0 justify-center items-center" style="padding-top: 40px">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg>
                                                <p class="text-xl font-semibold text-customRed">Nothing to show</p>
                                            </div>
                                        </th>
                                    </tr>
                            @else
                                {{-- @php
                                    $ctr = 0;
                                    $pageIndex = ($HrTicketData->currentpage() - 1) * $HrTicketData->perpage() + $ctr;
                                @endphp --}}
                                @foreach ($HrTicketData as $index => $hrticket)
                                {{-- @php
                                    $ctr = $ctr + 1;
                                @endphp --}}
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        {{-- <td class="w-4 p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                            </div>
                                        </td> --}}
                                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                            {{-- {{$pageIndex + $ctr}} --}}
                                            {{$hrticket->form_id}}
                                        </th>
                                        @if($hrticket->status == "Pending")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap dark:text-white">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-amber-300 me-2 dark:bg-amber-300 dark:hover:bg-amber-600 dark:focus:ring-amber-800">
                                                    <svg class="grid w-6 h-6 grid-cols-1 text-xs text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                        <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                        <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Pending &nbsp;
                                                </span>
                                            </th>
                                        @elseif($hrticket->status == "Completed")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap dark:text-white">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                    <svg class="w-6 h-6 mr-1 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                    </svg>
                                                    Completed &nbsp;
                                                </span>
                                            </th>
                                        @else
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap dark:text-white">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 me-2 dark:bg-red-300 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                                    <svg class="w-6 h-6 mr-1 text-white dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                    </svg>
                                                    {{ $hrticket->status }}
                                                </span>
                                            </th>
                                        @endif
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$hrticket->application_date}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$hrticket->concerned_employee}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$hrticket->type_of_ticket}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$hrticket->type_of_request}}
                                        </td>
                                        <td  class="px-6 py-4 text-center ">
                                            @if($hrticket->type_of_request == "Reimbursements")
                                                <span class="font-semibold text-gray-700">Cut-Off Date: </span> {{$hrticket->request_date}} <br>
                                                <span class="font-semibold text-gray-700">Concern Description: </span>{{$hrticket->purpose}} <br>
                                                <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}}
                                            @elseif($hrticket->type_of_request == "Tools and Equipment")
                                                <span class="font-semibold text-gray-700">Equipment Type: </span>{{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Condition/Availability: </span>{{$hrticket->condition_availability}} <br> 
                                            @elseif($hrticket->type_of_request == "Cash Advance")
                                                <span class="font-semibold text-gray-700">Date of Cash Advance Request: </span>{{Carbon\Carbon::parse($hrticket->request_date)->format('F j, Y')}}<br>
                                                <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}} <br>
                                            @elseif($hrticket->type_of_request == "Liquidation")
                                                <span class="font-semibold text-gray-700">Liquidation Coverage: </span>{{$hrticket->purpose}} <br>
                                                <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}} <br>
                                            @elseif($hrticket->type_of_request == "Performance Monitoring Request")
                                                <span class="font-semibold text-gray-700">Type Of PE:</span> {{$hrticket->type_of_pe_hr_ops}} <br>
                                                <span class="font-semibold text-gray-700"> Account/Client: </span> {{$hrticket->account_client_hr_ops}} <br>
                                            @elseif($hrticket->type_of_request == "Incident Report")
                                                <span class="font-semibold text-gray-700"> Level of Offense:</span> {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Incident Report:</span> {{$hrticket->purpose}} <br>
                                            @elseif($hrticket->type_of_request == "Request for Issuance of Notice/Letter")
                                                <span class="font-semibold text-gray-700">Type of Notice:</span> {{$hrticket->type_of_hrconcern}} <br>
                                            @elseif($hrticket->sub_type_of_request == "Request for Quotation")
                                                <span class="font-semibold text-gray-700">Specifications:</span> {{$hrticket->type_of_hrconcern}} <br> 
                                                <span class="font-semibold text-gray-700">Purpose:</span> {{$hrticket->purpose}} <br>
                                                <span class="font-semibold text-gray-700">Link Related:</span> {{$hrticket->request_link}} <br>
                                            @elseif($hrticket->type_of_request == "Request to Buy/Book/Avail Service")
                                                <span class="font-semibold text-gray-700">Specifications:</span> {{$hrticket->type_of_hrconcern}} <br> 
                                                <span class="font-semibold text-gray-700">Link Related:</span> {{$hrticket->request_link}} <br>
                                            @elseif($hrticket->type_of_request == "Request for Employee Files")
                                                <span class="font-semibold text-gray-700">Purpose of Request:</span> {{$hrticket->purpose}} <br> 
                                                <span class="font-semibold text-gray-700">Document/s Needed:</span> {{$hrticket->request_requested}} <br>

                                            @elseif($hrticket->sub_type_of_request == "Certificate of Employment" || $hrticket->sub_type_of_request == "Request for Consultation" )
                                                <span class="font-semibold text-gray-700">Purpose of Request:</span> {{$hrticket->purpose}} <br>
                                                <span class="font-semibold text-gray-700">Type of COE </span> {{$hrticket->type_of_hrconcern}} 
                                            @elseif($hrticket->sub_type_of_request == "HMO-related Concerns" || $hrticket->sub_type_of_request == "Leave Concerns")
                                                <span class="font-semibold text-gray-700">Type of Concern: </span>{{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Concern Description: </span>{{$hrticket->purpose}} <br>
                                                <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}} 
                                            @elseif($hrticket->sub_type_of_request == "Payroll-related Concerns")
                                                <span class="font-semibold text-gray-700">Payroll Date: </span>  {{\Carbon\Carbon::parse($hrticket->request_date)->format('F j, Y')}}  <br>
                                                <span class="font-semibold text-gray-700">Type of Concern: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Concern Description: </span>    {{$hrticket->purpose }} <br>
                                                <span class="font-semibold text-gray-700">Link Related: </span>    {{$hrticket->request_link }} 
                                            @elseif($hrticket->sub_type_of_request == "Request for a Meeting")
                                                <span class="font-semibold text-gray-700">Meeting Date: </span>{{$hrticket->request_date}} <br>
                                                <span class="font-semibold text-gray-700">Target Person: </span>    {{$hrticket->request_requested}} <br>
                                                <span class="font-semibold text-gray-700">Purpose: </span>    {{$hrticket->purpose }} <br>
                                            @elseif($hrticket->sub_type_of_request == "Certificate of Remittances")
                                                <span class="font-semibold text-gray-700">Type of Remittance Certificate: </span>  {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Account Assigned: </span> {{$hrticket->request_assigned}} <br>
                                                <span class="font-semibold text-gray-700">Purpose: </span>    {{$hrticket->purpose}} <br>
                                                <span class="font-semibold text-gray-700">Date Start: </span>    {{$hrticket->request_date}} <br>
                                            @elseif($hrticket->sub_type_of_request == "Government-Mandated Benefits Concern")
                                                <span class="font-semibold text-gray-700">Type of Concern: </span> {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Link Related: </span>    {{$hrticket->request_link}}
                                            @elseif($hrticket->sub_type_of_request == "Messengerial")
                                                <span class="font-semibold text-gray-700">Type of Request: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Company: </span>     {{$hrticket->request_requested}} <br>
                                                <span class="font-semibold text-gray-700">Contact Person: </span>     {{$hrticket->request_assigned}} <br>
                                                <span class="font-semibold text-gray-700">Address of Destination: </span>     {{$hrticket->request_others}} <br>
                                                <span class="font-semibold text-gray-700">Date of Pick Up or Send: </span>     {{$hrticket->request_date}}
                                            @elseif($hrticket->sub_type_of_request == "Repairs/Maintenance")
                                                <span class="font-semibold text-gray-700">Type of Request: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Concerned Area : </span>    {{$hrticket->purpose}}
                                            @elseif($hrticket->sub_type_of_request == "Book a Car")
                                                <span class="font-semibold text-gray-700">Date and Time of Departure: </span>    {{$hrticket->request_date}} <br>
                                                <span class="font-semibold text-gray-700">Date and Time of Pick-Up: </span>    {{$hrticket->request_requested}} <br>
                                                <span class="font-semibold text-gray-700">Passenger/s Name: </span>    {{$hrticket->account_client_hr_ops}} <br>
                                                <span class="font-semibold text-gray-700">Destination: </span>    {{$hrticket->purpose}} <br>
                                            @elseif($hrticket->sub_type_of_request == "Book a Meeting Room")
                                                <span class="font-semibold text-gray-700">Type of Request: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Start Date: </span>    {{$hrticket->request_date}} <br>
                                                <span class="font-semibold text-gray-700">End Date: </span>    {{$hrticket->request_requested}} <br>
                                                <span class="font-semibold text-gray-700">Type of Room: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                                <span class="font-semibold text-gray-700">Purpose: </span>    {{$hrticket->purpose}} <br>
                                            @elseif($hrticket->sub_type_of_request == "Office Supplies")
                                                <span class="font-semibold text-gray-700">Requests: </span> <br> <br>
                                            @if ($hrticket->request_others)
                                                    @php
                                                        $ctr_request = 0;
                                                        $supplies_request = json_decode($hrticket->request_others, true);
                                                        // dd($supplies_request, $hrticket->request_others);
                                                        // dd();
                                                    @endphp
                                                    {{-- @foreach ($supplies_request as $name =>  $request) --}}
                                                    
                                                    <div class="">
                                                        @php $ctr_request = 0; @endphp
                                                        <div class="grid grid-cols-1 lg:grid-cols-2  font-semibold">
                                                            <div class="col-span-1"># - Name</div>
                                                            <div class="col-span-1">Quantity</div>
                                                        </div>
                                                    
                                                        <div class="flex flex-col space-y-2 mt-2">
                                                            @if($supplies_request['ballpen_black'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Ballpen (Black):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['ballpen_black'] }}</div>
                                                                </div>
                                                            @endif
                                                    
                                                            @if($supplies_request['ballpen_blue'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Ballpen (Blue): </div>
                                                                    <div class="col-span-1">{{ $supplies_request['ballpen_blue'] }}</div>
                                                                </div>
                                                            @endif
                                                    
                                                            @if($supplies_request['ballpen_red'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Ballpen (Red): </div>
                                                                    <div class="col-span-1">{{ $supplies_request['ballpen_red'] }}</div>
                                                                </div>
                                                            @endif
                                                    
                                                            @if($supplies_request['ballpen_red'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Ballpen (Red): </div>
                                                                    <div class="col-span-1">{{ $supplies_request['ballpen_red'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['pencil'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Pencil: </div>
                                                                    <div class="col-span-1">{{ $supplies_request['pencil'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['highlighter'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Highlighter: </div>
                                                                    <div class="col-span-1">{{ $supplies_request['highlighter'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['permanent_marker'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Permanent Marker: </div>
                                                                    <div class="col-span-1">{{ $supplies_request['permanent_marker'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    @if($supplies_request['correction_tape'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Correction Tape: </div>
                                                                    <div class="col-span-1">{{ $supplies_request['correction_tape'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['l_green_exp_folder'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Green Expandable Folder (L):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['l_green_exp_folder'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['s_green_exp_folder'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Green Expandable Folder (S):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['s_green_exp_folder'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['l_brown_exp_folder'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Brown Expandable Folder (L):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['l_brown_exp_folder'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                    @if($supplies_request['s_brown_exp_folder'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Brown Expandable Folder (S):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['s_brown_exp_folder'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['scissors'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Scissors:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['scissors'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['white_envelope'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. White Envelope:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['white_envelope'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['calculator'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Calculator:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['calculator'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['binder_two'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Binder Clips (2"):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['binder_two'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['binder_one_fourth'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1"> {{ $ctr_request }}. Binder Clips (1 1/4"):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['binder_one_fourth'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['binder_three_fourth'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Binder Clips (3/4"):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['binder_three_fourth'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['l_metal_clips'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Metal Paper Clips (L):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['l_metal_clips'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['binder_one_fourth'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Binder Clips (1 1/4"): </div>
                                                                    <div class="col-span-1">{{ $supplies_request['binder_one_fourth'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['s_metal_clips'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Metal Paper Clips (S):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['s_metal_clips'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['stapler'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Stapler:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['stapler'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['stapler_wire'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Stapler Wire:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['stapler_wire'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['scotch_tape'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Scotch Tape:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['scotch_tape'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['l_brown_envelope'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Brown Envelope (L):</div>
                                                                    <div class="col-span-1">{{ $supplies_request['l_brown_envelope'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['post_it'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. Post It:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['post_it'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['white_envelope'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. White Envelope:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['white_envelope'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    @if($supplies_request['white_folder'] > 0)
                                                                @php $ctr_request += 1; @endphp
                                                                <div class="grid grid-cols-1 lg:grid-cols-2 items-center border-b border-gray-300">
                                                                    <div class="col-span-1">{{ $ctr_request }}. White Folder:</div>
                                                                    <div class="col-span-1">{{ $supplies_request['white_folder'] }}</div>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- @endforeach --}}
                                                    @endif
                                            @endif
                                        </td>

                                        {{-- <td class="px-6 py-4 text-center">
                                            {{$hrticket->purpose}}
                                        </td> --}}

                                        {{-- <a onclick="location.href='{{ route('ipcredit', ['index' => $hrticket->id]) }}'"  class="font-medium text-blue-600 cursor-pointer dark:text-blue-500 hover:underline">Edit</a> --}}
                                            {{-- <a href="{{route('ipcredit', $hrticket)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                            {{-- <a wire:click="removeIpcr({{$hrticket->id}})" class="font-medium text-red-600 cursor-pointer dark:text-red-500 hover:underline ms-3">Remove</a> --}}

                                        <td x-data="{ data: @json($HrTicketData[0]->form_id)}" class="items-center py-4 text-center">
                                            <div class="flex items-center justify-center space-x-2">
                                                <!-- View Button -->
                                                <a onclick="location.href='{{ route('HrTicketsView', ['index' => $hrticket->uuid]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600 ">
                                                    View
                                                </a>
                                                <!-- Cancel Button -->
                                                @if ($hrticket->status != "Cancelled" && $hrticket->status != "Completed" )
                                                    <button @click="openCancelModal('{{$hrticket->uuid}}')"
                                                        type="button" 
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 cursor-pointer hover:text-red-600">
                                                        Cancel
                                                    </button>
                                                @endif
                                            </div>
                                            {{-- <span x-text="data"></span> --}}
                                        </td>
                                </tr>

                            @endforeach
                            <div x-cloak x-data="{ cancelModal: false }" x-ref="cancel-modal" 
                                    x-init="
                                    $el.addEventListener('modal-open', (event) => {
                                        $wire.set('currentFormId', event.detail)
                                        cancelModal = true;
                                    });
                                    $el.addEventListener('modal-close', () => openCrudModal = false);"
                                    x-show="cancelModal" 
                                    @keydown.window.escape="open = false" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    tabindex="-1" 
                                    class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                                    id="cancel-modal">
                            <div x-show="cancelModal" 
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="transform opacity-0 scale-90"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-90"
                                    class="relative p-4 w-full mx-4 sm:mx-auto max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button" @click="cancelModal = false"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-4 md:p-5">
                                    <div class="text-center">
                                            <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                            </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm cancellation?</h3>
                                        <button wire:click="cancelForm" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                            Yes
                                        </button>
                                        <button @click="cancelModal = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                                    @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'HR Ticket Cancelled'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
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
                            
                            @endif
                            </tbody>
                        </div>
                    </div>
                </table>
            </div>
            

        </div>
        <div class="w-full p-4 bg-gray-100 rounded-b-lg">
            {{ $HrTicketData->links() }}
        </div>



        <!-- Loading screen -->
        <div wire:loading wire:target="submit, cancelForm" class="load-over z-50">
            <div wire:loading wire:target="submit, cancelForm" class="loading-overlay z-50">
                <div class="flex flex-col items-center justify-center">
                    <div class="spinner"></div>
                    <p>Cancelling your Request...</p>
                </div>
            </div>
        </div>
        
        <!-- Loading screen -->
        <div wire:loading wire:target="search, date_filter, status_filter, type_filter" class="fixed inset-x-0 top-1/4 flex justify-center pointer-events-none z-50">
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
        
    </div>
</div>
</div>
<script>
    function openCancelModal(id) {
        const modal = document.getElementById('cancel-modal');
        if (modal) {
            const event = new CustomEvent('modal-open', { 
                detail: id, 
            });
            modal.dispatchEvent(event);
        }
    }
    
    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success'));
            const modal = document.querySelector(`[x-ref="cancel-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.cancelModal = false; // Open the modal
        });
        Livewire.on('triggerError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="cancel-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.cancelModal = false; // Open the modal
        });
    });

    // document.addEventListener('DOMContentLoaded', () => {
    //     // Select all cancel buttons and add event listeners
    //     document.querySelectorAll('[id^="cancel_button"]').forEach(cancelButton => {
    //         const modalId = 'popup-modal' + cancelButton.getAttribute('id').substring(13); // Adjust substring length as per your ID format
    //         const modal = document.getElementById(modalId);

    //         // Add click event listener to each cancel button
    //         cancelButton.addEventListener('click', (e) => {
    //             e.preventDefault();
    //             if (modal) {
    //                 modal.classList.remove('hidden');
    //             }
    //         });
    //     });

    //     // Select all close modal buttons and add event listeners
    //     document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(closeButton => {
    //         closeButton.addEventListener('click', () => {
    //             const modal = closeButton.closest('.fixed');
    //             if (modal) {
    //                 modal.classList.add('hidden');
    //             }
    //         });
    //     });
    // });
</script>
