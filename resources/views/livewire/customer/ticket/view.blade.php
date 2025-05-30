<div class=" relative">
    <div class="lg:flex lg:items-center lg:justify-between pb-4 border-b border-gray-200">
        <div class="flex-1 min-w-0">
            <div class="flex items-center gap-2">
                @can('all-ticket.view')
                    <a href="{{ route('ticket-management.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m7.49 12-3.75 3.75m0 0 3.75 3.75m-3.75-3.75h16.5V4.499" />
                        </svg>                                       
                    </a>
                @endcan
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    {{ $ticket->subject }}
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
    <div class="py-4">
        <div class="mt-2 p-4 border border-gray-200 rounded">
            {!! $ticket->description !!}
        </div>
    </div>

    <livewire:admin.component.ticket.chat-box :ticketId="$this->ticketId" />

    {{-- <script>
        document.addEventListener('livewire:init', () => {
            Alpine.data('data', () => ({
                ticketId: @entangle('ticketId'),
                messages: @entangle('messages'),
                init(){
                    console.log(this.messages)
                    Echo.channel(`ticket-message.${this.ticketId}`)
                        .listen('TicketMessageEvent', event => {
                            this.$wire.fetchMessage();
                        })
                }
            }))
        })
    </script> --}}
</div>
