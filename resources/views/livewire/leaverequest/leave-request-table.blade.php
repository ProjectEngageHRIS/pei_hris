<div class="main-content">
    <div class="p-4 rounded-lg ">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed ">
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
                <a href="{{route('LeaveRequestTable')}}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 ">Leave Request</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl ">Leave Request</h2>
        <div class="flex flex-col gap-4 sm:flex-row sm:justify-between">
            <div class="flex flex-col sm:flex-row w-full gap-4 justify-stretch">
                <div class="w-full sm:w-auto p-4 bg-white border border-gray-200 rounded-lg shadow">
                    <h4 class="mb-2 text-lg font-bold text-gray-900 whitespace-nowrap">Vacation Credits</h4>
                    <p class="text-3xl font-semibold text-customRed">{{$vacationCredits ?? 0.00}}</p>
                </div>
                <div class="w-full sm:w-auto p-4 bg-white border border-gray-200 rounded-lg shadow">
                    <h4 class="mb-2 text-lg font-bold text-gray-900 whitespace-nowrap">Sick Credits</h4>
                    <p class="text-3xl font-semibold text-customRed">{{$sickCredits ?? 0.00}}</p>
                </div>
            </div>
            <div class="flex flex-row-reverse self-end">
                <button type="button" onclick="location.href='{{ route('LeaveRequestForm') }}'" class="text-nowrap border-2 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="inline-block w-4 h-4 mr-2 align-middle">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                    </svg>
                    Request Leave
                </button>
            </div>
        </div>
        
        
        <div class="w-full  mt-4  bg-white rounded-t-lg shadow-md" >
            <div class="flex flex-wrap items-center justify-between w-full p-4 space-y-4 min-[567px]:space-y-0  flex-column sm:flex-row ">
                <div class="flex space-x-1 pl-1 overflow-x-auto   " style="padding-bottom: 0.05rem">
                    <button id="dropdownRadioButton" data-dropdown-toggle="dateDropDown" class="shadow hover:text-white z-20 inline-flex items-center h-10 w-full md:w-auto p-1 hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5" type="button">
                        <svg class="w-3 h-3 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
                                    <span class="font-semibold text-customRed">Date Span</span>
                                </li>
                                <hr>
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

                    {{-- Supervisor Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="supervisorDropDown" class="z-20 inline-flex items-center hover:text-white w-full md:w-auto text-gray-900 bg-navButton h-10 p-1 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm py-1.5" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 me-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                        </svg>
                        {{$supervisorFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="supervisorDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                            <li>
                                <span class="font-semibold text-customRed">Supervisor Status </span>
                            </li>
                            <hr>
                            <li>
                                <label for="supervisor_status_filter-radio-0" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-gray-500 hover:text-white">
                                    <input id="supervisor_status_filter-radio-0" type="radio" wire:model.live="supervisor_status_filter" value="0" name="supervisor_status_filter-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 cursor-pointer focus:ring-gray-600 focus:ring-2">
                                    <label for="supervisor_status_filter-radio-0" class="cursor-pointer ml-2">All</label>
                                </label>
                            </li>   
                            <li>
                                <label for="supervisor_status_filter-radio-1" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customGreen hover:text-white ">
                                    <input id="supervisor_status_filter-radio-1" type="radio" wire:model.live="supervisor_status_filter" value="1" name="supervisor_status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2 "> <label for="supervisor_status_filter-radio-1" class="cursor-pointer">&nbsp; Approved </label> </input>
                                </label>
                            </li>
                            <li>
                                <label for="supervisor_status_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white ">
                                    <input checked="" id="supervisor_status_filter-radio-2" type="radio" wire:model.live="supervisor_status_filter" value="2" name="supervisor_status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2 "> <label for="supervisor_status_filter-radio-2" class="cursor-pointer"> &nbsp; Pending </label></input>
                                </label>
                            </li>
                            <li>
                                <label for="supervisor_status_filter-radio-3"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                    <input id="supervisor_status_filter-radio-3" type="radio" wire:model.live="supervisor_status_filter" value="3" name="supervisor_status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="supervisor_status_filter-radio-3" class="cursor-pointer">&nbsp; Declined</label>  </input>
                                </label>
                            </li>
                        </ul>
                    </div> 

                    {{-- President Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="presidentDropDown" class="z-20 inline-flex items-center hover:text-white w-full md:w-auto text-gray-900 bg-navButton h-10 p-1 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm py-1.5"  type="button">
                        <style>
                            .svg-icon {
                                width: 1em; /* Ensure it scales properly */
                                height: 1em; /* Ensure it scales properly */
                                fill: currentColor; /* Inherit color from parent */
                                stroke: currentColor; /* Inherit color from parent */
                            }
                            .svg-icon path,
                            .svg-icon polygon,
                            .svg-icon rect {
                                fill: currentColor; /* Use currentColor to inherit color from parent */
                                stroke-width: 1; /* Adjust stroke-width for path elements */
                            }
                            .svg-icon circle {
                                stroke: currentColor; /* Use currentColor to inherit color from parent */
                                stroke-width: 1; /* Adjust stroke-width for circle elements */
                            }
                            .svg-icon:hover {
                                fill: white; /* Change fill color on hover */
                                stroke: white; /* Change stroke color on hover */
                            }
                        </style>
                        
                        
                        
                        
                        <svg class="svg-icon w-8 h-8 me-3" viewBox="0 0 20 20">
                            <path d="M10.001,9.658c-2.567,0-4.66-2.089-4.66-4.659c0-2.567,2.092-4.657,4.66-4.657s4.657,2.09,4.657,4.657
                            C14.658,7.569,12.569,9.658,10.001,9.658z M10.001,1.8c-1.765,0-3.202,1.437-3.202,3.2c0,1.766,1.437,3.202,3.202,3.202
                            c1.765,0,3.199-1.436,3.199-3.202C13.201,3.236,11.766,1.8,10.001,1.8z"></path>
                            <path d="M9.939,19.658c-0.091,0-0.179-0.017-0.268-0.051l-7.09-2.803c-0.276-0.108-0.461-0.379-0.461-0.678
                            c0-4.343,3.535-7.876,7.881-7.876c4.343,0,7.878,3.533,7.878,7.876c0,0.302-0.182,0.572-0.464,0.68l-7.213,2.801
                            C10.118,19.64,10.03,19.658,9.939,19.658z M3.597,15.639l6.344,2.507l6.464-2.512c-0.253-3.312-3.029-5.927-6.404-5.927
                            C6.623,9.707,3.848,12.326,3.597,15.639z"></path>
                            <path d="M9.939,19.658c0,0-0.003,0-0.006,0c-0.347-0.003-0.646-0.253-0.709-0.596L7.462,9.567
                            C7.389,9.172,7.65,8.79,8.046,8.718C8.442,8.643,8.82,8.906,8.894,9.301l1.076,5.796l1.158-5.741
                            c0.08-0.394,0.461-0.655,0.86-0.569c0.396,0.08,0.649,0.464,0.569,0.859l-1.904,9.427C10.585,19.413,10.286,19.658,9.939,19.658z"></path>
                        </svg>
                        
                                    
                        {{$presidentFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="presidentDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                            <li>
                                <span class="font-semibold text-customRed">President Status </span>
                            </li>
                            <hr >
                            <li>
                                <label for="president_status_filter-radio-0" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-gray-500 hover:text-white">
                                    <input id="president_status_filter-radio-0" type="radio" wire:model.live="president_status_filter" value="0" name="president_status_filter-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 cursor-pointer focus:ring-gray-600 focus:ring-2">
                                    <label for="president_status_filter-radio-0" class="cursor-pointer ml-2">All</label>
                                </label>
                            </li>   
                            <li>
                                <label for="president_status_filter-radio-1" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customGreen hover:text-white ">
                                    <input id="president_status_filter-radio-1" type="radio" wire:model.live="president_status_filter" value="1" name="president_status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2 "> <label for="president_status_filter-radio-1" class="cursor-pointer">&nbsp; Approved </label> </input>
                                </label>
                            </li>
                            <li>
                                <label for="president_status_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white ">
                                    <input checked="" id="president_status_filter-radio-2" type="radio" wire:model.live="president_status_filter" value="2" name="president_status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2 "> <label for="president_status_filter-radio-2" class="cursor-pointer"> &nbsp; Pending </label></input>
                                </label>
                            </li>
                            <li>
                                <label for="president_status_filter-radio-3"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                    <input id="president_status_filter-radio-3" type="radio" wire:model.live="president_status_filter" value="3" name="president_status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="president_status_filter-radio-3" class="cursor-pointer">&nbsp; Declined</label>  </input>
                                </label>
                            </li>
                        </ul>
                    </div> 
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative max-[567px]:pl-1">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                        <svg class="w-5 h-5 text-gray-900" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search" wire:model.live.debounce.250ms="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 bg-gray-50 focus:ring-customRed focus:border-customRed border-text w-full max-[567px]:w-full lg:w-full xl:w-full"  placeholder="Search like: 2024-01-01">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full  pb-4 text-sm text-left text-gray-500 h-fit rtl:text-right " style="overflow-y:hidden;" >
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Date Applied
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Leave Type
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Leave Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <div>
                        <div>
                            <tbody wire:poll.10s class="pb-4">
                            @if ($LeaveRequestData->isEmpty())
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px">
                                            <div class="flex sm:justify-start pl-12 md:pl-0 md:justify-center items-center" style="padding-top: 40px">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg>
                                                <p class="text-xl font-semibold text-customRed">Nothing to show</p>
                                            </div>
                                        </th>
                                    </tr>
                            @else
                                @php
                                    $ctr = 0;
                                    $pageIndex = ($LeaveRequestData->currentpage() - 1) * $LeaveRequestData->perpage() + $ctr;
                                @endphp
                                @foreach ($LeaveRequestData as $index => $leaverequest)
                                @php
                                    $ctr = $ctr + 1;
                                @endphp
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
                                            {{$pageIndex + $ctr}}
                                        </th>
                                        @if($leaverequest->status == "Pending")
                                            <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                                @if($leaverequest->mode_of_application == "Credit Leave" || $leaverequest->mode_of_application == "Advise Slip" )
                                                    <span  class="text-gray-200 text-xs bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                        <svg class="w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                            <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                            <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                        </svg>   
                                                        Pending
                                                    </span>
                                                @else
                                                    <div class="flex items-center justify-center space-x-4">
                                                        <!-- HR Approval Status -->
                                                        @if ($leaverequest->approved_by_supervisor == 1)
                                                            <span  class="text-gray-200 text-xs bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                                <svg class="w-6 h-6 text-white mr-1 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                                </svg>
                                                                Supervisor : Approved
                                                            </span>
                                                        @else
                                                            <span class="text-gray-200 text-xs bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg px-2 py-1 inline-flex items-center">
                                                                <svg class="w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                                    <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                                    <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                                </svg>    
                                                                Supervisor : {{$leaverequest->approved_by_supervisor ? 'Approved' : 'Pending'}}
                                                            </span>
                                                            
                                                        @endif
                                                        
                                                        @if ($leaverequest->approved_by_president == 1)
                                                            <span  class="text-gray-200 text-xs bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                                <svg class="w-6 h-6 text-white mr-1 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                                </svg>
                                                                President : Approved
                                                            </span>
                                                        @else
                                                            <span class="text-gray-200 text-xs bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg px-2 py-1 inline-flex items-center">
                                                                <svg class="w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                                    <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                                    <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                                </svg>    
                                                                President : {{$leaverequest->approved_by_supervisor ? 'Approved' : 'Pending'}}
                                                            </span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </th>
                                        @elseif($leaverequest->status == "Approved")
                                            <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                                <span  class="text-gray-200 text-xs bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                    <svg class="w-6 h-6 text-white mr-1 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                    </svg>
                                                    {{ $leaverequest->status }} &nbsp;
                                                </span>
                                            </th>
                                        @elseif($leaverequest->status == "Cancelled")
                                            <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                                <span  class="text-gray-200 text-xs bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-white mr-1 dark:text-white" >
                                                        <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                                                      </svg>
                                                    {{ $leaverequest->status }} &nbsp;
                                                </span>
                                            </th>
                                        @else
                                            <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                                <span  class="text-gray-200 text-xs bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-red-300 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                                    <svg class="w-6 h-6 text-white mr-1 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                    </svg>   
                                                    {{ $leaverequest->status }}
                                                </span>
                                            </th>
                                        @endif
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$leaverequest->application_date}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$leaverequest->mode_of_application}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            @if ($leaverequest->mode_of_application == "Credit Leave")
                                                <span class="font-medium text-gray-700">Date Earned:</span> {{\Carbon\Carbon::parse($leaverequest->inclusive_start_date)->format('F j, Y g:i A')}} <br>
                                                <span class="font-medium text-gray-700">Date to Apply:</span> {{\Carbon\Carbon::parse($leaverequest->inclusive_end_date)->format('F j, Y g:i A')}} <br>
                                                <span class="font-medium text-gray-700">Earned Description: <br> </span> {{$leaverequest->earned_description}} <br>
                                            @elseif ($leaverequest->mode_of_application == "Advise Slip")
                                                <span class="font-medium text-gray-700">Date Requested:</span> {{\Carbon\Carbon::parse($leaverequest->inclusive_start_date)->format('F j, Y g:i A')}} <br>
                                                <span class="font-medium text-gray-700">Actual Schedule:</span> {{\Carbon\Carbon::parse($leaverequest->inclusive_end_date)->format('F j, Y g:i A')}} <br>
                                                <span class="font-medium text-gray-700">Purpose Type:</span> {{$leaverequest->purpose_type}} <br>
                                                <span class="font-medium text-gray-700">Log Out Time:</span>  {{ \Carbon\Carbon::parse($leaverequest->full_or_half)->format('F j, Y g:i A') }} <br>
                                                <span class="font-medium text-gray-700">Reason: <br></span> {{$leaverequest->reason}} <br>
                                            @else
                                                <span class="font-medium text-gray-700">Start Date:</span> {{\Carbon\Carbon::parse($leaverequest->inclusive_start_date)->format('F j, Y g:i A')}} <br>
                                                <span class="font-medium text-gray-700">End Date:</span> {{\Carbon\Carbon::parse($leaverequest->inclusive_end_date)->format('F j, Y g:i A')}}
                                            @endif
                                        </td>
                                        <td class="items-center py-4 text-center">
                                            <div class="flex items-center justify-center space-x-2" x-data="{ isOpen: false }">
                                                <!-- View Button -->
                                                <a onclick="location.href='{{ route('LeaveRequestView', ['index' => $leaverequest->uuid]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600 ">
                                                    View
                                                </a>
                                                <!-- Cancel Button -->
                                                @if ($leaverequest->status != "Cancelled" && $leaverequest->status != "Completed" )
                                                    <button @click="openCancelModal('{{$leaverequest->uuid}}')"
                                                        type="button" 
                                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 cursor-pointer hover:text-red-600">
                                                        Cancel
                                                    </button>
                                                @endif
                                            </div>
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
                                    class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
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
    
                        <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                                @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Leave Request Cancelled'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
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
        {{-- <div id="toast-container" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50" >
            <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60" role="alert"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-90">
            <div role="status">
                <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-red-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
            <div class="text-sm font-normal ms-3 text-center"> Updating Table</div>
            </div>
        </div> --}}
        <div class="w-full p-4 bg-gray-100 rounded-b-lg">
            {{ $LeaveRequestData->links() }}
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
        <div wire:loading wire:target="president_status_filter, supervisor_status_filter, date_filter, search" class="fixed inset-x-0 top-1/4 flex justify-center pointer-events-none z-50">
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

    // function adjustDropdownPosition(index) {
    //     const dropdown = document.getElementById('dropdown' + index);
    //     if (dropdown) {
    //         const rect = dropdown.getBoundingClientRect();
    //         const isLeftAligned = rect.right > window.innerWidth;
    //         dropdown.classList.toggle('left-10', isLeftAligned);
    //         dropdown.classList.toggle('right-10', !isLeftAligned);
    //     }
    // }

    
    // function closeCancelModal(index) {
    //     const modalId = 'popup-modal_' + index;
    //     const modal = document.getElementById(modalId);
    //     if (modal) {
    //         modal.classList.add('hidden');
    //     } else {
    //         console.error(`Modal with id ${modalId} does not exist.`);
    //     }
    // }

    // function openCancelModal(index) {
    //     const modalId = 'popup-modal_' + index;
    //     const modal = document.getElementById(modalId);
    //     if (modal) {
    //         modal.classList.remove('hidden');
    //     }
    // }

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