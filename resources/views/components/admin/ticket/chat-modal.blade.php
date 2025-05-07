<div x-data="chatModalData">
    <div class="absolute bottom-20 right-0 rounded w-80 max-h-80 overflow-hidden bg-gray-50 shadow-md border border-gray-200">
        <div class="">
            <div class=" bg-gray-900 p-2 rounded-t flex items-center justify-between">
                <p class=" text-sm text-white">Chat Support</p>
                <button class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>                      
                </button>
            </div>
            <div id="chatContainer" class="px-2 pt-2 pb-20 h-[300px] overflow-auto">
                <div class="flex flex-col gap-5">
                    {{-- @forelse ($this->messages as $message)
                        @if ($message->sender_id === auth()->user()->id)
                            <div class=" flex items-center justify-end">
                                <div class=" max-w-40 w-auto bg-yellow-500 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                                    <p class=" text-sm text-gray-900">{{ $message->message }}</p>
                                    <p class="text-xs text-gray-600">7:00AM</p>
                                </div>
                            </div>
                        @else
                            <div class=" flex items-center justify-start">
                                <div class=" max-w-40 w-auto bg-gray-200 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                                    <p class=" text-sm">{{ $message->message }}</p>
                                    <p class="text-xs text-gray-400">7:00AM</p>
                                </div>
                            </div>       
                        @endif
                    @empty
                        <div class="flex flex-col justify-center items-center gap-2">
                            <img class=" w-36 aspect-square" src="{{ asset('img/no-message.png') }}" alt="">
                            <p class=" text-sm text-gray-700 font-bold">No Available Message</p>
                        </div>
                    @endforelse --}}
                    <template x-for="message in messages" :key="message.id">
                        <div >
                            <template x-if="message.sender_id === {{ auth()->user()->id }}">
                                <div class=" flex flex-col items-end justify-end">
                                    <div class=" max-w-52 w-auto bg-yellow-500 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                                        <p x-text="message.message" class=" text-sm text-gray-900"></p>
                                    </div>
                                    <div class="mt-1">
                                        <p x-text="moment(message.created_at).format('LT')" class="text-[9px] text-gray-600 text-right"></p>
                                    </div>
                                </div>
                            </template>
                            <template x-if="message.sender_id !== {{ auth()->user()->id }}">
                                <div class=" flex flex-col items-start justify-start">
                                    <div class=" max-w-52 w-auto bg-gray-200 shadow py-2 pl-2 pr-4 flex items-start gap-2 rounded-lg">
                                        <div class=" flex-shrink-0 w-6 h-6 rounded-full border border-blue-500 flex items-center gap-1">
                                            <img class=" w-6 aspect-square" src="{{ asset('img/user-placeholder.png') }}" alt="">
                                        </div>
                                        <div>
                                            <p x-text="message.message" class=" text-sm"></p>
                                        </div>
                                    </div>
                                    <div class="mt-1 flex items-center gap-1">
                                        <p x-text="message.sender.role.name + ' ' + (message.sender.user_details != null ? message.sender.user_details.first_name : message.sender.username)" class="text-[9px] text-gray-600 text-right"></p>
                                        <p x-text="moment(message.created_at).format('LT')" class="text-[9px] text-gray-600 text-right"></p>
                                    </div>
                                </div>     
                            </template>
                        </div>
                    </template>
                </div>
            </div>
            <div class="absolute bottom-0 w-full p-1 bg-gray-200">
                <div class="flex items-center gap-1">
                    <input wire:model="message" type="text" name="message" id="message" class="shadow-sm focus:ring-yellow-500 focus:border-yellow-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Enter message here...">
                    <button wire:click="sendMessage" class="inline-flex items-center px-2 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                        </svg>                      
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                Alpine.data('chatModalData', () => ({
                    ticketId: @entangle('ticketId'),
                    userId: '{{ auth()->user()->id }}',
                    messages: @json($this->messages),
                    init(){
                        this.scrollToBottom()
                        Echo.channel(`ticket-message.${this.ticketId}`)
                            .listen('TicketMessageEvent', event => {
                                this.messages.push(event.ticket)
                                this.scrollToBottom()
                                this.$wire.resetComponent();
                            })
                    },
                    scrollToBottom() {
                        this.$nextTick(() => {
                            const el = document.getElementById('chatContainer');
                            el.scrollTop = el.scrollHeight;
                        });
                    },
                }))
            })
        </script>
    @endpush
</div>