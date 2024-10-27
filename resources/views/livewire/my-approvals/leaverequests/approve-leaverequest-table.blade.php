<main class="p-4">
    <nav class="flex items-center mb-4 space-x-3" aria-label="Breadcrumb">
        <li class="flex items-center">
            <a href="{{route('HumanResourceDashboard')}}" class="flex items-center text-sm font-medium text-gray-700 hover:text-customRed">
                <svg class="size-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg> Home
            </a>
        </li>
        <li class="flex items-center">
            <svg class="mx-1 text-gray-600 size-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{ route('ListLeaveRequestTable', ['type' => 'list']) }}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 text-nowrap">Approve Leave Request</a>
        </li>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 text-wrap">Approve Leave Request</h2>
    <div class="w-full pb-4 mt-4  bg-white rounded-t-lg shadow-md" >
        <div class="flex flex-wrap items-center justify-between p-4 pb-4 space-y-4 flex-column sm:flex-row min-[524px]:space-y-0">
                <div class="flex space-x-3 pl-1" style="padding-bottom: 0.05rem">
                {{-- Date Filter --}}
                <button id="dropdownRadioButton" data-dropdown-toggle="dateDropDown" class="inline-flex items-center hover:text-white text-gray-900 bg-navButton  h-10 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                    <svg class="w-3 h-3 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                    </svg>
                    {{$dateFilterName}}
                    <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dateDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                        <li>
                            <label for="date_filter-radio-0" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input id="date_filter-radio-0" type="radio" wire:model.live="date_filter" value="0" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-0" class="cursor-pointer"> &nbsp; All </label> </input>
                            </label>
                        </li>
                        <li>
                            <label for="date_filter-radio-1" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input id="date_filter-radio-1" type="radio" wire:model.live="date_filter" value="1" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white hover focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-1" class="cursor-pointer"> &nbsp;  Today </label> </input>
                            </label>
                        </li>
                        <li>
                            <label for="date_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input checked="" id="date_filter-radio-2" type="radio" wire:model.live="date_filter" value="2" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-2" class="cursor-pointer"> &nbsp; This Week </label> </input>
                            </label>
                        </li>
                        <li>
                            <label for="date_filter-radio-3" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input id="date_filter-radio-3" type="radio" wire:model.live="date_filter" value="3" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 ">  <label for="date_filter-radio-3" class="cursor-pointer"> &nbsp; This Month </label></input>
                            </label>
                        </li>
                        <li>
                            <label for="date_filter-radio-4" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input id="date_filter-radio-4" type="radio" wire:model.live="date_filter" value="4" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="date_filter-radio-4" class="cursor-pointer"> &nbsp; Last 6 Months </label> </input>
                            </label>
                        </li>
                        <li>
                            <label for="date_filter-radio-5" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input id="date_filter-radio-5" type="radio" wire:model.live="date_filter" value="5" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 ">  <label for="date_filter-radio-5" class="cursor-pointer"> &nbsp; This Year</label>  </input>
                            </label>
                        </li>
                    </ul>
                </div>

                {{-- Status Filter --}}
                <button id="dropdownRadioButton" data-dropdown-toggle="statusDropDown" class="inline-flex items-center hover:text-white text-gray-900 bg-navButton h-10 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm px-3 py-1.5" type="button">
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
                            <span class="font-semibold text-customRed">Supervisor Status </span>
                        </li>
                        <hr>
                        <li>
                            <label for="status_filter-radio-0" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-gray-200 hover:text-customGray1">
                                <input id="status_filter-radio-0" type="radio" wire:model.live="status_filter" value="0" name="status_filter-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 cursor-pointer focus:ring-gray-600 focus:ring-2">
                                <label for="status_filter-radio-0" class="ml-2 cursor-pointer">All</label>
                            </label>
                        </li>   
                        <li>
                            <label for="status_filter-radio-1" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customGreen hover:text-white ">
                                <input id="status_filter-radio-1" type="radio" wire:model.live="status_filter" value="1" name="status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2 "> <label for="status_filter-radio-1" class="cursor-pointer">&nbsp; Approved </label> </input>
                            </label>
                        </li>
                        <li>
                            <label for="status_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white ">
                                <input checked="" id="status_filter-radio-2" type="radio" wire:model.live="status_filter" value="2" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2 "> <label for="status_filter-radio-2" class="cursor-pointer"> &nbsp; Pending </label></input>
                            </label>
                        </li>
                        <li>
                            <label for="status_filter-radio-3"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-red-600 hover:text-white ">
                                <input id="status_filter-radio-3" type="radio" wire:model.live="status_filter" value="3" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-red-600 ring-2 ring-white focus:ring-red-600 focus:ring-2 "> <label for="status_filter-radio-3" class="cursor-pointer">&nbsp; Declined</label>  </input>
                            </label>
                        </li>
                        <li>
                            <label for="status_filter-radio-4"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                <input id="status_filter-radio-4" type="radio" wire:model.live="status_filter" value="4" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="status_filter-radio-4" class="cursor-pointer">&nbsp; Cancelled</label>  </input>
                            </label>
                        </li>
                    </ul>
                </div>

                {{-- Supervisor Filter --}}
                <button id="dropdownRadioButton" data-dropdown-toggle="supervisorDropDown" class="z-20 inline-flex items-center hover:text-white w-full md:w-auto text-gray-900 bg-navButton h-10 p-2 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm  py-1.5" style="padding-left: 0.60rem; padding-right: 0.60rem " type="button">
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
                <button id="dropdownRadioButton" data-dropdown-toggle="presidentDropDown" class="z-20 inline-flex items-center hover:text-white w-full md:w-auto text-gray-900 bg-navButton h-10 p-2 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm  py-1.5" style="padding-left: 0.60rem; padding-right: 0.60rem "  type="button">
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
            <div class="relative flex flex-row justify-self-end">
                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" id="table-search-users" wire:model.live.debounce.1000ms="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 bg-gray-50 focus:ring-customRed focus:border-customRed border-text w-264 min-[520px]:w-32 min-[555px]:w-36 min-[570px]:w-40 min-[585px]:w-44 min-[600px]:w-48  min-[616px]:w-52  min-[635px]:w-56 min-[650px]:w-60 min-[710px]:w-300" placeholder="Search">
                <!-- Filter Sidebar -->
                <div x-data="{
                    employeeTypesFilter: $wire.entangle('employeeTypesFilter'), 
                    insideDepartmentTypesFilter: $wire.entangle('insideDepartmentTypesFilter'), 
                    departmentTypesFilter: $wire.entangle('departmentTypesFilter'), 
                    genderTypesFilter: $wire.entangle('genderTypesFilter'), 
                    filterOpen: false,
                    employeeTypeOpen: false,
                    departmentTypeOpen: false,
                    insideDepartmentTypeOpen: false,
                    genderTypeOpen: false,
                    employeeTypeCount: 0,
                    departmentCount: 0,
                    companyCount: 0,
                    genderCount: 0,
                    clearAllFilters() {
                        document.querySelectorAll('.filter-checkbox').forEach(checkbox => checkbox.checked = false);
                        this.employeeTypeCount = 0;
                        this.departmentCount = 0;
                        this.companyCount = 0;
                        this.genderCount = 0;
                        @this.set('genderTypesFilter', this.genderTypesFilter);
                        @this.set('departmentTypesFilter', this.departmentTypesFilter);
                        @this.set('insideDepartmentTypesFilter', this.insideDepartmentTypesFilter);
                        @this.set('employeeTypesFilter', this.employeeTypesFilter);
                    }, 
                    applyAllFilters(){
                        @this.set('genderTypesFilter', this.genderTypesFilter);
                        @this.set('departmentTypesFilter', this.departmentTypesFilter);
                        @this.set('insideDepartmentTypesFilter', this.insideDepartmentTypesFilter);
                        @this.set('employeeTypesFilter', this.employeeTypesFilter);
                    }
                    }" class="absolute rounded-lg hover:text-customRed -right-1">
    
                    <!-- Filter Icon Button -->
                    <button @click="filterOpen = !filterOpen" class="size-9">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="text-gray-600 size-6 hover:text-customRed">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <div x-cloak x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 mt-2 space-y-2 overflow-y-auto bg-white border rounded shadow-lg max-h-80 w-40 sm:w-80  right-1">
                        <!-- Clear All Button -->
                        <div class="px-4 py-2">
                            <button @click="clearAllFilters;" wire:click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-customRed hover:text-red-900">
                                Clear All
                            </button>
                        </div>
                        <!-- Employee Type Dropdown Button -->
                        <div x-data="{ 
                            init() {
                                this.updateEmployeeTypeCount();  // Initialize employeeTypeCount on component mount
                            },
                            clearEmployeeFilters() {
                                // Iterate over all keys and set them to false
                                Object.keys(this.employeeTypesFilter).forEach(key => {
                                    this.employeeTypesFilter[key] = false;
                                });
                                this.updateEmployeeTypeCount();  // Update employeeTypeCount when filters are cleared
                            },
                            updateEmployeeTypeCount() {
                                // Calculate the count of checked filters
                                this.employeeTypeCount = Object.keys(this.employeeTypesFilter).filter(key => this.employeeTypesFilter[key]).length;
                            }
                            }" x-init="init()">
                                <div class="px-2">
                                    <button @click="employeeTypeOpen = !employeeTypeOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                        Employee Type
                                        <span class="float-right">&#9662;</span>
                                        <span x-show="employeeTypeCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="employeeTypeCount"></span>
                                    </button>
                                    <div x-show="employeeTypeOpen" @click.away="employeeTypeOpen = false" class="w-full mt-2 space-y-2">
                                        <hr class="my-4 border-gray-300">

                                        <!-- Independent Contractor -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter['INDEPENDENT CONTRACTOR']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Independent Contractor</label>
                                        </div>

                                        <!-- Internal Employee -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter['INTERNAL EMPLOYEE']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Internal Employee</label>
                                        </div>

                                        <!-- Intern -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter.INTERN" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Intern</label>
                                        </div>

                                        <!-- Probi -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter.PROBISIONARY" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Probisionary</label>
                                        </div>

                                        <!-- Project Based -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter['PROJECT BASED']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Project Based</label>
                                        </div>

                                        <!-- Regular -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter.REGULAR" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Regular</label>
                                        </div>

                                        <!-- Reliver -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter.RELIVER" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Reliver</label>
                                        </div>

                                        <div class="flex px-4 py-2 space-x-2">
                                            <!-- Clear Filters Button -->
                                            <button @click="clearEmployeeFilters(); $wire.set('employeeTypesFilter', employeeTypesFilter);" class="w-full px-4 py-2 text-xs font-medium bg-gray-200 rounded text-customGray1 hover:bg-gray-300">
                                                Clear Filters
                                            </button>
                                            <!-- Apply Filters Button -->
                                            <button @click="$wire.set('employeeTypesFilter', employeeTypesFilter); employeeTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white rounded bg-customRed hover:bg-red-700">
                                                Apply Filters
                                            </button>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- Department Dropdown Button -->
                        <div x-data="{ 
                            init() {
                                this.updateDepartmentCount();  // Initialize departmentCount on component mount
                            },
                            clearInsideDepartmentFilters() {
                                // Iterate over all keys and set them to false
                                Object.keys(this.insideDepartmentTypesFilter).forEach(key => {
                                    this.insideDepartmentTypesFilter[key] = false;
                                });
                                this.updateDepartmentCount();  // Update departmentCount when filters are cleared
                            },
                            updateDepartmentCount() {
                                // Calculate the count of checked filters
                                this.departmentCount = Object.keys(this.insideDepartmentTypesFilter).filter(key => this.insideDepartmentTypesFilter[key]).length;
                            }
                        }">
                            <div class="px-2">
                                <button @click="insideDepartmentTypeOpen = !insideDepartmentTypeOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Department
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="departmentCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="departmentCount"></span>
                                </button>
                                <div x-show="insideDepartmentTypeOpen" @click.away="insideDepartmentTypeOpen = false" class="w-full mt-2 space-y-2 insideDepartmentTypeOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter['HR AND ADMIN']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">HR and Admin</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter.Recruitment" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Recruitment</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter.CXS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">CXS</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter['Overseas Recruitment']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Overseas Recruitment</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter['PEI/SL Temps DO-174']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI/SL Temps DO-174</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter['Corporate Accounting and Finance']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Corporate Accounting and Finance</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="insideDepartmentTypesFilter['Accounting Operations']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Accounting Operations</label>
                                    </div>
                                    <div class="flex px-4 py-2 space-x-2">
                                        <!-- Clear Filters Button -->
                                        <button @click="clearInsideDepartmentFilters(); $wire.set('insideDepartmentTypesFilter', insideDepartmentTypesFilter);" class="w-full px-4 py-2 text-xs font-medium bg-gray-200 rounded text-customGray1 hover:bg-gray-300">
                                            Clear Filters
                                        </button>
                                        <!-- Apply Filters Button -->
                                        <button @click="$wire.set('insideDepartmentTypesFilter', insideDepartmentTypesFilter); insideDepartmentTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white rounded bg-customRed hover:bg-red-700">
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Company Dropdown Button -->
                        <div x-data="{ 
                            init() {
                                this.updateCompanyCount();  // Initialize companyCount on component mount
                            },
                            clearCompanyFilters() {
                                // Iterate over all keys and set them to false
                                Object.keys(this.departmentTypesFilter).forEach(key => {
                                    this.departmentTypesFilter[key] = false;
                                });
                                this.updateCompanyCount();  // Update companyCount when filters are cleared
                            },
                            updateCompanyCount() {
                                // Calculate the count of checked filters
                                this.companyCount = Object.keys(this.departmentTypesFilter).filter(key => this.departmentTypesFilter[key]).length;
                            }
                        }">
                            <div class="px-2">
                                <button @click="departmentTypeOpen = !departmentTypeOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Company
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="companyCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="companyCount"></span>
                                </button>
                                <div x-show="departmentTypeOpen" @click.away="departmentTypeOpen = false" class="w-full mt-2 space-y-2 departmentTypeOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="departmentTypesFilter.PEI" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="departmentTypesFilter['SL SEARCH']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">SL SEARCH</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="departmentTypesFilter['SL TEMPS']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">SL TEMPS</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="departmentTypesFilter.WESEARCH" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">WESEARCH</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="departmentTypesFilter['PEI-UPSKILLS']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">PEI-UPSKILLS</label>
                                    </div>
                                    <div class="flex px-4 py-2 space-x-2">
                                        <!-- Clear Filters Button -->
                                        <button @click="clearCompanyFilters(); $wire.set('departmentTypesFilter', departmentTypesFilter);" class="w-full px-4 py-2 text-xs font-medium bg-gray-200 rounded text-customGray1 hover:bg-gray-300">
                                            Clear Filters
                                        </button>
                                        <!-- Apply Filters Button -->
                                        <button @click="$wire.set('departmentTypesFilter', departmentTypesFilter); departmentTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white rounded bg-customRed hover:bg-red-700">
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Gender Dropdown Button -->
                        <div x-data="{ 
                                clearGenderFilters() {
                                    // Iterate over all keys and set them to false
                                    Object.keys(this.genderTypesFilter).forEach(key => {
                                        this.genderTypesFilter[key] = false;
                                    });
                                    this.updateGenderCount(); // Update count after clearing filters
                                },
                                updateGenderCount() {
                                    // Update count using document.querySelectorAll
                                    this.genderCount = Object.keys(this.genderTypesFilter).filter(key => this.genderTypesFilter[key]).length;
                                }
                            }">
                            <div class="px-2 pb-2">
                                <button @click="genderTypeOpen = !genderTypeOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Gender
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="genderCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="genderCount"></span>
                                </button>
                                <div x-show="genderTypeOpen" @click.away="genderTypeOpen = false" class="w-full mt-2 space-y-2 genderTypeOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="genderTypesFilter.Female" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateGenderCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Female</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" x-model="genderTypesFilter.Male" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateGenderCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Male</label>
                                    </div>
                                    <div class="flex px-4 py-2 space-x-2">
                                        <!-- Clear Filters Button -->
                                        <button @click="clearGenderFilters(); $wire.set('genderTypesFilter', genderTypesFilter);" class="w-full px-4 py-2 text-xs font-medium bg-gray-200 rounded text-customGray1 hover:bg-gray-300">
                                            Clear Filters
                                        </button>
                                        <!-- Apply Filters Button -->
                                        <button @click="$wire.set('genderTypesFilter', genderTypesFilter); genderTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white rounded bg-customRed hover:bg-red-700">
                                            Apply Filters
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show="employeeTypeOpen == false && genderTypeOpen == false && departmentTypeOpen == false && insideDepartmentTypeOpen == false" class="flex justify-between px-4 py-2 pb-6 space-x-2">
                            <!-- Apply All Button -->
                            <button @click="applyAllFilters();" class="w-full text-xs font-medium text-right text-customRed hover:text-red-900">
                                Apply All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <div class="overflow-x-auto">
            <table class="w-full pb-4 overflow-x-scroll text-sm text-left text-gray-500 h-fit">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr class="*:text-nowrap *:px-6 *:py-3 *:text-center">
                        <th scope="col"> No. </th>
                        <th scope="col"> Employee Information </th>
                        <th scope="col"> Status </th>
                        <th scope="col"> Date Applied </th>
                        <th scope="col"> Leave Type </th>
                        <th scope="col"> Leave Details </th>
                        <th scope="col"> Action </th>
                    </tr>
                </thead>
                <div>
                    <tbody wire:poll.10s class="pb-4">
                        @if ($LeaveRequestData->isEmpty())
                            <tr class="bg-white border-b hover:bg-gray-50 ">
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
                                        <th scope="row" class="flex items-center justify-center h-full px-6 py-4 text-gray-900 whitespace-nowrap">
                                            <div class="flex flex-col items-center justify-center h-full">
                                                <div class="text-base font-semibold">
                                                    {{$leaverequest->employee->first_name}} {{$leaverequest->employee->middle_name}} {{$leaverequest->employee->last_name}}
                                                </div>
                                                <div class="mt-1 font-normal text-gray-500">
                                                    <span class="text-customRed">{{$leaverequest->employee_id}}</span> | {{$leaverequest->employee->department}}
                                                </div>
                                            </div>
                                        </th>
                                        @if($leaverequest->status == "Pending")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                                @if($leaverequest->mode_of_application == "Credit Leave" || $leaverequest->mode_of_application == "Advise Slip" )
                                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-green-300 me-2">
                                                        <svg class="w-6 h-6 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                            <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                            <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                        </svg> Pending
                                                    </span>
                                                @else
                                                    <div class="flex items-center justify-center space-x-4">
                                                        <!-- HR Approval Status -->
                                                        @if ($leaverequest->approved_by_supervisor == 1)
                                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 me-2">
                                                                <svg class="w-6 h-6 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                                </svg> Supervisor : Approved
                                                            </span>
                                                        @else
                                                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-200 rounded-lg bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300">
                                                                <svg class="w-6 h-6 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                                    <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                                    <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                                </svg> Supervisor : {{$leaverequest->approved_by_supervisor ? 'Approved' : 'Pending'}}
                                                            </span>
                                                        @endif
                                                        @if ($leaverequest->approved_by_president == 1)
                                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 me-2">
                                                                <svg class="w-6 h-6 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                                </svg> President : Approved
                                                            </span>
                                                        @else
                                                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-200 rounded-lg bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300">
                                                                <svg class="w-6 h-6 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                                    <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                                    <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                                </svg> President : {{$leaverequest->approved_by_supervisor ? 'Approved' : 'Pending'}}
                                                            </span>
                                                        @endif
                                                    </div>
                                                @endif
                                            </th>
                                        @elseif($leaverequest->status == "Approved")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 me-2">
                                                    <svg class="w-6 h-6 mr-1 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                    </svg> Approved &nbsp;
                                                </span>
                                            </th>
                                        @elseif($leaverequest->status == "Cancelled")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-gray-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 me-2">
                                                    <svg class="w-6 h-6 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                    </svg> Cancelled &nbsp;
                                                </span>
                                            </th>
                                        @else
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                                <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                                    <svg class="w-6 h-6 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                                    </svg> {{ $leaverequest->status }}
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
                                            <div class="flex items-center justify-center space-x-2">
                                                <!-- View Button -->
                                                <a onclick="location.href='{{ route('ApproveListLeaveRequestForm', ['type' => 'edit', 'index' => $leaverequest->uuid]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600">
                                                    Edit
                                                </a>
                                                <!-- Change Status Button -->
                                                @if ($leaverequest->status != "Cancelled" && $leaverequest->status != "Completed")
                                                <button @click="openButtonCrudModal('{{$leaverequest->form_id}}', '{{$leaverequest->status}}')"
                                                    type="button" 
                                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 cursor-pointer hover:text-red-600">
                                                    Change Status
                                                </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                            <div x-cloak x-data="{ openCrudModal: false, currentFormId: null, openConfirmation: false }" x-ref="crudModal"
                                x-init="
                                    $el.addEventListener('modal-open', (event) => {
                                        $wire.set('status', event.detail.status)
                                        $wire.set('currentFormId', event.detail.id)
                                        openCrudModal = true;
                                    });
                                    $el.addEventListener('modal-close', () => openCrudModal = false);"
                                x-show="openCrudModal" id="crud_modal" @keydown.escape.window="openCrudModal = false" tabindex="-1"
                                class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0">
                                <div class="relative w-full max-w-md p-4">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b rounded-t">
                                            <h3 class="text-lg font-semibold text-gray-900">Change Status</h3>
                                            <button @click="openCrudModal = false" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            <div class="grid grid-cols-1 gap-4 mb-4 " x-data="{typeOfKey: $wire.entangle('key'), typeOfStatus: $wire.entangle('status')}">
                                                <div>
                                                    <label for="category" class="block mb-2 text-sm font-semibold text-gray-900">Status</label>
                                                    <select id="category" wire:model.live="status" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                                        <option class="hover:bg-customRed hover:text-white" value="Approved">Approved</option>
                                                        <option class="hover:bg-customRed hover:text-white" value="Pending">Pending</option>
                                                        <option class="hover:bg-customRed hover:text-white" value="Declined">Declined</option>
                                                    </select>
                                                </div>
                                                <template x-if="typeOfKey  === 'list' && (typeOfStatus === 'Approved'  || typeOfStatus === 'Declined') ">
                                                    <div id="person_container">
                                                        <label for="person" class="block mb-2 text-sm font-semibold text-gray-900">As</label>
                                                        <select id="person" wire:model.live="person" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                                            <option class="hover:bg-customRed hover:text-white" value="Null">Select</option>
                                                            <option class="hover:bg-customRed hover:text-white" value="President">President</option>
                                                            <option class="hover:bg-customRed hover:text-white" value="Supervisor">Supervisor</option>
                                                        </select>
                                                        @error('person')
                                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('person_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('person_container').focus();" >
                                                                <span class="text-xs text-red-500">{{$message}}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </template>
                                                <button @click="openConfirmation = true" id="updateButton" type="submit" class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white ring-1 ring-customRed shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center justify-self-end">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Confirmation Modal -->
                                <div x-show="openConfirmation" x-ref="confirmModal" tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 flex items-center justify-center w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50 z-60"
                                    @trigger-close.window="openConfirmation = false;"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-200"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0">
                                    <div class="relative w-full max-w-md max-h-full p-4">
                                        <div class="relative bg-white rounded-lg shadow">
                                            <button @click="openConfirmation = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                            <form wire:submit.prevent="changeStatus" method="POST" class="p-4 md:p-5">
                                                <div class="p-4 text-center md:p-5">
                                                    <svg class="w-12 h-12 mx-auto mb-4 text-amber-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to proceed</h3>
                                                    <button type="submit" @click="openConfirmation = false" class="text-white bg-amber-600 hover:bg-amber-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes
                                                    </button>
                                                    <button @click="openConfirmation = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100" data-modal-hide="popup-modal">
                                                        No
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                                @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Leave Request Updated'; setTimeout(() => showToast = false, 3000)"
                                @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.';  setTimeout(() => showToast = false, 3000)">
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
            </table>
        </div>
    </section>
    <div class="w-full p-4 bg-gray-100 rounded-b-lg">
        {{ $LeaveRequestData->links() }}
    </div>
    <div wire:loading wire:target="changeStatus" class="z-50 load-over">
        <div wire:loading wire:target="changeStatus  " class="z-50 loading-overlay">
            <div class="flex flex-col items-center justify-center">
                <div class="spinner"></div>
                <p>Updating Table...</p>
            </div>
        </div>
    </div>

    <!-- Loading screen -->
    <div wire:loading wire:target="genderTypesFilter, employeeTypesFilter, insideDepartmentTypesFilter, departmentTypesFilter, status_filter, date_filter, search," class="fixed inset-x-0 top-1/4 flex justify-center pointer-events-none z-50">
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

</main>

<script>
    function openButtonCrudModal(id, status) {
        const modal = document.getElementById('crud_modal');
        if (modal) {
            const event = new CustomEvent('modal-open', { 
                detail: { 
                    id: id, 
                    status: status 
                } 
            });
            modal.dispatchEvent(event);
        }
    }

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', () => {
            window.dispatchEvent(new CustomEvent('trigger-success'));
            const crudModal = document.querySelector(`[x-ref="crudModal"]`);
            const crud = Alpine.$data(crudModal);
            if (crud) {
                crud.openConfirmation = false; 
                crud.openCrudModal = false; 
            }
        });
        Livewire.on('triggerError', () => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const crudModal = document.querySelector(`[x-ref="crudModal"]`);
            const crud = Alpine.$data(crudModal);
            if (crud) {
                crud.openConfirmation = false; 
                crud.openCrudModal = false; 
            }
        });
    });
</script>