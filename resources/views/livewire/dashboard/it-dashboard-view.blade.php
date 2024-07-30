<div class="flex flex-col space-y-6">

    <!-- Employee Table -->
    <div class="relative shadow-md">
        <div class="flex flex-row items-start justify-between w-full gap-4 p-4 bg-white rounded-t-lg">
            <!-- Add user button -->
            <form>
                <button onclick="resetStep(1)" data-modal-target="add-modal" data-modal-toggle="add-modal" class="text-nowrap inline-flex items-center text-customRed bg-navButton shadow hover:bg-customRed hover:text-white font-medium rounded-lg text-sm px-3 py-1.5">
                    Add new item
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 ml-1">
                        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
                    </svg>
                </button>
                <!-- Main modal -->
                <div id="add-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-md max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow h-144">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5">
                                <h3 class="text-xl font-semibold text-gray-900">
                                    Add new item
                                </h3>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="add-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Stepper -->
                            <ol class="flex items-center justify-center w-full p-4">
                                <li class="flex flex-row items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="flex items-center justify-center text-white border-2 rounded-full done-step size-5 bg-customRed border-customRed">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div class="flex items-center justify-center text-xs border-2 rounded-full number-step size-5 border-customRed"> 1 </div>
                                    <div class="w-10 h-1 step-indicator"> </div>
                                </li>
                                <li class="flex flex-row items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="flex items-center justify-center text-white border-2 rounded-full done-step size-5 bg-customRed border-customRed">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div class="flex items-center justify-center text-xs border-2 rounded-full number-step size-5 border-customRed"> 2 </div>
                                    <div class="w-10 h-1 step-indicator"> </div>
                                </li>
                                <li class="flex flex-row items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="flex items-center justify-center text-white border-2 rounded-full done-step size-5 bg-customRed border-customRed">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div class="flex items-center justify-center text-xs border-2 rounded-full number-step size-5 border-customRed"> 3 </div>
                                    <div class="w-10 h-1 step-indicator"> </div>
                                </li>
                                <li class="flex flex-row items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="flex items-center justify-center text-white border-2 rounded-full done-step size-5 bg-customRed border-customRed">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div class="flex items-center justify-center text-xs border-2 rounded-full number-step size-5 border-customRed"> 4 </div>
                                    <div class="w-10 h-1 step-indicator"> </div>
                                </li>
                                <li class="flex flex-row items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="flex items-center justify-center text-white border-2 rounded-full done-step size-5 bg-customRed border-customRed">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <div class="flex items-center justify-center text-xs border-2 rounded-full number-step size-5 border-customRed"> 5 </div>
                                    <div class="w-10 h-1 step-indicator"> </div>
                                </li>
                                <li class="">
                                    <div class="flex items-center justify-center text-xs border-2 rounded-full number-step size-5 border-customRed"> 6 </div>
                                </li>
                            </ol>
                            <!-- Modal body -->
                            <div class="p-4 overflow-y-scroll max-h-[450px] md:p-5">
                                <form id="stepperForm" class="space-y-4" action="#">
                                    <!-- Personal Information 1-->
                                    <div id="step-1" class="step">
                                        <p class="font-semibold text-md text-customGray1">Personal Information</p>
                                        <hr class="my-4 border-gray-300">
                                        <div>
                                            <label for="fname" class="block mt-2 mb-2 text-sm font-medium text-customGray1">First Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="fname" id="fname" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter First Name" required>
                                        </div>
                                        <div>
                                            <label for="mname" class="block mb-2 text-sm font-medium text-customGray1">Middle Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="mname" id="mname" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Middle Name"required>
                                        </div>
                                        <div>
                                            <label for="lname" class="block mb-2 text-sm font-medium text-customGray1">Last Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="lname" id="lname" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Last Name"required>
                                        </div>
                                        <div>
                                            <label for="nn" class="block mb-2 text-sm font-medium text-customGray1">Nickname <span class="text-red-600">*</span></label>
                                            <input type="text" name="nn" id="nn" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Nickname"required>
                                        </div>
                                        <div>
                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">status <span class="text-red-600">*</span></label>
                                            <select name="status" id="status" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="" selected>Select status</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="bdate" class="block mb-2 text-sm font-medium text-customGray1">Birth Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="bdate" id="bdate" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                    </div>
                                    <!-- Personal Information 2 -->
                                    <div id="step-2" class="hidden step">
                                        <p class="font-semibold text-md text-customGray1">Other Information</p>
                                        <hr class="my-4 border-gray-300">
                                        <div>
                                            <label for="age" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Age <span class="text-red-600">*</span></label>
                                            <input type="text" name="age" id="age" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Age"required>
                                        </div>
                                        <div>
                                            <label for="cs" class="block mb-2 text-sm font-medium text-customGray1">Civil Status <span class="text-red-600">*</span></label>
                                            <select name="cs" id="cs" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="" selected>Select Civil Status</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                                <option value="separated">Separated or Divorced</option>
                                                <option value="widowed">Widowed</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="rel" class="block mb-2 text-sm font-medium text-customGray1">Religion <span class="text-red-600">*</span></label>
                                            <input type="text" name="rel" id="rel" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Religion"required>
                                        </div>
                                        <div>
                                            <label for="cpnum" class="block mb-2 text-sm font-medium text-customGray1">Cellphone Number <span class="text-red-600">*</span></label>
                                            <input type="text" name="cpnum" id="cpnum" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Cellphone Number"required>
                                        </div>
                                        <div>
                                            <label for="eadd" class="block mb-2 text-sm font-medium text-customGray1">Email Address <span class="text-red-600">*</span></label>
                                            <input type="email" name="eadd" id="eadd" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Email Address"required>
                                        </div>
                                        <div>
                                            <label for="hadd" class="block mb-2 text-sm font-medium text-customGray1">Home Address <span class="text-red-600">*</span></label>
                                            <input type="text" name="hadd" id="hadd" class="bg-gray-50 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Home Address"required>
                                        </div>
                                    </div>
                                    <!-- Emergency Contact -->
                                    <div id="step-3" class="hidden step">
                                        <p class="font-semibold text-md text-customGray1">Emergency Contact</p>
                                        <hr class="my-4 border-gray-300">
                                        <div>
                                            <label for="name" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="name" id="name" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Age"required>
                                        </div>
                                        <div>
                                            <label for="rel" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Relationship <span class="text-red-600">*</span></label>
                                            <input type="text" name="rel" id="rel" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Age"required>
                                        </div>
                                        <div>
                                            <label for="address" class="block mb-2 text-sm font-medium text-customGray1">Home Address <span class="text-red-600">*</span></label>
                                            <input type="text" name="address" id="address" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Religion"required>
                                        </div>
                                        <div>
                                            <label for="pnum" class="block mb-2 text-sm font-medium text-customGray1">Phone Number <span class="text-red-600">*</span></label>
                                            <input type="text" name="pnum" id="pnum" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Cellphone Number"required>
                                        </div>
                                    </div>
                                    <!-- Company details -->
                                    <div id="step-4" class="hidden step">
                                        <p class="font-semibold text-md text-customGray1">Company Details</p>
                                        <hr class="my-4 border-gray-300">
                                        <div>
                                            <label for="enum" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Employee Number <span class="text-red-600">*</span></label>
                                            <input type="text" name="enum" id="enum" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Employee Number"required>
                                        </div>
                                        <div>
                                            <label for="dept" class="block mb-2 text-sm font-medium text-customGray1">Department <span class="text-red-600">*</span></label>
                                            <select name="dept" id="dept" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="" selected>Select Department</option>
                                                <option value="hr">HR and Admin</option>
                                                <option value="recruitment">Recruitment</option>
                                                <option value="cxs">CXS</option>
                                                <option value="overseas">Overseas Recruitment</option>
                                                <option value="pei-sl">PEI-SL Temps DO-74</option>
                                                <option value="corporate">Corporate Accounting and Finance</option>
                                                <option value="accounting">Accounting Operations</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="etype" class="block mb-2 text-sm font-medium text-customGray1">Employee Type <span class="text-red-600">*</span></label>
                                            <select name="etype" id="etype" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="" selected>Select Department</option>
                                                <option value="internals">Internals</option>
                                                <option value="ojt">OJT</option>
                                                <option value="pei">PEI-CCS</option>
                                                <option value="rapid">Rapid</option>
                                                <option value="rapidmob">Rapid Mobility</option>
                                                <option value="upskills">Upskills</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="company" class="block mb-2 text-sm font-medium text-customGray1">Company <span class="text-red-600">*</span></label>
                                            <select name="company" id="company" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                                <option value="" selected>Select Department</option>
                                                <option value="hr">PEI</option>
                                                <option value="recruitment">SL Search</option>
                                                <option value="cxs">SL Temps</option>
                                                <option value="overseas">WESEARCH</option>
                                                <option value="pei-sl">PEI-Upskills</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="pos" class="block mb-2 text-sm font-medium text-customGray1">Position <span class="text-red-600">*</span></label>
                                            <input type="text" name="pos" id="pos" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Position"required>
                                        </div>
                                        <div class="relative flex flex-row w-full">
                                            <div class="flex flex-col w-full">
                                                <label for="password" class="block mb-2 text-sm font-medium text-customGray1">Password <span class="text-red-600">*</span></label>
                                                <input type="password" name="password" id="password" placeholder="••••••••" class="w-full bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block py-2.5 pl-2.5 pr-8" required>
                                            </div>
                                            <button class="absolute right-2 bottom-[21px] size-4 text-customGray1 hover:text-customRed" onclick="togglePassword()">

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
                                    </div>
                                    <!-- History 1 -->
                                    <div id="step-5" class="hidden step">
                                        <p class="font-semibold text-md text-customGray1">Work History</p>
                                        <hr class="my-4 border-gray-300">
                                        <div>
                                            <label for="com" class="block mt-2 mb-2 text-sm font-medium text-customGray1">Company <span class="text-red-600">*</span></label>
                                            <input type="text" name="com" id="com" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Previous Company"required>
                                        </div>
                                        <div>
                                            <label for="pos" class="block mb-2 text-sm font-medium text-customGray1">Position <span class="text-red-600">*</span></label>
                                            <input type="text" name="pos" id="pos" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Previous Position"required>
                                        </div>
                                        <div>
                                            <label for="sdate" class="block mb-2 text-sm font-medium text-customGray1">Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="sdate" id="sdate" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                        <div>
                                            <label for="edate" class="block mb-2 text-sm font-medium text-customGray1">Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="edate" id="edate" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                    </div>
                                    <!-- History 2 -->
                                    <div id="step-6" class="hidden step">
                                        <p class="font-semibold text-md text-customGray1">Education History</p>
                                        <hr class="my-4 border-gray-300">
                                        <p class="text-sm font-semibold text-customGray1">College</p>
                                        <div>
                                            <label for="school" class="block mt-2 mb-2 text-sm font-medium text-customGray1">School <span class="text-red-600">*</span></label>
                                            <input type="text" name="school" id="school" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Previous School"required>
                                        </div>
                                        <div>
                                            <label for="sdate" class="block mb-2 text-sm font-medium text-customGray1">Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="sdate" id="sdate" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                        <div>
                                            <label for="edate" class="block mb-2 text-sm font-medium text-customGray1">Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="edate" id="edate" class="bg-gray-50 mb-4 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                        <hr class="my-4 border-gray-300">
                                        <p class="mt-2 mb-2 text-sm font-semibold text-customGray1">High School</p>
                                        <div>
                                            <label for="school" class="block mb-2 text-sm font-medium text-customGray1">School <span class="text-red-600">*</span></label>
                                            <input type="text" name="school" id="school" class="bg-gray-50 border mb-2 border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" placeholder="Enter Previous School"required>
                                        </div>
                                        <div>
                                            <label for="sdate" class="block mb-2 text-sm font-medium text-customGray1">Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="sdate" id="sdate" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                        <div>
                                            <label for="edate" class="block mb-2 text-sm font-medium text-customGray1">Start Date <span class="text-red-600">*</span></label>
                                            <input type="date" name="edate" id="edate" class="bg-gray-50 mb-2 border border-gray-300 text-customGray1 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                        </div>
                                        </div>
                                    <!-- Stepper buttons -->
                                    <div class="grid grid-cols-2 my-2">
                                        <button type="submit" id="prevBtn" class="justify-self-start col-start-1 col-span-1 text-gray-700 hover:text-white hover:bg-gray-400 font-medium text-sm px-5 py-2.5 rounded-lg bg-gray-200" onclick="changeStep(-1)">Previous</button>
                                        <button type="submit" id="nextBtn" class="justify-self-end col-start-2 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium text-sm px-5 py-2.5 rounded-lg " onclick="changeStep(1)">Next</button>
                                        <button type="submit" id="createBtn" class="justify-self-end col-start-2 col-span-1 text-white hover:bg-red-600 hover:text-white bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 text-center" onclick="changeStep(0)">Create account</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            {{-- Search bar  --}}
            <div class="flex flex-row pr-2">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users" class="block text-sm text-gray-900 border border-gray-300 shadow-inner rounded-8px ps-10 pe-10 max-w-56 bg-gray-50 focus:ring-customRed focus:border-customRed" placeholder="Search for users">
                </div>
                <!-- Filter Sidebar -->
                <div class="absolute rounded-lg right-8 hover:text-customRed" x-data="{
                    filterOpen: false,
                    departmentOpen: false,
                    statusOpen: false,
                    departmentCount: 0,
                    statusCount: 0,
                    updateDepartmentCount() {
                        this.departmentCount = document.querySelectorAll('.departmentOpen .filter-checkbox:checked').length;
                    },
                    updatestatusCount() {
                        this.statusCount = document.querySelectorAll('.statusOpen .filter-checkbox:checked').length;
                    },
                    clearAllFilters() {
                        document.querySelectorAll('.filter-checkbox').forEach(checkbox => checkbox.checked = false);
                        this.departmentCount = 0;
                        this.statusCount = 0;
                    }
                    }">

                    <!-- Filter Icon Button -->
                    <button @click="filterOpen = !filterOpen" class="flex items-center justify-center w-10 h-10 right-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class="w-6 h-6 ml-3 text-customGray hover:text-customRed">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                        </svg>
                    </button>
                    <div x-show="filterOpen" @click.away="filterOpen = false" class="absolute z-10 w-64 mt-2 space-y-2 bg-white border rounded shadow-lg right-1">
                        <!-- Clear All Button -->
                        <div class="px-4 py-2">
                            <button @click="clearAllFilters" class="w-full pt-4 text-xs font-medium text-right text-blue-600 hover:text-blue-900">
                                Clear All
                            </button>
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
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">HR and Admin</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Recruitment</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">CXS</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Overseas Recruitment</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">PEI/SL Temps DO-174</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Corporate Accounting and Finance</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updateDepartmentCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Accounting Operations</label>
                                </div>
                            </div>
                        </div>
                        <!-- status Dropdown Button -->
                        <div class="px-2 pb-2">
                            <button @click="statusOpen = !statusOpen" class="w-full px-4 py-2 text-sm font-medium text-left text-customGray1 hover:text-customRed">
                                Status
                                <span class="float-right">&#9662;</span>
                                <span x-show="statusCount > 0" class="ml-2 text-xs font-medium text-customRed" x-text="statusCount"></span>
                            </button>
                            <div x-show="statusOpen" @click.away="statusOpen = false" class="w-full mt-2 space-y-2 statusOpen">
                                <hr class="my-4 border-gray-300">
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Completed</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Ongoing</label>
                                </div>
                                <div class="flex items-center px-4 py-2">
                                    <input type="checkbox" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-customRed focus:ring-customRed filter-checkbox" @change="updatestatusCount">
                                    <label class="ml-2 text-xs font-medium text-customGray1">Cancelled</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto rounded-b-lg">
          <table class="w-full text-sm text-left text-gray-500">
              <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                  <tr>
                      <th scope="col" class="px-6 py-3">
                          Name
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Email
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Status
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Date and Time
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Issue/s
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Department
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Note/s
                      </th>
                      <th scope="col" class="px-6 py-3">
                          Action/s
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr class="bg-white border-b hover:bg-gray-50 ">
                      <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Neil Sims</div>
                              <div class="font-normal text-gray-500">SLE0002</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                          neilsims@sle.com
                      </td>
                      <td class="px-6 py-4">
                        <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                            Completed
                        </span>
                    </td>
                      <td class="px-6 py-4">
                        07/16/24 3:47 PM
                      </td>
                      <td class="px-6 py-4">
                        Printer Issue
                      </td>
                      <td class="px-6 py-4">
                          HR and Admin
                      </td>
                      <td class="px-6 py-4">

                      </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                            <p class="font-medium text-yellow-400 hover:underline" data-modal-target="default-modal" data-modal-toggle="default-modal">Edit</p>
                            <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>

                        <!-- Main modal -->
                        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative w-full max-w-2xl max-h-full p-4">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Edit item
                                        </h3>
                                        <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 md:p-5">
                                        <form class="space-y-4" action="#">
                                            <div>
                                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                                            </div>
                                            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Bonnie Green</div>
                              <div class="font-normal text-gray-500">SLE0003</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        bonniegreen@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-yellow-900 bg-yellow-100 rounded-lg text-nowrap me-2">
                          Ongoing
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Jese Leos</div>
                              <div class="font-normal text-gray-500">SLE0004</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        jeseleos@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-red-900 bg-red-100 rounded-lg text-nowrap me-2">
                          Cancelled
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
                  <tr class="bg-white border-b hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Thomas Lean</div>
                              <div class="font-normal text-gray-500">SLE0005</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        thomaslean@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                          Completed
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
                  <tr class="bg-white hover:bg-gray-50 ">

                      <th scope="row" class="flex items-center px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                          <img class="w-10 h-10 rounded-full" src="{{ asset( 'assets/defaultuser.png') }}" alt="Profile Picture">
                          <div class="ps-3">
                              <div class="text-base font-semibold">Leslie Livingston</div>
                              <div class="font-normal text-gray-500">SLE0006</div>
                          </div>
                      </th>
                      <td class="px-6 py-4">
                        leslielivingston@sle.com
                    </td>
                    <td class="px-6 py-4">
                      <span  class="inline-flex items-center px-2 py-1 text-xs font-medium text-center text-green-900 bg-green-100 rounded-lg text-nowrap me-2">
                          Completed
                      </span>
                  </td>
                    <td class="px-6 py-4">
                      07/16/24 3:47 PM
                    </td>
                    <td class="px-6 py-4">
                      Printer Issue
                    </td>
                    <td class="px-6 py-4">
                        HR and Admin
                    </td>
                    <td class="px-6 py-4">

                    </td>
                      <td>
                        <div class="flex flex-row p-2 space-x-4">
                          <a href="#" class="font-medium text-yellow-400 hover:underline">Edit</a>
                          <a href="#" class="font-medium text-red-500 hover:underline">Delete</a>
                        </div>
                      </td>
                  </tr>
              </tbody>
          </table>
        </div>
    </div>
