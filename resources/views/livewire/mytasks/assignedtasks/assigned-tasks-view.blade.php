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
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('AssignedTasksTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">My Tasks</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-600 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-semibold text-gray-900 md:ms-2 dark:text-gray-400">View</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">View Task</h2>
    <p class="mb-4 text-customRed font-semibold text-lg"> Ticket  <span class="text-customRed"># {{$form_id}}</span>  </p>

    <section class="bg-white dark:bg-gray-900 pb-10 px-8 mt-10 rounded-lg">
        <div class=" px-1 mx-auto pt-8">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                    <div class="block w-full col-span-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                        <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                            {{-- Information field --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 ">
                               <div class="grid grid-cols-1 gap-4 col-span-3 ">
                                    <h2  class="text-red-700 font-bold">Information</h2>

                                    <div  class=" ">
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                            <div class="w-full ">
                                                <label for="firstname"
                                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">First name <span class="text-red-600">*</span></label>
                                                <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full ">
                                                <label for="middlename"
                                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                                <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="lastname"
                                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Last name <span class="text-red-600">*</span></label>
                                                <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                            <div class="w-full">
                                                <label for="department_name"
                                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Department Name <span class="text-red-600">*</span></label>
                                                <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                            <div class="w-full">
                                                <label for="email"
                                                    class="block mb-2 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">Email <span class="text-red-600">*</span></label>
                                                <input type="text" name="email" id="email"  value="{{$email}}"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    required="" disabled>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                        
                                
                            </div>

                            {{-- Leave Information --}}
                            <div class="grid grid-cols-1 w-full col-span-3 gap-4 p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700  ">
                                <h2 class="text-red-700 font-bold">Task Information</h2>
                                <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                    <div class="w-full">
                                        <label for="task_title"
                                            class="block mb-2 whitespace-nowrap text-sm font-semibold text-gray-900 dark:text-white">Task Title <span class="text-red-600">*</span></label>
                                        <input type="text" name="task_title" id="task_title"  wire:model="task_title" disabled
                                            class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required="">
                                    </div>
                                    <div wire:ignore class="">
                                        <label for="name" class="block mb-2 text-sm font-semibold  text-gray-900 dark:text-white">Target Employees<span class="text-red-600">*</span></label>
                                        <select multiple style="width:100%; background:gray;" disabled class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <optgroup label="Employee Names" ></optgroup>
                                            @foreach($employeeNames as $name)
                                               <option @if (in_array($name, $target_employees)) selected @endif 
                                               value="{{$name}}">{{$name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{-- Date Of Filling --}}
                                <div class="grid grid-cols-1 gap-4 col-span-3 ">
                                {{-- <div class="grid grid-cols-1 gap-4 p-6 w-full bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 "> --}}
                                    <div class="grid grid-cols-1 w-full col-span-3  ">
                                        <div id="assigned_task_container" class="grid grid-cols-1  gap-4     ">
                                            <label for="assigned_task"
                                            class="block text-sm font-semibold whitespace-nowrap text-gray-900 dark:text-white">Task<span class="text-red-600">*</span> (Max: 20000  characters only) </label>
                                            <textarea type="text" rows="10" id="assigned_task" name="assigned_task" wire:model="assigned_task" disabled
                                                placeholder="Write your concern here. Maximum of 20000 characters only."   
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg ring-1 border-1 ring-gray-300 focus:border-customRed focus:ring-customRed  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('assigned_task')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                    x-data x-init="document.getElementById('assigned_task_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('assigned_task_container').focus();" >
                                                        <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror
                                        </div>  
                                    </div>
                                </div>
                                <div id="time_period_container" class="grid grid-cols-1 col-span-3 gap-4 ">
                                    <div class="grid grid-cols-1 min-[1052px]:grid-cols-2 gap-4 ">
                                        <div class="w-full">
                                            <label for="start_time"
                                                class="block  mb-2 text-sm font-semibold text-gray-900 dark:text-white ">Start Date/Time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" name="start_time" id="start_time" wire:model.live="start_time"  disabled
                                                class="bg-gray border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="">
                                            @error('start_time')
                                                <div class="transition transform alert alert-danger text-sm"
                                                x-data x-init="document.getElementById('start_time_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('start_time_container').focus();" >
                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
                                                </div> 
                                            @enderror       
                                        </div>
                                        <div class="w-full" id="end_time_container">
                                            <label for="end_time"
                                                class="block  mb-2 text-sm font-semibold text-gray-900 dark:text-white">End Date/Time <span class="text-red-600">*</span></label>
                                            <input type="datetime-local" name="end_time" id="end_time" wire:model.live="end_time"  disabled
                                                class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            required="">
                                            @error('end_time')   
                                                <div class="transition transform alert alert-danger text-sm"
                                                x-data x-init="document.getElementById('end_time_container_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('end_time_container').focus();" >
                                                    <span class="text-red-500 text-xs" > {{$message}}</span>
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

        <!-- Change Status Button -->
        @if ($status == "Pending")
            <div x-cloak x-data="{ openCrudModal: false, openConfirmation: false }" class="flex flex-row-reverse mt-10">
                <button @click="openCrudModal = true" type="button" class="inline-flex items-center font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                    Change Status
                </button>
                <div  x-ref="crudModal"
                x-show="openCrudModal" id="crud_modal" @keydown.escape.window="openCrudModal = false" tabindex="-1"
                class="fixed top-0 left-0 right-0 bottom-0 z-50 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0">
                <div class="relative w-full max-w-md p-4">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Change Status</h3>
                            <button @click="openCrudModal = false" type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white">
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
                                    <select id="category" wire:model.live="current_status" class="disabled-select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option class="hover:bg-customRed hover:text-white" @if ($status === "Completed") selected @endif value="Completed">Completed</option>
                                        <option class="hover:bg-customRed hover:text-white" @if ($status === "Pending") selected @endif value="Pending">Pending</option>
                                        <option class="hover:bg-customRed hover:text-white" @if ($status === "Cancelled") selected @endif value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                                <button @click="openConfirmation = true" id="updateButton" type="button"  class="inline-flex items-center bg-navButton text-customRed hover:bg-customRed hover:text-white ring-1 ring-customRed shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 justify-self-end">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
                <!-- Confirmation Modal -->
                <div  x-show="openConfirmation" x-ref="confirmModal" tabindex="-1" class="fixed top-0 left-0 right-0 bottom-0 z-60 flex justify-center items-center overflow-y-auto overflow-x-hidden w-full h-full bg-gray-800 bg-opacity-50"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-300"
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
                            <form wire:submit.prevent="changeStatus" method="POST" class="p-4 md:p-5">
                                <div class="p-4 md:p-5 text-center">
                                    <svg class="mx-auto mb-4 text-amber-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-900 dark:text-gray-400">Are you sure you want to proceed</h3>
                                    <button type="submit" class="text-white bg-amber-600 hover:bg-amber-800 dark:focus:ring-amber-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                        Yes
                                    </button>
                                    <button @click="openConfirmation = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" >
                                        No
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>

                <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                        @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Task Updated'; openConfirmation = false; openCrudModal = false; setTimeout(() => showToast = false, 3000)"
                        @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; openConfirmation = false; openCrudModal = false; setTimeout(() => showToast = false, 3000)">
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
            </div>
        @endif

        <div wire:loading wire:target="changeStatus" class="load-over z-50">
            <div wire:loading wire:target="changeStatus" class="loading-overlay z-50">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Updating...</p>
                </div>
            </div>
        </div>


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

    });
</script>