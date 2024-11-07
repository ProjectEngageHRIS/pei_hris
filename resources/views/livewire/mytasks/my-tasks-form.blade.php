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
            <a href="{{route('TasksTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2 ">My Tasks</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="text-sm font-semibold text-customRed ms-1 md:ms-2 ">Assign Task</span>
            </div>
        </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">Assign Task</h2>
    <section class="px-8 pb-24 mt-10 bg-white rounded-lg ">
        <div class="px-1 pt-8 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 bg-white rounded-lg ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3">
                               <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <h2  class="font-bold text-customRed">Employee Information</h2>

                                    <div  class="">
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">First name </label>
                                                <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Middle name </label>
                                                <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Last name</label>
                                                <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                    required="" disabled>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                            <div class="w-full">
                                                <label for="department_name"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Department Name </label>
                                                <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="email"
                                                    class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap">Email Address</label>
                                                <input type="text" name="email" id="email"  value="{{$email}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 "
                                                    required="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4 border-gray-300 ">
                               </div>
                            </div>

                            {{-- Leave Information --}}
                            <div class="grid w-full grid-cols-1 col-span-3 gap-4 ">
                                <h2 class="font-bold text-customRed">Task Information</h2>
                                <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                    <div class="w-full">
                                        <label for="task_title"
                                            class="block mb-2 text-sm font-medium text-gray-900 whitespace-nowrap">Task Title <span class="text-red-600">*</span></label>
                                        <input type="text" name="task_title" id="task_title"  wire:model="task_title"
                                            class="bg-gray-50 border border-gray-900 text-gray-900 shadow-inner text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
                                            required="">
                                    </div>
                                    <div wire:ignore class="">
                                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Target Employees<span class="text-red-600">*</span></label>
                                        <select multiple style="width:100%; background:gray;" class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 ">
                                            @foreach($employeeNames as $name)
                                               <option value="{{$name}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                {{-- <div class="grid w-full grid-cols-1 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow "> --}}
                                    <div class="grid w-full grid-cols-1 col-span-3 ">
                                        <div id="assigned_task_container" class="grid grid-cols-1 gap-4 ">
                                            <label for="assigned_task"
                                            class="block text-sm font-medium text-gray-900 whitespace-nowrap">Task Description
                                            <span class="text-red-600">*</span> </label>
                                            <textarea type="text" rows="10" id="assigned_task" name="assigned_task" wire:model="assigned_task"
                                                placeholder="Write your concern here. Maximum of 20000 characters only."
                                                class="block p-2.5 w-full text-sm shadow-inner text-gray-900 bg-gray-50 rounded-lg ring-1 border-1 ring-gray-300 focus:border-customRed focus:ring-customRed  ">
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
                                                class="block mb-2 text-sm font-medium text-gray-900 ">Start Date/Time
                                                <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" name="start_time" id="start_time" wire:model.live="start_time"
                                                class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
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
                                                class="block mb-2 text-sm font-medium text-gray-900">End Date/Time
                                                <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" name="end_time" id="end_time" wire:model.live="end_time"
                                                class="bg-gray-50 border border-gray-900 shadow-inner text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 "
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
                <button type="submit" class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white shadow hover:bg-red-600 hover:text-white bg-customRed rounded-8px">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="mr-2 size-4">
                        <path d="M2.87 2.298a.75.75 0 0 0-.812 1.021L3.39 6.624a1 1 0 0 0 .928.626H8.25a.75.75 0 0 1 0 1.5H4.318a1 1 0 0 0-.927.626l-1.333 3.305a.75.75 0 0 0 .811 1.022 24.89 24.89 0 0 0 11.668-5.115.75.75 0 0 0 0-1.175A24.89 24.89 0 0 0 2.869 2.298Z" />
                    </svg>
                    Assign Task
                </button>
                <!-- Loading screen -->
                <div wire:loading wire:target="submit" class="load-over">
                    <div wire:loading wire:target="submit" class="loading-overlay">
                        <div class="flex flex-col items-center justify-center">
                            <div class="spinner"></div>
                            <p>Assigning your Task...</p>
                        </div>
                    </div>
                </div>


                <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                    @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Task Assigned'; setTimeout(() => showToast = false, 3000)"
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
    </section>
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

<script>
    $(document).ready(function() {

        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option',
            closeOnSelect: false,
        }).on('select2:open', function() {
            // Apply Tailwind CSS classes to the Select2 dropdown
            $('.select2-dropdown').addClass(' bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ');
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

    <script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('trigger-reroute', () => {
            // Optional: Show a success message or animation here

            // Add animation class for page transition
            document.body.classList.add('swing-out-top-bck');
            
            // The animation duration in milliseconds (make sure this matches your animation)
            const animationDuration = 2500;  // Duration of the swing-out animation

            // Perform the actual redirect after the animation is done
            setTimeout(() => {
                window.location.href = "{{ route('AssignedTasksTable') }}";
            }, animationDuration); // This will ensure the redirect happens after the animation ends
        });
    });
</script>

</script>
