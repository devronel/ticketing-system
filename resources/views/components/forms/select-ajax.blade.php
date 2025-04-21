
<div>
    <div wire:ignore>
        <label for="{{ $attributes['id'] }}" class=" block text-sm font-medium text-gray-700">{{ $attributes['label'] }} <span class=" text-red-500 text-sm">*</span></label>
        <select id="{{ $attributes['id'] }}" name="{{ $attributes['name'] }}" data-placeholder="{{ __('Select your options') }}" style="width: 100%" class=" mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
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
                    allowClear: !el.attr('required'),
                    ajax: {
                        url: '{{ url($attributes["ajaxUrl"]) }}',
                        dataType: 'json',
                        data: function (params) {
                            return {
                                search: params.term,
                                page: params.page || 1
                            };
                        },
                        processResults: function (data, params) {
                            params.page = params.page || 1;

                            return {
                                results: data["payload"],
                                pagination: {
                                    more: data.current_page < data.last_page
                                }
                            };
                        },
                        delay: 250,
                        cache: true
                    }
                })
            }

            initSelect()

            Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
                succeed(({ snapshot, effects }) => {
                    queueMicrotask(() => {
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