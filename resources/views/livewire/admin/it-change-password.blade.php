<div class="mt-15 sm:mx-auto sm:max-w-md"> <!-- Adjusted mt-20 to mt-10 -->
    <div style="width: 183px; height: 1px; position: relative">
        <div style="width: 35px; height: 1px; left: 0%; top: 0px; border-radius:100px;  position: absolute; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0.99) 7%, rgba(229, 231, 235, 0.96) 13%, rgba(229, 231, 235, 0.92) 20%, rgba(229, 231, 235, 0.85) 27%, rgba(229, 231, 235, 0.77) 33%, rgba(229, 231, 235, 0.67) 40%, rgba(229, 231, 235, 0.56) 47%, rgba(229, 231, 235, 0.44) 53%, rgba(229, 231, 235, 0.33) 60%, rgba(229, 231, 235, 0.23) 67%, rgba(229, 231, 235, 0.15) 73%, rgba(229, 231, 235, 0.08) 80%, rgba(229, 231, 235, 0.04) 87%, rgba(229, 231, 235, 0.01) 93%, rgba(229, 231, 235, 0) 100%)"></div>
        <div style="width: 35px; height: 1px; left: 72%; top: 0px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0) 100%)"></div>
    </div>
    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10 mt-4"> <!-- Adjusted mt-20 to mt-4 -->
        <div class="flex flex-col items-center">
            <h1 class="mt-4 text-xl font-bold text-customRed">Change Password</h1>
        </div>

        <form wire:submit.prevent="changePassword" class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->

            <div class="mt-4 "> <!-- Adjusted mt-6 to mt-4 -->
                <div id="targetContainer" wire:ignore class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Target Employee<span class="text-red-600">*</span></label>
                    <select style="width:100%; height:100% background:gray;" class="js-example-basic mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 ">
                        <option value="N/A">Select an Employee</option>
                        @foreach($employeeNames as $name)
                           <option value="{{$name}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('selectedEmployee')
                <div class="text-sm transition transform alert alert-danger"
                        x-data x-init="document.getElementById('targetContainer').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('targetContainer').focus();" >
                            <span class="text-xs text-red-500" > {{$message}}</span>
                    </div>
                 @enderror
                
                <script>
                    $(document).ready(function() {
                        $('.js-example-basic').select2({
                            placeholder: 'Select an option',
                            closeOnSelect: true,  // Automatically closes dropdown after selection
                        }).on('select2:open', function() {
                            // Apply Tailwind CSS classes to the Select2 dropdown
                            $('.select2-dropdown').addClass(' bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ');
                            $('.select2-results__options').addClass('p-2 ');
                        }).on('change', function() {
                            let data = $(this).val();
                            console.log(data);
                            @this.selectedEmployee = data;
                        });
                        $('.select2-container--default .select2-selection--multiple').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2');
                
                        // Toggle modal visibility when form submission is completed
                        Livewire.on('formSubmitted', () => {
                            $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
                        });
                    });
                </script>
            </div>
            <div >
                <ul class="mt-8 ml-3 list-disc text-xs text-gray-600"> <!-- Adjusted mt-6 to mt-4 -->
                    <li>At least 8 characters long</li>
                    <li>At least one uppercase letter (A-Z)</li>
                    <li>At least one lowercase letter (a-z)</li>
                    <li>At least one number (0-9)</li>
                    <li>At least one special character (e.g., !, @, #, $)</li>
                </ul>
            </div>
            <div class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->
                <label for="password" class="block text-sm font-medium leading-5 text-gray-700">New Password <span style="color:#AC0C2E">*</span></label>
                <input wire:model="password" type="password" id="password" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-customRed sm:text-sm sm:leading-5 custom-border @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->
                <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">Confirm New Password <span style="color:#AC0C2E">*</span></label>
                <input wire:model="password_confirmation" type="password" id="password_confirmation" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-customRed  sm:text-sm sm:leading-5 custom-border" />
            </div>

            <button type="submit" style="background: #AC0C2E" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md active:bg-indigo-700">
                Change Password
            </button>
        </form>

        <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Changed Password Successfully';  cancelModal = false; setTimeout(() => showToast = false, 3000)"
                @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong.'; cancelModal = false; setTimeout(() => showToast = false, 3000)">
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
</div>
