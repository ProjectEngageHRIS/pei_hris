<div >
    <nav class="flex mb-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{route('EmployeeDashboard')}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-customRed dark:text-gray-400 dark:hover:text-white">
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
    <div class="flex justify-end">
        <button type="button" onclick="location.href='{{ route('ActivitiesForm') }}'" class="text-white mb-8 transition-transform duration-300 hover:scale-105 bg-customRed font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create Activity</button>
    </div>
    {{-- @else
        <div class="flex justify-end " style="margin-bottom: 40px">
        </div>
    @endif --}}
   
    <section class="bg-white dark:bg-gray-900 pb-24 px-8 rounded-t-lg">
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
            <div x-data="{openEditForm: false, currentEditModal: null, openAddWarningButton: false}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 place-items-center">
                @foreach ($ActivitiesData as $data)
                    <div class="w-full h-full object-contain bg-gray-50 border-2 border-gray-300 border-solid p-4 rounded-lg transition-transform duration-300 hover:shadow-lg">
                        <div class="flex justify-end items-center mt-2 pb-2 space-x-2">
                            {{-- @dd($data) --}}
                            <button @click="openEditForm = true; currentEditModal = '{{ $loop->index }}'"  id="edit-form" type="button" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-transform duration-300 hover:scale-105">
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
                    <div x-show="openEditForm && currentEditModal === '{{ $loop->index }}'"  class="fixed inset-0 z-50 flex items-center justify-center">
                        <div class="fixed inset-0 bg-black opacity-50"></div>
                        <div tabindex="-1" aria-hidden="true" class="relative w-full h-auto max-w-4xl max-h-full p-4 bg-white rounded-lg shadow-lg">
                            <div class="relative w-full max-w-4xl max-h-full p-4">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow ">
                                    <!-- Modal header -->
                                    <div class="flex items-center justify-between p-4 border-b rounded-t xl:p-5 ">
                                        <h3 class="text-xl font-semibold text-gray-900 ">
                                            Edit Announcement
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
                                                    <select id="type_{{$loop->index}}" name="type" class="bg-gray-50 border border-gray-300 text-customGray text-sm rounded-lg w-full p-2.5 focus:ring-customRed focus:border-customRed">
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
                                                
                                                <div id="subject_container{{$loop->index}}" class="grid grid-cols-1 rounded-lg shadow">
                                                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Subject <span class="text-red-600">*</span>
                                                    </label>
                                                    <div class="grid grid-cols-1">
                                                        <input id="subject_{{$loop->index}}" value="{{ $data->subject }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input>
                                                        @error('subject')
                                                        <div class="text-sm transition transform alert alert-danger" x-data x-init="document.getElementById('subject_container{{$loop->index}}').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('subject_container{{$loop->index}}').focus();">
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
                                                        @if($data->poster && $removedImage != True)
                                                                @if($poster)
                                                                    <img src="{{ $poster->temporaryUrl() }}" class="w-full h-full object-contain" alt="Uploaded Image">
                                                                @elseif(is_string($data->poster))
                                                                    <img src="{{ asset('storage/'. $data->poster) }}" alt="Image Description" class="w-full h-full object-contain"> 
                                                                @endif
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

                                                <div id="description_container{{$loop->index}}" class="grid grid-cols-1 rounded-lg shadow">
                                                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                        Description <span class="text-red-600">*</span>
                                                    </label>
                                                    <div class="grid grid-cols-1">
                                                        <textarea id="description_{{$loop->index}}" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-customRed focus:border-customRed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $data->description }}</textarea>
                                                        @error('description')
                                                            <div class="text-sm transition transform alert alert-danger"
                                                                x-data x-init="document.getElementById('description_container{{$loop->index}}').scrollIntoView({ behavior: 'smooth', block: 'center' }); document.getElementById('description_container{{$loop->index}}').focus();">
                                                                <span class="text-xs text-red-500">{{ $message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="grid grid-cols-3 gap-4 col-span-2">
                                                    <div class="w-full">
                                                        <label for="date_{{$loop->index}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Date of Event<span class="text-red-600">*</span>
                                                        </label>
                                                        <input id="date_{{$loop->index}}" type="date" value="{{$data->date}}" 
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required>
                                                        @error('date')
                                                            <div class="transition transform alert alert-danger" x-init="$el.closest('label').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="start_{{$loop->index}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            Start Time <span class="text-red-600">*</span>
                                                        </label>
                                                        <input id="start_{{$loop->index}}" type="time" value="{{$data->start}}" 
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                            required>
                                                        @error('start')
                                                            <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="w-full">
                                                        <label for="end_{{$loop->index}}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                            End Time <span class="text-red-600">*</span>
                                                        </label>
                                                        <input id="end_{{$loop->index}}" type="time" value="{{$data->end}}" 
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
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
                                                        <select id="publisher_{{$loop->index}}" name="publisher" 
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                            <option value="">Select a publisher</option>
                                                            <option value="You">You</option>
                                                            <option value="Department">Your Department</option>
                                                            <option value="{{$data->publisher}}" selected>{{$data->publisher}}</option>
                                                        </select>
                                                        @error('publisher')
                                                            <div class="transition transform alert alert-danger" x-init="$el.closest('form').scrollIntoView()">
                                                                <span class="text-red-500 text-xs xl:whitespace-nowrap">{{$message }}</span>
                                                            </div> 
                                                        @enderror
                                                    </div>
                                                    <div class="items-center">
                                                        <label for="featured_{{$loop->index}}" class="flex items-center cursor-pointer">
                                                            <input id="featured_{{$loop->index}}" type="checkbox" value="" class="sr-only peer" {{ $data->is_featured ? 'checked' : '' }}>
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
                                                        <select multiple style="width:100%; background:gray;" class="js-example-basic-multiple mb-8 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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
                                            <button @click="openEditForm = false"  type="submit" class="w-full text-white bg-customRed hover:bg-red-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit Announcement</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          
        </div>
        
    </section>
    <div class="p-4  bg-gray-100 w-full rounded-b-lg">
        {{ $ActivitiesData->links(data : ['scrollTo' => False]) }}
    </div>
    
    <div id="toast-container-checkin" tabindex="-1" class="hidden fixed inset-0 z-50 items-center justify-center w-full h-full bg-gray-800 bg-opacity-50">
        <div id="toast-success-checkin" class="fixed flex items-center justify-center w-full max-w-xs p-4 text-gray-500 transform -translate-x-1/2 bg-white rounded-lg shadow top-4 left-1/2 z-60 dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div id="toast-message-checkin" class="text-sm font-normal ms-3">Updated</div>
            <button id="close-toast-checkin" type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"  aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    </div>

            <!-- Loading screen -->
            <div wire:loading wire:target="deleteActivity, editActivity, editAnnouncement" class="load-over z-50">
                <div wire:loading wire:target="deleteActivity, editActivity, editAnnouncement " class="loading-overlay z-50">
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