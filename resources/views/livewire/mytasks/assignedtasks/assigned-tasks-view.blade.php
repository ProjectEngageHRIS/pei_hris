<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed ">
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
            <a href="{{route('AssignedTasksTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 ">Assigned Task</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2 ">View Assigned Task</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl ">View Assigned Task</h2>
    <p class="mb-4 text-lg font-semibold text-customRed"> Ticket  <span class="text-customRed"># {{$form_id}}</span>  </p>

    <section class="px-8 pb-10 mt-10 bg-white rounded-lg ">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3">
                               <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2  class="font-bold text-customRed">Employee Information</h2>

                                    <div  class="">
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap ">First name</label>
                                                <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap ">Middle name</label>
                                                <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap ">Last name</label>
                                                <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 text-sm shadow-inner rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                                    required="" disabled>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                            <div class="w-full">
                                                <label for="department_name"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap ">Department Name</label>
                                                <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500  shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap ">Email Address</label>
                                                <input type="text" name="email" id="email"  value="{{$email}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                                    required="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4 border-gray-300 ">
                               </div>
                            </div>

                            {{-- Leave Information --}}
                            <div class="grid w-full grid-cols-1 col-span-3 gap-4">
                                <h2 class="font-bold text-customRed">Task Information</h2>
                                <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                    <div class="w-full">
                                        <label for="task_title"
                                            class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap ">Task Title</label>
                                        <input type="text" name="task_title" id="task_title"  wire:model="task_title" disabled
                                            class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                            required="">
                                    </div>
                                    <div wire:ignore class="">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-500 ">Target Employees</label>
                                        <select multiple disabled class="js-example-basic-multiple mb-8 bg-white border border-gray-300 text-gray-300 text-sm rounded-lg block w-full p-2.5">
                                            <optgroup label="Employee Names" ></optgroup>
                                            @foreach($employeeNames as $name)
                                               <option @if (in_array($name, $target_employees)) selected @endif
                                               value="{{$name}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <div class="grid w-full grid-cols-1 col-span-3 ">
                                        <div id="assigned_task_container" class="grid grid-cols-1 gap-4 ">
                                            <label for="assigned_task"
                                            class="block text-sm font-medium text-gray-500 whitespace-nowrap ">Task</label>
                                            <textarea type="text" rows="10" id="assigned_task" name="assigned_task" wire:model="assigned_task" disabled
                                                placeholder="Write your concern here. Maximum of 20000 characters only."
                                                class="block p-2.5 w-full text-sm text-gray-500 border-gray-300 shadow-inner bg-gray-50 rounded-lg ring-1 border ring-gray-300 focus:border-customRed focus:ring-customRed       ">
                                            </textarea>
                                            @error('assigned_task')
                                                <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('assigned_task_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('assigned_task_container').focus();" >
                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div id="time_period_container" class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <div class="grid grid-cols-1 min-[1052px]:grid-cols-2 gap-4 ">
                                        <div class="w-full">
                                            <label for="start_time"
                                                class="block mb-2 text-sm font-medium text-gray-500 ">Start Date/Time</label>
                                            <input type="datetime-local" name="start_time" id="start_time" wire:model.live="start_time"  disabled
                                                class="bg-gray-50 border shadow-inner border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                                required="">
                                            @error('start_time')
                                                <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('start_time_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('start_time_container').focus();" >
                                                    <span class="text-xs text-red-500" > {{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="w-full" id="end_time_container">
                                            <label for="end_time"
                                                class="block mb-2 text-sm font-medium text-gray-500 ">End Date/Time</label>
                                            <input type="datetime-local" name="end_time" id="end_time" wire:model.live="end_time"  disabled
                                                class="bg-gray-50 border border-gray-300 shadow-inner text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5     "
                                            required="">
                                            @error('end_time')
                                                <div class="text-sm transition transform alert alert-danger"
                                                x-data x-init="document.getElementById('end_time_container_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('end_time_container').focus();" >
                                                    <span class="text-xs text-red-500" > {{$message}}</span>
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
            $('.select2-dropdown').addClass('bg-white border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5');
            $('.select2-results__options').addClass('p-2 ');
        }).on('change', function() {
            let data = $(this).val();
            console.log(data);
            @this.target_employees = data;
        });
        $('.select2-container--default .select2-selection--multiple').addClass('bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2');

    });
</script>
