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
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hiddQn="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('HrTicketsTable', ['type' => $type])}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">HR Ticket</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 dark:text-gray-400">Apply for HR Ticket</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Apply For HR Ticket</h2>
    <section class="px-8 pb-24 mt-10 bg-white rounded-lg dark:bg-gray-900">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 bg-white rounded-lg ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                               <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2  class="font-bold text-customRed">Employee Information</h2>
                                    <div  class="">
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">First name
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Middle name
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Last name
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                            <div class="w-full">
                                                <label for="employee_email"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee Email
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="employee_email" id="employee_email"  value="{{$employee_email}}"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="employee_id"
                                                    class="block mb-2 text-sm font-medium text-customGray whitespace-nowrap dark:text-white">Employee ID
                                                    <span class="text-red-600">*</span></label>
                                                <input type="text" name="" id="employee_id"  value="{{$employee_id}}"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                        </div>
                                    </div>
                               </div>


                            </div>

                            {{-- Leave Information --}}
                            <div class="grid w-full grid-cols-1 col-span-3 gap-4 ">
                                {{-- Date Of Filing --}}
                                <div class="grid grid-cols-1 col-span-3 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                    <h2 class="font-bold text-customRed">Ticket Information</h2>
                                    <div class="grid grid-rows-1 w-full col-span-2 gap-4 min-[902px]:grid-row-2 ">
                                        <div class="grid w-full grid-cols-1 min-[902px]:grid-cols-2 gap-4 bg-white">
                                            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                <label for="application_date"
                                                    class="block mb-2 text-sm font-medium text-customGray dark:text-white">Date of Filing
                                                    <span class="text-red-600">*</span></label>
                                                <input type="date" wire:model="application_date"
                                                    class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Date of Filing" required disabled>
                                            </div>
                                            <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Type
                                                    <span class="text-red-600">*</span>
                                                </label>
                                                <select id="type_of_ticket" name="type_of_ticket" wire:model.live="type_of_ticket" id="type_of_ticket_container" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Select</option>
                                                    <option value="HR Internal">HR Internal</option>
                                                    <option value="Internal Control">Internal Control</option>
                                                    <option value="HR Operations">HR Operations</option>
                                                </select>
                                                @error('type_of_ticket')
                                                    <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('type_of_ticket_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_ticket_container').focus();" >
                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @if ($type_of_ticket == "HR Operations")
                                            <div class="items-start py-16">
                                                <div id="type_of_request_container" class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Request (HR Ops)
                                                    <span  class="text-red-600">*</span></label>
                                                    <select name="type_of_request" wire:model.live="type_of_request" required
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Select</option>
                                                        <option value="Performance Monitoring Request">Performance Monitoring Request</option>
                                                        <option value="Incident Report">Incident Report</option>
                                                        <option value="Request for Issuance of Notice/Letter">Request for Issuance of Notice/Letter</option>
                                                        <option value="Request for Employee Files">Request for Employee Files</option>
                                                    </select>
                                                    @error('type_of_request')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @elseif ($type_of_ticket == "Internal Control")
                                            <div class="items-start py-16">
                                                <div id="type_of_request_container" class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Request (Internal Control)
                                                    <span  class="text-red-600">*</span></label>
                                                    <select name="type_of_request" wire:model.live="type_of_request" required
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Select</option>
                                                        <option value="Reimbursements">Reimbursements</option>
                                                        <option value="Tools and Equipment">Tools and Equipment</option>
                                                        <option value="Cash Advance">Cash Advance</option>
                                                        <option value="Liquidation">Liquidation</option>
                                                    </select>
                                                    @error('type_of_request')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        @elseif ($type_of_ticket == "HR Internal")
                                            <div id="type_of_request_container" class="grid grid-cols-1 gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <label
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Request (HR Internal)
                                                <span  class="text-red-600">*</span></label>
                                                <select name="type_of_request" wire:model.live="type_of_request" required
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Select</option>
                                                    <option value="HR">HR</option>
                                                    <option value="Office Admin">Office Admin</option>
                                                    <option value="Procurement">Procurement</option>
                                                </select>
                                                @error('type_of_request')
                                                    <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();" >
                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            @if ($type_of_request == "Office Admin")
                                                <div id="sub_type_of_request_container" class="grid grid-cols-1 gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Requests (Admin)
                                                    <span  class="text-red-600">*</span></label>
                                                    <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Select</option>
                                                        <option value="Certificate of Remittances">Certificate of Remittances </option>
                                                        <option value="Government-mandated benefits concern">Government-mandated benefits concern</option>
                                                        <option value="Messengerial">Messengerial</option>
                                                        <option value="Repairs/Maintenance">Repairs/Maintenance</option>
                                                        <option value="Book a Car">Book a Car</option>
                                                        <option value="Book a Meeting Room">Book a Meeting Room</option>
                                                        <option value="Office Supplies">Office Supplies</option>
                                                    </select>
                                                    @error('sub_type_of_request')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            @elseif ($type_of_request == "Procurement")
                                                <div id="sub_type_of_request_container" class="grid grid-cols-1 gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Requests (Admin)
                                                    <span  class="text-red-600">*</span></label>
                                                    <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Select</option>
                                                        <option value="Request for Quotation">Request for Quotation</option>
                                                        <option value="Request to Buy/Book/Avail Service">Request to Buy/Book/Avail Service</option>
                                                    </select>
                                                    @error('sub_type_of_request')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            @else
                                                <div id="sub_type_of_request_container" class="grid grid-cols-1 gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <label
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Requests (Admin)
                                                    <span  class="text-red-600">*</span></label>
                                                    <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option selected>Select</option>
                                                        <option value="Manpower Request Form">Manpower Request Form</option>
                                                        <option value="Certificate of Employment">Certificate of Employment</option>
                                                        <option value="HMO-related concerns">HMO-related concerns</option>
                                                        <option value="Payroll-related concerns">Payroll-related concerns</option>
                                                        <option value="Leave concerns">Leave concerns</option>
                                                        <option value="Request for Consultation">Request for Consultation</option>
                                                        <option value="Request for a Meeting">Request for a Meeting</option>
                                                    </select>
                                                    @error('sub_type_of_request')
                                                        <div class="text-sm transition transform alert alert-danger"
                                                        x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();" >
                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                        </div>
                                                    @enderror
                                                </div>
                                            @endif
                                        @else
                                            <div class="gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <div class="items-start py-16">
                                                    <p class="p-10 text-xl font-bold text-center text-customRed justify-self-center">Nothing to show <br><span class="text-base font-normal text-customGray"> Tip: Select HR Ticket First</span> </p>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if ($type_of_ticket)
                                    <div class="col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                        <p class=" font-bold text-customRed ">Other Information</p>
                                        @if ($type_of_ticket == "HR Internal")
                                            @if ($type_of_request == "HR")
                                                @if ($sub_type_of_request == "Certificate of Employment")
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4  ">
                                                            <div id="purpose_container"  class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Purpose of Request (CoE)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="justify-center w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid w-full grid-cols-1" id="type_of_hrconcern_container">
                                                                    <label for="type_of_request"
                                                                        class="mb-2 text-sm font-medium text-gray-900 dark:text-white ">Commutation
                                                                        <span class="text-red-600">*</span></label>
                                                                        <div class="grid items-start w-full grid-cols-2 pl-4">
                                                                            <div>
                                                                                <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="type_of_hrconcern" id="with_compensation" wire:model="type_of_hrconcern" value="With Compensation">
                                                                                <label for="with_compensation" class="text-sm font-medium">With Compensation</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="radio" class="ml-2 text-customRed border-customRed focus:ring-customRed" id="without_compensation" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Without Compensation">
                                                                                <label for="without_compensation" class="text-sm font-medium">Without Compensation</label><br>
                                                                            </div>
                                                                        </div>
                                                                        @error('type_of_hrconcern')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                                x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                @elseif ($sub_type_of_request == "HMO-related concerns")
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-3 gap-4 items-start ">
                                                            <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="type_of_hrconcern"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Concern (HMO)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                    <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="Availment of Service">Availment of Service</option>
                                                                        <option value="Card Replacement">Card Replacement</option>
                                                                        <option value="Reimbursement">Reimbursement</option>
                                                                        <option value="Request for Enrollment">Request for Enrollment</option>
                                                                        <option value="Request for Deletion">Request for Deletion</option>
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Describe your concern (HMO)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="request_link_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="request_link"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Paste the link related to your concern (HMO)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="request_link" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('request_link')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                @elseif ($sub_type_of_request == "Payroll-related concerns")
                                                    <div class="grid grid-cols-1 gap-4 bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700">
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                            <div class="grid grid-cols-1 min-[902px]:pb-11">
                                                                <div class="w-full">
                                                                    <label for="request_date"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Payroll Date
                                                                        <span class="text-red-600">*</span></label>
                                                                    <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        required>
                                                                    @error('request_date')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="grid grid-cols-1 min-[902px]:pb-11">
                                                                <label for="type_of_hrconcern"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Concern (Payroll)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                    <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="Overtime Pay">Overtime Pay</option>
                                                                        <option value="Holiday Pay">Holiday Pay</option>
                                                                        <option value="Deductions">Deductions</option>
                                                                        <option value="Others">Others</option>
                                                                        <option value="Request for Deletion">Request for Deletion</option>
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="purpose_container"  class="grid items-start grid-cols-1 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Please describe your concern (Payroll)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="request_link_container"  class="grid items-start grid-cols-1 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="request_link"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Paste the link related to your concern (Payroll)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="request_link" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('request_link')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif ($sub_type_of_request == "Leave concerns")

                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-3 gap-4 items-start ">
                                                            <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="type_of_hrconcern"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Request (Leave)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                    <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="Leave Credits">Leave Credits</option>
                                                                        <option value="Changes on Filed Leaves">Changes on Filed Leaves</option>
                                                                        <option value="Cancellation of Leaves">Cancellation of Leaves</option>
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Describe your concern (Leave)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="request_link_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="request_link"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Paste the link related to your concern (Leave)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="request_link" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('request_link')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                @elseif ($sub_type_of_request == "Request for Consultation")
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                            <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="type_of_hrconcern"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Request (Leave)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                    <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="High (ASAP)">High (ASAP)</option>
                                                                        <option value="Medium (within the day) ">Medium (within the day)</option>
                                                                        <option value="Low (can be attended the next dy)">Low (can be attended the next dy)</option>
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Describe your concern (Leave)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                @elseif ($sub_type_of_request == "Request for a Meeting")
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-3 gap-4 items-start ">
                                                            <div class="w-full h-auto p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700">
                                                                <label for="request_date"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Date of Meeting (Request for Meeting)
                                                                    <span class="text-red-600">*</span></label>
                                                                <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    required>
                                                                @error('request_date')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div id="request_requested_container" class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="request_requested"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Target Person (Request for Meeting)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                    <select name="request_requested" wire:model="request_requested"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        @foreach ($employeeNames as $name)
                                                                            <option value="{{$name}}">{{$name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Purpose of Meeting (Request for Meeting)
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                @endif
                                            @elseif ($type_of_request == "Office Admin")
                                                @if ($sub_type_of_request == "Certificate of Remittances")
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-4 gap-4 items-start ">
                                                            <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow pb-7 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="type_of_hrconcern"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Remittance Certificate
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                    <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="SSS">SSS</option>
                                                                        <option value="PHILHEALTH">PHILHEALTH</option>
                                                                        <option value="HDMF">HDMF</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                @if ($type_of_hrconcern == "Others")
                                                                    <div id="remittance_request_others_container" class="grid grid-cols-1">
                                                                        <textarea type="text" rows="1" id="remittance_request_others" name="remittance_request_others" wire:model="remittance_request_others"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        </textarea>
                                                                        @error('remittance_request_others')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                                x-data x-init="document.getElementById('remittance_request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('remittance_request_others_container').focus();" >
                                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow pb-7 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="request_assigned"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Account Assigned
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="request_assigned_container" class="grid grid-cols-1">
                                                                    <select name="request_assigned" wire:model.live="request_assigned"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="PEI">PEI</option>
                                                                        <option value="SL TEMPS">SL TEMPS</option>
                                                                        <option value="SL SEARCH">SL SEARCH</option>
                                                                        <option value="WESEARCH">WESEARCH</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    @error('request_assigned')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_assigned_containers').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_assigned_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                                @if ($request_assigned == "Others")
                                                                    <div id="request_others_container" class="grid grid-cols-1">
                                                                        <textarea type="text" rows="1" id="request_extra" name="request_extra" wire:model="request_assigned_request_others"
                                                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        </textarea>
                                                                        @error('request_extra')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                                x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();" >
                                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">For what purpose?
                                                                    <span class="text-red-600">*</span></label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <div class="w-full h-auto">
                                                                    <label for="request_date"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Date Start
                                                                        <span class="text-red-600">*</span></label>
                                                                    <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        required>
                                                                    @error('request_date')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                @elseif ($sub_type_of_request == "Government-mandated benefits concern")
                                                        <div class="flex flex-col">
                                                            <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 h-auto gap-4 items-start ">

                                                                <div class="grid h-auto grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow ">
                                                                    <label for="request_assigned"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Concern (GMR)
                                                                        <span class="text-red-600">*</span>
                                                                    </label>
                                                                    <div id="type_of_hrconcern_container" class="grid grid-cols-1 mb-11">
                                                                        <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <option selected>Select</option>
                                                                            <option value="SSS Salary Loan for Approval">SSS Salary Loan for Approval</option>
                                                                            <option value="SSS Calamity Loan for Approval">SSS Calamity Loan for Approval</option>
                                                                            <option value="PAG-IBIG Multi-Purpose Loan for Approval">PAG-IBIG Multi-Purpose Loan for Approval</option>
                                                                            <option value="SSS Maternity Notification">SSS Maternity Notification</option>
                                                                            <option value="SSS Sickness Notification">SSS Sickness Notification</option>
                                                                            <option value="Issuance of TIN Number">Issuance of TIN Number</option>
                                                                            <option value="SSS R1A">SSS R1A</option>
                                                                        </select>
                                                                        @error('type_of_hrconcern')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            <div id="request_link_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="request_link"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paste the link related to your concern (GMR)
                                                                    <span class="text-red-600">*</span><br>
                                                                    <span class="text-red-600">*</span> Supporting documents/List of requirements <br>
                                                                    <span class="text-red-600">*</span> For SSS R1A and PHILHEALTH ER2, must be in Excel format.</label>
                                                                <div id="request_link" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                    </textarea>
                                                                    @error('request_link')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                @elseif ($sub_type_of_request == "Messengerial")
                                                        <div class="flex flex-col">
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-3 h-auto gap-4 items-start ">
                                                            <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                    Type of Request (Messengerial) <span class="text-red-600">*</span>
                                                                </label>
                                                                <div id="type_of_hrconcern_container" class="grid grid-cols-1 mb-5">
                                                                    <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                        <option selected>Select</option>
                                                                        <option value="Send Document">Send Document</option>
                                                                        <option value="Pick-Up Document">Pick-Up Document</option>
                                                                        <option value="Collections">Collections</option>
                                                                        <option value="Others">Others</option>
                                                                    </select>
                                                                    @error('type_of_hrconcern')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                @if ($type_of_hrconcern == "Others")
                                                                <div id="messengerial_other_type_container" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('messengerial_other_type')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('messengerial_other_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('messengerial_other_type_container').focus();">
                                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                                @endif
                                                            </div>
                                                            <div id="request_requested_container" class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                                    Company
                                                                </label>
                                                                <div id="request_requested" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_requested" name="request_requested" wire:model="request_requested"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('request_requested')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                                    </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="request_assigned_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="request_assigned"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact Person
                                                                    <span class="text-red-600">*</span> </label>
                                                                <div id="request_assigned" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_assigned" name="request_assigned" wire:model="request_assigned"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('request_assigned')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_assigned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_assigned_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="grid grid-cols-2 gap-4">
                                                            <div id="request_others_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                <label for="request_extra"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address of Destination (Messengerial)
                                                                    <span class="text-red-600">*</span> </label>
                                                                <div id="request_extra" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_extra" name="request_extra" wire:model="request_extra"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('request_extra')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                                <div class="w-full h-auto">
                                                                    <label for="request_date"
                                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Date of Pick Up or Send (Messengerial) <span class="text-red-600">*</span></label>
                                                                    <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                        required>
                                                                    @error('request_date')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                @elseif ($sub_type_of_request == "Repairs/Maintenance")
                                                    <div class="grid grid-cols-2 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 col-span-2 min-[902px]:grid-cols-5 h-auto gap-4 items-start ">
                                                        <div>
                                                            <h1>1. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦ </span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦ </span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>2. Plumbing Problems:</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Leaking faucets or pipes</li>
                                                            <li> <span class="text-customRed">◦</span> Clogged drains or toilets</li>
                                                            <li> <span class="text-customRed">◦</span> Running toilets</li>
                                                            <li> <span class="text-customRed">◦</span> Low water pressure</li>
                                                            <li> <span class="text-customRed">◦</span> Water heater issues</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>3. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>4. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>5. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>6. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>7. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>8. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>9. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                        <div>
                                                            <h1>10. Electrical Issues Checklist</h1>
                                                            <ul>
                                                            <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                                            <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                                            <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                                            <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                                            <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="flex flex-col">
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 h-auto gap-4 items-start ">
                                                        <div class="grid grid-cols-1 gap-6 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="request_assigned"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Request (Repairs and Maintenance)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="type_of_hrconcern_container" class="grid grid-cols-1">
                                                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option selected>Select</option>
                                                                    <option value="Electrical">Electrical</option>
                                                                    <option value="Plumbing">Plumbing</option>
                                                                    <option value="HVAC">HVAC</option>
                                                                    <option value="Structural">Structural</option>
                                                                    <option value="Safety Concerns">Safety Concerns</option>
                                                                    <option value="Equipment/Machinery">Equipment/Machinery</option>
                                                                    <option value="Environmental">Environmental</option>
                                                                    <option value="Accessibility">Accessibility</option>
                                                                    <option value="General Maintenance">General Maintenance</option>
                                                                    <option value="Security">Security</option>
                                                                    <option value="Others">Others</option>
                                                                </select>
                                                                @error('type_of_hrconcern')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            @if ($type_of_hrconcern == "Others")
                                                                <div id="messengerial_other_type_container" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type"
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    </textarea>
                                                                    @error('messengerial_other_type')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('messengerial_other_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('messengerial_other_type_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Concerned Area
                                                                <span class="text-red-600"></span> <br> <span class="font-base">(Please indicate the floor, area and department) </span>
                                                            </label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" placeholder="Enter your answer here."
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                </textarea>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    </div>
                                                @elseif($sub_type_of_request == "Book a Car")
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div class="w-full h-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                            <label for="request_date"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Date and Time of Departure (Book a Car)
                                                                <span class="text-red-600">*</span></label>
                                                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required>
                                                            @error('request_date')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full h-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                            <label for="request_requested"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Date and Time of Pick-Up (Book a Car)
                                                                <span class="text-red-600">*</span></label>
                                                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required>
                                                            @error('request_requested')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                        </div>


                                                        <div id="account_client_hr_ops_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Passenger/s Name (Book a Car)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <input type="text" name="account_client_hr_ops" id="account_client_hr_ops" wire:model.live="account_client_hr_ops"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    required>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('account_client_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('account_client_hr_ops_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Destination (Book a Car)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <input type="text" name="purpose" id="purpose" wire:model="purpose"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    required>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($sub_type_of_request == "Book a Meeting Room")
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div class="w-full h-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                            <label for="request_date"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Date (Book a Meeting Room)
                                                                <span class="text-red-600">*</span></label>
                                                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required>
                                                            @error('request_date')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="w-full h-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                            <label for="request_requested"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">End Date (Book a Meeting Room)
                                                                <span class="text-red-600">*</span></label>
                                                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                required>
                                                            @error('request_requested')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div id="type_of_hrconcern_container" class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="type_of_hrconcern"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Room (Book a Meeting Room)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="request_requested_container" class="grid grid-cols-1">
                                                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option selected>Select</option>
                                                                    <option value="Training Room">Training Room</option>
                                                                    <option value="Villa Office">Villa Office</option>
                                                                </select>
                                                                @error('type_of_hrconcern')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div id="purpose_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Describe your purpose (Book a Meeting Room)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                    @elseif($sub_type_of_request == "Office Supplies")
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div class="grid grid-cols-1 gap-4">
                                                            <div id="supplies_request.ballpen_black_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.ballpen_black" class="text-sm font-medium text-gray-900 dark:text-white">Ballpen Black</label>
                                                                    <input type="number" id="supplies_request.ballpen_black" name="supplies_request.ballpen_black" wire:model="supplies_request.ballpen_black"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.ballpen_black')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.ballpen_black').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_black').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.ballpen_blue_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.ballpen_blue" class="text-sm font-medium text-gray-900 dark:text-white">Ballpen Blue</label>
                                                                    <input type="number" id="supplies_request.ballpen_blue" name="supplies_request.ballpen_blue" wire:model="supplies_request.ballpen_blue"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.ballpen_blue')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.ballpen_blue').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_blue').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.ballpen_red_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.ballpen_red" class="text-sm font-medium text-gray-900 dark:text-white">Ballpen Red</label>
                                                                    <input type="number" id="supplies_request.ballpen_red" name="supplies_request.ballpen_red" wire:model="supplies_request.ballpen_red"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.ballpen_red')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.ballpen_red').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_red').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.pencil_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.pencil" class="text-sm font-medium text-gray-900 dark:text-white">Pencil</label>
                                                                    <input type="number" id="supplies_request.pencil" name="supplies_request.pencil" wire:model="supplies_request.pencil"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.pencil')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.pencil').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.pencil').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.highlighter_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.highlighter" class="text-sm font-medium text-gray-900 dark:text-white">Highlighter</label>
                                                                    <input type="number" id="supplies_request.highlighter" name="supplies_request.highlighter" wire:model="supplies_request.highlighter"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.highlighter')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.highlighter').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.highlighter').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.permanent_marker_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.permanent_marker" class="text-sm font-medium text-gray-900 dark:text-white">Permanent Marker</label>
                                                                    <input type="number" id="supplies_request.permanent_marker" name="supplies_request.permanent_marker" wire:model="supplies_request.permanent_marker"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.permanent_marker')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.permanent_marker').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.permanent_marker').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.correction_tape_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.correction_tape" class="text-sm font-medium text-gray-900 dark:text-white">Correction Tape</label>
                                                                    <input type="number" id="supplies_request.correction_tape" name="supplies_request.correction_tape" wire:model="supplies_request.correction_tape"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.correction_tape')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.correction_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.correction_tape').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.l_green_exp_folder_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.l_green_exp_folder" class="text-sm font-medium text-gray-900 dark:text-white">Green Expandable Folder (L)</label>
                                                                    <input type="number" id="supplies_request.l_green_exp_folder" name="supplies_request.l_green_exp_folder" wire:model="supplies_request.l_green_exp_folder"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.l_green_exp_folder')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.l_green_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_green_exp_folder').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.s_green_exp_folder_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.s_green_exp_folder" class="text-sm font-medium text-gray-900 dark:text-white">Green Expandable Folder (S)</label>
                                                                    <input type="number" id="supplies_request.s_green_exp_folder" name="supplies_request.s_green_exp_folder" wire:model="supplies_request.s_green_exp_folder"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.s_green_exp_folder')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.s_green_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_green_exp_folder').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.l_brown_exp_folder_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.l_brown_exp_folder" class="text-sm font-medium text-gray-900 dark:text-white">Brown Expandable Folder (L)</label>
                                                                    <input type="number" id="supplies_request.l_brown_exp_folder" name="supplies_request.l_brown_exp_folder" wire:model="supplies_request.l_brown_exp_folder"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.l_brown_exp_folder')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.l_brown_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_exp_folder').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.s_brown_exp_folder_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.s_brown_exp_folder" class="text-sm font-medium text-gray-900 dark:text-white">Brown Expandable Folder (S)</label>
                                                                    <input type="number" id="supplies_request.s_brown_exp_folder" name="supplies_request.s_brown_exp_folder" wire:model="supplies_request.s_brown_exp_folder"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.s_brown_exp_folder')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.s_brown_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_exp_folder').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.scissors_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.scissors" class="text-sm font-medium text-gray-900 dark:text-white">Scissors</label>
                                                                    <input type="number" id="supplies_request.scissors" name="supplies_request.scissors" wire:model="supplies_request.scissors"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.scissors')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.scissors').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scissors').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.white_envelope_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.white_envelope" class="text-sm font-medium text-gray-900 dark:text-white">White Envelope</label>
                                                                    <input type="number" id="supplies_request.white_envelope" name="supplies_request.white_envelope" wire:model="supplies_request.white_envelope"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.white_envelope')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.white_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.white_envelope').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="grid grid-cols-1 gap-4">
                                                            <div id="supplies_request.calculator_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.calculator" class="text-sm font-medium text-gray-900 dark:text-white">Calculator</label>
                                                                    <input type="number" id="supplies_request.calculator" name="supplies_request.calculator" wire:model="supplies_request.calculator"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.calculator')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.calculator').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.calculator').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.binder_two_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.binder_two" class="text-sm font-medium text-gray-900 dark:text-white">Binder Clips (2")</label>
                                                                    <input type="number" id="supplies_request.binder_two" name="supplies_request.binder_two" wire:model="supplies_request.binder_two"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.binder_two')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.binder_two').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_two').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.binder_one_fourth_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.binder_one_fourth" class="text-sm font-medium text-gray-900 dark:text-white">Binder Clips (1 1/4")</label>
                                                                    <input type="number" id="supplies_request.binder_one_fourth" name="supplies_request.binder_one_fourth" wire:model="supplies_request.binder_one_fourth"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.binder_one_fourth')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.binder_one_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_one_fourth').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.binder_three_fourth_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.binder_three_fourth" class="text-sm font-medium text-gray-900 dark:text-white">Binder Clips (3/4")</label>
                                                                    <input type="number" id="supplies_request.binder_three_fourth" name="supplies_request.binder_three_fourth" wire:model="supplies_request.binder_three_fourth"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.binder_three_fourth')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.binder_three_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_three_fourth').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.l_metal_clips_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.l_metal_clips" class="text-sm font-medium text-gray-900 dark:text-white">Metal Paper Clips (L)</label>
                                                                    <input type="number" id="supplies_request.l_metal_clips" name="supplies_request.l_metal_clips" wire:model="supplies_request.l_metal_clips"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.l_metal_clips')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.l_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_metal_clips').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.s_metal_clips_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.s_metal_clips" class="text-sm font-medium text-gray-900 dark:text-white">Metal Paper Clips (L)</label>
                                                                    <input type="number" id="supplies_request.s_metal_clips" name="supplies_request.s_metal_clips" wire:model="supplies_request.s_metal_clips"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.s_metal_clips')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.s_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_metal_clips').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.stapler_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.stapler" class="text-sm font-medium text-gray-900 dark:text-white">Stapler</label>
                                                                    <input type="number" id="supplies_request.stapler" name="supplies_request.stapler" wire:model="supplies_request.stapler"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.stapler')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.stapler').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.stapler_wire_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.stapler_wire" class="text-sm font-medium text-gray-900 dark:text-white">Stapler Wire</label>
                                                                    <input type="number" id="supplies_request.stapler_wire" name="supplies_request.stapler_wire" wire:model="supplies_request.stapler_wire"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.stapler_wire')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.stapler_wire').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler_wire').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.scotch_tape_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.scotch_tape" class="text-sm font-medium text-gray-900 dark:text-white">Scotch Tape</label>
                                                                    <input type="number" id="supplies_request.scotch_tape" name="supplies_request.scotch_tape" wire:model="supplies_request.scotch_tape"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.scotch_tape')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.scotch_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scotch_tape').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.l_brown_envelope_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.l_brown_envelope" class="text-sm font-medium text-gray-900 dark:text-white">Brown Envelope (L)</label>
                                                                    <input type="number" id="supplies_request.l_brown_envelope" name="supplies_request.l_brown_envelope" wire:model="supplies_request.l_brown_envelope"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.l_brown_envelope')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.l_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_envelope').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.s_brown_envelope_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.s_brown_envelope" class="text-sm font-medium text-gray-900 dark:text-white">Brown Envelope (S)</label>
                                                                    <input type="number" id="supplies_request.s_brown_envelope" name="supplies_request.s_brown_envelope" wire:model="supplies_request.s_brown_envelope"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.s_brown_envelope')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.s_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_envelope').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.post_it_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.post_it" class="text-sm font-medium text-gray-900 dark:text-white">Post It</label>
                                                                    <input type="number" id="supplies_request.post_it" name="supplies_request.post_it" wire:model="supplies_request.post_it"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.post_it')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.post_it').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.post_it').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="supplies_request.white_folder_container" class="items-start flex-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                                <div class="grid items-center grid-cols-2 mb-2">
                                                                    <label for="supplies_request.white_folder" class="text-sm font-medium text-gray-900 dark:text-white">White Folder</label>
                                                                    <input type="number" id="supplies_request.white_folder" name="supplies_request.white_folder" wire:model="supplies_request.white_folder"
                                                                        class="ml-4 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    @error('supplies_request.white_folder')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('supplies_request.white_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.white_folder').focus();">
                                                                            <span class="text-xs text-red-500">{{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @elseif ($type_of_request == "Procurement")
                                                @if ($sub_type_of_request == "Request for Quotation")
                                                        <div class="flex flex-col">
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-3 h-auto gap-4 items-start ">
                                                            <div id="type_of_hrconcern_container" class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                        <label for="type_of_hrconcern"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specifications (Quotation)
                                                                            <span class="text-red-600">*</span><br> <span class="text-gray-500 font-base">(Please make sure to include the complete details such as color, size, code, etc.) </span>
                                                                        </label>
                                                                        <div id="type_of_hrconcern" class="grid grid-cols-1">
                                                                            <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Enter your answer here."
                                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                            </textarea>
                                                                            @error('type_of_hrconcern')
                                                                                <div class="text-sm transition transform alert alert-danger"
                                                                                    x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                            </div>
                                                            <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="purpose"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose (Quotation)
                                                                    <span class="text-red-600">*</span> </span>
                                                                </label>
                                                                <div id="purpose" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="4" id="purpose" name="purpose" wire:model="purpose" placeholder="Enter your answer here."
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                    </textarea>
                                                                    @error('purpose')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="request_link_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="request_link"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paste the link related to your concern (Quotation)
                                                                    <span class="text-red-600">*</span>
                                                                </label>
                                                                <div id="request_link" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="4" id="request_link" name="request_link" wire:model="request_link" placeholder="Enter your answer here."
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                    </textarea>
                                                                    @error('request_link')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                        </div>

                                                        </div>
                                                @elseif ($sub_type_of_request == "Request to Buy/Book/Avail Service")
                                                        <div class="flex flex-col">
                                                        <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 h-auto gap-4 items-start ">
                                                            <div id="type_of_hrconcern_container" class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="type_of_hrconcern"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product/Service Specifications (Procurement)
                                                                    <span class="text-red-600">*</span>
                                                                </label>
                                                                <div id="type_of_hrconcern" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Enter your answer here."
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                    </textarea>
                                                                    @error('type_of_hrconcern')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div id="request_link_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                <label for="request_link"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Paste the link related to your concern (Procurement)
                                                                    <span class="text-red-600">*</span>
                                                                </label>
                                                                <div id="request_link" class="grid grid-cols-1">
                                                                    <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="Enter your answer here."
                                                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                    </textarea>
                                                                    @error('request_link')
                                                                        <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                @endif
                                            @endif

                                        @elseif($type_of_ticket == "Internal Control")
                                            @if ($type_of_request == "Reimbursements")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="flex flex-col">
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-3 h-auto gap-4 items-start ">
                                                        <div class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                            <div class="w-full h-auto">
                                                                <label for="request_date"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Cut-Off Date
                                                                    <span class="text-red-600">*</span></label>
                                                                <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    required>
                                                                @error('request_date')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Please describe the concern (Reimbursement)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div id="request_link_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="request_link"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Paste the link related to your concern (Reimbursement)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="request_link" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="(payslips,timesheet.etc.)"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                                </textarea>
                                                                @error('request_link')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                </div>
                                            @elseif ($type_of_request == "Tools and Equipment")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                        @if ($type_of_hrconcern == "Others")
                                                            <div class="grid grid-cols-1  min-[902px]:grid-cols-3 h-auto gap-4 items-start ">
                                                                <div class="grid w-full grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 " id="type_of_hrconcern_container">
                                                                    <label for="condition_availability"
                                                                        class="pb-4 mb-2 text-sm font-medium text-gray-900 dark:text-white ">Condition/Availability
                                                                        <span class="text-red-600">*</span></label>
                                                                        <div class="grid items-start w-full grid-cols-1 pl-4">
                                                                            <div>
                                                                                <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="condition_availability" id="new" wire:model="condition_availability" value="New">
                                                                                <label for="New" class="text-sm font-semibold">New</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Old/Existing Unit" name="condition_availability" wire:model="condition_availability" value="Old/Existing Unit">
                                                                                <label for="Old/Existing Unit" class="text-sm font-semibold">Old/Existing Unit</label><br>
                                                                            </div>
                                                                        </div>
                                                                        @error('condition_availability')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                                x-data x-init="document.getElementById('condition_availability').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('condition_availability').focus();" >
                                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                </div>
                                                                {{-- <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4"> --}}
                                                                    <div id="type_of_hrconcern_container" class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                        <label
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment Type
                                                                            <span class="text-red-600">*</span></label>
                                                                        <select id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <option selected>Select</option>
                                                                            <option value="Laptop">Laptop</option>
                                                                            <option value="Printer">Printer</option>
                                                                            <option value="Monitor">Monitor</option>
                                                                            <option value="Mouse">Mouse</option>
                                                                            <option value="Laptop Charger / Adapter">Laptop Charger / Adapter</option>
                                                                            <option value="Keyboard">Keyboard</option>
                                                                            <option value="LAN Dangle">LAN Dangle</option>
                                                                            <option value="HDMI to LAN Converter">HDMI to LAN Converter</option>
                                                                            <option value="Numeric Keypad">Numeric Keypad</option>
                                                                            <option value="Extension Cord">Extension Cord</option>
                                                                            <option value="Others">Others</option>
                                                                        </select>
                                                                        @error('type_of_hrconcern')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                    <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                        {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                                        <label for="purpose"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Equipment Type (If Chosen Others)
                                                                            <span class="text-red-600">*</span></label>
                                                                        <div id="purpose" class="grid grid-cols-1">
                                                                            <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            </textarea>
                                                                            @error('purpose')
                                                                                <div class="text-sm transition transform alert alert-danger"
                                                                                    x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    {{-- </div>  --}}
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="grid grid-cols-1 min-[902px]:grid-cols-2 h-auto gap-4 items-start ">
                                                                <div class="grid w-full grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 " id="type_of_hrconcern_container">
                                                                    <label for="condition_availability"
                                                                        class="pb-4 mb-2 text-sm font-medium text-gray-900 dark:text-white ">Condition/Availability
                                                                        <span class="text-red-600">*</span></label>
                                                                        <div class="grid items-start w-full grid-cols-1 pl-4">
                                                                            <div>
                                                                                <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="condition_availability" id="new" wire:model="condition_availability" value="New">
                                                                                <label for="New" class="text-sm font-semibold">New</label>
                                                                            </div>
                                                                            <div>
                                                                                <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Old/Existing Unit" name="condition_availability" wire:model="condition_availability" value="Old/Existing Unit">
                                                                                <label for="Old/Existing Unit" class="text-sm font-semibold">Old/Existing Unit</label><br>
                                                                            </div>
                                                                        </div>
                                                                        @error('type_of_hrconcern')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                                x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                </div>
                                                                    <div id="type_of_hrconcern_container" class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                                        <label
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Equipment Type
                                                                            <span class="text-red-600">*</span></label>
                                                                        <select id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                            <option selected>Select</option>
                                                                            <option value="Laptop">Laptop</option>
                                                                            <option value="Printer">Printer</option>
                                                                            <option value="Monitor">Monitor</option>
                                                                            <option value="Mouse">Mouse</option>
                                                                            <option value="Laptop Charger / Adapter">Laptop Charger / Adapter</option>
                                                                            <option value="Keyboard">Keyboard</option>
                                                                            <option value="LAN Dangle">LAN Dangle</option>
                                                                            <option value="HDMI to LAN Converter">HDMI to LAN Converter</option>
                                                                            <option value="Numeric Keypad">Numeric Keypad</option>
                                                                            <option value="Extension Cord">Extension Cord</option>
                                                                            <option value="Others">Others</option>
                                                                        </select>
                                                                        @error('type_of_hrconcern')
                                                                            <div class="text-sm transition transform alert alert-danger"
                                                                            x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                                                            </div>
                                                                        @enderror
                                                                    </div>

                                                            </div>
                                                        @endif
                                                </div>
                                            @elseif ($type_of_request == "Cash Advance")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow pb-11 dark:bg-gray-800 dark:border-gray-700 ">
                                                            <div class="w-full">
                                                                <label for="request_date"
                                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Date of Cash Advance Request
                                                                    <span class="text-red-600">*</span></label>
                                                                <input type="date" name="request_date" id="request_date" wire:model.live="request_date"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                    required>
                                                                @error('request_date')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div id="request_link_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="request_link"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Paste the link related to your concern (CA)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="request_link" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('request_link')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif ($type_of_request == "Liquidation")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">CA Liquidation Coverage
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div id="request_link_container"  class="grid items-start grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                                            <label for="request_link"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Paste the link related to your concern (Liquidation)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="request_link" class="grid grid-cols-1">
                                                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="Share the link of your Email / Knox Approval below."
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('request_link')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif ($type_of_ticket == "HR Operations")
                                            @if ($type_of_request == "Performance Monitoring Request")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="type_of_pe_hr_ops"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Request (Leave)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="type_of_pe_hr_ops_container" class="grid grid-cols-1">
                                                                <select name="type_of_pe_hr_ops" wire:model.live="type_of_pe_hr_ops"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option selected>Select</option>
                                                                    <option value="3rd Month">3rd Month</option>
                                                                    <option value="5th Month">5th Month</option>
                                                                    <option value="Annual">Annual</option>
                                                                    <option value="Semi-Annual">Semi-Annual</option>
                                                                    <option value="Employee Movement">Employee Movement</option>
                                                                </select>
                                                                @error('type_of_pe_hr_ops')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('type_of_pe_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_pe_hr_ops_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="grid grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="account_client_hr_ops"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Type of Request (Leave)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="account_client_hr_opscontainer" class="grid grid-cols-1">
                                                                <select name="account_client_hr_ops" wire:model.live="account_client_hr_ops"
                                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                    <option selected>Select</option>
                                                                    <option value="Option 1">Option 1</option>
                                                                    <option value="Option 2">Option 2</option>
                                                                </select>
                                                                @error('account_client_hr_ops')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                    x-data x-init="document.getElementById('account_client_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('account_client_hr_ops_container').focus();" >
                                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            @elseif($type_of_request == "Incident Report")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div id="type_of_hrconcern_container" class="grid w-full grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 " id="type_of_hrconcern_container">
                                                            <label for="type_of_hrconcerns"
                                                                class="pb-4 mb-2 text-sm font-medium text-gray-900 dark:text-white ">Level of Offense
                                                                <span class="text-red-600">*</span></label>
                                                                <div class="grid items-start w-full grid-cols-1 gap-4 pl-4">
                                                                    <div>
                                                                        <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="High" id="new" wire:model="type_of_hrconcern" value="High">
                                                                        <label for="High" class="text-sm font-semibold">High</label>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Medium" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Medium">
                                                                        <label for="Medium" class="text-sm font-semibold">Medium</label><br>
                                                                    </div>
                                                                    <div>
                                                                        <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Low" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Low">
                                                                        <label for="Low" class="text-sm font-semibold">Low</label><br>
                                                                    </div>
                                                                </div>
                                                                @error('type_of_hrconcern')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                        </div>

                                                        <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Incident Report
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" placeholder="(Please write the description)"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($type_of_request == "Request for Issuance of Notice/Letter")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="grid items-start grid-cols-1 col-span-2 gap-4 ">
                                                        <div id="type_of_hrconcern_container" class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of Notice
                                                                <span class="text-red-600">*</span></label>
                                                            <select id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                <option selected>Select</option>
                                                                <option value="End of Assignment">End of Assignment</option>
                                                                <option value="Extension of Assignment/Project">Extension of Assignment/Project</option>
                                                                <option value="End of Project">End of Project</option>
                                                                <option value="Employee Movement">Employee Movement</option>
                                                            </select>
                                                            @error('type_of_hrconcern')
                                                                <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();" >
                                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($type_of_request == "Request for Employee Files")
                                                <div class="grid grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                    <p class="font-bold text-red-700">Other Information</p>
                                                    <div class="grid grid-cols-1 col-span-2 min-[902px]:grid-cols-2 gap-4 items-start ">
                                                        <div id="purpose_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Purpose of Request (Employee Files)
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="purpose" class="grid grid-cols-1">
                                                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" placeholder="(Please write the description)"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('purpose')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div id="request_requested_container"  class="grid h-auto grid-cols-1 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                                            <label for="purpose"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Document/s Needed
                                                                <span class="text-red-600">*</span></label>
                                                            <div id="request_requested" class="grid grid-cols-1">
                                                                <textarea type="text" rows="5" id="request_requested" name="request_requested" wire:model="request_requested"
                                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                                </textarea>
                                                                @error('request_requested')
                                                                    <div class="text-sm transition transform alert alert-danger"
                                                                        x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();" >
                                                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                        <br>
                                            <div class="col-span-3   p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                    Name of Concerned Employee <span class="text-red-600">*</span>
                                                </label>
                                                <input
                                                    type="text"
                                                    wire:model="concerned_employee"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                                    placeholder="Name of Concerned Employee"
                                                    required
                                                >
                                                @error('concerned_employee')
                                                    <div class="text-sm transition transform alert alert-danger"
                                                        x-data
                                                        x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();">
                                                        <span class="text-xs text-red-500">{{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                    </div>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-customRed shadow hover:bg-customRed hover:text-white bg-navButton rounded-8px">
                    Submit HR Ticket
                </button>
                <!-- Loading screen -->
                <div wire:loading wire:target="submit" class="load-over">
                    <div wire:loading wire:target="submit" class="loading-overlay">
                        <div class="flex flex-col justify-center items-center">
                            <div class="spinner"></div>
                            <p>Submitting your HR Ticket...</p>
                        </div>
                    </div>
                </div>

                
                <div id="toast-success" tabindex="-1" class="fixed inset-0 z-50 flex items-center justify-center hidden w-full h-full bg-gray-800 bg-opacity-50">
                    <div id="toast-success-checkin" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60 dark:text-gray-400 dark:bg-gray-800" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                            </svg>
                            <span class="sr-only">Check icon</span>
                        </div>
                        <div class="text-sm font-normal ms-3">HR Ticket <br> Submitted Successfully</div>
                        <button id="close-toast-checkin" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
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

    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerNotification', () => {
            // Show the modal
            const modal = document.getElementById('toast-success');
            if (modal) {
                modal.classList.remove('hidden');
            }
        });
    });

    </script>
</div>
