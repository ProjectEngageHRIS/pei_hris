<div>
    <div class="flex items-center justify-end mb-4">
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
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="inline-flex items-center text-white bg-customRed shadow hover:bg-red-700 hover:text-white font-medium rounded-lg text-sm px-4 py-2 ml-4 h-[42px]">
            Add user
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 ml-1">
                <path d="M8.5 4.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 13c.552 0 1.01-.452.9-.994a5.002 5.002 0 0 0-9.802 0c-.109.542.35.994.902.994h8ZM12.5 3.5a.75.75 0 0 1 .75.75v1h1a.75.75 0 0 1 0 1.5h-1v1a.75.75 0 0 1-1.5 0v-1h-1a.75.75 0 0 1 0-1.5h1v-1a.75.75 0 0 1 .75-.75Z" />
            </svg>
        </button>
        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full xl:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full p-4">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow ">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                        <h3 class="text-xl font-semibold text-gray-900 ">
                            Add new account
                        </h3>
                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-hide="authentication-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 xl:p-5">
                        <form class="space-y-4" action="#">
                            <div>
                                <label for="fullname" class="block mb-2 text-sm font-medium text-customGray1">Full Name</label>
                                <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Full Name" required>
                            </div>
                            <div>
                                <label for="enum" class="block mb-2 text-sm font-medium text-customGray1">Employee Number</label>
                                <input type="text" name="enum" id="enum" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Employee Number" required/>
                            </div>
                            <div>
                                <label for="etype" class="block mb-2 text-sm font-medium text-customGray1">Employee Type</label>
                                <input type="text" name="etype" id="etype" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Employee Type" required />
                            </div>
                            <div>
                                <label for="dept" class="block mb-2 text-sm font-medium text-customGray1">Department</label>
                                <input type="text" name="dept" id="dept" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Department" required />
                            </div>
                            <div>
                                <label for="comp" class="block mb-2 text-sm font-medium text-customGray1">Company</label>
                                <input type="text" name="comp" id="comp" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Company" required />
                            </div>

                            <button id="submit-button" type="submit" class="w-full text-white bg-customRed hover:bg-red-900  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update Payroll Status</button>
                        </form>
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
                <div class="pt-4 pb-4">
                    <p class="flex justify-between mr-6">
                        <span class="mb-4 ml-4 text-base font-semibold text-customGray1">Notes</span>
                        <button id="open-modal" class="mb-3 ml-4 text-yellow-400 hover:text-yellow-600">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="currentColor" class="size-4">
                                <path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" />
                            </svg>
                        </button>
                    </p>

                    <!-- Main modal -->
                    <div id="default-modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-gray-900 bg-opacity-50">
                        <div class="relative w-full max-w-2xl max-h-full p-4">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow">
                                <!-- Modal header -->
                                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                    <h3 class="text-xl font-semibold text-gray-900">
                                        Add new note
                                    </h3>
                                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto" data-modal-hide="default-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <div class="p-4 space-y-4 md:p-5">
                                    <textarea class="w-full h-40 p-2 border rounded-lg focus:ring-2 focus:border-customRed focus:ring-customRed" placeholder="Type your note here..."></textarea>
                                </div>
                                <!-- Modal footer -->
                                <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                    <button data-modal-hide="default-modal" type="button" class="text-white bg-customRed hover:bg-red-500 focus:ring-2 focus:outline-none focus:ring-customRed font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add note</button>
                                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-gray-700 focus:z-10 focus:ring-2 focus:ring-gray-100">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between ml-4 text-xs font-medium text-customGray1">
                        <span>• Note #1</span>
                        <button class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-4 text-red-700 hover:text-red-500">
                            <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
                        </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between ml-4 text-xs font-medium text-customGray1">
                        <span>• Note #2</span>
                        <button class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-4 text-red-700 hover:text-red-500">
                            <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
                        </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between ml-4 text-xs font-medium text-customGray1">
                        <span>• Note #3</span>
                        <button class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-4 text-red-700 hover:text-red-500">
                            <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
                        </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between ml-4 text-xs font-medium text-customGray1">
                        <span>• Note #4</span>
                        <button class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-4 text-red-700 hover:text-red-500">
                            <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
                        </svg>
                        </button>
                    </div>
                    <div class="flex items-center justify-between ml-4 text-xs font-medium text-customGray1">
                        <span>• Note #5</span>
                        <button class="p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 mr-4 text-red-700 hover:text-red-500">
                            <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"/>
                        </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid w-full grid-cols-1 gap-2 p-2 bg-gray-100 shadow-lg h-fit rounded-8px sm:grid-cols-2">
            @if ($EmployeeData->isEmpty())
                <div class="w-full flex py-10  col-span-2 justify-center items-center bg-white rounded-lg shadow-lg gap-4 text-customGray1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-8 text-customRed">
                        <path fillRule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clipRule="evenodd" />
                    </svg>
                    <span class="text-lg font-bold"> No Result </span>
                </div>
            @else
                @foreach ($EmployeeData as $employee )
                    <div class="flex flex-col w-full gap-2 p-4 bg-white shadow-sm h-fit rounded-8px">
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
                            <p class="text-xs"><strong>Payroll Issued? ({{$currentMonthName}} {{$currentYear}}):</strong> {{ $payroll_exists ? 'Yes' : 'No' }}</p>

                            {{-- <p class="text-xs"><strong>Latest Payroll D    ate:</strong> 7/12/2024</p> --}}
                        </div>
                        <hr class="my-1 border-gray-300">
                        <div class="flex items-center justify-between">
                            @if($employee->payroll_status == "Awaiting Approval")
                                <span class="text-xs font-semibold text-yellow-400 text-nowrap">Status: Awaiting Approval</span>
                            @elseif($employee->payroll_status == "Approved")
                                <span class="text-xs font-semibold text-green-400">Status: Approved</span>
                            @elseif($employee->payroll_status == "Draft")
                                <span class="text-xs font-semibold text-gray-400">Status: Draft</span>
                            @elseif ($employee->payroll_status == "Overdue")
                                <span class="text-xs font-semibold text-red-500">Status: Overdue</span>
                            @else
                                <span class="text-xs font-semibold text-gray-900">Status: {{$employee->payroll_status}}</span>

                            @endif
                            <div class="flex space-x-2">
                            <!-- Edit user button -->
                            <button data-modal-target="profile-modal{{$loop->index}}" data-modal-toggle="profile-modal{{$loop->index}}" class="inline-flex items-center text-blue-500 hover:text-blue-700 ">
                                <svg class="size-5" fill="currentColor" viewBox="0 0 21 21">
                                    <path d="M11.013 2.513a1.75 1.75 0 0 1 2.475 2.474L6.226 12.25a2.751 2.751 0 0 1-.892.596l-2.047.848a.75.75 0 0 1-.98-.98l.848-2.047a2.75 2.75 0 0 1 .596-.892l7.262-7.261Z"></path>
                                </svg>
                            </button>
                            <!-- Main modal -->
                            <div id="profile-modal{{$loop->index}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full xl:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full p-4">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow ">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                                            <h3 class="text-xl font-semibold text-gray-900 ">
                                                Edit Account Details
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-hide="profile-modal{{$loop->index}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 xl:p-5">
                                            <form class="space-y-4" wire:submit.prevent="submit('{{$employee->employee_id}}')" method="POST">
                                                <div>
                                                    <label for="fullname" class="block mb-2 text-sm font-medium text-customGray1">Full Name</label>
                                                    <input type="text" name="fullname" id="fullname"
                                                    class="bg-gray-50 border border-gray-300 text-customGray
                                                    text-sm rounded-lg lock w-full p-2.5" value="{{$employee->first_name}}" disabled>
                                                </div>
                                                <div>
                                                    <label for="enum" class="block mb-2 text-sm font-medium text-customGray1">Employee Number</label>
                                                    <input type="text" name="enum" id="enum"
                                                    class="bg-gray-50 border border-gray-300 text-customGray
                                                    text-sm rounded-lg block w-full p-2.5" value="{{$employee->employee_id}}" disabled>
                                                </div>
                                                <div>
                                                    <label for="etype" class="block mb-2 text-sm font-medium text-customGray1">Employee Type</label>
                                                    <input type="text" name="etype" id="etype"
                                                    class="bg-gray-50 border border-gray-300 text-customGray
                                                    text-sm rounded-lg block w-full p-2.5" value="{{$employee->inside_department}}" disabled>
                                                </div>
                                                <div>
                                                    <label for="dept" class="block mb-2 text-sm font-medium text-customGray1">Department</label>
                                                    <input type="text" name="dept" id="dept"
                                                    class="bg-gray-50 border border-gray-300 text-customGray disabled-select
                                                    text-sm rounded-lg block w-full p-2.5"
                                                    value="{{$employee->department}}" disabled>
                                                </div>
                                                {{-- <div>
                                                    <label for="latestPayrollDate" class="block mb-2 text-sm font-medium text-customGray1">Latest Payroll Date</label>
                                                    <input type="date" name="latestPayrollDate" id="latestPayrollDate"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg block w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                </div> --}}
                                                <div>
                                                    <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Status</label>
                                                    <select name="status" id="status" wire:model="payroll_status"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg block w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                        <option value="" selected>Select Status</option>
                                                        <option value="Awaiting Approval">Awaiting Approval</option>
                                                        <option value="Approved">Approved</option>
                                                        <option value="Overdue">Overdue</option>
                                                        <option value="Draft">Draft</option>
                                                    </select>
                                                </div>
                                                
                                                <button type="submit" data-modal-hide="profile-modal{{$loop->index}}" class="w-full text-white bg-customRed hover:bg-red-900  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create account</button>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                                <button class="text-red-500 hover:text-red-700">
                                    <svg class="size-5" fill="currentColor" viewBox="0 0 21 21">
                                        <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif



        </div>
    </div>

    <div id="toast-container-checkin" tabindex="-1" class="hidden fixed inset-0 z-50 items-center justify-center  w-full h-full bg-gray-800 bg-opacity-50">
        <div id="toast-success-checkin" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60 dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="text-sm font-normal ms-3">Payroll Updated!</div>
            <button id="close-toast-checkin" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="toast-container-checkin" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>


</div>

 <script>

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccessCheckIn', () => {
            const toastContainer = document.getElementById('toast-container-checkin');
            // const modal = document.getElementById('toast-success-checkin');
            if (toastContainer) {
                // toastContainer.classList.add('flex');
                setTimeout(() => {
                    toastContainer.classList.remove('hidden');
                }, 10); // Hide after 5 seconds
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
