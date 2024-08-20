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
            <a href="{{route('LeaveRequestTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Employee</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-600 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-semibold text-gray-900 md:ms-2 dark:text-gray-400">Create</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white"> View Employee</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 mt-10 rounded-lg">
        <div class=" px-1 mx-auto pt-8">
        <form wire:submit.prevent="getEmployeeDetails">
         @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                               <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2  class="font-bold text-customRed">Employee Personal Information</h2>

                                    {{-- <div class="divide-y  divide-gray-400"> --}}
                                        <div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="first_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">First name <span class="text-red-600">*</span></label>
                                                <input type="text" name="first_name" id="first_name" value="{{ $first_name }}"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" {{ $isEditable ? '' : 'disabled' }}>

                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" wire:model="middle_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Last name <span class="text-red-600">*</span></label>
                                                <input type="text" name="lastname" id="lastname"  wire:model="last_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4 ">
                                            <div class="w-full ">
                                                <label for="nickname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap"> Nickname <span class="text-red-600">*</span></label>
                                                <input type="text" name="nickname" id="nickname" wire:model="nickname" class="bg-gray-50 border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                     required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="gender"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Gender<span class="text-red-600">*</span></label>
                                                <select name="sex" id="sex" wire:model="gender"
                                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" {{ $isEditable ? '' : 'disabled' }} >                                            <option value="" disabled>Select Sex</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee Email <span class="text-red-600">*</span></label>
                                                <input type="email" name="lastname" id="lastname"  wire:model="employee_email"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }} >
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-4 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="age"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Age <span class="text-red-600">*</span></label>
                                                <input type="number" name="age" id="age"  wire:model="age"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Birth Date<span class="text-red-600">*</span></label>
                                                <input type="date" name="middlename" id="middlename" wire:model="birth_date"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Religion <span class="text-red-600">*</span></label>
                                                <input type="text" name="lastname" id="lastname"  wire:model="religion"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full" id="civil_status_container">
                                        <label for="civil_status" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            Civil Status
                                        </label>
                                        <select name="civil_status" id="civil_status" wire:model="civil_status"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                                    <option value="" disabled>Select Civil Status</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="widowed">Widowed</option>
                                            <option value="divorced">Divorced</option>
                                            <option value="separated">Separated</option>
                                        </select>
                                            </div>
                                        </div>



                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4 ">
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Height <span class="text-red-600">*</span></label>
                                                <input type="number" name="middlename" id="middlename" wire:model="height"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Weight<span class="text-red-600">*</span></label>
                                                <input type="number" name="lastname" id="lastname"  wire:model="weight"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee_ID<span class="text-red-600">*</span></label>
                                                <input type="text" name="lastname" id="lastname"  wire:model="employee_id"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                        </div>



                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4 ">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Home Address <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="firstname" id="firstname"  wire:model="home_address"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}> </textarea>
                                            </div>
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Birthplace <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="firstname" id="firstname"  wire:model="birth_place"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}> </textarea>
                                            </div>
                                            <div class="w-full ">
                                                <label for="provincial_address"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Provincial Address <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="provincial_address" id="provincial_address" wire:model="provincial_address"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}> </textarea>
                                            </div>
                                            <div class="w-full ">
                                                <label for="phone_number"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Phone Number <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="phone_number" id="phone_number" wire:model="phone_number"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}> </textarea>
                                            </div>

                                        </div>
                                    </div>
                               </div>
                            </div>

                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                     <h2  class="font-bold text-customRed">Work Related Information</h2>
                                     <div>
                                        {{-- <div class="w-full pb-4" id="profile_summary_container">
                                            <label for="profile_summary"
                                                class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                                Profile Summary <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="3" name="profile_summary" id="profile_summary"  wire:model="profile_summary"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </textarea>
                                            @error('profile_summary')
                                                    <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('profile_summary_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('profile_summaryc_container').focus();">
                                                        <span class="text-xs text-red-500 "> {{$message}}</span>
                                                    </div>
                                                @enderror
                                        </div> --}}
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Start of Employment<span class="text-red-600">*</span></label>
                                                <input type="date" name="firstname" id="firstname"  wire:model="start_of_employment"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Position<span class="text-red-600">*</span></label>
                                                <input type="text" name="firstname" id="firstname"  wire:model="current_position"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                        </div>
                                         <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                             <div class="w-full" id="company_container">
                                                 <label for="company"
                                                     class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Company Name <span class="text-red-600">*</span></label>
                                                 <select id="company" name="company" wire:model.live="department"
                                                     class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" {{ $isEditable ? '' : 'disabled' }}>
                                                     <option selected>Select</option>
                                                     <option value="PEI">PEI</option>
                                                    <option value="SL SEARCH">SL SEARCH</option>
                                                    <option value="SL Temps">SL TEMPS</option>
                                                    <option value="WESEARCH">WESEARCH</option>
                                                    <option value="PEI-Upskills">PEI-UPSKILLS</option>
                                                 </select>

                                             </div>
                                             <div class="w-full">
                                                 <label for="department_name"
                                                     class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Department Name <span class="text-red-600">*</span></label>
                                                     <select id="inside_department" name="inside_department" wire:model.live="inside_department"
                                                     class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" {{ $isEditable ? '' : 'disabled' }}>
                                                     <option selected>Select</option>
                                                     <option value="HR and Admin">HR and Admin</option>
                                                     <option value="Recruitment">Recruitment</option>
                                                     <option value="CXS">CXS</option>
                                                     <option value="Overseas Recruitment">Overseas Recruitment</option>
                                                     <option value="PEI/SL Temps DO-174">PEI/SL Temps DO-174</option>
                                                     <option value="Corporate Accounting and Finance">Corporate Accounting and Finance</option>
                                                     <option value="Accounting Operations">Accounting Operations</option>
                                                 </select>
                                             </div>

                                             <div class="w-full">
                                                 <label for="employee_id"
                                                     class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee Type <span class="text-red-600">*</span></label>
                                                 <select id="mode_of_application" name="mode_of_application" wire:model.live="employee_type"
                                                     class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" {{ $isEditable ? '' : 'disabled' }}>
                                                     <option selected>Select</option>
                                                     <option value="INTERNALS">INTERNALS</option>
                                                     <option value="OJT">OJT</option>
                                                     <option value="PEI-CSS">PEI-CSS</option>
                                                     <option value="RAPID">RAPID</option>
                                                     <option value="RAPID MOBILITY">RAPID MOBILITY</option>
                                                     <option value="UPSKILLS">UPSKILLS</option>
                                                 </select>
                                                 @error('mode_of_application')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('mode_of_application_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('mode_of_application_container').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                             </div>
                                         </div>
                                         <div class="grid grid-cols-1 min-[902px]:grid-cols-4 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">SSS Number <span class="text-red-600">*</span></label>
                                                <input type="number" name="firstname" id="firstname"  wire:model="sss_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">TIN Number<span class="text-red-600">*</span></label>
                                                <input type="number" name="middlename" id="middlename" wire:model="tin_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">PHIC Number <span class="text-red-600">*</span></label>
                                                <input type="number" name="lastname" id="lastname"  wire:model="phic_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">HDMF Number <span class="text-red-600">*</span></label>
                                                <input type="number" name="lastname" id="lastname"  wire:model="hdmf_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                        </div>
                                        <div class="w-full ">
                                            <label for="firstname"
                                                class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Microsoft Folder Link for  <span class="text-customRed">201 Files and Other Necessary Files</span> <span class="text-red-600">*</span></label>
                                            <textarea type="text" rows="2" name="firstname" id="firstname"  wire:model="files"
                                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" {{ $isEditable ? '' : 'disabled' }}> </textarea>
                                        </div>
                                     </div>
                                </div>
                             </div>

                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                     <h2 class="font-bold text-customRed">Family Information</h2>
                                     <div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Father's Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="firstname" id="firstname"  wire:model="name_of_father"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Mother's Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" wire:model="name_of_mother"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required=""{{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Spouse's Name </label>
                                                <input type="text" name="lastname" id="lastname"  wire:model="name_of_spouse"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Childrens' Name <span class="text-red-600">*</span></label>
                                                <input type="array" name="firstname" id="firstname"  wire:model="names_of_children"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Emergency Contact Person <span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" wire:model="emergency_contact.contact_person"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Emergency Contact (Relationship)<span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" wire:model="emergency_contact.relationship"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Emergency Contact (Address)<span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" wire:model="emergency_contact.address"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Emergency Contact (Phone Number)<span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" wire:model="emergency_contact.cellphone_number"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" {{ $isEditable ? '' : 'disabled' }}>
                                            </div>

                                        </div>


                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4  ">
                                    <h2 class="font-bold text-customRed"> School Information</h2>
                                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <p class="font-bold text-base text-customRed pb-4"> High School</p>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="firstname"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="firstname" id="firstname"  wire:model="high_school_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Date Graduated <span class="text-red-600">*</span></label>
                                                    <input type="date" name="middlename" id="middlename" wire:model="high_school_date_graduated"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <p class="font-bold text-base text-customRed pb-4"> College School</p>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="firstname"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="firstname" id="firstname"  wire:model="college_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Course <span class="text-red-600">*</span></label>
                                                    <input type="text" name="middlename" id="middlename" wire:model="college_course"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Date Graduated <span class="text-red-600">*</span></label>
                                                    <input type="date" name="middlename" id="middlename" wire:model="college_date_graduated"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <p class="font-bold text-base text-customRed pb-4"> Vocational School</p>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="firstname"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="firstname" id="firstname"  wire:model="vocational_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Course <span class="text-red-600">*</span></label>
                                                    <input type="text" name="middlename" id="middlename" wire:model="vocational_course"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Date Graduated <span class="text-red-600">*</span></label>
                                                    <input type="date" name="middlename" id="middlename" wire:model="vocational_date_graduated"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        required="" {{ $isEditable ? '' : 'disabled' }}>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>


                        </div>
                        <div x-data="{ showSubmitButton: @entangle('showSubmitButton') }">
    <!-- Edit Button -->
    <button
        type="button"
        x-show="!showSubmitButton"
        @click="$wire.enableEditing()"
        class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-customRed shadow hover:bg-customRed hover:text-white bg-navButton rounded-8px">
        Edit
    </button>

    <!-- Submit Button -->
    <button
        type="button"
        x-show="showSubmitButton"
        @click="if(confirm('Are you sure you want to submit the changes?')) { $wire.submit() }"
        class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-customRed shadow hover:bg-customRed hover:text-white bg-navButton rounded-8px">
        Submit
    </button>
</div>
                    </div>

                </div>



                <!-- Loading screen -->
                <div wire:loading wire:target="submit" class="load-over">
                    <div wire:loading wire:target="submit" class="loading-overlay">
                        <div class="flex flex-col justify-center items-center">
                            <div class="spinner"></div>
                            <p>Changing Employee's Information...</p>
                        </div>
                    </div>
                </div>
            </form>
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
    // Add this script to hide the success alert after a delay
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.processed', (message, component) => {
            if (message.updateQueue && message.updateQueue.includes('showSuccess')) {
                setTimeout(() => {
                    component.set('showSuccess', false);
                }, 5000); // Adjust the delay (in milliseconds) as needed
            }
        });
    });

    </script>
</div>
