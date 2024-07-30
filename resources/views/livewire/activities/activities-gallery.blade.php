<div >
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Home
            </a>
        </li>
        <li>
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-600 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('ActivitiesGallery')}}" class="ms-1 text-sm font-semibold text-gray-900 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Activities</a>
            </div>
        </li>
        </ol>
    </nav> 

   

    {{-- @if ($is_head == 1) --}}
    <div class="flex justify-end">
        <button type="button" onclick="location.href='{{ route('ActivitiesForm') }}'" class="text-white mb-8 transition-transform duration-300 hover:scale-105 bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Activity</button>
    </div>
    {{-- @else
        <div class="flex justify-end " style="margin-bottom: 40px">
        </div>
    @endif --}}
   
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 rounded-lg">
        <div class="px-1 mx-auto pt-8">
            <h2 class="mb-4 text-3xl text-center font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Activities</h2>
            <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                <button type="button" wire:click="fillerSetter('All')" class="hover:text-white border transition-transform duration-300 hover:scale-105 border-customRed hover:bg-customRed text-customRed rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800 {{ $filter === 'All' ? 'bg-customRed text-white' : 'bg-white' }}">All categories</button>
                <button type="button" wire:click="fillerSetter('Announcement')" class="text-gray-900 transition-transform duration-300 hover:scale-105 border border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Announcement' ? 'bg-customRed text-white' : 'bg-white' }}">Announcement</button>
                <button type="button" wire:click="fillerSetter('Event')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Event' ? 'bg-customRed text-white' : 'bg-white' }}">Event</button>
                <button type="button" wire:click="fillerSetter('Seminar')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Seminar' ? 'bg-customRed text-white' : 'bg-white' }}">Seminar</button>
                <button type="button" wire:click="fillerSetter('Training')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Training' ? 'bg-customRed text-white' : 'bg-white' }}">Training</button>
                <button type="button" wire:click="fillerSetter('Others')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Others' ? 'bg-customRed text-white' : 'bg-white' }}">Others</button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 place-items-center">
                @foreach ($ActivitiesData as $data)
                <div class="w-full h-full object-contain bg-gray-50 border-2 border-gray-300 border-solid p-4 rounded-lg transition-transform duration-300 hover:shadow-lg">
                    <div class="flex justify-end items-center mt-2 pb-2 space-x-2">
                        <button type="button" data-modal-target="add-targeted-payroll" data-modal-toggle="add-targeted-payroll"  class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-transform duration-300 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                            </svg>
                        </button>
                        <button type="button" wire:click="deleteActivity('{{ $data->activity_id }}')" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-transform duration-300 hover:scale-105">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
                    </div>
                    <a href="{{ route('ActivitiesView', ['index' => $data->activity_id]) }}" class="group">
                        <img class="w-full h-60 object-contain rounded-xl border-2 transition-transform duration-300 group-hover:scale-105 group-hover:border-customRed shadow-lg" src="{{ asset('storage/'. $data->poster) }}" alt="{{ $data->subject }}">
                    </a>
                    <h3 class="mt-2 text-xl font-semibold text-center transition-transform duration-300 hover:scale-105 text-customRed dark:text-white">{{ $data->subject }}</h3>
                    {{-- <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700"> --}}
                    <p class="text-center text-gray-700 transition-transform duration-300 hover:scale-105 dark:text-gray-300">{{ Str::limit($data->description, 100) }}</p>
                    <p class="text-center text-gray-700 transition-transform duration-300 hover:scale-105 dark:text-gray-300">{{ $data->date }}</p>
                    <p class="text-center text-gray-700 transition-transform duration-300 hover:scale-105 dark:text-gray-300">{{ $data->start }} - {{ $data->end }}</p>
                </div>
                <div  id="add-targeted-payroll" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full xl:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-lg max-h-full p-4">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow ">
                            <!-- Modal header -->
                            <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                                <h3 class="text-xl font-semibold text-gray-900 ">
                                    Edit Announcement
                                </h3>
                                <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-hide="add-targeted-payroll">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 xl:p-5" x-data="{ openAddWarningButton: false }">
                                <form class="space-y-4" wire:submit.prevent="addTargetPayroll" method="POST">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div x-data="{ selected: @entangle('types.' . $data->id) }">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Type<span class="text-red-600">*</span>
                                            </label>
                                            <select
                                                id="type_{{ $data->id }}"
                                                name="type_{{ $data->id }}"
                                                x-model="selected"
                                                wire:model="types.{{ $data->id }}"
                                                class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed"
                                            >
                                                <option value="null" :selected="selected === 'null'">Select An Option</option>
                                                <option value="Announcement" :selected="selected === 'Announcement'">Announcement</option>
                                                <option value="Event" :selected="selected === 'Event'">Event</option>
                                                <option value="Seminar" :selected="selected === 'Seminar'">Seminar</option>
                                                <option value="Training" :selected="selected === 'Training'">Training</option>
                                                <option value="Others" :selected="selected === 'Others'">Others</option>
                                            </select>
                                            @error('types.' . $data->id)
                                                <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div>
                                            <label for="subject" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Subject<span class="text-red-600">*</span></label>
                                            <input type="text" id="subject" name="subject" wire:model.fill="subject" value="{{$data->subject}}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                            @error('subject')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    <hr class="border-gray-700">
        
                                    <div class="grid grid-cols-1 min-[902px]:grid-cols-3  gap-4">
                                        <div>
                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Phase</label>
                                            <select name="status" id="status" wire:model.change="payroll_phase" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                <option value="" selected>Select Phase</option>
                                                <option value="1st Half">1st Half</option>
                                                <option value="2nd Half">2nd Half</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Month</label>
                                            <select name="status" id="status" wire:model.change="payroll_month" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                <option value="" selected>Select Month</option>
                                                @foreach(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'] as $month)
                                                    <option value="{{ $month }}">{{ $month }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="status" class="block mb-2 text-sm font-medium text-customGray1">Year</label>
                                            <select name="status" id="status" wire:model.change="payroll_year" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                <option value="" selected>Select Year</option>
                                                @foreach(range(2000, date('Y')) as $year)
                                                    <option value="{{ $year }}">{{ $year }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
        
                                    <div id="payroll_picture_container"  class="grid grid-cols-1  rounded-lg shadow  ">
                                        {{-- <h2 ><span class="font-bold text-red-700">Date Earned Description</span> <span class="text-red-600">*</span>  (Max: 200 characters only)</h2> --}}
                                        <label for="payroll_picture"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white ">Payroll Photo Link
                                            <span class="text-red-600">*</span></label>
                                        <div id="payroll_picture" class="grid grid-cols-1">
                                            <textarea type="text" rows="3" id="payroll_picture" name="payroll_picture" wire:model="payroll_picture"
                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            </textarea>
                                            @error('payroll_picture')
                                                <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('payroll_picture_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('payroll_picture_container').focus();" >
                                                        <span class="text-xs text-red-500" > {{$message}}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <button @click="openAddWarningButton = true;" type="button" class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Payroll</button>
                                    {{-- <button id="submit-button" type="submit" class="w-full text-white bg-customRed hover:bg-red-900  font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Update Payroll Status</button> --}}
                                    <div x-show="openAddWarningButton" tabindex="-1" class="fixed top-0 bottom-0 left-0 right-0 z-50 flex items-center justify-center  w-full h-full overflow-x-hidden overflow-y-auto bg-gray-800 bg-opacity-50">
                                        <div class="relative w-full max-w-md max-h-full p-4">
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <button @click="openAddWarningButton = false" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                    <div class="p-4 text-center md:p-5">
                                                        <svg class="w-12 h-12 mx-auto mb-4 text-customRed dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Before proceeding, please ensure the following:</h3>
                                                        <ul class="list-disc text-left pl-5 mb-5 text-sm text-gray-600 dark:text-gray-300">
                                                            <li>Verify the file exists and can be accessed.</li>
                                                            <li>Ensure the employee's email has been added as a viewer.</li>
                                                            <li>Confirm that access is restricted to the employee and authorized personnel only (you).</li>
                                                            <li>Review and modify these rules if necessary.</li>
                                                        </ul>
                                                        <p class="mb-5 text-sm text-gray-600 dark:text-gray-300">By clicking <span class="text-customGreen font-semibold">"Yes"</span>, you confirm that you have verified the above details and understand the <span class="text-customRed font-semibold">implications</span> of proceeding.</p>
                                                        
                                                        <button id="addWarningButton1" @click="openAddPayrollModal = false; openAddWarningButton = false " data-modal-hide="add-targeted-payroll" type="submit" class="text-white bg-customGreen hover:bg-green-700  dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                            Yes
                                                        </button>
                                                        <button @click="openAddWarningButton = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200  hover:text-white hover:bg-customRed focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
        
        
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </section>
    
    <div id="toast-container-checkin" tabindex="-1" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-800 bg-opacity-50">
        <div id="toast-success-checkin" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60 dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div id="toast-message-checkin" class="text-sm font-normal ms-3">Updated</div>
            <button id="close-toast-checkin" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="toast-container-checkin" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>

            <!-- Loading screen -->
            <div wire:loading wire:target="deleteActivity, editActivity" class="load-over">
                <div wire:loading wire:target="deleteActivity, editActivity" class="loading-overlay">
                    <div class="flex flex-col justify-center items-center">
                        <div class="spinner"></div>
                        <p>Updating...</p>
                    </div>
                </div>
            </div>
            
            <style>
                .load-over {
                    position: fixed;
                    background: rgba(255, 255, 255, 0.8);
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }
                .loading-overlay {
                    position: fixed;
                    top: 40%;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    z-index: 9999;
                    font-family: Arial, sans-serif;
                    color: #AC0C2E;
                    pointer-events: none; /* Makes sure the overlay is not interactable */
                }
            
                .spinner {
                    border: 8px solid rgba(172, 12, 46, 0.3);
                    border-top: 8px solid #AC0C2E;
                    border-radius: 50%;
                    width: 60px;
                    height: 60px;
                    animation: spin 1s linear infinite;
                    margin-bottom: 20px; /* Adjust margin to add space between spinner and text */
                }
            
                @keyframes spin {
                    0% {
                        transform: rotate(0deg);
                    }
                    100% {
                        transform: rotate(360deg);
                    }
                }
            
                .loading-overlay p {
                    margin: 0;
                    font-size: 18px;
                    font-weight: bold;
                }
            </style>
    
    
    </div>
</div>

<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('triggerSuccess', (event) => {
            const toastContainer = document.getElementById('toast-container-checkin');
            let toastMessage = document.getElementById('toast-message-checkin');
            // const modal = document.getElementById('toast-success-checkin');
            if (toastContainer && toastMessage) {
                setTimeout(() => {
                    toastContainer.classList.remove('hidden');
                }, 10); // Hide after 5 seconds
                setTimeout(() => {
                    toastContainer.classList.add('hidden');
                }, 3000); // Hide after 5 seconds
            }
        });
    });

    const closeToastButtonCheckIn = document.getElementById('close-toast-checkin');
        closeToastButtonCheckIn.addEventListener('click', () => {
            const closeToastButtonCheckIn = document.getElementById('toast-container-checkin');
            if (closeToastButtonCheckIn) {
                closeToastButtonCheckIn.classList.add('hidden');
            }
    });

</script>