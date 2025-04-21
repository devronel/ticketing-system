<div>
    <div wire:ignore>
        <label class="block text-sm font-medium text-gray-700">
            {{ $attributes['label'] }}
            @if ($attributes['required'])
                <span class=" text-red-500 text-sm">*</span>
            @endif
        </label>
        <div id="{{ $attributes['id'] }}"></div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('livewire:init', () => {
                const editor = $("#{{ $attributes['id'] }}")
                function debounce(func, timeout = 300){
                    let timer;
                    return (...args) => {
                        clearTimeout(timer);
                        timer = setTimeout(() => { func.apply(this, args); }, timeout);
                    };
                }
                function initializeEditor(){
                    editor.summernote({
                        placeholder: "{{ $attributes['placeholder'] }}",
                        tabsize: 2,
                        height: 120,
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'underline', 'clear']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['table', ['table']],
                            ['view', ['fullscreen']]
                        ],
                        callbacks : {
                            onChange : debounce(function(contents, $editable){
                                @this.set("{{ $attributes['wire:model'] }}", contents); 
                            }, 1000)
                        }
                    });
                }

                Livewire.hook('commit', ({ component, commit, respond, succeed, fail }) => {
                    succeed(({ snapshot, effects }) => {
                        // Equivalent of 'message.received'
                        queueMicrotask(() => {
                            // Equivalent of 'message.processed'
                            initializeEditor()
                        })
                    })
                })
    
                Livewire.on('fetch-summernote-value', (event) => {
                    editor.summernote('code', event.incidentDetails)
                });
    
                Livewire.on('reset-summernote-value', (event) => {
                    editor.summernote('code', '')
                });
    
                initializeEditor()
            })
        </script>
    @endpush
</div>