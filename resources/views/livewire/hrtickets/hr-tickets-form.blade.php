<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed">
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
            <a href="{{route('HrTicketsTable', ['type' => $type])}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2">HR Ticket</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-customRed ms-1 md:ms-2">Form</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">HR Ticket Form</h2>
    <form wire:submit.prevent="submit" method="POST" class="flex flex-col gap-4 p-8 mt-10 bg-white rounded-lg"  x-data="{ typeOfTicket: $wire.entangle('type_of_ticket'), typeOfRequest: $wire.entangle('type_of_request'), subTypeOfRequest: $wire.entangle('sub_type_of_request'), typeOfHrConcern: $wire.entangle('type_of_hrconcern')}">
        @csrf
        {{-- Information field --}}
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-customRed">Employee Information</h2>
            <div class="grid grid-cols-1 min-[902px]:grid-cols-6 gap-4">
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="firstname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">First Name</label>
                    <input type="text" name="firstname" id="firstname"  value="{{$first_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="middlename" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Middle Name</label>
                    <input type="text" name="middlename" id="middlename" value="{{$middle_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Last Name</label>
                    <input type="text" name="lastname" id="lastname"  value="{{$last_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="employee_email" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Employee Email</label>
                    <input type="text" name="employee_email" id="employee_email"  value="{{$employee_email}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Employee ID</label>
                    <input type="text" name="" id="employee_id"  value="{{$employee_id}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
            </div>
        </div>
        <hr class="my-2 border-gray-300">
        {{-- Leave Information --}}
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-customRed">Ticket Information</h2>
            <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
                <div class="col-span-2">
                    <label for="application_date" class="block mb-2 text-sm font-medium text-gray-500">Date of Filing</label>
                    <input type="date" wire:model="application_date" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Date of Filing" required disabled>
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Ticket Type <span class="text-red-600">*</span></label>
                    <select id="type_of_ticket" name="type_of_ticket" wire:model.live="type_of_ticket" required wire:change="resetTypeOfRequest"
                        class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                        <option selected>Select</option>
                        <option value="HR Internal">HR Internal</option>
                        <option value="Internal Control">Internal Control</option>
                        <option value="HR Operations">HR Operations</option>
                    </select>
                    @error('type_of_ticket')
                        <div class="text-sm transition transform alert alert-danger" x-init="document.getElementById('type_of_ticket_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_ticket_container').focus();">
                            <span class="text-xs text-red-500">{{$message}}</span>
                        </div>
                    @enderror
                </div>
        
                <!-- HR Operations Dropdown -->
                <template x-if="typeOfTicket === 'HR Operations'">
                    <div id="type_of_request_container" class="col-span-2 lg:col-start-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of HR Operations Request <span class="text-red-600">*</span></label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest"
                            class="bg-gray-50 border border-gray-900 text-gray-900 shadow-inner text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Performance Monitoring Request">Performance Monitoring Request</option>
                            <option value="Incident Report">Incident Report</option>
                            <option value="Request for Issuance of Notice/Letter">Request for Issuance of Notice/Letter</option>
                            <option value="Request for Employee Files">Request for Employee Files</option>
                        </select>
                        @error('type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>
        
                <!-- Internal Control Dropdown -->
                <template x-if="typeOfTicket === 'Internal Control'">
                    <div id="type_of_request_container" class="col-span-2 lg:col-start-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of Internal Control Request <span class="text-red-600">*</span></label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest"
                            class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:customRed focus:ring-customRed focus:border-customRed w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Reimbursements">Reimbursements</option>
                            <option value="Tools and Equipment">Tools and Equipment</option>
                            <option value="Cash Advance">Cash Advance</option>
                            <option value="Liquidation">Liquidation</option>
                        </select>
                        @error('type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>
        
                <!-- HR Internal Dropdown -->
                <template x-if="typeOfTicket === 'HR Internal'">
                    <div id="type_of_request_container" class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of HR Internal Request <span class="text-red-600">*</span></label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest"
                            class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="HR">HR</option>
                            <option value="Office Admin">Office Admin</option>
                            <option value="Procurement">Procurement</option>
                        </select>
                        @error('type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>
        
                <!-- HR Internal - Office Admin Sub Dropdown -->
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin'">
                    <div id="sub_type_of_request_container" class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of Office Admin Requests <span class="text-red-600">*</span></label>
                        <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                            class="bg-gray-50 border border-gray-900 text-gray-900 text-sm shadow-inner rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Certificate of Remittances">Certificate of Remittances </option>
                            <option value="Government-Mandated Benefits Concern">Government-Mandated Benefits Concerns</option>
                            <option value="Messengerial">Messengerial</option>
                            <option value="Repairs/Maintenance">Repairs/Maintenance</option>
                            <option value="Book a Car">Book a Car</option>
                            <option value="Book a Meeting Room">Book a Meeting Room</option>
                            <option value="Office Supplies">Office Supplies</option>
                        </select>
                        @error('sub_type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Procurement'">
                    <div id="sub_type_of_request_container" class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of Procurement Requests
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                            class="bg-gray-50 border border-gray-900 text-gray-900 text-sm shadow-inner rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Request for Quotation">Request for Quotation</option>
                            <option value="Request to Buy/Book/Avail Service">Request to Buy/Book/Avail Service</option>
                        </select>
                        @error('sub_type_of_request')
                            <div class="text-sm transition transform alert alert-danger"
                            x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'HR'">
                    <div id="sub_type_of_request_container" class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of HR Requests
                            <span class="text-red-600">*</span>
                        </label>
                        <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                            class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Manpower Request Form">Manpower Request Form</option>
                            <option value="Certificate of Employment">Certificate of Employment</option>
                            <option value="HMO-related Concerns">HMO-Related Concerns</option>
                            <option value="Payroll-related Concerns">Payroll-Related Concerns</option>
                            <option value="Leave Concerns">Leave Concerns</option>
                            <option value="Request for Consultation">Request for Consultation</option>
                            <option value="Request for a Meeting">Request for a Meeting</option>
                        </select>
                        @error('sub_type_of_request')
                            <div class="text-sm transition transform alert alert-danger"
                            x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>
                <!-- Additional Sub Dropdowns can follow the same pattern -->
            </div>
        </div>
        
        {{-- Other Information  --}}
        <template x-if="((typeOfTicket === 'Internal Control' || typeOfTicket === 'HR Operations') && typeOfRequest !== null) || (typeOfTicket === 'HR Internal' && typeOfRequest !== null && subTypeOfRequest !== null)">
            <div>
            <hr class="my-2 border-gray-300">
            <div class="flex flex-col gap-4">
                <h2 class="font-bold text-customRed mt-5">Other Information</h2>
                <template x-if="typeOfTicket == 'HR Internal' && typeOfRequest == 'HR' && subTypeOfRequest == 'Certificate of Employment'">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Requesting CoE
                                <span class="text-red-600">*</span>
                            </label>
                            <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required
                                class="block p-2.5 w-full text-sm text-gray-900 shadow-inner bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed" placeholder="Please share the purpose here.">
                            </textarea>
                            @error('purpose')
                                <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_request" class="block mb-2 text-sm font-medium text-gray-900">Commutation
                                <span class="text-red-600">*</span>
                            </label>
                            <div class="grid grid-cols-1 gap-2 w-full md:grid-cols-2 p-4 border border-gray-900 rounded-lg shadow-inner bg-gray-50">
                                <div>
                                    <input type="radio" required class="text-customRed border-customRed focus:ring-customRed" name="type_of_hrconcern" id="with_compensation" wire:model="type_of_hrconcern" value="With Compensation">
                                    <label for="with_compensation" class="text-sm font-medium">With Compensation</label>
                                </div>
                                <div>
                                    <input type="radio" required class="text-customRed border-customRed focus:ring-customRed" id="without_compensation" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Without Compensation">
                                    <label for="without_compensation" class="text-sm font-medium">Without Compensation</label><br>
                                </div>
                            </div>
                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'HR' && subTypeOfRequest === 'HMO-related Concerns'">  
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900 ">Type of HMO Concern
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" required wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="Availment of Service">Availment of Service</option>
                                    <option value="Card Replacement">Card Replacement</option>
                                    <option value="Reimbursement">Reimbursement</option>
                                    <option value="Request for Enrollment">Request for Enrollment</option>
                                    <option value="Request for Deletion">Request for Deletion</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900 ">HMO Concern Description
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm shadow-inner text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900 ">HMO Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 shadow-inner bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'HR' && subTypeOfRequest === 'Payroll-related Concerns'">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Payroll Date
                                <span class="text-red-600">*</span>
                            </label>
                            <input class="bg-gray-50 border border-gray-900 text-gray-900 shadow-inner text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                type="date" name="request_date" id="request_date" wire:model.live="request_date" required>
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Payroll Concern
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" required
                                    class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg shadow-inner focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="Overtime Pay">Overtime Pay</option>
                                    <option value="Holiday Pay">Holiday Pay</option>
                                    <option value="Deductions">Deductions</option>
                                    <option value="Others">Others</option>
                                    <option value="Request for Deletion">Request for Deletion</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Payroll Concern Description
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container"  class="grid items-start grid-cols-1 ">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Payroll Concern Link
                                <span class="text-red-600">*</span></label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('request_link_contype_of_hrconcerntainer').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'HR' && subTypeOfRequest === 'Leave Concerns'">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Leave Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" required
                                    class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg shadow-inner focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="Leave Credits">Leave Credits</option>
                                    <option value="Changes on Filed Leaves">Changes on Filed Leaves</option>
                                    <option value="Cancellation of Leaves">Cancellation of Leaves</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Leave Concern Description
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose"> 
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed" placeholder="Please provide a brief description here.">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Leave Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed" placeholder="Please enter the link here.">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'HR' && subTypeOfRequest === 'Request for Consultation'">
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Consultation Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" required
                                    class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg shadow-inner focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="High (Urgent)">High (Urgent)</option>
                                    <option value="Medium (Within the day)">Medium (Within the day)</option>
                                    <option value="Low (Can be attended the next day)">Low (Can be attended the next day)</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Consultation Concern Description
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'HR' && subTypeOfRequest === 'Request for a Meeting'">
                {{-- @if ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "Request for a Meeting") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900 ">Date of Meeting
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="datetime-local" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg shadow-inner focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger"
                                    x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}} </span>
                                </div>
                            @enderror
                        </div>
                        <div id="request_requested_container" class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900">Target Person
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="request_requested" required wire:model="request_requested" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    @foreach ($employeeNames as $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                @error('request_requested')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Meeting
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 shadow-inner focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Certificate of Remittances'">
                {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Certificate of Remittances") --}}
                    <div x-data="{requestAssigned: $wire.entangle('request_assigned')}" class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Remittance Certificate
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" required wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="SSS">SSS</option>
                                    <option value="PHILHEALTH">PHILHEALTH</option>
                                    <option value="HDMF">HDMF</option>
                                    <option value="Others">Others</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- @if ($type_of_hrconcern == "Others") --}}
                            <template x-if="typeOfHrConcern === 'Others'">
                                <div id="remittance_request_others_container" class="mt-4">
                                    <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Others
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <textarea type="text" rows="1" id="remittance_request_others" name="remittance_request_others" wire:model="remittance_request_others" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed" placeholder="Please Enter The Other Type of Remittance Certificate Here">
                                </textarea>
                                    @error('remittance_request_others')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('remittance_request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('remittance_request_others_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </template>
                        </div>
                        <div class="col-span-1">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Account Assigned
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_assigned_container">
                                <select name="request_assigned" required wire:model.live="request_assigned" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="PEI">PEI</option>
                                    <option value="SL TEMPS">SL TEMPS</option>
                                    <option value="SL SEARCH">SL SEARCH</option>
                                    <option value="WESEARCH">WESEARCH</option>
                                    <option value="Others">Others</option>
                                </select>
                                @error('request_assigned')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_assigned_containers').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_assigned_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>

                            <template x-if="requestAssigned === 'Others'">
                                <div id="request_others_container" class="mt-4">
                                    <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Others
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <textarea type="text" rows="1" id="request_extra" name="request_extra" wire:model="request_assigned_request_others" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed " placeholder="Please Enter The Other Type of Account Signed Here">
                                    </textarea>
                                    @error('request_extra')
                                        <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();">
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </template>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Requesting
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 shadow-inner focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date Start
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed shadow-inner focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Government-Mandated Benefits Concern'">
                    {{-- @if ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Government-Mandated Benefits Concern") --}}
                        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                            <div class="col-span-1 items-center justify-center">
                                <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Type of GMR Concern
                                    <span class="text-red-600">*</span>
                                </label>
                                <div id="type_of_hrconcern_container">
                                    <select name="type_of_hrconcern" required wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                        <option value=""selected>Select</option>
                                        <option value="SSS Salary Loan for Approval">SSS Salary Loan for Approval</option>
                                        <option value="SSS Calamity Loan for Approval">SSS Calamity Loan for Approval</option>
                                        <option value="PAG-IBIG Multi-Purpose Loan for Approval">PAG-IBIG Multi-Purpose Loan for Approval</option>
                                        <option value="SSS Maternity Notification">SSS Maternity Notification</option>
                                        <option value="SSS Sickness Notification">SSS Sickness Notification</option>
                                        <option value="Issuance of TIN Number">Issuance of TIN Number</option>
                                        <option value="SSS R1A">SSS R1A</option>
                                    </select>
                                    @error('type_of_hrconcern')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="request_link_container" class="col-span-1">
                                <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">GMR Concern Link
                                    <span class="text-red-600">*</span><br>
                                    <span class="text-gray-500">●</span> Supporting documents/List of requirements <br>
                                    <span class="text-gray-500">●</span> For SSS R1A and PHILHEALTH ER2, must be in Excel format.
                                </label>
                                <div id="request_link">
                                    <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed">
                                    </textarea>
                                    @error('request_link')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Messengerial'">

                {{-- @if ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Messengerial") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                        <div x-data="{typeOfHrConcern: $wire.entangle('type_of_hrconcern')}" class="col-span-1 lg:col-span-2">
                            <label for="type_of_hrconcern_container" class="block mb-2 text-sm font-medium text-gray-900"> Type of Messengerial Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" required wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="Send Document">Send Document</option>
                                    <option value="Pick-Up Document">Pick-Up Document</option>
                                    <option value="Collections">Collections</option>
                                    <option value="Others">Others</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            {{-- @if ($type_of_hrconcern == "Others") --}}
                            <template x-if="typeOfHrConcern === 'Others'">
                                <div id="messengerial_other_type_container" class="mt-4">
                                    <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Others
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                    @error('messengerial_other_type')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('messengerial_other_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('messengerial_other_type_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </template>
                        </div>
                        <div id="request_requested_container" class="col-span-1 lg:col-span-2">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900"> Company
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_requested">
                                <textarea type="text" rows="2" id="request_requested" name="request_requested" wire:model="request_requested" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 shadow-inner focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_requested')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_assigned_container" class="col-span-1 lg:col-span-2">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Contact Person
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_assigned">
                                <textarea type="text" rows="2" id="request_assigned" name="request_assigned" wire:model="request_assigned" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 shadow-inner focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_assigned')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_assigned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_assigned_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_others_container"  class="col-span-1 lg:col-span-3">
                            <label for="request_extra" class="block mb-2 text-sm font-medium text-gray-900">Address of Messengerial Destination
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_extra">
                                <textarea type="text" rows="2" id="request_extra" name="request_extra" wire:model="request_extra" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 shadow-inner focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_extra')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-1 lg:col-span-3">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date of Messengerial Pick Up or Send Off
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required required
                                class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed shadow-inner focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Repairs/Maintenance'">
                    {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Repairs/Maintenance") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="grid grid-cols-1 md:grid-cols-5 col-span-1 gap-4 p-4 border border-gray-200 rounded-lg shadow lg:col-span-2">
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong>1. Electrical Issues Checklist:</strong></h1>
                                <li class="ml-4"> <span  class="text-customRed ">◦ </span>  Malfunctioning outlets or switches</li>
                                <li class="ml-4"> <span class="text-customRed">◦ </span> Flickering or dimming lights</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong>2. Plumbing Problems: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Leaking faucets or pipes</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Clogged drains or toilets</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Running toilets</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Low water pressure</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Water heater issues</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong>3. HVAC (Heating, Ventilation, and Air Conditioning): </strong> </h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Heating or cooling system not working</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Poor air quality</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Strange odors coming from vents</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Air vents blocked or not blowing air</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Thermostat malfunctioning</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong> 4. Structural Issues: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Cracks or holes in walls or ceilings</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Damaged or loose tiles or flooring</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Broken windows or doors</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Issues with elevators or escalators</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Sagging or uneven floors</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong>5. Safety Concerns: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Broken handrails or guardrails</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Loose or unstable furniture</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Damaged fire safety equipment (fire alarms, extinguishers, etc.)</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Missing or damaged safety signs</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Slippery or uneven surfaces</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong> 6. Equipment and Machinery: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Malfunctioning office equipment (printers, computers, etc.)</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Broken or jammed machinery in manufacturing or industrial settings</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Issues with tools or equipment in workshops or construction sites</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Safety guards or mechanisms not functioning properly</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong> 7. Environmental Concerns: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Pest infestations (rodents, insects, etc.)</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Mold or mildew growth</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Environmental hazards (asbestos, lead paint, etc.)</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Water leaks or flooding</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Ventilation problems leading to stuffy or overly hot/cold areas</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong> 8. Accessibility: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Broken or malfunctioning wheelchair ramps or lifts</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Inaccessible doorways or pathways</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Issues with automatic doors or door openers</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Lack of accessible restroom facilities</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong>9. General Maintenance: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Painting or repainting needs</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Cleaning or janitorial requests</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Replacing damaged or worn-out furnishings</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Repairing or replacing damaged fencing or barriers</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Graffiti removal</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1 class="text-customRed"><strong> 10. Security Concerns: </strong></h1>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Malfunctioning security cameras or alarms</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Broken locks or doors</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Unsecured entry points</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Damage to fences or barriers</li>
                                <li class="ml-4"> <span class="text-customRed">◦</span> Issues with access control systems</li>
                            </ul>
                        </div>
                        <div class="col-span-1">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Type of Repairs and Maintenance Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" required wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
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
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            @if ($type_of_hrconcern == "Others")
                                <div id="messengerial_other_type_container"  class="mt-4">
                                    <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Others
                                        <span class="text-red-600">*</span>
                                    </label>
                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
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
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Concerned Area
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" placeholder="Indicate the floor, area and department." required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 shadow-inner focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Book a Car'">

                    {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Book a Car") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date and Time of Departure
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="datetime-local" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900">Date and Time of Pick-Up
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="datetime-local" name="request_requested" id="request_requested" wire:model.live="request_requested" required
                                class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_requested')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="account_client_hr_ops_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Passenger/s Name
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="account_client_hr_ops">
                                <input type="text" name="account_client_hr_ops" id="account_client_hr_ops" wire:model.live="account_client_hr_ops" required
                                    class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                @error('account_client_hr_ops')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('account_client_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('account_client_hr_ops_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Address of Destination
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <input type="text" name="purpose" id="purpose" wire:model="purpose" required 
                                    class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Book a Meeting Room'">
                    {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Book a Meeting Room") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900">End Date
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested" required
                                class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_requested')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Room
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_requested_container">
                                <select name="type_of_hrconcern" required wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="Training Room">Training Room</option>
                                    <option value="Villa Office">Villa Office</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Booking
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Office Admin' && subTypeOfRequest === 'Office Supplies'">
                    {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Office Supplies") --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-4 gap-x-8">
                        <div class="grid grid-cols-1 col-span-1 gap-4">
                            <div id="supplies_request.ballpen_black_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_black" class="text-sm font-medium text-gray-900">Ballpen Black</label>
                                    <input type="number" id="supplies_request.ballpen_black" name="supplies_request.ballpen_black" 
                                           wire:model="supplies_request.ballpen_black" min="0"
                                           oninput="this.value = this.value < 0 ? 0 : this.value"
                                           class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed">
                                    @error('supplies_request.ballpen_black')
                                        <div class="text-sm transition transform alert alert-danger" 
                                             x-data x-init="document.getElementById('supplies_request.ballpen_black').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_black').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                                
                            </div>
                            <div id="supplies_request.ballpen_blue_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_blue" class="text-sm font-medium text-gray-900">Ballpen Blue</label>
                                    <input type="number" id="supplies_request.ballpen_blue" name="supplies_request.ballpen_blue" 
                                        wire:model="supplies_request.ballpen_blue"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed">
                                    @error('supplies_request.ballpen_blue')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.ballpen_blue').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_blue').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.ballpen_red_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_red" class="text-sm font-medium text-gray-900">Ballpen Red</label>
                                    <input type="number" id="supplies_request.ballpen_red" name="supplies_request.ballpen_red" wire:model="supplies_request.ballpen_red"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.ballpen_red')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.ballpen_red').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_red').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.pencil_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.pencil" class="text-sm font-medium text-gray-900">Pencil</label>
                                    <input type="number" id="supplies_request.pencil" name="supplies_request.pencil" 
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.pencil"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.pencil')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.pencil').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.pencil').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.highlighter_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.highlighter" class="text-sm font-medium text-gray-900">Highlighter</label>
                                    <input type="number" id="supplies_request.highlighter" name="supplies_request.highlighter" 
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.highlighter"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner bord\er-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.highlighter')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.highlighter').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.highlighter').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.permanent_marker_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.permanent_marker" class="text-sm font-medium text-gray-900">Permanent Marker</label>
                                    <input type="number" id="supplies_request.permanent_marker" name="supplies_request.permanent_marker" 
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.permanent_marker"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.permanent_marker')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.permanent_marker').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.permanent_marker').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.correction_tape_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.correction_tape" class="text-sm font-medium text-gray-900">Correction Tape</label>
                                    <input type="number" id="supplies_request.correction_tape" name="supplies_request.correction_tape" 
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.correction_tape"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.correction_tape')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.correction_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.correction_tape').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_green_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_green_exp_folder" class="text-sm font-medium text-gray-900">Green Expandable Folder (L)</label>
                                    <input type="number" id="supplies_request.l_green_exp_folder" name="supplies_request.l_green_exp_folder"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.l_green_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.l_green_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_green_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_green_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_green_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_green_exp_folder" class="text-sm font-medium text-gray-900">Green Expandable Folder (S)</label>
                                    <input type="number" id="supplies_request.s_green_exp_folder" name="supplies_request.s_green_exp_folder" 
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.s_green_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.s_green_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_green_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_green_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_brown_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_brown_exp_folder" class="text-sm font-medium text-gray-900">Brown Expandable Folder (L)</label>
                                    <input type="number" id="supplies_request.l_brown_exp_folder" name="supplies_request.l_brown_exp_folder"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.l_brown_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.l_brown_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_brown_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_brown_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_brown_exp_folder" class="text-sm font-medium text-gray-900">Brown Expandable Folder (S)</label>
                                    <input type="number" id="supplies_request.s_brown_exp_folder" name="supplies_request.s_brown_exp_folder"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.s_brown_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.s_brown_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_brown_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.scissors_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.scissors" class="text-sm font-medium text-gray-900">Scissors</label>
                                    <input type="number" id="supplies_request.scissors" name="supplies_request.scissors"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.scissors"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.scissors')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.scissors').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scissors').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.white_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.white_envelope" class="text-sm font-medium text-gray-900">White Envelope</label>
                                    <input type="number" id="supplies_request.white_envelope" name="supplies_request.white_envelope"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value" 
                                        wire:model="supplies_request.white_envelope"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.white_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.white_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.white_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 col-span-1 gap-4">
                            <div id="supplies_request.calculator_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.calculator" class="text-sm font-medium text-gray-900">Calculator</label>
                                    <input type="number" id="supplies_request.calculator" name="supplies_request.calculator"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.calculator"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.calculator')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.calculator').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.calculator').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.binder_two_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_two" class="text-sm font-medium text-gray-900">Binder Clips (2")</label>
                                    <input type="number" id="supplies_request.binder_two" name="supplies_request.binder_two"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.binder_two"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.binder_two')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_two').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_two').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.binder_one_fourth_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_one_fourth" class="text-sm font-medium text-gray-900">Binder Clips (1 1/4")</label>
                                    <input type="number" id="supplies_request.binder_one_fourth" name="supplies_request.binder_one_fourth"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.binder_one_fourth"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.binder_one_fourth')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_one_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_one_fourth').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.binder_three_fourth_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_three_fourth" class="text-sm font-medium text-gray-900">Binder Clips (3/4")</label>
                                    <input type="number" id="supplies_request.binder_three_fourth" name="supplies_request.binder_three_fourth"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.binder_three_fourth"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.binder_three_fourth')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_three_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_three_fourth').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.l_metal_clips_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_metal_clips" class="text-sm font-medium text-gray-900">Metal Paper Clips (L)</label>
                                    <input type="number" id="supplies_request.l_metal_clips" name="supplies_request.l_metal_clips"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.l_metal_clips"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.l_metal_clips')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_metal_clips').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.s_metal_clips_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_metal_clips" class="text-sm font-medium text-gray-900">Metal Paper Clips (L)</label>
                                    <input type="number" id="supplies_request.s_metal_clips" name="supplies_request.s_metal_clips"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.s_metal_clips"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.s_metal_clips')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_metal_clips').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.stapler_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.stapler" class="text-sm font-medium text-gray-900">Stapler</label>
                                    <input type="number" id="supplies_request.stapler" name="supplies_request.stapler"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.stapler"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.stapler')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.stapler').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.stapler_wire_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.stapler_wire" class="text-sm font-medium text-gray-900">Stapler Wire</label>
                                    <input type="number" id="supplies_request.stapler_wire" name="supplies_request.stapler_wire"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.stapler_wire"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.stapler_wire')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.stapler_wire').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler_wire').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.scotch_tape_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.scotch_tape" class="text-sm font-medium text-gray-900">Scotch Tape</label>
                                    <input type="number" id="supplies_request.scotch_tape" name="supplies_request.scotch_tape"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.scotch_tape"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.scotch_tape')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.scotch_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scotch_tape').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.l_brown_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_brown_envelope" class="text-sm font-medium text-gray-900">Brown Envelope (L)</label>
                                    <input type="number" id="supplies_request.l_brown_envelope" name="supplies_request.l_brown_envelope"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.l_brown_envelope"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.l_brown_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.s_brown_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_brown_envelope" class="text-sm font-medium text-gray-900">Brown Envelope (S)</label>
                                    <input type="number" id="supplies_request.s_brown_envelope" name="supplies_request.s_brown_envelope"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.s_brown_envelope"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.s_brown_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.post_it_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.post_it" class="text-sm font-medium text-gray-900">Post It</label>
                                    <input type="number" id="supplies_request.post_it" name="supplies_request.post_it"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.post_it"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                    {{-- @error('supplies_request.post_it')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.post_it').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.post_it').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror --}}
                                </div>
                            </div>
                            <div id="supplies_request.white_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.white_folder" class="text-sm font-medium text-gray-900">White Folder</label>
                                    <input type="number" id="supplies_request.white_folder" name="supplies_request.white_folder"
                                        min="0"
                                        oninput="this.value = this.value < 0 ? 0 : this.value"
                                        wire:model="supplies_request.white_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">

                                </div>
                            </div>

                        </div>
                        @error('supplies_request')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.white_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.white_folder').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Procurement' && subTypeOfRequest === 'Request for Quotation'">
                    {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Procurement" && $sub_type_of_request == "Request for Quotation") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Quotation Specifications
                                <span class="text-red-600">*</span><br>
                            </label>
                            <div id="type_of_hrconcern">
                                <textarea type="text" required rows="4" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Make sure to include the complete details such as color, size, code, etc."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="4" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Quotation Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="4" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Internal' && typeOfRequest === 'Procurement' && subTypeOfRequest === 'Request to Buy/Book/Avail Service'">
                    {{-- @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Procurement" && $sub_type_of_request == "Request to Buy/Book/Avail Service") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Product/Service Specifications
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="type_of_hrconcern">
                                <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Service Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'Internal Control' && typeOfRequest === 'Reimbursements'">
                    {{-- @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Reimbursements") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Cut-Off Date
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Reimbursement Description
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 shadow-inner bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Reimbursement Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="(Payslips, Timesheet, etc.)" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                
                <template x-if="typeOfTicket === 'Internal Control' && typeOfRequest === 'Tools and Equipment'">
                    {{-- @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Tools and Equipment") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="condition_availability" class="block mb-2 text-sm font-medium text-gray-900">Condition/Availability
                                <span class="text-red-600">*</span>
                            </label>
                            <div class="grid w-full grid-cols-1 sm:grid-cols-2 p-4 border border-gray-900 rounded-lg shadow-inner bg-gray-50">
                                <div>
                                    <input type="radio" required class="text-customRed border-customRed focus:ring-customRed" name="condition_availability" id="new" wire:model="condition_availability" value="New">
                                    <label for="New" class="text-sm font-medium">New</label>
                                </div>
                                <div>
                                    <input type="radio" required class="text-customRed border-customRed focus:ring-customRed" id="Old/Existing Unit" name="condition_availability" wire:model="condition_availability" value="Old/Existing Unit">
                                    <label for="Old/Existing Unit" class="text-sm font-medium">Old/Existing Unit</label><br>
                                </div>
                            </div>

                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Equipment Type
                                <span class="text-red-600">*</span>
                            </label>
                            <select id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5" required>
                                <option value="" selected>Select</option>
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
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                            {{-- @if ($type_of_hrconcern == "Others") --}}
                            <template x-if="typeOfHrConcern === 'Others'">
                                <div id="purpose_container" class="mt-4">
                                    <div id="purpose">
                                        <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Others
                                            <span class="text-red-600">*</span>
                                        </label>
                                        <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required
                                            class="block p-2.5 w-full text-sm text-gray-900 shadow-inner bg-gray-50 rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                        </textarea>
                                        @error('purpose')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                                <span class="text-xs text-red-500">{{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'Internal Control' && typeOfRequest === 'Cash Advance'">
                    {{-- @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Cash Advance") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date of Cash Advance Request
                                <span class="text-red-600">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-900 text-gray-900 shadow-inner text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Cash Advance Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 shadow-inner rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'Internal Control' && typeOfRequest === 'Liquidation'">
                    {{-- @if ($type_of_ticket == "Internal Control" && $type_of_request == "Liquidation") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Liquidation Coverage
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Liquidation Concern Link
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Operations' && typeOfRequest === 'Performance Monitoring Request'">
                    {{-- @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Performance Monitoring Request") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="type_of_pe_hr_ops" class="block mb-2 text-sm font-medium text-gray-900">Type of Performance Monitoring Request
                                <span class="text-red-600">*</span></label>
                            <div id="type_of_pe_hr_ops_container">
                                <select name="type_of_pe_hr_ops" required wire:model.live="type_of_pe_hr_ops" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 ">
                                    <option value=""selected>Select</option>
                                    <option value="3rd Month">3rd Month</option>
                                    <option value="5th Month">5th Month</option>
                                    <option value="Annual">Annual</option>
                                    <option value="Semi-Annual">Semi-Annual</option>
                                    <option value="Employee Movement">Employee Movement</option>
                                </select>
                                @error('type_of_pe_hr_ops')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_pe_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_pe_hr_ops_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="account_client_hr_ops" class="block mb-2 text-sm font-medium text-gray-900">Account/Client 
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="account_client_hr_opscontainer">
                                <select name="account_client_hr_ops" required wire:model.live="account_client_hr_ops" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option value=""selected>Select</option>
                                    <option value="Option 1">Option 1</option>
                                    <option value="Option 2">Option 2</option>
                                </select>
                                @error('account_client_hr_ops')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('account_client_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('account_client_hr_ops_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Operations' && typeOfRequest === 'Incident Report'">
                    {{-- @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Incident Report") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcerns" class="block mb-2 text-sm font-medium text-gray-900">Level of Offense
                                <span class="text-red-600">*</span>
                            </label>
                            <div class="grid w-full grid-cols-1 sm:grid-cols-3 p-4 border border-gray-900 rounded-lg shadow-inner bg-gray-50">
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="type_of_hrconcern" id="High" wire:model="type_of_hrconcern" value="High" required>
                                    <label for="High" class="text-sm font-medium">High</label>
                                </div>
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Medium" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Medium" required>
                                    <label for="Medium" class="text-sm font-medium">Medium</label>
                                </div>
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Low" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Low" required>
                                    <label for="Low" class="text-sm font-medium">Low</label>
                                </div>
                            </div>
                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Incident Report
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" required placeholder="Please provide a brief description here."
                                    class="block p-2.5 w-full text-sm text-gray-900 shadow-inner bg-gray-50 shadow-inner rounded-lg border border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Operations' && typeOfRequest === 'Request for Issuance of Notice/Letter'">
                    {{-- @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Request for Issuance of Notice/Letter") --}}
                    <div class="grid grid-cols-1 gap-4">
                        <div id="type_of_hrconcern_container">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Type of Notice
                                <span class="text-red-600">*</span>
                            </label>
                            <select id="type_of_hrconcern" required name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                <option value=""selected>Select</option>
                                <option value="End of Assignment">End of Assignment</option>
                                <option value="Extension of Assignment/Project">Extension of Assignment/Project</option>
                                <option value="End of Project">End of Project</option>
                                <option value="Employee Movement">Employee Movement</option>
                            </select>
                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                </template>

                <template x-if="typeOfTicket === 'HR Operations' && typeOfRequest === 'Request for Employee Files'">
                    {{-- @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Request for Employee Files") --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Employee Files Request
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_requested_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Document/s Needed
                                <span class="text-red-600">*</span>
                            </label>
                            <div id="request_requested">
                                <textarea type="text" rows="5" id="request_requested" name="request_requested" wire:model="request_requested" required
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border shadow-inner border-gray-900 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_requested')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </template>
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Name of Concerned Employee
                        <span class="text-red-600">*</span>
                    </label>
                    <input type="text" wire:model="concerned_employee"  required
                        class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                    @error('concerned_employee')
                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();">
                            <span class="text-xs text-red-500">{{$message}}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 mt-10 justify-items-end">
                <button type="submit" class="col-span-1 col-start-2 inline-flex items-center font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                        <path d="M2.87 2.298a.75.75 0 0 0-.812 1.021L3.39 6.624a1 1 0 0 0 .928.626H8.25a.75.75 0 0 1 0 1.5H4.318a1 1 0 0 0-.927.626l-1.333 3.305a.75.75 0 0 0 .811 1.022 24.89 24.89 0 0 0 11.668-5.115.75.75 0 0 0 0-1.175A24.89 24.89 0 0 0 2.869 2.298Z" />
                    </svg>
                    Submit HR Ticket
                </button>
            </div>
            </div>
        </template>

        
        <!-- Loading screen -->
        <div wire:loading wire:target="submit" class="load-over">
            <div wire:loading wire:target="submit" class="loading-overlay">
                <div class="flex flex-col items-center justify-center">
                    <div class="spinner"></div>
                    <p>Submitting your HR Ticket...</p>
                </div>
            </div>
        </div>

        <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
            @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'HR Ticket Created'; setTimeout(() => showToast = false, 3000)"
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
    </form>
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
    //     Livewire.on('triggerSuccess', () => {
    //         window.dispatchEvent(new CustomEvent('trigger-success'));
    //     });
    //     Livewire.on('triggerError', () => {
    //         window.dispatchEvent(new CustomEvent('trigger-error'));
    //     });
    // });
</script>
</div>
