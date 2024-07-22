<div class="p-4 main-content">
    <div class="rounded-lg ">
        <nav class="flex mb-2" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed ">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg> Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="{{route('AttendanceTable')}}" class="text-sm font-semibold text-gray-900 ms-1 hover:text-customRed md:ms-2 ">Daily Time Record</a>
                    </div>
                </li>
            </ol>
        </nav>
        <h2 class="text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl ">Daily Time Record</h2>
        <div class="flex justify-end mt-4">
            <button id="generate-record-btn" class="place-items-end mb-2 font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="inline-block w-4 h-4 mr-2">
                <path d="M5.75 7.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM5 10.25a.75.75 0 1 1 1.5 0 .75.75 0 0 1-1.5 0ZM10.25 7.5a.75.75 0 1 0 0 1.5.75.75 0 0 0 0-1.5ZM7.25 8.25a.75.75 0 1 1 1.5 0 .75.75 0 0 1-1.5 0ZM8 9.5A.75.75 0 1 0 8 11a.75.75 0 0 0 0-1.5Z" />
                <path fill-rule="evenodd" d="M4.75 1a.75.75 0 0 0-.75.75V3a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2V1.75a.75.75 0 0 0-1.5 0V3h-5V1.75A.75.75 0 0 0 4.75 1ZM3.5 7a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v4.5a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1V7Z" clip-rule="evenodd" />
              </svg>
              Generate Record
            </button>
          </div>
        <div id="date-range-picker" class="flex-col items-center hidden p-5 bg-white rounded-lg shadow-lg">
            <div class="flex w-full mb-4">
                <div class="w-1/2 pr-2">
                    <label for="start-date"  class="block text-sm font-medium text-customGray1">Start Date</label>
                    <input type="date" id="start-date" wire:model="start_date" class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-customRed focus:border-customRed">
                </div>
                <div class="w-1/2 pl-2">
                    <label for="end-date" class="block text-sm font-medium text-customGray1">End Date</label>
                    <input type="date" id="end-date" wire:model="end_date" class="block w-full p-2 mt-1 border border-gray-300 rounded-md focus:ring-customRed focus:border-customRed">
                </div>
            </div>
            <div class="flex justify-end w-full mb-4">
                <button  id="cancel-btn" class="text-gray-500 border  hover:bg-gray-400 hover:text-gray-100 font-medium rounded-8px text-sm px-5 py-2.5  shadow">Cancel</button>
                <form wire:submit.prevent="generateRecord" method="POST">
                    <button  type="submit"   id="export-btn" class="font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 ml-2 shadow">Export</button>
                </form>
            </div>
        </div>
    </div> <br>
    <div class="col-span-3 gap-4">
        <div class="w-full col-span-2 p-4 pb-4 bg-white rounded-lg shadow md:p-4 ">
            <div class="flex justify-between">
                <div>
                    <p class="text-2xl font-bold text-customRed " style="word-break: break-word;">Summary</p>
                </div>
                <div class="flex items-center px-2.5 py-0.5 text-base font-semibold text-customGreen  text-center">
                    <svg class="w-3 h-3 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4"/>
                    </svg>
                </div>
            </div>
            <div id="area-chart"></div>
            <div class="grid items-center justify-between grid-cols-1 border-t border-gray-200 ">
                <div class="flex items-center justify-between">
                    <!-- Button -->
                    <button
                        id="dropdownDefaultButton"
                        data-dropdown-toggle="lastDaysdropdown"
                        data-dropdown-placement="bottom"
                        class="inline-flex items-center mt-2 text-sm font-medium text-center text-gray-900 hover:text-gray-900 "
                        type="button" >
                        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="lastDaysdropdown" class="relative z-50 hidden w-20 bg-white divide-y divide-gray-100 rounded-lg shadow ">
                        <ul class="py-2 text-sm text-gray-900 " aria-labelledby="dropdownDefaultButton">
                            <a wire:click.prevent="setFilter('weekly')" class="block px-4 py-2 hover:bg-customRed hover:text-white">Weekly</a>
                            <a wire:click.prevent="setFilter('monthly')" class="block px-4 py-2 hover:bg-customRed hover:text-white">Yearly</a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <br>
