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
            <a href="{{route('ApproveLeaveRequestTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Leave Request</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 dark:text-gray-400">Approve</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Approve Leave Request</h2>
    <p class="my-4 text-customRed  text-lg">Form Reference Number: <span class="text-gray-900 font-medium">{{$form_id}}</span>  </p>


    <section class="px-8 pb-8 mt-10 bg-white rounded-lg dark:bg-gray-900">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
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
                        <select disabled id="supervisor_email" name="supervisor_email" 
                            class="disabled-select bg-gray-50 shadow-inner border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                            <option selected value="{{$supervisor_email}}" selected>{{$supervisor_email}}</option>
                            {{-- <option value="seal.projectengage@gmail.com">seal.projectengage@gmail.com</option> --}}
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
                                <input disabled type="date" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date"
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
                                <input disabled type="date" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
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
                                    <option value="Others">Others</option>
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
                                <input type="datetime-local" name="logout_time" id="logout_time" wire:model.live="logout_time" disabled
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
                    @elseif ($mode_of_application == "Vacation Leave" || $mode_of_application == "Sick Leave" || $mode_of_application == "Maternity Leave"
                        || $mode_of_application == "Paternity Leave" || $mode_of_application == "Magna Carta Leave" || $mode_of_application == "Others")
                        <div class="mt-2 grid grid-cols-1 min-[902px]:grid-cols-7 gap-4">
                            <div class="col-span-4 grid grid-cols-1  gap-4">
                                <h2 class="col-span-1 whitespace-nowrap font-bold text-customRed">Leave Request Time Frame</h2>
                                <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 ">
                                    <div class="col-span-1">
                                        <label for="inclusive_start_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date/Time
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <input  type="date" name="inclusive_start_date" id="inclusive_start_date" wire:model="inclusive_start_date"
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
                                        <input disabled type="date" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
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
                            <div id="leavecredits_container" class="col-span-3 grid grid-cols-1 min-[902px]:grid-cols-3 gap-4">
                                <h2 class="col-span-3 min-[902px]:col-span-3 font-bold text-customRed">Leave Credits</h2>
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
                <br>

                <!-- Change Status Button -->
                <div x-cloak x-data="{ openCrudModal: false, openConfirmation: false }" class="flex flex-row-reverse">
                    <button @click="openCrudModal = true" type="button" class="inline-flex items-center shadow float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  stroke="currentColor" class="mr-2 size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                        Change Status
                    </button>
                    <div  x-ref="crudModal"
                    x-show="openCrudModal" id="crud_modal" @keydown.escape.window="openCrudModal = false" tabindex="-1"
                    class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
                    x-transition:enter="transition ease-out duration-200"
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
                                <div class="grid grid-cols-1 gap-4 mb-4 " x-data="{typeOfKey: @entangle('key'), typeOfStatus: @entangle('status')}">
                                    <div>
                                        <label for="category" class="block mb-2 text-sm font-semibold text-gray-900">Status</label>
                                        <select id="category" wire:model.live="status" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                            <option class="hover:bg-customRed hover:text-white" value="Approved">Approved</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Pending">Pending</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Declined">Declined</option>
                                        </select>
                                    </div>
                                    <template x-if="typeOfKey  === 'list' && (typeOfStatus === 'Approved' || typeOfStatus === 'Declined') ">
                                        <div id="person_container">
                                            <label for="person" class="block mb-2 text-sm font-semibold text-gray-900">As</label>
                                            <select id="person" wire:model.live="person" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                                <option class="hover:bg-customRed hover:text-white" value="Null">Select</option>
                                                <option class="hover:bg-customRed hover:text-white" value="President">President</option>
                                                <option class="hover:bg-customRed hover:text-white" value="Supervisor">Supervisor</option>
                                            </select>
                                            @error('person')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('person_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('person_container').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </template>
                                    <button @click="openConfirmation = true" id="updateButton" type="button" class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white ring-1 ring-customRed shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center justify-self-end">
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
                        <div class="relative p-4 w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button @click="openConfirmation = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                {{-- <form wire:submit.prevent="changeStatus" method="POST" class="p-4 md:p-5"> --}}
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-amber-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-400">Are you sure you want to proceed</h3>
                                        <button type="button" @click="openConfirmation = false" wire:click="changeStatus" class="text-white bg-amber-600 hover:bg-amber-800 dark:focus:ring-amber-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                            Yes
                                        </button>
                                        <button @click="openConfirmation = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" >
                                            No
                                        </button>
                                    </div>
                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                    </div>

                    <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                            @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Leave Request Updated'; openConfirmation = false; openCrudModal = false; setTimeout(() => showToast = false, 3000)"
                            @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; openConfirmation = false; openCrudModal = false; setTimeout(() => showToast = false, 3000)">
                            <div id="toast-container" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-50" x-show="showToast">
                        <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-900 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60" role="alert"
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
            </form>
        </div>
        <div wire:loading wire:target="changeStatus" class="load-over z-50">
            <div wire:loading wire:target="changeStatus" class="loading-overlay z-50">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Updating...</p>
                </div>
            </div>
        </div>
    </section>
    
    </div>
</div>

<script>
    // document.addEventListener('DOMContentLoaded', (event) => {
    //     const updateButton = document.getElementById('updateButton');
    //     const modal = document.getElementById('popup-modal');
    //     const crud_modal = document.getElementById('crud-modal');

    //     const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');
    
    //     updateButton.addEventListener('click', (e) => {
    //         e.preventDefault();
    //         modal.classList.remove('hidden');
    //         // crud_modal.classList.add('hidden');
    //     });
    
    //     closeModalButtons.forEach((button) => {
    //         button.addEventListener('click', () => {
    //             modal.classList.add('hidden');
    //         });
    //     });
    // });


    // document.addEventListener('livewire:init', function () {
    //     Livewire.on('triggerNotification', () => {
    //             const modal = document.getElementById('toast-container-success');
    //             if (modal) {
    //                 setTimeout(() => {
    //                 modal.classList.remove('hidden');
    //                 }, 1); // Hide after 3 seconds
    //                 setTimeout(() => {
    //                     modal.classList.add('hidden');
    //                     window.location.href = '/leaverequest/approverequests/';
    //                 }, 1000);
    //             }
    //     });

    //     Livewire.on('triggerErrorNotification', () => {
    //         // Show the error toast
    //         const warningmodal = document.getElementById('toast-container');
    //         if (warningmodal) {

    //             setTimeout(() => {
    //                 warningmodal.classList.remove('hidden');
    //             }, 1); // Hide after 3 seconds
                
    //             setTimeout(() => {
    //                 warningmodal.classList.add('hidden');
    //             }, 3000); // Hide after 3 seconds
    //         }
    //     });
    // });

    // document.addEventListener('livewire:init', function () {
    //     Livewire.on('triggerErrorNotification', () => {
    //         // Show the modal
    //         const warningmodal = document.getElementById('toast-danger');
    //         if (warningmodal) {
    //             // setTimeout(() => {
    //                 warningmodal.classList.remove('hidden');
    //             // }, 1);
    //             // setTimeout(() => {
    //             //     modal.classList.add('hidden');
    //             // }, 3000); // Hide after 5 seconds
    //         }
    //     });
    // });
</script>