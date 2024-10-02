<div class="flex flex-col space-y-6">
    <div wire:ignore class="flex flex-col items-stretch gap-4 md:flex-row justify-stretch md:justify-center">
        <!-- Employee Type -->
        <div class="p-4  bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">
            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Employee Type</h5>
                    </div>
                </div>
            </div>
            <!-- Employee Type Chart -->
            <div class="py-6 w-full" id="pie-chart-1"></div>
        </div>
        <!-- Deparment -->
        <div class="p-4 bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">
            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Department</h5>
                    </div>
                </div>
            </div>
            <!-- Department Chart -->
            <div class="py-6" id="pie-chart-2"></div>
        </div>

        <!-- Company -->
        <div class="p-4 bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">

            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Company</h5>
                    </div>
                </div>
            </div>
            <!-- Company Chart -->
            <div class="py-6" id="pie-chart-3"></div>
        </div>

        <!-- Gender -->
        <div class="p-4 bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">

            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Gender</h5>
                    </div>
                </div>
            </div>
            <!-- Company Chart -->
            <div class="py-6" id="pie-chart-4"></div>
        </div>
    </div>
    <!-- Employee Table -->
    <div class="relative shadow-md" x-data="{ showModal: false }">
        <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg">
            <!-- Add user button -->
            <button onclick="window.location.href = '{{route('createEmployee')}}'" class="text-nowrap inline-flex items-center text-customRed bg-navButton shadow hover:bg-customRed hover:text-white font-medium rounded-lg text-sm px-3 py-1.5">
                Add employee
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 ml-1">
                    <path d="M8.5 4.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 13c.552 0 1.01-.452.9-.994a5.002 5.002 0 0 0-9.802 0c-.109.542.35.994.902.994h8ZM12.5 3.5a.75.75 0 0 1 .75.75v1h1a.75.75 0 0 1 0 1.5h-1v1a.75.75 0 0 1-1.5 0v-1h-1a.75.75 0 0 1 0-1.5h1v-1a.75.75 0 0 1 .75-.75Z"/>
                </svg>
            </button>

            {{-- Search bar  --}}
            <div class="flex flex-row overflow-hidden justify-self-end">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                        <svg class="text-gray-500 size-3 sm:size-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users" wire:model.live.debounce.350ms="search" class="w-full text-xs text-gray-900 truncate border border-gray-300 shadow-inner sm:text-sm max-w-56 h-9 rounded-8px ps-10 pe-10 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
                </div>
                <!-- Filter Sidebar -->
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
                    }" class="absolute rounded-lg right-3 hover:text-customRed">
    
                    <!-- Filter Icon Button -->
                    <button @click="filterOpen = !filterOpen" class="size-9 right-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4 sm:size-6 text-customGray hover:text-customRed">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <div x-cloak  x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 mt-2 space-y-2 overflow-y-auto bg-white border rounded shadow-lg max-h-80 w-80 right-1">
                        <!-- Clear All Button -->
                        <div class="px-4 py-2">
                            <button @click="clearAllFilters;" wire:click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-customRed hover:text-red-900">
                                Clear All
                            </button>
                        </div>
                        <!-- Employee Type Dropdown Button -->
                        <div x-data="{ 
                            {{-- employeeTypeCount: 0,  // Add employeeTypeCount to x-data --}}
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

                                        <!-- Independent Consultant -->
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" x-model="employeeTypesFilter['INDEPENDENT CONSULTANT']" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Independent Consultant</label>
                                        </div>

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

                                        <!-- More checkboxes... -->
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

                                    {{-- this.genderCount = document.querySelectorAll('.genderTypeOpen .filter-checkbox:checked').length; --}}
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
        <div class="overflow-x-auto rounded-b-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-nowrap">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Joined Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-nowrap">
                            Action/s
                        </th>
                    </tr>
                </thead>
                <tbody class="pb-4">
                    @if ($EmployeeData->isEmpty())
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                            <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px">
                                <div class="flex justify-center " style="padding-top: 40px">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mt-1 mr-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                    <p class="items-center text-xl font-semibold text-customRed"> Nothing to show</p>
                                </div>
                            </th>
                        </tr>
                    @else
                        @php
                            $ctr = 0;
                            $pageIndex = ($EmployeeData->currentpage() - 1) * $EmployeeData->perpage() + $ctr;
                        @endphp
                        @foreach ($EmployeeData as $index => $employee)
                            @php
                                $ctr = $ctr + 1;
                            @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$pageIndex + $ctr}}
                                </th>
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                    @php
                                        $employee_image = $this->getImage($employee->emp_image ?? null);
                                    @endphp
                                    @if($employee_image)
                                            <img class="w-8 h-8 rounded-full" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="Profile Picture">
                                    @else
                                            <img class="w-8 h-8 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                                    @endif
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{$employee->first_name}}  {{$employee->middle_name}} {{$employee->last_name}}</div>
                                        <div class="font-normal text-gray-500">{{$employee->employee_id}}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4 ">
                                    {{$employee->inside_department}}
                                </td>
                                <td class="px-6 py-4 " >
                                    {{$employee->department}}
                                </td>
                                <td class="px-6 py-4 " >
                                    {{$employee->current_position}}
                                </td>
                                <td class="px-6 py-4 " >
                                    {{$employee->employee_type}}
                                </td>
                                <td class="px-6 py-4 " >
                                    {{$employee->start_of_employment}}
                                </td>
                                <td x-cloak x-data="{currentViewModal: null, openViewModal: false}" x-ref="view-modal" class="items-center py-4 text-center">
                                    <div class="flex items-center justify-center space-x-2" x-data="{ isOpen: false }">
                                        <!-- View Button -->
                                        <a @click="openViewModal = true; currentViewModal = '{{$loop->index}}' " class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600 ">
                                            View
                                        </a>
                                    </div>
                                        <!-- Modal Background -->
                                        <div x-show="openViewModal && currentViewModal == '{{ $loop->index }}'"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            tabindex="-1"
                                            aria-hidden="true"
                                            class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50">
                                        
                                        <!-- Modal Content -->
                                        <div x-show="openViewModal && currentViewModal == '{{ $loop->index }}'"
                                                x-transition:enter="transition ease-out duration-300"
                                                x-transition:enter-start="transform opacity-0 scale-90"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-200"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-90"
                                                class="relative w-full max-w-2xl max-h-full p-4 bg-white rounded-lg shadow">
                                            
                                            <!-- Modal Header -->
                                            <div class="flex items-center justify-between p-4 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Employee Information
                                                </h3>
                                                <button @click="openViewModal = false"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            
                                            <!-- Modal Body -->
                                            <div class="flex p-4">
                                                <!-- Right Picture Area -->
                                                <div class="flex items-start justify-center mr-5 w-44">
                                                    @if($employee_image)
                                                        <img class="w-full h-auto border-4 border-gray-200 rounded-lg shadow-2xl" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="Profile Picture">
                                                    @else
                                                        <img class="w-full h-auto border-4 border-gray-200 rounded-lg shadow-2xl" src="{{ asset('assets/nophoto.png') }}" alt="No Picture Yet Image">
                                                    @endif
                                                </div>
                                                <!-- Left Content Area -->
                                                <div class="w-3/4 space-y-4">
                                                    <p class="flex items-center text-sm leading-relaxed text-customRed">
                                                        <span class="font-semibold">Employee Number:</span>
                                                        <span class="ml-2">{{$employee->employee_id}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Name:</span>
                                                        <span class="ml-2">{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Department:</span>
                                                        <span class="ml-2">{{$employee->inside_department}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Company:</span>
                                                        <span class="ml-2">{{$employee->department}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Position:</span>
                                                        <span class="ml-2">{{$employee->current_position}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Type:</span>
                                                        <span class="ml-2">{{$employee->employee_type}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Joined Date:</span>
                                                        <span class="ml-2">{{$employee->start_of_employment}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                        <!-- Modal Footer -->
                                        <div class="flex items-center p-4 border-t border-gray-200 rounded-b">
                                            <!-- Button Container for View and Edit -->
                                            <div class="flex">
                                                <!-- View More Button -->
                                                <button @click="window.location.href = '{{ route('ViewEmployee', ['index' => $employee->employee_id]) }}'"
                                                    type="button"
                                                    class="flex items-center text-white bg-customRed hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                    View More
                                                </button>
                                                
                                                <!-- Edit Button -->
                                                <button @click="window.location.href = '{{ route('EditEmployee', ['index' => $employee->employee_id]) }}'"
                                                    type="button"
                                                    class="flex items-center text-white bg-customRed hover:bg-red-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                                    </svg>
                                                    Edit
                                                </button>
                                            </div>
                                        
                                            <!-- Button Container for Deactivate/Delete -->
                                            <div class="ml-auto flex">
                                                @if($employee->active == 1)
                                                    <!-- Deactivate Button -->
                                                    <button @click="openDeactivateModal('{{ $employee->employee_id }}')"
                                                        type="button"
                                                        class="flex items-center py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 hover:text-red-700 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                                        </svg>
                                                        Deactivate
                                                    </button>
                                                @else
                                                    {{-- Activate Button --}}
                                                    <button @click="openActivateModal('{{ $employee->employee_id }}')"
                                                        type="button"
                                                        class="flex items-center py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 hover:text-red-700 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3" />
                                                        </svg>
                                                        Activate
                                                    </button>
                                                    <!-- Delete Button -->
                                                    <button @click="openDeleteModal('{{ $employee->employee_id }}')"
                                                        type="button"
                                                        class="flex items-center py-2.5 px-5 ms-3 text-sm font-medium text-white bg-customRed border border-red-800 hover:bg-red-800 hover:border-red-900 rounded-lg">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-3">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                        Delete
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                        

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <div class="w-full p-4 bg-gray-100 rounded-b-lg " wire:scroll>
            {{ $EmployeeData->links(data : ['scrollTo' => False]) }}
        </div>

        <div x-cloak x-data="{ deactivateModal: false }" x-ref="deactivate-modal-ref" 
                x-init="
                $el.addEventListener('deactivate-modal-open', (event) => {
                    $wire.set('currentFormId', event.detail);
                    deactivateModal = true;
                });
                $el.addEventListener('modal-close', () => deactivateModal = false);"
                x-show="deactivateModal" 
                @keydown.window.escape="deactivateModal = false" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                tabindex="-1" 
                class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                id="deactivate-modal">
                <div x-show="deactivateModal" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform opacity-0 scale-90"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-90"
                    class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700"
                    style="z-index: 60;">
                    <button type="button" @click="deactivateModal = false"
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Deactivation?</h3>
                            <button wire:click.prevent="deactivateEmployee" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Yes
                            </button>
                            <button @click="deactivateModal = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                No
                            </button>
                        </div>
                    </div>
            </div>
        </div>

        <div x-cloak x-data="{ activateModal: false }" x-ref="activate-modal-ref" 
                x-init="
                $el.addEventListener('activate-modal-open', (event) => {
                    $wire.set('currentFormId', event.detail);
                    activateModal = true;
                });
                $el.addEventListener('modal-close', () => activateModal = false);"
                x-show="activateModal" 
                @keydown.window.escape="activateModal = false" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                tabindex="-1" 
                class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                id="activate-modal">
                <div x-show="activateModal" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform opacity-0 scale-90"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-90"
                    class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700"
                    style="z-index: 60;">
                    <button type="button" @click="activateModal = false"
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
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Activation?</h3>
                            <button wire:click.prevent="activateEmployee" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Yes
                            </button>
                            <button @click="activateModal = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                No
                            </button>
                        </div>
                    </div>
            </div>
        </div>

        <div x-cloak x-data="{ openWarningModal: false }" x-ref="warning-modal-ref"
            x-init="
            $el.addEventListener('warning-modal-open', (event) => {
                $wire.set('currentFormId', event.detail);
                openWarningModal = true;
            });
            $el.addEventListener('modal-close', () => openWarningModal = false);"
            tabindex="-1" 
            id="warning-modal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50"
            x-show="openWarningModal"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0">
            <div class="relative w-full max-w-md max-h-full p-4"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="transform opacity-0 scale-90"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-90"
                style="z-index: 60;">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button @click="openWarningModal = false" 
                            type="button" 
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center md:p-5">
                        <svg class="w-12 h-12 mx-auto mb-4 text-customRed dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Account Deletion</h3>
                        <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">Please ensure that you have considered the following before proceeding:</p>
                        <ul class="list-disc text-left pl-5 mb-5 text-sm text-gray-600 dark:text-gray-300">
                            <li>Verify that the employee's account details are correct and complete.</li>
                            <li>Ensure that any important data or files associated with this account have been backed up.</li>
                            <li>Confirm that you have the necessary permissions to delete this account.</li>
                            <li>Review and confirm that the deletion complies with company policies and regulations.</li>
                        </ul>
                        <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">By clicking <span class="text-customGreen font-semibold">"Yes"</span>, you confirm that you have verified the above details and understand the <span class="text-customRed font-semibold">implications</span> of permanently deleting this account.</p>
                        
                        <button id="addWarningButton" wire:click.prevent="deleteEmployee" 
                                type="submit" 
                                class="text-white bg-customGreen hover:bg-green-700 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, Delete
                        </button>
                        <button @click="openWarningModal = false" 
                                type="button" 
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:text-white hover:bg-customRed focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            No, Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    
      </div>
      
      <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }"
            @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Created'; openConfirmation = false; setTimeout(() => showToast = false, 3000)"
            @trigger-success-activate.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Activated'; openConfirmation = false; setTimeout(() => showToast = false, 3000)"
            @trigger-success-deactivate.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Deactivated'; openConfirmation = false; setTimeout(() => showToast = false, 3000)"
            @trigger-success-delete.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Deleted'; openConfirmation = false; setTimeout(() => showToast = false, 3000)"
            @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; openConfirmation = false; setTimeout(() => showToast = false, 3000)">
            <div id="toast-container" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50" x-show="showToast">
                <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-900 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60" role="alert"
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
            <!-- Loading screen -->
            <div wire:loading wire:target="submit, search, deactivateEmployee, deleteEmployee, genderTypesFilter, employeeTypesFilter, insideDepartmentTypesFilter, departmentTypesFilter, activateEmployee" class="load-over z-50">
                <div wire:loading wire:target="submit, search, deactivateEmployee, deleteEmployee, genderTypesFilter, employeeTypesFilter, insideDepartmentTypesFilter, departmentTypesFilter, activateEmployee" class="loading-overlay z-50">
                    <div class="flex flex-col items-center justify-center">
                        <div class="spinner"></div>
                        <p>Processing...</p>
                    </div>
                </div>
            </div>
     </div>
</div>

<script>

    function openDeactivateModal(id) {
        const modal = document.getElementById('deactivate-modal');
        if (modal) {
            const event = new CustomEvent('deactivate-modal-open', { detail: id });
            modal.dispatchEvent(event);
        }
    }

    function openActivateModal(id) {
        const modal = document.getElementById('activate-modal');
        if (modal) {
            const event = new CustomEvent('activate-modal-open', { detail: id });
            modal.dispatchEvent(event);
        }
    }

    function openDeleteModal(id) {
        const modal = document.getElementById('warning-modal');
        if (modal) {
            const event = new CustomEvent('warning-modal-open', { detail: id });
            modal.dispatchEvent(event);
        }
    }

    let currentStep = 1;
    let password = document.getElementById("password");

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success'));
            const modal = document.querySelector(`[x-ref="show-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.showModal = false; // Open the modal
        });
        Livewire.on('triggerError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="show-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.showModal = false; // Open the modal
        });
        Livewire.on('triggerActivateSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success-activate'));
            const modal = document.querySelector(`[x-ref="activate-modal-ref"]`);
            const view_modal = document.querySelector(`[x-ref="view-modal"]`);
            const viewModal = Alpine.$data(view_modal);
            viewModal.openViewModal = false;
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.activateModal = false; // Open the modal
        });
        Livewire.on('triggerActivateError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="activate-modal-ref"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.activateModal = false; // Open the modal
        });
        Livewire.on('triggerDeactivateSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success-deactivate'));
            const modal = document.querySelector(`[x-ref="deactivate-modal-ref"]`);
            const view_modal = document.querySelector(`[x-ref="view-modal"]`);
            const viewModal = Alpine.$data(view_modal);
            viewModal.openViewModal = false;
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.deactivateModal = false; // Open the modal
        });
        Livewire.on('triggerDeactivateError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="deactivate-modal-ref"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.deactivateModal = false; // Open the modal
        });
        Livewire.on('triggerDeleteSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success-delete'));
            const modal = document.querySelector(`[x-ref="deactivate-modal-ref"]`);
            const view_modal = document.querySelector(`[x-ref="view-modal"]`);
            const warning_modal = document.querySelector(`[x-ref="warning-modal-ref"]`);
            
            const alpineData = Alpine.$data(modal);
            const viewModal = Alpine.$data(view_modal);
            const warningModal = Alpine.$data(warning_modal);

            viewModal.openViewModal = false;
            warningModal.openWarningModal = false;
            alpineData.warningModal = false; // Open the modal
        });
        Livewire.on('triggerDeleteError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const warning_modal = document.querySelector(`[x-ref="warning-modal-ref"]`);
            
            const warningModal = Alpine.$data(warning_modal);
            warningModal.openWarningModal = false;
        });
    });

    // Called for adding, deleting, resetting work forms
    function workHistoryForm() {
        return {
            works: [{ company: '', position: '', start_date: '', end_date: '' }],
            addWork() {
                this.works.push({ company: '', position: '', start_date: '', end_date: '' });
            },
            removeWork(index) {
                this.works.splice(index, 1);
            },
            resetInputs() {
                this.works = [{ company: '', position: '', start_date: '', end_date: '' }];
            }
        }
    }

    // Called for adding, deleting, resetting children forms
    function childrenNamesForm() {
        return {
            children: [{ name: ''}],
            addChild() {
                this.children.push({ name: ''});
            },
            removeChild(index) {
                this.children.splice(index, 1);
            },
            resetInputs() {
                this.children = [{ name: ''}];
            }
        }
    }

    // Called for adding, deleting, resetting government exam forms
    function govtNamesForm() {
        return {
            govts: [{ name: '', rating: ''}],
            addGovt() {
                this.govts.push({ name: '', rating: ''});
            },
            removeGovt(index) {
                this.govts.splice(index, 1);
            },
            resetInputs() {
                this.govts = [{ name: '', rating: ''}];
            }
        }
    }

    // Called for adding, deleting, resetting training forms
    function trainingsNamesForm() {
        return {
            trainings: [{ name: ''}],
            addTraining() {
                this.trainings.push({ name: ''});
            },
            removeTraining(index) {
                this.trainings.splice(index, 1);
            },
            resetInputs() {
                this.trainings = [{ name: ''}];
            }
        }
    }

    // Called to reset inputs per step
    function resetInputs(selector) {
        const inputs = document.querySelectorAll(selector);
        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                input.checked = false;
            } else if (input.tagName === 'SELECT') {
                input.selectedIndex = 0;
            } else {
                input.value = '';
            }
        });
    }
    function togglePassword() {
        if (password.type === "password") {
            password.type = "text";
            password.placeholder = "password";
            document.getElementById("eyeclose").classList.add('hidden');
            document.getElementById("eyeopen").classList.remove('hidden');
        } else {
            password.type = "password";
            password.placeholder = "••••••••";
            document.getElementById("eyeclose").classList.remove('hidden');
            document.getElementById("eyeopen").classList.add('hidden');
        }
    }

    function startModal(step) {
        currentStep = step;
        password.type = "password";
        password.placeholder = "••••••••";
        document.getElementById('prevBtn').classList.add('hidden');
        document.getElementById('nextBtn').classList.remove('hidden');
        document.getElementById('createBtn').classList.add('hidden');
        document.getElementById("eyeclose").classList.remove('hidden');
        document.getElementById("eyeopen").classList.add('hidden');
        showStep(currentStep);
    }

    function showStep(step) {
        document.querySelectorAll('.number-step').forEach((numberStepper, index) => {
            numberStepper.classList.toggle('hidden', index < step - 1);
        });

        document.querySelectorAll('.done-step').forEach((doneStepper, index) => {
            doneStepper.classList.toggle('hidden', index >= step - 1);
        });

        document.querySelectorAll('.step').forEach((stepElement, index) => {
            stepElement.classList.toggle('hidden', index !== step - 1);
        });

        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            indicator.classList.toggle('bg-customRed', index < step-1);
            indicator.classList.toggle('bg-gray-100', index >= step-1);
        });
    }

    function changeStep(step) {
        currentStep += step;
        currentStep = Math.max(1, Math.min(currentStep, 7)); // Ensure the step stays between 1 and 7
        showStep(currentStep);

        document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
        document.getElementById('nextBtn').classList.toggle('hidden', currentStep === 7);
        document.getElementById('createBtn').classList.toggle('hidden', currentStep < 7);
    }

    // Event listener for Livewire events
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('change-step', (event) => {
            changeStep(event.step);
        });
    });
    const getChartOptions1 = () => {
      return {
          series: @json($employee_type),
          colors: $colors = [
                "#E7B145", // Example color
                "#E77945", // Example color
                "#45E7A1", // Example color
                "#45A5E7", // Example color
                "#A145E7", // Example color
                "#E745A5", // Example color
                "#E7E745", // Example color
                "#E7C745", // Example color
                "#B345E7", // Example color
            ],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: [
                'Independent Consultant',
                'Independent Contractor',
                'Internal Employee',
                'Intern',
                'Probi',
                'Project Based',
                'Regular',
                'Reliver',
                'OJT',
            ],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          animations: {
            enabled: false,
            easing: 'easeinout',
            speed: 800,
            animateGradually: {
                enabled: true,
                delay: 150
            },
            dynamicAnimation: {
                enabled: true,
                speed: 350
            }
        }
          },

      }
      }

      const getChartOptions2 = () => {
      return {
          series: @json($inside_department),
          colors: ["#E7B145", "#E77945", "#6AE745", "#45E5E7", "#BD45E7", "#E745A5", "#E74556"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["HR and Admin", "Recruitment", "CXS", "Overseas Recruitment", "PEI/SL Temps DO-174", "Corporate Accounting and Finance", "Accounting Operations"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          },
      }
      }

      const getChartOptions3 = () => {
      return {
          series: @json($department),
          colors: ["#E7B145", "#E77945", "#6AE745", "#45E5E7", "#E745A5"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["PEI", "SL SEARCH", "SL TEMPS", "WESEARCH", "PEI-UPSKILLS"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          },
      }
      }

      const getChartOptions4 = () => {
      return {
          series: @json($gender),
          colors: ["#45E5E7", "#E745A5"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["Male", "Female"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          },
      }
      }

      if (document.getElementById("pie-chart-1") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-1"), getChartOptions1());
      chart.render();
      }

      if (document.getElementById("pie-chart-2") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-2"), getChartOptions2());
      chart.render();
      }

      if (document.getElementById("pie-chart-3") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-3"), getChartOptions3());
      chart.render();
      }

      if (document.getElementById("pie-chart-4") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-4"), getChartOptions4());
      chart.render();
      }
</script>