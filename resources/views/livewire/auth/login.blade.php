@section('title', 'Sign in to your account')
<main class="grid content-center h-full min-h-screen place-content-center">
    <div class="w-1/2 h-[2px] bg-customRed place-self-center"></div>
    <section class="flex flex-col w-full gap-6 p-10 bg-white shadow-lg rounded-xl min-w-[calc(100vw-80px)] min-[630px]:min-w-[550px]">
        <div class="self-center">
            <img src="{{ asset('assets\sllogo.png') }}" class="size-14" alt="SL Logo">
        </div>
        <form wire:submit.prevent="authenticate" class="flex flex-col gap-6">
            @csrf
            <div>
                <label for="email" class="text-sm leading-5 text-gray-900">
                    Employee ID <span class="text-customRed">*</span>
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input wire:model.lazy="email" id="email" name="email" type="text" required autofocus 
                    class="w-full border-gray-300 rounded-lg focus:ring-0 focus:border-customRed focus:ring-customRed
                    @error('email') border-red-300 @enderror" />
                </div>
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class="text-sm leading-5 text-gray-900">
                    Password <span class="text-customRed">*</span>
                </label>
                <div class="mt-1 rounded-md shadow-sm">
                    <input wire:model.lazy="password" id="password" type="password" required 
                    class="w-full border-gray-300 rounded-lg focus:ring-0 focus:border-customRed focus:ring-customRed
                    @error('password') border-red-300 @enderror" />
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center gap-2">
                <input wire:model.lazy="remember" id="remember" type="checkbox" class="transition duration-150 ease-in-out border size-4 form-checkbox text-customRed focus:ring focus:ring-white" />
                <label for="remember" class="text-sm leading-5 text-gray-900">
                    Remember
                </label>
            </div>
            <button @disabled($tooManyLoginAttempts) type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white transition duration-150 ease-in-out rounded-lg bg-customRed">
                Sign in
            </button>
        </form>
    </section>
</main>