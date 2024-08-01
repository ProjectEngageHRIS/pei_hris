<div class="flex flex-col space-y-6 ">
    <!-- New Containers -->
    <div class="flex flex-row justify-between space-x-4">
        <div class="flex-1 p-4 bg-white h-[150px] rounded-lg shadow">
            <p class="font-semibold text-md text-customGray">Completed Tickets</p>
            <p class="text-[60px] font-semibold text-right text-customGreen">141</p>
        </div>
        <div class="flex-1 p-4 bg-white rounded-lg shadow">
            <p class="font-semibold text-md text-customGray">Ongoing Tickets</p>
            <p class="text-[60px] font-semibold text-right text-yellow-500">2</p>
        </div>
        <div class="flex-1 p-4 bg-white rounded-lg shadow">
            <p class="font-semibold text-md text-customGray">Unassigned Tickets</p>
            <p class="text-[60px] font-semibold text-right text-customGray1">8</p>
        </div>
        <div class="flex-1 p-4 bg-white rounded-lg shadow">
            <p class="font-semibold text-md text-customGray">Cancelled Tickets</p>
            <p class="text-[60px] font-semibold text-right text-customRed">10</p>
        </div>
    </div>
    <!-- Employee Table -->
    <div class="relative shadow-md">
        <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg rounded-8px">
            <!-- Add user button -->
            <form>
                @csrf
                <button onclick="resetStep()" data-modal-target="add-modal" data-modal-toggle="add-modal" class="text-nowrap inline-flex items-center text-customRed bg-navButton shadow hover:bg-customRed hover:text-white font-medium rounded-lg text-sm px-3 py-1.5">
                    Add new ticket
                </button>
                <!-- Main modal -->
                <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md p-4">
                        <!-- Modal content -->
                        <div class="relative h-full bg-white rounded-lg shadow">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Add new ticket
                                </h3>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 overflow-y-scroll max-h-[450px]">
                                <form class="" action="#">
                                    <div id="name-container" class="grid grid-cols-2">
                                        <label for="fname" class="block col-span-2 mb-2 text-sm font-medium text-gray-900">Name <span class="text-red-600">*</span></label>
                                        <input type="text" name="fname" id="fname" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name" required>
                                        <button onclick="changeField()" class="col-span-1 col-start-2 text-sm hover:underline justify-self-end text-medium text-customRed"> Enter Employee ID instead </button>
                                    </div>
                                    <div id="employee-id-container" class="grid grid-cols-2">
                                        <label for="eid" class="block col-span-2 mb-2 text-sm font-medium text-gray-900">Employee ID <span class="text-red-600">*</span></label>
                                        <input type="text" name="eid" id="eid" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Employee ID" required>
                                        <button onclick="changeField()" class="col-span-1 col-start-2 text-sm hover:underline justify-self-end text-medium text-customRed"> Enter Name instead </button>
                                    </div>
                                    <div id="issue-container">
                                        <label for="issue" class="block mb-2 text-sm font-medium text-gray-900">Issue <span class="text-red-600">*</span></label>
                                        <input type="text" name="issue" id="issue" class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Issue" required>
                                    </div>
                                    <div id="status-container">
                                        <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status <span class="text-red-600">*</span></label>
                                        <select name="status" id="status" class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                            <option selected>Select Status</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Unassigned">Unassigned</option>
                                            <option value="Ongoing">Ongoing</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                    <div class="grid grid-cols-2 my-3">
                                        <button type="submit" id="createBtn" class="justify-self-end col-start-2 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Ticket</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- Search bar  --}}
            <div class="flex flex-row pr-2">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users" class="block text-sm text-gray-900 border border-gray-300 shadow-inner rounded-8px ps-10 pe-10 max-w-56 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
                </div>
                <!-- Filter Sidebar -->
                <div class="absolute rounded-lg right-8 hover:text-customRed" x-data="{
                    filterOpen: false,
                    departmentOpen: false,
                    statusOpen: false,
                    departmentCount: 0,
                    statusCount: 0,
                    updateDepartmentCount() {
                        this.departmentCount = document.querySelectorAll('.departmentOpen .filter-checkbox:checked').length;
                    },
                    updatestatusCount() {
                        this.statusCount = document.querySelectorAll('.statusOpen .filter-checkbox:checked').length;
                    },
                    clearAllFilters() {
                        document.querySelectorAll('.filter-checkbox').forEach(checkbox => checkbox.checked = false);
                        this.departmentCount = 0;
                        this.statusCount = 0;
                    }
                    }">

                    <!-- Filter Icon Button -->
                    <button @click="filterOpen = !filterOpen" class="flex items-center justify-center w-10 h-10 right-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-3 text-customGray hover:text-customRed">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 w-64 mt-2 space-y-2 bg-white border rounded shadow-lg right-1">
                        <!-- Clear All Button -->
                        <div class="px-4 py-2">
                            <button @click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-blue-600 hover:text-blue-900">
                                Clear All
                            </button>
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
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">HR and Admin</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Recruitment</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">CXS</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Overseas Recruitment</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">PEI/SL Temps DO-174</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Corporate Accounting and Finance</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Accounting Operations</label>
                                </div>
                            </div>
                        </div>
                        <!-- status Dropdown Button -->
                        <div class="px-2 pb-2">
                            <button @click="statusOpen = !statusOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                Status
                                <span class="float-right">&#9662;</span>
                                <span x-show="statusCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="statusCount"></span>
                            </button>
                            <div x-show="statusOpen" @click.away="statusOpen = false" class="w-full mt-2 space-y-2 statusOpen">
                                <hr class="my-4 border-gray-300">
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Completed</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Ongoing</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Unassigned</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Cancelled</label>
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
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          Name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Email
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Status
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Date and Time
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Issue/s
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Department
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Note/s
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Action/s
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-white border-b hover:bg-gray-50 ">
                      <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Neil Sims</div>
                              <div class="font-normal text-gray-500">SLE0002</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                          neilsims@sle.com
                      </td>
                      <td class="px-6 py-4">
                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                            Completed
                        </span>
                    </td>
                      <td class="px-6 py-4">
                        07/16/24 3:47 PM
                      </td>
                      <td class="px-6 py-4">
                        Printer Issue
                      </td>
                      <td class="px-6 py-4">
                          HR and Admin
                      </td>
                      <td class="px-6 py-4">

                      </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                            <p class="font-medium text-yellow-400 hover:underline" data-modal-target="edit-modal" data-modal-toggle="edit-modal">Edit</p>
                            <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                        <!-- Main modal -->
                        <form>
                            @csrf
                            <!-- Main modal -->
                            <div id="edit-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md p-4">
                                    <!-- Modal content -->
                                    <div class="relative h-full bg-white rounded-lg shadow">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                            <h3 class="text-xl font-semibold text-gray-900">
                                                Edit Ticket
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="edit-modal">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 overflow-y-scroll max-h-[450px]">
                                            <form class="" action="#">
                                                <div id="name-container" class="grid grid-cols-2">
                                                    <label for="fname" class="block col-span-2 mb-2 text-sm font-medium text-gray-500">Name</label>
                                                    <input type="text" name="fname" id="fname" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                </div>
                                                <div id="employee-id-container" class="grid grid-cols-2">
                                                    <label for="eid" class="block col-span-2 mb-2 text-sm font-medium text-gray-500">Employee ID</label>
                                                    <input type="text" name="eid" id="eid" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                </div>
                                                <div id="department-container" class="grid grid-cols-2">
                                                    <label for="dept" class="block col-span-2 mb-2 text-sm font-medium text-gray-500">Department</label>
                                                    <input type="text" name="dept" id="dept" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                </div>
                                                <div id="email-container" class="grid grid-cols-2">
                                                    <label for="email" class="block col-span-2 mb-2 text-sm font-medium text-gray-500">Email</label>
                                                    <input type="email" name="email" id="email" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                </div>
                                                <div id="datetime-container" class="grid grid-cols-2">
                                                    <label for="datetime" class="block col-span-2 mb-2 text-sm font-medium text-gray-500">Date and Time</label>
                                                    <input type="datetime-local" name="datetime" id="datetime" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                </div>
                                                <div id="issue-container">
                                                    <label for="issue" class="block mb-2 text-sm font-medium text-gray-500">Issue</label>
                                                    <input type="text" name="issue" id="issue" class="bg-gray-50 border mb-2 border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                </div>
                                                <div id="status-container">
                                                    <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Status <span class="text-red-600">*</span></label>
                                                    <select name="status" id="status" class="bg-gray-50 border mb-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                        <option selected>Select Status</option>
                                                        <option value="Cancelled">Cancelled</option>
                                                        <option value="Unassigned">Unassigned</option>
                                                        <option value="Ongoing">Ongoing</option>
                                                        <option value="Completed">Completed</option>
                                                    </select>
                                                </div>
                                                <div class="grid grid-cols-2 my-3">
                                                    <button type="submit" id="editBtn" class="justify-self-end col-start-2 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit Ticket</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                      </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Bonnie Green</div>
                              <div class="font-normal text-gray-500">SLE0003</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        bonniegreen@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-yellow-900 bg-yellow-100 rounded-lg text-nowrap me-2">
                          Ongoing
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Jese Leos</div>
                              <div class="font-normal text-gray-500">SLE0004</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        jeseleos@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-red-900 bg-red-100 rounded-lg text-nowrap me-2">
                          Cancelled
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Thomas Lean</div>
                              <div class="font-normal text-gray-500">SLE0005</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        thomaslean@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-900 bg-gray-200 rounded-lg text-nowrap me-2">
                          Unassigned
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
                  <tr class="bg-white hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Leslie Livingston</div>
                              <div class="font-normal text-gray-500">SLE0006</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        leslielivingston@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                          Completed
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
    </div>
</div>

<script>
    function resetStep() {
        document.getElementById('name-container').classList.add('hidden');
        document.getElementById('employee-id-container').classList.remove('hidden');
    }

    function changeField() {
        document.getElementById('name-container').classList.toggle('hidden');
        document.getElementById('employee-id-container').classList.toggle('hidden');
        document.getElementById('fname').value = ""
        document.getElementById('eid').value = ""
    }
</script>
