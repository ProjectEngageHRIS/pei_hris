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
        </div>

        @if (!$otpVerified)
            @if (!$otpSent)
                <form wire:submit.prevent="sendOtp">
                    <div>
                        <h2 class="mt-4 mb-2 text-lg font-semibold text-customGray1">Forgot Password</h2>
                        <label class="block mb-2 text-xs font-medium leading-5 text-customGray1">Enter your email and we'll send an OTP to reset your password</label>
                        <label for="email" class="block mb-2 text-xs font-semibold leading-5 text-customGray1">
                            Enter email address: <span style="color:#AC0C2E">*</span>
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input wire:model="email" type="text" id="email" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-customRed focus:border-customRed input transition duration-150 ease-in-out sm:text-sm sm:leading-5 custom-border shadow-inner @error('email') border-red-300 text-red-900 placeholder-red-300  @enderror" />
                        </div>
                        @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md shadow bg-customRed">
                        Send OTP
                    </button>
                </form>
            @endif

            @if ($otpSent)
                <form wire:submit.prevent="checkOtp">
                    <div class="mt-6">
                        <label class="block mb-2 text-xs font-medium leading-5 text-customGray1">Enter OTP that we've sent to your email</label>
                        <label for="otp" class="block text-xs font-semibold leading-5 text-customGray1">
                            Enter OTP <span style="color:#AC0C2E">*</span>
                        </label>
                        <input wire:model="otp" type="text" id="otp" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:border-red-500 focus:ring-blue transition duration-150 ease-in-out sm:text-sm sm:leading-5 custom-border @error('otp') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                        @error('otp')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" style="background: #AC0C2E" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md shadow bg-customRed">
                        Verify OTP
                    </button>
                </form>
            @endif
        @endif

        @if ($otpVerified)
            <form wire:submit.prevent="changePassword">
                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium leading-5 text-gray-700">
                        New Password <span style="color:#AC0C2E">*</span>
                    </label>
                    <input wire:model="password" type="password" id="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:border-red-500 focus:ring-blue transition duration-150 ease-in-out sm:text-sm sm:leading-5 custom-border @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">
                        Confirm New Password <span style="color:#AC0C2E">*</span>
                    </label>
                    <input wire:model="password_confirmation" type="password" id="password_confirmation" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-blue sm:text-sm sm:leading-5 custom-border" />
                </div>

                <button type="submit" style="background: #AC0C2E" class="w-full px-4 py-2 mt-6 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md active:bg-indigo-700">
                    Change Password
                </button>
            </form>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('otpSent', () => {
            // Handle OTP sent event
            console.log('OTP sent');
        });

        Livewire.on('otpVerified', () => {
            // Handle OTP verified event
            console.log('OTP verified');
        });
    });
</script>
@endpush
