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
                <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('HrTicketsTable', ['type' => $type])}}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">HR Tickets</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">HR Ticketing</h2>

        {{-- <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 w-full min-[450px]:w-1/3  lg:w-1/3">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h4 class="mb-2 text-lg font-bold tracking-tight text-gray-900 whitespace-normal dark:text-white xl:whitespace-nowrap">Vacation Credits</h4>
                <p class="text-3xl font-semibold text-red-600 dark:text-gray-400">{{$vacationCredits ?? 0.00}}</p>
            </div>
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h4 class="mb-2 text-lg font-bold tracking-tight text-gray-900 whitespace-normal dark:text-white xl:whitespace-nowrap">Sick Credits</h4>
                <p class="text-3xl font-semibold text-red-600 dark:text-gray-400">{{$sickCredits ?? 0.00}}</p>
            </div>
        </div> --}}


        <div class="flex justify-end">
            <button type="button" onclick="location.href='{{ route('HrTicketsForm', ['type' => $type]) }}'"  class="text-customRed bg-white mb-8 hover:text-white hover:bg-customRed shadow font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Apply for HR Ticket</button>

            {{-- <button type="button" onclick="location.href='{{ route('HrTicketsForm') }}'" class="text-white   mb-8 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Apply a Hr Ticket</button> --}}
        </div>



        <div class="w-full pb-4 overflow-x-auto bg-white rounded-t-lg shadow-md" >
            <div class="flex flex-wrap items-center justify-between p-4 pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
                <div>
                    {{-- Date Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="dateDropDown" class="shadow hover:text-white z-50 inline-flex items-center h-10 p-2 hover:bg-customRed focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                        <svg class="w-3 h-3 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                        {{$dateFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dateDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input id="date_filter-radio-example-1" type="radio" wire:model.live="date_filter" value="0" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; All </input>
                                    {{-- <label for="date_filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300" >All</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input id="date_filter-radio-example-1" type="radio" wire:model.live="date_filter" value="1" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white hover focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">  &nbsp; Last day </input>
                                    {{-- <label for="date_filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300" >Last day</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input checked="" id="date_filter-radio-example-2" type="radio" wire:model.live="date_filter" value="2" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">  &nbsp; Last 7 days </input>
                                    {{-- <label for="date_filter-radio-example-2" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last 7 days</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input id="date_filter-radio-example-3" type="radio" wire:model.live="date_filter" value="3" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">  &nbsp; Last 30 days </input>
                                    {{-- <label for="date_filter-radio-example-3" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last 30 days</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input id="date_filter-radio-example-4" type="radio" wire:model.live="date_filter" value="4" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">  &nbsp; Last 6 Monthss </input>
                                    {{-- <label for="date_filter-radio-example-4" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last 6 Months</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input id="date_filter-radio-example-5" type="radio" wire:model.live="date_filter" value="5" name="date_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">  &nbsp; Last Year </input>
                                    {{-- <label for="date_filter-radio-example-5" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Last year</label> --}}
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Status Filter --}}
                    <button id="dropdownRadioButton" data-dropdown-toggle="statusDropDown" class=" z-50 inline-flex items-center hover:text-white text-gray-900 bg-navButton  h-10 focus:outline-none hover:bg-customRed focus:ring-1 shadow focus:ring-customRed font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                        <svg class="w-3 h-3 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                            </svg>
                        {{$statusFilterName}}
                        <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="statusDropDown" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-gray-200 hover:text-customGray1">
                                    <input id="status_filter-radio-example-1" type="radio" wire:model.live="status_filter" value="0" name="status_filter-radio" class="w-4 h-4 text-gray-600 bg-gray-100 border-gray-300 cursor-pointer focus:ring-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; All </input>
                                    {{-- <label for="status_filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300" >All</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customGreen hover:text-white dark:hover:bg-gray-600">
                                    <input id="status_filter-radio-example-1" type="radio" wire:model.live="status_filter" value="1" name="status_filter-radio" class="w-4 h-4 text-green-800 bg-gray-100 border-gray-300 cursor-pointer ring-2 ring-white focus:ring-green-800 focus:bg-green-800 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; Approved </input>
                                    {{-- <label for="status_filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300" >Approved</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-yellow-500 hover:text-white dark:hover:bg-gray-600">
                                    <input checked="" id="status_filter-radio-example-2" type="radio" wire:model.live="status_filter" value="2" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-amber-800 ring-2 ring-white focus:ring-amber-800 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; Pending </input>
                                    {{-- <label for="status_filter-radio-example-2" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Pending</label> --}}
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 text-gray-900 rounded cursor-pointer hover:bg-customRed hover:text-white dark:hover:bg-gray-600">
                                    <input id="status_filter-radio-example-3" type="radio" wire:model.live="status_filter" value="3" name="status_filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 cursor-pointer text-customRed ring-2 ring-white focus:ring-customRed dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"> &nbsp; Declined </input>
                                    {{-- <label for="status_filter-radio-example-3" class="w-full text-sm font-medium text-gray-900 rounded ms-2 dark:text-gray-300">Declined</label> --}}
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                        <svg class="w-5 h-5 text-gray-900 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="table-search" wire:model.live="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 w-80 bg-gray-50 focus:ring-customRed focus:border-customRed dark:bg-customGray dark:border-customGray border-text dark:placeholder-customGray dark:text-white dark:focus:ring-customRed dark:focus:border-customRed" placeholder="Search like: 2024-01-01 ">
                </div>
            </div>
            <table class="w-full pb-4 text-sm text-left text-gray-500 h-fit rtl:text-right dark:text-gray-400" style="overflow-y:hidden;" >
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
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Date Applied
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Concerned Employee
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Ticket Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Request Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Ticket Info
                        </th>
                        {{-- <th scope="col" class="px-6 py-3 text-center">
                            Reason
                        </th> --}}
                        <th scope="col" class="px-6 py-3 text-center">
                            Actions
                        </th>

                    </tr>
                </thead>
                <div>
                    <div>
                        <tbody class="pb-4">

                        @if ($HrTicketData->isEmpty())
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                    <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px">
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
                                $pageIndex = ($HrTicketData->currentpage() - 1) * $HrTicketData->perpage() + $ctr;
                            @endphp
                            @foreach ($HrTicketData as $index => $hrticket)
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
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                                        {{$pageIndex + $ctr}}
                                    </th>
                                    @if($hrticket->status == "Pending")
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap dark:text-white">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-amber-300 me-2 dark:bg-amber-300 dark:hover:bg-amber-600 dark:focus:ring-amber-800">
                                            <svg class="grid w-6 h-6 grid-cols-1 text-xs text-gray-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 30 24">
                                                <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd"/>
                                                <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $hrticket->status }} &nbsp;
                                        </span>
                                    </th>
                                    @elseif($hrticket->status == "Approved")
                                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap dark:text-white">
                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 me-2 dark:bg-green-300 dark:hover:bg-green-600 dark:focus:ring-green-800">
                                                <svg class="w-6 h-6 mr-1 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11.917 9.724 16.5 19 7.5"/>
                                                </svg>
                                                {{ $hrticket->status }} &nbsp;
                                            </span>
                                        </th>
                                    @else
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap dark:text-white">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 me-2 dark:bg-red-300 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                            <svg class="w-6 h-6 mr-1 text-white dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24"  >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                            </svg>
                                            {{ $hrticket->status }}
                                        </span>
                                    </th>
                                    @endif
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$hrticket->application_date}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$hrticket->concerned_employee}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$hrticket->type_of_ticket}}
                                    </td>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$hrticket->type_of_request}}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                       
                                        @if($hrticket->type_of_request == "Reimbursements")
                                            <span class="font-semibold text-gray-700">Cut-Off Date: </span> {{$hrticket->request_date}} <br>
                                            <span class="font-semibold text-gray-700">Concern Description: </span>{{$hrticket->purpose}} <br>
                                            <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}}
                                        @elseif($hrticket->type_of_request == "Tools and Equipment")
                                            <span class="font-semibold text-gray-700">Equipment Type: </span>{{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Condition/Availability: </span>{{$hrticket->condition_availability}} <br> 
                                        @elseif($hrticket->type_of_request == "Cash Advance")
                                            <span class="font-semibold text-gray-700">Date of Cash Advance Request: </span>{{$hrticket->request_date}} <br>
                                            <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}} <br>
                                        @elseif($hrticket->type_of_request == "Liquidation")
                                            <span class="font-semibold text-gray-700">Liquidation Coverage: </span>{{$hrticket->purpose}} <br>
                                            <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}} <br>
                                        @elseif($hrticket->type_of_request == "Performance Monitoring Request")
                                            <span class="font-semibold text-gray-700">Type Of PE:</span> {{$hrticket->type_of_pe_hr_ops}} <br>
                                            <span class="font-semibold text-gray-700"> Account/Client: </span> {{$hrticket->account_client_hr_ops}} <br>
                                        @elseif($hrticket->type_of_request == "Incident Report")
                                            <span class="font-semibold text-gray-700"> Level of Offense:</span> {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Incident Report:</span> {{$hrticket->purpose}} <br>
                                        @elseif($hrticket->type_of_request == "Request for Issuance of Notice/Letter")
                                            <span class="font-semibold text-gray-700">Type of Notice:</span> {{$hrticket->type_of_hrconcern}} <br>
                                        @elseif($hrticket->type_of_request == "Request for Quotation")
                                            <span class="font-semibold text-gray-700">Specifications:</span> {{$hrticket->type_of_hrconcern}} <br> 
                                            <span class="font-semibold text-gray-700">Purpose:</span> {{$hrticket->purpose}} <br>
                                            <span class="font-semibold text-gray-700">Link Related:</span> {{$hrticket->request_link}} <br>
                                        @elseif($hrticket->type_of_request == "Request to Buy/Book/Avail Service")
                                            <span class="font-semibold text-gray-700">Specifications:</span> {{$hrticket->type_of_hrconcern}} <br> 
                                            <span class="font-semibold text-gray-700">Link Related:</span> {{$hrticket->request_link}} <br>
                                        @elseif($hrticket->type_of_request == "Request for Employee Files")
                                            <span class="font-semibold text-gray-700">Purpose of Request:</span> {{$hrticket->purpose}} <br> 
                                            <span class="font-semibold text-gray-700">Document/s Needed:</span> {{$hrticket->document_requested}} <br>

                                        @elseif($hrticket->sub_type_of_request == "Certificate of Employment" || $hrticket->sub_type_of_request == "Request for Consultation" )
                                            <span class="font-semibold text-gray-700">Purpose of Request:</span> {{$hrticket->purpose}} <br>
                                            <span class="font-semibold text-gray-700">Type of COE </span> {{$hrticket->type_of_hrconcern}} 
                                        @elseif($hrticket->sub_type_of_request == "HMO-related concerns" || $hrticket->sub_type_of_request == "Leave concerns")
                                            <span class="font-semibold text-gray-700">Type of Concern: </span>{{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Concern Description: </span>{{$hrticket->purpose}} <br>
                                            <span class="font-semibold text-gray-700">Link Related: </span>{{$hrticket->request_link}} 
                                        
                                        @elseif($hrticket->sub_type_of_request == "Payroll-related concerns")
                                            <span class="font-semibold text-gray-700">Payroll Date: </span>{{$hrticket->request_date}} <br>
                                            <span class="font-semibold text-gray-700">Type of Concern: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Concern Description: </span>    {{$hrticket->purpose }} <br>
                                            <span class="font-semibold text-gray-700">Link Related: </span>    {{$hrticket->request_link }} 


                                        @elseif($hrticket->sub_type_of_request == "Certificate of Remittances")
                                            <span class="font-semibold text-gray-700">Type of Remittance Certificate: </span>  {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Account Assigned: </span> {{$hrticket->request_assigned}} <br>
                                            <span class="font-semibold text-gray-700">Purpose: </span>    {{$hrticket->purpose}} <br>
                                            <span class="font-semibold text-gray-700">Date Start: </span>    {{$hrticket->request_date}} <br>
                                        @elseif($hrticket->sub_type_of_request == "Government-mandated benefits concern")
                                            <span class="font-semibold text-gray-700">Type of Concern: </span> {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Link Related: </span>    {{$hrticket->request_link}}
                                        @elseif($hrticket->sub_type_of_request == "Messengerial")
                                            <span class="font-semibold text-gray-700">Type of Request: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Company: </span>     {{$hrticket->request_requested}} <br>
                                            <span class="font-semibold text-gray-700">Contact Person: </span>     {{$hrticket->request_assigned}} <br>
                                            <span class="font-semibold text-gray-700">Address of Destination: </span>     {{$hrticket->request_others}} <br>
                                            <span class="font-semibold text-gray-700">Date of Pick Up or Send: </span>     {{$hrticket->request_date}}
                                        @elseif($hrticket->sub_type_of_request == "Repairs/Maintenance")
                                            <span class="font-semibold text-gray-700">Type of Request: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Concerned Area : </span>    {{$hrticket->purpose}}
                                        @elseif($hrticket->sub_type_of_request == "Book a Car")
                                            <span class="font-semibold text-gray-700">Date and Time of Departure: </span>    {{$hrticket->request_date}} <br>
                                            <span class="font-semibold text-gray-700">Date and Time of Pick-Up: </span>    {{$hrticket->request_requested}} <br>
                                            <span class="font-semibold text-gray-700">Passenger/s Name: </span>    {{$hrticket->account_client_hr_ops}} <br>
                                            <span class="font-semibold text-gray-700">Destination: </span>    {{$hrticket->purpose}} <br>
                                        @elseif($hrticket->sub_type_of_request == "Book a Meeting Room")
                                            <span class="font-semibold text-gray-700">Type of Request: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Start Date: </span>    {{$hrticket->request_date}} <br>
                                            <span class="font-semibold text-gray-700">End Date: </span>    {{$hrticket->request_requested}} <br>
                                            <span class="font-semibold text-gray-700">Type of Room: </span>    {{$hrticket->type_of_hrconcern}} <br>
                                            <span class="font-semibold text-gray-700">Purpose: </span>    {{$hrticket->purpose}} <br>
                                        @elseif($hrticket->sub_type_of_request == "Office Supplies")
                                            <span class="font-semibold text-gray-700">Requests: </span> <br> <br>
                                           @if ($hrticket->request_others)
                                                @php
                                                    $ctr_request = 0;
                                                    $supplies_request = json_decode($hrticket->request_others, true);
                                                    // dd($supplies_request, $hrticket->request_others);
                                                    // dd();
                                                @endphp
                                                {{-- @foreach ($supplies_request as $name =>  $request) --}}
                                                   
                                                <div class="">
                                                    @php $ctr_request = 0; @endphp
                                                    <div class="grid grid-cols-3 gap-2 font-semibold">
                                                        <div class="col-span-1">#</div>
                                                        <div class="col-span-1">Name</div>
                                                        <div class="col-span-1">Quantity</div>
                                                    </div>
                                                
                                                    <div class="flex flex-col space-y-2 mt-2">
                                                        @if($supplies_request['ballpen_black'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Ballpen (Black)</div>
                                                                <div class="col-span-1">{{ $supplies_request['ballpen_black'] }}</div>
                                                            </div>
                                                        @endif
                                                
                                                        @if($supplies_request['ballpen_blue'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Ballpen (Blue)</div>
                                                                <div class="col-span-1">{{ $supplies_request['ballpen_blue'] }}</div>
                                                            </div>
                                                        @endif
                                                
                                                        @if($supplies_request['ballpen_red'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Ballpen (Red)</div>
                                                                <div class="col-span-1">{{ $supplies_request['ballpen_red'] }}</div>
                                                            </div>
                                                        @endif
                                                
                                                        @if($supplies_request['ballpen_red'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Ballpen (Red)</div>
                                                                <div class="col-span-1">{{ $supplies_request['ballpen_red'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['pencil'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Pencil</div>
                                                                <div class="col-span-1">{{ $supplies_request['pencil'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['highlighter'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Highlighter</div>
                                                                <div class="col-span-1">{{ $supplies_request['highlighter'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['permanent_marker'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Permanent Marker</div>
                                                                <div class="col-span-1">{{ $supplies_request['permanent_marker'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                @if($supplies_request['correction_tape'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Correction Tape</div>
                                                                <div class="col-span-1">{{ $supplies_request['correction_tape'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['l_green_exp_folder'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Green Expandable Folder (L)                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['l_green_exp_folder'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['s_green_exp_folder'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Green Expandable Folder (S)                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['s_green_exp_folder'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['l_brown_exp_folder'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Brown Expandable Folder (L)                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['l_brown_exp_folder'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                
                                                @if($supplies_request['s_brown_exp_folder'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Brown Expandable Folder (S)                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['s_brown_exp_folder'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['scissors'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Scissors                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['scissors'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['white_envelope'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">White Envelope                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['white_envelope'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['calculator'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Calculator                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['calculator'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['binder_two'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Binder Clips (2")                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['binder_two'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['binder_one_fourth'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Binder Clips (1 1/4")                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['binder_one_fourth'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['binder_three_fourth'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Binder Clips (3/4")                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['binder_three_fourth'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['l_metal_clips'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Metal Paper Clips (L)                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['l_metal_clips'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['binder_one_fourth'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Binder Clips (1 1/4")                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['binder_one_fourth'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['s_metal_clips'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Metal Paper Clips (S)                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['s_metal_clips'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['stapler'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Stapler                                                               </div>
                                                                <div class="col-span-1">{{ $supplies_request['stapler'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['stapler_wire'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Stapler Wire                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['stapler_wire'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['scotch_tape'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Scotch Tape                                                               </div>
                                                                <div class="col-span-1">{{ $supplies_request['scotch_tape'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['l_brown_envelope'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Brown Envelope (L)                                                               </div>
                                                                <div class="col-span-1">{{ $supplies_request['l_brown_envelope'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['post_it'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">Post It                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['post_it'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['white_envelope'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">White Envelope                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['white_envelope'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if($supplies_request['white_folder'] > 0)
                                                            @php $ctr_request += 1; @endphp
                                                            <div class="grid grid-cols-3 gap-2">
                                                                <div class="col-span-1">{{ $ctr_request }}</div>
                                                                <div class="col-span-1">White Folder                                                                </div>
                                                                <div class="col-span-1">{{ $supplies_request['white_folder'] }}</div>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                                {{-- @endforeach --}}
                                           @endif>
                                        @endif
                                    </td>

                                    {{-- <td class="px-6 py-4 text-center">
                                        {{$hrticket->purpose}}
                                    </td> --}}

                                    {{-- <a onclick="location.href='{{ route('ipcredit', ['index' => $hrticket->id]) }}'"  class="font-medium text-blue-600 cursor-pointer dark:text-blue-500 hover:underline">Edit</a> --}}
                                        {{-- <a href="{{route('ipcredit', $hrticket)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                        {{-- <a wire:click="removeIpcr({{$hrticket->id}})" class="font-medium text-red-600 cursor-pointer dark:text-red-500 hover:underline ms-3">Remove</a> --}}

                                    <td class="items-center py-4 text-center">
                                        <div class="top-0"  x-data="{ isOpen: false }" @click.away="isOpen = false">
                                            <button @click="isOpen = !isOpen; adjustDropdownPosition('{{ $loop->index }}')"  class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                    <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                                </svg>
                                            </button>
                                            <div x-show="isOpen" :class="{ 'left-0': isLeftAligned, 'right-0': !isLeftAligned }" class="absolute mt-2 z-40 bg-white divide-y divide-gray-300 rounded-lg shadow w-44 dark:bg-gray-700" id="dropdown{{ $loop->index }}">
                                                <!-- Dropdown content -->
                                                    <ul class="py-2 text-sm divide-y-2 text-gray-700 dark:text-gray-200">
                                                        <li>
                                                            <a onclick="location.href='{{ route('HrTicketsView', ['index' => $hrticket->uuid]) }}'" class="block cursor-pointer px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">View</a>
                                                        </li>
                                                    </ul>
                                                @if ($hrticket->status != "Cancelled" && $hrticket->status != "Approved" )
                                                    <div class="py-2">
                                                        <a id="cancel_button_{{ $loop->index }}" class="block px-4 py-2 cursor-pointer text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white" @click="openCancelModal('{{ $loop->index}}')">Cancel</a>
                                                    </div>
                                                @endif

                                            </div>

                                        </div>
                                    </td>

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
                                                        <button wire:click="cancelForm('{{$hrticket->uuid}}')"  class="text-white bg-red-600 hover:bg-red-800   font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes
                                                        </button>
                                                        <button id="close_button" @click="closeCancelModal('{{ $loop->index }}')"  type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100  focus:z-10  dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                            No
                                                        </button>
                                                    </div>
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
                                                        <a onclick="location.href='{{ route('hrticketEdit', ['index' => $hrticket->id]) }}'"  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a onclick="location.href='{{ route('hrticketPdf', ['index' => $hrticket->id]) }}'" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">PDF</a>
                                                    </li>
                                                </ul>
                                                <div class="py-2">
                                                    <a wire:click="removehrticket({{$hrticket->id}})" wire:confirm="Are you sure you want to delete this post?" class="block px-4 py-2 text-black hover:bg-red-600 hover:text-white dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                                                </div>
                                            </div>
                                        </td> --}}
                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </div>
                </div>
            </table>

        </div>
        <div class="w-full p-4 bg-gray-100 rounded-b-lg">
            {{ $HrTicketData->links() }}
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
        }
    }

    function openCancelModal(index) {
        const modalId = 'popup-modal_' + index;
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        // Select all cancel buttons and add event listeners
        document.querySelectorAll('[id^="cancel_button"]').forEach(cancelButton => {
            const modalId = 'popup-modal' + cancelButton.getAttribute('id').substring(13); // Adjust substring length as per your ID format
            const modal = document.getElementById(modalId);

            // Add click event listener to each cancel button
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
    });
</script>
