<div>
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
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('LeaveRequestTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Leave Request</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-600 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-semibold text-gray-900 md:ms-2 dark:text-gray-400">Form</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Leave Request Form</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 mt-10 rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST" x-data="{typeOfLeave: $wire.entangle('mode_of_application')}">
                @csrf
                {{-- Information field --}}
                <h2 class="font-bold text-customRed">Information</h2>
                <div class="mt-2 grid grid-cols-1 gap-4 min-[902px]:grid-cols-6">
                    <div class="col-span-1 min-[902px]:col-span-2">
                        <label for="firstname"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">First Name <span class="text-red-600">*</span></label>
                        <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-2">
                        <label for="middlename"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Middle Name <span class="text-red-600">*</span></label>
                        <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-2">
                        <label for="lastname"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Last Name <span class="text-red-600">*</span></label>
                        <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-3">
                        <label for="department_name"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Department Name <span class="text-red-600">*</span></label>
                        <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                            class="bg-gray-50 shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-3">
                        <label for="employee_id"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Employee ID <span class="text-red-600">*</span></label>
                        <input type="text" name="" id="employee_id"  value="{{$employee_id}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                </div>
                <hr class="my-4 border-gray-300">
                {{-- Leave Information --}}
                <h2 class="font-bold text-customRed">Leave Information</h2>
                <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <label for="application_date" class="block mb-2 text-sm font-medium text-customGray">Date of Filing
                            <span class="text-red-600">*</span>
                        </label>
                        <input type="date" wire:model="application_date"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-400 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                            placeholder="Date of Filling" disabled>
                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Leave Type
                            <span class="text-red-600">*</span>
                        </label>
                        <select id="mode_of_application" name="mode_of_application" wire:model.live="mode_of_application"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                            <option value="" selected>Select</option>
                            <option value="Vacation Leave">Vacation Leave</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                            <option value="Single Parent Leave">Single Parent Leave</option>
                            <option value="Credit Leave">Credit Leave</option>
                            <option value="Advise Slip">Advise Slip</option>
                            <option value="Overtime Form">Overtime Form</option>
                            <option value="Others">Others</option>
                        </select>
                        @error('mode_of_application')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('mode_of_application_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('mode_of_application_container').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="supervisor_email_container" class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Email of Supervisor
                            <span class="text-red-600">*</span>
                        </label>
                        <select id="supervisor_email" name="supervisor_email" wire:model.live="supervisor_email"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                            <option value="" selected>Select</option>
                            <option value="seal.projectengage@gmail.com">seal.projectengage@gmail.com</option>
                            <option value="jsodsod@projectengage.com.ph">jsodsod@projectengage.com.ph</option>
                            <option value="sherwinmalabanan@sltemps.com">sherwinmalabanan@sltemps.com</option>
                            <option value="esalvador@projectengage.com.ph">esalvador@projectengage.com.ph</option>
                            <option value="kcastro@projectengage.com.ph">kcastro@projectengage.com.ph</option>
                            <option value="jazz@wesearch.com.ph">jazz@wesearch.com.ph</option>
                            <option value="rmaubay@projectengage.com.ph">rmaubay@projectengage.com.ph</option>
                            <option value="jmb@sltemps.com">jmb@sltemps.com</option>
                            <option value="spm_2009@wesearch.com.ph">spm_2009@wesearch.com.ph</option>
                            <option value="rb@sltemps.com">rb@sltemps.com</option>
                            <option value="mbaniqued@projectengage.com.ph">mbaniqued@projectengage.com.ph</option>
                            <option value="rosanne.espedido@sltemps.com">rosanne.espedido@sltemps.com</option>
                            <option value="trishesporlas@wesearch.com.ph">trishesporlas@wesearch.com.ph</option>
                            <option value="ecapistrano@projectengage.com.ph">ecapistrano@projectengage.com.ph</option>
                            <option value="khriziemisenas@sltemps.com">khriziemisenas@sltemps.com</option>
                            <option value="chisilva@sltemps.com">chisilva@sltemps.com</option>
                        </select>
                        @error('supervisor_email')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- <template x-if="['Credit Leave', 'Advise Slip', 'Vacation Leave', 'Sick Leave', 'Paternity Leave', 'Magna Carta Leave', 'Others'].includes(typeOfLeave)">
                    <div>
                        <template x-if="typeOfLeave === 'Credit Leave'">
                            <span>Credit Leave Content</span>
                        </template>
                    
                        <template x-if="typeOfLeave === 'Advise Slip'">
                            <span>Advise Slip Content</span>
                        </template>
                    
                        <template x-if="['Vacation Leave', 'Sick Leave', 'Paternity Leave', 'Magna Carta Leave', 'Others'].includes(typeOfLeave)">
                            <span>Leave Content for Various Types</span>
                        </template>
                    </div>
                </template> --}}
                
                <template x-if="['Credit Leave', 'Advise Slip', 'Vacation Leave', 'Sick Leave', 'Paternity Leave', 'Maternity Leave', 'Single Parent Leave', 'Overtime Form', 'Others'].includes(typeOfLeave)">
                    <div>
                        <hr class="my-4 border-gray-300">
                        <template x-if="typeOfLeave === 'Credit Leave'">
                            {{-- @if ($mode_of_application == "Credit Leave") --}}
                            <div>
                                {{-- Time Frame --}}
                                <h2 class="font-bold text-customRed">Credit Leave Description</h2>
                                <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-5 gap-4">
                                    <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-2 ">
                                    {{-- Date Earned --}}
                                        <div id="date_earned_container" class="col-span-1">
                                            <label for="date_earned" class="block mb-2 text-sm font-medium text-gray-900 ">Date Earned
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <input type="date" name="date_earned" id="date_earned" wire:model.live="date_earned"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                                required="">
                                            @error('date_earned')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('date_earned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_earned_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    {{-- Application Date --}}
                                        <div id="credit_application_container" class="col-span-1">
                                            <label for="credit_application" class="block mb-2 text-sm font-medium text-gray-900 ">Application Date
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <input type="date" name="credit_application" id="credit_application" wire:model.live="credit_application"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                                required="">
                                            @error('credit_application')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('credit_application_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('credit_application_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- Available Credits --}}
                                    <div id="date_description_container" class="col-span-3">
                                        <label for="earned_description" class="block mb-2 text-sm font-medium text-gray-900 ">Date Earned Description <span class="text-red-600">*</span></label>
                                        <div id="earned_description" class="grid grid-cols-1">
                                            <textarea type="text" rows="2" id="earned_description" name="earned_description" wire:model="earned_description"
                                                placeholder="Write additional information here. Maximum of 500 Letters only"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required>
                                            </textarea>
                                            @error('earned_description')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('date_description_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_description_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                            </div>
                        </template>
                        <template x-if="typeOfLeave === 'Advise Slip'">
                            <div>
                            {{-- @if ($mode_of_application == "Advise Slip") --}}
                                <p class="mb-4 font-bold text-customRed">Advise Slip Information</p>
                                <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-4 gap-4">
                                    <div id="time_period_container" class="col-span-1">
                                        <label for="inclusive_start_date" class="block mb-2 text-sm font-medium text-gray-900">Date Requested
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input type="datetime-local" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date"
                                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                            required="">
                                        @error('inclusive_start_date')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-1">
                                        <label for="inclusive_end_date" class="block mb-2 text-sm font-medium text-gray-900 ">Actual Schedule
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input type="datetime-local" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
                                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                            required="">
                                        @error('inclusive_end_date')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div id="purpose_type_container" class="col-span-1">
                                        <label class="block mb-2 text-sm font-medium text-gray-900 ">Purpose
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <select id="purpose_type" name="purpose_type" wire:model="purpose_type"
                                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                            required>
                                            <option value="" selected>Select</option>
                                            <option value="Interview Candidate">Interview Candidate</option>
                                            <option value="Meeting with a Valued Client">Meeting with a Valued Client</option>
                                            <option value="Meeting with Prospect">Meeting with Prospect</option>
                                            <option value="Job/School/PESO Fair">Job/School/PESO Fair</option>
                                            <option value="Travel/Assignment/Airline">Travel/Assignment/Airline</option>
                                            <option value="Collection">Collection</option>
                                            <option value="Others">Others (Please specify the reason in the Reason of Filing) </option>
                                        </select>
                                        @error('purpose_type')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_type_container').focus();" >
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-1">
                                        <label for="logout_time" class="block mb-2 text-sm font-medium text-gray-900 ">Log Out Time
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input type="datetime-local" name="logout_time" id="logout_time" wire:model.live="logout_time"
                                            class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                            required="">
                                        @error('logout_time')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                            </div>
                        </template>
                        <template x-if="['Vacation Leave', 'Sick Leave', 'Paternity Leave', 'Maternity Leave', 'Single Parent Leave', 'Others'].includes(typeOfLeave)">
                            <div>
                                <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-7 gap-4">
                                    <div class="col-span-4 grid grid-cols-1  gap-4">
                                        <h2 class="col-span-1 whitespace-nowrap font-bold text-customRed">Leave Request Time Frame</h2>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 ">
                                            <div class="col-span-1">
                                                <label for="inclusive_start_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date
                                                    <span class="text-red-600">*</span>
                                                </label>
                                                <input type="date" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date"
                                                    class="bg-gray border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                                    required="">
                                                @error('inclusive_start_date')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-span-1">
                                                <label for="inclusive_end_date" class="block mb-2 text-sm font-medium text-gray-900 ">End Date <span class="text-red-600">*</span></label>
                                                <input type="date" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed 00 block w-full p-2.5 "
                                                    required="">
                                                @error('inclusive_end_date')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="col-span-1">
                                                <div id="full_half_container" class="col-span-1">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">End Day
                                                        <span class="text-red-600">*</span>
                                                    </label>
                                                    <select id="purpose_type" name="full_half" wire:model.live="full_half"
                                                        class="bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                        <option value="" selected>Select</option>
                                                        <option value="Full Day">Full Day</option>
                                                        <option value="Half Day">Half Day</option>
                                                        <option value="Undertime">Undertime</option>

                                                        {{-- <optgroup label="Full Day Options">
                                                            <option value="Start Full">Full Day Start | Half Day End</option>
                                                            <option value="End Full">Full Day End | Half Day Start</option>
                                                            <option value="Both Full">Full Day Both</option>
                                                        </optgroup>
                                                        <optgroup label="Half Day Options">
                                                            <option value="Start Half">Half Day Start | Full Day End</option>
                                                            <option value="End Half">Half Day End | Full Day Start</option>
                                                            <option value="Both Half">Half Day Both</option>
                                                        </optgroup> --}}
                                                    </select>
                                                    @error('full_half')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('full_half_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('full_half_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Available Credits --}}
                                    <div id="leavecredits_container" class="col-span-3 grid grid-cols-1 min-[902px]:grid-cols-2 gap-4">
                                        <h2 class="col-span-1 min-[902px]:col-span-3 font-bold text-customRed">Leave Credits</h2>
                                        <div class="col-span-1">
                                            <label for="numOfWorkDays" class="block mb-2 text-sm font-medium text-customGray ">Number of Days <span class="text-red-600">*</span></label>
                                            <input type="number" name="numOfWorkDay" id="numOfWorkDay" value="{{$num_of_days_work_days_applied}}"
                                                class="bg-gray-50 border font-bold border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                                disabled>
                                            @error('num_of_days_work_days_applied')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('leavecredits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('leavecredits_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        {{-- <div class="col-span-1" >
                                            <label for="available_credits" class="block mb-2 text-sm font-medium text-customGray ">Available Credits <span class="text-red-600">*</span></label>
                                            <input type="number" name="available_credits" id="available_credits" wire:model="available_credits"
                                                class="bg-gray-50 border font-bold border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                                disabled>
                                            @error('available_credits')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('leavecredits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('leavecredits_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div> --}}
                                        <div id="deduct_to_container" class="col-span-1" x-data="{availableCredits: $wire.entangle('available_credits'), creditsDeducted: $wire.entangle('num_of_days_work_days_applied')}">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Deduct to?
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <select id="purpose_type" name="deduct_to" wire:model="deduct_to"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="">Select </option>
                                                <option value="Salary">Salary</option>
                                                {{-- <template x-if="availableCredits >= creditsDeducted"> --}}
                                                    <option value="Credits">Credits</option>
                                                {{-- </template> --}}
                                                <option value="Bearevement Leave">Bearevement Leave</option>
                                                <option value="Others">Others</option>


                                            </select>
                                            @error('deduct_to')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('deduct_to_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('deduct_to_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                            </div>
                        </template>
                        <template x-if="typeOfLeave === 'Overtime Form'">
                            <div>
                                {{-- Time Frame --}}
                                <h2 class="font-bold text-customRed">Overtime Information</h2>
                                <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-5 gap-4">
                                    <div class="grid grid-cols-1 col-span-2 ">
                                    {{-- Date Earned --}}
                                        <div id="date_earned_container" class="col-span-1">
                                            <label for="date_earned" class="block mb-2 text-sm font-medium text-gray-900 ">Period
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <input type="date" name="date_earned" id="date_earned" wire:model.live="date_earned"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                                required="">
                                            @error('date_earned')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('date_earned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_earned_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="date_description_container" class="col-span-3">
                                        <label for="earned_description" class="block mb-2 text-sm font-medium text-gray-900">
                                            Overtime Form <span class="text-red-600">*</span>
                                            <span class="block mt-2">
                                                Click the link to download the OT template:
                                                <a href="https://docs.google.com/spreadsheets/d/1fzR_r9ENBKWZFHP3alkCXK-gzbvipSJg/edit?gid=987895688#gid=987895688" 
                                                   target="_blank" 
                                                   class="text-customRed hover:text-red-900 underline">
                                                    Download OT Template
                                                </a>
                                            </span>
                                        </label>
                                        <div id="earned_description" class="grid grid-cols-1">
                                            <textarea type="text" rows="2" id="earned_description" name="earned_description" wire:model="earned_description"
                                                      placeholder="Kindly input the link of the filled downloaded OT Form here"
                                                      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required>
                                            </textarea>
                                            @error('earned_description')
                                                <div class="text-sm transition transform alert alert-danger" x-data 
                                                     x-init="document.getElementById('date_description_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_description_container').focus();">
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                            </div>
                        </template>
                        <template x-if="['Single Parent Leave', 'Sick Leave', 'Paternity Leave', 'Maternity Leave', 'Others'].includes(typeOfLeave)">
                            <div id="sick_leave_link_container">
                                <label for="reason" class="block font-bold whitespace-nowrap text-customRed">Leave Attachments
                                    <span class="text-gray-900"><span class="text-red-600">*</span>
                                </label>
                                <textarea type="text" rows="2" id="sick_leave_link_container" name="sick_leave_link_container" wire:model="purpose_type"
                                    placeholder="Kindly input the Link for Leave Attachments (Ex: Medical Certificate)"
                                    class="mt-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required>
                                </textarea>
                                @error('purpose_type')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('sick_leave_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sick_leave_link_container').focus();" >
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            <hr class="my-4 border-gray-300">
                            </div>

                        </template>
                        
                        <div id="reason_container">
                            <label for="reason" class="block font-bold whitespace-nowrap text-customRed">Reason of Filing
                            </label>
                            <textarea type="text" rows="10" id="reason" name="reason" wire:model="reason"
                                placeholder="Kindly state the reason for filing and other details (If Chosen Others at the Deduct to Fiel) this leave request within 500 characters."
                                class="mt-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                            </textarea>
                            @error('reason')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('reason_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('reason_container').focus();" >
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        
                    </div>
                </template>
                
                {{-- @endif --}}
                <button type="submit" class="inline-flex items-center shadow float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                        <path d="M2.87 2.298a.75.75 0 0 0-.812 1.021L3.39 6.624a1 1 0 0 0 .928.626H8.25a.75.75 0 0 1 0 1.5H4.318a1 1 0 0 0-.927.626l-1.333 3.305a.75.75 0 0 0 .811 1.022 24.89 24.89 0 0 0 11.668-5.115.75.75 0 0 0 0-1.175A24.89 24.89 0 0 0 2.869 2.298Z" />
                    </svg>
                    Submit Form
                </button>

            </form>

            <!-- Loading screen -->
            <div wire:loading wire:target="submit" class="load-over">
                <div wire:loading wire:target="submit" class="loading-overlay">
                    <div class="flex flex-col justify-center items-center">
                        <div class="spinner"></div>
                        <p>Submitting your Form...</p>
                    </div>
                </div>
            </div>

            <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Leave Request Submitted'; setTimeout(() => showToast = false, 3000)"
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
        </div>
    </section>
    <style>
        .load-over {
            position: fixed;
            background: rgba(255, 255, 255, 0.8);
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .loading-overlay {
            position: fixed;
            top: 40%;
            left: 0;
            width: 100%;
            height: 100%;
            
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            font-family: Arial, sans-serif;
            color: #AC0C2E;
            pointer-events: none; /* Makes sure the overlay is not interactable */
        }

        .spinner {
            border: 8px solid rgba(172, 12, 46, 0.3);
            border-top: 8px solid #AC0C2E;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
            margin-bottom: 20px; /* Adjust margin to add space between spinner and text */
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .loading-overlay p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
    <script>
    // // Add this script to hide the success alert after a delay
    // document.addEventListener('livewire:load', function () {
    //     Livewire.hook('message.processed', (message, component) => {
    //         if (message.updateQueue && message.updateQueue.includes('showSuccess')) {
    //             setTimeout(() => {
    //                 component.set('showSuccess', false);
    //             }, 5000); // Adjust the delay (in milliseconds) as needed
    //         }
    //     });
    // });

    // document.addEventListener('livewire:init', function () {
    //     Livewire.on('triggerNotification', () => {
    //         // Show the modal
    //         const modal = document.getElementById('toast-success');
    //         if (modal) {
    //             modal.classList.remove('hidden');
    //         }
    //     });
    // });


    </script>
</div>