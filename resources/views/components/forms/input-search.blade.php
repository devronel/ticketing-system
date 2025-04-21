<div>
    @if ($attributes->has('label'))
        <label for="{{ $attributes['label'] }}" class="block text-sm font-medium text-gray-700">
            {{ $attributes['label'] }}
            @if ($attributes->has('required'))
                <span class=" text-red-500 text-sm">*</span>
            @endif
        </label>
    @endif
    <div class="mt-1 relative">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 absolute left-2 top-1/2 -translate-y-1/2">
            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
        </svg>          
        <input 
            {{ $attributes }}
            type="{{ $attributes['type'] }}" 
            name="{{ $attributes['label'] }}" 
            id="{{ $attributes['label'] }}" 
            @if ($attributes->has('disabled'))    
                disabled
            @endif
            placeholder="{{ $attributes['placeholder'] }}" 
            {{ $attributes->merge([
                'class' => ($errors->has($attributes['wire:model']) 
                    ? "focus:ring-red-500 focus:border-red-500 border-red-300" 
                    : "focus:ring-indigo-500 focus:border-indigo-500 border-gray-300") . ' ' .
                    "shadow-sm block w-full sm:text-sm rounded-md pl-7"
            ])}}
        >
        @error($attributes['wire:model'])
            <p class=" text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>