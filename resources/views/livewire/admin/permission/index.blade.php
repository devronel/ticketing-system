<div x-data="data">
    <x-admin.page-title title="Roles & Permissions" />
    <x-admin.tabs.roles-permission-tab />
    <div>
        <button @click="openAddModal()" type="button" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-2 size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg> 
            Add New
        </button>
        <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto">
                <div class="py-2 align-middle inline-block min-w-full">
                        <div class="shadow overflow-hidden border-b border-gray-200 rounded">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-700">
                                <tr class="divide-x divide-gray-200">
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permissions as $permission)
                                        <tr class="bg-white border-b border-gray-200 divide-x divide-gray-200">
                                            <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">{{ $permission->name }}</td>
                                            <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                                <div>
                                                    <button wire:click="fetchEdit({{ $permission->id }})" type="button" class="inline-flex items-center gap-1 p-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                                        </svg>    
                                                        Edit                                          
                                                    </button>
                                                    <button type="button" class="inline-flex items-center gap-1 p-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                        </svg>                                                  
                                                        Remove                                          
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white">
                                            <td class="px-4 py-2 whitespace-nowrap text-sm font-medium text-gray-900">No data found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                </div>
                <div class=" mt-2">
                    {{ $permissions->links() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Start --}}
    <x-admin.permission.add-modal />
    {{-- Modal End --}}

    <script>
      document.addEventListener('livewire:init', () => {
          Alpine.data('data', () => ({
            isAddModalOpen: @entangle('isAddModalOpen'),
            openAddModal(){
              this.isAddModalOpen = true;
            },
            closeAddModal(){
              this.isAddModalOpen = false;
              this.$wire.resetComponent()
            }
          }))
      })
    </script>

</div>
  