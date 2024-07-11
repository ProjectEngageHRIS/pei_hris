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
                <label for="old_password" class="block text-sm font-medium leading-5 text-gray-700">Current Password <span style="color:#AC0C2E">*</span></label>
                <input wire:model="old_password" type="password" id="old_password" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-blue sm:text-sm sm:leading-5 custom-border" />
                @error('old_password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <a href="{{route('PasswordReset')}}" class="text-customRed text-sm float-right mt-2">Forgot Password?</a>
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
                <input wire:model="password" type="password" id="password" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-blue sm:text-sm sm:leading-5 custom-border @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4"> <!-- Adjusted mt-6 to mt-4 -->
                <label for="password_confirmation" class="block text-sm font-medium leading-5 text-gray-700">Confirm New Password <span style="color:#AC0C2E">*</span></label>
                <input wire:model="password_confirmation" type="password" id="password_confirmation" required class="block w-full px-3 py-2 placeholder-gray-400 transition duration-150 ease-in-out border border-gray-300 rounded-md appearance-none focus:outline-none focus:border-red-500 focus:ring-blue sm:text-sm sm:leading-5 custom-border" />
            </div>

            <button type="submit" style="background: #AC0C2E" class="w-full px-4 py-2 mt-4 text-sm font-medium text-white transition duration-150 ease-in-out rounded-md active:bg-indigo-700">
                Change Password
            </button>
        </form>
    </div>
</div>
