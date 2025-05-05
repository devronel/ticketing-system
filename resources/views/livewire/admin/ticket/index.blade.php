<div x-data="data">
    <x-admin.page-title title="Ticket Management" />
    <div>
      @can('user.create')
        <button @click="openAddModal()" type="button" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-2 size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              
            Add New
        </button>
      @endcan
        <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto">
              <div class="py-2 align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 rounded">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-700">
                      <tr class="divide-x divide-gray-200">
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Subject</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Full Name</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Department</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Agent</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Priority</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Created at</th>
                        <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($tickets as $ticket)
                            <tr class="bg-white border-b border-gray-200 divide-x divide-gray-200">
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($ticket->subject, 30, '...') }}</td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">{{ $ticket->customer->userDetails->full_name ?? $ticket->customer->username }}</td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">{{ $ticket->department->name }}</td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">{{ $ticket->assignTo->userDetails->full_name ?? '--' }}</td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-white">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium0" style="background-color: {{ $ticket->status->color }}"> {{ $ticket->status->name }}</span>
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-white">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium0" style="background-color: {{ $ticket->priority->color ?? '' }}"> {{ $ticket->priority->name ?? '--' }}</span>
                                </td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">{{ $ticket->created_at }}</td>
                                <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                                    <div>
                                        @can('user.edit')
                                          <a href="{{ route('ticket-management.view', ['id' => $ticket->id]) }}" class="inline-flex items-center p-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                                  <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                  <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                              </svg> 
                                          </a>
                                        @endcan
                                        @can('user.delete')
                                            <button type="button" class="inline-flex items-center p-1 border border-transparent shadow-sm text-xs leading-4 font-medium rounded text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                </svg>                                         
                                            </button>
                                        @endcan
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
            </div>
            {{-- <div class=" mt-2">
                {{ $users->links() }}
            </div> --}}
        </div>
    </div>
    {{-- Modal Start --}}
    {{-- Modal End --}}

    <script>
      document.addEventListener('livewire:init', () => {
          Alpine.data('data', () => ({
            isAddModalOpen: @entangle('isAddModalOpen'),
            isEditModalOpen: @entangle('isEditModalOpen'),
            openAddModal(){
              this.isAddModalOpen = true;
            },
            closeAddModal(){
              this.isAddModalOpen = false;
              this.$wire.resetComponent()
            },
            closeEditModal(){
              this.isEditModalOpen = false;
              this.$wire.resetComponent()
            }
          }))
      })
    </script>

</div>
  