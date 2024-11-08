<div >
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('HumanResourceDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed dark:text-gray-400 dark:hover:text-white">
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
            <a href="{{route('ActivitiesGallery')}}" class="ms-1 text-sm font-semibold text-gray-900 hover:text-customRed md:ms-2 dark:text-gray-400 dark:hover:text-white">Activities</a>
            </div>
        </li>
        </ol>
    </nav> 

   

    {{-- @if ($is_head == 1) --}}
    <div class="flex justify-end n" x-data="{openAddForm: false}" x-ref="addForm" @close-modal-add.window="openAddForm = false;">
        <button type="button" @click="openAddForm = true" class="text-white mb-8 transition-transform duration-300 hover:scale-105 bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Activity</button>
        <div x-cloak x-show="openAddForm"  class="fixed inset-0 z-50 flex items-center justify-center " >
            <div class="fixed inset-0 bg-black opacity-50"></div>
            <div tabindex="-1" aria-hidden="true" class="relative w-full h-auto max-w-4xl max-h-full p-4 overflow-y-scroll bg-white   rounded-lg shadow-lg">
                <div class="relative w-full max-w-4xl max-h-2xl p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow ">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                            <h3 class="text-xl font-semibold text-gray-900 ">
                                Add Activity
                            </h3>
                            <button @click="openAddForm = false" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-hide="add-targeted-payroll">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 xl:p-5">
                            <form class="space-y-4" wire:submit.prevent="addAnnouncement" method="POST">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Type<span class="text-red-600">*</span>
                                        </label>
                                        <select id="type_" name="type" wire:model.live="type" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                            <option value="null" >Select An Option</option>
                                            <option value="Announcement" >Announcement</option>
                                            <option value="Event" >Event</option>
                                            <option value="Seminar" >Seminar</option>
                                            <option value="Training">Training</option>
                                            <option value="Others">Others</option>
                                        </select>
                                        
                                        @error('type')
                                        <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                        </div>
                                        @enderror
                                    </div>
                                    
                                    <div id="subject_container" class="grid grid-cols-1 rounded-lg">
                                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Subject <span class="text-red-600">*</span>
                                        </label>
                                        <div class="grid grid-cols-1">
                                            <input type="text" id="subject" wire:model="subject" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed"></input>
                                            @error('subject')
                                            <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('subject_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subject_container').focus();">
                                                <span class="text-xs text-red-500">{{ $message }}</span>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    @php
                                        
                                    @endphp

                                    <div class="grid grid-cols-1  rounded-lg  ">
                                        <label for="poster" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Poster<span class="text-red-600">*</span>
                                        </label>
                                        <div class="grid grid-cols-1 items-center justify-center w-full">
                                            <label for="poster" style="height: 121px;"  class="relative p-1 flex flex-col items-center  border-2 border-gray-400 border-dashed justify-center w-full h-32 rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            @if($poster)
                                                    <img src="{{ $poster->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                    <input id="poster" type="file" class="hidden" wire:model.live="poster">
                                                    <button type="button" wire:click="removeImage" class="absolute top-0 right-0 m-2 text-red-600 py-1  rounded">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>
                                                    </button>
                                            @else
                                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                    <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                    </svg>
                                                    <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                    <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                </div>
                                                <input id="poster" type="file" class="hidden" wire:model.blur="poster" />
                                            @endif
                                            </label>
                                            @error('poster')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('label').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="description_container" class="grid grid-cols-1 rounded-lg shadow">
                                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Description <span class="text-red-600">*</span>
                                        </label>
                                        <div class="grid grid-cols-1">
                                            <textarea id="description" rows="5" wire:model="description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed"></textarea>
                                            @error('description')
                                                <div class="text-sm transition transform alert alert-danger"
                                                    x-data x-init="document.getElementById('description_container').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('description_container').focus();">
                                                    <span class="text-xs text-red-500">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-3 gap-4 col-span-2">
                                        <div class="w-full">
                                            <label for="date_" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Date of Event<span class="text-red-600">*</span>
                                            </label>
                                            <input id="date" type="date" wire:model="date"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                            @error('date')
                                                <div class="transition transform alert alert-danger" x-init="$el.closest('label').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <label for="start" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Start Time <span class="text-red-600">*</span>
                                            </label>
                                            <input id="start" type="time" wire:model="start"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                            @error('start')
                                                <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="w-full">
                                            <label for="end" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                End Time <span class="text-red-600">*</span>
                                            </label>
                                            <input id="end" type="time" wire:model="end"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                required>
                                            @error('end')
                                                <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mb-4">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Publisher<span class="text-red-600">*</span>
                                            </label>
                                            <select id="publisher" name="publisher" wire:model="publisher"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed">
                                                <option value="">Select a publisher</option>
                                                <option value="You">You</option>
                                                <option value="PEI">PEI</option>
                                                <option value="SL SEARCH">SL SEARCH</option>
                                                <option value="SL TEMPS">SL TEMPS</option>         
                                                <option value="WESEARCH">WESEARCH</option>      
                                                <option value="PEI-UPSKILLS">PEI-UPSKILLS</option>  
                                            </select>
                                            @error('publisher')
                                                <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                        <div class="items-center">
                                            <label  class="flex items-center cursor-pointer">
                                                <input id="featured" type="checkbox" wire:model="featured"  class="sr-only peer" >
                                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-customRed dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-customRed"></div>
                                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Featured?</span>
                                            </label>
                                            @error('is_featured')
                                                <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div wire:ignore class="col-span-4">
                                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visible To List<span class="text-red-600">*</span></label>
                                            <select multiple style="width:100%; background:gray;" class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed">
                                                <optgroup label="Choices" ></optgroup>
                                                <option value="PEI">PEI</option>
                                                <option value="SL SEARCH">SL SEARCH</option>
                                                <option value="SL TEMPS">SL TEMPS</option>         
                                                <option value="WESEARCH">WESEARCH</option>      
                                                <option value="PEI-UPSKILLS">PEI-UPSKILLS</option>   
                                            </select>
                                            @error('visible_to_list')
                                                <div class="transition transform alert alert-danger"
                                                        x-init="$el.closest('form').scrollIntoView()">
                                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                </div> 
                                            @enderror
                                        </div>
                                    </div>


                                    <script>
                                        $(document).ready(function() {
                                            $('.js-example-basic-multiple').select2({
                                                placeholder: 'Select an option',
                                                closeOnSelect: false,
                                            }).on('select2:open', function() {
                                                // Apply Tailwind CSS classes to the Select2 dropdown
                                                $('.select2-dropdown').addClass(' bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed');
                                                $('.select2-results__options').addClass('p-2 ');
                                            }).on('change', function() {
                                                let data = $(this).val();
                                                console.log(data);
                                                @this.visible_to_list = data;
                                            });
                                            $('.select2-container--default .select2-selection--multiple').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed p-2');
                                    
                                            // Toggle modal visibility when form submission is completed
                                            Livewire.on('formSubmitted', () => {
                                                $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
                                            });
                                        });
                                    </script>
                                    
                                    
                                    
                                    {{-- <script>
                                        document.addEventListener('DOMContentLoaded', () => {
                                            document.querySelectorAll('[id^=subject_]').forEach(input => {
                                                input.addEventListener('change', function() {
                                                    let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    if (input.value) {
                                                        let value = input.value.trim(); // Get the input value and trim whitespace
                                                        let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                        component.set('subject', wrappedValue); // Pass wrapped value to Livewire component
                                                    }
                                                });
                                            });
                                    
                                            document.querySelectorAll('[id^=type_]').forEach(select => {
                                                select.addEventListener('change', function() {
                                                    let component = Livewire.find(select.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    let value = select.value; // Get the selected value
                                                    component.set('type', value); // Pass the selected value to Livewire component
                                                });
                                            });

                                            document.querySelectorAll('[id^=description_]').forEach(textarea => {
                                                textarea.addEventListener('change', function() {
                                                    let component = Livewire.find(textarea.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    if(textarea.value){
                                                        let value = textarea.value.trim(); // Get the textarea value and trim whitespace
                                                        let wrappedValue = `${textarea.value}`; // Wrap the value in backticks

                                                        component.set('description', wrappedValue); // Pass wrapped value to Livewire component
                                                    }
                                                });
                                            });

                                            document.querySelectorAll('[id^=date_]').forEach(input => {
                                                input.addEventListener('change', function() {
                                                    let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    if (input.value) {
                                                        let value = input.value.trim(); // Get the input value and trim whitespace
                                                        let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                        component.set('date', wrappedValue); // Pass wrapped value to Livewire component
                                                    }
                                                });
                                            });

                                            // Handle time input changes
                                            document.querySelectorAll('[id^=start_]').forEach(input => {
                                                input.addEventListener('change', function() {
                                                    let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    if (input.value) {
                                                        let value = input.value.trim(); // Get the input value and trim whitespace
                                                        let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                        component.set('start', wrappedValue); // Pass wrapped value to Livewire component
                                                    }
                                                });
                                            });

                                            // Handle time input changes
                                            document.querySelectorAll('[id^=end_]').forEach(input => {
                                                input.addEventListener('change', function() {
                                                    let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    if (input.value) {
                                                        let value = input.value.trim(); // Get the input value and trim whitespace
                                                        let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                        component.set('end', wrappedValue); // Pass wrapped value to Livewire component
                                                    }
                                                });
                                            });

                                             // Handle select dropdown changes
                                            document.querySelectorAll('[id^=publisher_]').forEach(select => {
                                                select.addEventListener('change', function() {
                                                    let component = Livewire.find(select.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    let value = select.value; // Get the selected value
                                                    component.set('publisher', value); // Pass the selected value to Livewire component
                                                });
                                            });

                                            // Handle checkbox changes
                                            document.querySelectorAll('[id^=featured_]').forEach(checkbox => {
                                                checkbox.addEventListener('change', function() {
                                                    let component = Livewire.find(checkbox.closest('[wire\\:id]').getAttribute('wire:id'));
                                                    let value = checkbox.checked; // Get the checked state (true/false)
                                                    component.set('is_featured', value); // Pass the checked state to Livewire component
                                                });
                                            });



                                        });
                                    </script> --}}
                                    
                                </div>
                                {{-- <hr class="border-gray-700"> --}}
                                <button type="submit" class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Activity</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    {{-- @else
        <div class="flex justify-end " style="margin-bottom: 40px">
        </div>
    @endif --}}
   
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 rounded-t-lg">
        <div class="px-1 mx-auto pt-8" >
            <h2 class="mb-4 text-3xl text-center font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Activities</h2>
            <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
                <button type="button" wire:click="fillerSetter('All')" class="hover:text-white border transition-transform duration-300 hover:scale-105 border-customRed hover:bg-customRed text-customRed rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-customRed dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800 {{ $filter === 'All' ? 'bg-customRed text-white' : 'bg-white' }}">All categories</button>
                <button type="button" wire:click="fillerSetter('Announcement')" class="text-gray-900 transition-transform duration-300 hover:scale-105 border border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Announcement' ? 'bg-customRed text-white' : 'bg-white' }}">Announcement</button>
                <button type="button" wire:click="fillerSetter('Event')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Event' ? 'bg-customRed text-white' : 'bg-white' }}">Event</button>
                <button type="button" wire:click="fillerSetter('Seminar')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Seminar' ? 'bg-customRed text-white' : 'bg-white' }}">Seminar</button>
                <button type="button" wire:click="fillerSetter('Training')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Training' ? 'bg-customRed text-white' : 'bg-white' }}">Training</button>
                <button type="button" wire:click="fillerSetter('Others')" class="text-gray-900 border transition-transform duration-300 hover:scale-105 border-white hover:bg-customRed hover:text-white dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800 {{ $filter === 'Others' ? 'bg-customRed text-white' : 'bg-white' }}">Others</button>
            </div>
            <div x-cloak wire:ignore.self x-data="{openEditForm: false,  currentEditModal: null, openAddWarningButton: false, viewForm: false, isDisabled: false}" x-ref="edit-modal" @close-modal-edit.window="openEditForm = false; currentEditModal = null;" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 place-items-center">
                @foreach ($ActivitiesData as $data)
                    <div class="w-full h-full object-contain bg-gray-50 border-2 border-gray-300 border-solid p-4 rounded-lg transition-transform duration-300 hover:shadow-lg">
                        <div class="flex justify-end items-center mt-2 pb-2 space-x-2">
                            <button title="Click to Edit" @click="openEditForm = true; isDisabled = false;  currentEditModal = '{{ $loop->index }}'"  id="edit-form" type="button" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-transform duration-300 hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                            <button type="button" title="Click to Delete" @click.prevent="openCancelModal('{{$data->activity_id}}')" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-transform duration-300 hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                        <div href="{{ route('ActivitiesView', ['index' => $data->activity_id]) }}" title="Click to View" @click="isDisabled = true; openEditForm = true; currentEditModal = '{{ $loop->index }}'" class="group cursor-pointer">
                            <img class="w-full h-60 object-contain rounded-xl border-2 transition-transform duration-300 group-hover:scale-105 group-hover:border-customRed shadow-lg" src="{{ asset('storage/'. $data->poster) }}" alt="{{ $data->subject }}">
                        </div>
                        <h3 class="mt-2 text-xl font-semibold text-center transition-transform duration-300 hover:scale-105 text-customRed dark:text-white">{{ $data->subject }}</h3>
                        {{-- <hr class="w-48 h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700"> --}}
                        <p class="text-center text-gray-700 transition-transform duration-300 hover:scale-105 dark:text-gray-300">{{ Str::limit($data->description, 100) }}</p>
                        <p class="text-center text-gray-700 transition-transform duration-300 hover:scale-105 dark:text-gray-300">{{ $data->date }}</p>
                        <p class="text-center text-gray-700 transition-transform duration-300 hover:scale-105 dark:text-gray-300">{{ $data->start }} - {{ $data->end }}</p>
                    </div>
                    {{-- <div x-text="isDisabled"></div> --}}
                    <div x-show="openEditForm && currentEditModal === '{{ $loop->index }}'"  class="fixed inset-0 z-50 flex items-center justify-center">
                        <div class="fixed inset-0 bg-black opacity-50"></div>
                        <div tabindex="-1" aria-hidden="true" class="relative w-full h-auto max-w-4xl max-h-full p-4 bg-white rounded-lg shadow-lg">
                            <div class="relative w-full max-w-4xl max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow ">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                                        <h3 class="text-xl font-semibold text-gray-900 flex items-center space-x-2">
                                            <!-- SVG Icon -->
                                            <svg x-show="isDisabled" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-customRed">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                            <svg x-show="isDisabled == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-customRed">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                              
                                            <!-- Text -->
                                            <span x-text="isDisabled ? 'View' : 'Edit'"></span>&nbsp;Activity
                                        </h3>
                                        
                                        <button @click="openEditForm = false" type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center  " data-modal-hide="add-targeted-payroll">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-4 xl:p-5">
                                        <form class="space-y-4" wire:submit.prevent="editAnnouncement('{{$data->activity_id}}')" method="POST">
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Type<span class="text-red-600">*</span>
                                                    </label>
                                                    <select id="type_{{$loop->index}}" :disabled="isDisabled" name="type" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
                                                        <option value="null" @if($data->type == 'null') selected @endif>Select An Option</option>
                                                        <option value="Announcement" @if($data->type == 'Announcement') selected @endif>Announcement</option>
                                                        <option value="Event" @if($data->type == 'Event') selected @endif>Event</option>
                                                        <option value="Seminar" @if($data->type == 'Seminar') selected @endif>Seminar</option>
                                                        <option value="Training" @if($data->type == 'Training') selected @endif>Training</option>
                                                        <option value="Others" @if($data->type == 'Others') selected @endif>Others</option>
                                                    </select>
                                                    
                                                    @error('type')
                                                    <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                        <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                    </div>
                                                    @enderror
                                                </div>
                                                
                                                <div id="subject_container{{$loop->index}}" class="grid grid-cols-1 rounded-lg">
                                                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Subject <span class="text-red-600">*</span>
                                                    </label>
                                                    <div class="grid grid-cols-1">
                                                        <input id="subject_{{$loop->index}}" :disabled="isDisabled" :class="{ 'text-gray-500': isDisabled }" value="{{ $data->subject }}" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed"></input>
                                                        @error('subject')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('subject_container{{$loop->index}}').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subject_container{{$loop->index}}').focus();">
                                                            <span class="text-xs text-red-500">{{ $message }}</span>
                                                        </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-1 items-center justify-center w-full">
                                                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Activity Photo <span class="text-red-600">*</span>
                                                    </label>
                                                    <label :for="isDisabled ? '' : 'poster'" style="height: 121px;" class="relative p-1 flex flex-col items-center border-2 border-gray-400 border-dashed justify-center w-full h-32 rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                                        @if($data->poster && !$removedImage)
                                                            @if($poster)
                                                                <img src="{{ $poster->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                            @elseif(is_string($data->poster))
                                                                <img src="{{ asset('storage/'. $data->poster) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                            @endif
                                                            <input id="poster" type="file" class="hidden" wire:model.live="poster" x-bind:disabled="isDisabled" />
                                                            <button x-show="isDisabled == false" type="button" wire:click="removeImage" class="absolute top-0 right-0 m-2 text-red-600 py-1 rounded">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                                </svg>
                                                            </button>
                                                        @else
                                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                                                </svg>
                                                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG, or PDF file (Max: 5 MB size)</p>
                                                            </div>
                                                            <input id="poster" type="file" class="hidden" wire:model.blur="poster" x-bind:disabled="isDisabled" />
                                                        @endif
                                                    </label>
                                                    @error('poster')
                                                        <div class="transition transform alert alert-danger" x-init="$el.closest('label').scrollIntoView()">
                                                            <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                        </div> 
                                                    @enderror
                                                </div>
                                                <div id="description_container{{$loop->index}}" class="grid grid-cols-1 rounded-lg shadow">
                                                    <label for="description" 
                                                        class="block mb-2 text-sm font-medium"
                                                        :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}">
                                                        Description <span class="text-red-600">*</span>
                                                    </label>
                                                    <div class="grid grid-cols-1">
                                                        <textarea id="description_{{$loop->index}}" :disabled="isDisabled" :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}" rows="5" class="block p-2.5 w-full text-sm bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed">{{ trim($data->description) }}</textarea>
                                                        @error('description')
                                                            <div class="text-sm transition transform alert alert-danger"
                                                                x-data 
                                                                x-init="document.getElementById('description_container{{$loop->index}}').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('description_container{{$loop->index}}').focus();">
                                                                <span class="text-xs text-red-500">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="grid grid-cols-3 gap-4 col-span-2">
                                                    <div class="w-full">
                                                        <label for="date_{{$loop->index}}" 
                                                            class="block mb-2 text-sm font-medium"
                                                            :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}">
                                                            Date of Event<span class="text-red-600">*</span>
                                                        </label>
                                                        <input id="date_{{$loop->index}}" 
                                                            type="date" 
                                                            value="{{$data->date}}" 
                                                            :disabled="isDisabled"
                                                            :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required>
                                                        @error('date')
                                                            <div class="transition transform alert alert-danger" 
                                                                x-init="$el.closest('label').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="start_{{$loop->index}}" 
                                                            class="block mb-2 text-sm font-medium"
                                                            :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}">
                                                            Start Time <span class="text-red-600">*</span>
                                                        </label>
                                                        <input id="start_{{$loop->index}}" 
                                                            type="time" 
                                                            value="{{$data->start}}" 
                                                            :disabled="isDisabled"
                                                            :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required>
                                                        @error('start')
                                                            <div class="transition transform alert alert-danger" 
                                                                x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="end_{{$loop->index}}" 
                                                            class="block mb-2 text-sm font-medium"
                                                            :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}">
                                                            End Time <span class="text-red-600">*</span>
                                                        </label>
                                                        <input id="end_{{$loop->index}}" 
                                                            type="time" 
                                                            value="{{$data->end}}"  
                                                            :disabled="isDisabled"
                                                            :class="{'text-gray-500': isDisabled, 'text-gray-900': !isDisabled}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required>
                                                        @error('end')
                                                            <div class="transition transform alert alert-danger" 
                                                                x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <div class="mb-4">
                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Publisher<span class="text-red-600">*</span>
                                                        </label>
                                                        <select id="publisher_{{$loop->index}}" name="publisher"  :disabled="isDisabled" :class="{ 'text-gray-500': isDisabled }"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed">
                                                            <option value="">Select a publisher</option>
                                                            <option @if(!in_array($data->visible_to_list, ["PEI", "SL SEARCH", "SL TEMPS", "WESEARCH", "PEI-UPSKILLS"] )) selected @endif value="You">You</option>
                                                            <option @if("PEI" == $data->publisher) selected @endif value="PEI">PEI</option>
                                                            <option @if("SL SEARCH" == $data->publisher) selected @endif  value="SL SEARCH">SL SEARCH</option>
                                                            <option @if("SL TEMPS" == $data->publisher) selected @endif value="SL TEMPS">SL TEMPS</option>         
                                                            <option @if("WESEARCH" == $data->publisher) selected @endif value="WESEARCH">WESEARCH</option>      
                                                            <option @if("PEI-UPSKILLS" == $data->publisher) selected @endif value="PEI-UPSKILLS">PEI-UPSKILLS</option>   
                                                        </select>
                                                        @error('publisher')
                                                            <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                                                    <div class="items-center">
                                                        <label for="featured_{{$loop->index}}" class="flex items-center cursor-pointer">
                                                            <input id="featured_{{$loop->index}}" :disabled="isDisabled"  type="checkbox" value="" class="sr-only peer" {{ $data->is_featured ? 'checked' : '' }}> 
                                                            <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-red-300 dark:peer-focus:ring-customRed dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-customRed"></div>
                                                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Featured?</span>
                                                        </label>
                                                        @error('is_featured')
                                                            <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div>
                                                    <div wire:ignore class="col-span-4">
                                                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visible To List<span class="text-red-600">*</span></label>
                                                        <select :disabled="isDisabled" :class="{ 'text-gray-500': isDisabled }" multiple style="width:100%; background:gray;" class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed">
                                                            <optgroup label="Employee Names" ></optgroup>
                                                            <option @if(in_array("PEI", $data->visible_to_list)) selected @endif value="PEI">PEI</option>
                                                            <option @if(in_array("SL SEARCH", $data->visible_to_list)) selected @endif value="SL SEARCH">SL SEARCH</option>
                                                            <option @if(in_array("SL TEMPS", $data->visible_to_list)) selected @endif value="SL TEMPS">SL TEMPS</option>         
                                                            <option @if(in_array("WESEARCH", $data->visible_to_list)) selected @endif value="WESEARCH">WESEARCH</option>      
                                                            <option @if(in_array("PEI-UPSKILLS", $data->visible_to_list)) selected @endif value="PEI-UPSKILLS">PEI-UPSKILLS</option>   
                                                        </select>
                                                        @error('visible_to_list')
                                                            <div class="transition transform alert alert-danger"
                                                                    x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div> 
                                                        @enderror
                                                        <script>
                                                            $(document).ready(function() {
                                                                
                                                                $('.js-example-basic-multiple').select2({
                                                                    placeholder: 'Select an option',
                                                                    closeOnSelect: false,
                                                                }).on('select2:open', function() {
                                                                    // Apply Tailwind CSS classes to the Select2 dropdown
                                                                    $('.select2-dropdown').addClass(' bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-customRed focus:border-customRed block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-customRed dark:focus:border-customRed');
                                                                    $('.select2-results__options').addClass('p-2 ');
                                                                }).on('change', function() {
                                                                    let data = $(this).val();
                                                                    console.log(data);
                                                                    @this.visible_to_list = data;
                                                                });
                                                                $('.select2-container--default .select2-selection--multiple').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-customRed focus:border-customRed p-2');
                                                        
                                                                // Toggle modal visibility when form submission is completed
                                                                Livewire.on('formSubmitted', () => {
                                                                    $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
                                                                });
                                                            });
                                                        </script>
                                                    </div>
                                                </div>



                                                
                                                
                                                
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', () => {
                                                        document.querySelectorAll('[id^=subject_]').forEach(input => {
                                                            input.addEventListener('change', function() {
                                                                let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                if (input.value) {
                                                                    let value = input.value.trim(); // Get the input value and trim whitespace
                                                                    let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                                    component.set('subject', wrappedValue); // Pass wrapped value to Livewire component
                                                                }
                                                            });
                                                        });
                                                
                                                        document.querySelectorAll('[id^=type_]').forEach(select => {
                                                            select.addEventListener('change', function() {
                                                                let component = Livewire.find(select.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                let value = select.value; // Get the selected value
                                                                component.set('type', value); // Pass the selected value to Livewire component
                                                            });
                                                        });

                                                        document.querySelectorAll('[id^=description_]').forEach(textarea => {
                                                            textarea.addEventListener('change', function() {
                                                                let component = Livewire.find(textarea.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                if(textarea.value){
                                                                    let value = textarea.value.trim(); // Get the textarea value and trim whitespace
                                                                    let wrappedValue = `${textarea.value}`; // Wrap the value in backticks

                                                                    component.set('description', wrappedValue); // Pass wrapped value to Livewire component
                                                                }
                                                            });
                                                        });

                                                        document.querySelectorAll('[id^=date_]').forEach(input => {
                                                            input.addEventListener('change', function() {
                                                                let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                if (input.value) {
                                                                    let value = input.value.trim(); // Get the input value and trim whitespace
                                                                    let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                                    component.set('date', wrappedValue); // Pass wrapped value to Livewire component
                                                                }
                                                            });
                                                        });

                                                        // Handle time input changes
                                                        document.querySelectorAll('[id^=start_]').forEach(input => {
                                                            input.addEventListener('change', function() {
                                                                let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                if (input.value) {
                                                                    let value = input.value.trim(); // Get the input value and trim whitespace
                                                                    let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                                    component.set('start', wrappedValue); // Pass wrapped value to Livewire component
                                                                }
                                                            });
                                                        });

                                                        // Handle time input changes
                                                        document.querySelectorAll('[id^=end_]').forEach(input => {
                                                            input.addEventListener('change', function() {
                                                                let component = Livewire.find(input.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                if (input.value) {
                                                                    let value = input.value.trim(); // Get the input value and trim whitespace
                                                                    let wrappedValue = `${input.value}`; // Wrap the value in backticks
                                                                    component.set('end', wrappedValue); // Pass wrapped value to Livewire component
                                                                }
                                                            });
                                                        });

                                                         // Handle select dropdown changes
                                                        document.querySelectorAll('[id^=publisher_]').forEach(select => {
                                                            select.addEventListener('change', function() {
                                                                let component = Livewire.find(select.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                let value = select.value; // Get the selected value
                                                                component.set('publisher', value); // Pass the selected value to Livewire component
                                                            });
                                                        });

                                                        // Handle checkbox changes
                                                        document.querySelectorAll('[id^=featured_]').forEach(checkbox => {
                                                            checkbox.addEventListener('change', function() {
                                                                let component = Livewire.find(checkbox.closest('[wire\\:id]').getAttribute('wire:id'));
                                                                let value = checkbox.checked; // Get the checked state (true/false)
                                                                component.set('is_featured', value); // Pass the checked state to Livewire component
                                                            });
                                                        });



                                                    });
                                                </script>
                                                
                                            </div>
                                            {{-- <hr class="border-gray-700"> --}}
                                            <button type="submit" class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit Activity</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            <div x-cloak x-data="{ cancelModal: false }" x-ref="cancel-modal"
                x-init="
                    $el.addEventListener('modal-open', (event) => {
                        $wire.set('currentFormId', event.detail);
                        cancelModal = true;
                    });
                    $el.addEventListener('modal-close', () => cancelModal = false);"
                x-show="cancelModal" 
                @keydown.window.escape="cancelModal = false"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                tabindex="-1" 
                class="fixed inset-0 z-50 flex justify-center items-center bg-gray-800 bg-opacity-50"
                id="cancel-modal">
               <div x-show="cancelModal"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="transform opacity-0 scale-90"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-90"
                    class="relative p-4 w-full max-w-md max-h-full bg-white rounded-lg shadow dark:bg-gray-700">
                   <button type="button" @click.prevent="cancelModal = false"
                           class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                       <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                       </svg>
                       <span class="sr-only">Close modal</span>
                   </button>
                   <div class="p-4 md:p-5">
                       <div class="text-center">
                           <svg class="mx-auto mb-4 text-red-600 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                           </svg>
                           <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Deletion?</h3>
                           <button wire:click="deleteActivity" class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                               Yes
                           </button>
                           <button @click.prevent="cancelModal = false" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                               No
                           </button>
                       </div>
                   </div>
               </div>
            </div>
           
           
                <script>
                function openCancelModal(id) {
                    const modal = document.getElementById('cancel-modal');
                    if (modal) {
                        const event = new CustomEvent('modal-open', { 
                            detail: id, 
                        });
                        modal.dispatchEvent(event);
                    }
                }
                </script>
            </div>

          
        </div>

        
        
        </section>
        <div class="p-4  bg-gray-100 w-full rounded-b-lg">
            {{ $ActivitiesData->links(data : ['scrollTo' => False]) }}
        </div>
        
        <div x-cloak x-data="{ showToast: false, toastType: 'success', toastMessage: '' }" 
            @trigger-success-create.window="showToast = true; toastType = 'success'; toastMessage = 'Activity Created Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
            @trigger-success-edit.window="showToast = true; toastType = 'success'; toastMessage = 'Activity Edited Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
            @trigger-success-delete.window="showToast = true; toastType = 'success'; toastMessage = 'Activity Deleted Successfully'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)"
            @trigger-error.window="showToast = true; toastType = 'error'; toastMessage = 'Something went wrong. Please contact IT support.'; $dispatch('modal-close'); cancelModal = false; setTimeout(() => showToast = false, 3000)">
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

        <!-- Loading screen -->
        <div wire:loading wire:target="deleteActivity, editActivity, editAnnouncement, addAnnouncement, poster" class="load-over z-50">
            <!-- Updating overlay -->
            <div wire:loading wire:target="deleteActivity, editActivity, editAnnouncement, addAnnouncement" class="loading-overlay z-40">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p> Updating...</p>
                </div>
            </div>
        
            <!-- Uploading overlay -->
            <div wire:loading wire:target="poster" class="loading-overlay z-50">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p> Uploading...</p>
                </div>
            </div>
        </div>
            
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
                }, 10); 
                setTimeout(() => {
                    toastContainer.classList.add('hidden');
                }, 2000); // Hide after 2 seconds
            }
            if (event.modal === 'editForm') {
                window.dispatchEvent(new CustomEvent('close-modal-edit'));
            } else if (event.modal === 'addForm') {
                window.dispatchEvent(new CustomEvent('close-modal-add'));
            }
        });
        Livewire.on('triggerSuccess', () => {
            window.dispatchEvent(new CustomEvent('trigger-success-create'));
            const modal = document.querySelector(`[x-ref="addForm"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.openAddForm = false; // Open the modal
        });
        Livewire.on('triggerSuccessEdit', () => {
            window.dispatchEvent(new CustomEvent('trigger-success-edit'));
            const modal = document.querySelector(`[x-ref="edit-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.openEditForm = false; // Open the modal
        });
        Livewire.on('triggerSuccessDelete', () => {
            window.dispatchEvent(new CustomEvent('trigger-success-delete'));
            const modal = document.querySelector(`[x-ref="cancel-modal"]`);
            // Access Alpine data
            const alpineData = Alpine.$data(modal);
            // Update the state
            alpineData.cancelModal = false; // Open the modal
        });
        Livewire.on('triggerError', (itemId) => {
            window.dispatchEvent(new CustomEvent('trigger-error'));
            // const modal = document.querySelector(`[x-ref="addForm"]`);
            // // Access Alpine data
            // const alpineData = Alpine.$data(modal);
            // // Update the state
            // alpineData.openAddForm = false; // Open the modal
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