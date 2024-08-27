<div>
    <div class="flex flex-row gap-4 items-center">
        <div class="rounded-lg hover:text-customRed">
            <div x-data="{ open: false, selectedhalfOfMonth: @entangle('halfOfMonthFilter').live }" @click.away="open = false" class="relative inline-block text-left w-full">
                <div>
                    <button @click="open = !open" type="button" class="inline-flex justify-between items-center w-full bg-navButton shadow h-10 font-medium rounded-lg text-sm p-3 text-gray-900">
                        <span x-text="selectedhalfOfMonth ? selectedhalfOfMonth : 'Select'"></span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div x-show="open" class="absolute z-10 w-fit mt-2 space-y-2 bg-white border rounded shadow-lg">
                    <div class="py-1">
                        <a href="#" @click.prevent="selectedhalfOfMonth = '1st Half'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">1st Half</a>
                        <a href="#" @click.prevent="selectedhalfOfMonth = '2nd Half'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2nd Half</a>
                    </div>
                </div>
                <input type="hidden" id="halfOfMonthFilter" name="halfOfMonthFilter" wire:model.live="halfOfMonthFilter" x-model="selectedhalfOfMonth" required>
            </div>
        </div>

        <div class="rounded-lg hover:text-customRed">
            <div x-data="{ open: false, selectedMonth: @entangle('monthFilter').live }" @click.away="open = false" class="relative inline-block text-left w-full">
                <div>
                    <button @click="open = !open" type="button" class="inline-flex justify-between items-center w-full bg-navButton shadow h-10 font-medium rounded-lg text-sm p-3 text-gray-900">
                        <span x-text="selectedMonth ? selectedMonth : 'Select'"></span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div x-show="open" class="absolute z-10 w-fit mt-2 space-y-2 bg-white border rounded shadow-lg">
                    <div class="py-1">
                        <a href="#" @click.prevent="selectedMonth = 'January'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">January </a>
                        <a href="#" @click.prevent="selectedMonth = 'February'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">February</a>
                        <a href="#" @click.prevent="selectedMonth = 'March'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">March</a>
                        <a href="#" @click.prevent="selectedMonth = 'April'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">April</a>
                        <a href="#" @click.prevent="selectedMonth = 'May'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">May</a>
                        <a href="#" @click.prevent="selectedMonth = 'June'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">June</a>
                        <a href="#" @click.prevent="selectedMonth = 'July'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">July</a>
                        <a href="#" @click.prevent="selectedMonth = 'August'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">August</a>
                        <a href="#" @click.prevent="selectedMonth = 'September'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">September</a>
                        <a href="#" @click.prevent="selectedMonth = 'October'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">October</a>
                        <a href="#" @click.prevent="selectedMonth = 'November'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">November</a>
                        <a href="#" @click.prevent="selectedMonth = 'December'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">December</a>
                    </div>
                </div>
                <input type="hidden" id="monthFilter" name="monthFilter" wire:model.live="monthFilter" x-model="selectedMonth" required>
            </div>
        </div>

        <div class="rounded-lg hover:text-customRed">
            <div x-data="{ open: false, selectedYear: @entangle('yearFilter').live }" @click.away="open = false" class="relative inline-block text-left w-full">
                <div>
                    <button @click="open = !open" type="button" class="inline-flex justify-between items-center w-full bg-navButton shadow h-10 font-medium rounded-lg text-sm p-3 text-gray-900">
                        <span x-text="selectedYear ? selectedYear : 'Select'"></span>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                </div>
                <div x-show="open" class="absolute z-10 w-fit mt-2 space-y-2 bg-white border rounded shadow-lg">
                    <div class="py-1">
                        <a href="#" @click.prevent="selectedYear = '2024'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2024 </a>
                        <a href="#" @click.prevent="selectedYear = '2023'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2023</a>
                        <a href="#" @click.prevent="selectedYear = '2022'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2022</a>
                        <a href="#" @click.prevent="selectedYear = '2021'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2021</a>
                        <a href="#" @click.prevent="selectedYear = '2020'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2020</a>
                        <a href="#" @click.prevent="selectedYear = '2019'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2019</a>
                        <a href="#" @click.prevent="selectedYear = '2018'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2018</a>
                        <a href="#" @click.prevent="selectedYear = '2017'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2017</a>
                        <a href="#" @click.prevent="selectedYear = '2016'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2016</a>
                        <a href="#" @click.prevent="selectedYear = '2015'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2015</a>
                        <a href="#" @click.prevent="selectedYear = '2014'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2014</a>
                        <a href="#" @click.prevent="selectedYear = '2013'; open = false;" class="block px-4 py-2 text-sm text-gray-700 hover:bg-customRed hover:text-white">2013</a>
                    </div>
                </div>
                <input type="hidden" id="yearFilter" name="yearFilter" wire:model.live="yearFilter" x-model="selectedYear" required>
            </div>
        </div>


    </div>


    <div x-data="{addTargetPayroll: false}" x-ref="add-target-modal" class="flex items-center justify-end mb-4">
        
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only "></label>
        
        <div class="flex flex-row pr-2 relative">
            <label for="table-search" class="sr-only">Search</label>
            <div class="">
                <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text" wire:model.live="search" id="table-search-users" class="block text-sm text-gray-900 border border-gray-300 shadow-inner rounded-8px ps-10 pe-10 w-full max-w-80 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
            </div>
            <!-- Filter Sidebar -->
            <div class="absolute rounded-lg right-3 hover:text-customRed" x-data="{
                filterOpen: false,
                employeeTypeOpen: false,
                departmentOpen: false,
                companyOpen: false,
                statusOpen: false,
                genderOpen: false,
                employeeTypeCount: 0,
                departmentCount: 0,
                companyCount: 0,
                statusCount: 0,
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
                updateStatusCount() {
                    this.statusCount = document.querySelectorAll('.statusOpen .filter-checkbox:checked').length;
                },
                clearAllFilters() {
                    document.querySelectorAll('.filter-checkbox').forEach(checkbox => checkbox.checked = false);
                    this.employeeTypeCount = 0;
                    this.departmentCount = 0;
                    this.companyCount = 0;
                    this.statusCount = 0;
                    this.genderCount = 0;

                }
                }">

                <!-- Filter Icon Button -->
                <button @click="filterOpen = !filterOpen" class="size-10 right-0">
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
        <!-- Add user button -->
        <button @click="addTargetPayroll = true" class="inline-flex items-center text-white bg-customRed shadow hover:bg-red-700 hover:text-white font-medium rounded-lg text-sm px-4 py-2 ml-4 h-[42px]">
            Add Payslip
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-2">
                <path fill-rule="evenodd" d="M19.5 21a3 3 0 0 0 3-3V9a3 3 0 0 0-3-3h-5.379a.75.75 0 0 1-.53-.22L11.47 3.66A2.25 2.25 0 0 0 9.879 3H4.5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h15Zm-6.75-10.5a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25v2.25a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V10.5Z" clip-rule="evenodd" />
              </svg>
        </button>
        <!-- Main modal -->
        <div x-cloak 
            x-show="addTargetPayroll" 
            @keydown.window.escape="addTargetPayroll = false" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            tabindex="-1" 
            class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
            id="add-target-modal">
        <div x-show="addTargetPayroll" 
             id="add-targeted-payroll"
             tabindex="-1" 
             aria-hidden="true" 
             class="relative p-4 w-full max-w-lg max-h-full bg-white rounded-lg shadow dark:bg-gray-700"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="transform opacity-0 scale-90"
             x-transition:enter-end="transform opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="transform opacity-100 scale-100"
             x-transition:leave-end="transform opacity-0 scale-90">
            <div class="relative w-full max-w-lg max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Add new Payslip
                        </h3>
                        <button type="button" @click="addTargetPayroll = !addTargetPayroll" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " >
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 xl:p-5" x-data="{ openAddWarningButton: false }">
                        <form class="space-y-4" wire:submit.prevent="addTargetPayroll" method="POST">
                            <div>
                                <label for="selectedEmployee" class="block mb-2 text-sm font-medium text-customGray1">Target Employee</label>
                                <select name="selectedEmployee" id="selectedEmployee" wire:model.live="selectedEmployee" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                    <option>Select </option>
                                    @foreach($employeeNames as $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="fullname" class="block mb-2 text-sm font-medium text-customGray1">Employee Email</label>
                                <input type="text" name="fullname" id="fullname" disabled value="{{$selectedEmployeeEmail}}" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Full Name" required>
                            </div>

                            <hr class="border-gray-700">

                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3  gap-4">
                                <div id="payroll_phase_container">
                                    <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Phase</label>
                                    <select name="status" id="status" wire:model.change="payroll_phase" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                        <option value="" selected>Select Phase</option>
                                        <option value="1st Half">1st Half</option>
                                        <option value="2nd Half">2nd Half</option>
                                    </select>
                                    @error('payroll_phase')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('payroll_phase_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_phase_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div id="payroll_month_container">
                                    <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Month</label>
                                    <select name="status" id="status" wire:model.change="payroll_month" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                        <option value="" selected>Select Month</option>
                                        @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                            <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select>
                                    @error('payroll_month')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('payroll_month_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_month_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div id="payroll_year_container">
                                    <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Year</label>
                                    <select name="status" id="status" wire:model.change="payroll_year" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                        <option value="" selected>Select Year</option>
                                        @foreach(range(2000, date('Y')) as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('payroll_year')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('payroll_year_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_year_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div id="payroll_picture_container"  class="grid grid-cols-1  rounded-lg shadow  ">
                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                <label for="payroll_picture"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Payslip Photo Link
                                    <span class="text-red-600">*</span></label>
                                <div id="payroll_picture" class="grid grid-cols-1">
                                    <textarea type="text" rows="3" id="payroll_picture" name="payroll_picture" wire:model="payroll_picture"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </textarea>
                                    @error('payroll_picture')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('payroll_picture_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_picture_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <button @click="openAddWarningButton = true;" type="button" class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Payslip</button>
                            {{-- <button id="submit-button" type="submit" class="w-full text-white bg-customRed hover:bg-red-900  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update Payroll Status</button> --}}
                            <div x-show="openAddWarningButton" tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center  w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
                                <div class="relative w-full max-w-md max-h-full p-4">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button @click="openAddWarningButton = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                            <div class="p-4 text-center md:p-5">
                                                <svg class="w-12 h-12 mx-auto mb-4 text-customRed dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Before proceeding, please ensure the following:</h3>
                                                <ul class="list-disc text-left pl-5 mb-5 text-sm text-gray-600 dark:text-gray-300">
                                                    <li>Verify the file exists and can be accessed.</li>
                                                    <li>Ensure the employee's email has been added as a viewer.</li>
                                                    <li>Confirm that access is restricted to the employee and authorized personnel only (you).</li>
                                                    <li>Review and modify these rules if necessary.</li>
                                                </ul>
                                                <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">By clicking <span class="text-customGreen font-semibold">"Yes"</span>, you confirm that you have verified the above details and understand the <span class="text-customRed font-semibold">implications</span> of proceeding.</p>
                                                
                                                <button id="addWarningButton1" @click="openAddPayrollModal = false; openAddWarningButton = false " data-modal-hide="add-targeted-payroll" type="submit" class="text-white bg-customGreen hover:bg-green-700  dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                    Yes
                                                </button>
                                                <button @click="openAddWarningButton = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200  hover:text-white hover:bg-customRed focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="flex flex-col gap-4 xl:flex-row-reverse">
        <div class="flex flex-col items-end w-full space-y-4 xl:max-w-72">
            <!-- Quick Links Section -->
            <div class="w-full py-4 bg-white rounded-lg shadow-lg">
                <h2 class="mx-4 mb-4 text-base font-semibold text-customGray1">Quick Links</h2>
                <p class="truncate"><a href="https://picpa.com.ph/" class="px-2 text-xs font-medium text-blue-600 hover:underline ms-2 hover:text-blue-800">• Philippine Institute of Certified Public Accountants</a></p>
                <p class="truncate"><a href="https://picpa.com.ph/" class="px-2 text-xs font-medium text-blue-600 hover:underline ms-2 hover:text-blue-800">• Philippine Institute of Certified Public Accountants</a></p>
                <p class="truncate"><a href="https://picpa.com.ph/" class="px-2 text-xs font-medium text-blue-600 hover:underline ms-2 hover:text-blue-800">• Philippine Institute of Certified Public Accountants</a></p>
                <p class="truncate"><a href="https://picpa.com.ph/" class="px-2 text-xs font-medium text-blue-600 hover:underline ms-2 hover:text-blue-800">• Philippine Institute of Certified Public Accountants</a></p>
            </div>
            <!-- Notes Section -->
            <div class="w-full bg-white rounded-lg shadow-lg">
                <div x-data="{openNotes: false}" class="pt-4 pb-4">
                    <p class="flex justify-between mr-6">
                        <span class="mb-4 ml-4 text-base font-semibold text-customGray1">Notes</span>
                        <button @click="openNotes = true" class="mb-3 ml-4 text-yellow-400 hover:text-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="size-4">
                                <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </p>

                    <!-- Main modal -->
                    <div x-cloak x-ref="notes-modal" 
                        x-show="openNotes" 
                        @keydown.window.escape="open = false" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        tabindex="-1" 
                        class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                        id="notes-modal">
                        <div x-show="openNotes" 
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="transform opacity-0 scale-90"
                        x-transition:enter-end="transform opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="transform opacity-100 scale-100"
                        x-transition:leave-end="transform opacity-0 scale-90"
                        class="relative p-4 w-full max-w-xl max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="relative w-full max-w-2xl max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow">
                                    <!-- Modal header -->
                                    <form class="space-y-4" wire:submit.prevent="addNote" method="POST">

                                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                        <h3 class="text-xl font-semibold text-gray-900">
                                            Add new note
                                        </h3>
                                        <button @click="openNotes = !openNotes" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto" >
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 space-y-4 md:p-5" id="note_container">
                                        <textarea class="w-full h-40 p-2 border rounded-lg focus:ring-2 focus:border-customRed focus:ring-customRed" wire:model="note" placeholder="Type your note here..."></textarea>
                                        @error('note')
                                            <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('note_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('note_container').focus();" >
                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                        <button type="submit" type="button" class="text-white bg-customRed hover:bg-red-500 focus:ring-2 focus:outline-none focus:ring-customRed font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add note</button>
                                        <button @click="openNotes = !openNotes" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-gray-100">Cancel</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($NotesData->isEmpty())
                    <tr class="bg-white border-b hover:bg-gray-50 ">
                        <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px">
                            <div class="flex justify-center ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="size-5 mr-1" style="margin-top: 3px;">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                                <p class="items-center text-base font-semibold text-customRed "> Nothing to show</p>
                            </div>
                        </th>
                    </tr>
                    @else
                        @php
                            $ctr = 0;
                            $pageIndex = ($NotesData->currentpage() - 1) * $NotesData->perpage() + $ctr;
                        @endphp
                        @foreach ($NotesData as $index => $note)
                        @php
                            $ctr = $ctr + 1;
                        @endphp

                        <div class="flex items-center justify-between ml-4 text-xs font-medium text-customGray1">
                            <span>• #{{$pageIndex + $ctr}} - {{$note->note}}</span>
                            <button id="delete-note" class="p-2" wire:click.prevent="deleteNote({{$note->id}})">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-4 text-red-700 hover:text-red-500">
                                    <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                        @endforeach
                        @if ($NotesData->count() > 10)
                        <div class="p-4 bg-gray-100 max-w-full rounded-b-lg " >
                            {{ $NotesData->links(data : ['scrollTo' => False]) }}
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <div class="grid w-full grid-cols-1 gap-2 p-2 bg-gray-100 shadow-lg h-fit rounded-8px">
            <div>
                <div  class="grid w-full grid-cols-1 gap-2 p-2 bg-gray-100  h-fit rounded-8px sm:grid-cols-2 ">
                    @if (count($EmployeeData) === 0)
                    <div  class="w-full flex py-10  col-span-2 justify-center items-center bg-white rounded-lg shadow-lg gap-4 text-customGray1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 text-customRed">
                            <path fillRule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clipRule="evenodd" />
                        </svg>
                        <span class="text-lg font-bold"> No Result </span>
                    </div>
                    @else
                        @foreach ($EmployeeData as $employee )
                                <div wire:key="{{ $employee->employee_id }}"  class="flex flex-col w-full gap-2 p-4 bg-white shadow-sm h-fit rounded-8px">
                                    <div class="flex justify-between">
                                        <h2 class="font-semibold text-gray-900 text-md text-nowrap">{{$employee->first_name}} {{$employee->middle_name  }} {{$employee->last_name}}</h2>
                                        @if ($employee->department == "PEI")
                                            <span class="px-2 py-1 text-xs text-yellow-500 bg-yellow-100 rounded-8px text-nowrap">PEI</span>
                                        @elseif ($employee->department == "SL SEARCH")
                                            <span class="px-2 py-1 text-xs text-orange-500 bg-orange-100 rounded">SL Search</span>
                                        @elseif ($employee->department == "PEI-UPSKILLS")
                                            <span class="px-2 py-1 text-xs text-pink-500 bg-pink-100 rounded">PEI-UPSKILLS</span>
                                        @elseif ($employee->department == "SL TEMPS")
                                            <span class="px-2 py-1 text-xs bg-green-100 rounded-8px text-customGreen text-nowrap">SL Temps</span>
                                        @else
                                            <span class="px-2 py-1 text-xs bg-gray-100 rounded-8px text-customGray text-nowrap">No Company</span>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-700">
                                        <p class="text-xs"><strong>Employee ID:</strong> {{$employee->employee_id}} </p>
                                        <p class="text-xs"><strong>Department:</strong> {{$employee->inside_department}}</p>
                                        <p class="text-xs"><strong>Employee Type:</strong> {{$employee->employee_type}}</p>
                                        @php
                                            $payroll_exists = $payrollMap->has($employee->employee_id);
                                        @endphp
                                        <p class="text-xs"><strong>Payslip Issued? ({{$monthFilter}} {{$yearFilter}}):</strong>
                                            <span class="{{ $payroll_exists ? 'text-green-500' : 'text-red-500' }}">
                                                {{ $payroll_exists ? 'Yes' : 'No' }}
                                            </span>
                                        </p>
                                        {{-- <p class="text-xs"><strong>Latest Payroll D    ate:</strong> 7/12/2024</p> --}}
                                    </div>
                                    <hr class="my-1 border-gray-300">
                                    <div class="flex items-center justify-between">
                                        @php
                                            $payrollStatus = $payrollStatusesMap->has($employee->employee_id);
                                        @endphp
                                        @if($payrollStatus)
                                            @php
                                                $status = $payrollStatusesMap->get($employee->employee_id)->status
                                            @endphp
                                            @if($status == "Awaiting Approval")
                                                <span class="text-xs font-semibold text-yellow-400 text-nowrap">Status: Awaiting Approval</span>
                                            @elseif($status == "Approved")
                                                <span class="text-xs font-semibold text-green-400">Status: Approved</span>
                                            @elseif($status == "Draft")
                                                <span class="text-xs font-semibold text-gray-400">Status: Draft</span>
                                            @elseif ($status == "Overdue")
                                                <span class="text-xs font-semibold text-red-500">Status: Overdue</span>
                                            @else
                                                <span class="text-xs font-semibold text-gray-900">Status: Hasn't Progressed</span>
                                            @endif
                                        @else 
                                                <span class="text-xs font-semibold text-gray-900">Status: Not Processed Yet</span>
                                        @endif
                                        <div x-cloak x-data="{ openPayrollEditModal: false, addTargetPayroll: false, currentEditModal: null,  openAddPayrollModal: false, currentAddModal: null, openAddWarningButton: false, payrollPicture: @entangle('payroll_picture')}" x-ref="modals" >
                                            <div  class="flex space-x-2">
                                                <!-- Edit user button -->
                                                <button @click="openPayrollEditModal = true; currentEditModal = '{{ $loop->index }}'"   wire:click.self="resetEditField" class="inline-flex mt-1 items-center text-blue-500 hover:text-blue-700">
                                                    <svg class="size-5" fill="currentColor" viewBox="0 0 21 21">
                                                        <path d="M11.013 2.513a1.75 1.75 0 0 1 2.475 2.474L6.226 12.25a2.751 2.751 0 0 1-.892.596l-2.047.848a.75.75 0 0 1-.98-.98l.848-2.047a2.75 2.75 0 0 1 .596-.892l7.262-7.261Z"></path>
                                                    </svg>
                                                </button>
                                                <!-- Main modal -->
                                                <div  x-show="openPayrollEditModal && currentEditModal === '{{ $loop->index }}'" class="fixed inset-0 z-50 flex items-center justify-center">
                                                    <!-- Backdrop -->
                                                    <div x-show="openPayrollEditModal"
                                                        x-transition:enter="transition ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="transition ease-in duration-200"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0"
                                                         class="fixed inset-0 bg-black opacity-50"></div>
                                        
                                                    <div x-show="openPayrollEditModal"                          
                                                        x-transition:enter="transition ease-out duration-300"
                                                        x-transition:enter-start="transform opacity-0 scale-90"
                                                        x-transition:enter-end="transform opacity-100 scale-100"
                                                        x-transition:leave="transition ease-in duration-200"
                                                        x-transition:leave-start="transform opacity-100 scale-100"
                                                        x-transition:leave-end="transform opacity-0 scale-90" 
                                                        id="edit-payroll-modal_{{ $loop->index }}" tabindex="-1" aria-hidden="true" class="relative w-full  h-auto max-w-md  p-4 bg-white rounded-lg shadow-lg">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow">
                                                            <!-- Modal header -->
                                                            <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 sticky top-0 bg-white z-10">
                                                                <h3 class="text-xl font-semibold text-gray-900">Edit Account Details</h3>
                                                                <button @click="openPayrollEditModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                    </svg>
                                                                    <span class="sr-only">Close modal</span>
                                                                </button>
                                                            </div>
                                                            <!-- Modal body -->
                                                            <div class="p-4 xl:p-5 max-h-[90vh] overflow-y-auto ">
                                                                <form class="space-y-4" wire:submit.prevent="submit('{{ $employee->employee_id }}')" method="POST">
                                                                    <div>
                                                                        <label for="fullname" class="block mb-2 text-sm font-medium text-customGray1">Full Name</label>
                                                                        <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->first_name }}" disabled>
                                                                    </div>
                                                                    <div>
                                                                        <label for="enum" class="block mb-2 text-sm font-medium text-customGray1">Employee Number</label>
                                                                        <input type="text" name="enum" id="enum" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->employee_id }}" disabled>
                                                                    </div>
                                                                    <div>
                                                                        <label for="etype" class="block mb-2 text-sm font-medium text-customGray1">Employee Type</label>
                                                                        <input type="text" name="etype" id="etype" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->inside_department }}" disabled>
                                                                    </div>
                                                                    <div>
                                                                        <label for="dept" class="block mb-2 text-sm font-medium text-customGray1">Department</label>
                                                                        <input type="text" name="dept" id="dept" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->department }}" disabled>
                                                                    </div>
                                                                    <div id="payroll_status_container">
                                                                        <label for="payroll_status" class="block mb-2 text-sm font-medium text-customGray1">Status</label>
                                                                        <select name="payroll_status" id="status" wire:model.change="payroll_status" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                            <option value="" selected>Select Status</option>
                                                                            <option value="Awaiting Approval">Awaiting Approval</option>
                                                                            <option value="Approved">Approved</option>
                                                                            <option value="Overdue">Overdue</option>
                                                                            <option value="Draft">Draft</option>
                                                                        </select>
                                                                        @error('payroll_status')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                                x-data x-init="document.getElementById('payroll_status_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_status_container').focus();" >
                                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <button type="submit"  class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit Account</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                @php
                                                    $employee_payroll = null;
                                                    if($payroll_exists) $employee_payroll = $payrollMap->get($employee->employee_id);
                                                @endphp
                                               
                                                <button @click="openAddPayrollModal = true; currentAddModal = '{{ $loop->index }}'; payrollPicture = ''; " class="text-red-500 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                                @if($payroll_exists == False)
                                                <div x-show="openAddPayrollModal && currentAddModal === '{{ $loop->index }}'" 
                                                    class="fixed inset-0 z-50 flex items-center justify-center">
                                                    <!-- Backdrop -->
                                                    <div x-show="openAddPayrollModal" 
                                                        x-transition:enter="transition ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="transition ease-in duration-200"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0"
                                                        class="fixed inset-0 bg-black opacity-50">
                                                    </div>
                                                    <div id="add-payroll-modal_{{ $loop->index }}"  x-show="openAddPayrollModal" 
                                                        x-transition:enter="transition ease-out duration-300"
                                                        x-transition:enter-start="opacity-0"
                                                        x-transition:enter-end="opacity-100"
                                                        x-transition:leave="transition ease-in duration-200"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0" tabindex="-1" aria-hidden="true" class="relative overflow-y-auto overflow-x-hidden  w-full max-w-lg p-4 bg-white rounded-lg shadow-lg">
                                                        <!-- Modal content -->
                                                        <div class="relative bg-white rounded-lg shadow ">
                                                                <!-- Modal header -->
                                                                <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 sticky top-0 bg-white z-10">
                                                                    <h3 class="text-xl font-semibold text-gray-900">Add Payslip For <span class="text-customRed">{{$employee->employee_id}}</span> </h3>
                                                                    <button @click="openAddPayrollModal = false" wire:click="resetPayrollField"  type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div 
                                                                    x-data="{ isScrollable: false }" 
                                                                    x-init="
                                                                        let container = $el;
                                                                        function checkScroll() {
                                                                            isScrollable = container.scrollHeight > container.clientHeight;
                                                                        }
                                                                        checkScroll();
                                                                        window.addEventListener('resize', checkScroll);
                                                                        $watch('isScrollable', () => {
                                                                            checkScroll();
                                                                        });
                                                                    "
                                                                    :class="isScrollable ? 'mb-4' : ''" 
                                                                    class="p-4 xl:p-5 max-h-[90vh] overflow-y-auto">
                                                                    <form class="space-y-4" wire:submit.prevent="addPayroll('{{ $employee->employee_id }}')"  method="POST">
                                                                        @csrf
                                                                        <div class="grid grid-cols-2 gap-4" >
                                                                                <div>
                                                                                    <label for="fullname" class="block mb-2 text-sm font-medium text-customGray1">Full Name</label>
                                                                                    <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->first_name }}" disabled>
                                                                                </div>
                                                                                <div>
                                                                                    
                                                                                    <label for="enum" class="block mb-2 text-sm font-medium text-customGray1">Employee Number</label>
                                                                                    <input type="text" name="enum" id="enum" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->employee_id }}" disabled>
                                                                                </div>
                                                                                <div class="col-span-2">
                                                                                    <label for="etype" class="block mb-2 text-sm font-medium text-customGray1">Employee Email</label>
                                                                                    <input type="text" name="etype" id="etype" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->employee_email }}" disabled>
                                                                                </div>
                                                                                
                                                                        </div>
                                                                        <hr class="border-gray-700">
                                                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3  gap-4">
                                                                            <div>
                                                                                <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Phase</label>
                                                                                <select name="status" id="phase" wire:model="payroll_phase" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                                    <option value="">Select Phase</option>
                                                                                    <option value="1st Half" {{ (now()->format('j') <= 15) ? 'selected' : '' }}>1st Half</option>
                                                                                    <option value="2nd Half" {{ (now()->format('j') > 15) ? 'selected' : '' }}>2nd Half</option>
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            <div>
                                                                                <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Month</label>
                                                                                <select name="status" id="month" wire:model="payroll_month" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                                    <option value="" selected>Select Month</option>
                                                                                    @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                                                                        <option value="{{ $month }}" {{ ($month === now()->format('F')) ? 'selected' : 'selected' }}>{{ $month }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            
                                                                            <div>
                                                                                <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Year</label>
                                                                                <select name="status" id="year" wire:model="payroll_year" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                                    <option value="" selected>Select Year</option>
                                                                                    @foreach(range(date('Y'), 2000) as $year)
                                                                                        <option value="{{ $year }}" {{ ($year == date('Y')) ? 'selected' : '' }}>{{ $year }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div id="payroll_picture_container"  class="grid grid-cols-1  rounded-lg shadow  ">
                                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                            <label for="payroll_picture"
                                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Payslip Photo Link
                                                                                <span class="text-red-600">*</span></label>
                                                                            <div id="payroll_picture" class="grid grid-cols-1">
                                                                                <textarea type="text" rows="3" id="payroll_picture" name="payroll_picture" wire:model="payroll_picture"
                                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                                </textarea>
                                                                                @error('payroll_picture')
                                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                                        x-data x-init="document.getElementById('payroll_picture_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_picture_container').focus();" >
                                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                                    </div>
                                                                                @enderror
                                                                            </div>
                                                                        </div>

                                                                        <button @click="openAddWarningButton = true;" type="button" class="w-full text-white  bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Payslip</button>
                                                                        
                                                                        <div x-show="openAddWarningButton"  tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center  w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
                                                                            <div class="relative w-full max-w-md max-h-full p-4">
                                                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                                    <button @click="openAddWarningButton = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                                        </svg>
                                                                                        <span class="sr-only">Close modal</span>
                                                                                    </button>
                                                                                        <div class="p-4 text-center md:p-5">
                                                                                            <svg class="w-12 h-12 mx-auto mb-4 text-customRed dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                                            </svg>
                                                                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Before proceeding, please ensure the following:</h3>
                                                                                            <ul class="list-disc text-left pl-5 mb-5 text-sm text-gray-600 dark:text-gray-300">
                                                                                                <li>Verify the file exists and can be accessed.</li>
                                                                                                <li>Ensure the employee's email has been added as a viewer.</li>
                                                                                                <li>Confirm that access is restricted to the employee and authorized personnel only (you).</li>
                                                                                                <li>Review and modify these rules if necessary.</li>
                                                                                            </ul>
                                                                                            <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">By clicking <span class="text-customGreen font-semibold">"Yes"</span>, you confirm that you have verified the above details and understand the <span class="text-customRed font-semibold">implications</span> of proceeding.</p>
                                                                                            
                                                                                            <button id="addWarningButton" @click=" openAddWarningButton = false " type="submit" class="text-white bg-customGreen hover:bg-green-700  dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                                                Yes
                                                                                            </button>
                                                                                            <button @click="openAddWarningButton = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200  hover:text-white hover:bg-customRed focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                                                                                        </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div x-show="openAddPayrollModal && currentAddModal === '{{ $loop->index }}'"
                                                         class="fixed  inset-0 z-50 flex items-center justify-center">
                                                        <!-- Backdrop -->
                                                        <div x-show="openAddPayrollModal"                                                         
                                                        x-transition:leave="transition ease-in duration-400"
                                                        x-transition:leave-start="opacity-100"
                                                        x-transition:leave-end="opacity-0"
                                                        class="fixed inset-0 bg-black opacity-50"></div>
                                                        <div x-show="openAddPayrollModal" id="add-payroll-modal_{{ $loop->index }}" 
                                                            x-transition:enter="transition ease-out duration-300"
                                                            x-transition:enter-start="transform opacity-0 scale-90"
                                                            x-transition:enter-end="transform opacity-100 scale-100"
                                                            x-transition:leave="transition ease-in duration-400"
                                                            x-transition:leave-start="transform opacity-100 scale-100"
                                                            x-transition:leave-end="transform opacity-0 scale-90"
                                                        class="relative w-full max-w-lg  p-4 bg-white rounded-lg shadow-lg">
                                                            <!-- Modal content -->
                                                            <div class="relative bg-white rounded-lg shadow">
                                                                <!-- Modal header -->
                                                                <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 sticky top-0 bg-white z-10">
                                                                    <h3 class="text-xl font-semibold text-gray-900">Payslip of <span class="text-customRed">{{$employee->employee_id}}</span> For  <span class="text-customRed font-semibold">{{$monthFilter}} {{$yearFilter}}</span> </h3>
                                                                    <button @click="openAddPayrollModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                        </svg>
                                                                        <span class="sr-only">Close modal</span>
                                                                    </button>
                                                                </div>
                                                                <!-- Modal body -->
                                                                <div 
                                                                x-data="{ isScrollable: false, openCancelPrompt: false }" 
                                                                x-init="
                                                                    let container = $el;
                                                                    function checkScroll() {
                                                                        isScrollable = container.scrollHeight > container.clientHeight;
                                                                    }
                                                                    checkScroll();
                                                                    window.addEventListener('resize', checkScroll);
                                                                    $watch('isScrollable', () => {
                                                                        checkScroll();
                                                                    });
                                                                "
                                                                :class="isScrollable ? 'mb-4' : ''" 
                                                                class="p-4 xl:p-5 max-h-[90vh] overflow-y-auto">
                                                                {{-- <div class="p-4 xl:p-5 max-h-[90vh] overflow-y-auto"> --}}
                                                                    <form class="space-y-4" wire:submit.prevent="editPayroll('{{$employee->employee_id}}')" method="POST">
                                                                        @csrf

                                                                    <div class="grid grid-cols-2 gap-4" >
                                                                            <div>
                                                                                <label for="fullname" class="block mb-2 text-sm font-medium text-customGray1">Full Name</label>
                                                                                <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->first_name }}" disabled>
                                                                            </div>
                                                                            <div>
                                                                                
                                                                                <label for="enum" class="block mb-2 text-sm font-medium text-customGray1">Employee Number</label>
                                                                                <input type="text" name="enum" id="enum" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->employee_id }}" disabled>
                                                                            </div>
                                                                            <div class="col-span-2">
                                                                                <label for="etype" class="block mb-2 text-sm font-medium text-customGray1">Employee Email</label>
                                                                                <input type="text" name="etype" id="etype" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5" value="{{ $employee->employee_email }}" disabled>
                                                                            </div>
                                                                            
                                                                    </div>
                                                                    <hr class="border-gray-700">
                                                                    @php
                                                                        $payroll_details = $payrollMap->get($employee->employee_id);
                                                                        // $this->payroll_picture = trim($payrollMap->get($employee->employee_id)->payroll_picture);
                                                                    @endphp
                                                                    <div class="grid grid-cols-1 min-[902px]:grid-cols-3  gap-4">
                                                                        <div>
                                                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Phase</label>
                                                                            <select name="status" id="status" disabled class="disabled-select bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                                <option value="" selected>{{$payroll_details->phase}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div>
                                                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Month</label>
                                                                            <select name="status" id="status" disabled class="disabled-select bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                                <option value="" selected>{{$payroll_details->month}}</option>
                                                                            </select>
                                                                        </div>
                                                                        <div>
                                                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Year</label>
                                                                            <select name="status" id="status" disabled  class="disabled-select bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                                                <option value="" selected>{{$payroll_details->year}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    <div id="payroll_picture_container{{$loop->index}}" class="grid grid-cols-1 rounded-lg shadow">
                                                                        <label for="payroll_picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                            Payslip Photo Link <span class="text-red-600">*</span>
                                                                        </label>
                                                                        <div class="grid grid-cols-1">
                                                                            <textarea id="payroll_picture_{{$loop->index}}" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ e(trim($payrollMap->get($employee->employee_id)->payroll_picture) ?? '') }}</textarea>
                                                                            @error('payroll_picture')
                                                                                <div class="text-sm transition transform alert alert-danger"
                                                                                    x-data x-init="document.getElementById('payroll_picture_container{{$loop->index}}').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_picture_container{{$loop->index}}').focus();">
                                                                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    

                                                                    <script>
                                                                        document.addEventListener('DOMContentLoaded', () => {
                                                                            document.querySelectorAll('[id^=payroll_picture_]').forEach(textarea => {
                                                                                textarea.addEventListener('input', function() {
                                                                                    let component = Livewire.find(textarea.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                                    if(textarea.value){
                                                                                        let value = textarea.value.trim(); // Get the textarea value and trim whitespace
                                                                                        let wrappedValue = `${textarea.value}`; // Wrap the value in backticks

                                                                                        component.set('payroll_picture', wrappedValue); // Pass wrapped value to Livewire component
                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                    </script>
                                                                    
    
                                                                    <button onclick="window.open('{{$payrollMap->get($employee->employee_id)->payroll_picture}}', '_blank')" type="button" class="w-full text-white bg-customGreen hover:bg-green-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Go to Payslip</button>

                                                                    <div class="grid grid-cols-2 gap-4">
                                                                        <button @click="openAddWarningButton = true" type="button" class="w-full text-white bg-amber-600 hover:bg-amber-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit Payslip</button>
                                                                        <button @click="openCancelPrompt = true" type="button" class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Delete Payslip</button>
                                                                    </div>
                                                                        
                                                                    <div x-show="openAddWarningButton"  tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center  w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
                                                                        <div class="relative w-full max-w-md max-h-full p-4">
                                                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                                                <button @click="openAddWarningButton = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                                    </svg>
                                                                                    <span class="sr-only">Close modal</span>
                                                                                </button>
                                                                                    <div class="p-4 text-center md:p-5">
                                                                                        <svg class="w-12 h-12 mx-auto mb-4 text-customRed dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                                        </svg>
                                                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Before proceeding, please ensure the following:</h3>
                                                                                        <ul class="list-disc text-left pl-5 mb-5 text-sm text-gray-600 dark:text-gray-300">
                                                                                            <li>Verify the file exists and can be accessed.</li>
                                                                                            <li>Ensure the employee's email has been added as a viewer.</li>
                                                                                            <li>Confirm that access is restricted to the employee and authorized personnel only (you).</li>
                                                                                            <li>Review and modify these rules if necessary.</li>
                                                                                        </ul>
                                                                                        <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">By clicking <span class="text-customGreen font-semibold">"Yes"</span>, you confirm that you have verified the above details and understand the <span class="text-customRed font-semibold">implications</span> of proceeding.</p>
                                                                                        
                                                                                        <button id="addWarningButton" @click=" openAddWarningButton = false" type="submit" class="text-white bg-customGreen hover:bg-green-700  dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                                                            Yes
                                                                                        </button>
                                                                                        <button @click="openAddWarningButton = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200  hover:text-white hover:bg-customRed focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div x-show="openCancelPrompt" x-ref="delete-modal" id="popup-modal_{{ $loop->index }}" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-50">
                                                                        <div class="relative w-full max-w-md max-h-full p-4">
                                                                            <div class="relative bg-white rounded-lg shadow">
                                                                                <!-- Close button -->
                                                                                <button type="button" @click="openCancelPrompt = false" class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                                                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                                                    </svg>
                                                                                    <span class="sr-only">Close modal</span>
                                                                                </button>
                                                                                <!-- Modal content -->
                                                                                <div class="p-4 text-center">
                                                                                    <svg class="w-12 h-12 mx-auto mb-4 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                                                    </svg>
                                                                                    <h3 class="mb-5 text-lg font-normal text-gray-500">Confirm Deletion?</h3>
                                                                                    <button type="button" wire:click="deletePayroll('{{ $employee->employee_id }}')"  @click="openAddPayrollModal = false; openAddWarningButton = false " class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">Yes</button>
                                                                                    <button type="button" @click="openCancelPrompt = false" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100">No</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    @endif
            </div>

            <div class="p-4 bg-gray-100 w-full rounded-b-lg " wire:scroll>
                {{ $EmployeeData->links(data : ['scrollTo' => False]) }}
            </div>
        </div>
          
        </div>
        
    </div>
    <div wire:loading wire:target="submit, addTargetPayroll,  halfOfMonthFilter, yearFilter, monthFilter, delete-note, deleteNote, addNote, addWarningButton1, deletePayroll,  editPayroll, addPayroll" class="load-over z-50">
        <div wire:loading wire:target="submit, addTargetPayroll, halfOfMonthFilter, yearFilter, monthFilter, delete-note, deleteNote, addNote, addWarningButton1" class="loading-overlay z-50">
            <div class="flex flex-col justify-center items-center">
                <div class="spinner"></div>
                <p>Updating...</p>
            </div>
        </div>
        <div wire:loading wire:target="deletePayroll, editPayroll, addPayroll" class="loading-overlay z-50">
            <div class="flex flex-col justify-center items-center">
                <div class="spinner"></div>
                <p>Uploading...</p>
            </div>
        </div>
    </div>

    <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
    @trigger-success-add.window="showToast = true; toastType = 'success'; toastMessage = 'Added Payslip Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-success-update.window="showToast = true; toastType = 'success'; toastMessage = 'Updated Payroll Status Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-success-edit.window="showToast = true; toastType = 'success'; toastMessage = 'Edited Payslip Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-success-delete.window="showToast = true; toastType = 'success'; toastMessage = 'Deleted Payslip Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-success-add-note.window="showToast = true; toastType = 'success'; toastMessage = 'Added Note Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-success-delete-note.window="showToast = true; toastType = 'success'; toastMessage = 'Deleted Note Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
    @trigger-already-exists.window="showToast = true; toastType = 'error'; toastMessage = 'Payroll Already Exists for this Employee. Manually Edit It.'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)">
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


</div>

 <script>

    function openPayrollEditModal(index) {
        const modalId = 'edit-payroll-modal_' + index;
        const modal = document.getElementById(modalId);
        if (modal) {
            alert(modalId)
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    function openAddPayrollModal(index) {
        const modalId = 'add-payroll-modal_' + index;
        const modal = document.getElementById(modalId);
        if (modal) {
            // warningModalId.classList.remove('hidden')
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }
    }

    // function openAddWarningButton(index) {
    //     const warningModalId = 'warning-pop-up_' + index;
    //     if (warningModalId ) {
    //         warningModalId.classList.remove('hidden')
    //     }
    // }

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', (event) => {
            if (event.type == "Add"){
                window.dispatchEvent(new CustomEvent('trigger-success-add'));
                const modal = document.querySelector(`[x-ref="add-target-modal"]`);
                const alpineData = Alpine.$data(modal);
                alpineData.addTargetPayroll = false; // Open the modal

            }  else if(event.type == "Notes"){
                window.dispatchEvent(new CustomEvent('trigger-success-add-note'));
                const modal = document.querySelector(`[x-ref="notes-modal"]`);
                const alpineData = Alpine.$data(modal);
                alpineData.openNotes = false; // Open the modal
            }
                else {
                window.dispatchEvent(new CustomEvent('trigger-success-update'));
                const modal = document.querySelector(`[x-ref="modals"]`);
                // Access Alpine data
                const alpineData = Alpine.$data(modal);
                // Update the state
                if(event.type == "Status"){
                    alpineData.openPayrollEditModal = false; // Open the modal
                } else if (event.type == "Edit"){
                    alpineData.openAddPayrollModal = false; // Open the modal
                    alpineData.currentAddModal = null; // Open the modal
                } 
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

    document.getElementById('open-modal').addEventListener('click', function() {
        document.getElementById('default-modal').classList.remove('hidden');
        document.getElementById('default-modal').classList.add('flex');
    });

    document.querySelectorAll('[data-modal-hide]').forEach(function(el) {
        el.addEventListener('click', function() {
            document.getElementById('default-modal').classList.add('hidden');
            document.getElementById('default-modal').classList.remove('flex');
        });
    });

</script>
