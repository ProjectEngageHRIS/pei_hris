<div>
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
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{route('ActivitiesGallery')}}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Activity</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Create</span>
            </div>
        </li>
        </ol>
    </nav> 
    <h2 class="mb-4 text-3xl  font-bold leading-none tracking-tight text-gray-900 md:text-3xl dark:text-white">Create an Activity</h2>
   
    <section class="bg-white  dark:bg-gray-900 pb-24 px-8  rounded-lg">
        <form wire:submit.prevent="submit" method="POST">
            @csrf
        <div class=" px-1 mx-auto pt-4">
            <div class="grid grid-cols-1 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                {{-- <div>
                <h2><b>Activity Details</b></h2>
                </div> --}}
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type<span class="text-red-600">*</span></label>
                        <select   id="type" name="type" wire:model.live="type"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="null">Select An Option</option>
                            <option value="Announcement">Announcement</option>
                            <option value="Event">Event</option>
                            <option value="Seminar">Seminar</option>
                            <option value="Training">Training</option>
                            <option value="Others">Others</option>
                        </select>
                        @error('type')
                            <div class="transition transform alert alert-danger"
                                    x-init="$el.closest('form').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                            </div> 
                        @enderror
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm whitespace-nowrap font-medium text-gray-900 dark:text-white">Subject<span class="text-red-600">*</span></label>
                        <input type="text"  id="subject" name="subject" wire:model.blur="subject" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                        @error('subject')
                            <div class="transition transform alert alert-danger"
                                    x-init="$el.closest('form').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                            </div> 
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Poster and Details --}}
            <div class="grid grid-cols-2 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                <div class="grid grid-cols-1">
                    <label for="poster"
                    class="block text-sm mb-2 font-medium text-gray-900 dark:text-white">Poster <span class="text-red-600">*</span></label>
                    @if($poster)
                    <div class="grid grid-cols-1 items-center justify-center w-full">
                        <label for="poster" style="height: 121px;"  class="flex flex-col items-center justify-center w-full  border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <img src="{{ $poster->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                            <input id="poster" type="file" class="hidden" wire:model="poster">
                        </label>
                    </div>
                    @else
                    <div class="grid grid-cols-1 items-center justify-center w-full ">
                        <label for="poster" style="height: 121px;" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-4 h-4 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-xs text-center text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                <p class="text-xs text-center text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                            </div>
                            <input id="poster" type="file" class="hidden" wire:model="poster" />
                        </label>
                    </div> 
                    @endif
                    @error('poster')
                            <div class="transition transform alert alert-danger"
                                    x-init="$el.closest('form').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                            </div> 
                    @enderror
                </div>
                <div>
                    <label for="degree_prog_and_school"
                    class="block pb-2 text-sm font-medium  text-gray-900 dark:text-white">Description/Details<span class="text-red-600">*</span></label>
                    <textarea type="text" rows="5" id="description" name="description" wire:model="description"
                    placeholder="If chosen others, write the type of leave. Otherwise, Ignore"   
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </textarea>
                </div>
            </div>
            
            {{-- Schedule --}}
            @if(in_array($type, ["Event", "Seminar", "Training"]))
                <div class="grid grid-cols-2 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid min-[1000px]:grid-cols-3 gap-4  col-span-3  ">
                        <div class="w-full">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Event<span class="text-red-600">*</span></label>
                            <input type="date" wire:model="date" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required >
                            @error('date')
                                <div class="transition transform alert alert-danger"
                                        x-init="$el.closest('label').scrollIntoView()">
                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                </div> 
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="start"
                                class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Time <span class="text-red-600">*</span></label>
                            <input type="time" name="start" id="start" wire:model.blur="start" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="" >
                            @error('start')
                                <div class="transition transform alert alert-danger"
                                        x-init="$el.closest('form').scrollIntoView()">
                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                </div> 
                            @enderror   
                        </div>
                        <div class="w-full">
                            <label for="end"
                                class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End Time <span class="text-red-600">*</span></label>
                            <input type="time" name="end" id="end" wire:model.blur="end"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                            @error('end')   
                                <div class="transition transform alert alert-danger text-sm "
                                x-init="$el.closest('label').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                </div> 
                            @enderror
                        </div>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-2 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid min-[1000px]:grid-cols-3 gap-4  col-span-3  ">
                        <div class="w-full">
                            <label for="date"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Event</label>
                            <input type="date" wire:model="date" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required >
                            @error('date')
                                <div class="transition transform alert alert-danger"
                                        x-init="$el.closest('label').scrollIntoView()">
                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                </div> 
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="start"
                                class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white ">Start Time </label>
                            <input type="time" name="start" id="start" wire:model.blur="start" 
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                required="" >
                            @error('start')
                                <div class="transition transform alert alert-danger"
                                        x-init="$el.closest('form').scrollIntoView()">
                                    <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                </div> 
                            @enderror   
                        </div>
                        <div class="w-full">
                            <label for="end"
                                class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">End Time</label>
                            <input type="time" name="end" id="end" wire:model.blur="end"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            required="">
                            @error('end')   
                                <div class="transition transform alert alert-danger text-sm "
                                x-init="$el.closest('label').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{ $message }}</span>
                                </div> 
                            @enderror
                        </div>
                    </div>
                </div>
                    
            @endif

            {{-- publisher and visible to list --}}
            <div class="grid grid-cols-2 gap-4  p-6 mt-5 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
                <div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Publisher<span class="text-red-600">*</span></label>
                        <select id="publisher" name="publisher" wire:model.blur="publisher"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select a publisher</option>
                            <option value="You" >You</option>
                            <option value="Department">Your Department</option>
                        </select>
                        @error('publisher')
                            <div class="transition transform alert alert-danger"
                                    x-init="$el.closest('form').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                            </div> 
                        @enderror
                    </div>
                    <div class="items-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="checkbox" wire:model="is_featured" class="sr-only peer">
                            <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Featured?</span>
                        </label>
                        @error('is_featured')
                            <div class="transition transform alert alert-danger"
                                    x-init="$el.closest('form').scrollIntoView()">
                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                            </div> 
                        @enderror
                    </div>
                </div>
                <div>
                    <div wire:ignore class="col-span-4">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visible To List<span class="text-red-600">*</span></label>
                        <select multiple style="width:100%; background:gray;" class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <optgroup label="Employee Names" ></optgroup>
                            {{-- <option>Select</option> --}}
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
            </div>
        </div>
        
        <button type="submit"  class="inline-flex items-center float-right px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bgindigo rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
            Create Activity
        </button>
        </form>

        <!-- Loading screen -->
        <div wire:loading wire:target="submit, poster" class="load-over">
            <div wire:loading wire:target="submit, poster" class="loading-overlay">
                <div class="flex flex-col justify-center items-center">
                    <div class="spinner"></div>
                    <p>Uploading...</p>
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

    </section>
    
    </div>
</div>


<script>
    $(document).ready(function() {
        
        $('.js-example-basic-multiple').select2({
            placeholder: 'Select an option',
            closeOnSelect: false,
        }).on('select2:open', function() {
            // Apply Tailwind CSS classes to the Select2 dropdown
            $('.select2-dropdown').addClass(' bg-gray-50 border border-gray-300 text-gray-900  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500');
            $('.select2-results__options').addClass('p-2 ');
        }).on('change', function() {
            let data = $(this).val();
            console.log(data);
            @this.visible_to_list = data;
        });
        $('.select2-container--default .select2-selection--multiple').addClass('bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2');


        // Toggle modal visibility when form submission is completed
        Livewire.on('formSubmitted', () => {
            $('#crud-modal').modal('hide'); // Assuming you're using Bootstrap modal
        });
    });
</script>