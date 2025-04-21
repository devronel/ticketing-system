@props([
    'type',
    'label' => null,
    'placeholder' => null,
    'required' => false,
    'model' => null,
    'live' => false
])

<div>
    @if ($label)
        <label for="{{ $label }}" class="block text-sm font-medium text-gray-700">
            {{ $label }}
            @if ($required)
                <span class=" text-red-500 text-sm">*</span>
            @endif
        </label>
    @endif
    <div class="mt-1">
        <input 
            @if ($live)
                wire:model.live.debounce.200ms="{{ $model }}" 
            @else   
                wire:model="{{ $model }}" 
            @endif
            type="{{ $type }}" 
            name="{{ $label }}" 
            id="{{ $label }}" 
            @if ($attributes['disabled'])    
                disabled
            @endif
            placeholder="{{ $placeholder }}" 
            class="{{ $errors->has($model) ? 'focus:ring-red-500 focus:border-red-500 border-red-300' : 'focus:ring-indigo-500 focus:border-indigo-500 border-gray-300' }} shadow-sm block w-full sm:text-sm  rounded-md"
        >
        @error($model)
            <p class=" text-xs text-red-500">{{ $message }}</p>
        @enderror
    </div>
</div>