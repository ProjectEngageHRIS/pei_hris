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
    <form wire:submit.prevent="submit" method="POST">
    @csrf
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white"> View Employee Information </h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 mt-10 rounded-lg">
        <div class=" px-1 mx-auto pt-8">

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
                                                <input type="text" name="first_name" id="first_name" wire:model="first_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="" disabled>
                                                    @error('first_name')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('first_name').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('first_name').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                            <div class="w-full ">
                                                <label for="middle_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Middle name </label>
                                                <input type="text" name="middle_name" id="middle_name" wire:model="middle_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    disabled>
                                                    @error('middle_name')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('middle_name').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('middle_name').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="last_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Last name <span class="text-red-600">*</span></label>
                                                <input type="text" name="last_name" id="last_name"  wire:model="last_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    disabled>
                                                    @error('last_name')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('last_name').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('last_name').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4 ">
                                            <div class="w-full ">
                                                <label for="nickname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap"> Nickname </label>
                                                <input type="text" name="nickname" id="nickname" wire:model="nickname" class="bg-gray-50 border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                     disabled>
                                                     @error('nickname')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('nickname').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('nickname').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                        </div>
                                            <div id="gender_container" class="w-full ">
                                                <label for="gender"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Gender<span class="text-red-600">*</span></label>
                                                <select name="gender" id="gender" wire:model="gender"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd=""  disabled>
                                                        <option value="" >Select Sex</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                                @error('gender')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('gender_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('gender_container').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div id="personal_email_container" class="w-full">
                                                <label for="personal_email"
                                                class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Personal Email <span class="text-red-600">*</span></label>
                                                <input type="email" name="personal_email" id="personal_email"  wire:model="personal_email"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd=""  disabled>
                                                    @error('personal_email')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('personal_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('personal_email_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div id="employee_email_container" class="w-full">
                                                <label for="employee_email"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee Email <span class="text-red-600">*</span></label>
                                                <input type="email" name="employee_email" id="employee_email"  wire:model="employee_email"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd=""  disabled>
                                                    @error('employee_email')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('employee_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employee_email_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div id="home_address_container" class="w-full ">
                                                <label for="home_address"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Home Address <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="home_address" id="home_address"  wire:model="home_address"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled> </textarea>
                                                    @error('home_address')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('home_address_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('home_address_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div id="provincial_address_container" class="w-full ">
                                                <label for="provincial_address"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Provincial Address <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="provincial_address" id="provincial_address" wire:model="provincial_address"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled> </textarea>
                                                @error('provincial_address')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('provincial_address_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('provincial_address_container').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-5 gap-4 col-span-3 pb-4">
                                            <div id="age_container" class="w-full ">
                                                <label for="age"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Age <span class="text-red-600">*</span></label>
                                                <input type="number" name="age" id="age"  wire:model="age"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('age')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('age_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('age_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div id="birth_date_container" class="w-full ">
                                                <label for="birth_date"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Birth Date<span class="text-red-600">*</span></label>
                                                <input type="date" name="birth_date" id="birth_date" wire:model="birth_date"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('birth_date')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('birth_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('birth_date_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div id="religion_container" class="w-full">
                                                <label for="religion"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Religion <span class="text-red-600">*</span></label>
                                                <input type="text" name="religion" id="religion"  wire:model="religion"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('religion')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('religion_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('religion_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                        <div class="w-full" id="civil_status_container">
                                            <label for="civil_status" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Civil Status
                                            </label>
                                            <select name="civil_status" id="civil_status" wire:model="civil_status"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled>
                                                <option value="" d>Select Civil Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widowed">Widowed</option>
                                                <option value="Divorced">Divorced</option>
                                                <option value="Separated">Separated</option>
                                            </select>
                                            @error('civil_status')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('civil_status').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('civil_status').focus();" >
                                                    <span class="text-x s text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div id="phone_number_container" class="w-full">
                                            <label for="lastname"
                                                class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Phone Number<span class="text-red-600">*</span></label>
                                            <input type="tel" name="lastname" id="lastname"  wire:model="phone_number"
                                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                ntd="" disabled>
                                                @error('phone_number')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('phone_number_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('phone_number_container').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4 ">

                                            <div class="w-full ">
                                                <label for="birth_place"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Birthplace <span class="text-red-600">*</span></label>
                                                <textarea type="text" name="birth_place" id="birth_place"  wire:model="birth_place"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled> </textarea>
                                                    @error('birth_place')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('birth_place').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('birth_place').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>

                                            <div class="w-full ">
                                                <label for="profile_summary"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Profile Summary <span class="text-red-600">*</span></label>
                                                <textarea type="tel" name="profile_summary" id="profile_summary" wire:model="profile_summary"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-00 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled> </textarea>
                                                    @error('profile_summary')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('profile_summary').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('profile_summary').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>

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
                                                <label for="name_of_father"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Father's Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="name_of_father" id="name_of_father"  wire:model="name_of_father"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('name_of_father')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('name_of_father').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('name_of_father').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror

                                            </div>
                                            <div class="w-full ">
                                                <label for="name_of_mother"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Mother's Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="name_of_mother" id="name_of_mother" wire:model="name_of_mother"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('name_of_mother')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('name_of_mother').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('name_of_mother').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="spouse"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Spouse's Name </label>
                                                <input type="text" name="spouse" id="spouse"  wire:model="spouse"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('spouse')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('spouse').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('spouse').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                                        <div>
                                        <div class="w-full">
                                    <label for="names_of_children"
                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">
                                        Children's Name <span class="text-red-600">*</span>
                                    </label>

                                    @foreach ($names_of_children as $index => $name)
    <div class="mb-2">
        <input type="text" id="names_of_children[{{ $index }}]" name="names_of_children[{{ $index }}]" wire:model="names_of_children.{{ $index }}"
            class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            ntd disabled>
        @error('names_of_children.' . $index)
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror


    </div>
@endforeach

                                </div>


</div>
</div>
</div>
</div>
</div>
</div>
<div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="grid grid-cols-1 col-span-3 gap-4">
        <h2 class="font-bold text-customRed">Emergency Contact</h2>

        <div class="gap-2 flex flex-col">
            <label for="emergency_contact.contact_person" class="block text-sm font-medium text-customGray1">
                Name <span class="text-red-600">*</span>
            </label>
            <input type="text" name="emergency_contact.contact_person" id="emergency_contact.contact_person" wire:model="emergency_contact.contact_person" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name" disabled>
            @error('emergency_contact.contact_person')
                <div class="text-sm transition transform alert alert-danger"
                     x-data x-init="document.getElementById('emergency_contact.contact_person').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emergency_contact.contact_person').focus();">
                    <span class="text-xs text-red-500">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="gap-2 flex flex-col">
            <label for="emergency_contact.relationship" class="block text-sm font-medium text-customGray1">
                Relationship <span class="text-red-600">*</span>
            </label>
            <input type="text" name="emergency_contact.relationship" id="emergency_contact.relationship" wire:model="emergency_contact.relationship" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Relationship" disabled>
            @error('emergency_contact.relationship')
                <div class="text-sm transition transform alert alert-danger"
                     x-data x-init="document.getElementById('emergency_contact.relationship').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emergency_contact.relationship').focus();">
                    <span class="text-xs text-red-500">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="gap-2 flex flex-col">
            <label for="emergency_contact.address" class="block text-sm font-medium text-customGray1">
                Home Address <span class="text-red-600">*</span>
            </label>
            <input type="text" name="emergency_contact.address" id="emergency_contact.address" wire:model="emergency_contact.address" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Home Address" disabled>
            @error('emergency_contact.address')
                <div class="text-sm transition transform alert alert-danger"
                     x-data x-init="document.getElementById('emergency_contact.address').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emergency_contact.address').focus();">
                    <span class="text-xs text-red-500">{{ $message }}</span>
                </div>
            @enderror
        </div>

        <div class="gap-2 flex flex-col">
            <label for="emergencyContact.cellphone_number" class="block text-sm font-medium text-customGray1">
                Cellphone Number <span class="text-red-600">*</span>
            </label>
            <input type="tel" name="emergency_contact.cellphone_number" id="emergency_contact.cellphone_number" wire:model="emergency_contact.cellphone_number" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Cellphone Number" disabled>
            @error('emergency_contact.cellphone_number')
                <div class="text-sm transition transform alert alert-danger"
                     x-data x-init="document.getElementById('emergency_contact.cellphone_number').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emergency_contact.cellphone_number').focus();">
                    <span class="text-xs text-red-500">{{ $message }}</span>
                </div>
            @enderror
        </div>
    </div>
</div>




                                <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                     <div>
                                     <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-2">
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
                                        class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100" disabled>
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>

                             </div>
                             <div class="grid grid-cols-2 gap-4">
                                    <div class="mt-5">
                                        <label for="employeeHistory_{{$index}}_start_date" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">
                                            Start Date <span class="text-red-600">*</span></label>
                                        <input type="date" rows="4" id="employeeHistory_{{$index}}_start_date" name="employeeHistory_{{$index}}_start_date" wire:model.blur="employeeHistory.{{$index}}.start_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required disabled></input>
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
                                        <input type="date" rows="4" id="employeeHistory_{{$index}}_end_date" name="employeeHistory_{{$index}}_end_date" wire:model.blur="employeeHistory.{{$index}}.end_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required disabled></input>
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


                                     </div>
                                </div>
                             </div>

                             <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4  ">
                                    <h2 class="font-bold text-customRed"> School Information</h2>
                                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <p class="font-bold text-base text-customRed pb-4"> High School</p>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="high_school_school"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="high_school_school" id="high_school_school"  wire:model="high_school_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled
                                                        ntd="" >
                                                        @error('high_school_school')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('high_school_school').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('high_school_school').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                                <div class="w-full ">
                                                    <label for="middlename"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Date Graduated <span class="text-red-600">*</span></label>
                                                    <input type="date" name="high_school_date_graduated" id="high_school_date_graduated" wire:model="high_school_date_graduated"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled >
                                                        @error('high_school_date_graduated')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('high_school_date_graduated').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('high_school_date_graduated').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <p class="font-bold text-base text-customRed pb-4"> College School</p>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="college_school"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="college_school" id="college_school"  wire:model="college_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled>
                                                        @error('college_school')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('college_school').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('college_school').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                                <div class="w-full ">
                                                    <label for="college_course"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Course <span class="text-red-600">*</span></label>
                                                    <input type="text" name="college_course" id="college_course" wire:model="college_course"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled>
                                                        @error('college_course')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('college_course').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('college_course').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                                <div class="w-full ">
                                                    <label for="college_date_graduated"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Date Graduated <span class="text-red-600">*</span></label>
                                                    <input type="date" name="college_date_graduated" id="college_date_graduated" wire:model="college_date_graduated"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled>
                                                        @error('college_date_graduated')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('college_date_graduated').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('college_date_graduated').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                            <p class="font-bold text-base text-customRed pb-4"> Vocational School</p>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="vocational_school"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="vocational_school" id="vocational_school"  wire:model="vocational_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled>
                                                        @error('vocational_school')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('vocational_school').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('vocational_school').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                                <div class="w-full ">
                                                    <label for="vocational_course"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Course </label>
                                                    <input type="text" name="vocational_course" id="vocational_course" wire:model="vocational_course"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd=""disabled >
                                                        @error('vocational_course')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('vocational_course').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('vocational_course').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>
                                                <div class="w-full ">
                                                    <label for="vocational_date_graduated"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Date Graduated <span class="text-red-600">*</span></label>
                                                    <input type="date" name="middlename" id="vocational_date_graduated" wire:model="vocational_date_graduated"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" disabled>
                                                        @error('vocational_date_graduated')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('vocational_date_graduated').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('vocational_date_graduated').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                                </div>

                                            </div>

                                        </div>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                     <div>
                                     <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-2">
                    <h2 class="block mb-2 text-sm font-medium text-customGray"> Microsoft Folder Link for  <span class="text-customRed"><b>201 Files and Other Necessary Files</b></span> <span class="text-red-600">*</span></h2>
                    <div class="grid grid-cols-1 col-span-3 gap-4 pb-4" id="files_container">
                        <div class="w-full ">
                            <label for="files"
                                class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Link <span class="text-red-600">*</span></label>
                            <textarea type="url" rows="2" name="files" id="files_link"  wire:model="files_link"
                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                ntd="" disabled> </textarea>
                                @error('files_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('files_link').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('files_link').focus();" >
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror

                        </div>
                        @php
                            $ctr = 0
                        @endphp
                        @if ($files)
                        @foreach ($files as $index => $Files)
                        <div class="bg-white rounded-lg ">
                            <div class="col-span-5">
                                <ul class="text-sm font-medium text-right text-gray-500 border border-gray-300 rounded-t-lg bg-gray-50 " id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                                    <li class="float-left mt-4 ml-5 font-bold text-gray-900 float-bold">
                                        <span>No. {{$ctr + 1 }}</span>
                                    </li>
                                    <li class="">
                                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="true"
                                        type="button" name="add" wire:click.prevent="removeFile({{$index}})" wire:confirm="Are you sure you want to delete this?"
                                        class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100" disabled>
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="border border-gray-200 border-solid p-6">
    <div class="flex space-x-4">
        <!-- File Name Input -->
        <div id="files_{{$index}}_name_of_file_container" class="flex-1">
            <label for="files_{{$index}}_name_of_file" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                File Name <span class="text-red-600">*</span>
            </label>
            <input type="text" id="files_{{$index}}_name_of_file" name="files_{{$index}}_name_of_file" wire:model.blur="files.{{$index}}.name_of_file" placeholder="Enter File Name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" disabled>
            @error('files.' . $index . '.name_of_file')
                <div class="text-sm transition transform alert alert-danger"
                    x-data x-init="document.getElementById('files_{{$index}}_name_of_file_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('files_{{$index}}_name_of_file_container').focus();">
                    <span class="text-xs text-red-500"> {{$message}}</span>
                </div>
            @enderror
        </div>

        <!-- Toggle Switch for Completed -->
        <div class="flex items-center pt-7"> <!-- Add pt-1 here to push everything down -->
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="files.{{$index}}.completed" class="sr-only peer" disabled>
        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Completed?</span>
    </label>
    @error('files.' . $index . '.completed')
        <div class="text-sm transition transform alert alert-danger"
            x-data x-init="document.getElementById('files_{{$index}}_completed').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('files_{{$index}}_completed').focus();">
            <span class="text-xs text-red-500"> {{$message}}</span>
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
                                Livewire.on('update-files', (data) => {
                                    // alert(JSON.stringify(data)); // Ensure the data received here is correct
                                    // Parse the JSON data into a JavaScript array
                                    const dataArray = JSON.parse(data);

                                    // Iterate over the array elements
                                    dataArray.forEach((element, index) => {
                                        document.getElementById('files_' + index + '_name_of_file').value = element.name_of_file;
                                        document.getElementById('files_' + index + '_completed').value = element.completed;

                                    });
                                });
                            });
                        </script>

                        @php
                            if(isset($index) == False){
                                $index = 0;
                            }
                        @endphp

                    </div>
                </div>


                                     </div>
                                </div>
                             </div>

                             <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                     <h2  class="font-bold text-customRed">Onboarding</h2>
                                     <div>

                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="start_of_employment"
                                                    class  ="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Start of Employment<span class="text-red-600">*</span></label>
                                                <input type="date" name="start_of_employment" id="start_of_employment"  wire:model="start_of_employment"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" disabled>
                                                    @error('start_of_employment')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('start_of_employment').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('start_of_employment').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div class="w-full ">
                                                <label for="current_position"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Position<span class="text-red-600">*</span></label>
                                                <input type="text" name="current_position" id="current_position"  wire:model="current_position"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                @error('current_position')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('current_position').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('current_position').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror

                                            </div>
                                            <div class="gap-2 flex flex-col">
                                                <label for="role_id" class="block text-sm font-medium text-customGray1">Roles <span class="text-red-600">*</span></label>
                                                <select name="role_id" id="role_id" wire:model.live="role_id" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required disabled>
                                                    <option selected>Select a Role</option>
                                                    <option value="1">Employee</option>
                                                    <option value="2"> HR Employee</option>
                                                    <option value="3">Accounting</option>
                                                    <option value="4">Supervisor</optaion>
                                                    <option value="5">Department Head</option>
                                                    <option value="6">President</option>
                                                    <option value="7">HR Head</option>
                                                    <option value="8">HR Assistant</option>
                                                    <option value="9">HR Internal Control</option>
                                                    <option value="10">HR Operations</option>
                                                    <option value="11">HR (HR Internal Tickets)</option>
                                                    <option value="12">Office Admin (HR Internal Tickets)</option>
                                                    <option value="13">Procurement (HR Internal Tickets)</option>
                                                    <option value="14">IT Lead</option>
                                                    <option value="15">IT Support</option>

                                                </select>
                                                @error('role_id')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('role_id').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('role_id').focus();" >
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                    </div>
                                        </div>
                                         <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                             <div class="w-full" id="department">
                                                 <label for="company"
                                                     class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Company Name <span class="text-red-600">*</span></label>
                                                 <select id="department" name="department" wire:model.live="department"
                                                     class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                                     <option selected>Select</option>
                                                     <option value="PEI">PEI</option>
                                                    <option value="SL SEARCH">SL SEARCH</option>
                                                    <option value="SL Temps">SL TEMPS</option>
                                                    <option value="WESEARCH">WESEARCH</option>
                                                    <option value="PEI-Upskills">PEI-UPSKILLS</option>
                                                 </select>
                                                 @error('department')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('department').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('department').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror

                                             </div>
                                             <div class="w-full">
                                                 <label for="department_name"
                                                     class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Department Name <span class="text-red-600">*</span></label>
                                                     <select id="inside_department" name="inside_department" wire:model.live="inside_department"
                                                     class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                                     <option selected>Select</option>
                                                     <option value="HR and Admin">HR and Admin</option>
                                                     <option value="Recruitment">Recruitment</option>
                                                     <option value="CXS">CXS</option>
                                                     <option value="Overseas Recruitment">Overseas Recruitment</option>
                                                     <option value="PEI/SL Temps DO-174">PEI/SL Temps DO-174</option>
                                                     <option value="Corporate Accounting and Finance">Corporate Accounting and Finance</option>
                                                     <option value="Accounting Operations">Accounting Operations</option>
                                                 </select>
                                                 @error('inside_department')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('inside_department').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('inside_department').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                             </div>

                                             <div class="w-full">
                                                 <label for="employee_type"
                                                     class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee Type <span class="text-red-600">*</span></label>
                                                 <select id="employee_type" name="employee_type" wire:model="employee_type"
                                                     class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                                                     <option selected>Select</option>
                                                     <option value="INDEPENDENT CONTRACTOR">Independent Contractor</option>
                                                     <option value="INTERNAL EMPLOYEE">Internal Employee</option>
                                                     <option value="INTERN">Intern</option>
                                                     <option value="PROBISIONARY">Probisionary</option>
                                                     <option value="PROJECT BASED">Project Based</option>
                                                     <option value="REGULAR">Regular</option>
                                                     <option value="RELIVER">Reliver</option>
                                                 </select>
                                                 @error('employee_type')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('employee_type').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employee_type').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                             </div>
                                         </div>
                                         <div class="grid grid-cols-1 min-[902px]:grid-cols-4 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">SSS Number <span class="text-red-600">*</span></label>
                                                <input type="text" name="sss_num" id="sss_num"  wire:model="sss_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('sss_num')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('sss_num').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sss_num').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                            </div>
                                            <div class="w-full ">
                                                <label for="tin_num"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">TIN Number<span class="text-red-600">*</span></label>
                                                <input type="text" name="tin_num" id="tin_num" wire:model="tin_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('tin_num')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('tin_num').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('tin_num').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="phic_num"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">PHIC Number <span class="text-red-600">*</span></label>
                                                <input type="text" name="phic_num" id="phic_num"  wire:model="phic_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('phic_num')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('phic_num').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('phic_num').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="hdmf_num"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">HDMF Number <span class="text-red-600">*</span></label>
                                                <input type="text" name="hdmf_num" id="hdmf_num"  wire:model="hdmf_num"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd=""disabled >
                                                    @error('hdmf_num')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('hdmf_num').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('hdmf_num').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="employee_id"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee_ID<span class="text-red-600">*</span></label>
                                                <input type="text" name="employee_id" id="employee_id"  wire:model="employee_id"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" disabled>
                                                    @error('employee_id')
                                                     <div class="text-sm transition transform alert alert-danger"
                                                     x-data x-init="document.getElementById('employee_id').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employee_id').focus();" >
                                                         <span class="text-xs text-red-500" > {{$message}}</span>
                                                     </div>
                                                 @enderror
                                            </div>



                                        </div>

                                     </div>
                                     <div class="items-center">
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="active" class="sr-only peer" checked disabled>
        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active?</span>
    </label>
</div>
</div>
</div>


</div>
</div>

