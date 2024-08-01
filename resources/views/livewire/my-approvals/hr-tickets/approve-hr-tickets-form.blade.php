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
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('ApproveHrTicketsTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2">Approve HR Tickets</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-customRed ms-1 md:ms-2">Approve HR Ticket Form</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-customGray md:text-3xl">Approve HR Ticket Form</h2>
    <p class="mb-4 text-lg font-semibold text-customRed"> Ticket  <span class="text-customRed"># {{$form_id}}</span>  </p>
    <form wire:submit.prevent="submit" method="POST" class="flex flex-col gap-4 p-8 mt-10 bg-white rounded-lg">
        @csrf
        {{-- Information field --}}
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-customRed">Employee Information</h2>
            <div class="grid grid-cols-1 min-[902px]:grid-cols-6 gap-4">
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="firstname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">First name</label>
                    <input type="text" name="firstname" id="firstname"  value="{{$first_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="middlename" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Middle name</label>
                    <input type="text" name="middlename" id="middlename" value="{{$middle_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="lastname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Last name</label>
                    <input type="text" name="lastname" id="lastname"  value="{{$last_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="employee_email" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Employee Email</label>
                    <input type="text" name="employee_email" id="employee_email"  value="{{$employee_email}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="employee_id" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Employee ID</label>
                    <input type="text" name="" id="employee_id"  value="{{$employee_id}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
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
                    <input type="date" wire:model="application_date" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5"
                        placeholder="Date of Filing" required disabled>
                </div>
                <div class="col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-500">Ticket Type</label>
                    <select style="color: #6B7280;"id="type_of_ticket" name="type_of_ticket" wire:model.live="type_of_ticket" id="type_of_ticket_container" required wire:change="resetTypeOfRequest" disabled
                        class="bg-gray-50 border border-gray-300 shadow-inner text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                @if ($type_of_ticket == "HR Internal")
                    <div id="type_of_request_container" class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-500"> Type of HR Internal Request</label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5" style="color: #6B7280;">
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
                    @if ($type_of_request == "HR")
                        <div id="sub_type_of_request_container" class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-500">Type of HR Requests</label>
                            <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                                <option selected>Select</option>
                                <option value="Manpower Request Form">Manpower Request Form</option>
                                <option value="Certificate of Employment">Certificate of Employment</option>
                                <option value="HMO-related concerns">HMO-Related Concerns</option>
                                <option value="Payroll-related concerns">Payroll-Related Concerns</option>
                                <option value="Leave concerns">Leave Concerns</option>
                                <option value="Request for Consultation">Request for Consultation</option>
                                <option value="Request for a Meeting">Request for a Meeting</option>
                            </select>
                            @error('sub_type_of_request')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('sub_type_of_request_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('sub_type_of_request_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    @elseif ($type_of_request == "Office Admin")
                        <div id="sub_type_of_request_container" class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-500">Type of Office Admin Requests</label>
                            <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                                <option selected>Select</option>
                                <option value="Certificate of Remittances">Certificate of Remittances </option>
                                <option value="Government-mandated benefits concern">Government-Mandated Benefits Concerns</option>
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
                            <label class="block mb-2 text-sm font-medium text-gray-500">Type of Procurement Requests</label>
                            <select name="sub_type_of_request" wire:model.live="sub_type_of_request" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
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
                    @endif
                @elseif ($type_of_ticket == "Internal Control")
                    <div id="type_of_request_container" class="col-span-2 lg:col-start-2">
                        <label class="block mb-2 text-sm font-medium text-gray-500">Type of Internal Control Request</label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg w-full p-2.5">
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
                @elseif ($type_of_ticket == "HR Operations")
                    <div id="type_of_request_container" class="col-span-2 lg:col-start-2">
                        <label class="block mb-2 text-sm font-medium text-gray-500">Type of HR Operations Request</label>
                        <select name="type_of_request" wire:model.live="type_of_request" required wire:change="resetSubTypeOfRequest" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Purpose of Requesting CoE</label>
                            <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                            </textarea>
                            @error('purpose')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_request" class="block mb-2 text-sm font-medium text-gray-500">Commutation</label>
                            <div class="grid w-full grid-cols-2 p-4 border border-gray-300 shadow-inner rounded-lg bg-gray-50">
                                <div>
                                    <input type="radio" class="text-gray-500 border-gray-500" name="type_of_hrconcern" id="with_compensation" wire:model="type_of_hrconcern" value="With Compensation" disabled>
                                    <label for="with_compensation" class="text-sm font-medium text-gray-500">With Compensation</label>
                                </div>
                                <div>
                                    <input type="radio" class="ml-2 text-gray-500 border-gray-500" id="without_compensation" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Without Compensation" disabled>
                                    <label for="without_compensation" class="text-sm font-medium text-gray-500">Without Compensation</label><br>
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
                            <label for="type_of_hrconcern" class="block mb-2 text-sm shadow-inner font-medium text-gray-500">Type of HMO Concern</label>
                            <div id="type_of_hrconcern_container">
                                <select disabled name="type_of_request" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">HMO Concern Description</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 shadow-inner bg-gray-50 rounded-lg border border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">HMO Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 shadow-inner bg-gray-50 rounded-lg border border-gray-300">
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
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Payroll Date</label>
                            <input class="bg-gray-50 border border-gray-300 shadow-inner text-gray-500 text-sm rounded-lg block w-full p-2.5"
                                type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled>
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Type of Payroll Concern</label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Payroll Concern Description</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Payroll Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Type of Leave Request</label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Leave Concern Description</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Leave Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Type of Consultation Request</label>
                            <div id="type_of_hrconcern_container">
                                <select name="type_of_request" wire:model.live="type_of_hrconcern" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner  text-sm rounded-lg block w-full p-2.5">
                                    <option selected>Select</option>
                                    <option value="High (Urgent)">High (Urgent)</option>
                                    <option value="Medium (Within the day)">Medium (Within the day)</option>
                                    <option value="Low (Can be attended the next day)">Low (Can be attended the next day)</option>
                                </select>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Consultation Concern Description</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Date of Meeting</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}} </span>
                                </div>
                            @enderror
                        </div>
                        <div id="request_requested_container" class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-500">Target Person</label>
                            <div id="type_of_hrconcern_container">
                                <select disabled name="request_requested" wire:model="request_requested" class="bg-gray-50 border shadow-inner  border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Purpose of Meeting</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Type of Remittance Certificate</label>
                            <div id="type_of_hrconcern_container">
                                <select disabled name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner  border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                                    <textarea type="text" rows="1" id="remittance_request_others" name="remittance_request_others" wire:model="remittance_request_others" disabled
                                        class="block p-2.5 w-full text-sm text-gray-500 shadow-inner bg-gray-50 rounded-lg border border-gray-300">
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
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-500">Account Assigned</label>
                            <div id="request_assigned_container">
                                <select disabled name="request_assigned" wire:model.live="request_assigned" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                                    <textarea type="text" rows="1" id="request_extra" name="request_extra" wire:model="request_assigned_request_others" disabled
                                        class="block p-2.5 w-full text-sm text-gray-500 shadow-inner bg-gray-50 rounded-lg border border-gray-300">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Purpose of Requesting</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 shadow-inner bg-gray-50 rounded-lg border border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Date Start</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
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
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-500">Type of GMR Concern</label>
                            <div id="type_of_hrconcern_container">
                                <select disabled name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">GMR Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="request_assigned" class="block mb-2 text-sm font-medium shadow-inner text-gray-500"> Type of Messengerial Request</label>
                            <div id="type_of_hrconcern_container">
                                <select disabled name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type" disabled
                                        class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-500"> Company </label>
                            <div id="request_requested">
                                <textarea type="text" rows="2" id="request_requested" name="request_requested" wire:model="request_requested" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('request_requested')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_assigned_container" class="col-span-1 lg:col-span-2">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-500">Contact Person</label>
                            <div id="request_assigned">
                                <textarea type="text" rows="2" id="request_assigned" name="request_assigned" wire:model="request_assigned" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('request_assigned')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_assigned_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_assigned_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_others_container"  class="col-span-1 lg:col-span-3">
                            <label for="request_extra" class="block mb-2 text-sm font-medium text-gray-500">Address of Messengerial Destination</label>
                            <div id="request_extra">
                                <textarea type="text" rows="2" id="request_extra" name="request_extra" wire:model="request_extra" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('request_extra')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_others_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_others_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-1 lg:col-span-3">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Date of Messengerial Pick Up or Send Off</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                    </div>
                @elseif ($type_of_ticket == "HR Internal" && $type_of_request == "Office Admin" && $sub_type_of_request == "Repairs/Maintenance")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_assigned" class="block mb-2 text-sm font-medium text-gray-500">Type of Repairs and Maintenance Request </label>
                            <div id="type_of_hrconcern_container">
                                <select disabled name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                                    <textarea type="text" rows="1" id="messengerial_other_type" name="messengerial_other_type" wire:model.live="messengerial_other_type" disabled
                                        class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Concerned Area</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" placeholder="Enter your answer here." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Date and Time of Departure</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-500">Date and Time of Pick-Up</label>
                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner block w-full p-2.5">
                            @error('request_requested')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="account_client_hr_ops_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Passenger/s Name</label>
                            <div id="purpose">
                                <input type="text" name="account_client_hr_ops" id="account_client_hr_ops" wire:model.live="account_client_hr_ops" required disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('account_client_hr_ops_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('account_client_hr_ops_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Address of Destination</label>
                            <div id="purpose">
                                <input type="text" name="purpose" id="purpose" wire:model="purpose" required disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg block w-full p-2.5">
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
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Start Date</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="col-span-1">
                            <label for="request_requested" class="block mb-2 text-sm font-medium text-gray-500">End Date</label>
                            <input type="date" name="request_requested" id="request_requested" wire:model.live="request_requested" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
                            @error('request_requested')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('request_requested_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('request_requested_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Type of Room</label>
                            <div id="request_requested_container">
                                <select disabled name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Purpose of Booking</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                                    <label for="supplies_request.ballpen_black" class="text-sm font-medium text-gray-500">Ballpen Black</label>
                                    <input type="number" id="supplies_request.ballpen_black" name="supplies_request.ballpen_black" wire:model="supplies_request.ballpen_black" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.ballpen_black')
                                        <div class="text-sm transition transform alert alert-danger"x-data x-init="document.getElementById('supplies_request.ballpen_black').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_black').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.ballpen_blue_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_blue" class="text-sm font-medium text-gray-500">Ballpen Blue</label>
                                    <input type="number" id="supplies_request.ballpen_blue" name="supplies_request.ballpen_blue" wire:model="supplies_request.ballpen_blue" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.ballpen_blue')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.ballpen_blue').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_blue').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.ballpen_red_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.ballpen_red" class="text-sm font-medium text-gray-500">Ballpen Red</label>
                                    <input type="number" id="supplies_request.ballpen_red" name="supplies_request.ballpen_red" wire:model="supplies_request.ballpen_red" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.ballpen_red')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.ballpen_red').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.ballpen_red').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.pencil_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.pencil" class="text-sm font-medium text-gray-500">Pencil</label>
                                    <input type="number" id="supplies_request.pencil" name="supplies_request.pencil" wire:model="supplies_request.pencil" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.pencil')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.pencil').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.pencil').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.highlighter_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.highlighter" class="text-sm font-medium text-gray-500">Highlighter</label>
                                    <input type="number" id="supplies_request.highlighter" name="supplies_request.highlighter" wire:model="supplies_request.highlighter" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.highlighter')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.highlighter').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.highlighter').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.permanent_marker_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.permanent_marker" class="text-sm font-medium text-gray-500">Permanent Marker</label>
                                    <input type="number" id="supplies_request.permanent_marker" name="supplies_request.permanent_marker" wire:model="supplies_request.permanent_marker" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.permanent_marker')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.permanent_marker').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.permanent_marker').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.correction_tape_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.correction_tape" class="text-sm font-medium text-gray-500">Correction Tape</label>
                                    <input type="number" id="supplies_request.correction_tape" name="supplies_request.correction_tape" wire:model="supplies_request.correction_tape" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.correction_tape')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.correction_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.correction_tape').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_green_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_green_exp_folder" class="text-sm font-medium text-gray-500">Green Expandable Folder (L)</label>
                                    <input type="number" id="supplies_request.l_green_exp_folder" name="supplies_request.l_green_exp_folder" wire:model="supplies_request.l_green_exp_folder" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.l_green_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_green_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_green_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_green_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_green_exp_folder" class="text-sm font-medium text-gray-500">Green Expandable Folder (S)</label>
                                    <input type="number" id="supplies_request.s_green_exp_folder" name="supplies_request.s_green_exp_folder" wire:model="supplies_request.s_green_exp_folder" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.s_green_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_green_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_green_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_brown_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_brown_exp_folder" class="text-sm font-medium text-gray-500">Brown Expandable Folder (L)</label>
                                    <input type="number" id="supplies_request.l_brown_exp_folder" name="supplies_request.l_brown_exp_folder" wire:model="supplies_request.l_brown_exp_folder" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.l_brown_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_brown_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_brown_exp_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_brown_exp_folder" class="text-sm font-medium text-gray-500">Brown Expandable Folder (S)</label>
                                    <input type="number" id="supplies_request.s_brown_exp_folder" name="supplies_request.s_brown_exp_folder" wire:model="supplies_request.s_brown_exp_folder" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.s_brown_exp_folder')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_brown_exp_folder').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_exp_folder').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.scissors_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.scissors" class="text-sm font-medium text-gray-500">Scissors</label>
                                    <input type="number" id="supplies_request.scissors" name="supplies_request.scissors" wire:model="supplies_request.scissors" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.scissors')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.scissors').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scissors').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.white_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.white_envelope" class="text-sm font-medium text-gray-500">White Envelope</label>
                                    <input type="number" id="supplies_request.white_envelope" name="supplies_request.white_envelope" wire:model="supplies_request.white_envelope" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                                    <label for="supplies_request.calculator" class="text-sm font-medium text-gray-500">Calculator</label>
                                    <input type="number" id="supplies_request.calculator" name="supplies_request.calculator" wire:model="supplies_request.calculator" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.calculator')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.calculator').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.calculator').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.binder_two_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_two" class="text-sm font-medium text-gray-500">Binder Clips (2")</label>
                                    <input type="number" id="supplies_request.binder_two" name="supplies_request.binder_two" wire:model="supplies_request.binder_two" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.binder_two')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_two').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_two').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.binder_one_fourth_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_one_fourth" class="text-sm font-medium text-gray-500">Binder Clips (1 1/4")</label>
                                    <input type="number" id="supplies_request.binder_one_fourth" name="supplies_request.binder_one_fourth" wire:model="supplies_request.binder_one_fourth" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.binder_one_fourth')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_one_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_one_fourth').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.binder_three_fourth_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.binder_three_fourth" class="text-sm font-medium text-gray-500">Binder Clips (3/4")</label>
                                    <input type="number" id="supplies_request.binder_three_fourth" name="supplies_request.binder_three_fourth" wire:model="supplies_request.binder_three_fourth" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.binder_three_fourth')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.binder_three_fourth').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.binder_three_fourth').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_metal_clips_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_metal_clips" class="text-sm font-medium text-gray-500">Metal Paper Clips (L)</label>
                                    <input type="number" id="supplies_request.l_metal_clips" name="supplies_request.l_metal_clips" wire:model="supplies_request.l_metal_clips" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.l_metal_clips')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_metal_clips').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_metal_clips_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_metal_clips" class="text-sm font-medium text-gray-500">Metal Paper Clips (L)</label>
                                    <input type="number" id="supplies_request.s_metal_clips" name="supplies_request.s_metal_clips" wire:model="supplies_request.s_metal_clips" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.s_metal_clips')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_metal_clips').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_metal_clips').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.stapler_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.stapler" class="text-sm font-medium text-gray-500">Stapler</label>
                                    <input type="number" id="supplies_request.stapler" name="supplies_request.stapler" wire:model="supplies_request.stapler" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.stapler')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.stapler').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.stapler_wire_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.stapler_wire" class="text-sm font-medium text-gray-500">Stapler Wire</label>
                                    <input type="number" id="supplies_request.stapler_wire" name="supplies_request.stapler_wire" wire:model="supplies_request.stapler_wire" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.stapler_wire')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.stapler_wire').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.stapler_wire').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.scotch_tape_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.scotch_tape" class="text-sm font-medium text-gray-500">Scotch Tape</label>
                                    <input type="number" id="supplies_request.scotch_tape" name="supplies_request.scotch_tape" wire:model="supplies_request.scotch_tape" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.scotch_tape')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.scotch_tape').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.scotch_tape').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.l_brown_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.l_brown_envelope" class="text-sm font-medium text-gray-500">Brown Envelope (L)</label>
                                    <input type="number" id="supplies_request.l_brown_envelope" name="supplies_request.l_brown_envelope" wire:model="supplies_request.l_brown_envelope" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.l_brown_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.l_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.l_brown_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.s_brown_envelope_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.s_brown_envelope" class="text-sm font-medium text-gray-500">Brown Envelope (S)</label>
                                    <input type="number" id="supplies_request.s_brown_envelope" name="supplies_request.s_brown_envelope" wire:model="supplies_request.s_brown_envelope" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.s_brown_envelope')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.s_brown_envelope').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.s_brown_envelope').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.post_it_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.post_it" class="text-sm font-medium text-gray-500">Post It</label>
                                    <input type="number" id="supplies_request.post_it" name="supplies_request.post_it" wire:model="supplies_request.post_it" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                    @error('supplies_request.post_it')
                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supplies_request.post_it').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supplies_request.post_it').focus();">
                                            <span class="text-xs text-red-500">{{$message}}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div id="supplies_request.white_folder_container">
                                <div class="grid items-center grid-cols-2">
                                    <label for="supplies_request.white_folder" class="text-sm font-medium text-gray-500">White Folder</label>
                                    <input type="number" id="supplies_request.white_folder" name="supplies_request.white_folder" wire:model="supplies_request.white_folder" disabled
                                        class="p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Quotation Specifications</label>
                            <div id="type_of_hrconcern">
                                <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Enter your answer here." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Purpose of Request</label>
                            <div id="purpose">
                                <textarea type="text" rows="4" id="purpose" name="purpose" wire:model="purpose" placeholder="Enter your answer here." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg shadow-inner border border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Quotation Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="4" id="request_link" name="request_link" wire:model="request_link" placeholder="Enter your answer here." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg shadow-inner border border-gray-300">
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
                            <label for="type_of_hrconcern" class="block mb-2 text-sm font-medium text-gray-500">Product/Service Specifications</label>
                            <div id="type_of_hrconcern">
                                <textarea type="text" rows="2" id="type_of_hrconcern" name="type_of_hrconcern" wire:model="type_of_hrconcern" placeholder="Enter your answer here." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
                                </textarea>
                                @error('type_of_hrconcern')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Service Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="Enter your answer here." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg shadow-inner border border-gray-300">
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
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Cut-Off Date</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Reimbursement Description</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg shadow-inner border border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Reimbursement Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="(payslips,timesheet.etc.)" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border shadow-inner border-gray-300">
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
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label for="condition_availability" class="block mb-2 text-sm font-medium text-gray-500">Condition/Availability</label>
                            <div class="grid w-full grid-cols-2 p-4 border border-gray-300 rounded-lg shadow-inner bg-gray-50">
                                <div>
                                    <input disabled type="radio" class="text-gray-500 border-gray-500" name="condition_availability" id="new" wire:model="condition_availability" value="New">
                                    <label for="New" class="text-sm font-medium text-gray-500">New</label>
                                </div>
                                <div>
                                    <input disabled type="radio" class="text-gray-500 border-gray-500" id="Old/Existing Unit" name="condition_availability" wire:model="condition_availability" value="Old/Existing Unit">
                                    <label for="Old/Existing Unit" class="text-sm font-medium text-gray-500">Old/Existing Unit</label><br>
                                </div>
                            </div>
                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="type_of_hrconcern_container" class="col-span-1">
                            <label class="block mb-2 text-sm font-medium text-gray-500">Equipment Type</label>
                            <select disabled id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 shadow-inner border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            @if ($type_of_hrconcern == "Others")
                                <div id="purpose_container" class="mt-4">
                                    <div id="purpose">
                                        <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                            class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                    </div>
                @elseif ($type_of_ticket == "Internal Control" && $type_of_request == "Cash Advance")
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <div class="col-span-1">
                            <label for="request_date" class="block mb-2 text-sm font-medium text-gray-500">Date of Cash Advance Request</label>
                            <input type="date" name="request_date" id="request_date" wire:model.live="request_date" required disabled
                                class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg block w-full p-2.5">
                            @error('request_date')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('time_period_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('time_period_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Cash Advance Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 shadow-inner rounded-lg border border-gray-300">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Liquidation Coverage</label>
                            <div id="purpose">
                                <textarea type="text" rows="2" id="purpose" name="purpose" wire:model="purpose" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border shadow-inner  border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_link_container" class="col-span-1">
                            <label for="request_link" class="block mb-2 text-sm font-medium text-gray-500">Liquidation Concern Link</label>
                            <div id="request_link">
                                <textarea type="text" rows="2" id="request_link" name="request_link" wire:model="request_link" placeholder="Share the link of your Email / Knox Approval below." disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border shadow-inner border-gray-300">
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
                            <label for="type_of_pe_hr_ops" class="block mb-2 text-sm font-medium text-gray-500">Type of Performance Monitoring Request</label>
                            <div id="type_of_pe_hr_ops_container">
                                <select disabled name="type_of_pe_hr_ops" wire:model.live="type_of_pe_hr_ops" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="account_client_hr_ops" class="block mb-2 text-sm font-medium text-gray-500">Type of Client's Account</label>
                            <div id="account_client_hr_opscontainer">
                                <select disabled name="account_client_hr_ops" wire:model.live="account_client_hr_ops" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="type_of_hrconcerns" class="block mb-2 text-sm font-medium text-gray-500">Level of Offense</label>
                            <div class="grid w-full grid-cols-3 p-4 border border-gray-300 rounded-lg shadow-inner bg-gray-50">
                                <div>
                                    <input disabled type="radio" class="text-gray-500 border-gray-500" name="High" id="new" wire:model="type_of_hrconcern" value="High">
                                    <label for="High" class="text-sm font-medium text-gray-500">High</label>
                                </div>
                                <div>
                                    <input disabled type="radio" class="text-gray-500 border-gray-500" id="Medium" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Medium">
                                    <label for="Medium" class="text-sm font-medium text-gray-500">Medium</label><br>
                                </div>
                                <div>
                                    <input disabled type="radio" class="text-gray-500 border-gray-500" id="Low" name="type_of_hrconcern" wire:model="type_of_hrconcern" value="Low">
                                    <label for="Low" class="text-sm font-medium text-gray-500">Low</label><br>
                                </div>
                            </div>
                            @error('type_of_hrconcern')
                                <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('type_of_hrconcern_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('type_of_hrconcern_container').focus();">
                                    <span class="text-xs text-red-500">{{$message}}</span>
                                </div>
                            @enderror
                        </div>
                        <div id="purpose_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Incident Report</label>
                            <div id="purpose">
                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" placeholder="(Please write the description)" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border shadow-inner border-gray-300">
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
                            <label class="block mb-2 text-sm font-medium text-gray-500">Type of Notice</label>
                            <select disabled id="type_of_hrconcern" name="type_of_hrconcern" wire:model.live="type_of_hrconcern" class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
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
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Purpose of Employee Files</label>
                            <div id="purpose">
                                <textarea type="text" rows="5" id="purpose" name="purpose" wire:model="purpose" placeholder="(Please write the description)" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border shadow-inner border-gray-300">
                                </textarea>
                                @error('purpose')
                                    <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('purpose_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('purpose_container').focus();">
                                        <span class="text-xs text-red-500">{{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div id="request_requested_container" class="col-span-1">
                            <label for="purpose" class="block mb-2 text-sm font-medium text-gray-500">Document/s Needed</label>
                            <div id="request_requested">
                                <textarea type="text" rows="5" id="request_requested" name="request_requested" wire:model="request_requested" disabled
                                    class="block p-2.5 w-full text-sm text-gray-500 bg-gray-50 rounded-lg border border-gray-300">
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
                    <label class="block mb-2 text-sm font-medium text-gray-500">Name of Concerned Employee</label>
                    <input type="text" wire:model="concerned_employee" placeholder="Name of Concerned Employee" required disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg shadow-inner block w-full p-2.5">
                    @error('concerned_employee')
                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('supervisor_email_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('supervisor_email_container').focus();">
                            <span class="text-xs text-red-500">{{$message}}</span>
                        </div>
                    @enderror
                </div>
            </div>
             <!-- Change Status Button -->
            <div class="flex flex-row-reverse">
                <button data-modal-target="crud-modal" type="button" data-modal-toggle="crud-modal" class="inline-flex items-center font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                    Change Status
                </button>
            </div>
        @endif

        <!-- Change Status Modal -->
        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50">
            <div class="relative w-full max-w-md p-4">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Change Status</h3>
                        <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
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
                                <label for="category" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Status</label>
                                <select id="category" wire:model="status" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option class="hover:bg-customRed hover:text-white" value="Completed">Completed</option>
                                    <option class="hover:bg-customRed hover:text-white" value="Pending">Pending</option>
                                    <option class="hover:bg-customRed hover:text-white" value="Report">Report</option>
                                    <option class="hover:bg-customRed hover:text-white" value="Request to Complete">Request to Complete</option>
                                    <option class="hover:bg-customRed hover:text-white" value="Cancelled">Cancelled</option>
                                </select>
                            </div>
                            <button id="updateButton" type="submit" class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white ring-1 ring-customRed shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-end">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Popup Modal -->
        <div id="popup-modal" tabindex="-1" class="hidden fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <form wire:submit.prevent="submit" method="POST"  class="p-4 md:p-5">
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-amber-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to proceed</h3>
                            <button type="submit" class="text-white bg-amber-600 hover:bg-amber-800  dark:focus:ring-amber-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes
                            </button>
                            <button type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                        </div>
                    </form>
    
                </div>
            </div>
        </div>
        <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
            @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'HR Ticket Cancelled'; openCancelModal = false; setTimeout(() => showToast = false, 3000)"
            @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; setTimeout(() => showToast = false, 3000)">
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
