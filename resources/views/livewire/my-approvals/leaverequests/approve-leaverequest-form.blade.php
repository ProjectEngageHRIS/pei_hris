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
            <a href="{{route('ApproveLeaveRequestTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 ">Approve Leave Request</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 ">Approve Leave Request Form</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl ">Approve Leave Request Form</h2>
    <p class="mb-4 text-lg font-semibold text-customRed"> Ticket  <span class="text-customRed"># {{$form_id}}</span>  </p>

    <section class="px-8 pb-24 mt-10 bg-white rounded-lg">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 ">
                               <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2  class="font-bold text-customRed">Employee Information</h2>

                                    <div  class="">
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">First name</label>
                                                <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                    class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Middle name </label>
                                                <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                    class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Last name </label>
                                                <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                    class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    required="" disabled>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                            <div class="w-full">
                                                <label for="department_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Department Name </label>
                                                <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                    class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="employee_id"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap ">Employee ID </label>
                                                <input type="text" name="" id="employee_id"  value="{{$employee_id}}"
                                                    class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                                    required="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4 border-gray-300">
                               </div>


                            </div>

                            {{-- Leave Information --}}
                            <div class="grid w-full grid-cols-1 col-span-3 gap-4 ">
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2 class="font-bold text-customRed">Leave Information</h2>
                                    <div class="grid w-full grid-cols-1 col-span-3 gap-4 ">

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 w-full gap-4 ">
                                            <div class="w-full ">
                                                <label for="application_date"
                                                    class="block mb-2 text-sm font-medium text-customGray ">Date of Filing</label>
                                                <input type="date" wire:model="application_date"
                                                    class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                    placeholder="Date of Filling" required disabled>
                                            </div>
                                            <div>
                                                <label
                                                        class="block mb-2 text-sm font-medium text-customGray ">Leave Type </label>
                                                    <select id="mode_of_application" name="mode_of_application" wire:model.live="mode_of_application"
                                                        class="disabled-select bg-gray-50 border shadow-inner border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " disabled>
                                                        <option selected>Select</option>
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
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('mode_of_application_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('mode_of_application_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div class="supervisor_email_container">
                                                <label
                                                        class="block mb-2 text-sm font-medium text-customGray ">Email of Supervisor </label>
                                                    <select id="supervisor_email" name="supervisor_email" wire:model.live="supervisor_email"
                                                        class="disabled-select bg-gray-50 border shadow-inner border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " disabled>
                                                        <option selected>Select </option>
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
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4 border-gray-300">
                                </div>


                                @if ($mode_of_application == "Credit Leave")
                                {{-- Time Frame --}}
                                    <div class="col-span-3">
                                        <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                                            <p class="font-bold text-customRed">Credit Leave Description </p>
                                            <div id="date_earned_container" class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 ">
                                                <div class="justify-center w-full">
                                                    <label for="inclusive_start_date"
                                                        class="block mb-2 text-sm font-medium text-customGray ">Date</label>
                                                    <input type="date" name="date_earned" id="date_earned" wire:model.live="date_earned"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                        disabled>
                                                    @error('date_earned')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('date_earned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_earned_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                {{-- Available Credits --}}
                                                <div id="date_description_container" class="grid grid-cols-1 ">
                                                    <label for="earned_description"
                                                        class="block mb-2 text-sm font-medium text-customGray " >Date Earned Description</label>
                                                    <div id="earned_description" class="grid grid-cols-1" >
                                                        <textarea type="text" rows="2" id="earned_description" name="earned_description" wire:model="earned_description"
                                                            placeholder="Write additional information here. Maximum of 200 characters only"
                                                            class=" block p-2.5 w-full text-sm text-customGray bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed " disabled>
                                                        </textarea>
                                                        @error('earned_description')
                                                            <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('date_description_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('date_description_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4 border-gray-300">
                                    </div>
                                @elseif ($mode_of_application == "Advise Slip")
                                    <div class="grid grid-cols-1 col-span-3 gap-4">
                                        <div>
                                            <p class="mb-4 font-bold text-customRed">Advise Slip Information</p>
                                            <div id="time_period_container" class="grid grid-cols-1 gap-4 ">
                                                <div class="grid grid-cols-1 min-[1052px]:grid-cols-4 gap-4 ">
                                                    <div class="w-full ">
                                                        <label for="inclusive_start_date"
                                                            class="block mb-2 text-sm font-medium text-customGray ">Date Requested </label>
                                                        <input type="datetime-local" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date"
                                                            class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                            disabled>
                                                        @error('inclusive_start_date')
                                                            <div class="text-sm transition transform alert alert-danger"
                                                            x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full ">
                                                        <label for="inclusive_end_date"
                                                            class="block mb-2 text-sm font-medium text-customGray ">Actual Schedule </label>
                                                        <input type="datetime-local" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
                                                            class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                            disabled>
                                                        @error('inclusive_end_date')
                                                            <div class="text-sm transition transform alert alert-danger"
                                                            x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div id="purpose_type_container">
                                                        <label
                                                                class="block mb-2 text-sm font-medium text-customGray ">Purpose </label>
                                                            <select id="purpose_type" name="purpose_type" wire:model="purpose_type"
                                                                class="disabled-select bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " disabled>
                                                                <option selected>Select </option>
                                                                <option value="Interview Candidate">Interview Candidate</option>
                                                                <option value="Meeting with a Valued Client">Meeting with a Valued Client</option>
                                                                <option value="Meeting with Prospect">Meeting with Prospect</option>
                                                                <option value="Job/School/PESO Fair">Job/School/PESO Fair</option>
                                                                <option value="Travel/Assignment/Airline">Travel/Assignment/Airline</option>
                                                                <option value="Collection">Collection</option>
                                                            </select>
                                                            @error('purpose_type')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('purpose_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_type_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                    </div>
                                                    <div id="deduct_to_container" >
                                                        <label
                                                                class="block mb-2 text-sm font-medium text-customGray ">Deduct to?

                                                            <select id="purpose_type" name="deduct_to" wire:model="deduct_to"
                                                                class="disabled-select bg-gray-50 border border-gray-300 mt-2 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " disabled>
                                                                <option selected>Select </option>
                                                                <option value="Salary">Salary</option>
                                                                <option value="Credits">Credits</option>
                                                            </select>
                                                            @error('deduct_to')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('deduct_to_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('deduct_to_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4 border-gray-300">
                                    </div>
                                @else
                                    <div class="grid grid-cols-1 gap-4 min-[902px]:grid-cols-2 col-span-3">
                                        <div id="time_period_container" class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                                            <h2 class="font-bold text-customRed">Leave Request Time Frame</h2>
                                            <div class="grid grid-cols-1 min-[1052px]:grid-cols-2 gap-4 ">
                                                <div class="w-full">
                                                    <label for="inclusive_start_date"
                                                        class="block mb-2 text-sm font-medium text-customGray ">Start Date/Time </label>
                                                    <input type="datetime-local" name="inclusive_start_date" id="inclusive_start_date" wire:model.live="inclusive_start_date"
                                                        class="bg-gray border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                        disabled>
                                                    @error('inclusive_start_date')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="w-full">
                                                    <label for="inclusive_end_date"
                                                        class="block mb-2 text-sm font-medium text-customGray ">End Date/Time </label>
                                                    <input type="datetime-local" name="inclusive_end_date" id="inclusive_end_date" wire:model.live="inclusive_end_date"
                                                        class="bg-gray-50 border border-gray-300 shadow-inner text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                        disabled>
                                                    @error('inclusive_end_date')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Available Credits --}}
                                        <div id="leavecredits_container" class="grid grid-cols-1 gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                                            <h2 class="font-bold text-red-700">Leave Credits</h2>
                                            <div class="grid grid-cols-1 gap-4 min-[1052px]:grid-cols-3">
                                                <div class="w-full">
                                                    <label for="numOfWorkDays"
                                                        class="block mb-2 text-sm font-medium text-customGray ">Number of Days </label>
                                                    <input type="text" name="numOfWorkDay" id="numOfWorkDay" value="{{$num_of_days_work_days_applied}}"
                                                        class="bg-gray-50 border font-bold shadow-inner border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                            disabled>
                                                    @error('num_of_days_work_days_applied')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('leavecredits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('leavecredits_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>

                                                <div class="w-full">
                                                    <label for="available_credits"
                                                        class="block mb-2 text-sm font-medium text-customGray ">Available Credits </label>
                                                    <input type="number" name="available_credits" id="available_credits" wire:model="available_credits"
                                                        class="bg-gray-50 border font-bold border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                        disabled>
                                                    @error('available_credits')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('leavecredits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('leavecredits_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                        @enderror
                                                </div>
                                                <div id="deduct_to_container" class="">
                                                    <label
                                                            class="block mb-2 text-sm font-medium text-customGray ">Deduct to?
                                                            </label>
                                                        <select id="purpose_type" name="deduct_to" wire:model="deduct_to"
                                                            class="disabled-select bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 " disabled>
                                                            <option selected>Select </option>
                                                            <option value="Salary">Salary</option>
                                                            <option value="Credits">Credits</option>
                                                        </select>
                                                        @error('deduct_to')
                                                            <div class="text-sm transition transform alert alert-danger"
                                                            x-data x-init="document.getElementById('deduct_to_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('deduct_to_container').focus();" >
                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                            </div>
                                                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="my-4 border-gray-300">
                                    </div>
                                @endif

                                <div id="reason_container" class="grid grid-cols-1 col-span-3 gap-5 ">
                                    <label for="reason"
                                    class="block font-bold whitespace-nowrap text-customRed ">Reason for Filing</label>
                                    <textarea type="text" rows="10" id="reason" name="reason" wire:model="reason"
                                        placeholder="Write your reason of filling here. Maximum of 500 only."
                                        class="block p-2.5 w-full text-sm text-customGray bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed " disabled>
                                    </textarea>
                                    @error('reason')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('reason_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('reason_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                        </div>
                                    @enderror
                                </div>

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button data-modal-target="crud-modal" type="button" data-modal-toggle="crud-modal" class="inline-flex ml-4 items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-customRed hover:bg-red-600 hover:text-white rounded-lg shadow  hover:bg-primary-800">
                    Change Status
                </button>

                <!-- Change Status Modal -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
                    <div class="relative w-full max-w-md p-4">
                        <div class="relative bg-white rounded-lg shadow ">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t ">
                                <h3 class="text-lg font-semibold text-gray-900 ">Change Status</h3>
                                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto " data-modal-toggle="crud-modal">
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
                                        <label for="category" class="block mb-2 text-sm font-semibold text-gray-900 ">Status</label>
                                        <select id="category" wire:model="status" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5   ">
                                            <option class="hover:bg-customRed hover:text-white" value="Completed">Completed</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Pending">Pending</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Report">Report</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Request to Complete">Request to Complete</option>
                                            <option class="hover:bg-customRed hover:text-white" value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <button id="updateButton" type="submit" class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center    justify-self-end">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Popup Modal -->
                <div id="popup-modal" tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center hidden w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <div class="relative bg-white rounded-lg shadow ">
                            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-hide="popup-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <form wire:submit.prevent="submit" method="POST"  class="p-4 md:p-5">
                                <div class="p-4 text-center md:p-5">
                                    <svg class="w-12 h-12 mx-auto mb-4 text-amber-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 ">Are you sure you want to proceed</h3>
                                    <button type="submit" class="text-white bg-amber-600 hover:bg-amber-800   font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes
                                    </button>
                                    <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-600 focus:z-10 focus:ring-4 focus:ring-gray-100      "  data-modal-hide="popup-modal">No</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div id="toast-success" tabindex="-1" class="fixed z-50 flex items-center justify-center hidden w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 " role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg ">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <span class="sr-only">Check icon</span>
                    </div>
                    <div class="text-sm font-normal ms-3">Status Updated Successfully.</div>
                    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8    " data-dismiss-target="#toast-success" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                </div>

            </form>
        </div>
    </section>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const updateButton = document.getElementById('updateButton');
        const modal = document.getElementById('popup-modal');
        const crud_modal = document.getElementById('crud-modal');

        const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');

        updateButton.addEventListener('click', (e) => {
            e.preventDefault();
            modal.classList.remove('hidden');
            // crud_modal.classList.add('hidden');
        });

        closeModalButtons.forEach((button) => {
            button.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
    });


    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerNotification', () => {
            // Show the modal
            const modal = document.getElementById('toast-success');
            const pop_up_modal = document.getElementById('popup-modal');
            const crud_modal = document.getElementById('crud-modal');

            if (modal) {
                crud_modal.classList.add('hidden');
                pop_up_modal.classList.add('hidden');
                modal.classList.remove('hidden');
            }
        });
    });
</script>
