<div>
    <div class="mb-4">
        <h2 class=" text-3xl font-bold">My Tickets</h2>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 rounded">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-yellow-500 ">
                    <tr  class=" divide-x">
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Subject</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Deparment</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th scope="col" class="relative px-3 py-2">
                        <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tickets as $ticket)
                        <tr class=" divide-x">
                            <td class="px-3 py-2 whitespace-nowrap">{{ $ticket->subject }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium0" style="background-color: {{ $ticket->status->color }}"> {{ $ticket->status->name }}</span>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $ticket->department->name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach
    
                <!-- More people... -->
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
  
</div>
