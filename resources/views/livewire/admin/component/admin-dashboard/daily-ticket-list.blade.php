<div>
    <p class=" font-bold text-sm">Today's Ticket</p>
    <div class=" overflow-x-auto mt-1">
        <div class="py-2 align-middle inline-block min-w-full">
          <div class="shadow overflow-hidden border-b border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-700">
                <tr class="divide-x divide-gray-200">
                  <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Subject</th>
                  <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Customer</th>
                </tr>
              </thead>
              <tbody>
                  @forelse ($todaysTicket as $value)
                      <tr class="bg-white border-b border-gray-200 divide-x divide-gray-200">
                          <td title="{{ $value->subject }}" class="px-3 py-1 whitespace-nowrap text-sm text-gray-500">{{ Str::limit($value->subject, 20) }}</td>
                          <td class="px-3 py-1 whitespace-nowrap text-sm text-gray-500">{{ $value->customer->userDetails->full_name ?? $value->customer->username }}</td>
                          {{-- <td class="px-4 py-1 whitespace-nowrap text-sm text-gray-500">
                              <div>
                                  @can('department.edit')
                                    <button wire:click="fetchEdit({{ $department->id }})" type="button" class="inline-flex items-center p-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>                                              
                                    </button>
                                  @endcan
                              </div>
                          </td> --}}
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
</div>