<div class="overflow-x-auto bg-white rounded-t-lg shadow-md ">
    <div class="flex flex-wrap items-center justify-between p-4 pb-4 space-y-4 flex-column sm:flex-row sm:space-y-0">
        <div>
            <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="z-50 inline-flex items-center shadow h-10 p-2 focus:ring-1 focus:border-1 focus:ring-customRed focus:border-customRed font-medium text-sm px-3 py-1.5 bg-navButton text-gray-900 rounded-8px hover:bg-customRed hover:text-white" type="button">
                <svg class="w-3 h-3 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
                </svg>
                {{$filterName}}
                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownRadio" class="z-10 hidden w-40 mt-1 bg-white rounded-md shadow-lg center-0 ring-1 ring-black ring-opacity-5 focus:outline-none">
                <ul class="p-3 space-y-1 text-sm text-gray-700 " aria-labelledby="dropdownRadioButton">
                    <div class="flex items-center p-2 rounded bg-navButton text-activeButton hover:bg-customRed hover:text-white">
                        <input id="filter-radio-example-0" type="radio" wire:model.live="filter" value="0" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2"> &nbsp; All </input>
                    </div>
                    <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white ">
                        <input id="filter-radio-example-1" type="radio" wire:model.live="filter" value="1" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> &nbsp;  Today </input>
                    </div>
                    <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white ">
                        <input id="filter-radio-example-2" type="radio" wire:model.live="filter" value="2" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> &nbsp;  Last 7 days </input>
                    </div>
                    <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white ">
                        <input id="filter-radio-example-3" type="radio" wire:model.live="filter" value="3" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> &nbsp; Last 30 days   </input>
                    </div>
                    <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white ">
                        <input id="filter-radio-example-4" type="radio" wire:model.live="filter" value="4" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> &nbsp;  Last 6 Months </input>
                    </div>
                    <div class="flex items-center p-2 text-gray-900 rounded hover:bg-customRed hover:text-white ">
                        <input id="filter-radio-example-5" type="radio" wire:model.live="filter" value="5" name="filter-radio" class="w-4 h-4 bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2 "> &nbsp;  Last year</input>
                    </div>
                </ul>
            </div>
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                <svg class="w-5 h-5 text-customGray1 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" wire:model.live="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 w-80 bg-gray-50 focus:ring-customRed focus:border-customRed border-text" placeholder="Search like: 2024-01-01 ">
        </div>
    </div>
</div>
<div id="data-table" class="relative overflow-x-auto">
    <table class="w-full pb-4 text-sm text-left text-gray-500 rtl:text-right ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
            <tr>
                <th scope="col" class="px-6 py-3 text-center"> No. </th>
                <th scope="col" class="px-6 py-3 text-center"> Date </th>
                <th scope="col" class="px-6 py-3 text-center"> Type </th>
                <th scope="col" class="px-6 py-3 text-center"> Day of the Week </th>
                <th scope="col" class="px-6 py-3 text-center"> Time In </th>
                <th scope="col" class="px-6 py-3 text-center"> Time Out </th>
                <th scope="col" class="px-6 py-3 text-center"> Undertime </th>
                <th scope="col" class="px-6 py-3 text-center"> Overtime </th>
            </tr>
        </thead>
        <div>
            <div wire:ignore>
                <tbody class="pb-4">
                    @if ($DtrData->isEmpty())
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
                    <div>
                        @php
                            $ctr = 0;
                            $pageIndex = ($DtrData->currentpage() - 1) * $DtrData->perpage() + $ctr ;
                        @endphp
                    </div>
                    @foreach ($DtrData as $index =>$data)
                    <div>
                        @php
                            $ctr = $ctr + 1;
                        @endphp
                    </div>
                    <tr class="bg-white border-b hover:bg-gray-50 ">
                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
                            {{$pageIndex + $ctr}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                {{$data->attendance_date }}
                            </span>
                        </th>
                        @php

                        @endphp
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            @if ($data->type == "Wholeday")
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-green-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                    {{$data->type}}
                                </span>
                            @elseif ($data->type == "Overtime")
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-blue-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                    {{$data->type}}
                                </span>
                            @elseif ($data->type == "Undertime")
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-red-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                    {{$data->type}}
                                </span>
                            @elseif ($data->type == "Half-Day")
                                <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                    {{$data->type}}
                                </span>
                            @else
                                {{-- @dd($data->late) --}}
                                @if ($data->late == 1)
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-customRed rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                        Late & {{$data->type ?? 'No Time Out'}}
                                    </span>
                                @else
                                    <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-gray-500 rounded-lg focus:ring-4 focus:outline-none focus:ring-red-300 me-2">
                                        {{$data->type ?? 'No Time Out'}}
                                    </span>
                                @endif

                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{ Illuminate\Support\Carbon::parse($data->attendance_date)->format('l') }}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$data->time_in}}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$data->time_out}}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$data->undertime}}
                        </td>
                        <td class="px-6 py-4 text-center whitespace-nowrap">
                            {{$data->overtime}}
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </div>
        </div>
    </table>
