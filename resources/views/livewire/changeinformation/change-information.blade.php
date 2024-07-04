<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed ">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('profile')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 ">Profile</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 hover:text-customRed ">Change Personal Information</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl ">Change Personal Information</h2>
    <section class="px-8 pb-24 bg-white rounded-lg ">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 bg-white rounded-lg">
                    <div class="grid w-full grid-cols-1 col-span-1 gap-4 p-4 bg-white border border-gray-200 rounded-lg shadow ">
                        <h2 class="text-customRed"><b>Information</b></h2>
                        <div class="col-span-1 ">
                            <div class="grid grid-cols-1 col-span-3 gap-4 pb-4">
                                <div class="w-full ">
                                    <label for="firstname"
                                        class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">First name <span class="text-red-600">*</span></label>
                                    <input type="text" name="firstname" id="firstname"  wire:model="first_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                        placeholder="First name" required="" >
                                </div>
                                <div class="w-full ">
                                    <label for="middlename"
                                        class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">Middle name <span class="text-red-600">*</span></label>
                                    <input type="text" name="middlename" id="middlename" wire:model="middle_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                        placeholder="Middle name" required="" >
                                </div>
                                <div class="w-full">
                                    <label for="lastname"
                                        class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">Last name <span class="text-red-600">*</span></label>
                                    <input type="text" name="lastname" id="lastname"  wire:model="last_name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                        placeholder="Last name" required="" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                        <h2 class="text-customRed"><b>Change Photo</b></h2>
                        <div class="grid grid-cols-1 gap-4">
                            {{-- 1st Row --}}
                            <div class="grid grid-cols-1 items-start gap-4">
                                {{-- 1 --}}
                                <div class="grid grid-cols-1 items-center justify-center w-full " id="emp_image_container">
                                    <label for="emp_image"
                                        class="block text-sm font-medium text-gray-900 dark:text-white mb-4">Employee Photo<span class="text-red-600">*</span></label>
                                    <label for="emp_image" style="height: 128px;" class="relative p-1 flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    @if($emp_image)
                                            @if(is_string($emp_image) == True)
                                                @php
                                                    $emp_image = $this->getImage('emp_image');
                                                @endphp
                                                <img src="data:image/gif;base64,{{ base64_encode($emp_image) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                            @else
                                                <img src="{{ $emp_image->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                            @endif
                                            <input id="emp_image" type="file" class="hidden" wire:model.live="emp_image">
    
                                            <button type="button" wire:click="removeImage('emp_image')" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                    @else
                                            <div class="flex flex-col items-center justify-center h-full pt-5 pb-6">
                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                </svg>
                                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                            </div>
                                            <input id="emp_image" type="file" class="hidden" wire:model.blur="emp_image" />
                                    @endif
                                    </label>
                                    @error('emp_image')
                                        <div class="transition transform alert alert-danger text-sm mb-1"
                                                x-data x-init="document.getElementById('emp_image_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_image_container').focus();">
                                            <span class="text-red-500 text-xs "> {{$message}}</span>
                                        </div> 
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="grid grid-cols-1 mb-4 w-full col-span-3 gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow    ">
                   <div class="col-span-2 bg-white rounded-lg ">
                        <h2 class="mb-4 text-customRed"><b>Other Information</b></h2>
                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                            <div class="grid grid-cols-1 col-span-2 gap-4 ">
                                <div class="w-full" id="profile_summary_container">
                                    <label for="profile_summary"
                                        class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                        Profile Summary <span class="text-red-600">*</span></label>
                                    <textarea type="text" rows="3" name="profile_summary" id="profile_summary"  wire:model="profile_summary"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                            required="" >
                                    </textarea>
                                    @error('profile_summary')
                                            <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('profile_summary_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('profile_summaryc_container').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                </div>
                            </div>
                            <div class="grid grid-cols-1 min-[902px]:grid-cols-2 col-span-2 gap-4">
                                <div class="grid grid-cols-1 gap-4 ">
                                    <div class="w-full" id="phone_container">
                                        <label for="phonenumber"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Phone Number <span class="text-red-600">*</span></label>
                                        <input type="text" name="phonenumber" id="phonenumber" wire:model="phone"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                                required="" >
                                        @error('phone')
                                            <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('phone_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('phone_container').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="w-full" id="gender_container">
                                        <label for="sex"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Sex (Male/M and Female/F Only)
                                            <span class="text-red-600">*</span></label>
                                        <input type="text" name="sex" id="sex" wire:model="gender"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                            required="" >
                                        @error('gender')
                                            <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('gender_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('gender_container').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="w-full" id="nickname_container">
                                        <label for="nickname_status"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Nickname <span class="text-red-600">*</span></label>
                                        <input type="text" name="nickname" id="nickname"  wire:model="nickname"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                            required="" >
                                        @error('nickname')
                                            <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('nickname_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('nickname_container').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 gap-4 ">
                                    <div class="w-full" id="address_container">
                                        <label for="address"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Present Address <span class="text-red-600">*</span></label>
                                        <input type="text" name="address" id="address"  wire:model="address"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                                required="" >
                                        @error('address')
                                                <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('address_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('address_container').focus();">
                                                    <span class="text-xs text-red-500 "> {{$message}}</span>
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="w-full" id="religion_container">
                                        <label for="firstname"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Religion <span class="text-red-600">*</span></label>
                                        <input type="text" name="religion" id="religion"  wire:model="religion"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                                required="" >
                                        @error('personal_email')
                                                <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('religion_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('religion_container').focus();">
                                                    <span class="text-xs text-red-500 "> {{$message}}</span>
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="w-full" id="civil_status_container">
                                        <label for="civil_status"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Civil Status <span class="text-red-600">*</span></label>
                                        <input type="text" name="civil_status" id="civil_status"  wire:model="civil_status"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed  block w-full p-2.5"
                                                required="" >
                                        @error('civil_status')
                                            <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('civil_status_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('civil_status_container').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>

                </div>


                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow    ">
                    <h2 class="text-customRed"><b>Employee History</b></h2>
                    <div class="grid grid-cols-1 col-span-3 gap-4 pb-4" id="employeehistory_container">
                        @php
                            $ctr = 0
                        @endphp
                        @if ($employeeHistory)
                        @foreach ($employeeHistory as $index => $history)
                        <div class="bg-white rounded-lg ">
                            <div class="col-span-5">
                                <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 " id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                    <li class="float-left mt-4 ml-5 font-bold text-gray-900 float-bold">
                                        <span>No. {{$ctr + 1 }}</span>
                                    </li>
                                    <li class="">
                                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                        type="button" name="add" wire:click.prevent="removeHistory({{$index}})" wire:confirm="Are you sure you want to delete this?"
                                        class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="border border-gray=200 border-solid p-6 ">
                                    <div class="mt-5" id="employeeHistory_{{$index}}_name_of_company_container">
                                        <label for="employeeHistory_{{$index}}_name_of_company" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">Company Name
                                            <span class="text-red-600">*</span></label>
                                        <input type="text" rows="4" id="employeeHistory_{{$index}}_name_of_company" name="employeeHistory_{{$index}}_name_of_company" wire:model.blur="employeeHistory.{{$index}}.name_of_company" placeholder="Company Name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed"></input>
                                        @error('employeeHistory.' . $index . '.name_of_company')
                                            <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('employeeHistory_{{$index}}_name_of_company').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_name_of_company').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mt-5 ">
                                        <label for="employeeHistory_{{$index}}_position" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Position <span class="text-red-600">*</span></label>
                                        <input type="text" rows="4" id="employeeHistory_{{$index}}_prev_position" name="employeeHistory_{{$index}}_position" wire:model.blur="employeeHistory.{{$index}}.prev_position" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed"></input>
                                        @error('employeeHistory.' . $index . '.prev_position')
                                            <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('employeeHistory_{{$index}}_prev_position').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_prev_position').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div class="mt-5">
                                        <label for="employeeHistory_{{$index}}_start_date" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Start Date <span class="text-red-600">*</span></label>
                                        <input type="date" rows="4" id="employeeHistory_{{$index}}_start_date" name="employeeHistory_{{$index}}_start_date" wire:model.blur="employeeHistory.{{$index}}.start_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed"></input>
                                        @error('employeeHistory.' . $index . '.start_date')
                                            <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_start_date').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mt-5" id="employeeHistory_{{$index}}_end_date_container">
                                        <label for="employeeHistory_{{$index}}_end_date" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            End Date <span class="text-red-600">*</span></label>
                                        <input type="date" rows="4" id="employeeHistory_{{$index}}_end_date" name="employeeHistory_{{$index}}_end_date" wire:model.blur="employeeHistory.{{$index}}.end_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed"></input>
                                        @error('employeeHistory.' . $index . '.end_date')
                                            <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_end_date').focus();">
                                                <span class="text-xs text-red-500 "> {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    @php
                        $ctr += 1;
                    @endphp
                    @endforeach
                        @endif
                        <script>
                            document.addEventListener('livewire:init', () => {
                                Livewire.on('update-employee-history', (data) => {
                                    // alert(JSON.stringify(data)); // Ensure the data received here is correct
                                    // Parse the JSON data into a JavaScript array
                                    const dataArray = JSON.parse(data);

                                    // Iterate over the array elements
                                    dataArray.forEach((element, index) => {
                                        document.getElementById('employeeHistory_' + index + '_name_of_company').value = element.name_of_company;
                                        document.getElementById('employeeHistory_' + index + '_prev_position').value = element.prev_position;
                                        document.getElementById('employeeHistory_' + index + '_start_date').value = element.start_date;
                                        document.getElementById('employeeHistory_' + index + '_end_date').value = element.end_date;
                                    });
                                });
                            });
                        </script>
                        <div class="flex justify-center">
                            <button type="button" name="add" wire:click.prevent="addEmployeeHistory" class="text-customRed bg-navButton shadow  hover:bg-customRed hover:text-white font-medium rounded-8px text-sm px-5 py-2.5 me-2 mb-2 ">Add a History</button>
                        </div>
                        @php
                            if(isset($index) == False){
                                $index = 0;
                            }
                        @endphp
                        @error('employeeHistory')
                            <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('employeeHistory_{{$index}}_end_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employeeHistory_{{$index}}_end_date_container').focus();">
                                <span class="text-xs text-red-500 "> {{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </div>

            <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center rounded-8px text-customRed bg-navButton  hover:bg-customRed hover:text-white shadow">
                    Submit Change Information
            </button>
            </form>
            {{-- <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
            <script>
                new MultiSelectTag('subjectLoad.' . '0' . '.days')  // id
            </script> --}}

        </div>
    </section>

    </div>
</div>
