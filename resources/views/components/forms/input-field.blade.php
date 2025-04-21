<div>
    @if ($attributes->has('label'))
        <label for="{{ $attributes['label'] }}" class="block text-sm font-medium text-gray-700">
            {{ $attributes['label'] }}
            @if ($attributes->has('required'))
                <span class=" text-red-500 text-sm">*</span>
            @endif
        </label>
    @endif
    <div class="mt-1">
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
                    "shadow-sm block w-full sm:text-sm rounded-md"
            ])}}
        >
        @error($attributes['wire:model'])
            <p class=" text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>