</div>

<script>
    let currentStep = 1;
    let addInputs = document.querySelectorAll('input');
    let addSelect = document.querySelectorAll('select');
    let eyeButton = document.getElementById('')
    let eyeopen = document.getElementById("eyeopen");
    let eyeclose = document.getElementById("eyeclose");
    let password = document.getElementById("password");

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

    function resetStep(step) {
        currentStep = step;
        showStep(currentStep);
        document.getElementById('prevBtn').classList.add('hidden');
        document.getElementById('createBtn').classList.add('hidden');
        addInputs.forEach(input => input.value = '');
        addSelect.forEach(input => input.value = '');
        password.type = "password";
        password.placeholder = "••••••••";
        document.getElementById("eyeclose").classList.remove('hidden');
        document.getElementById("eyeopen").classList.add('hidden');
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
        currentStep = Math.max(1, Math.min(currentStep, 6)); // Ensure the step stays between 1 and 6
        showStep(currentStep);

        document.getElementById('prevBtn').classList.toggle('hidden', currentStep === 1);
        document.getElementById('nextBtn').classList.toggle('hidden', currentStep === 6);
        document.getElementById('createBtn').classList.toggle('hidden', currentStep < 6);
    }

    document.addEventListener('DOMContentLoaded', () => {
        showStep(currentStep);
        document.getElementById('prevBtn').classList.add('hidden');
        document.getElementById('createBtn').classList.add('hidden');
    });

</script>
