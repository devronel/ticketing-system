<div>
    <x-admin.page-title title="Priority Reference" />
    <div>
        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-ml-0.5 mr-2 size-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
              
            Add New
        </button>
        <div class="flex flex-col mt-2">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 rounded">
                  <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-700">
                      <tr class="divide-x divide-gray-200">
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">ID</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Name</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Color</th>
                        <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($priorities as $priority)
                            <tr class="bg-white border-b border-gray-200 divide-x divide-gray-200">
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">{{ $priority->id }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">{{ $priority->name }}</td>
                                <td class="px-4 py-2 whitespace-nowrap text-xs text-gray-50">
                                    <span style="background-color: {{ $priority->color }};" class="py-1 px-2 rounded">{{ $priority->color }}</span>
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap text-sm text-gray-500">
                                    <div>
                                        <button type="button" class="inline-flex items-center p-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>                                              
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
            </div>
          </div>
    </div>
</div>
  