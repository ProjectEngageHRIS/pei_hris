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
                <a href="{{route('AssignedTasksTable')}}" class="ms-1 text-sm font-semibold text-gray-900 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Assigned Tasks</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Assigned Tasks</h2>
        
        <div class="flex flex-row-reverse self-end mb-4">
            <button type="button" onclick="location.href='{{ route('TasksForm') }}'"  class="text-nowrap border-2 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="inline-block w-4 h-4 mr-2 align-middle">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                </svg>
                Assign a Task
            </button>
        </div>

        <div class="w-full pb-4 mt-4  bg-white rounded-t-lg shadow-md" >
            <div class="p-4 overflow-x-auto ">
                <div class="inline-block min-w-full box-border">
                    <div class="flex  flex-wrap pb-1 items-center justify-between w-full  space-y-4 min-[567px]:space-y-0  flex-column sm:flex-row ">
                        <div class="flex space-x-3 pl-1" style="padding-bottom: 0.05rem">
                        {{-- Date Filter --}}
                        <button id="dropdownRadioButton" data-dropdown-toggle="dateDropDown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 max-[620px]:min-w-[127px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-4" type="button">
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
                            <button id="dropdownRadioButton" data-dropdown-toggle="statusDropDown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 max-[620px]:min-w-[127px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-4" type="button">
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
                                            <input id="status_filter-radio-1" type="radio" wire:model.live="status_filter" value="1" name="status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 focus:ring-2 "> <label for="status_filter-radio-1" class="cursor-pointer">&nbsp; Completed </label> </input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="status_filter-radio-2" class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white ">
                                            <input checked="" id="status_filter-radio-2" type="radio" wire:model.live="status_filter" value="2" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 focus:ring-2 "> <label for="status_filter-radio-2" class="cursor-pointer"> &nbsp; Pending </label></input>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="status_filter-radio-3"class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white ">
                                            <input id="status_filter-radio-3" type="radio" wire:model.live="status_filter" value="3" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> <label for="status_filter-radio-3" class="cursor-pointer">&nbsp; Cancelled</label>  </input>
                                        </label>
                                    </li>
                                </ul>
                            </div>  
                        </div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative max-[567px]:pl-1  ">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                                <svg class="w-5 h-5 text-gray-900" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" wire:model.live.debounce.250ms="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 bg-gray-50 focus:ring-customRed focus:border-customRed border-text w-full max-[567px]:w-282 lg:w-full xl:w-full"  placeholder="Search like: 2024-01-01">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full pb-4 text-sm text-left text-gray-500 h-fit rtl:text-right " style="overflow-y:hidden;" >
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                        <tr>

                            <th scope="col" class="px-6 py-3 text-center">
                                No.
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
                                        @if($my_task->status == "Pending")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg me-2">
                                                    <svg class="grid w-6 h-6 grid-cols-1 text-xs text-gray-200 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                        <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                        <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                                    </svg>
                                                    Pending &nbsp;
                                                </span> 
                                            </th>
                                        @elseif($my_task->status == "Completed")
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen me-2 ">
                                                    <svg class="w-6 h-6 mr-1 text-white " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                    </svg>
                                                    Completed &nbsp;
                                                </span>
                                            </th>
                                        @else
                                            <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
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
                                        <td class="px-6 py-4 text-center" colspan="3">
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
                                            <div class="flex items-center  space-x-2">
                                                <!-- View Button -->
                                                <a onclick="location.href='{{ route('AssignedTasksView', ['index' => $my_task->uuid]) }}'" class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600 ">
                                                    View
                                                </a>
                                                <!-- Cancel Button -->
                                                @if ($my_task->status == "Pending" )
                                                    <button @click="openButtonCrudModal('{{$my_task->form_id}}', '{{$my_task->status}}')"
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
                                class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-300"
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
                                                        <option class="hover:bg-customRed hover:text-white" value="Cancelled">Cancelled</option>
                                                        {{-- <option class="hover:bg-customRed hover:text-white" value="Report">Cancelled</option> --}}
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
                                    <div class="relative p-4 w-full mx-4 sm:mx-auto  max-w-md max-h-full">
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
                            <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                                    @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Task Updated'; setTimeout(() => showToast = false, 3000)"
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

                    </div>
                </table>
            </div>


        </div>
        <div class="p-4 bg-gray-100 w-full rounded-b-lg">
            {{ $TasksData->links() }}
        </div>
        
        <div wire:loading wire:target="changeStatus" class="load-over z-50">
            <div wire:loading wire:target="changeStatus" class="loading-overlay z-50">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Updating...</p>
                </div>
            </div>
        </div>

        <div wire:loading wire:target="search, date_filter, status_filter" class="fixed inset-x-0 top-1/4 flex justify-center pointer-events-none z-50">
            <div class="z-50 mt-4">
                <div id="toast-container" class="flex items-center justify-center w-full h-full">
                    <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 border-6 border-white text-customRed bg-white bg-opacity-100 rounded-lg shadow"
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
