<div class="flex flex-col space-y-6">
    <div class="overflow-x-auto">
        <div class="flex flex-col w-full gap-4 p-4 bg-white rounded-lg shadow h-fit min-w-[1024px]">
            <div class="flex items-center space-x-2">
                <p class="text-sm font-semibold">Today is</p>
                <p class="text-sm font-semibold text-customRed">{{ now()->format('F j, Y') }}</p>
                <p class="text-sm font-semibold">|</p>
                <p id="current-time" class="text-sm font-semibold text-customRed">{{ now('Asia/Manila')->format('g:i:s A') }}</p>
            </div>
            <table class="flex flex-col gap-4">
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
                        <td class="flex-1">1ewqewqeqwe</td>
                        <td class="flex-1">2</td>
                        <td class="flex-1">3</td>
                        <td class="flex-1">4e</td>
                        <td class="flex-1">5</td>
                        <td class="flex-1">N6</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Attendance Table -->
    <div class="relative w-full mt-4 overflow-x-auto shadow-md">
        <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg">
            <!-- Add user button -->
            <form>
            <button onclick="resetStep()" data-modal-target="add-modal" data-modal-toggle="add-modal" class="text-nowrap inline-flex items-center text-customRed bg-navButton shadow hover:bg-customRed hover:text-white font-medium rounded-lg text-sm px-3 py-1.5">
                Generate Record
            </button>
            <!-- Main modal -->
            <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md p-4">
                    <!-- Modal content -->
                    <div class="relative h-full bg-white rounded-lg shadow">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                            <h3 class="text-xl font-semibold text-gray-900">
                                Generate Record
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
                                    <label for="fname" class="block col-span-2 mb-2 text-sm font-medium text-customGray1">Name <span class="text-red-600">*</span></label>
                                    <input type="text" name="fname" id="fname" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name" required>
                                    <button onclick="changeField()" class="col-span-1 col-start-2 text-sm hover:underline justify-self-end text-medium text-customRed"> Enter Employee ID instead </button>
                                </div>
                                <div id="employee-id-container" class="grid grid-cols-2">
                                    <label for="eid" class="block col-span-2 mb-2 text-sm font-medium text-customGray1">Employee ID <span class="text-red-600">*</span></label>
                                    <input type="text" name="eid" id="eid" class="col-span-2 bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Employee ID" required>
                                    <button onclick="changeField()" class="col-span-1 col-start-2 text-sm hover:underline justify-self-end text-medium text-customRed"> Enter Name instead </button>
                                </div>
                                <div>
                                    <label for="timein" class="block mb-2 text-sm font-medium text-customGray1">Date From <span class="text-red-600">*</span></label>
                                    <input type="date" name="timein" id="timein" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Issue" required>
                                </div>
                                <div>
                                    <label for="timeout" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Date To <span class="text-red-600">*</span></label>
                                    <input type="date" name="timeout" id="isstimeoutue" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Issue" required>
                                </div>
                                <div class="grid grid-cols-2 my-3">
                                    <button type="submit" id="createBtn" class="justify-self-end col-start-2 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 text-center">Download Record</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </form>
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
                        departmentOpen: false,
                        companyOpen: false,
                        statusOpen: false,
                        departmentCount: 0,
                        companyCount: 0,
                        statusCount: 0,

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
                            this.departmentCount = 0;
                            this.companyCount = 0;
                            this.statusCount = 0;
                        }
                        }" class="relative">

                        <!-- Filter Icon Button -->
                        <button @click="filterOpen = !filterOpen" class="flex items-center justify-center w-10 h-10 right-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22" strokeWidth={1.5} stroke="currentColor" class="w-4 h-4 ml-3 text-customGray hover:text-customRed">
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
                            <!-- Status Dropdown Button -->
                            <div class="px-2 pb-2">
                                <button @click="statusOpen = !statusOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                    Status
                                    <span class="float-right">&#9662;</span>
                                    <span x-show="statusCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="statusCount"></span>
                                </button>
                                <div x-show="statusOpen" @click.away="statusOpen = false" class="w-full mt-2 space-y-2 statusOpen">
                                    <hr class="my-4 border-gray-300">
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="statusTypesFilter.Whole" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Whole Day</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                        <input type="checkbox" wire:model.live="statusTypesFilter.Male"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                        <label class="ml-2 text-xs font-medium text-customGray1">Undertime</label>
                                    </div>
                                    <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" wire:model.live="statusTypesFilter.Male"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Half-Day</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" wire:model.live="statusTypesFilter.Male"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">No Time Out</label>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-b-lg ">
        <table class="w-full text-sm text-center text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                <tr >
                    <th scope="col" class="px-6 py-3 text-center">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Department
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time In
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Time Out
                    </th>
                    <th scope="col" class="px-6 py-3 " >
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 " >
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="pb-4">

                @if ($EmployeeData->isEmpty())
                        <tr class="bg-white border-b hover:bg-gray-50 ">
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
                        <tr class="bg-white border-b hover:bg-gray-50 ">

                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
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
                                    <div class="font-normal text-left text-gray-500">{{$employee->employee_id}}</div>
                                </div>
                            </th>
                            <td class="px-6 py-4 ">
                                {{$employee->inside_department}}
                            </td>
                            <td class="px-6 py-4 " >
                                {{$employee->department}}
                            </td>
                            <td class="px-6 py-4 " >
                                {{-- {{$data->attendance_date }} --}}
                            </td>
                            <td class="px-6 py-4 " >
                                {{-- {{$data->time_in}} --}}
                            </td>
                            <td class="px-6 py-4 " >
                                {{-- {{$data->time_out}} --}}
                            </td>
                            <td class="px-6 py-4">
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                                    Whole Day
                                </span>
                                {{-- <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-yellow-900 bg-yellow-100 rounded-lg text-nowrap me-2">
                                    Half-Day
                                </span>
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-blue-900 bg-blue-100 rounded-lg text-nowrap me-2">
                                    Overtime
                                </span>
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-red-900 bg-red-100 rounded-lg text-nowrap me-2">
                                    Undertime
                                </span>
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-900 bg-gray-100 rounded-lg text-nowrap me-2">
                                    Overtime
                                </span> --}}
                            </td>
                            <td class="items-center py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                        <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600 " @click="openModal('{{ $employee->employee_id }}')">
                                            Download
                                        </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <div class="w-full p-4 bg-gray-100 rounded-b-lg " wire:scroll>
                {{ $EmployeeData->links(data : ['scrollTo' => False]) }}
        </div>
        </div>
    </div>
</div>

<script>
    function updateTime() {
        const options = { timeZone: 'Asia/Manila', hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const now = new Date().toLocaleTimeString('en-US', options);
        document.getElementById('current-time').textContent = now;
    }
    setInterval(updateTime, 1000); // Update every second
    updateTime(); // Initial call to display time immediately

    function openModal(employeeId) {
        const modalId = 'view-modal_' + employeeId;
        alert(modalId)
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }

    function hideViewModal(employeeId) {
        const modalId = 'view-modal_' + employeeId;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
        } else {
            console.error(`Modal with id ${modalId} does not exist.`);
        }
    }

    function hideDeactivateModal(employeeId) {
        const modalId = 'popup-modal_' + employeeId;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
        } else {
            console.error(`Modal with id ${modalId} does not exist.`);
        }
    }

    function openDeactivateModal(employeeId) {
        const modalId = 'popup-modal_' + employeeId;
        alert(modalId)
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
