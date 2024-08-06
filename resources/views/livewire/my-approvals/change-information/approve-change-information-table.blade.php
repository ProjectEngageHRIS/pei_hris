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
                <svg class="w-3 h-3 text-gray-600 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('ApproveChangeInformationTable')}}" class="ms-1 text-sm font-semibold text-gray-900 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Requests</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Change Information Requests</h2>
        
        <div class="flex justify-end">
            {{-- <button type="button" onclick="location.href='{{ route('ItHelpDeskForm') }}'" class="text-customRed mb-8 ring-1 ring-customRed bg-white hover:bg-customRed hover:text-white focus:ring-4 focus:ring-customRed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit a Concern</button> --}}
        </div>

        <div class="shadow-md overflow-x-auto rounded-t-lg bg-white pb-4 w-full" >
            <div class="flex flex-wrap items-center justify-between p-4 pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
                <div>
                   {{-- Date Filter --}}
                   <button id="dropdownRadioButton" data-dropdown-toggle="dateDropDown" class="shadow hover:text-white z-50 inline-flex items-center h-10 p-2 hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm px-3 py-1.5" type="button">
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
                    <button id="dropdownRadioButton" data-dropdown-toggle="statusDropDown" class=" z-50 inline-flex items-center hover:text-white text-gray-900 bg-navButton  h-10 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed focus:bg-customRed focus:text-white font-medium rounded-lg text-sm px-3 py-1.5" type="button">
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
                                    <input id="status_filter-radio-1" type="radio" wire:model.live="status_filter" value="1" name="status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2 "> <label for="status_filter-radio-1" class="cursor-pointer">&nbsp; Approved </label> </input>
                                </label>
                            </li>
                            <li>
                                <label for="status_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white ">
                                    <input checked="" id="status_filter-radio-2" type="radio" wire:model.live="status_filter" value="2" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2 "> <label for="status_filter-radio-2" class="cursor-pointer"> &nbsp; Pending </label></input>
                                </label>
                            </li>
                            <li>
                                <label for="status_filter-radio-3"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                    <input id="status_filter-radio-3" type="radio" wire:model.live="status_filter" value="3" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="status_filter-radio-3" class="cursor-pointer">&nbsp; Declined</label>  </input>
                                </label>
                            </li>
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
                        <div class="absolute rounded-lg  hover:text-customRed" style="right: 70px">
                            <div x-data="{
                                employeeTypesFilter: @entangle('employeeTypesFilter'), 
                                insideDepartmentTypesFilter: @entangle('insideDepartmentTypesFilter'), 
                                departmentTypesFilter: @entangle('departmentTypesFilter'), 
                                genderTypesFilter: @entangle('genderTypesFilter'), 
                                filterOpen: false,
                                employeeTypeOpen: false,
                                departmentTypeOpen: false,
                                insideDepartmentTypeOpen: false,
                                genderTypeOpen: false,
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
                                    this.genderCount = document.querySelectorAll('.genderTypeOpen .filter-checkbox:checked').length;
                                },
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
                                }" class="relative">
        
                                <!-- Filter Icon Button -->
                                <button @click="filterOpen = !filterOpen" class="flex items-center justify-center w-10 h-10 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6  text-customGray hover:text-customRed">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                                    </svg>
                                </button>
                                <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 w-64 mt-2 space-y-2 bg-white border rounded shadow-lg right-1">
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
                                                <div class="flex items-center px-4 py-2">
                                                    <input type="checkbox" x-model="employeeTypesFilter.Internals" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                                    <label class="ml-2 text-xs font-medium text-customGray1">Internals</label>
                                                </div>
                                                <div class="flex items-center px-4 py-2">
                                                    <input type="checkbox" x-model="employeeTypesFilter.OJT" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                                    <label class="ml-2 text-xs font-medium text-customGray1">OJT</label>
                                                </div>
                                                <div class="flex items-center px-4 py-2">
                                                    <input type="checkbox" x-model="employeeTypesFilter['PEI-CCS']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                                    <label class="ml-2 text-xs font-medium text-customGray1">PEI-CCS</label>
                                                </div>
                                                <div class="flex items-center px-4 py-2">
                                                    <input type="checkbox" x-model="employeeTypesFilter.RAPID" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                                    <label class="ml-2 text-xs font-medium text-customGray1">Rapid</label>
                                                </div>
                                                <div class="flex items-center px-4 py-2">
                                                    <input type="checkbox" x-model="employeeTypesFilter.RAPIDMOBILITY" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                                    <label class="ml-2 text-xs font-medium text-customGray1">Rapid Mobility</label>
                                                </div>
                                                <div class="flex items-center px-4 py-2">
                                                    <input type="checkbox" x-model="employeeTypesFilter.UPSKILLS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                                    <label class="ml-2 text-xs font-medium text-customGray1">Upskills</label>
                                                </div>
                                                <!-- More checkboxes... -->
                                                <div class="px-4 py-2 flex space-x-2">
                                                    <!-- Clear Filters Button -->
                                                    <button @click="clearEmployeeFilters(); $wire.set('employeeTypesFilter', employeeTypesFilter);" class="w-full px-4 py-2 text-xs font-medium text-customGray1 bg-gray-200 hover:bg-gray-300 rounded">
                                                        Clear Filters
                                                    </button>
                                                    <!-- Apply Filters Button -->
                                                    <button @click="$wire.set('employeeTypesFilter', employeeTypesFilter); employeeTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white bg-customRed hover:bg-red-700 rounded">
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
                                                <div class="px-4 py-2 flex space-x-2">
                                                    <!-- Clear Filters Button -->
                                                    <button @click="clearInsideDepartmentFilters(); $wire.set('insideDepartmentTypesFilter', insideDepartmentTypesFilter);" class="w-full px-4 py-2 text-xs font-medium text-customGray1 bg-gray-200 hover:bg-gray-300 rounded">
                                                        Clear Filters
                                                    </button>
                                                    <!-- Apply Filters Button -->
                                                    <button @click="$wire.set('insideDepartmentTypesFilter', insideDepartmentTypesFilter); insideDepartmentTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white bg-customRed hover:bg-red-700 rounded">
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
                                                <div class="px-4 py-2 flex space-x-2">
                                                    <!-- Clear Filters Button -->
                                                    <button @click="clearCompanyFilters(); $wire.set('departmentTypesFilter', departmentTypesFilter);" class="w-full px-4 py-2 text-xs font-medium text-customGray1 bg-gray-200 hover:bg-gray-300 rounded">
                                                        Clear Filters
                                                    </button>
                                                    <!-- Apply Filters Button -->
                                                    <button @click="$wire.set('departmentTypesFilter', departmentTypesFilter); departmentTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white bg-customRed hover:bg-red-700 rounded">
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
                                                <div class="px-4 py-2 flex space-x-2">
                                                    <!-- Clear Filters Button -->
                                                    <button @click="clearGenderFilters(); $wire.set('genderTypesFilter', genderTypesFilter);" class="w-full px-4 py-2 text-xs font-medium text-customGray1 bg-gray-200 hover:bg-gray-300 rounded">
                                                        Clear Filters
                                                    </button>
                                                    <!-- Apply Filters Button -->
                                                    <button @click="$wire.set('genderTypesFilter', genderTypesFilter); genderTypeOpen = false;" class="w-full px-4 py-2 text-xs font-medium text-white bg-customRed hover:bg-red-700 rounded">
                                                        Apply Filters
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div x-show="insideDepartmentTypeOpen == false && genderTypeOpen == false && departmentTypeOpen == false && insideDepartmentTypeOpen == false" class="px-4 pb-6 py-2 flex space-x-2 justify-between">
                                        <!-- Apply All Button -->
                                        <button @click="applyAllFilters();" class="w-full text-xs font-medium text-right text-customRed hover:text-red-900">
                                            Apply All
                                        </button>
                                    </div>
                                    
                                
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <table class="w-full h-fit text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 pb-4" style="overflow-y:hidden;" >
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        {{-- <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th> --}}
                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Employee Information
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Application Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Actions
                        </th>
                    </tr>
                </thead>
                <div>
                    <div>
                        <tbody class="pb-4">

                        @if ($ChangeInfoData->isEmpty())
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                    <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px"> 
                                        <div class="flex justify-center " style="padding-top: 40px">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mt-1 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                            <p class="text-customRed text-xl font-semibold items-center "> Nothing to show</p>
                                        </div>
                                    </th>
                                </tr>
                        @else
                            @php
                                $ctr = 0;
                                $pageIndex = ($ChangeInfoData->currentpage() - 1) * $ChangeInfoData->perpage() + $ctr;
                            @endphp
                            @foreach ($ChangeInfoData as $index => $change_info)
                            @php
                                $ctr = $ctr + 1;
                            @endphp
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    {{-- <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td> --}}
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$pageIndex + $ctr}}
                                    </th>
                                    <th scope="row" class="flex items-center justify-center px-6 py-4 text-gray-900 whitespace-nowrap h-full">
                                        <div class="flex flex-col items-center justify-center h-full">
                                            <div class="text-base font-semibold">
                                                {{$change_info->employee->first_name}} {{$change_info->employee->middle_name}} {{$change_info->employee->last_name}}
                                            </div>
                                            <div class="font-normal text-gray-500 mt-1">
                                                <span class="text-customRed">{{$change_info->employee_id}}</span> | {{$change_info->employee->department}}
                                            </div>
                                        </div>
                                    </th>
                                    </th>
                                    @if($change_info->status == "Pending")
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                        <span  class="text-gray-200 text-xs bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-amber-300 dark:hover:bg-amber-600 dark:focus:ring-amber-800">
                                            <svg class="grid grid-cols-1 text-xs w-6 h-6 text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                            </svg>    
                                            {{ $change_info->status }} &nbsp;
                                        </span>
                                    </th>
                                    @elseif($change_info->status == "Approved")
                                        <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                            <span  class="text-gray-200 text-xs bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                <svg class="w-6 h-6 text-white mr-1 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                </svg>
                                                {{ $change_info->status }} &nbsp;
                                            </span>
                                        </th>
                                    @else
                                    <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">
                                        <span  class="text-gray-200 text-xs bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg  px-2 py-1 text-center inline-flex items-center me-2 dark:bg-red-300 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                            <svg class="w-6 h-6 text-white mr-1 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>   
                                            {{ $change_info->status }}
                                        </span>
                                    </th>
                                    @endif

                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$change_info->application_date}}
                                    </td>

                                    <td class="items-center py-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a onclick="location.href='{{ route('ApproveChangeInformationForm', ['index' => $change_info->uuid]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600">
                                                Edit
                                            </a>
                                            <!-- Change Status Button -->
                                            @if ($change_info->status != "Cancelled" && $change_info->status != "Completed")
                                            <button @click="openButtonCrudModal('{{$change_info->form_id}}', '{{$change_info->status}}')"
                                                type="button" 
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-500 cursor-pointer hover:text-red-600">
                                                Change Status
                                            </button>
                                            @endif
                                        </div>
                                    </td>
                                    
                                    {{-- <td class="items-center text-center py-4">
                                        <div class="top-0" x-data="{ isOpen: false }" @click.away="isOpen = false">
                                            <button @click="isOpen = !isOpen; adjustDropdownPosition('{{ $loop->index }}')" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                                </svg>
                                            </button>
                                            <div x-show="isOpen" :class="{ 'left-0': isLeftAligned, 'right-0': !isLeftAligned }" class="absolute mt-2 z-40 bg-white divide-y divide-gray-300 rounded-lg shadow w-44 dark:bg-gray-700" id="dropdown{{ $loop->index }}">
                                                <!-- Dropdown content -->
                                                    <ul class="py-2 text-sm divide-y-2 text-gray-700 dark:text-gray-200">
                                                        <li>
                                                            <a onclick="location.href='{{ route('ApproveChangeInformationForm', ['index' => $change_info->uuid]) }}'" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                        </li>
                                                    </ul>
                                                @if ($change_info->status != "Cancelled" && $change_info->status != "Approved" )
                                                    <div class="py-2">
                                                        <a id="cancel_button_{{ $loop->index }}" class="block px-4 py-2 cursor-pointer text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white" @click="openCancelModal('{{ $loop->index}}')">Cancel</a>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </td> --}}

                                    <div id="popup-modal_{{ $loop->index }}" tabindex="-1" class="hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button type="button" @click="closeCancelModal('{{ $loop->index }}')"  class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5">
                                                    <div class="p-4 md:p-5 text-center">
                                                        <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm cancellation?</h3>
                                                        <button wire:click="cancelForm('{{$change_info->uuid}}')"  class="text-white bg-red-600 hover:bg-red-800   font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes
                                                        </button>
                                                        <button id="close_button" @click="closeCancelModal('{{ $loop->index }}')" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100  focus:z-10  dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            No
                                                        </button>
                                                    </div>
                                                </div>
                                
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </div>
                    <div x-cloak x-data="{ openCrudModal: false, currentFormId: null, openConfirmation: false }" x-ref="crudModal"
                    x-init="
                        $el.addEventListener('modal-open', (event) => {
                            $wire.set('status', event.detail.status)
                            $wire.set('currentFormId', event.detail.id)
                            openCrudModal = true;
                        });
                        $el.addEventListener('modal-close', () => openCrudModal = false);"
                    x-show="openCrudModal" id="crud_modal" @keydown.escape.window="openCrudModal = false" tabindex="-1"
                    class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0">
                    <div class="relative w-full max-w-md p-4">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Change Status</h3>
                                <button @click="openCrudModal = false" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <div class="grid grid-cols-1 gap-4 mb-4 ">
                                    <div>
                                        <label for="category" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Status</label>
                                        <select id="category" wire:model="status" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option class="hover:bg-customRed hover:text-white" value="Completed">Completed</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Pending">Pending</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Report">Report</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Request to Complete">Request to Complete</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <button @click="openConfirmation = true" id="updateButton" type="submit" class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white ring-1 ring-customRed shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-end">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Confirmation Modal -->
                    <div x-show="openConfirmation" x-ref="confirmModal" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-60 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button @click="openConfirmation = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <form wire:submit.prevent="changeStatus" method="POST" class="p-4 md:p-5">
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-amber-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to proceed</h3>
                                        <button type="submit" class="text-white bg-amber-600 hover:bg-amber-800 dark:focus:ring-amber-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes
                                        </button>
                                        <button @click="openConfirmation = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" data-modal-hide="popup-modal">
                                            No
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                        @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Change Request Updated'; setTimeout(() => showToast = false, 3000)"
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
            </table>

        </div>
        <div class="p-4 bg-gray-100 w-full rounded-b-lg">
            {{ $ChangeInfoData->links() }}
        </div>

        <div wire:loading wire:target="changeStatus, genderTypesFilter, employeeTypesFilter, insideDepartmentTypesFilter, departmentTypesFilter" class="load-over">
            <div wire:loading wire:target="changeStatus, genderTypesFilter, employeeTypesFilter, insideDepartmentTypesFilter, departmentTypesFilter" class="loading-overlay">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Updating...</p>
                </div>
            </div>
        </div>
        

    </div>
</div> 
</div>

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

    // function clearEmployeeFilters() {
    //     this.employeeTypesFilter = {
    //         Internals: false,
    //         OJT: false,
    //         'PEI-CCS': false,
    //         RAPID: false,
    //         RAPIDMOBILITY: false,
    //         UPSKILLS: false
    //         // Add more keys here if needed
    //     };
    //     this.employeeTypeOpen = false;
    // }
    
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
