<div>
    <div class="absolute bottom-20 right-0 rounded w-80 min-h-80 bg-gray-50 shadow-md border border-gray-200">
        <div>
            <div class=" bg-gray-900 p-2 rounded-t">
                <p class=" text-sm text-white">Chat Support</p>
            </div>
            <div>
                {{-- chat conversation --}}
            </div>
            <div class="absolute bottom-0 w-full">
                <x-forms.input-field wire:model="message" type="text" id="message" name="message" placeholder="Enter message..." />
            </div>
        </div>
    </div>
</div>