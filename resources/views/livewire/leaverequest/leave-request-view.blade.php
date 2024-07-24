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
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('LeaveRequestTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Leave Request</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 dark:text-gray-400">View Leave Request</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-2 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">View Leave Request  </h2>
    <p class="mb-4 text-customRed font-semibold text-lg"> Ticket  <span class="text-customRed"># {{$form_id}}</span>  </p>
    
    <section class="px-8 pb-8 mt-10 bg-white rounded-lg dark:bg-gray-900">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                {{-- Information field --}}
                <h2 class="font-bold text-customRed">Information</h2>
                <div class="mt-2 grid grid-cols-1 gap-4 min-[902px]:grid-cols-6">
                    <div class="col-span-1 min-[902px]:col-span-2">
                        <label for="firstname"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">First name <span class="text-red-600">*</span></label>
                        <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-2">
                        <label for="middlename"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Middle name <span class="text-red-600">*</span></label>
                        <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-2">
                        <label for="lastname"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Last name <span class="text-red-600">*</span></label>
                        <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-3">
                        <label for="department_name"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Department Name <span class="text-red-600">*</span></label>
                        <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                            class="bg-gray-50 shadow-inner border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                    <div class="col-span-1 min-[902px]:col-span-3">
                        <label for="employee_id"
                            class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Employee ID <span class="text-red-600">*</span></label>
                        <input type="text" name="" id="employee_id"  value="{{$employee_id}}"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                            required="" disabled>
                    </div>
                </div>
                <hr class="my-4 border-gray-300">
                {{-- Leave Information --}}
                <h2 class="font-bold text-customRed">Leave Information</h2>
                <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-3 gap-4">
                    <div class="col-span-1">
                        <label for="application_date" class="block mb-2 text-sm font-medium text-customGray ">Date of Filing
                            <span class="text-red-600">*</span>
                        </label>
                        <input disabled type="date" wire:model="application_date"
                            class="bg-gray-50 shadow-inner border border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                            placeholder="Date of Filling" disabled>
                    </div>
                    <div class="col-span-1">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Leave Type
                            <span class="text-red-600">*</span>
                        </label>
                        <select disabled id="mode_of_application" name="mode_of_application" wire:model.live="mode_of_application"
                            class=" disabled-select bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                            <option value="" selected>Select</option>
                            <option value="Vacation Leave">Vacation Leave</option>
                            <option value="Sick Leave">Sick Leave</option>
                            <option value="Maternity Leave">Maternity Leave</option>
                            <option value="Paternity Leave">Paternity Leave</option>
                            <option value="Magna Carta Leave">Magna Carta Leave</option>
                            <option value="Credit Leave">Credit Leave</option>
                            <option value="Advise Slip">Advise Slip</option>
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
                        <select disabled id="supervisor_email" name="supervisor_email" wire:model.live="supervisor_email"
                            class="disabled-select bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                            <option value="" selected>Select</option>
                            <option value="seal.projectengage@gmail.com">seal.projectengage@gmail.com</option>
                        {{-- 
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
                            <option value="chisilva@sltemps.com">chisilva@sltemps.com</option> --}}
                        </select>
                        @error('supervisor_email')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </div>
                @if ($mode_of_application == "Credit Leave" || $mode_of_application == "Advise Slip" || $mode_of_application == "Vacation Leave" || $mode_of_application == "Sick Leave" || $mode_of_application == "Maternity Leave"
                    || $mode_of_application == "Paternity Leave" || $mode_of_application == "Magna Carta Leave" || $mode_of_application == "Others")
                    <hr class="my-4 border-gray-300">
                    @if ($mode_of_application == "Credit Leave")
                        {{-- Time Frame --}}
                        <h2 class="font-bold text-customRed">Credit Leave Description</h2>
                        <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-2 gap-4">
                            <div id="date_earned_container" class="col-span-1">
                                <label for="inclusive_start_date" class="block mb-2 text-sm font-medium text-gray-900 ">Date
                                    <span class="text-red-600">*</span>
                                </label>
                                <input disabled type="date" name="date_earned" id="date_earned" wire:model.live="date_earned"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                    required="">
                                @error('date_earned')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('date_earned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_earned_container').focus();" >
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- Available Credits --}}
                            <div id="date_description_container" class="col-span-1">
                                <label for="earned_description" class="block mb-2 text-sm font-medium text-gray-900 ">Date Earned Description <span class="text-red-600">*</span></label>
                                <div id="earned_description" class="grid grid-cols-1">
                                    <textarea type="text" rows="2" id="earned_description" name="earned_description" wire:model="earned_description"
                                        placeholder="Write additional information here. Maximum of 200 only"
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
                    @elseif ($mode_of_application == "Advise Slip")
                        <p class="mb-4 font-bold text-customRed">Advise Slip Information</p>
                        <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-4 gap-4">
                            <div id="time_period_container" class="col-span-1">
                                <label for="inclusive_start_date" class="block mb-2 text-sm font-medium text-gray-900">Date Requested
                                    <span class="text-red-600">*</span>
                                </label>
                                <input disabled type="datetime-local" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date"
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
                                <input disabled type="datetime-local" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
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
                                <select disabled id="purpose_type" name="purpose_type" wire:model="purpose_type"
                                    class="disabled-select bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                    required>
                                    <option value="" selected>Select</option>
                                    <option value="Interview Candidate">Interview Candidate</option>
                                    <option value="Meeting with a Valued Client">Meeting with a Valued Client</option>
                                    <option value="Meeting with Prospect">Meeting with Prospect</option>
                                    <option value="Job/School/PESO Fair">Job/School/PESO Fair</option>
                                    <option value="Travel/Assignment/Airline">Travel/Assignment/Airline</option>
                                    <option value="Collection">Collection</option>
                                </select>
                                @error('purpose_type')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_type_container').focus();" >
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            <div id="deduct_to_container" class="col-span-1">
                                <label class="block mb-2 text-sm font-medium text-gray-900 ">Deduct to?
                                    <span class="text-red-600">*</span>
                                </label>
                                <select disabled id="purpose_type" name="deduct_to" wire:model="deduct_to"
                                    class="disabled-select bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                    <option value="" selected>Select</option>
                                    <option value="Salary">Salary</option>
                                    <option value="Credits">Credits</option>
                                </select>
                                @error('deduct_to')
                                    <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('deduct_to_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('deduct_to_container').focus();" >
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <hr class="my-4 border-gray-300">
                    @elseif ($mode_of_application == "Vacation Leave" || $mode_of_application == "Sick Leave" || $mode_of_application == "Maternity Leave"
                        || $mode_of_application == "Paternity Leave" || $mode_of_application == "Magna Carta Leave" || $mode_of_application == "Others")
                        <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-2 gap-4">
                            <div class="col-span-1 grid grid-cols-1  gap-4">
                                <h2 class="col-span-1 whitespace-nowrap font-bold text-customRed">Leave Request Time Frame</h2>
                                <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 ">
                                    <div class="col-span-1">
                                        <label for="inclusive_start_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date/Time
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input  type="datetime-local" name="inclusive_start_date" id="inclusive_start_date" wire:model="inclusive_start_date"
                                            class="bg-gray border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                            required="">
                                        @error('inclusive_start_date')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-span-1">
                                        <label for="inclusive_end_date" class="block mb-2 text-sm font-medium text-gray-900 ">End Date/Time <span class="text-red-600">*</span></label>
                                        <input disabled type="datetime-local" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
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
                                            <label class="block mb-2 text-sm font-medium text-gray-900 ">Half/Full on Start or End Day
                                                <span class="text-red-600">*</span>
                                            </label>
                                            <select disabled id="purpose_type" name="full_half" wire:model.live="full_half"
                                                class="disabled-select bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="" selected>Select</option>
                                                <option value="Start Full">Full Day on Start Day || Half Day on End Day</option>
                                                <option value="End Full">Full Day on End Day || Half Day on Start Day</option>
                                                <option value="Both Full">Full Day on Both Day</option>
                                                <option value="Start Half">Half Day on Start Day || Full Day on End Day </option>
                                                <option value="End Half">Half Day on End Day || Full Day on Start Day </option>
                                                <option value="Both Half">Half Day on Both Day</option>
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
                            <div id="leavecredits_container" class="col-span-1 grid grid-cols-1 min-[902px]:grid-cols-3 gap-4">
                                <h2 class="col-span-1 min-[902px]:col-span-3 font-bold text-customRed">Leave Credits</h2>
                                <div class="col-span-1">
                                    <label for="numOfWorkDays" class="block mb-2 text-sm font-medium text-customGray ">Number of Days <span class="text-red-600">*</span></label>
                                    <input disabled type="text" name="numOfWorkDay" id="numOfWorkDay" value="{{$num_of_days_work_days_applied}}"
                                        class="bg-gray-50 border font-bold border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                        disabled>
                                    @error('num_of_days_work_days_applied')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('leavecredits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('leavecredits_container').focus();" >
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-span-1">
                                    <label for="available_credits" class="block mb-2 text-sm font-medium text-customGray ">Available Credits <span class="text-red-600">*</span></label>
                                    <input disabled type="number" name="available_credits" id="available_credits" wire:model="available_credits"
                                        class="bg-gray-50 border font-bold border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                        disabled>
                                    @error('available_credits')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('leavecredits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('leavecredits_container').focus();" >
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div id="deduct_to_container" class="col-span-1">
                                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Deduct to?
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <select disabled id="purpose_type" name="deduct_to" wire:model="deduct_to"
                                        class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        <option value="">Select </option>
                                        <option value="Salary">Salary</option>
                                        <option value="Credits">Credits</option>
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
                    @endif
                    <div id="reason_container">
                        <label for="reason" class="block font-bold whitespace-nowrap text-customRed">Reason of Filing
                            <span class="text-gray-900"><span class="text-red-600">*</span>
                        </label>
                        <textarea disabled type="text" rows="10" id="reason" name="reason" wire:model="reason"
                            placeholder="Write your reason of filing here. Maximum of 500 only."
                            class="mt-2 block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required>
                        </textarea>
                        @error('reason')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('reason_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('reason_container').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                   
                @endif


            </form>
        </div>
    </section>
    
    </div>
</div>
