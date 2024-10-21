<div class="mt-15 sm:mx-auto sm:max-w-md"> <!-- Adjusted mt-20 to mt-10 -->
    <div style="width: 183px; height: 1px; position: relative">
        <div style="width: 35px; height: 1px; left: 0%; top: 0px; border-radius:100px;  position: absolute; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0.99) 7%, rgba(229, 231, 235, 0.96) 13%, rgba(229, 231, 235, 0.92) 20%, rgba(229, 231, 235, 0.85) 27%, rgba(229, 231, 235, 0.77) 33%, rgba(229, 231, 235, 0.67) 40%, rgba(229, 231, 235, 0.56) 47%, rgba(229, 231, 235, 0.44) 53%, rgba(229, 231, 235, 0.33) 60%, rgba(229, 231, 235, 0.23) 67%, rgba(229, 231, 235, 0.15) 73%, rgba(229, 231, 235, 0.08) 80%, rgba(229, 231, 235, 0.04) 87%, rgba(229, 231, 235, 0.01) 93%, rgba(229, 231, 235, 0) 100%)"></div>
        <div style="width: 35px; height: 1px; left: 72%; top: 0px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0) 100%)"></div>
    </div>
    <div class="px-4 py-8 bg-white shadow rounded-lg sm:px-10 mt-4"> <!-- Adjusted mt-20 to mt-4 -->
        <div class="flex flex-col items-center">
            <h1 class="mt-4 text-xl font-bold text-customRed">Change Password</h1>
        </div>

        <form wire:submit.prevent="changePassword" class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->

            <div x-data="{
                old_password: @entangle('old_password'),
                showPassword: false,
            }"
            class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->
            
            <label for="old_password" class="block text-sm font-medium leading-5 mb-2 text-gray-700">Current Password <span style="color:#AC0C2E">*</span></label>
            
            <div class="relative">
                <input wire:model="old_password" 
                       :type="showPassword ? 'text' : 'password'" 
                       id="old_password" 
                       required 
                       class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-customRed sm:text-sm sm:leading-5 custom-border" />
                
                <button
                    type="button"
                    @click="showPassword = !showPassword"
                    class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         x-show="!showPassword" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                         x-show="showPassword" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
        
            @error('old_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        
        <div x-data="{
                password: @entangle('password'),
                showPassword: false,
                length: false,
                uppercase: false,
                lowercase: false,
                number: false,
                special: false,
                checkPassword() {
                    this.length = this.password.length >= 8;
                    this.uppercase = /[A-Z]/.test(this.password);
                    this.lowercase = /[a-z]/.test(this.password);
                    this.number = /[0-9]/.test(this.password);
                    this.special = /[!@#$%^&*(),.?\&quot;\:{}|<>]/.test(this.password);
                }
            }"
            x-init="() => $watch('password', () => checkPassword())">
            
                <div class="relative mt-4">
                    <label for="password" class="block text-sm font-medium leading-5 mb-2 text-gray-700">
                        New Password <span style="color:#AC0C2E">*</span>
                    </label>
                    <input
                        x-model="password"
                        :type="showPassword ? 'text' : 'password'"
                        id="password"
                        required
                        class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-customRed sm:text-sm sm:leading-5 custom-border"
                    />
                    <button
                        type="button"
                        @click="showPassword = !showPassword"
                        class="absolute inset-y-0 right-0 px-3 flex mt-7 items-center text-gray-500"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"                             
                            x-show="!showPassword"
                            class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke-width="1.5" 
                             stroke="currentColor" 
                             x-show="showPassword"
                             class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                          
                        </svg>
                          
                    </button>
                </div>
                @error('password')
                <div class="text-sm transition transform alert alert-danger"
                        x-data x-init="document.getElementById('targetContainer').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('targetContainer').focus();" >
                            <span class="text-xs text-red-500" > {{$message}}</span>
                    </div>
                 @enderror
            
                <style>
                    #password {
                        user-select: none; /* Prevents text selection */
                        -webkit-user-select: none; /* Chrome, Safari, and Opera */
                        -moz-user-select: none; /* Firefox */
                        -ms-user-select: none; /* Internet Explorer/Edge */
                    }

                    input::-ms-reveal,
                    input::-ms-clear {
                        display: none;
                    }
                </style>
            
                <script>
                    document.addEventListener('DOMContentLoaded', (event) => {
                        const inputField = document.getElementById('password');
            
                        // Disable copy
                        inputField.addEventListener('copy', (e) => {
                            e.preventDefault();
                        });
            
                        // Disable cut
                        inputField.addEventListener('cut', (e) => {
                            e.preventDefault();
                        });
            
                        // Disable paste
                        inputField.addEventListener('paste', (e) => {
                            e.preventDefault();
                        });
            
                        // Optionally, disable context menu (right-click menu)
                        inputField.addEventListener('contextmenu', (e) => {
                            e.preventDefault();
                        });
                    });
                </script>
            
                <ul class="mt-4 ml-3 list-disc text-xs text-gray-600">
                    <li :class="{'text-green-500': length}">
                        <span x-show="length">✔</span> At least 8 characters long
                    </li>
                    <li :class="{'text-green-500': uppercase}">
                        <span x-show="uppercase">✔</span> At least one uppercase letter (A-Z)
                    </li>
                    <li :class="{'text-green-500': lowercase}">
                        <span x-show="lowercase">✔</span> At least one lowercase letter (a-z)
                    </li>
                    <li :class="{'text-green-500': number}">
                        <span x-show="number">✔</span> At least one number (0-9)
                    </li>
                    <li :class="{'text-green-500': special}">
                        <span x-show="special">✔</span> At least one special character (e.g., !, @, #, $)
                    </li>
                </ul>

                <div class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->
                    <div class="relative mt-4">
                        <label for="password_confirmation" class="block text-sm font-medium leading-5 mb-2 text-gray-700">Confirm New Password <span style="color:#AC0C2E">*</span></label>
                        <input wire:model="password_confirmation" :type="showPassword ? 'text' : 'password'" id="password_confirmation" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-customRed  sm:text-sm sm:leading-5 custom-border" />
                        <button
                            type="button"
                            @click="showPassword = !showPassword"
                            class="absolute inset-y-0 right-0 px-3 flex mt-6 items-center text-gray-500"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"                             
                                x-show="!showPassword"
                                class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke-width="1.5" 
                                 stroke="currentColor" 
                                 x-show="showPassword"
                                 class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                              
                            </svg>
                              
                        </button>
                    </div>
                </div>
        </div>
            <button type="submit" style="background: #AC0C2E" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md active:bg-indigo-700">
                Change Password
            </button>
        </form>

        <!-- Loading screen -->
        <div wire:loading wire:target="changePassword" class="load-over">
            <div wire:loading wire:target="changePassword" class="loading-overlay">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Checking...</p>
                </div>
            </div>
        </div>
        <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                @trigger-success.window="showToast = true; toastType = 'success'; toastMessage = 'Changed Password Successfully';  cancelModal = false; setTimeout(() => showToast = false, 3000)"
                @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please Contact IT Support'; cancelModal = false; setTimeout(() => showToast = false, 3000)">
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
