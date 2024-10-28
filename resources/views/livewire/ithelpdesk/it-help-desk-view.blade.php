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
    </section>
    
    </div>
</div>


</script>