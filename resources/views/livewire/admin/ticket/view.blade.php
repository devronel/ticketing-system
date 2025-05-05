<div class=" relative">
    <div class="lg:flex lg:items-center lg:justify-between pb-4 border-b border-gray-200">
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
                <a href="{{ route('ticket-management.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                      </svg>                                       
                </a>
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    [Ticket #{{ $ticket->id }}] - {{ $ticket->subject }}
                </h2>
            </div>
            <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-3">
            
            <div class="mt-2 flex items-center text-sm text-white">
                <span style="background-color: {{ $ticket->status->color }};" class=" inline-flex items-center px-2 py-0.5 rounded text-xs font-medium">
                    {{ $ticket->status->name }}
                </span>
            </div>
            @if (!is_null($ticket->priority))
                <div class="mt-2 flex items-center text-sm text-white">
                    <span style="background-color: {{ $ticket->priority->color }};" class=" inline-flex items-center px-2 py-0.5 rounded text-xs font-medium">
                        {{ $ticket->priority->name }}
                    </span>
                </div>
            @endif
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-4 mr-1">
                    <path fill-rule="evenodd" d="M4.5 2.25a.75.75 0 0 0 0 1.5v16.5h-.75a.75.75 0 0 0 0 1.5h16.5a.75.75 0 0 0 0-1.5h-.75V3.75a.75.75 0 0 0 0-1.5h-15ZM9 6a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm-.75 3.75A.75.75 0 0 1 9 9h1.5a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1-.75-.75ZM9 12a.75.75 0 0 0 0 1.5h1.5a.75.75 0 0 0 0-1.5H9Zm3.75-5.25A.75.75 0 0 1 13.5 6H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM13.5 9a.75.75 0 0 0 0 1.5H15A.75.75 0 0 0 15 9h-1.5Zm-.75 3.75a.75.75 0 0 1 .75-.75H15a.75.75 0 0 1 0 1.5h-1.5a.75.75 0 0 1-.75-.75ZM9 19.5v-2.25a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-.75.75h-4.5A.75.75 0 0 1 9 19.5Z" clip-rule="evenodd" />
                </svg>
                {{ $ticket->department->name }}
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <svg class="flex-shrink-0 mr-1 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Submitted on {{ $ticket->created_at->format('F j, Y') }}
            </div>
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="flex-shrink-0 mr-1 size-4 text-gray-400">
                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                    </svg>                  
                Agent {{ $ticket->assignTo->userDetails->full_name ?? $ticket->assignTo->username ?? '--' }}
            </div>
            </div>
        </div>
    </div>
    <div class="py-4 border-b border-gray-200">
        <p class="font-bold flex items-center gap-1 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
                <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd" />
              </svg>              
            Ticket Settings
        </p>
        <div class="flex items-center gap-2">
            <div>
                <select wire:model.live="status" name="status" id="status" class="focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base focus:outline-none sm:text-sm rounded-md">
                    <option value="">Status</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select wire:model.live="priority" name="priority" id="priority" class="focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base focus:outline-none sm:text-sm rounded-md">
                    <option value="">Priority</option>
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <select wire:model.live="agent" name="agent" id="agent" class="focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 mt-1 block w-full pl-3 pr-10 py-2 text-base focus:outline-none sm:text-sm rounded-md">
                    <option value="">Agents</option>
                    @foreach ($agents as $agent)
                        <option value="{{ $agent->id }}">
                            {{ $agent->userDetails->full_name ?? $agent->username }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="py-4">
        <h2 class="text-lg font-bold leading-7 text-gray-900 sm:text-xl sm:truncate">
            Ticket Content
        </h2>
        <div class="mt-2 p-2 border border-gray-300 rounded">
            {!! $ticket->description !!}
        </div>
    </div>

    <div class="fixed bottom-6 right-8">
        <div class=" relative">
            <button type="button" class=" bg-blue-400 p-2 flex items-center justify-center w-16 h-16 shadow-md shadow-blue-300 rounded-full">
                <img class=" w-24 aspect-square" src="{{ asset('img/live-chat.png') }}" alt="">
            </button>
            <x-admin.ticket.chat-modal />
        </div>
    </div>
    {{-- Modal Start --}}
    {{-- Modal End --}}
</div>
