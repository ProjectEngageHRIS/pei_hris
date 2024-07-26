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
            <span class="text-sm font-semibold text-customRed ms-1 md:ms-2">Apply for HR Ticket</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">Apply For HR Ticket</h2>
    <form wire:submit.prevent="submit" method="POST" class="flex flex-col gap-4 p-8 mt-10 bg-white rounded-lg">
        @csrf
        {{-- Information field --}}
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-customRed">Employee Information</h2>
            <div class="grid grid-cols-1 min-[902px]:grid-cols-6 gap-4">
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="firstname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">First name</label>
                    <input type="text" name="firstname" id="firstname"  value="{{$first_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="middlename" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Middle name</label>
                    <input type="text" name="middlename" id="middlename" value="{{$middle_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Last name</label>
                    <input type="text" name="lastname" id="lastname"  value="{{$last_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="employee_email" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Employee Email</label>
                    <input type="text" name="employee_email" id="employee_email"  value="{{$employee_email}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Employee ID</label>
                    <input type="text" name="" id="employee_id"  value="{{$employee_id}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
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
                    <input type="date" wire:model="application_date" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                        placeholder="Date of Filing" required disabled>
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Ticket Type
                        <span class="text-customRed">*</span>
                    </label>
                    <select id="type_of_ticket" name="type_of_ticket" wire:model.live="type_of_ticket" id="type_of_ticket_container" required wire:change="resetTypeOfRequest"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                        <option selected>Select</option>
                        <option value="HR Internal">HR Internal</option>
                        <option value="Internal Control">Internal Control</option>
                        <option value="HR Operations">HR Operations</option>
                    </select>
                    @error('type_of_ticket')
                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_ticket_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_ticket_container').focus();">
                            <span class="text-xs text-red-500">{{$message}}</span>
                        </div>
                    @enderror
                </div>
                @if ($type_of_ticket == "HR Operations")
                    <div id="type_of_request_container" class="col-span-2 lg:col-start-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of Request (HR Operations)
                            <span class="text-customRed">*</span>
                        </label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Performance Monitoring Request">Performance Monitoring Request</option>
                            <option value="Incident Report">Incident Report</option>
                            <option value="Request for Issuance of Notice/Letter">Request for Issuance of Notice/Letter</option>
                            <option value="Request for Employee Files">Request for Employee Files</option>
                        </select>
                        @error('type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                @elseif ($type_of_ticket == "Internal Control")
                    <div id="type_of_request_container" class="col-span-2 lg:col-start-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Type of Request (Internal Control)
                            <span class="text-customRed">*</span>
                        </label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:customRed focus:ring-customRed focus:border-customRed w-full p-2.5">
                            <option selected>Select</option>
                            <option value="Reimbursements">Reimbursements</option>
                            <option value="Tools and Equipment">Tools and Equipment</option>
                            <option value="Cash Advance">Cash Advance</option>
                            <option value="Liquidation">Liquidation</option>
                        </select>
                        @error('type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                @elseif ($type_of_ticket == "HR Internal")
                    <div id="type_of_request_container" class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900"> Type of Request (HR Internal)
                            <span class="text-customRed">*</span>
                        </label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            <option selected>Select</option>
                            <option value="HR">HR</option>
                            <option value="Office Admin">Office Admin</option>
                            <option value="Procurement">Procurement</option>
                        </select>
                        @error('type_of_request')
                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_request_container').focus();">
                                <span class="text-xs text-red-500">{{$message}}</span>
                            </div>
                        @enderror
                    </div>
                    @if ($type_of_request == "Office Admin")
                        <div id="sub_type_of_request_container" class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Type of Requests (Admin)
                                <span class="text-customRed">*</span>
                            </label>
                            <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
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
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    @elseif ($type_of_request == "Procurement")
                        <div id="sub_type_of_request_container" class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Type of Requests (Procurement)
                                <span class="text-customRed">*</span>
                            </label>
                            <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                <option selected>Select</option>
                                <option value="Request for Quotation">Request for Quotation</option>
                                <option value="Request to Buy/Book/Avail Service">Request to Buy/Book/Avail Service</option>
                            </select>
                            @error('sub_type_of_request')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    @elseif ($type_of_request == "HR")
                        <div id="sub_type_of_request_container" class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Type of Requests (Human Resource)
                                <span class="text-customRed">*</span>
                            </label>
                            <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
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
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    @endif
                @else
                    <div></div>
                @endif
            </div>
        </div>
        {{-- Other Information  --}}
        @if ((($type_of_ticket == "Internal Control" || $type_of_ticket == "HR Operations") && !is_null($type_of_request)) || ($type_of_ticket == "HR Internal" && !is_null($type_of_request) && !is_null($sub_type_of_request)))
            <hr class="my-2 border-gray-300">
            <div class="flex flex-col gap-4">
                <h2 class="font-bold text-customRed">Other Information</h2>
                @if ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "Certificate of Employment")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Request (CoE)
                                <span class="text-customRed">*</span>
                            </label>
                            <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                            </textarea>
                            @error('purpose')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_request" class="block mb-2 text-sm font-medium text-gray-900">Commutation
                                <span class="text-customRed">*</span>
                            </label>
                            <div class="grid w-full grid-cols-2 p-4 border border-gray-300 rounded-lg bg-gray-50">
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
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "HMO-related concerns")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900 ">Type of Concern (HMO)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
                                    <option value="Availment of Service">Availment of Service</option>
                                    <option value="Card Replacement">Card Replacement</option>
                                    <option value="Reimbursement">Reimbursement</option>
                                    <option value="Request for Enrollment">Request for Enrollment</option>
                                    <option value="Request for Deletion">Request for Deletion</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900 ">Description of Concern (HMO)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900 ">Link related to your concern (HMO)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "Payroll-related concerns")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Payroll Date
                                <span class="text-customRed">*</span>
                            </label>
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5"
                                type="date" name="request_date" id="request_date" wire:model.live="request_date" required>
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Concern (Payroll)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
                                    <option value="Overtime Pay">Overtime Pay</option>
                                    <option value="Holiday Pay">Holiday Pay</option>
                                    <option value="Deductions">Deductions</option>
                                    <option value="Others">Others</option>
                                    <option value="Request for Deletion">Request for Deletion</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Description of Concern (Payroll)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (Payroll)
                                <span class="text-customRed">*</span></label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "Leave concerns")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Request (Leave)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
                                    <option value="Leave Credits">Leave Credits</option>
                                    <option value="Changes on Filed Leaves">Changes on Filed Leaves</option>
                                    <option value="Cancellation of Leaves">Cancellation of Leaves</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Description of Concern (Leave)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (Leave)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "Request for Consultation")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Request (Request for Consultation)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
                                    <option value="High (ASAP)">High (ASAP)</option>
                                    <option value="Medium (within the day)">Medium (within the day)</option>
                                    <option value="Low (can be attended the next day)">Low (can be attended the next day)</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Description of Concern (Request for Consultation)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "HR" && $sub_type_of_request == "Request for a Meeting")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900 ">Date of Meeting (Request for Meeting)
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}} </span>
                                </div>
                            @enderror
                        </div>
                        <div id="request_requested_container" class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900">Target Person (Request for Meeting)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="request_requested" wire:model="request_requested" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
                                    @foreach ($employeeNames as $name)
                                        <option value="{{$name}}">{{$name}}</option>
                                    @endforeach
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Meeting (Request for Meeting)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Certificate of Remittances")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Remittance Certificate
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
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
                            @if ($type_of_hrconcern == "Others")
                                <div id="remittance_request_others_container" class="mt-4">
                                    <textarea type="text" rows="1" id="remittance_request_others" name="remittance_request_others" wire:model="remittance_request_others"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    </textarea>
                                    @error('remittance_request_others')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('remittance_request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('remittance_request_others_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div class="col-span-1">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Account Assigned
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_assigned_container">
                                <select name="request_assigned" wire:model.live="request_assigned" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
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
                            @if ($request_assigned == "Others")
                                <div id="request_others_container" class="mt-4">
                                    <textarea type="text" rows="1" id="request_extra" name="request_extra" wire:model="request_assigned_request_others"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    </textarea>
                                    @error('request_extra')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
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
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Government-mandated benefits concern")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Type of Concern (GMR)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
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
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (GMR)
                                <span class="text-customRed">*</span> <br>
                                <span class="text-customRed">*</span> Supporting documents/List of requirements <br>
                                <span class="text-customRed">*</span> For SSS R1A and PHILHEALTH ER2, must be in Excel format.
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Messengerial")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-6">
                        <div class="col-span-1 lg:col-span-2">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900"> Type of Request (Messengerial)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
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
                            @if ($type_of_hrconcern == "Others")
                                <div id="messengerial_other_type_container" class="mt-4">
                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                    </textarea>
                                    @error('messengerial_other_type')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('messengerial_other_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('messengerial_other_type_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div id="request_requested_container" class="col-span-1 lg:col-span-2">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900"> Company </label>
                            <div id="request_requested">
                                <textarea type="text" rows="2" id="request_requested" name="request_requested" wire:model="request_requested"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_requested')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_assigned_container" class="col-span-1 lg:col-span-2">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Contact Person
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_assigned">
                                <textarea type="text" rows="2" id="request_assigned" name="request_assigned" wire:model="request_assigned"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_assigned')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_assigned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_assigned_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_others_container"  class="col-span-1 lg:col-span-3">
                            <label for="request_extra" class="block mb-2 text-sm font-medium text-gray-900">Address of Destination (Messengerial)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_extra">
                                <textarea type="text" rows="2" id="request_extra" name="request_extra" wire:model="request_extra"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_extra')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-1 lg:col-span-3">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date of Pick Up or Send (Messengerial)
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Repairs/Maintenance")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 col-span-1 gap-4 p-4 border border-gray-200 rounded-lg shadow lg:col-span-2">
                            <ul class="col-span-1">
                                <h1>1. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦ </span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦ </span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>2. Plumbing Problems:</h1>
                                <li> <span class="text-customRed">◦</span> Leaking faucets or pipes</li>
                                <li> <span class="text-customRed">◦</span> Clogged drains or toilets</li>
                                <li> <span class="text-customRed">◦</span> Running toilets</li>
                                <li> <span class="text-customRed">◦</span> Low water pressure</li>
                                <li> <span class="text-customRed">◦</span> Water heater issues</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>3. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>4. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>5. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>6. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>7. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>8. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>9. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                            <ul class="col-span-1">
                                <h1>10. Electrical Issues Checklist</h1>
                                <li> <span class="text-customRed">◦</span> Malfunctioning outlets or switches</li>
                                <li> <span class="text-customRed">◦</span> Flickering or dimming lights</li>
                                <li> <span class="text-customRed">◦</span> Power outages or fluctuations</li>
                                <li> <span class="text-customRed">◦</span> Broken light fixtures or bulbs</li>
                                <li> <span class="text-customRed">◦</span> Faulty wiring or exposed wires</li>
                            </ul>
                        </div>
                        <div class="col-span-1">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-900">Type of Request (Repairs and Maintenance)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
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
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                            @if ($type_of_hrconcern == "Others")
                                <div id="messengerial_other_type_container"  class="mt-4">
                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    </textarea>
                                    @error('messengerial_other_type')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('messengerial_other_type_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('messengerial_other_type_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            @endif
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Concerned Area
                                <span class="text-customRed">*</span>
                                <span class="font-base">(Please indicate the floor, area and department)</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" placeholder="Enter your answer here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Book a Car")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date and Time of Departure (Book a Car)
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900">Date and Time of Pick-Up (Book a Car)
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_requested')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="account_client_hr_ops_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Passenger/s Name (Book a Car)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <input type="text" name="account_client_hr_ops" id="account_client_hr_ops" wire:model.live="account_client_hr_ops" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('account_client_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('account_client_hr_ops_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Destination (Book a Car)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <input type="text" name="purpose" id="purpose" wire:model="purpose" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Book a Meeting Room")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Start Date (Book a Meeting Room)
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-900">End Date (Book a Meeting Room)
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_requested')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Type of Room (Book a Meeting Room)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_requested_container">
                                <select name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Description of Purpose (Book a Meeting Room)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Office Supplies")
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-y-4 gap-x-8">
                        <div class="grid grid-cols-1 col-span-1 gap-4">
                            <div id="supplies_request.ballpen_black_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_black" class="text-sm font-medium text-gray-900">Ballpen Black</label>
                                    <input type="number" id="supplies_request.ballpen_black" name="supplies_request.ballpen_black" wire:model="supplies_request.ballpen_black"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                    @error('supplies_request.ballpen_black')
                                        <div class="text-sm transition transform alert alert-danger"x-data x-init="document.getElementById('supplies_request.ballpen_black').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_black').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.ballpen_blue_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_blue" class="text-sm font-medium text-gray-900">Ballpen Blue</label>
                                    <input type="number" id="supplies_request.ballpen_blue" name="supplies_request.ballpen_blue" wire:model="supplies_request.ballpen_blue"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
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
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.pencil" name="supplies_request.pencil" wire:model="supplies_request.pencil"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.highlighter" name="supplies_request.highlighter" wire:model="supplies_request.highlighter"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.permanent_marker" name="supplies_request.permanent_marker" wire:model="supplies_request.permanent_marker"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.correction_tape" name="supplies_request.correction_tape" wire:model="supplies_request.correction_tape"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.l_green_exp_folder" name="supplies_request.l_green_exp_folder" wire:model="supplies_request.l_green_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.s_green_exp_folder" name="supplies_request.s_green_exp_folder" wire:model="supplies_request.s_green_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.l_brown_exp_folder" name="supplies_request.l_brown_exp_folder" wire:model="supplies_request.l_brown_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.s_brown_exp_folder" name="supplies_request.s_brown_exp_folder" wire:model="supplies_request.s_brown_exp_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.scissors" name="supplies_request.scissors" wire:model="supplies_request.scissors"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.white_envelope" name="supplies_request.white_envelope" wire:model="supplies_request.white_envelope"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
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
                                    <input type="number" id="supplies_request.calculator" name="supplies_request.calculator" wire:model="supplies_request.calculator"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.calculator')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.calculator').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.calculator').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.binder_two_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_two" class="text-sm font-medium text-gray-900">Binder Clips (2")</label>
                                    <input type="number" id="supplies_request.binder_two" name="supplies_request.binder_two" wire:model="supplies_request.binder_two"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.binder_two')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_two').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_two').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.binder_one_fourth_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_one_fourth" class="text-sm font-medium text-gray-900">Binder Clips (1 1/4")</label>
                                    <input type="number" id="supplies_request.binder_one_fourth" name="supplies_request.binder_one_fourth" wire:model="supplies_request.binder_one_fourth"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.binder_one_fourth')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_one_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_one_fourth').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.binder_three_fourth_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_three_fourth" class="text-sm font-medium text-gray-900">Binder Clips (3/4")</label>
                                    <input type="number" id="supplies_request.binder_three_fourth" name="supplies_request.binder_three_fourth" wire:model="supplies_request.binder_three_fourth"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.binder_three_fourth')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_three_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_three_fourth').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_metal_clips_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_metal_clips" class="text-sm font-medium text-gray-900">Metal Paper Clips (L)</label>
                                    <input type="number" id="supplies_request.l_metal_clips" name="supplies_request.l_metal_clips" wire:model="supplies_request.l_metal_clips"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.l_metal_clips')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_metal_clips').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_metal_clips_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_metal_clips" class="text-sm font-medium text-gray-900">Metal Paper Clips (L)</label>
                                    <input type="number" id="supplies_request.s_metal_clips" name="supplies_request.s_metal_clips" wire:model="supplies_request.s_metal_clips"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.s_metal_clips')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_metal_clips').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.stapler_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.stapler" class="text-sm font-medium text-gray-900">Stapler</label>
                                    <input type="number" id="supplies_request.stapler" name="supplies_request.stapler" wire:model="supplies_request.stapler"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.stapler')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.stapler').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.stapler_wire_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.stapler_wire" class="text-sm font-medium text-gray-900">Stapler Wire</label>
                                    <input type="number" id="supplies_request.stapler_wire" name="supplies_request.stapler_wire" wire:model="supplies_request.stapler_wire"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.stapler_wire')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.stapler_wire').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler_wire').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.scotch_tape_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.scotch_tape" class="text-sm font-medium text-gray-900">Scotch Tape</label>
                                    <input type="number" id="supplies_request.scotch_tape" name="supplies_request.scotch_tape" wire:model="supplies_request.scotch_tape"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.scotch_tape')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.scotch_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scotch_tape').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_brown_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_brown_envelope" class="text-sm font-medium text-gray-900">Brown Envelope (L)</label>
                                    <input type="number" id="supplies_request.l_brown_envelope" name="supplies_request.l_brown_envelope" wire:model="supplies_request.l_brown_envelope"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.l_brown_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_brown_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_brown_envelope" class="text-sm font-medium text-gray-900">Brown Envelope (S)</label>
                                    <input type="number" id="supplies_request.s_brown_envelope" name="supplies_request.s_brown_envelope" wire:model="supplies_request.s_brown_envelope"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.s_brown_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.post_it_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.post_it" class="text-sm font-medium text-gray-900">Post It</label>
                                    <input type="number" id="supplies_request.post_it" name="supplies_request.post_it" wire:model="supplies_request.post_it"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.post_it')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.post_it').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.post_it').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.white_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.white_folder" class="text-sm font-medium text-gray-900">White Folder</label>
                                    <input type="number" id="supplies_request.white_folder" name="supplies_request.white_folder" wire:model="supplies_request.white_folder"
                                        class="p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                    @error('supplies_request.white_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.white_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.white_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Procurement" && $sub_type_of_request == "Request for Quotation")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Specifications (Request for Quotation)
                                <span class="text-customRed">*</span><br> <span class="text-gray-500 font-base">(Please make sure to include the complete details such as color, size, code, etc.) </span>
                            </label>
                            <div id="type_of_hrconcern">
                                <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Enter your answer here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose (Request for Quotation)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="4" id="purpose" name="purpose" wire:model="purpose" placeholder="Enter your answer here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (Request for Quotation)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="4" id="request_link" name="request_link" wire:model="request_link" placeholder="Enter your answer here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Procurement" && $sub_type_of_request == "Request to Buy/Book/Avail Service")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-900">Product/Service Specifications (Request to Buy Services)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="type_of_hrconcern">
                                <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Enter your answer here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (Request to Buy Services)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="Enter your answer here."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Reimbursements")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Cut-Off Date
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Description of Concern (Reimbursement)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (Reimbursement)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="(payslips,timesheet.etc.)"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Tools and Equipment")
                    <div class="flex flex-col justify-between gap-4 lg:flex-row">
                        <div id="type_of_hrconcern_container" class="w-full">
                            <label for="condition_availability" class="block mb-2 text-sm font-medium text-gray-900">Condition/Availability
                                <span class="text-customRed">*</span>
                            </label>
                            <div class="grid w-full grid-cols-2 p-4 border border-gray-300 rounded-lg bg-gray-50">
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="condition_availability" id="new" wire:model="condition_availability" value="New">
                                    <label for="New" class="text-sm font-medium">New</label>
                                </div>
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Old/Existing Unit" name="condition_availability" wire:model="condition_availability" value="Old/Existing Unit">
                                    <label for="Old/Existing Unit" class="text-sm font-medium">Old/Existing Unit</label><br>
                                </div>
                            </div>

                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="w-full">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Equipment Type
                                <span class="text-customRed">*</span>
                            </label>
                            <select id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
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
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        @if ($type_of_hrconcern == "Others")
                            <div id="purpose_container" class="w-full">
                                <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Equipment Type (Others)
                                    <span class="text-customRed">*</span>
                                </label>
                                <div id="purpose">
                                    <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                    </textarea>
                                    @error('purpose')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Cash Advance")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-900">Date of Cash Advance Request
                                <span class="text-customRed">*</span>
                            </label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (CA)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Liquidation")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Liquidation Coverage
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-900">Link related to your concern (Liquidation)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="Share the link of your Email / Knox Approval below."
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed ">
                                </textarea>
                                @error('request_link')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_link_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_link_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Performance Monitoring Request")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="type_of_pe_hr_ops" class="block mb-2 text-sm font-medium text-gray-900">Type of Request (PMR)
                                <span class="text-customRed">*</span></label>
                            <div id="type_of_pe_hr_ops_container">
                                <select name="type_of_pe_hr_ops" wire:model.live="type_of_pe_hr_ops" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 ">
                                    <option selected>Select</option>
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
                            <label for="account_client_hr_ops" class="block mb-2 text-sm font-medium text-gray-900">Type of Request (PMR)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="account_client_hr_opscontainer">
                                <select name="account_client_hr_ops" wire:model.live="account_client_hr_ops" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                    <option selected>Select</option>
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
                @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Incident Report")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcerns" class="block mb-2 text-sm font-medium text-gray-900">Level of Offense
                                <span class="text-customRed">*</span>
                            </label>
                            <div class="grid w-full grid-cols-3 p-4 border border-gray-300 rounded-lg bg-gray-50">
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" name="High" id="new" wire:model="type_of_hrconcern" value="High">
                                    <label for="High" class="text-sm font-medium">High</label>
                                </div>
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Medium" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Medium">
                                    <label for="Medium" class="text-sm font-medium">Medium</label><br>
                                </div>
                                <div>
                                    <input type="radio" class="text-customRed border-customRed focus:ring-customRed" id="Low" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Low">
                                    <label for="Low" class="text-sm font-medium">Low</label><br>
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
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" placeholder="(Please write the description)"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Request for Issuance of Notice/Letter")
                    <div class="grid grid-cols-1 gap-4">
                        <div id="type_of_hrconcern_container">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Type of Notice
                                <span class="text-customRed">*</span>
                            </label>
                            <select id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                                <option selected>Select</option>
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
                @elseif ($type_of_ticket == "HR Operations" && $type_of_request == "Request for Employee Files")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900">Purpose of Request (Employee Files)
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="purpose">
                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" placeholder="(Please write the description)"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
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
                                <span class="text-customRed">*</span>
                            </label>
                            <div id="request_requested">
                                <textarea type="text" rows="5" id="request_requested" name="request_requested" wire:model="request_requested"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed">
                                </textarea>
                                @error('request_requested')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endif
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Name of Concerned Employee
                        <span class="text-customRed">*</span>
                    </label>
                    <input type="text" wire:model="concerned_employee" placeholder="Name of Concerned Employee" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5">
                    @error('concerned_employee')
                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();">
                            <span class="text-xs text-red-500">{{$message}}</span>
                        </div>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-2 justify-items-end">
                <button type="submit" class="col-span-1 col-start-2 inline-flex text-nowrap items-center font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                        <path d="M2.87 2.298a.75.75 0 0 0-.812 1.021L3.39 6.624a1 1 0 0 0 .928.626H8.25a.75.75 0 0 1 0 1.5H4.318a1 1 0 0 0-.927.626l-1.333 3.305a.75.75 0 0 0 .811 1.022 24.89 24.89 0 0 0 11.668-5.115.75.75 0 0 0 0-1.175A24.89 24.89 0 0 0 2.869 2.298Z" />
                    </svg> Submit HR Ticket
                </button>
            </div>
        @endif
        <!-- Loading screen -->
        <div wire:loading wire:target="submit" class="load-over">
            <div wire:loading wire:target="submit" class="loading-overlay">
                <div class="flex flex-col items-center justify-center">
                    <div class="spinner"></div>
                    <p>Submitting your HR Ticket...</p>
                </div>
            </div>
        </div>

        <div id="toast-success" tabindex="-1" class="fixed inset-0 z-50 items-center justify-center hidden w-full h-full bg-gray-800 bg-opacity-50">
            <div id="toast-success-checkin" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="text-sm font-normal ms-3">HR Ticket Submitted Successfully</div>
                <button id="close-toast-checkin" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
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
