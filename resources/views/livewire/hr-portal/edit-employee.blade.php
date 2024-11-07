<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('HumanResourceDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed dark:text-gray-400 dark:hover:text-white">
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
            <span class="ms-1 text-sm font-medium text-gray-700 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Employee Information</span>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-600 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-semibold text-gray-900 md:ms-2 dark:text-gray-400">Edit</span>
            </div>
        </li>
        </ol>
    </nav>
    <form wire:submit.prevent="submit" method="POST">
    @csrf
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white"> Edit Employee Information</h2>
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 mt-10 rounded-lg">
        <div class=" px-1 mx-auto pt-8">

                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                               <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2  class="font-bold text-customRed">Employee Personal Information</h2>
                                    <hr class="border-t-2 border-gray-400">


                                    {{-- <div class="divide-y  divide-gray-400"> --}}
                                        <div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="first_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">First Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="first_name" id="first_name" wire:model="first_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    @error('first_name')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('first_name').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('first_name').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                            <div class="w-full ">
                                                <label for="middle_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Middle Name </label>
                                                <input type="text" name="middle_name" id="middle_name" wire:model="middle_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    >
                                                    @error('middle_name')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('middle_name').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('middle_name').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                            <div class="w-full">
                                                <label for="last_name"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Last Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="last_name" id="last_name"  wire:model="last_name"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    >
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
                                                     >
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
                                                        ntd=""  >
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
                                                    ntd=""  >
                                                    @error('personal_email')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('personal_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('personal_email_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                            <div id="employee_email_container" class="w-full">
                                                <label for="employee_email"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee Email <span class="text-red-600">*</span></label>
                                                <input type="email" name="employee_email" id="employee_email" wire:model.live="employee_email"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd=""  >
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
                                                    ntd="" > </textarea>
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
                                                    ntd=""> </textarea>
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
                                                    ntd="" >
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
                                                    ntd="" >
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
                                                    ntd="" >
                                                    @error('religion')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('religion_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('religion_container').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                            </div>
                                        <div class="w-full" id="civil_status_container">
                                            <label for="civil_status" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Civil Status <span class="text-red-600">*</span>
                                            </label>
                                            <select name="civil_status" id="civil_status" wire:model="civil_status"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" >
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
                                                class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Phone Number <span class="text-red-600">*</span></label>
                                            <input type="tel" name="lastname" id="lastname"  wire:model="phone_number"
                                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                ntd="">
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
                                                    ntd="" > </textarea>
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
                                                    ntd="" > </textarea>
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
                                     <hr class="border-t-2 border-gray-400">

                                     <div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="name_of_father"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Father's Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="name_of_father" id="name_of_father"  wire:model="name_of_father"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" >
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
                                                    ntd="">
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
                                                    ntd="" >
                                                    @error('spouse')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('spouse').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('spouse').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 gap-4 col-span-3 pb-4">
                                            <div class="w-full">
                                                <label for="names_of_children" class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">
                                                    Children's Name <span class="text-red-600">*</span>
                                                </label>
                                        
                                                @if ($names_of_children && count($names_of_children) > 0)
                                                    @foreach ($names_of_children as $index => $name)
                                                        <div class="flex items-center mb-2">
                                                            <!-- Number label for each child -->
                                                            <span class="mr-2 text-sm font-medium text-gray-600">{{ $index + 1 }}.</span>
                                                
                                                            <!-- Child's name input field -->
                                                            <input type="text" id="names_of_children[{{ $index }}]" name="names_of_children[{{ $index }}]" 
                                                                wire:model="names_of_children.{{ $index }}"
                                                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                placeholder="Child's Name">
                                                            
                                                            <!-- Remove button as trash bin icon on the right -->
                                                            <button type="button" wire:click="removeChild({{ $index }})" class="ml-2 text-red-600 hover:text-red-800 focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                
                                                        <!-- Display error message below input if there's a validation error -->
                                                        @error('names_of_children.' . $index)
                                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                                        @enderror
                                                    @endforeach
                                                @else
                                                    <div class="text-gray-500 text-sm text-center mt-4">
                                                        No children have been added yet.
                                                    </div>
                                                @endif
                                            
                                        
                                                <!-- Centered "Add Child" button below the input list -->
                                                <div class="flex justify-center mt-4">
                                                    <button type="button" name="add" wire:click.prevent="addChild" class="flex items-center text-customRed hover:bg-customRed shadow border hover:text-white bg-navButton font-medium rounded-8px text-sm px-5 py-2.5 me-2 mb-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                                                            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                                                        </svg>
                                                        Add  Child
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
</div>
</div>
</div>
<div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="grid grid-cols-1 col-span-3 gap-4">
        <h2 class="font-bold text-customRed">Emergency Contact</h2>
        <hr class="border-t-2 border-gray-400">


        <div class="gap-2 flex flex-col">
            <label for="emergency_contact.contact_person" class="block text-sm font-medium text-customGray1">
                Name <span class="text-red-600">*</span>
            </label>
            <input type="text" name="emergency_contact.contact_person" id="emergency_contact.contact_person" wire:model="emergency_contact.contact_person" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name">
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
            <input type="text" name="emergency_contact.relationship" id="emergency_contact.relationship" wire:model="emergency_contact.relationship" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Relationship">
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
            <input type="text" name="emergency_contact.address" id="emergency_contact.address" wire:model="emergency_contact.address" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Home Address">
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
            <input type="tel" name="emergency_contact.cellphone_number" id="emergency_contact.cellphone_number" wire:model="emergency_contact.cellphone_number" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Cellphone Number">
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
                    <h2 class="text-customRed text-md"><b>Employee History</b></h2>
                    <div class="grid grid-cols-1 col-span-3 gap-4 pb-4" id="employeehistory_container">
                        <hr class="border-t-2 border-gray-400">
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
                                        <div  id="employeeHistory_{{$index}}_name_of_company_container">
                                            <label for="employeeHistory_{{$index}}_name_of_company" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap ">Company Name
                                                <span class="text-red-600">*</span></label>
                                            <input type="text" rows="4" id="employeeHistory_{{$index}}_name_of_company" name="employeeHistory_{{$index}}_name_of_company" wire:model.blur="employeeHistory.{{$index}}.name_of_company" placeholder="Enter Company Name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required></input>
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
                                            <input type="text" rows="4" id="employeeHistory_{{$index}}_prev_position" name="employeeHistory_{{$index}}_position" wire:model.blur="employeeHistory.{{$index}}.prev_position" placeholder="Enter Position" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required></input>
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
                                            <input type="date" rows="4" id="employeeHistory_{{$index}}_start_date" name="employeeHistory_{{$index}}_start_date" wire:model.blur="employeeHistory.{{$index}}.start_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required></input>
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
                                            <input type="date" rows="4" id="employeeHistory_{{$index}}_end_date" name="employeeHistory_{{$index}}_end_date" wire:model.blur="employeeHistory.{{$index}}.end_date" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required></input>
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
                        @else
                            <div class="text-gray-500 text-sm text-center mt-4">
                                No Employe History have been added yet.
                            </div>
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
                            <button type="button" name="add" wire:click.prevent="addEmployeeHistory" class="flex items-center text-customRed hover:bg-customRed shadow border hover:text-white bg-navButton font-medium rounded-8px text-sm px-5 py-2.5 me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                                </svg>
                                Add  History
                            </button>
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


                                     </div>
                                </div>
                             </div>
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="col-span-3 space-y-4 ">
                                    <h2 class="font-bold text-md text-customRed"> School Information</h2>
                                        <hr class="border-t-2 border-gray-400">
                                        <p class="font-bold text-base ml-2 text-customRed"> High School</p>
                                        <div class="grid grid-cols-1 ml-2 min-[902px]:grid-cols-2 gap-4 col-span-3 ">
                                            <div class="w-full ">
                                                <label for="high_school_school"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                <input type="text" name="high_school_school" id="high_school_school"  wire:model="high_school_school"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
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
                                                    ntd="" >
                                                    @error('high_school_date_graduated')
                                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('high_school_date_graduated').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('high_school_date_graduated').focus();" >
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <hr class="border-t-2 border-gray-400">
                                        <p class="font-bold ml-2 text-base text-customRed"> College School</p>
                                        <div class="grid grid-cols-1 ml-2 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="college_school"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                <input type="text" name="college_school" id="college_school"  wire:model="college_school"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" >
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
                                                                                ntd="" >
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
                                                                                ntd="" >
                                                                                @error('college_date_graduated')
                                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('college_date_graduated').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('college_date_graduated').focus();" >
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr class="border-t-2 border-gray-400">
                                        <p class="font-bold text-base ml-2 text-customRed"> Vocational School</p>
                                            <div class="grid grid-cols-1 ml-2 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="vocational_school"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">School <span class="text-red-600">*</span></label>
                                                    <input type="text" name="vocational_school" id="vocational_school"  wire:model="vocational_school"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" >
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
                                                        ntd="" >
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
                                                        ntd="" >
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



                            </div>
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                     <div>
                                     <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-2">
                    <h2 class="block mb-2  font-medium text-md text-customGray col-span-1 min-[902px]:col-span-2"> Microsoft Folder Link for  <span class="text-customRed"><b>201 Files and Other Necessary Files</b></span> <span class="text-red-600">*</span></h2>
                    <div class="grid grid-cols-1 col-span-3 gap-4 pb-4" id="files_container">
                        <hr class="border-t-2 border-gray-400">

                        <div class="w-full ">
                            <label for="files"
                                class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Link <span class="text-red-600">*</span></label>
                            <textarea type="url" rows="2" name="files" id="files_link"  wire:model="files_link"
                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                ntd=""> </textarea>
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
                                        class="inline-block p-4 text-red-600 rounded-ss-lg hover:bg-gray-100">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round"  stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="border border-gray-200 border-solid p-6">
                                <div class="border border-gray-200 border-solid p-6">
                                    <div class="grid grid-cols-1 min-[902px]:grid-cols-9 min-[902px]:space-x-4">
                                        <!-- File Name Input -->
                                        <div id="files_{{$index}}_name_of_file_container" class="flex-1 col-span-8">
                                            <label for="files_{{$index}}_name_of_file" class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                File Name <span class="text-red-600">*</span>
                                            </label>
                                            <input type="text" id="files_{{$index}}_name_of_file" name="files_{{$index}}_name_of_file" wire:model.blur="files.{{$index}}.name_of_file" 
                                                placeholder="Enter File Name" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed" required>
                                            
                                            @error('files.' . $index . '.name_of_file')
                                                <div class="text-sm transition transform alert alert-danger"
                                                    x-data 
                                                    x-init="
                                                        document.getElementById('files_{{$index}}_name_of_file_container').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                        document.getElementById('files_{{$index}}_name_of_file').focus();
                                                    ">
                                                    <span class="text-xs text-red-500">{{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    
                                        <div class="flex flex-col items-center col-span-1 space-y-3">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                Completed? <span class="text-red-600">*</span>
                                            </label>
                                        
                                            {{-- <!-- Toggle Button with Livewire Binding -->
                                            <label for="files_{{$index}}_completed" class="relative inline-flex items-center cursor-pointer">
                                                <input type="checkbox" id="files_{{$index}}_completed" wire:model="files.{{$index}}.completed" class="sr-only">
                                                <div class="w-9 h-5 bg-gray-200 rounded-full transition-all duration-200 peer-focus:ring-2 peer-focus:ring-customRed peer-checked:bg-customRed">
                                                    <span class="absolute w-4 h-4 bg-white rounded-full transition-transform duration-200 transform peer-checked:translate-x-5 translate-x-0.5"></span>
                                                </div>
                                            </label> --}}
                                            <div class="items-center">
                                                <label for="files_{{$index}}_completed" class="inline-flex items-center cursor-pointer">
                                                    <input type="checkbox" id="files_{{$index}}_completed" wire:model="files.{{$index}}.completed" class="sr-only peer" checked>
                                                    <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                                </label>
                                            </div>
    
                                            @error('files.' . $index . '.completed')
                                                <div class="text-sm transition transform alert alert-danger"
                                                     x-data 
                                                     x-init="
                                                         document.getElementById('files_{{$index}}_completed').scrollIntoView({ behavior: 'smooth', block: 'center' });
                                                         document.getElementById('files_{{$index}}_completed').focus();
                                                     ">
                                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        
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
                        <div class="flex justify-center">
                            <button type="button" name="add" wire:click.prevent="addFile" class="flex items-center text-customRed hover:bg-customRed shadow border hover:text-white bg-navButton font-medium rounded-8px text-sm px-5 py-2.5 me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14Zm.75-10.25v2.5h2.5a.75.75 0 0 1 0 1.5h-2.5v2.5a.75.75 0 0 1-1.5 0v-2.5h-2.5a.75.75 0 0 1 0-1.5h2.5v-2.5a.75.75 0 0 1 1.5 0Z" clip-rule="evenodd" />
                                </svg>
                                Add File
                            </button>
                        </div>
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
                                    <h2  class="font-bold text-md text-customRed">Onboarding</h2>
                                    <hr class="border-t-2 border-gray-400">
                                    <div class="space-y-4">
                                            <h2  class="font-bold ml-2 text-customRed">Employment Information</h2>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 ml-2  gap-4 col-span-3 pb-4">
                                                <div class="w-full ">
                                                    <label for="start_of_employment"
                                                        class  ="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Start of Employment<span class="text-red-600">*</span></label>
                                                    <input type="date" name="start_of_employment" id="start_of_employment"  wire:model="start_of_employment"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                                                        ntd="" >
                                                    @error('current_position')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('current_position').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('current_position').focus();" >
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror

                                                </div>
                                                <div wire:ignore class="w-full relative">
                                                    <label for="permission" class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Permissions <span class="text-red-600">*</span></label>
                                                    <select name="permission[]" id="permission" wire:model="permission" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" multiple required>
                                                        <option disabled>Select Permissions</option>
                                                        <option value="1">Employee</option>
                                                        <option value="2">Supervisor</option>
                                                        <option value="3">President</option>
                                                        <option value="4">Employees Information Table (HR)</option>
                                                        <option value="5">Daily Time Record (HR)</option>
                                                        <option value="6">Announcements (HR)</option>
                                                        <option value="7">Approve Leave Requests (HR)</option>
                                                        <option value="8">Approve HR Tickets (Employee)</option>
                                                        <option value="9">Approve HR Tickets (HR)</option>     
                                                        <option value="10">Internal Control (HR)</option>
                                                        <option value="11">Operations (HR)</option>
                                                        <option value="12">Internal Tickets-HR (HR)</option>
                                                        <option value="13">Internal Tickets-Office Admin (HR)</option>
                                                        <option value="14">Internal Tickets-Procurement (HR)</option>
                                                        <option value="15">Approve Update Information (HR)</option>
                                                        <option value="16">Accounting</option>
                                                        <option value="17">IT Tickets</option>
                                                    </select>
                                                    @error('permission')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('permission').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('permission').focus();">
                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                <script>
                                                    $(document).ready(function() {
                                                        $('.step-7-inputs').select2({
                                                            placeholder: 'Select Permissions',
                                                            closeOnSelect: false,
                                                            dropdownAutoWidth: true, // Ensures dropdown uses available width
                                                            width: '100%'            // Match Select2 to container width
                                                        }).on('select2:open', function() {
                                                            // Adjust dropdown styling when open
                                                            $('.select2-dropdown').addClass('bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5');
                                                        }).on('change', function() {
                                                            let data = $(this).val();
                                                            @this.set('permission', data);  // Bind selected roles to Livewire model
                                                        });
                                                
                                                        // Additional styling for the Select2 container
                                                        $('.select2-container--default .select2-selection--multiple').css({
                                                            "background-color": "#F9FAFB",   // Tailwind's bg-gray-50
                                                            "border": "1px solid #D1D5DB",   // Tailwind's border-gray-300
                                                            "border-radius": "0.5rem",       // Tailwind's rounded-lg
                                                            "padding": "0.625rem",           // Matches padding of p-2.5
                                                            "min-height": "42px",            // Ensures consistent min-height
                                                            "max-height": "150px",           // Optional max-height to prevent large dropdowns
                                                            "overflow-y": auto,
                                                        });
                                                    });
                                                </script>
                                            </div>
                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-3 ml-2 gap-4 col-span-3 ">
                                                <div class="w-full" id="department">
                                                    <label for="company"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Company Name <span class="text-red-600">*</span></label>
                                                    <select id="department" name="department" wire:model.live="department"
                                                        class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                                        class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                                    <select id="employee_type" name="employee_type" wire:model.live="employee_type"
                                                        class="-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                                                        <option selected>Select</option>
                                                        <option value="INDEPENDENT CONTRACTOR">Independent Contractor</option>
                                                        <option value="INTERN">Intern</option>
                                                        <option value="PROBATIONARY">Probationary</option>
                                                        <option value="PROJECT BASED">Project Based</option>
                                                        <option value="REGULAR">Regular</option>
                                                        <option value="RELIEVER">Reliever</option>                                                     
                                                    </select>
                                                    @error('employee_type')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('employee_type').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employee_type').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        <hr class="border-t-2 border-gray-400">

                                        <h2  class="font-bold ml-2 text-customRed">Leave Credits</h2>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 ml-2 gap-4 col-span-3">
                                            <div id="vacation_credits_container" class="w-full ">
                                                <label for="vacation_credits"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">Vacation Credits <span class="text-red-600">*</span></label>
                                                <input type="number" name="vacation_credits" step="any" id="vacation_credits"  wire:model="vacation_credits"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" >
                                                    @error('vacation_credits')
                                                    <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('vacation_credits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('vacation_credits_container').focus();" >
                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div id="sick_credits_container" class="w-full ">
                                                <label for="sick_credits"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Sick Credits<span class="text-red-600">*</span></label>
                                                <input type="number" name="sick_credits" step="any" id="sick_credits" wire:model="sick_credits"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    ntd="" >
                                                    @error('sick_credits')
                                                    <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('sick_credits_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sick_credits_container').focus();" >
                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <hr class="border-t-2 border-gray-400">
                                        <h2  class="font-bold ml-2 text-customRed">Other Information</h2>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-4 ml-2 gap-4 col-span-3">
                                                <div class="w-full ">
                                                    <label for="sss_num"
                                                        class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap">SSS Number <span class="text-red-600">*</span></label>
                                                    <input type="text" name="sss_num" id="sss_num"  wire:model="sss_num"
                                                        class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                        ntd="" >
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
                                                        ntd="" >
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
                                                        ntd="" >
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
                                                        ntd="" >
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
                                                        ntd="" >
                                                        @error('employee_id')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('employee_id').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('employee_id').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                                <div class="flex items-center w-full mt-2 min-[902px]:mt-6">
                                                    <label class="inline-flex items-center cursor-pointer">
                                                        <input type="checkbox" wire:model="active" class="sr-only peer" checked>
                                                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-red-600"></div>
                                                        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active?</span>
                                                    </label>
                                                </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
</div>

                </div>
                <div x-data="{ showModal: false }">
    <!-- Submit Button -->
    <button @click="showModal = true" type="button" class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-customRed shadow hover:bg-customRed hover:text-white bg-navButton rounded-8px">Submit</button>

    <!-- Confirmation Modal -->
    <div x-cloak x-show="showModal" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-800 bg-opacity-75">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-lg font-semibold text-gray-700">Confirm Submission</h2>
            <p class="mt-4 text-gray-600">Are you sure you want to submit the changes?</p>
            <div class="mt-6 flex justify-end">
                <button @click="showModal = false" type="button" class="px-4 py-2 mr-2 text-sm font-medium text-gray-600 bg-gray-200 rounded-lg hover:bg-gray-300">Cancel</button>
                <button @click="showModal = false; $wire.submit()" type="button" class="px-4 py-2 text-sm font-medium text-white bg-customRed rounded-lg hover:bg-red-600">Confirm</button>
            </div>
        </div>
    </div>
    
    <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }"
        @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Information Updated'; openConfirmation = false; openCrudModal = false; setTimeout(() => showToast = false, 5000)"
        @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; openConfirmation = false; openCrudModal = false; setTimeout(() => showToast = false, 5000)">
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

                <!-- Loading screen -->
                <div wire:loading wire:target="submit" class="load-over">
                    <div wire:loading wire:target="submit" class="loading-overlay">
                        <div class="flex flex-col justify-center items-center">
                            <div class="spinner"></div>
                            <p>Updating...</p>
                        </div>

                    </div>
                    </form>

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

    document.addEventListener('livewire:init', function () {
        Livewire.on('trigger-reroute', () => {
            // Optional: Show a success message or animation here
            setTimeout(() => {
                window.location.href = "{{ route('HumanResourceDashboard') }}";
            }, 3000); // Delay for 2000ms (2 seconds)
        });

    });

    </script>
</div>