</div>
<div  class="w-full p-4 overflow-x-auto bg-gray-100 rounded-b-lg">
    {{ $DtrData->links(data : ['scrollTo' => '#data-table'])}}
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option',
            closeOnSelect: false,
        }).on('change', function() {
            let data = $(this).val();
            console.log(data);
            @this.dateChosen = data;
        });

        // Toggle modal visibility when form submission is completed
        Livewire.on('formSubmitted', () => {
            $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
        });
    });
    document.getElementById('generate-record-btn').addEventListener('click', function() {
        document.getElementById('date-range-picker').classList.toggle('hidden');
    });

    document.getElementById('cancel-btn').addEventListener('click', function() {
        document.getElementById('date-range-picker').classList.add('hidden');
    });

    document.getElementById('export-btn').addEventListener('click', function() {
        // Handle export functionality here
        alert('Exporting data...');
    });

    const options = {
        chart: {
            height: "100%",
            maxHeight: "100%",
            maxWidth: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            animations: {
                enabled: false,
            },
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        tooltip: {
            enabled: true,
            x: {
                show: true,
            },
        },
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#A90024",
                gradientToColors: ["#A90024"],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        grid: {
            show: true,
            strokeDashArray: 4,
            padding: {
                left: 20,
                right: 0,
                bottom: 0,
                top: 0
            },
        },
        series: [
            {
                name: "Weekly Count",
                data: @json($data),
                color: "#A90024",
            },
        ],
        yaxis: {
            labels: {
                show: true,
            },
            min: 1,
            max: 7,
            axisBorder: {
                show: true,
            },
            axisTicks: {
                show: true,
            }
        },
        xaxis: {
            categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
            labels: {
                show: true,
            },
            beginAtZero: true,
            min: 1,
            max: 5,
            axisBorder: {
                show: true,
            },
            axisTicks: {
                show: true,
            }
        }
    };

    const chart = new ApexCharts(document.getElementById("area-chart"), options);
    chart.render();

    document.addEventListener('livewire:init', () => {
        Livewire.on('refresh-monthly-chart', (chartData) => {
            chart.updateSeries([{
                name: "Monthly Count",
                data: chartData.data,
            }])
            chart.updateOptions({
                xaxis: {
                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    min: 1,
                    max: 12,
                },
                yaxis: {
                    min: 1,
                    max: 31
                }
            })
        })
    });

    document.addEventListener('livewire:init', () => {
        Livewire.on('refresh-weekly-chart', (chartData) => {
            chart.updateSeries([{
                name: "Weekly Count",
                data: chartData.data,
            }])
            chart.updateOptions({
                xaxis: {
                    categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5'],
                    min: 1,
                    max: 5,
                },
                yaxis: {
                    min: 1,
                    max: 7
                }
            })
        })
    });
</script>
