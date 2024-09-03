@section('title', 'Kalimutan mo password mo ssob')
<div class="mt-20 sm:mx-auto sm:max-w-md">
    <div style="width: 183px; height: 1px; position: relative">
        <div style="width: 183px; height: 2px; left: 72%; top: 0px; position: absolute; background: #AC0C2E"></div>
        <div style="width: 35px; height: 1px; left: 0%; top: 0px; border-radius:100px;  position: absolute; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0.99) 7%, rgba(229, 231, 235, 0.96) 13%, rgba(229, 231, 235, 0.92) 20%, rgba(229, 231, 235, 0.85) 27%, rgba(229, 231, 235, 0.77) 33%, rgba(229, 231, 235, 0.67) 40%, rgba(229, 231, 235, 0.56) 47%, rgba(229, 231, 235, 0.44) 53%, rgba(229, 231, 235, 0.33) 60%, rgba(229, 231, 235, 0.23) 67%, rgba(229, 231, 235, 0.15) 73%, rgba(229, 231, 235, 0.08) 80%, rgba(229, 231, 235, 0.04) 87%, rgba(229, 231, 235, 0.01) 93%, rgba(229, 231, 235, 0) 100%)"></div>
        <div style="width: 35px; height: 1px; left: 72%; top: 0px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0) 100%)"></div>
    </div>

    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
        <div class="flex flex-col items-center">
            <img src="{{ asset('assets/sllogo.png') }}" class="mr-2 h-auto max-h-[90px]" alt="SL Logo">
            <h1 class="mt-4 text-xl font-bold text-customRed">SL Groups</h1>

            @if($QR_Image)
                <p class="mt-4 text-md font-bold text-gray-800">Scan the code using Google Authenticator</p>
                {!! $QR_Image !!}
            @endif
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
                <button type="submit" style="background: #AC0C2E" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md shadow bg-customRed">
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
