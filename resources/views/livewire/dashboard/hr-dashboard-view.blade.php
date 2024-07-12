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
      <div class="relative shadow-md">
          <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg">
             <!-- Add user button -->
              <a href="{{route('EmployeesTable')}}" data-modal-toggle="authentication-modal" class="inline-flex items-center text-customRed bg-navButton shadow hover:bg-customRed hover:text-white font-medium rounded-lg text-sm px-3 py-1.5">
                  Add user
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 ml-1">
                      <path d="M8.5 4.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 13c.552 0 1.01-.452.9-.994a5.002 5.002 0 0 0-9.802 0c-.109.542.35.994.902.994h8ZM12.5 3.5a.75.75 0 0 1 .75.75v1h1a.75.75 0 0 1 0 1.5h-1v1a.75.75 0 0 1-1.5 0v-1h-1a.75.75 0 0 1 0-1.5h1v-1a.75.75 0 0 1 .75-.75Z" />
                  </svg>
                </a>
              <!-- Main modal -->
              <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                  <div class="relative w-full max-w-md max-h-full p-4">
                      <!-- Modal content -->
                      <div class="relative bg-white rounded-lg shadow ">
                          <!-- Modal header -->
                          <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 ">
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
                          <div class="p-4 md:p-5">
                              <form class="space-y-4" action="#">
                                  <div>
                                      <label for="firstname" class="block mb-2 text-sm font-medium text-customGray1">First Name</label>
                                      <input type="text" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter First Name" required>
                                  </div>
                                  <div>
                                      <label for="middlename" class="block mb-2 text-sm font-medium text-customGray1">Middle Name</label>
                                      <input type="text" name="middlename" id="middlename" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Middle Name"/>
                                  </div>
                                  <div>
                                      <label for="lastname" class="block mb-2 text-sm font-medium text-customGray1">Last Name</label>
                                      <input type="text" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Last Name" required />
                                  </div>
                                  <div>
                                      <label for="email" class="block mb-2 text-sm font-medium text-customGray1">Employee ID</label>
                                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " placeholder="Enter Employee ID" required />
                                  </div>
                                  <div>
                                      <label for="password" class="block mb-4 text-sm font-medium text-customGray1">Password</label>
                                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " required />
                                  </div>
                                  <button type="submit" class="w-full text-white bg-customRed hover:bg-red-900  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Create account</button>
                              </form>
                          </div>
                      </div>
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
                      <input type="text" id="table-search-users" wire:model.live="search" class="block text-sm text-gray-900 border border-gray-300 shadow-inner rounded-8px ps-10 pe-10 max-w-80 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
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
                                  <button @click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-customRed hover:text-red-900">
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
          <div class="overflow-x-auto rounded-b-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr >
                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Joined Date
                        </th>
                        <th scope="col" class="px-6 py-3">
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
                                        <p class="text-customRed text-xl font-semibold items-center"> Nothing to show</p>
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
                                {{-- <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td> --}}
                                <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                <td class="px-6 py-4  " >
                                    {{$employee->department}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->current_position}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->employee_type}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->start_of_employment}}
                                </td>
                                <td class="items-center text-center py-4">
                                    <div x-data="{ isOpen: false }" @click.away="isOpen = false">
                                        <!-- Three dots button to toggle dropdown -->
                                        <button @click="isOpen = !isOpen" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
                                
                                        <!-- Dropdown menu -->
                                        <div x-show="isOpen" class="absolute right-0 mt-2 z-40 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                            @if ($employee->status != "Cancelled")
                                                <!-- Dropdown content -->
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                    <li>
                                                        <a id="view_button_{{ $employee->employee_id }}" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @click="openModal('{{ $employee->employee_id }}')">View</a>
                                                    </li>
                                                    <li>
                                                        <a id="cancel_button_{{ $employee->employee_id }}" class="block px-4 py-2 cursor-pointer text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white" @click="openDeactivateModal('{{ $employee->employee_id }}')">Deactivate</a>
                                                    </li>
                                                </ul>
                                            @else
                                                <!-- Dropdown content -->
                                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                    <li>
                                                        <a id="view_button_{{ $employee->employee_id }}" class="block px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route('ItHelpDeskView', ['index' => $employee->form_id]) }}">View</a>
                                                    </li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <div id="popup-modal_{{ $employee->employee_id }}" tabindex="-1" class="hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50">
                                    <div class="relative p-4 w-full max-w-md max-h-full">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
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
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Deactivation?</h3>
                                                    <button wire:click="cancelForm('{{$employee->form_id}}')"  class="text-white bg-red-600 hover:bg-red-800   font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes
                                                    </button>
                                                    <button data-modal-hide="popup-modal" id="close_button" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100  focus:z-10  dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                        No
                                                    </button>
                                                </div>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>

                                
                                <div id="view-modal_{{ $employee->employee_id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50">
                                    <div class="relative w-full max-w-2xl max-h-full p-4">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow ">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Employee Information
                                                </h3>
                                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto" data-modal-hide="view-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="flex p-4 ml-2 md:p-5">
                                                <!-- Right Picture Area -->
                                                <div class="flex items-start justify-center mr-5 w-44">
                                                    {{-- @php
                                                        $employee_image = $this->getImage($employee->emp_image ?? null);
                                                    @endphp --}}
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
                                            <!-- Modal footer -->
                                            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5">
                                                <button data-modal-hide="view-modal" type="button" class="text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
                                                <button data-modal-hide="view-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-customRed">Deactivate</button>
                                                {{-- <button data-modal-hide="view-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-customRed">Delete</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                    
                                    {{-- <td class="items-center px-6 py-4">
                                        <button data-dropdown-toggle="dropdown{{$loop->index}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
                                        <div class="hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700" id="dropdown{{$loop->index}}">
                                            <!-- Dropdown content -->
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                                                <li>
                                                    <a onclick="location.href='{{ route('LeaveRequestEdit', ['index' => $employee->id]) }}'"  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                                <li>
                                                    <a onclick="location.href='{{ route('LeaveRequestPdf', ['index' => $employee->id]) }}'" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PDF</a>
                                                </li>
                                            </ul>
                                            <div class="py-2">
                                                <a wire:click="removeLeaveRequest({{$employee->id}})" wire:confirm="Are you sure you want to delete this post?" class="block px-4 py-2 text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                    </td> --}}
                            </tr>

                        
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div class="p-4 bg-gray-100 w-full rounded-b-lg">
                    {{ $EmployeeData->links() }}
                </div>
          </div>
      </div>
  </div>

<script>
    function openModal(employeeId) {
        const modalId = 'view-modal_' + employeeId;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }

    function openDeactivateModal(employeeId) {
        const modalId = 'popup-modal_' + employeeId;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }


    document.addEventListener('DOMContentLoaded', () => {
        // Select all cancel buttons and add event listeners

        document.querySelectorAll('[id^="view_button_"]').forEach(viewButton => {
        const modalId = 'view-modal_' + viewButton.getAttribute('id').substring(12); // Adjust substring length as per your ID format
        const modal = document.getElementById(modalId);

        viewButton.addEventListener('click', (e) => {
            e.preventDefault();
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    });

    // Handle cancel buttons
    document.querySelectorAll('[id^="cancel_button_"]').forEach(cancelButton => {
        const modalId = 'popup-modal_' + cancelButton.getAttribute('id').substring(14); // Adjust substring length as per your ID format
        const modal = document.getElementById(modalId);

        cancelButton.addEventListener('click', (e) => {
            e.preventDefault();
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    });

        // Select all close modal buttons and add event listeners
    document.querySelectorAll('[data-modal-hide="popup-modal"]').forEach(closeButton => {
            closeButton.addEventListener('click', () => {
                const modal = closeButton.closest('.fixed');
                if (modal) {
                    modal.classList.add('hidden');
                }
            });
        });

    document.querySelectorAll('[data-modal-hide="view-modal"]').forEach(closeButton => {
        closeButton.addEventListener('click', () => {
            const modal = closeButton.closest('.fixed');
            if (modal) {
                modal.classList.add('hidden');
            }
        });
    });

    });

    
</script>

  
  <script>
  
      const getChartOptions1 = () => {
      return {
          series: @json($employee_type),
          colors: ["#E7B145", "#E77945", "#6AE745", "#45E5E7", "#BD45E7", "#E745A5"],
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
          labels: ["Internals", "OJT", "PEI-CCS", "Rapid", "Rapid Mobility", "Upskills"],
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
  