<div class="main-content">
    <div class="p-4 rounded-lg ">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-900 hover:text-customRed ">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Home
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="w-3 h-3 mx-1 text-gray-500 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="{{route('PayrollTable')}}" class="text-sm font-semibold ms-1 text-gray-00 hover:text-customRed md:ms-2 ">Payslip</a>
                </div>
            </li>
            </ol>
        </nav>
        <h2 class="mb-8 text-3xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl">Payslip</h2>

        <div class="w-full  mt-4  bg-white rounded-t-lg shadow-md" >
            <div class="p-4 overflow-x-auto">
                <div class="inline-block min-w-full box-border">
                    <div class="flex  flex-wrap pb-1 items-center justify-between w-full  space-y-4 min-[567px]:space-y-0  flex-column sm:flex-row ">
                        <div class="flex space-x-3 pl-1" style="padding-bottom: 0.05rem">
                            {{-- Phase Filter --}}
                            <button id="dropdownRadioButton" data-dropdown-toggle="phaseDropdown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 min-w-[80px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-3" type="button">
                                {{$phaseFilterName}}
                                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- Phase Dropdown menu -->
                            <div id="phaseDropdown" class="z-50 hidden w-48 mt-2  bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                                <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <label for="phaseFilter-radio-0" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="phaseFilter-radio-0" type="radio" wire:model.live="phaseFilter" value="0" name="phaseFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="phaseFilter-radio-0" class="cursor-pointer"> &nbsp; All </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="phaseFilter-radio-1" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="phaseFilter-radio-1" type="radio" wire:model.live="phaseFilter" value="1" name="phaseFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="phaseFilter-radio-1" class="cursor-pointer"> &nbsp; 1st Half </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="phaseFilter-radio-2" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="phaseFilter-radio-2" type="radio" wire:model.live="phaseFilter" value="2" name="phaseFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="phaseFilter-radio-2" class="cursor-pointer"> &nbsp; 2nd Half </label>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            {{-- Month Filter --}}
                            <button id="dropdownRadioButton" data-dropdown-toggle="monthDropdown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 min-w-[80px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-3" type="button">
                                {{$monthFilterName}}
                                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- Month Dropdown menu -->
                            <div id="monthDropdown" class="z-50 hidden w-48 mt-2 max-h-60 overflow-y-scroll bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                                <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <label for="monthFilter-radio-12" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-12" type="radio" wire:model.live="monthFilter" value="0" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-12" class="cursor-pointer"> &nbsp; All </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-0" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-0" type="radio" wire:model.live="monthFilter" value="January" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-0" class="cursor-pointer"> &nbsp; January </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-1" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-1" type="radio" wire:model.live="monthFilter" value="February" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-1" class="cursor-pointer"> &nbsp; February </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-2" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-2" type="radio" wire:model.live="monthFilter" value="March" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-2" class="cursor-pointer"> &nbsp; March </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-3" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-3" type="radio" wire:model.live="monthFilter" value="April" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-3" class="cursor-pointer"> &nbsp; April </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-4" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-4" type="radio" wire:model.live="monthFilter" value="May" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-4" class="cursor-pointer"> &nbsp; May </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-5" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-5" type="radio" wire:model.live="monthFilter" value="June" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-5" class="cursor-pointer"> &nbsp; June </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-6" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-6" type="radio" wire:model.live="monthFilter" value="July" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-6" class="cursor-pointer"> &nbsp; July </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-7" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-7" type="radio" wire:model.live="monthFilter" value="August" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-7" class="cursor-pointer"> &nbsp; August </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-8" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-8" type="radio" wire:model.live="monthFilter" value="September" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-8" class="cursor-pointer"> &nbsp; September </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-9" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-9" type="radio" wire:model.live="monthFilter" value="October" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-9" class="cursor-pointer"> &nbsp; October </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-10" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-10" type="radio" wire:model.live="monthFilter" value="November" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-10" class="cursor-pointer"> &nbsp; November </label>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="monthFilter-radio-11" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="monthFilter-radio-11" type="radio" wire:model.live="monthFilter" value="December" name="monthFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="monthFilter-radio-11" class="cursor-pointer"> &nbsp; December </label>
                                        </label>
                                    </li>
                                </ul>
                            </div>

                            {{-- Year Filter --}}
                            <button id="dropdownRadioButton" data-dropdown-toggle="yearDropDown" class="shadow hover:text-white z-20 inline-flex items-center justify-center h-10 p-2 min-w-[40px] hover:bg-customRed focus:bg-customRed focus:text-white focus:ring-1 focus:ring-customRed font-medium rounded-lg text-sm py-1.5 px-2" type="button">
                                {{$yearFilterName}}
                                <svg class="ml-2 w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="yearDropDown" class="z-50 hidden w-48 mt-2 max-h-60 overflow-y-scroll bg-white divide-y divide-gray-100 rounded-lg shadow" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top">
                                <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                                    <!-- All option -->
                                    <li>
                                        <label for="yearFilter-radio-all" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                            <input id="yearFilter-radio-all" type="radio" wire:model.live="yearFilter" value="all" name="yearFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                            <label for="yearFilter-radio-all" class="cursor-pointer"> &nbsp; All </label>
                                        </label>
                                    </li>
                                    <!-- Dynamic years -->
                                    <?php
                                    $currentYear = 2024; // Set to the current year or desired starting year
                                    for ($year = $currentYear; $year >= 1999; $year--) {
                                        echo '<li>
                                                <label for="yearFilter-radio-' . $year . '" class="flex items-center p-2 cursor-pointer text-gray-900 rounded hover:bg-customRed hover:text-white">
                                                    <input id="yearFilter-radio-' . $year . '" type="radio" wire:model.live="yearFilter" value="' . $year . '" name="yearFilter-radio" class="w-4 h-4 cursor-pointer bg-gray-100 border-gray-300 text-customRed ring-2 ring-white focus:ring-customRed focus:ring-2">
                                                    <label for="yearFilter-radio-' . $year . '" class="cursor-pointer"> &nbsp; ' . $year . ' </label>
                                                </label>
                                            </li>';
                                    }
                                    ?>
                                </ul>
                            </div>


                            
                        </div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative max-[567px]:pl-1  ">
                            <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none rtl:inset-r-0 rtl:right-0 ps-3">
                                <svg class="w-5 h-5 text-gray-900" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="table-search" wire:model.live.debounce.850ms="search" class="block p-2 text-sm rounded-lg shadow-inner ps-10 bg-gray-50 focus:ring-customRed focus:border-customRed border-text max-[567px]:w-264  w-64" placeholder="Search like: January">
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full pb-4 text-sm text-left text-gray-500 rtl:text-right ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
                        <tr>

                            <th scope="col" class="px-6 py-3 text-center">
                                No.
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Phase
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                            Month -Year
                            </th>
                            <th scope="col" class="px-6 py-3 text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <div>
                        <div>
                            <tbody class="pb-4">

                            @if ($resultsCount == 0)
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="col" colspan="9" class="justify-center" style="padding-bottom: 40px"> 
                                            <div class="flex max-[600px]:justify-start pl-14 md:pl-0 justify-center items-center" style="padding-top: 40px">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="black" class="w-6 h-6 mr-2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                                </svg>
                                                <p class="text-xl font-semibold text-customRed">Nothing to show</p>
                                            </div>
                                        </th>
                                    </tr>
                            @else
                                @php
                                    $ctr = 0;
                                    $pageIndex = ($PayrollData->currentpage() - 1) * $PayrollData->perpage() + $ctr;
                                @endphp
                                @foreach ($PayrollData as $index => $data)
                                @php
                                    $ctr = $ctr + 1;
                                @endphp
                                {{--  --}}
                                    <tr class="bg-white border-b hover:bg-gray-50 ">
                                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap ">
                                            {{$pageIndex + $ctr}}
                                        </th>
                                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 capitalize whitespace-nowrap ">
                                                {{$data->phase}}
                                        </th>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            {{$data->month}}  {{$data->year}}
                                        </td>
                                        <td class="items-center py-4 text-center">
                                            <div class="flex items-center justify-center space-x-2" x-data="{ isOpen: false }">
                                                <!-- View Button -->
                                                <a href="#" 
                                                x-data="{ openPayslip(payrollId) {
                                                    @this.call('redirectToPayroll', payrollId).then(result => {
                                                        if (result) {
                                                            window.open(result, '_blank'); // Open the returned URL in a new tab
                                                        }
                                                    });
                                                } }"
                                                @click.prevent="openPayslip('{{ $data->payroll_id }}')" 
                                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-customGreen cursor-pointer hover:text-yellow-600">
                                                View Payslip
                                            </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>

                        </div>
                    </div>
                </table>
            </div>
            <div class="w-full p-4 bg-gray-100 rounded-b-lg">
                {{ $PayrollData->links() }}
            </div>

        <!-- Loading screen -->
        <div wire:loading wire:target="phaseFilter, monthFilter, yearFilter, search" class="fixed inset-x-0 top-1/4 flex justify-center pointer-events-none z-50">
            <div class="z-50 mt-4">
                <div id="toast-container" class="flex items-center justify-center w-full h-full">
                    <div id="toast-message" class="fixed flex items-center justify-center w-full max-w-xs p-4 border-6 border-white text-customRed bg-white bg-opacity-90 rounded-lg shadow"
                        style="top: 90px; left: 50%; transform: translateX(-50%); z-index: 60;"
                        role="alert">
                        <div role="status">
                            <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-customRed" viewBox="0 0 100 101" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="text-sm font-normal ms-3 text-center">Updating Table</div>
                    </div>
                </div>
            </div>
        </div>

        <div x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
                @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact an Accounting Personnel.'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)">
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

</div>
