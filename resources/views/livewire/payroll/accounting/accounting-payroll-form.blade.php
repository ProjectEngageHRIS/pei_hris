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
            <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('TasksTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">My Tasks</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 dark:text-gray-400">Assign Task</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Assign Task</h2>
    <section class="px-8 pb-24 mt-10 bg-white rounded-lg dark:bg-gray-900">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 bg-white rounded-lg dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">

                            {{-- Payroll Information --}}
                            <div class="grid w-full grid-cols-1 col-span-3 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 ">
                                <h2 class="font-bold text-customRed">Payroll Information</h2>
                                <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow">
                                    <div  wire:ignore >
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Target Employee<span class="text-red-600">*</span>
                                        </label>
                                        <select id="target_employee" name="target_employee" wire:model.live="target_employee" id="target_employee_container" required
                                        class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected>Select</option>
                                            @foreach($employeeNames as $name)
                                                <option value="{{$name}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                        @error('target_employee')
                                            <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('target_employee_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('target_employee_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <label for="start_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Date
                                            <span class="text-red-600">*</span></label>
                                        <input type="datetime-local" name="start_date" id="start_date" wire:model.live="start_date"
                                            class="bg-gray border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required="">
                                        @error('start_date')
                                            <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('start_date_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('start_date_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="w-full" id="end_date_container">
                                        <label for="end_date"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End Date/Time
                                            <span class="text-red-600">*</span></label>
                                        <input type="datetime-local" name="end_date" id="end_date" wire:model.live="end_date"
                                            class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        required="">
                                        @error('end_date')
                                            <div class="text-sm transition transform alert alert-danger"
                                            x-data x-init="document.getElementById('end_date_container_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('end_date_container').focus();" >
                                                <span class="text-xs text-red-500" > {{$message}}</span>
                                            </div>
                                        @enderror
                                    </div>

 
                                </div>
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 gap-4 p-6 col-span-3 bg-white border border-gray-200 rounded-lg shadow ">
                                    <div class="grid grid-cols-1 gap-4">
                                        <div class="grid items-start grid-cols-1 gap-4">
                                            <div class="grid items-center justify-center w-full grid-cols-1 " id="emp_image_container">
                                                <label for="payroll_picture"
                                                    class="block mb-4 text-sm font-medium text-gray-900 ">Payroll Photo
                                                    <span class="text-red-600">*</span></label>
                                                <label for="payroll_picture" class="relative flex flex-col items-center justify-center w-full p-1 border-2 border-gray-900 border-dashed rounded-lg cursor-pointer h-50 bg-gray-50 hover:bg-gray-100 ">
                                                @if($payroll_picture)
                                                        @if(is_string($payroll_picture) == True)
                                                            @php
                                                                $payroll_picture = $this->getImage('payroll_picture');
                                                            @endphp
                                                            <img src="data:image/gif;base64,{{ base64_encode($payroll_picture) }}" alt="Image Description" class="object-contain w-full h-full">
                                                        @else
                                                            <img src="{{ $payroll_picture->temporaryUrl() }}" class="object-contain w-full h-full" alt="Uploaded Image">
                                                        @endif
                                                        <input id="payroll_picture" type="file" class="hidden text-gray-900" wire:model.live="payroll_picture">
            
                                                        <button type="button" wire:click="removeImage('payroll_picture')" class="absolute top-0 right-0 py-1 m-2 text-red-600 rounded">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                            </svg>
                                                        </button>
                                                @else
                                                        <div class="flex flex-col items-center justify-center h-full pt-5 pb-6">
                                                            <svg class="w-4 h-4 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                            </svg>
                                                            <p class="mb-2 text-xs text-center text-gray-500 "><span class="font-semibold">Click to upload</span></p>
                                                            <p class="text-xs text-center text-gray-500 ">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                        </div>
                                                        <input id="payroll_picture" type="file" class="hidden" wire:model.blur="payroll_picture" />
                                                @endif
                                                </label>
                                                @error('payroll_picture')
                                                    <div class="mb-1 text-sm transition transform alert alert-danger"
                                                            x-data x-init="document.getElementById('emp_image_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('emp_image_container').focus();">
                                                        <span class="text-xs text-red-500 "> {{$message}}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center rounded-8px text-customRed hover:bg-customRed hover:text-white bg-navButton rounded-3px shadow">
                    Submit Concern
                </button>
            </form>
        </div>
    </section>

    </div>
</div>

<script>
    $(document).ready(function() {

        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option',
            closeOnSelect: false,
        }).on('select2:open', function() {
            // Apply Tailwind CSS classes to the Select2 dropdown
            $('.select2-dropdown').addClass(' bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500');
            $('.select2-results__options').addClass('p-2 ');
        }).on('change', function() {
            let data = $(this).val();
            console.log(data);
            @this.target_employees = data;
        });
        $('.select2-container--default .select2-selection--multiple').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2');


        // Toggle modal visibility when form submission is completed
        Livewire.on('formSubmitted', () => {
            $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
        });
    });
</script>
