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
                <a href="{{route('ItHelpDeskTable')}}" class="ms-1 text-sm font-semibold text-gray-900 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">My Tasks</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">My Tasks</h2>
        
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
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                        <svg class="w-5 h-5 text-gray-900 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" wire:model.live="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 w-80 bg-gray-50 focus:ring-customRed focus:border-customRed border-text " placeholder="Search like: 2024-01-01 ">
                </div>
            </div>
            <table class="w-full pb-4 text-sm text-left text-gray-500 h-fit rtl:text-right" style="overflow-y:hidden;" >
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr>

                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Task Assigner
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Date Filled
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="3">
                            Task Title
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="3">
                            Assigned Task
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="3">
                            Commencement
                        </th>
                        <th scope="col" class="px-6 py-3 text-center" colspan="3">
                            Deadline
                        </th>
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Actions
                        </th>

                    </tr>
                </thead>
                <div>
                    <div>
                        <tbody class="pb-4">

                        @if ($TasksData->isEmpty())
                                <tr class="bg-white border-b hover:bg-gray-50 ">
                                    <th scope="col" colspan="17" class="justify-center" style="padding-bottom: 40px">
                                        <div class="flex justify-center " style="padding-top: 40px">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mt-1 mr-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                            </svg>
                                            <p class="items-center text-xl font-semibold text-customRed "> Nothing to show</p>
                                        </div>
                                    </th>
                                </tr>
                        @else
                            @php
                                $ctr = 0;
                                $pageIndex = ($TasksData->currentpage() - 1) * $TasksData->perpage() + $ctr;
                            @endphp
                            @foreach ($TasksData as $index => $my_task)
                            @php
                                $ctr = $ctr + 1;
                            @endphp
                                <tr class="bg-white border-b hover:bg-gray-50 ">

                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
                                        {{$pageIndex + $ctr}}
                                    </th>
                                    <td class="px-6 py-4 font-semibold text-center text-gray-900 whitespace-nowrap">
                                        @php
                                            $employee_name = $this->getEmployeeName($my_task->employee_id);
                                        @endphp
                                        <span class="font-medium text-gray-700">Name:</span> {{$employee_name}} <br>
                                        <span class="font-medium text-gray-700">ID: </span>{{$my_task->employee_id}}
                                    </td>
                                    @if($my_task->status == "Pending")
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg me-2 ">
                                            <svg class="grid w-6 h-6 grid-cols-1 text-xs text-gray-200 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $my_task->status }} &nbsp;
                                        </span>
                                    </th>
                                    @elseif($my_task->status == "Approved")
                                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen me-2 ">
                                                <svg class="w-6 h-6 mr-1 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                </svg>
                                                {{ $my_task->status }} &nbsp;
                                            </span>
                                        </th>
                                    @else
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customRed me-2 ">
                                            <svg class="w-6 h-6 mr-1 text-white " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            {{ $my_task->status }}
                                        </span>
                                    </th>
                                    @endif
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$my_task->application_date}}
                                    </td>
                                    <td class="px-6 py-4 text-center " colspan="3">
                                        {{$my_task->task_title}}
                                    </td>
                                    <td class="px-6 py-4 text-center" colspan="3">
                                        {{$my_task->assigned_task}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap" colspan="3">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-white rounded-lg bg-customGreen me-2 ">
                                            <svg class="w-6 h-6 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                            </svg>
                                            {{$my_task->start_time}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap" colspan="3">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-white rounded-lg bg-customRed me-2 ">
                                            <svg class="w-6 h-6 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M11.209 3.816a1 1 0 0 0-1.966.368l.325 1.74a5.338 5.338 0 0 0-2.8 5.762l.276 1.473.055.296c.258 1.374-.228 2.262-.63 2.998-.285.52-.527.964-.437 1.449.11.586.22 1.173.75 1.074l12.7-2.377c.528-.1.418-.685.308-1.27-.103-.564-.636-1.123-1.195-1.711-.606-.636-1.243-1.306-1.404-2.051-.233-1.085-.275-1.387-.303-1.587-.009-.063-.016-.117-.028-.182a5.338 5.338 0 0 0-5.353-4.39l-.298-1.592Z"/>
                                                <path fill-rule="evenodd" d="M6.539 4.278a1 1 0 0 1 .07 1.412c-1.115 1.23-1.705 2.605-1.83 4.26a1 1 0 0 1-1.995-.15c.16-2.099.929-3.893 2.342-5.453a1 1 0 0 1 1.413-.069Z" clip-rule="evenodd"/>
                                                <path d="M8.95 19.7c.7.8 1.7 1.3 2.8 1.3 1.6 0 2.9-1.1 3.3-2.5l-6.1 1.2Z"/>
                                              </svg>
                                            {{$my_task->end_time}}
                                        </span>
                                    </td>

                                    <td class="items-center py-4 text-center">
                                        <div class="flex items-center justify-center space-x-2">
                                            <!-- View Button -->
                                            <a onclick="location.href='{{ route('MyTasksView', ['index' => $my_task->uuid]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-500 cursor-pointer  focus:ring-4 focus:ring-gray-50">
                                                View
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </div>
                </div>
            </table>

        </div>
        <div class="p-4 bg-gray-100 w-full rounded-b-lg">
            {{ $TasksData->links() }}
        </div>
        

    </div>
</div> 
</div>

<script>

    function adjustDropdownPosition(index) {
        const dropdown = document.getElementById('dropdown' + index);
        if (dropdown) {
            const rect = dropdown.getBoundingClientRect();
            const isLeftAligned = rect.right > window.innerWidth;
            dropdown.classList.toggle('left-10', isLeftAligned);
            dropdown.classList.toggle('right-10', !isLeftAligned);
        }
    }

    
    function closeCancelModal(index) {
        const modalId = 'popup-modal_' + index;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.add('hidden');
        } else {
            console.error(`Modal with id ${modalId} does not exist.`);
        }
    }

    function openCancelModal(index) {
        const modalId = 'popup-modal_' + index;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }

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
