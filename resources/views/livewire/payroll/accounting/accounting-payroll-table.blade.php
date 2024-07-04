<div class="main-content">
    <div class="p-4 rounded-lg ">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-customRed ">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-500 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('AccountingPayrollTable')}}" class="text-sm font-semibold ms-1 text-gray-00 hover:text-customRed md:ms-2 ">Accounting Payroll</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-8 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">Accounting Payroll</h2>

        <div class="overflow-x-auto bg-white rounded-t-lg shadow-md ">
            <div class="flex flex-wrap items-center justify-between p-4 pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
            <div>
                <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="z-50 inline-flex items-center shadow h-10 p-2 focus:ring-1 focus:border-1 focus:ring-customRed focus:border-customRed font-medium text-sm px-3 py-1.5 bg-navButton text-gray-900 rounded-8px hover:bg-customRed hover:text-white" type="button">
                    <svg class="w-3 h-3 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                        </svg>
                    <span class="">{{$filterName}}</span>
                    <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownRadio" class="z-50 hidden w-48 mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow " data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                    <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-1" type="radio" wire:model.live="filter" value="0" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed focus:ring-customRed focus:ring-2 ">
                                <label for="filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 " >All</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-1" type="radio" wire:model.live="filter" value="1" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed focus:ring-customRed focus:ring-2 ">
                                <label for="filter-radio-example-1" class="w-full text-sm font-medium text-gray-900 rounded ms-2 " >Last day</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input checked="" id="filter-radio-example-2" type="radio" wire:model.live="filter" value="2" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed focus:ring-customRed focus:ring-2 ">
                                <label for="filter-radio-example-2" class="w-full text-sm font-medium text-gray-900 rounded ms-2 ">Last 7 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-3" type="radio" wire:model.live="filter" value="3" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed focus:ring-customRed focus:ring-2 ">
                                <label for="filter-radio-example-3" class="w-full text-sm font-medium text-gray-900 rounded ms-2 ">Last 30 days</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-4" type="radio" wire:model.live="filter" value="4" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed focus:ring-customRed focus:ring-2 ">
                                <label for="filter-radio-example-4" class="w-full text-sm font-medium text-gray-900 rounded ms-2 ">Last 6 Months</label>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                <input id="filter-radio-example-5" type="radio" wire:model.live="filter" value="5" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed focus:ring-customRed focus:ring-2 ">
                                <label for="filter-radio-example-5" class="w-full text-sm font-medium text-gray-900 rounded ms-2 ">Last year</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                    <svg class="w-5 h-5 text-gray-900 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                </div>
                <input type="text" id="table-search" wire:model.live="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 w-80 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search like: 2024-01-01 ">
            </div>
            </div>
            <table class="w-full pb-4 text-sm text-left text-gray-500 rtl:text-right ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                    <tr>

                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Employee ID
                         </th>
                        <th scope="col" class="px-6 py-3 text-center">
                           Start Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            End Date
                         </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Actions
                        </th>
                    </tr>
                </thead>
                <div>
                    <div>
                        <tbody class="pb-4">

                        @if ($resultsCount == 0)
                                <tr class="bg-white border-b hover:bg-gray-50 ">
                                    <th scope="col" colspan="8" class="justify-center" style="padding-bottom: 40px">
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
                                $pageIndex = ($PayrollData->currentpage() - 1) * $PayrollData->perpage() + $ctr;
                            @endphp
                            @foreach ($PayrollData as $index => $data)
                            @php
                                $ctr = $ctr + 1;
                            @endphp
                                <tr class="bg-white border-b  hover:bg-gray-50 ">
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
                                        {{$pageIndex + $ctr}}
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-lg text-center text-gray-200 bg-customRed rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                            {{$data->employee_id}}
                                        </span>
                                    </th>
                                    <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                                        {{$data->start_date}}
                                    </th>
                                    <td class="px-6 py-4 text-center whitespace-nowrap">
                                        {{$data->end_date}}
                                    </td>
                                    <td wire:ignore class="items-center py-4 text-center">
                                        <button wire:ignore  data-dropdown-toggle="dropdown{{$loop->index}}" class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 " type="button">
                                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
                                            </svg>
                                        </button>
                                        <div class="top-0 right-0 z-10 hidden mt-2 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 " id="dropdown{{$loop->index}}">
                                            <!-- Dropdown content -->
                                            <ul class="py-2 text-sm text-gray-700 ">
                                                {{-- <li>
                                                    <a onclick="location.href='{{ route('PayrollPdf', ['date' => $data->start_date]) }}'" class="block px-4 py-2 hover:bg-gray-100 ">PDF</a>
                                                </li> --}}
                                                <li>
                                                    <a wire:click="downloadPayroll('{{$data->payroll_id}}')" class="block px-4 py-2 hover:bg-gray-100 ">Download Payroll</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>

                    </div>
                </div>

            </table>
            <div class="w-full p-4 bg-gray-100 rounded-b-lg">
                {{ $PayrollData->links() }}
            </div>
        </div>

</div>
