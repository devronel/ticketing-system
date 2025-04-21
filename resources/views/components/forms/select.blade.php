
<div>
    <div wire:ignore>
        <label for="{{ $attributes['id'] }}" class=" block text-sm font-medium text-gray-700">{{ $attributes['label'] }} <span class=" text-red-500 text-sm">*</span></label>
        <select id="{{ $attributes['id'] }}" name="{{ $attributes['name'] }}" data-placeholder="{{ __('Select your options') }}" style="width: 100%" class=" mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            @if (isset($options))
                @foreach ($options as $option)
                    <option value="{{ $option->{$dbAttributes[0]} }}">
                        @if (isset($dbAttributes[2]))
                            {{ $option->{$dbAttributes[1]} . ' ' . $option->{$dbAttributes[2]} }}
                        @else
                            {{ $option->{$dbAttributes[1]} }}
                        @endif
                    </option>
                @endforeach
            @else
                @foreach ($items as $key => $item)
                    <option value="{{ $key }}">
                        {{ $item }}
                    </option>
                @endforeach
            @endif
        </select>
    </div> 
    @error($attributes['wire:model'])
        <p class=" text-xs text-red-500">{{ $message }}</p>
    @endif
</div>
@push('scripts')
    <script>
        document.addEventListener('livewire:init', () => {
            const el = $("#{{ $attributes['id'] }}")
            el.val(null)
            function initSelect(){
                el.select2({
                    placeholder: '{{ __('Select your option') }}',
                    allowClear: !el.attr('required')
                })
            }

            initSelect()

            Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
                succeed(({ snapshot, effects }) => {
                    // Equivalent of 'message.received'
                    queueMicrotask(() => {
                        // Equivalent of 'message.processed'
                        initSelect()
                    })
                })
            })
            Livewire.on('fetch-data', (event) => {
                const idAttribute = "{{ $attributes['id'] }}"
                $(`#${idAttribute}`).val(event[idAttribute])
                initSelect()
            });

            Livewire.on('reset-data', (event) => {
                el.val(null)
                initSelect()
            });


            el.on('change', function(){
                @this.set("{{ $attributes['wire:model'] }}", $(this).val());
            })
        })
    </script>
@endpush