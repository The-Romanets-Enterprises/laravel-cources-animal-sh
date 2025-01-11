<div class="form-group">
    @isset($title)
        <label for="{{ $id ?? $name }}">{{ $title }}</label>
    @endisset
    <input type="file" name="{{ $name }}" id="{{ $id ?? $name }}" class="file-pond"
           @isset($multiple) multiple data-allow-reorder="true" @endisset
    >
    @isset($value)
        @isset($is_file)
            @if($value)
                <div>
                    <a href="{{ $value }}" target="_blank">Документ</a>
                </div>
            @endif
        @else
            @php
                $mime_type = \Illuminate\Support\Facades\Storage::mimeType($value);
            @endphp
            <div>
                @if($mime_type == 'video/mp4' || $mime_type == 'video/x-msvideo')
                    <video class="img-thumbnail mt-2" src="{{ asset("storage/{$value}") }}" controls autoplay style="width: 100%;"></video>
                @else
                    <img src="{{ $value }}" alt="{{ $name }}" class="img-thumbnail mt-2" width="500" @isset($dark_image) style="background: #303030;" @endisset>
                @endif
            </div>
        @endisset
    @endisset
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Get a reference to the file input element
        const inputElement = document.querySelector('input#{{ $id ?? $name }}');
        const key = inputElement.getAttribute('multiple');

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            // FilePondPluginImageExifOrientation,
            // FilePondPluginFileValidateSize,
            FilePondPluginImageEdit,
        );

        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            labelIdle: 'Перетащите сюда или выберите файл',
            // acceptedFileTypes: ['image/*'],
            allowMultiple: key !== null,
            server: {
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                process: '{{ route('ajax.filepond.upload', ['key' => $id ?? $name]) }}',
                revert: '{{ route('ajax.filepond.revert') }}',
            },
            {{--files: [--}}
            {{--    {--}}
            {{--        source: '{{ $value ?? null }}',--}}
            {{--        options: {--}}
            {{--            type: 'local',--}}
            {{--        },--}}
            {{--    }--}}
            {{--],--}}
        });
    });

</script>
