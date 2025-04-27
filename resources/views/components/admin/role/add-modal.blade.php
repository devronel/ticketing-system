<!-- This example requires Tailwind CSS v2.0+ -->
<div x-cloak x-show="isAddModalOpen" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-xl sm:w-full sm:p-6">
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
            <h3 class="text-xl leading-6 font-bold text-gray-900" id="modal-title">Manage Roles</h3>
            <div class="mt-4 w-full">
                <div class="">
                    <x-forms.input-field wire:model="name" type="text" name="name" id="name" label="Name" />
                    <div class=" mt-2">
                        <p class="mb-1">Permissions</p>

                        {{-- <div class="ml-2">
                            @foreach ($this->permissions as $key => $pages)
                                <div class="mb-2">
                                    <p class=" text-sm font-bold text-gray-800">{{ $pages['description'] }}</p>
                                    <div class=" ml-4">
                                        @foreach ($pages['sections'] as $page => $sections)
                                            <div class="mb-2">
                                                <p class="text-gray-700 text-xs font-medium capitalize">{{ $page }}</p>
                                                <div class=" ml-6 flex items-center gap-3">
                                                  @foreach ($sections as $section => $action)
                                                      <div>
                                                        <input wire:model="permissions.{{ $key }}.sections.{{ $page }}.{{ $section }}" id="{{ $key }}.sections.{{ $page }}.{{ $section }}" type="checkbox" class="text-sm">
                                                        <label for="{{ $key }}.sections.{{ $page }}.{{ $section }}" class=" text-sm">{{ $section }}</label>
                                                      </div>
                                                  @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}
                        <div class="  grid grid-cols-4">
                            @foreach ($this->permissions as $permission)
                                <div>
                                  <input wire:model="permission.{{ $permission->id }}" type="checkbox" id="{{ $permission->name }}">
                                  <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                                </div>
                            @endforeach
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
  