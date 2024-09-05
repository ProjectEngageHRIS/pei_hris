<div class="mt-5 sm:mx-auto sm:max-w-md">
    <div style="width: 183px; height: 1px; position: relative">
        <div style="width: 183px; height: 2px; left: 72%; top: 0px; position: absolute; background: #AC0C2E"></div>
        <div style="width: 35px; height: 1px; left: 0%; top: 0px; border-radius:100px;  position: absolute; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0.99) 7%, rgba(229, 231, 235, 0.96) 13%, rgba(229, 231, 235, 0.92) 20%, rgba(229, 231, 235, 0.85) 27%, rgba(229, 231, 235, 0.77) 33%, rgba(229, 231, 235, 0.67) 40%, rgba(229, 231, 235, 0.56) 47%, rgba(229, 231, 235, 0.44) 53%, rgba(229, 231, 235, 0.33) 60%, rgba(229, 231, 235, 0.23) 67%, rgba(229, 231, 235, 0.15) 73%, rgba(229, 231, 235, 0.08) 80%, rgba(229, 231, 235, 0.04) 87%, rgba(229, 231, 235, 0.01) 93%, rgba(229, 231, 235, 0) 100%)"></div>
        <div style="width: 35px; height: 1px; left: 72%; top: 0px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0) 100%)"></div>
    </div>

    <div class="px-4 py-4 bg-white shadow sm:rounded-lg sm:px-10">
        <div x-data="{ showModal: false, showKey: false }" class="flex flex-col items-center">
            <div class="flex">
                <img src="{{ asset('assets/sllogo.png') }}" class="mr-5 h-auto max-h-[90px]" alt="SL Logo">
                <h1 class="mt-4 text-xl font-bold text-customRed">SL Groups</h1>
            </div>
        
            @if($QR_Image)
                <p class="mt-4 text-md font-bold text-gray-800">Scan the code using Google Authenticator</p>
                {!! $QR_Image !!}
            @endif
        
            <p class="mt-4 text-sm text-red-600 font-bold">Never share your setup key with anyone.</p>
        
            <div class="mt-4 text-center text-gray-800">
                <p class="text-md font-medium flex items-center">
                    <span class="mr-2">Setup Key:</span>
                    <code x-text="showKey ? '{{ $secret }}' : '***************'" class="bg-gray-100 p-1 rounded"></code>
                    <svg @click="showKey = !showKey" x-show="showKey" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-2 cursor-pointer hover:text-gray-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg @click="showKey = !showKey" x-show="!showKey" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-2 cursor-pointer hover:text-gray-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                    <svg @click="showModal = true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 ml-2 cursor-pointer hover:text-gray-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                    </svg>
                </p>
        
                <!-- Modal -->
                <div x-show="showModal" @click.away="showModal = false"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50"
                     style="background: rgba(0, 0, 0, 0.5);">
                    <div x-transition:enter="transition ease-out duration-300 transform"
                         x-transition:enter-start="scale-90"
                         x-transition:enter-end="scale-100"
                         x-transition:leave="transition ease-in duration-200 transform"
                         x-transition:leave-start="scale-100"
                         x-transition:leave-end="scale-95"
                         class="bg-white p-6 rounded-lg shadow-lg max-w-md mx-auto">
                         <p class="mt-4 mb-2 text-red-600 font-bold">!! Never share your setup key with anyone. It is confidential and should be kept private to ensure the security of your account !!</p>
                        <h2 class="text-lg font-bold text-gray-900">Setup Instructions</h2>
                        <p class="mt-4 text-gray-700">To set up Two-Factor Authentication manually, follow these steps:</p>
                        <ul class="mt-2 list-disc list-inside text-left text-gray-600 pl-6">
                            <li>Open the Google Authenticator app on your mobile device.</li>
                            <li>Tap on the '+' icon to add a new account.</li>
                            <li>Select 'Enter a setup key'.</li>
                            <li>For 'Account Name', enter <strong>SL Groups</strong>.</li>
                            <li>For 'Secret Key', enter <strong>{{ $secret }}</strong>.</li>
                            <li>Tap 'Add' to complete the setup.</li>
                            <li>Click 'Close' below here, and verify the OTP from your authenticator.</li>
                        </ul>
                        <button @click="showModal = false" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-lg">Close</button>
                    </div>
                </div>
            </div>
        </div>
       
        <form wire:submit.prevent="checkOtp">
            <div class="mt-6">
                
                <label class="block mb-2 text-md text-center font-medium leading-5 mb-2 text-customGray1">
                    Please enter the <span class="text-customRed">6-digit OTP</span> displayed in your Google Authenticator app to verify your identity.
                </label>
        
                <!-- OTP Input Field Label -->
                <label for="otp" class="block text-xs font-semibold leading-5 mb-2 text-customGray1">
                    One-Time Password (OTP) <span style="color:#AC0C2E">*</span>
                </label>

                <input wire:model="otp" type="text" id="otp" required placeholder="Enter your 6-digit OTP" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:border-customRed focus:ring-customRed  transition duration-150 ease-in-out sm:text-sm sm:leading-5 custom-border @error('otp') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                @error('otp')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" @disabled($tooManyLoginAttempts) style="background: #AC0C2E" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md shadow bg-customRed">
                Verify OTP
            </button>
        </form> 
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
    Livewire.on('otpSent', () => {
        // Handle OTP sent event
        console.log('OTP sent');
        startResendCountdown(); // Start the resend countdown after OTP is sent
    });

    Livewire.on('otpVerified', () => {
        // Handle OTP verified event
        console.log('OTP verified');
    });

    // Function to handle countdown
    function startResendCountdown() {
        let countdown = 30;
        const button = document.getElementById('resend-otp-button');
        button.disabled = true; // Disable the button during countdown

        const timer = setInterval(() => {
            countdown--;
            if (countdown >= 0) {
                button.innerText = `Resend OTP (${countdown})`;
            } else {
                clearInterval(timer);
                button.disabled = false; // Re-enable the button after countdown completes
                button.innerText = 'Resend OTP';
                Livewire.emit('resendOtp'); // Trigger Livewire event to start countdown
            }
        }, 1000);
    }
});

</script>
