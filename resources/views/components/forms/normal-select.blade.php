<div>
    <label for="{{ $attributes['id'] }}" class="block text-sm font-medium text-gray-700">{{ $attributes['label'] }} @if ($attributes['required']) <span class=" text-red-500 text-sm">*</span> @endif</label>
    <select wire:model="{{ $attributes['wire:model'] }}" id="{{ $attributes['id'] }}" name="{{ $attributes['name'] }}" class="{{ $errors->has($attributes['wire:model']) ? 'focus:ring-red-500 focus:border-red-500 border-red-300' : 'focus:ring-indigo-500 focus:border-indigo-500 border-gray-300' }} mt-1 block w-full pl-3 pr-10 py-2 text-base focus:outline-none sm:text-sm rounded-md">
        <option value="" selected>--Choose Options--</option>
        @foreach ($options as $index => $option)
            <option value="{{ $attributes->has('optionsValue') ? $optionsValue[$index] : $option }}">{{ $option }}</option>
        @endforeach
    </select>
    @error($attributes['wire:model'])
        <p class=" text-xs text-red-500">{{ $message }}</p>
    @enderror
</div> 