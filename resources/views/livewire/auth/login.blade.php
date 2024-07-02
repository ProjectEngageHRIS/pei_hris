@section('title', 'Sign in to your account')

<div>
    {{-- <div class="sm:mx-auto sm:w-full sm:max-w-md text-center flex flex-col items-center">
        <a href="{{ route('dashboard') }}" class="inline-block">
            <img src="{{ asset('storage/plmlogo/plm.png') }}" style="height: auto; max-height: 75px;" alt="PLM Logo">
        </a>
    
        <h2 class="mt-6 text-3xl font-semibold text-center text-blue-700 leading-9">
            Sign in to your account
        </h2>
        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-gray-600 leading-5 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                    create a new account
                </a>
            </p>
        @endif
    </div> --}}
    <style>
        /* .input{
            background: #AC0C2E !important;
        } */
        #email:focus{
            border-color: #AC0C2E!important;
            box-shadow: 0 0 0 1px #AC0C2E !important; 
        }
        #password:focus{
            border-color: #AC0C2E!important;
            box-shadow: 0 0 0 1px #AC0C2E !important; 
        }
    </style>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div style="width: 183px; height: 1px; position: relative">
            <div style="width: 183px; height: 2px; left: 72%; top: 0px; position: absolute; background: #AC0C2E"></div>
            <div style="width: 35px; height: 1px; left: 0%; top: 0px; border-radius:100px;  position: absolute; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0.99) 7%, rgba(229, 231, 235, 0.96) 13%, rgba(229, 231, 235, 0.92) 20%, rgba(229, 231, 235, 0.85) 27%, rgba(229, 231, 235, 0.77) 33%, rgba(229, 231, 235, 0.67) 40%, rgba(229, 231, 235, 0.56) 47%, rgba(229, 231, 235, 0.44) 53%, rgba(229, 231, 235, 0.33) 60%, rgba(229, 231, 235, 0.23) 67%, rgba(229, 231, 235, 0.15) 73%, rgba(229, 231, 235, 0.08) 80%, rgba(229, 231, 235, 0.04) 87%, rgba(229, 231, 235, 0.01) 93%, rgba(229, 231, 235, 0) 100%)"></div>
            <div style="width: 35px; height: 1px; left: 72%; top: 0px; position: absolute; transform: rotate(180deg); transform-origin: 0 0; background: linear-gradient(90deg, #E5E7EB 0%, rgba(229, 231, 235, 0) 100%)"></div>
        </div>
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            
            <div class="sm:mx-auto sm:w-full sm:max-w-md tex    t-center flex flex-col items-center mb-10">
                {{-- <a href="{{ route('dashboard') }}" class="inline-block"> --}}
    
                   <div class="flex ">
                    <img src="{{ asset('storage/logo/sllogo.png') }}" style="height: auto; max-height: 90px;" class="mr-2" alt="SL Logo">
                    {{-- <img src="{{ asset('storage/plmlogo/plm.png') }}" style="height: auto; max-height: 75px;" alt="PLM Text"> --}}
                   </div>
                {{-- </a> --}}
            </div>
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 leading-5">
                        Employee ID <span style="color:#AC0C2E">*</span>
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="text" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none input transition duration-150 ease-in-out sm:text-sm sm:leading-5 custom-border @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />

                        {{-- <input wire:model.lazy="email" id="email" name="email" type="text" required autofocus class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md  focus:border-red-500 focus:outline-none input transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" /> --}}
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 leading-5">
                        Password <span style="color:#AC0C2E">*</span>
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-blue focus:border-red-500 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 text-blue-600 transition duration-150 ease-in-out" />
                        <label for="remember" class="block ml-2 text-sm text-gray-900 leading-5">
                            Remember
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-blue-600 hover:text-blue-800 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                        <a href="#" class="font-medium text-blue-600 hover:text-blue-800 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Forgot your password?
                        </a>
                    </div>
                </div> --}}

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" style="background: #AC0C2E" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white rounded-md  active:bg-indigo-700 transition duration-150 ease-in-out">
                            Sign in
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
