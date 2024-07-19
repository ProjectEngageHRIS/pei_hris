<div>
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg> Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-400 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('ItHelpDeskTable')}}" class="text-sm font-medium text-gray-700 ms-1 hover:text-customRed md:ms-2">IT Helpdesk</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-600 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="text-sm font-semibold text-gray-900 ms-1 md:ms-2">Submit Concern</span>
                </div>
            </li>
        </ol>
    </nav>
    <h2 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">Submit Concern</h2>
    <form wire:submit.prevent="submit" method="POST" class="p-8 mt-10 bg-white rounded-lg flex flex-col gap-4">
        @csrf
        {{-- Information field --}}
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-customRed">Information</h2>
            <div class="grid grid-cols-1 min-[902px]:grid-cols-6 gap-4">
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="firstname" class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-500">First name</label>
                    <input type="text" name="firstname" id="firstname" value="{{$first_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="middlename" class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-500">Middle name</label>
                    <input type="text" name="middlename" id="middlename" value="{{$middle_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-2">
                    <label for="lastname" class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-500">Last name</label>
                    <input type="text" name="lastname" id="lastname"  value="{{$last_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="department_name" class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-500">Department Name</label>
                    <input type="text" name="department_name" id="department_name"  value="{{$department_name}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div class="col-span-1 min-[902px]:col-span-3">
                    <label for="email" class="block mb-2 text-sm font-medium whitespace-nowrap text-gray-500">Email</label>
                    <input type="text" name="email" id="email"  value="{{$email}}" required="" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
            </div>
        </div>
        <hr class="my-2 border-gray-300">
        {{-- Concern Information --}}
        <div class="flex flex-col gap-4">
            <h2 class="font-bold text-red-700">Concern Information <span class="text-base text-gray-900">(Max: 5000 Characters only) </span><span class="text-base text-customRed">*</span> </h2>
            <div id="description_container">
                <textarea type="text" rows="10" id="description" name="description" wire:model="description" maxlength="5000"
                    placeholder="Write your concern here. Maximum of 5000 characters only."
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg ring-1 border border-gray-200 ring-gray-300 focus:border-customRed focus:ring-customRed">
                </textarea>
                @error('description')
                    <div class="text-sm transition transform alert alert-danger"
                        x-data x-init="document.getElementById('description_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('description_container').focus();" >
                            <span class="text-xs text-red-500" > {{$message}}</span>
                    </div>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-2 justify-items-end">
            <button type="submit" class="col-span-1 col-start-2 inline-flex items-center font-medium text-white hover:bg-red-600 hover:text-white bg-customRed rounded-8px text-sm px-5 py-2.5 me-2 shadow">
                Submit Concern
            </button>
        </div>
        <!-- Loading screen -->
        <div wire:loading wire:target="submit" class="load-over">
            <div wire:loading wire:target="submit" class="loading-overlay">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Submitting your Concern...</p>
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
                <div class="text-sm font-normal ms-3">Concern Submitted Successfully</div>
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
</div>

<script>
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
