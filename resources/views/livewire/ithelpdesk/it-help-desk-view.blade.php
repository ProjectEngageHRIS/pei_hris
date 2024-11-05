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
            <a href="{{route('ItHelpDeskTable')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">It Helpdesk</a>
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
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">View IT Concern</h2>
    <p class="my-4 text-customRed  text-lg">Ticket Reference Number: <span class="text-gray-900 font-medium">{{$form_id}}</span>  </p>


    <section class="  mt-10 bg-white rounded-lg dark:bg-gray-900">
        <div class="px-4 py-4 mx-auto ">
            <form wire:submit.prevent="submit" method="POST">
                @csrf
                <div class="block w-full gap-4 p-6 sm:grid-cols-3 sm:gap-6">
                    <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                        {{-- Information field --}}
                        <div class="grid grid-cols-1 w-full col-span-3 gap-4 min-[902px]:grid-cols-3 ">
                            <div class="grid grid-cols-1 col-span-3 gap-4 ">
                                <h2 class="font-bold text-customRed">Personal Information</h2>
                                <div>
                                    <div class="grid grid-cols-1 min-[902px]:grid-cols-3 gap-4 col-span-3 pb-4">
                                        <div class="w-full ">
                                            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">First name <span class="text-red-600">*</span></label>
                                            <input type="text" name="firstname" id="firstname"  value="{{$first_name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                        <div class="w-full ">
                                            <label for="middlename"
                                                class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Middle name <span class="text-red-600">*</span></label>
                                            <input type="text" name="middlename" id="middlename" value="{{$middle_name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="lastname"
                                                class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Last name <span class="text-red-600">*</span></label>
                                            <input type="text" name="lastname" id="lastname"  value="{{$last_name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-1 min-[902px]:grid-cols-2 gap-4 col-span-3">
                                        <div class="w-full">
                                            <label for="department_name"
                                                class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Department Name <span class="text-red-600">*</span></label>
                                            <input type="text" name="department_name" id="department_name"  value="{{$department_name}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                        <div class="w-full">
                                            <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">Email Address<span class="text-red-600">*</span></label>
                                            <input type="text" name="email" id="email"  value="{{$email}}"
                                                class="bg-gray-50 border border-gray-300 text-gray-500 shadow-inner text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required="" disabled>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4 border-gray-300">
                            </div>
                        </div>
                        {{-- Concern Information --}}
                        <div class="grid w-full grid-cols-1 col-span-3 ">
                            <h2 class="font-bold text-customRed">Concern Information</h2>
                            <div id="description_container" class="mt-5">
                                <textarea type="text" rows="10" id="description" name="description" wire:model="description"
                                    class="block p-2.5 w-full text-sm shadow-inner text-gray-500 bg-gray-50 rounded-lg ring-1 border border-gray-200 ring-gray-300 focus:border-customRed focus:ring-customRed" disabled>
                                </textarea>
                                @error('description')
                                    <div class="text-sm transition transform alert alert-danger"
                                        x-data x-init="document.getElementById('description_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('description_container').focus();" >
                                            <span class="text-xs text-red-500" > {{$message}}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <!-- Cancel Button -->
            @if ($status  == "Unassigned")
                    <div x-cloak x-data="{ openCancelModal: false }">
                        <div class="flex flex-row-reverse">
                            <button id="cancel_button"  
                                type="button" 
                                class="inline-flex items-center font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5  shadow"
                                @click="openCancelModal = true">
                                Cancel Request
                            </button>
                        </div>
                        
                    
                        <!-- Modal -->
                        <div x-show="openCancelModal" 
                            @keydown.window.escape="openCancelModal = false" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            tabindex="-1" 
                            class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                            id="popup-modal">
                    
                            <div x-show="openCancelModal" 
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-90"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-90"
                                class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                                
                                <button type="button" @click="openCancelModal = false"
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
                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm cancellation?</h3>
                                        <button wire:click.prevent="cancelRequest" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                            Yes
                                        </button>
                                        <button @click="openCancelModal = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                            No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                            @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'IT Ticket Cancelled'; openCancelModal = false; setTimeout(() => showToast = false, 3000)"
                            @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; openCancelModal = false; setTimeout(() => showToast = false, 3000)">
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
                    </div>
                <!-- Loading screen -->
                <div wire:loading wire:target="cancelRequest" class="load-over z-50">
                    <div wire:loading wire:target="cancelRequest" class="loading-overlay z-50">
                        <div class="flex flex-col items-center justify-center">
                            <div class="spinner"></div>
                            <p>Cancelling your Request...</p>
                        </div>
                    </div>
                </div>
            @endif
    </section>
    
    </div>
</div>


</script>