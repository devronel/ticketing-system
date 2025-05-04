<!-- This example requires Tailwind CSS v2.0+ -->
<div x-cloak x-show="isAddModalOpen" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full sm:p-6">
        <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
          <button @click="closeAddModal()" type="button" class="bg-white rounded text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="sr-only">Close</span>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="sm:flex sm:items-start">
          <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
            <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Add User</h3>
            <div class="mt-4 w-full">
                <div class="grid grid-cols-7 gap-3">
                    <div class=" col-span-2">
                        <div>
                            <img class="w-full" src="{{ asset('img/profile-placeholder.png') }}" alt="">
                            <label for="profilePhoto" class="w-full inline-flex items-center justify-center gap-2 cursor-pointer rounded border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:text-sm">
                                <input type="file" id="profilePhoto" name="profilePhoto" hidden>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
                                  </svg>                                  
                                Upload Profile
                            </label>
                        </div>
                        <div class="mt-3">
                            <x-forms.input-field wire:model="email" type="email" name="email" id="email" label="Email address" />
                        </div>
                        <div class="mt-3">
                            <x-forms.input-field wire:model="password" type="password" name="password" id="password" label="Password" />
                        </div>
                    </div>
                    <div class=" col-span-5">
                        <h4>Personal Information</h4>
                        <div>
                            <div class="mt-3 grid grid-cols-3 gap-2">
                                <x-forms.input-field wire:model="firstName" type="text" name="firstName" id="firstName" label="First Name" required />
                                <x-forms.input-field wire:model="middleName" type="text" name="middleName" id="middleName" label="Middle Name" />
                                <x-forms.input-field wire:model="lastName" type="text" name="lastName" id="lastName" label="Last Name" required />
                            </div>
                            <div class="mt-3 grid grid-cols-3 gap-2">
                                <x-forms.input-field wire:model="dateOfBirth" type="date" name="dateOfBirth" id="dateOfBirth" label="Date of Birth" required />
                                <x-forms.normal-select 
                                    wire:model="gender" 
                                    name="gender" 
                                    id="gender" 
                                    label="Gender" 
                                    :options="['Male', 'Female']"
                                    required
                                />
                                <x-forms.normal-select 
                                    wire:model="civilStatus" 
                                    name="civilStatus" 
                                    id="civilStatus" 
                                    label="Civil Status" 
                                    :options="['Single', 'Marrage']"
                                    required
                                />
                            </div>
                            <div class="mt-3 grid grid-cols-2 gap-2">
                                <div>
                                    <label for="department" class="block text-sm font-medium text-gray-700">Department <span class=" text-red-500 text-sm">*</span></label>
                                    <select wire:model="department" name="department" id="department" class="focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base focus:outline-none sm:text-sm rounded-md">
                                        <option value="">-- Choose Option --</option>
                                        @foreach ($this->departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="role" class="block text-sm font-medium text-gray-700">Role <span class=" text-red-500 text-sm">*</span></label>
                                    <select wire:model="role" name="role" id="role" class="focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base focus:outline-none sm:text-sm rounded-md">
                                        <option value="">-- Choose Option --</option>
                                        @foreach ($this->roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <div class="mt-1">
                                    <textarea wire:model="address" rows="4" name="address" id="address" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
          <button wire:click="save" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
          <button @click="closeAddModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  