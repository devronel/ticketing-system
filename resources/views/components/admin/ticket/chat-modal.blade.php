<div>
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
            <div class="px-2 pt-2 pb-20 h-[300px] overflow-auto">
                {{-- chat conversation --}}
                <div class="flex flex-col gap-3">
                    <div class=" flex items-center justify-start">
                        <div class=" max-w-40 w-auto bg-gray-200 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                            <p class=" text-sm">Hello there</p>
                            <p class="text-xs text-gray-400">7:00AM</p>
                        </div>
                    </div>
                    <div class=" flex items-center justify-end">
                        <div class=" max-w-40 w-auto bg-yellow-500 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                            <p class=" text-sm text-gray-900">Hi, how are you doing?</p>
                            <p class="text-xs text-gray-600">7:00AM</p>
                        </div>
                    </div>
                    <div class=" flex items-center justify-start">
                        <div class=" max-w-40 w-auto bg-gray-200 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                            <p class=" text-sm">Hello there</p>
                            <p class="text-xs text-gray-400">7:00AM</p>
                        </div>
                    </div>
                    <div class=" flex items-center justify-end">
                        <div class=" max-w-40 w-auto bg-yellow-500 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                            <p class=" text-sm text-gray-900">Hi, how are you doing?</p>
                            <p class="text-xs text-gray-600">7:00AM</p>
                        </div>
                    </div>
                    <div class=" flex items-center justify-start">
                        <div class=" max-w-40 w-auto bg-gray-200 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                            <p class=" text-sm">Hello there</p>
                            <p class="text-xs text-gray-400">7:00AM</p>
                        </div>
                    </div>
                    <div class=" flex items-center justify-end">
                        <div class=" max-w-40 w-auto bg-yellow-500 shadow py-2 px-4 flex flex-col items-end rounded-lg">
                            <p class=" text-sm text-gray-900">Hi, how are you doing?</p>
                            <p class="text-xs text-gray-600">7:00AM</p>
                        </div>
                    </div>
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
</div>