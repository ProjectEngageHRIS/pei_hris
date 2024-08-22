<div class="flex flex-col space-y-6">
    <div wire:ignore class="flex flex-col items-stretch gap-4 md:flex-row justify-stretch md:justify-center">
        <!-- Employee Type -->
        <div class="p-4  bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">
            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Employee Type</h5>
                    </div>
                </div>
            </div>
            <!-- Employee Type Chart -->
            <div class="py-6 w-full" id="pie-chart-1"></div>
        </div>
        <!-- Deparment -->
        <div class="p-4 bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">
            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Department</h5>
                    </div>
                </div>
            </div>
            <!-- Department Chart -->
            <div class="py-6" id="pie-chart-2"></div>
        </div>

        <!-- Company -->
        <div class="p-4 bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">

            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Company</h5>
                    </div>
                </div>
            </div>
            <!-- Company Chart -->
            <div class="py-6" id="pie-chart-3"></div>
        </div>

        <!-- Gender -->
        <div class="p-4 bg-white rounded-lg shadow md:w-full md:max-w-sm md:p-6">

            <div class="flex items-start justify-between w-full">
                <div class="flex-col items-center">
                    <div class="flex items-center mb-1">
                        <h5 class="text-sm font-medium leading-none text-customGray1 me-1">Headcount by Gender</h5>
                    </div>
                </div>
            </div>
            <!-- Company Chart -->
            <div class="py-6" id="pie-chart-4"></div>
        </div>
    </div>
    <!-- Employee Table -->
    <div class="relative shadow-md" x-data="{ showModal: false }">
    <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg">
        <!-- Add user button -->
        <button @click="showModal = true; startModal(1)" class="text-nowrap inline-flex items-center text-customRed bg-navButton shadow hover:bg-customRed hover:text-white font-medium rounded-lg text-sm px-3 py-1.5">
            Add employee
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 ml-1">
                <path d="M8.5 4.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 13c.552 0 1.01-.452.9-.994a5.002 5.002 0 0 0-9.802 0c-.109.542.35.994.902.994h8ZM12.5 3.5a.75.75 0 0 1 .75.75v1h1a.75.75 0 0 1 0 1.5h-1v1a.75.75 0 0 1-1.5 0v-1h-1a.75.75 0 0 1 0-1.5h1v-1a.75.75 0 0 1 .75-.75Z"/>
            </svg>
        </button>

    <!-- Main modal -->
    <div x-show="showModal"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-ref="show-modal"
         class="fixed inset-0 z-50 flex justify-center items-center w-full h-full">

        <!-- Black shadow backdrop -->
        <!-- The backdrop remains visible but does not close the modal when clicked -->
        <div class="fixed inset-0 bg-black opacity-50"></div>

        <!-- Modal content -->
        <!-- The @click.stop directive prevents clicks inside the modal from propagating to the backdrop -->
        <div class="relative bg-white rounded-lg shadow w-full max-w-md p-4" @click.stop>
            <!-- Modal header -->
            <div class="flex items-center justify-between py-4 border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    Add new account
                </h3>
                <!-- Close button -->
                <button type="button" @click="showModal = false" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

                    <!-- Stepper -->
                    <ol class="flex items-center justify-center w-full p-4">
                        <li class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="done-step size-5 text-white bg-customRed rounded-full border-2 border-customRed flex items-center justify-center">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 1 </div>
                            <div class="w-10 h-1 step-indicator"> </div>
                        </li>
                        <li class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="done-step size-5 text-white bg-customRed rounded-full border-2 border-customRed flex items-center justify-center">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 2 </div>
                            <div class="w-10 h-1 step-indicator"> </div>
                        </li>
                        <li class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="done-step size-5 text-white bg-customRed rounded-full border-2 border-customRed flex items-center justify-center">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 3 </div>
                            <div class="w-10 h-1 step-indicator"> </div>
                        </li>
                        <li class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="done-step size-5 text-white bg-customRed rounded-full border-2 border-customRed flex items-center justify-center">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 4 </div>
                            <div class="w-10 h-1 step-indicator"> </div>
                        </li>
                        <li class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="done-step size-5 text-white bg-customRed rounded-full border-2 border-customRed flex items-center justify-center">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 5 </div>
                            <div class="w-10 h-1 step-indicator"> </div>
                        </li>
                        <li class="flex flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="done-step size-5 text-white bg-customRed rounded-full border-2 border-customRed flex items-center justify-center">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 6 </div>
                            <div class="w-10 h-1 step-indicator"> </div>
                        </li>
                        <li class="">
                            <div class="number-step size-5 rounded-full border-2 border-customRed flex items-center justify-center text-xs"> 7 </div>
                        </li>
                    </ol>
                    <!-- Modal body -->
                    <form wire:submit.prevent="submit" method="POST">

                        @csrf
                        <!-- Personal Information-->
                        <div id="step-1" class="step mb-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="font-semibold text-md text-customGray1">Personal Information</h2>
                                <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-1-inputs')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <div class="gap-2 flex flex-col">
                                    <label for="first_name" class="block text-sm font-medium text-customGray1">First Name <span class="text-red-600">*</span></label>
                                    <input type="first_name" name="first_name" id="first_name" wire:model="first_name" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter First Name" required>
                                    @error('first_name')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('mode_of_application_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('').focus();" >
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="middle_name" class="block text-sm font-medium text-customGray1">Middle Name</label>
                                    <input type="text" name="middle_name" id="middle_name" wire:model="middle_name" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Middle Name">
                                    @error('middle_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="last_name" class="block text-sm font-medium text-customGray1">Last Name <span class="text-red-600">*</span></label>
                                    <input type="text" name="last_name" id="last_name" wire:model="last_name" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Last Name"required>
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="nickname" class="block text-sm font-medium text-customGray1">Nickname <span class="text-red-600">*</span></label>
                                    <input type="text" name="nickname" id="nickname" wire:model="nickname" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Nickname"required>
                                    @error('nickname') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="gender" class="block text-sm font-medium text-customGray1">Gender <span class="text-red-600">*</span></label>
                                    <select name="gender" id="gender" wire:model="gender" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        <option selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                    </select>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="birth_date" class="block text-sm font-medium text-customGray1">Birth Date <span class="text-red-600">*</span></label>
                                    <input type="date" name="birth_date" id="birth_date" wire:model="birth_date" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="birth_place" class="block text-sm font-medium text-customGray1">Birth Place <span class="text-red-600">*</span></label>
                                    <input type="text" name="birth_place" id="birth_place" wire:model="birth_place" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                    @error('birth_place') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="age" class="block text-sm font-medium text-customGray1">Age <span class="text-red-600">*</span></label>
                                    <input type="number" name="age" id="age" wire:model="age" min="0" max="122" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Age"required>
                                    @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Other Information -->
                        <div id="step-2" class="hidden step mb-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="font-semibold text-md text-customGray1">Other Information</h2>
                                <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-2-inputs')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <div class="gap-2 flex flex-col">
                                    <label for="height" class="block text-sm font-medium text-customGray1">Height (in cm) <span class="text-red-600">*</span></label>
                                    <input type="number" step="0.01" min="50" max="300" name="height" id="height" wire:model="height" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Height"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="weight" class="block text-sm font-medium text-customGray1">Weight (in kg) <span class="text-red-600">*</span></label>
                                    <input type="number" step="0.01" min="0" max="700" name="weight" id="weight" wire:model="weight" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Weight"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="civil_status" class="block text-sm font-medium text-customGray1">Civil Status <span class="text-red-600">*</span></label>
                                    <select name="civil_status" id="civil_status" wire:model="civil_status" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        <option selected>Select Civil Status</option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Separated or Divorced">Separated or Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="religion" class="block text-sm font-medium text-customGray1">Religion</label>
                                    <input type="text" name="religion" id="religion" wire:model="religion" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Religion">
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="home_address" class="block text-sm font-medium text-customGray1">Home Address <span class="text-red-600">*</span></label>
                                    <input type="text" name="home_address" id="home_address" wire:model="home_address" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Home Address"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="provincial_address" class="block text-sm font-medium text-customGray1">Provincial Address <span class="text-red-600">*</span></label>
                                    <input type="text" name="provincial_address" id="provincial_address" wire:model="provincial_address" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Provincial Address"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="phone_number" class="block text-sm font-medium text-customGray1">Cellphone Number <span class="text-red-600">*</span></label>
                                    <input type="tel" pattern="09[0-9]{9}" name="phone_number" id="phone_number" wire:model="phone_number" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Cellphone Number"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="employee_email" class="block text-sm font-medium text-customGray1">Employee Email Address <span class="text-red-600">*</span></label>
                                    <input type="email" name="employee_email" id="employee_email" wire:model="employee_email" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Employee's Email Address"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="personal_email" class="block text-sm font-medium text-customGray1">Personal Email Address </label>
                                    <input type="email" name="personal_email" id="personal_email" wire:model="personal_email" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Personal Email Address"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="sss_num" class="block text-sm font-medium text-customGray1">SSS Number <span class="text-red-600">*</span></label>
                                    <input type="text" name="sss_num" id="sss_num" wire:model="sss_num"  class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter SSS Number"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="tin_num" class="block text-sm font-medium text-customGray1">TIN Number <span class="text-red-600">*</span></label>
                                    <input type="text" name="tin_num" id="tin_num" wire:model="tin_num" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter TIN Number"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="phic_num" class="block text-sm font-medium text-customGray1">PHIC Number <span class="text-red-600">*</span></label>
                                    <input type="text" name="phic_num" id="phic_num" wire:model="phic_num" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter PHIC Number"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="hdmf_num" class="block text-sm font-medium text-customGray1">HDMF Number <span class="text-red-600">*</span></label>
                                    <input type="text" name="hdmf_num" id="hdmf_num" wire:model="hdmf_num" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter HDMF Number"required>
                                </div>
                                <hr class="my-4 border-gray-300">
                                <div class="gap-2 flex flex-col" x-data="govtNamesForm()">
                                    <div class="flex flex-row justify-between">
                                        <p class="font-semibold text-md text-customGray1">Government Examination</p>
                                        <div class="flex flex-row gap-2">
                                            <button class="text-customGray1 hover:text-customRed" @click="addGovt">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button class="text-customGray1 hover:text-customRed" @click="resetInputs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <template x-for="(govt, index) in govts" :key="index">
                                        <div class="gap-2 flex flex-col">
                                            <div class="flex flex-row justify-between">
                                                <p class="text-sm font-semibold"> No. <span x-text="index+1"></span></p>
                                                <button class="text-customGray1 hover:text-customRed pr-2" @click="removeGovt(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                        <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="gap-2 flex flex-col">
                                                <label :for="'govt-exam' + index" class="block text-sm font-medium text-customGray1">Government Exam Name</label>
                                                <input type="text" :name="'govt-exam' + index" :id="'govt-exam' + index" x-model="govt.name"  @input="$wire.set('govt_professional_exam_taken.exam_name' + index, govt.name)" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Government Exam Name">
                                            </div>
                                            <div class="gap-2 flex flex-col">
                                                <label :for="'govt-rating' + index" class="block text-sm font-medium text-customGray1">Government Exam Rating</label>
                                                <input type="number" wire:model="govt_profesional_exam_taken_rating" step="0.01" min="0" max="100" :name="'govt-rating' + index" :id="'govt-rating' + index" x-model="govt.rating" @input="$wire.set('govt_professional_exam_taken.exam_rating' + index, govt.rating)" class="step-2-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Exam Rating">
                                            </div>
                                            <hr x-show="index < govts.length-1" class="my-4 border-gray-300">
                                        </div>
                                    </template>
                                </div>
                                <hr class="my-4 border-gray-300">
                                <div class="gap-2 flex flex-col" x-data="trainingsNamesForm()">
                                    <div class="flex flex-row justify-between">
                                        <p class="font-semibold text-md text-customGray1">Trainings</p>
                                        <div class="flex flex-row gap-2">
                                            <button class="text-customGray1 hover:text-customRed" @click="addTraining">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button class="text-customGray1 hover:text-customRed" @click="resetInputs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <template x-for="(training, index) in trainings" :key="index">
                                        <div class="gap-2 flex flex-col">
                                            <div class="flex flex-row justify-between">
                                                <label :for="'training' + index" class="block text-sm font-medium text-customGray1">Training/Seminar <span x-text="index+1"></span></label>
                                                <button class="text-customGray1 hover:text-customRed pr-2" @click="removeTraining(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                        <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <input type="text" :name="'training' + index" :id="'training' + index" x-model="training.name" @input="$wire.set('trainings_seminars.training_name' + index, training.name)" class="step-3-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Training/Seminar's Title or Name">
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <!-- Family Background -->
                        <div id="step-3" class="hidden step mb-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="font-semibold text-md text-customGray1">Family Background</h2>
                                <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-3-inputs')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <div class="gap-2 flex flex-col">
                                    <label for="name_of_father" class="block text-sm font-medium text-customGray1">Name of Father</label>
                                    <input type="text" name="name_of_father" id="name_of_father" wire:model="name_of_father" class="step-3-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name of Father">
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="name_of_mother" class="block text-sm font-medium text-customGray1">Name of Mother</label>
                                    <input type="text" name="name_of_mother" id="name_of_mother" wire:model="name_of_mother" class="step-3-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name of Mother">
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="spouse" class="block text-sm font-medium text-customGray1">Name of Spouse</label>
                                    <input type="text" name="spouse" id="spouse" wire:model="spouse" class="step-3-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name of Spouse" @if($civil_status === 'Single') disabled @endif>
                                    @error('spouse') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>

                                <div class="gap-2 flex flex-col" x-data="childrenNamesForm()">
                                    <div class="flex flex-row justify-between">
                                        <p class="font-semibold text-md text-customGray1">Children</p>
                                        <div class="flex flex-row gap-2">
                                            <button class="text-customGray1 hover:text-customRed" @click="addChild">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </button>
                                            <button class="text-customGray1 hover:text-customRed" @click="resetInputs">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <template x-for="(child, index) in children" :key="index">
                                        <div class="gap-2 flex flex-col" wire:ignore>
                                            <div class="flex flex-row justify-between">
                                                <label :for="'child-name' + index" class="block text-sm font-medium text-customGray1">Name of Child <span x-text="index+1"></span></label>
                                                <button class="text-customGray1 hover:text-customRed pr-2" @click="removeChild(index)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                        <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <input type="text" :name="'child-name' + child.id" :id="'child-name' + child.id" x-model="child.name" @input="$wire.set('names_of_children.' + index, child.name)" class="step-3-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name of Child">
                                            </div>
                                            @error('names_of_children') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </template>
                                </div>
                            </div>
                        </div>
                        <!-- Emergency Contact -->
                        <div id="step-4" class="hidden step mb-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="font-semibold text-md text-customGray1">Emergency Contact</h2>
                                <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-4-inputs')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <div class="gap-2 flex flex-col">
                                    <label for="name" class="block text-sm font-medium text-customGray1">Name <span class="text-red-600">*</span></label>
                                    <input type="text" name="name" id="name" wire:model="emergency_contact.contact_person" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Name"required>
                                </div>

                                <div class="gap-2 flex flex-col">
                                    <label for="rel" class="block text-sm font-medium text-customGray1">Relationship <span class="text-red-600">*</span></label>
                                    <input type="text" name="rel" id="rel" wire:model="emergency_contact.relationship" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Relationship"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="emergency_contact" class="block text-sm font-medium text-customGray1">Home Address <span class="text-red-600">*</span></label>
                                    <input type="text" name="address" id="address" wire:model="emergency_contact.address" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Home Address"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="emergency_contact" wire:model="emergency_contact" class="block text-sm font-medium text-customGray1">Cellphone Number <span class="text-red-600">*</span></label>
                                    <input type="number" name="emergency_contact" id="emergency_contact_number"  wire:model="emergency_contact.cellphone_number" class="step-4-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Cellphone Number"required>
                                </div>
                            </div>
                        </div>
                        <!-- Work History -->
                        <div id="step-5" class="hidden step mb-4" x-data="workHistoryForm()">
                            <div class="flex flex-row justify-between">
                                <p class="font-semibold text-md text-customGray1">Work History</p>
                                <div class="flex flex-row gap-4">
                                    <button class="text-customGray1 hover:text-customRed" @click="addWork">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                    <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-5-inputs')" @click="resetInputs">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <template x-for="(work, index) in works" :key="index">
                                    <div class="gap-2 flex flex-col">
                                        <div class="flex flex-row justify-between">
                                            <p class="text-sm font-semibold"> No. <span x-text="index+1"></span></p>
                                            <button class="text-customGray1 hover:text-customRed pr-2" @click="removeWork(index)">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                                    <path strokeLinecap="round" strokeLinejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="gap-2 flex flex-col">
                                            <label class="block text-sm font-medium text-customGray1" for="company">
                                                Company Name <span class="text-red-600">*</span>
                                            </label>
                                            <input x-model="work.company" @input="$wire.set('employee_history.name_of_company' + index, work.company)" class="step-5-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" id="company" type="text" placeholder="Company Name" required>
                                        </div>
                                        <div class="gap-2 flex flex-col">
                                            <label class="block text-sm font-medium text-customGray1" for="position">
                                                Position <span class="text-red-600">*</span>
                                            </label>
                                            <input x-model="work.position" @input="$wire.set('employee_history.prev_position' + index, work.position)" class="step-5-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" id="position" type="text" placeholder="Position" required>
                                        </div>
                                        <div class="gap-2 flex flex-col">
                                            <label class="block text-sm font-medium text-customGray1" for="start_date">
                                                Start Date <span class="text-red-600">*</span>
                                            </label>
                                            <input x-model="work.start_date" @input="$wire.set('employee_history.start_date' + index, work.start_date)" class="step-5-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" id="start_date" type="date" required>
                                        </div>
                                        <div class="gap-2 flex flex-col">
                                            <label class="block text-sm font-medium text-customGray1" for="end_date">
                                                End Date <span class="text-red-600">*</span>
                                            </label>
                                            <input x-model="work.end_date" @input="$wire.set('employee_history.end_date' + index, work.end_date)" class="step-5-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" id="end_date" type="date" required>
                                        </div>
                                        <hr x-show="index < works.length-1" class="my-4 border-gray-300">
                                    </div>
                                </template>
                            </div>
                        </div>
                        <!-- Onboarding -->
                        <div id="step-6" class="hidden step mb-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="font-semibold text-md text-customGray1">Education History</h2>
                                <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-6-inputs')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <p class="text-sm font-semibold text-customGray1">College</p>
                                <div class="gap-2 flex flex-col">
                                    <label for="college_school" class="block text-sm font-medium text-customGray1">School <span class="text-red-600">*</span></label>
                                    <input type="text" name="college_school" id="college_school" wire:model="college_school" class="step-6-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Previous School"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="college_course" class="block text-sm font-medium text-customGray1">College Course <span class="text-red-600">*</span></label>
                                    <input type="text" name="college_course" id="college_course" wire:model="college_course" class="step-6-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="college_date_graduated" class="block text-sm font-medium text-customGray1">End Date <span class="text-red-600">*</span></label>
                                    <input type="date" name="college_date_graduated" id="college_date_graduated" wire:model="college_date_graduated" class="step-6-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                </div>
                                <hr class="my-4 border-gray-300">
                                <p class="text-sm font-semibold text-customGray1">High School</p>
                                <div class="gap-2 flex flex-col">
                                    <label for="high_school_school" class="block text-sm font-medium text-customGray1">School <span class="text-red-600">*</span></label>
                                    <input type="text" name="high_school_school" id="high_school_school" wire:model="high_school_school" class="step-6-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Previous School"required>
                                </div>

                                <div class="gap-2 flex flex-col">
                                    <label for="high_school_date_graduated" class="block text-sm font-medium text-customGray1">End Date <span class="text-red-600">*</span></label>
                                    <input type="date" name="high_school_date_graduated-hs" id="high_school_date_graduated" wire:model="high_school_date_graduated" class="step-6-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                </div>
                            </div>
                        </div>
                        <!-- Company details -->
                        <div id="step-7" class="hidden step mb-4">
                            <div class="flex flex-row justify-between">
                                <h2 class="font-semibold text-md text-customGray1">Onboarding</h2>
                                <button class="text-customGray1 hover:text-customRed" onclick="resetInputs('.step-7-inputs')">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="size-4">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                </button>
                            </div>
                            <hr class="my-4 border-gray-300">
                            <div class="overflow-y-scroll h-[310px] p-2 pb-4 gap-2 flex flex-col">
                                <div class="gap-2 flex flex-col">
                                    <label for="start_of_employment" class="block text-sm font-medium text-customGray1">Start of Employment <span class="text-red-600">*</span></label>
                                    <input type="date" name="start_of_employment" id="start_of_employment" wire:model="start_of_employment" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Start of Employment"required>
                                </div>

                                <div class="gap-2 flex flex-col">
                                    <label for="inside_department" class="block text-sm font-medium text-customGray1">Department <span class="text-red-600">*</span></label>
                                    <select name="inside_department" id="inside_department" wire:model="inside_department" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        <option selected>Select Department</option>
                                        <option value="HR and Admin">HR and Admin</option>
                                        <option value="Recruitment">Recruitment</option>
                                        <option value="CXS">CXS</option>
                                        <option value="Overseas Recruitment">Overseas Recruitment</option>
                                        <option value="PEI/SL Temps DO-174">PEI-SL Temps DO-74</option>
                                        <option value="Corporate Accounting and Finance">Corporate Accounting and Finance</option>
                                        <option value="Accounting Operations">Accounting Operations</option>
                                    </select>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="employee_type" class="block text-sm font-medium text-customGray1">Employee Type <span class="text-red-600">*</span></label>
                                    <select name="employee_type" id="employee_type" wire:model="employee_type" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        <option selected>Select Employee Type</option>
                                        <option value="Internals">Internals</option>
                                        <option value="OJT">OJT</option>
                                        <option value="PEI-CCS">PEI-CCS</option>
                                        <option value="RAPID">Rapid</option>
                                        <option value="RAPID MOBILITY">Rapid Mobility</option>
                                        <option value="UPSKILLS">Upskills</option>
                                    </select>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="company" class="block text-sm font-medium text-customGray1">Company <span class="text-red-600">*</span></label>
                                    <select name="company" id="company" wire:model="department" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        <option selected>Select Company</option>
                                        <option value="PEI">PEI</option>
                                        <option value="SL Search">SL Search</option>
                                        <option value="SL Temps">SL Temps</option>
                                        <option value="WESEARCH">WESEARCH</optaion>
                                        <option value="PEI-Upskills">PEI-Upskills</option>
                                    </select>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="current_position" class="block text-sm font-medium text-customGray1">Current Position <span class="text-red-600">*</span></label>
                                    <input type="text" name="current_position" id="current_position" wire:model="current_position" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Position"required>
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="role_id" class="block text-sm font-medium text-customGray1">Roles <span class="text-red-600">*</span></label>
                                    <select name="role_id" id="role_id" wire:model="role_id" class="step-7-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
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
                                </div>
                                <div class="gap-2 flex flex-col">
                                    <label for="employee_id" class="block text-sm font-medium text-customGray1">Employee ID</label>
                                    <input type="text" name="employee_id" id="employee_id" wire:model="employee_id" class="step-1-inputs bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Example: SLE00021">
                                </div>
                                <div class="flex flex-row w-full relative">
                                    <div class="flex flex-col w-full">
                                        <label for="password" class="block text-sm font-medium text-customGray1">Password <span class="text-red-600">*</span></label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="step-7-inputs w-full bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block py-2.5 pl-2.5 pr-8" required>
                                    </div>
                                    <button class="absolute right-2 bottom-[13px] size-4 text-customGray1 hover:text-customRed" onclick="togglePassword()">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="size-4" id="eyeopen">
                                            <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z" />
                                            <path fillRule="evenodd" d="M1.38 8.28a.87.87 0 0 1 0-.566 7.003 7.003 0 0 1 13.238.006.87.87 0 0 1 0 .566A7.003 7.003 0 0 1 1.379 8.28ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" clipRule="evenodd" />
                                        </svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4" id="eyeclose">
                                            <path d="M3.53 2.47a.75.75 0 0 0-1.06 1.06l18 18a.75.75 0 1 0 1.06-1.06l-18-18ZM22.676 12.553a11.249 11.249 0 0 1-2.631 4.31l-3.099-3.099a5.25 5.25 0 0 0-6.71-6.71L7.759 4.577a11.217 11.217 0 0 1 4.242-.827c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113Z" />
                                            <path d="M15.75 12c0 .18-.013.357-.037.53l-4.244-4.243A3.75 3.75 0 0 1 15.75 12ZM12.53 15.713l-4.243-4.244a3.75 3.75 0 0 0 4.244 4.243Z" />
                                            <path d="M6.75 12c0-.619.107-1.213.304-1.764l-3.1-3.1a11.25 11.25 0 0 0-2.63 4.31c-.12.362-.12.752 0 1.114 1.489 4.467 5.704 7.69 10.675 7.69 1.5 0 2.933-.294 4.242-.827l-2.477-2.477A5.25 5.25 0 0 1 6.75 12Z" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="items-center">
    <label class="inline-flex items-center cursor-pointer">
        <input type="checkbox" wire:model="active" class="sr-only peer">
        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Active?</span>
    </label>

</div>
                            </div>
                        </div>
                        <!-- Stepper buttons -->
                        <div class="grid grid-cols-2 my-2">
        <button type="button" id="prevBtn" class="justify-self-start col-start-1 col-span-1 text-gray-700 hover:text-white hover:bg-gray-400 font-medium text-sm px-5 py-2.5 rounded-lg bg-gray-200"  onclick="changeStep(-1)" wire:click="moveToPreviousStep">Previous</button>

        <button type="button" id="nextBtn" class="justify-self-end col-start-2 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium text-sm px-5 py-2.5 rounded-lg" onclick="changeStep(1)">Next</button>

{{-- <div x-data="{ openConfirmation: @entangle('showConfirmation') }"> --}}
        <button wire:click="submit()" type="submit" id="createBtn" class="justify-self-end col-start-3 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium text-sm px-5 py-2.5 rounded-lg">Create Account</button>

    <!-- Confirmation Modal -->
    {{-- <div x-show="openConfirmation" x-ref="confirmModal" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
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
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-amber-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Account Created</h3>
                    <h3 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-400">Your Employee ID is : {{ $employee_id }} </h3>
                    <h4 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-400">Your Password is :  {{ $password }} </h4>
                <button type="button" @click="openConfirmation = false; window.location.href = '{{ route('HumanResourceDashboard') }}'" class="text-white bg-amber-600 hover:bg-amber-800 dark:focus:ring-amber-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Confirm
                </button>
                </div>
            </div>
        </div>
    </div> --}}


{{-- </div> --}}

    </div>
                <script>
                        function handleNextStep() {
                            // Call the JavaScript function to change the step
                            changeStep(1);

                            // Call the Livewire action to move to the next step
                            Livewire.emit('moveToNextStep');
                        }
                </script>
    </form>
                </div>
            </div>
            {{-- Search bar  --}}
            <div class="flex flex-row pr-2">
                  <label for="table-search" class="sr-only">Search</l`abel>
                  <div class="relative">
                      <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                          <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                          </svg>
                      </div>
                      <input type="text" id="table-search-users" wire:model.live="search" class="block text-sm text-gray-900 border border-gray-300 shadow-inner rounded-8px ps-10 pe-10 max-w-80 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
                  </div>
                  <!-- Filter Sidebar -->
                  <div class="absolute rounded-lg right-8 hover:text-customRed">
                      <div x-data="{
                          filterOpen: false,
                          employeeTypeOpen: false,
                          departmentOpen: false,
                          companyOpen: false,
                          genderOpen: false,
                          employeeTypeCount: 0,
                          departmentCount: 0,
                          companyCount: 0,
                          genderCount: 0,
                          updateEmployeeTypeCount() {
                              this.employeeTypeCount = document.querySelectorAll('.employeeTypeOpen .filter-checkbox:checked').length;
                          },
                          updateDepartmentCount() {
                              this.departmentCount = document.querySelectorAll('.departmentOpen .filter-checkbox:checked').length;
                          },
                          updateCompanyCount() {
                              this.companyCount = document.querySelectorAll('.companyOpen .filter-checkbox:checked').length;
                          },
                          updateGenderCount() {
                              this.genderCount = document.querySelectorAll('.genderOpen .filter-checkbox:checked').length;
                          },
                          clearAllFilters() {
                              document.querySelectorAll('.filter-checkbox').forEach(checkbox => checkbox.checked = false);
                              this.employeeTypeCount = 0;
                              this.departmentCount = 0;
                              this.companyCount = 0;
                              this.genderCount = 0;
                          }
                          }" class="relative">

                          <!-- Filter Icon Button -->
                          <button @click="filterOpen = !filterOpen" class="flex items-center justify-center w-10 h-10 right-1">
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-3 text-customGray hover:text-customRed">
                                  <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                              </svg>
                          </button>
                          <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 w-64 mt-2 space-y-2 bg-white border rounded shadow-lg right-1">
                              <!-- Clear All Button -->
                              <div class="px-4 py-2">
                                  <button wire:click="clearAllFilters" @click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-customRed hover:text-red-900">
                                      Clear All
                                  </button>
                              </div>
                              <!-- Employee Type Dropdown Button -->
                              <div class="px-2">
                                  <button @click="employeeTypeOpen = !employeeTypeOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                      Employee Type
                                      <span class="float-right">&#9662;</span>
                                      <span x-show="employeeTypeCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="employeeTypeCount"></span>
                                  </button>
                                  <div x-show="employeeTypeOpen" @click.away="employeeTypeOpen = false" class="w-full mt-2 space-y-2 employeeTypeOpen">
                                      <hr class="my-4 border-gray-300">
                                      {{-- @foreach($employeeTypesFilter as $type => $checked) --}}
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" wire:model.live="employeeTypesFilter.Internals"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Internals</label>
                                        </div>
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" wire:model.live="employeeTypesFilter.OJT" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">OJT</label>
                                        </div>
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" wire:model.live="employeeTypesFilter.PEI-CCS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">PEI-CCS</label>
                                        </div>
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" wire:model.live="employeeTypesFilter.RAPID" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Rapid</label>
                                        </div>
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" wire:model.live="employeeTypesFilter.RAPIDMOBILITY" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Rapid Mobility</label>
                                        </div>
                                        <div class="flex items-center px-4 py-2">
                                            <input type="checkbox" wire:model.live="employeeTypesFilter.UPSKILLS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateEmployeeTypeCount">
                                            <label class="ml-2 text-xs font-medium text-customGray1">Upskills</label>
                                        </div>
                                    {{-- @endforeach --}}
                                  </div>
                              </div>
                              <!-- Department Dropdown Button -->
                              <div class="px-2">
                                  <button @click="departmentOpen = !departmentOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                      Department
                                      <span class="float-right">&#9662;</span>
                                      <span x-show="departmentCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="departmentCount"></span>
                                  </button>
                                  <div x-show="departmentOpen" @click.away="departmentOpen = false" class="w-full mt-2 space-y-2 departmentOpen">
                                      <hr class="my-4 border-gray-300">
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.HR AND ADMIN" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">HR and Admin</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Recruitment" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">Recruitment</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.CXS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">CXS</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Overseas Recruitment" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">Overseas Recruitment</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.PEI/SL Temps DO-174" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">PEI/SL Temps DO-174</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Corporate Accounting and Finance" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">Corporate Accounting and Finance</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="insideDepartmentTypesFilter.Accounting Operations" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">Accounting Operations</label>
                                      </div>
                                  </div>
                              </div>
                              <!-- Company Dropdown Button -->
                              <div class="px-2">
                                  <button @click="companyOpen = !companyOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                      Company
                                      <span class="float-right">&#9662;</span>
                                      <span x-show="companyCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="companyCount"></span>
                                  </button>
                                  <div x-show="companyOpen" @click.away="companyOpen = false" class="w-full mt-2 space-y-2 companyOpen">
                                      <hr class="my-4 border-gray-300">
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="departmentTypesFilter.PEI" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">PEI</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="departmentTypesFilter.SL SEARCH"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">SL SEARCH</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="departmentTypesFilter.SL TEMPS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">SL TEMPS</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="departmentTypesFilter.WESEARCH" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">WESEARCH</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="departmentTypesFilter.PEI-UPSKILLS" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateCompanyCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">PEI-UPSKILLS</label>
                                      </div>
                                  </div>
                              </div>
                              <!-- Gender Dropdown Button -->
                              <div class="px-2 pb-2">
                                  <button @click="genderOpen = !genderOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                      Gender
                                      <span class="float-right">&#9662;</span>
                                      <span x-show="genderCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="genderCount"></span>
                                  </button>
                                  <div x-show="genderOpen" @click.away="genderOpen = false" class="w-full mt-2 space-y-2 genderOpen">
                                      <hr class="my-4 border-gray-300">
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="genderTypesFilter.Female" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateGenderCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">Female</label>
                                      </div>
                                      <div class="flex items-center px-4 py-2">
                                          <input type="checkbox" wire:model.live="genderTypesFilter.Male"  class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateGenderCount">
                                          <label class="ml-2 text-xs font-medium text-customGray1">Male</label>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class=" rounded-b-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr >
                        <th scope="col" class="px-6 py-3 text-center">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Department
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Company
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Position
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Joined Date
                        </th>
                        <th scope="col" class="px-6 py-3 " >
                            Action/s
                        </th>
                    </tr>
                </thead>
                <tbody class="pb-4">

                    @if ($EmployeeData->isEmpty())
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                                <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px">
                                    <div class="flex justify-center " style="padding-top: 40px">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mt-1 mr-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                        <p class="text-customRed text-xl font-semibold items-center"> Nothing to show</p>
                                    </div>
                                </th>
                            </tr>
                    @else
                        @php
                            $ctr = 0;
                            $pageIndex = ($EmployeeData->currentpage() - 1) * $EmployeeData->perpage() + $ctr;
                        @endphp
                        @foreach ($EmployeeData as $index => $employee)
                        @php
                            $ctr = $ctr + 1;
                        @endphp
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                {{-- <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td> --}}
                                <th scope="row" class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$pageIndex + $ctr}}
                                </th>
                                <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                                    @php
                                        $employee_image = $this->getImage($employee->emp_image ?? null);
                                    @endphp
                                    @if($employee_image)
                                            <img class="w-8 h-8 rounded-full" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="Profile Picture">
                                    @else
                                            <img class="w-8 h-8 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                                    @endif
                                    <div class="ps-3">
                                        <div class="text-base font-semibold">{{$employee->first_name}}  {{$employee->middle_name}} {{$employee->last_name}}</div>
                                        <div class="font-normal text-gray-500">{{$employee->employee_id}}</div>
                                    </div>
                                </th>
                                <td class="px-6 py-4 ">
                                    {{$employee->inside_department}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->department}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->current_position}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->employee_type}}
                                </td>
                                <td class="px-6 py-4  " >
                                    {{$employee->start_of_employment}}
                                </td>
                                <td x-data="{currentViewModal: null, openViewModal: false}" x-ref="view-modal" class="items-center py-4 text-center">
                                    <div class="flex items-center justify-center space-x-2" x-data="{ isOpen: false }">
                                        <!-- View Button -->
                                        <a @click="openViewModal = true; currentViewModal = '{{$loop->index}}' " class="inline-flex items-center px-4 py-2 text-sm font-medium text-yellow-400 cursor-pointer hover:text-yellow-600 ">
                                            View
                                        </a>
                                    </div>
                                        <!-- Modal Background -->
                                        <div x-show="openViewModal && currentViewModal == '{{ $loop->index }}'"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition ease-in duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0"
                                            tabindex="-1"
                                            aria-hidden="true"
                                            class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50">
                                        
                                        <!-- Modal Content -->
                                        <div x-show="openViewModal && currentViewModal == '{{ $loop->index }}'"
                                                x-transition:enter="transition ease-out duration-300"
                                                x-transition:enter-start="transform opacity-0 scale-90"
                                                x-transition:enter-end="transform opacity-100 scale-100"
                                                x-transition:leave="transition ease-in duration-200"
                                                x-transition:leave-start="transform opacity-100 scale-100"
                                                x-transition:leave-end="transform opacity-0 scale-90"
                                                class="relative w-full max-w-2xl max-h-full p-4 bg-white rounded-lg shadow">
                                            
                                            <!-- Modal Header -->
                                            <div class="flex items-center justify-between p-4 border-b rounded-t">
                                                <h3 class="text-xl font-semibold text-gray-900">
                                                    Employee Information
                                                </h3>
                                                <button @click="openViewModal = false"
                                                        class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            
                                            <!-- Modal Body -->
                                            <div class="flex p-4">
                                                <!-- Right Picture Area -->
                                                <div class="flex items-start justify-center mr-5 w-44">
                                                    @if($employee_image)
                                                        <img class="w-full h-auto border-4 border-gray-200 rounded-lg shadow-2xl" src="data:image/gif;base64,{{ base64_encode($employee_image) }}" alt="Profile Picture">
                                                    @else
                                                        <img class="w-full h-auto border-4 border-gray-200 rounded-lg shadow-2xl" src="{{ asset('assets/nophoto.png') }}" alt="No Picture Yet Image">
                                                    @endif
                                                </div>
                                                <!-- Left Content Area -->
                                                <div class="w-3/4 space-y-4">
                                                    <p class="flex items-center text-sm leading-relaxed text-customRed">
                                                        <span class="font-semibold">Employee Number:</span>
                                                        <span class="ml-2">{{$employee->employee_id}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Name:</span>
                                                        <span class="ml-2">{{$employee->first_name}} {{$employee->middle_name}} {{$employee->last_name}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Department:</span>
                                                        <span class="ml-2">{{$employee->inside_department}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Company:</span>
                                                        <span class="ml-2">{{$employee->department}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Position:</span>
                                                        <span class="ml-2">{{$employee->current_position}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Type:</span>
                                                        <span class="ml-2">{{$employee->employee_type}}</span>
                                                    </p>
                                                    <p class="flex items-center text-sm leading-relaxed text-customGray1">
                                                        <span class="font-semibold">Joined Date:</span>
                                                        <span class="ml-2">{{$employee->start_of_employment}}</span>
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <!-- Modal Footer -->
                                            <div class="flex items-center  p-4 border-t border-gray-200 rounded-b">
                                                <button @click="window.location.href = '{{ route('EmployeesView', ['index' => $employee->employee_id]) }}'"
                                                        type="button"
                                                        class="text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Edit / View
                                                </button>
                                                <button @click="openDeactivateModal('{{ $employee->employee_id }}')"
                                                    type="button"
                                                    class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-customRed">
                                                Deactivate
                                                </button>
                                                <button @click="openDeleteModal('{{ $employee->employee_id }}')"
                                                        type="button"
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-customRed">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    
                    @endif
                </tbody>
            </table>
            
            <div class="p-4 bg-gray-100 w-full rounded-b-lg " wire:scroll>
                    {{ $EmployeeData->links(data : ['scrollTo' => False]) }}
            </div>
          </div>
         <div x-cloak x-data="{ deactivateModal: false }" x-ref="deactivate-modal-ref" 
                x-init="
                $el.addEventListener('deactivate-modal-open', (event) => {
                    $wire.set('currentFormId', event.detail);
                    deactivateModal = true;
                });
                $el.addEventListener('modal-close', () => deactivateModal = false);"
                x-show="deactivateModal" 
                @keydown.window.escape="deactivateModal = false" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                tabindex="-1" 
                class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                id="deactivate-modal">
                <div x-show="deactivateModal" 
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform opacity-0 scale-90"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-90"
                    class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700"
                    style="z-index: 60;">
                    <button type="button" @click="deactivateModal = false"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5">
                        <div class="text-center">
                            <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Deactivation?</h3>
                            <button wire:click.prevent="deactivateEmployee" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Yes
                            </button>
                            <button @click="deactivateModal = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                No
                            </button>
                        </div>
                    </div>
            </div>
         </div>
      </div>
      
      <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }"
      @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Created'; openConfirmation = false; setTimeout(() => showToast = false, 3000)"
      @trigger-success-deactivate.window="showToast = true; toastType = 'success'; toastMessage = 'Employee Deactivated'; openConfirmation = false; setTimeout(() => showToast = false, 3000)"
      @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; openConfirmation = false; setTimeout(() => showToast = false, 3000)">
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
          <!-- Loading screen -->
        <div wire:loading wire:target="submit, deactivateEmployee" class="load-over z-50">
            <div wire:loading wire:target="submit, deactivateEmployee" class="loading-overlay z-50">
                <div class="flex flex-col items-center justify-center">
                    <div class="spinner"></div>
                    <p>Processing...</p>
                </div>
            </div>
        </div>
  </div>
  

</div>


<script>

    function openDeactivateModal(id) {
        const modal = document.getElementById('deactivate-modal');
        if (modal) {
            const event = new CustomEvent('deactivate-modal-open', { detail: id });
            modal.dispatchEvent(event);
        }
    }

    let currentStep = 1;
    let password = document.getElementById("password");

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success'));
            const modal = document.querySelector(`[x-ref="show-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.showModal = false; // Open the modal
        });
        Livewire.on('triggerError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="show-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.showModal = false; // Open the modal
        });
        Livewire.on('triggerDeactivateSuccess', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-success-deactivate'));
            const modal = document.querySelector(`[x-ref="deactivate-modal-ref"]`);
            const view_modal = document.querySelector(`[x-ref="view-modal"]`);
            const viewModal = Alpine.$data(view_modal);
            viewModal.openViewModal = false;
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.deactivateModal = false; // Open the modal
        });
        Livewire.on('triggerDeactivateError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            const modal = document.querySelector(`[x-ref="deactivate-modal-ref"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.deactivateModal = false; // Open the modal
        });
    });

    // Called for adding, deleting, resetting work forms
    function workHistoryForm() {
        return {
            works: [{ company: '', position: '', start_date: '', end_date: '' }],
            addWork() {
                this.works.push({ company: '', position: '', start_date: '', end_date: '' });
            },
            removeWork(index) {
                this.works.splice(index, 1);
            },
            resetInputs() {
                this.works = [{ company: '', position: '', start_date: '', end_date: '' }];
            }
        }
    }

    // Called for adding, deleting, resetting children forms
    function childrenNamesForm() {
        return {
            children: [{ name: ''}],
            addChild() {
                this.children.push({ name: ''});
            },
            removeChild(index) {
                this.children.splice(index, 1);
            },
            resetInputs() {
                this.children = [{ name: ''}];
            }
        }
    }

    // Called for adding, deleting, resetting government exam forms
    function govtNamesForm() {
        return {
            govts: [{ name: '', rating: ''}],
            addGovt() {
                this.govts.push({ name: '', rating: ''});
            },
            removeGovt(index) {
                this.govts.splice(index, 1);
            },
            resetInputs() {
                this.govts = [{ name: '', rating: ''}];
            }
        }
    }

    // Called for adding, deleting, resetting training forms
    function trainingsNamesForm() {
        return {
            trainings: [{ name: ''}],
            addTraining() {
                this.trainings.push({ name: ''});
            },
            removeTraining(index) {
                this.trainings.splice(index, 1);
            },
            resetInputs() {
                this.trainings = [{ name: ''}];
            }
        }
    }

    // Called to reset inputs per step
    function resetInputs(selector) {
        const inputs = document.querySelectorAll(selector);
        inputs.forEach(input => {
            if (input.type === 'checkbox' || input.type === 'radio') {
                input.checked = false;
            } else if (input.tagName === 'SELECT') {
                input.selectedIndex = 0;
            } else {
                input.value = '';
            }
        });
    }
    function togglePassword() {
        if (password.type === "password") {
            password.type = "text";
            password.placeholder = "password";
            document.getElementById("eyeclose").classList.add('hidden');
            document.getElementById("eyeopen").classList.remove('hidden');
        } else {
            password.type = "password";
            password.placeholder = "••••••••";
            document.getElementById("eyeclose").classList.remove('hidden');
            document.getElementById("eyeopen").classList.add('hidden');
        }
    }

    function startModal(step) {
        currentStep = step;
        password.type = "password";
        password.placeholder = "••••••••";
        document.getElementById('prevBtn').classList.add('hidden');
        document.getElementById('nextBtn').classList.remove('hidden');
        document.getElementById('createBtn').classList.add('hidden');
        document.getElementById("eyeclose").classList.remove('hidden');
        document.getElementById("eyeopen").classList.add('hidden');
        showStep(currentStep);
    }

    function showStep(step) {
        document.querySelectorAll('.number-step').forEach((numberStepper, index) => {
            numberStepper.classList.toggle('hidden', index < step - 1);
        });

        document.querySelectorAll('.done-step').forEach((doneStepper, index) => {
            doneStepper.classList.toggle('hidden', index >= step - 1);
        });

        document.querySelectorAll('.step').forEach((stepElement, index) => {
            stepElement.classList.toggle('hidden', index !== step - 1);
        });

        document.querySelectorAll('.step-indicator').forEach((indicator, index) => {
            indicator.classList.toggle('bg-customRed', index < step-1);
            indicator.classList.toggle('bg-gray-100', index >= step-1);
        });
    }

    function changeStep(step) {
        currentStep += step;
        currentStep = Math.max(1, Math.min(currentStep, 7)); // Ensure the step stays between 1 and 7
        showStep(currentStep);

        document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
        document.getElementById('nextBtn').classList.toggle('hidden', currentStep === 7);
        document.getElementById('createBtn').classList.toggle('hidden', currentStep < 7);
    }

    // Event listener for Livewire events
    document.addEventListener('DOMContentLoaded', function () {
        Livewire.on('change-step', (event) => {
            changeStep(event.step);
        });
    });
    const getChartOptions1 = () => {
      return {
          series: @json($employee_type),
          colors: ["#E7B145", "#E77945", "#6AE745", "#45E5E7", "#BD45E7", "#E745A5"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["Internals", "OJT", "PEI-CCS", "Rapid", "Rapid Mobility", "Upskills"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          animations: {
            enabled: false,
            easing: 'easeinout',
            speed: 800,
            animateGradually: {
                enabled: true,
                delay: 150
            },
            dynamicAnimation: {
                enabled: true,
                speed: 350
            }
        }
          },

      }
      }

      const getChartOptions2 = () => {
      return {
          series: @json($inside_department),
          colors: ["#E7B145", "#E77945", "#6AE745", "#45E5E7", "#BD45E7", "#E745A5", "#E74556"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["HR and Admin", "Recruitment", "CXS", "Overseas Recruitment", "PEI/SL Temps DO-174", "Corporate Accounting and Finance", "Accounting Operations"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          },
      }
      }

      const getChartOptions3 = () => {
      return {
          series: @json($department),
          colors: ["#E7B145", "#E77945", "#6AE745", "#45E5E7", "#E745A5"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["PEI", "SL SEARCH", "SL TEMPS", "WESEARCH", "PEI-UPSKILLS"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          },
      }
      }

      const getChartOptions4 = () => {
      return {
          series: @json($gender),
          colors: ["#45E5E7", "#E745A5"],
          chart: {
          height: 420,
          width: "100%",
          type: "pie",
          },
          stroke: {
          colors: ["white"],
          lineCap: "",
          },
          plotOptions: {
          pie: {
              labels: {
              show: true,
              },
              size: "100%",
              dataLabels: {
              offset: -25
              }
          },
          },
          labels: ["Male", "Female"],
          dataLabels: {
          enabled: true,
          style: {
              fontFamily: "Inter, sans-serif",
          },
          },
          legend: {
          position: "bottom",
          fontFamily: "Inter, sans-serif",
          },
          yaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          },
          xaxis: {
          labels: {
              formatter: function (value) {
              return value
              },
          },
          axisTicks: {
              show: false,
          },
          axisBorder: {
              show: false,
          },
          },
      }
      }

      if (document.getElementById("pie-chart-1") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-1"), getChartOptions1());
      chart.render();
      }

      if (document.getElementById("pie-chart-2") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-2"), getChartOptions2());
      chart.render();
      }

      if (document.getElementById("pie-chart-3") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-3"), getChartOptions3());
      chart.render();
      }

      if (document.getElementById("pie-chart-4") && typeof ApexCharts !== 'undefined') {
      const chart = new ApexCharts(document.getElementById("pie-chart-4"), getChartOptions4());
      chart.render();
      }
</script>
