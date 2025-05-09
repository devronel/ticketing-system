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
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Agent</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Priority</th>
                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                            <span class="sr-only">Actions</span>
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($tickets as $ticket)
                        <tr class=" divide-x">
                            <td class="px-3 py-2 whitespace-nowrap">{{ Str::limit($ticket->subject, 20) }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $ticket->department->name }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">{{ $ticket->assignTo->userDetails?->full_name ?? $ticket->assignTo?->username ?? 'Unassigned' }}</td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white" style="background-color: {{ $ticket->status->color }}"> {{ $ticket->status->name }}</span>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-white" style="background-color: {{ $ticket->priority->color ?? '' }}"> {{ $ticket->priority?->name ?? '--' }}</span>
                            </td>
                            <td class="px-3 py-2 whitespace-nowrap text-left text-sm font-medium">
                                <a href="{{ route('customer.ticket.view', ['id' => $ticket->id]) }}" class="inline-flex items-center p-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4">
                                        <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path fill-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z" clip-rule="evenodd" />
                                    </svg> 
                                </a>
                                <a href="{{ route('customer.ticket.edit', ['id' => $ticket->id]) }}" class="inline-flex items-center p-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                      </svg>
                                      
                                </a>
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
