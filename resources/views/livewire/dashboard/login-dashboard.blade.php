
<div class="text-primary-content" style=" width: 100%; height: 100%;  background-image: url('{{ asset('logo/sllogo.png') }}');  background-repeat: no-repeat; box-shadow: 394px 394px 394px; filter: blur(394px) background-size: cover; background-position: center;">
    <style>
        .loginButton{
           background: #AC0C2E;
        }
        .loginButton:hover{
            background: #72081f;
        }
        .loginButton:focus{
                        border-color: #AC0C2E!important;
            box-shadow: 0 0 0 1px #AC0C2E !important; 
        }
    </style>
    
    <div class="text-primary-content" style="background-image: url('{{ asset('logo/bg.png') }}'); width: 100%; height: 100%; background-size: cover; background-position: center;">
    <div class="flex items-center justify-center h-screen" style="background: rgba(172, 12, 46, 0.10); box-shadow: 200px 200px 200px; filter: blur(200px) background-size: cover; background-position: center;">
        <div class="p-4 shadow-xl card rounded-lg" style=" backdrop-filter: blur(10px) ">
            <div class="flex flex-grow items-center card-body">
                    <button type="button" onclick="location.href='{{ route('EmployeeDashboard') }}'" class="text-white loginButton focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 h-40 me-2 mt-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <div class="text-center items-center flex flex-col">  <div class="flex "> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 justify-self-center">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                        <div class="text-center mt-4">  @if ($is_president) President Portal @else Employee Portal @endif
                        </div>
                    </div>
                    </button>
                    @if ($is_hr || $is_superadmin)
                        <button type="button" onclick="location.href='{{ route('HumanResourceDashboard') }}'" class="text-white  loginButton focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 h-40 me-2 mt-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" style="word-wrap: break-word;">
                            <div class="text-center items-center flex flex-col mt-4">  <div class="flex "> 
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                                </svg>
                            </div>
                            <div class="text-center mt-4">  Human Resource <br> Portal
                            </div>
                            </div>
                        </button>
                    @endif
                    @if ($is_accounting || $is_superadmin)
                    <button type="button" onclick="location.href='{{ route('AccountingDashboard') }}'" class="text-white loginButton focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 h-40 me-2 mt-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" style="word-wrap: break-word;">
                        <div class="text-center items-center flex flex-col ">  <div class="flex "> 
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                              </svg>
                              
                        </div>
                        <div class="text-center mt-4">  Accounting  Portal
                        </div>
                        </div>
                    </button>
                    @endif
                    @if($is_it || $is_superadmin)
                    <button type="button" onclick="location.href='{{ route('ItDashboard') }}'"  class="text-white loginButton focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 h-40 me-2 mt-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" style="word-wrap: break-word;">
                        <div class="text-center items-center flex flex-col ">  <div class="flex "> 
                            <svg class="w-6 h-6 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 2a7 7 0 0 0-7 7 3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V9a5 5 0 1 1 10 0v7.083A2.919 2.919 0 0 1 14.083 19H14a2 2 0 0 0-2-2h-1a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a2 2 0 0 0 1.732-1h.351a4.917 4.917 0 0 0 4.83-4H19a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3 7 7 0 0 0-7-7Zm1.45 3.275a4 4 0 0 0-4.352.976 1 1 0 0 0 1.452 1.376 2.001 2.001 0 0 1 2.836-.067 1 1 0 1 0 1.386-1.442 4 4 0 0 0-1.321-.843Z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="text-center mt-4">  IT Help Desk Portal
                        </div>
                        </div>
                    </button>
                    @endif                
            </div>
        </div>
    </div>
    {{-- <script src="/livewire/livewire.js?id={{ now()->timestamp }}"> --}}
    {{-- </script> --}}
</div>
