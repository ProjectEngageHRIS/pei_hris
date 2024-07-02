<div class="main-content">
    <nav class="flex my-4 ml-2" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1">
            <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-customRed">
                <svg class="size-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg> Home
            </a>
            <div class="flex items-center">
                <svg class="size-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('profile')}}" class="text-sm font-semibold text-gray-800 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Profile</a>
            </div>
        </ol>
    </nav>
    <div class="flex flex-col lg:flex-row gap-4 justify-stretch items-stretch">
        <div class="flex flex-col gap-y-4 w-full">
            <div class="w-full bg-white border-gray-800 rounded-lg shadow border-10">
                <a href="{{route('changeInformation')}}" class="justify-end float-right px-4 py-4 block text-sm font-semibold text-center ">
                    <svg class="size-5 text-gray-800 hover:text-customRed" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z"/>
                    </svg>
                </a>
                <div class="p-4 flex flex-row items-center overflow-hidden">
                    @if(is_null($employeeImage) == False)
                    @php
                        $employee_image = $this->getImage();
                    @endphp
                    {{-- <img src="data:image/gif;base64,{{ base64_encode($emp_image) }}" alt="Image Description" class="w-full h-full object-contain">  --}}
                    <img
                        class="size-20 rounded-full" 
                        src="data:image/gif;base64,{{ base64_encode($employee_image) }}"
                        alt="Employee Image"/>
                    @else   
                        <img class="size-20 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Employee Image"/> 
                    @endif
                    <div class="ml-8 text-left">
                        <h5 class="text-lg font-medium text-customGray1 text-nowrap">{{$first_name}} {{$middle_name}} {{$last_name}}</h5>
                        <p class="text-base italic font-medium text-customRed" style="word-break: break-word; overflow-wrap: break-word;">{{$nickname}}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col w-full justify-stretch items-stretch">
                <div class="text-sm font-medium text-center text-gray-500 bg-white border border-b rounded-t-lg">
                    <ul class="flex flex-wrap -mb-px gap-2">
                        <a href="#" wire:click.prevent="setTab('Summary')" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg  {{ $filter === 'Summary' ?  'text-customRed border-b-2 border-customRed rounded-t-lg active ' : 'hover:text-customRed hover:border-customRed ' }}" >Summary</a>
                        <a href="#" wire:click.prevent="setTab('PersonalInfo')"  class="inline-block p-4 border-b-2 border-transparent rounded-t-lg  {{ $filter === 'PersonalInfo' ?  'text-customRed border-b-2 border-customRed rounded-t-lg active ' : 'hover:text-customRed hover:border-customRed' }}">Information</a>
                        <a href="#" wire:click.prevent="setTab('History')"  class="inline-block p-4 border-b-2 border-transparent rounded-t-lg {{ $filter === 'History' ?  'text-customRed border-b-2 border-customRed rounded-t-lg active ' : 'hover:text-customRed hover:border-customRed ' }}">History</a>
                        <a href="#" wire:click.prevent="setTab('Performance')"  class="inline-block p-4 border-b-2 border-transparent rounded-t-lg  {{ $filter === 'Performance' ?  'text-customRed border-b-2 border-customRed rounded-t-lg active ' : 'hover:text-customRed hover:border-customRed' }}">Performance</a>
                    </ul>
                </div>
                @if ($filter == "Summary")
                    <div class="flex flex-col mb-2 py-6 px-8 border items-left justify-left border-gray-200 rounded-b-lg shadow-sm bg-white">
                        <h3 class="text-base font-semibold text-customRed"> Summary Profile: </h3>
                        <p class="mt-4 text-sm font-medium indent-8 text-customGray1 text-justify" >{{$profile_summary}}</p>
                    </div>
                @elseif($filter == "PersonalInfo")
                    <div class="flex flex-col mb-2 py-6 px-8 border items-left justify-left border-gray-200 rounded-b-lg shadow-sm bg-white">
                        <h3 class="text-base font-semibold text-customRed mb-4"> Employee Information: </h3>
                        <div class="flex flex-col lg:flex-row gap-x-10 text-wrap gap-y-4">
                            <div class="flex flex-col gap-y-4">
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Gender:</b> {{$gender}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Contact No.:</b> {{$phone}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Civil Status:</b> {{$civil_status}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Religion:</b> {{$religion}}</p>
                            </div>
                            <div class="flex flex-col gap-y-4">
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Birth Date:</b> {{$birth_date}} </p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Age:</b> {{number_format($age, 0)}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Email:</b> {{$employee_email}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Address:</b> {{$address}}</p>
                            </div>  
                            <div class="flex flex-col gap-y-4">
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Department Name:</b> {{$department}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Employee Type:</b> {{$employee_type}}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Position:</b> {{$current_position }}</p>
                                <p class="text-sm font-medium text-customGray1"><b class="text-sm font-lg text-customGray1 ">Employee ID:</b> {{$employee_id}} </p>
                            </div>
                        </div>
                    </div>
                @elseif ($filter == "History")
                    <div class="flex flex-col mb-2 py-6 px-8 border items-left justify-left border-gray-200 rounded-b-lg shadow-sm bg-white">
                        <h3 class="text-base font-semibold text-customRed "> Employee History: </h3>
                        @if ($employeeHistory)
                            @foreach ($employeeHistory as $index => $record)
                                <p class="my-4 text-justify text-sm font-medium text-customGray1">□ {{$record->prev_position}} @ {{$record->name_of_company}} | From {{$record->start_date}} To {{$record->end_date}}</p>
                            @endforeach
                        @else
                            <div class="text-gray-800">
                                <p class="my-4"><b>No History Available</b> </p>
                            </div>
                        @endif
                        <h3 class="text-base font-semibold text-customRed">Educational History: </h3>
                        <p class="my-4 text-justify"><b class="text-sm font-medium text-customGray1">□ College @ <span class="text-sm font-medium text-customGray1">{{$college_educational_history['school']}}</span> - <span class="text-sm font-medium text-customGray1">{{$college_educational_history['course']}}</span> | From {{$college_educational_history['year_graduated']}} To {{$record->end_date}} </b> </p>
                        <p class="my-4 text-justify"><b class="text-sm font-medium text-customGray1">□ High School @ <span class="text-sm font-medium text-customGray1">{{$hs_educational_history['school']}}</span> - <span class="text-sm font-medium text-customGray1">{{$hs_educational_history['course']}}</span> | From {{$hs_educational_history['year_graduated']}} To {{$record->end_date}} </b> </p>
                    </div>
                @else
                    <div class="flex flex-col mb-2 py-6 px-8 border items-left justify-left border-gray-200 rounded-b-lg shadow-sm bg-white">
                        <h3 class="text-base font-semibold text-customRed">Performance: </h3>
                        @if ($employee_performance)
                            <div class="ml-4">
                                <h5 class="text-base text-gray-900 font-base dark:text-white">3rd Month: </h5>
                                @foreach ($employee_performance as $index => $record)
                                    <p class="my-4"><b>{{$index + 1}}. <span class="text-customGray1">
                                    @if ($record->third_month_status == "Completed")
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen me-2">
                                            {{$record->third_month_status}}
                                        </span>
                                        @elseif ($record->third_month_status == "Half-Baked")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg me-2">
                                            {{$record->third_month_status}}
                                        </span>
                                        @elseif ($record->third_month_status == "Pending")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGray me-2">
                                            {{$record->third_month_status}}
                                        </span>
                                        @else
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customRed me-2">
                                            {{$record->third_month_status}}
                                        </span>
                                        @endif
                                        </span> - <a href="{{$record->third_month}}" class="text-sm font-medium text-customGray1">{{$record->third_month}}</a> <br></b> </p>
                                    @endforeach
                                        <div class="ml-4">
                                            <h5 class="text-base font-medium text-gray-900 dark:text-white">5th Month: </h5>
                                            @foreach ($employee_performance as $index => $record)
                                            <p class="my-4"><b>□ <span class="text-customGray1">
                                            @if ($record->fifth_month_status == "Completed")
                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen me-2">
                                                {{$record->fifth_month_status}}
                                            </span>
                                            @elseif ($record->fifth_month_status == "Half-Baked")
                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg me-2">
                                                {{$record->fifth_month_status}}
                                            </span>
                                            @elseif ($record->fifth_month_status == "Pending")
                                            <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGray me-2">
                                                {{$record->fifth_month_status}}
                                            </span>
                                            @else
                                            <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customRed me-2">
                                                {{$record->fifth_month_status}}
                                            </span>
                                            @endif
                                    </span> - <a href="{{$record->fifth_month}}" class="text-sm font-medium text-customGray1">{{$record->fifth_month}}</a> <br></b> </p>
                                    @endforeach
                                        </div>
                                    <div class="ml-4">
                                    <h5 class="text-base font-medium text-gray-900 dark:text-white">Annual: </h5>
                                    @foreach ($employee_performance as $index => $record)
                                    <p class="my-4"><b>□ <span class="text-customGray1">
                                    @if ($record->annual_status == "Completed")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGreen me-2">
                                            {{$record->annual_status}}
                                        </span>
                                    @elseif ($record->annual_status == "Half-Baked")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 bg-yellow-500 rounded-lg me-2">
                                            {{$record->annual_status}}
                                        </span>
                                    @elseif ($record->annual_status == "Pending")
                                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customGray me-2">
                                            {{$record->annual_status}}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-gray-200 rounded-lg bg-customRed me-2">
                                            {{$record->annual_status}}
                                        </span>
                                    @endif
                                    </span> - <a href="{{$record->annual}}" class="text-sm font-medium text-customGray1">{{$record->annual}}</a> <br></b> </p>
                                    @endforeach
                                </div>
                                <div class="ml-4">
                                    <h5 class="text-base font-medium text-gray-customGray1 dark:text-white">Improvement Plan: </h5>
                                    @foreach ($employee_performance as $index => $record)
                                    <p class="my-4"><b>□ <span class="text-sm font-medium text-customGray1">
                                    </span>  <a href="{{$record->improvement_plan}}" class="text-sm font-medium text-customGray1">{{$record->improvement_plan}}</a> <br></b> </p>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-sm font-medium text-customGray1">
                                    <p class="my-4"><b class="text-sm font-medium text-customGray1">Nothing to show. </b> </p>
                                </div>
                            @endif
                    </div>
                @endif
            </div>
        </div>
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center justify-between mb-4">
                <p class="text-lg font-bold text-customRed" style="word-break: break-all; overflow-wrap: break-word;">Submitted Documents</p>
            </div>
            <div class="flow-root">
                <ul role="list" class="divide-y divide-customGray">
                    @if ($employeeImage)
                    <li class="py-1 sm:py-2">
                        <a target="_blank" href="{{route('downloadFile', ['file' => 'photo'])}}" class="text-sm font-medium truncate text-customGray dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-customGray" >
                                        <path d="M12 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 12 9Z" />
                                        <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 0 1 5.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 0 1-3 3h-15a3 3 0 0 1-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 0 0 1.11-.71l.822-1.315a2.942 2.942 0 0 1 2.332-1.39ZM6.75 12.75a5.25 5.25 0 1 1 10.5 0 5.25 5.25 0 0 1-10.5 0Zm12-1.5a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 truncate text-customGray"> Photo </div>
                            </div>
                        </a>
                    </li>
                    @else
                    <li class="py-1 sm:py-2">
                        <div class="flex items-center ml-4">
                            <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-customRed">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <div class="flex-1 min-w-0 text-sm font-medium truncate text-customRed"> No Photo Yet. </div>
                        </div>
                    </li>
                    @endif
                    @if ($empDiploma)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                                        <path d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                                        <path d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                                        <path d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1"> Diploma </div>
                            </div>
                        </span>
                    </li>
                    @endif
                    @if ($emp_tor)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Zm-1 9a1 1 0 1 0-2 0v2a1 1 0 1 0 2 0v-2Zm2-5a1 1 0 0 1 1 1v6a1 1 0 1 1-2 0v-6a1 1 0 0 1 1-1Zm4 4a1 1 0 1 0-2 0v3a1 1 0 1 0 2 0v-3Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1 "> Transcript of Records </div>
                            </div>
                        </span>
                    </li>
                    @endif
                    @if ($empCertOfTrainingsSeminars)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                                        <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1"> Certificate of Trainings/Seminars </div>
                            </div>
                        </span>
                    </li>
                    @endif
                    @if ($empAuthCopyOfCscOrPrc)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                                        <path fill-rule="evenodd" d="M4.5 3.75a3 3 0 0 0-3 3v10.5a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V6.75a3 3 0 0 0-3-3h-15Zm4.125 3a2.25 2.25 0 1 0 0 4.5 2.25 2.25 0 0 0 0-4.5Zm-3.873 8.703a4.126 4.126 0 0 1 7.746 0 .75.75 0 0 1-.351.92 7.47 7.47 0 0 1-3.522.877 7.47 7.47 0 0 1-3.522-.877.75.75 0 0 1-.351-.92ZM15 8.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15ZM14.25 12a.75.75 0 0 1 .75-.75h3.75a.75.75 0 0 1 0 1.5H15a.75.75 0 0 1-.75-.75Zm.75 2.25a.75.75 0 0 0 0 1.5h3.75a.75.75 0 0 0 0-1.5H15Z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1"> Authenticated Copy of CSC or PRC license </div>
                            </div>
                        </span>
                    </li>
                    @endif
                    @if ($empAuthCopyOfPrcBoardRating)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M18 14a1 1 0 1 0-2 0v2h-2a1 1 0 1 0 0 2h2v2a1 1 0 1 0 2 0v-2h2a1 1 0 1 0 0-2h-2v-2Z" clip-rule="evenodd"/>
                                        <path fill-rule="evenodd" d="M15.026 21.534A9.994 9.994 0 0 1 12 22C6.477 22 2 17.523 2 12S6.477 2 12 2c2.51 0 4.802.924 6.558 2.45l-7.635 7.636L7.707 8.87a1 1 0 0 0-1.414 1.414l3.923 3.923a1 1 0 0 0 1.414 0l8.3-8.3A9.956 9.956 0 0 1 22 12a9.994 9.994 0 0 1-.466 3.026A2.49 2.49 0 0 0 20 14.5h-.5V14a2.5 2.5 0 0 0-5 0v.5H14a2.5 2.5 0 0 0 0 5h.5v.5c0 .578.196 1.11.526 1.534Z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1"> Authenticated copy of PRC Board Rating </div>
                            </div>
                        </span>
                    </li>
                    @endif
                    @if($empMedCertif)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h14a1 1 0 1 1 0 2v14a1 1 0 1 1 0 2H5a1 1 0 1 1 0-2V5a1 1 0 0 1-1-1Zm5 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-1Zm-5 4a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H9Zm5 0a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1h-1Zm-3 4a2 2 0 0 0-2 2v3h2v-3h2v3h2v-3a2 2 0 0 0-2-2h-2Z" clip-rule="evenodd"/>
                                        </svg>

                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1">
                                    Medical Certificate
                                </div>
                            </div>
                        </span>
                    </li>
                    @endif

                    @if ($empNBIClearance)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z" clip-rule="evenodd"/>
                                        </svg>


                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1">
                                    NBI Clearance
                                </div>
                            </div>
                        </span>
                    </li>
                    @endif

                    @if ($empPSABirthCertif)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M7 2a2 2 0 0 0-2 2v1a1 1 0 0 0 0 2v1a1 1 0 0 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a1 1 0 1 0 0 2v1a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H7Zm3 8a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm-1 7a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3 1 1 0 0 1-1 1h-6a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                        </svg>

                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncat text-customGray1">
                                    PSA Birth Certifcate
                                </div>
                            </div>
                        </span>
                    </li>
                    @endif

                    @if($empPSAMarriageCertif)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    {{ svg('bxs-church', ['class' => 'w-6 h-6 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white']) }}
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1">
                                    PSA Marriage Certificate
                                </div>
                            </div>
                        </span>
                    </li>
                    @endif

                    @if($empServiceRecordFromOtherGovtAgency)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    {{ svg('bxs-receipt', ['class' => 'w-6 h-6 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white']) }}
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1">
                                    Service Record from other Government Agency
                                </div>
                            </div>
                        </span>
                    </li>
                    @endif
                    @if($empApprovedClearancePrevEmployer)
                    <li class="py-1 sm:py-2">
                        <span class="text-sm font-medium truncate text-customGray1 dark:text-white">
                            <div class="flex items-center ml-4">
                                <div class="flex-shrink-0 mr-2"> <!-- This ensures the SVG icon won't shrink -->
                                    {{ svg('bxs-user-check', ['class' => 'w-6 h-6 text-gray-800 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white']) }}
                                </div>
                                <div class="flex-1 min-w-0 text-sm font-medium truncate text-customGray1">
                                    Approved Clearance from Previous Employer
                                </div>
                            </div>
                        </span>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
