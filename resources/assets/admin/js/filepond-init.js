import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

document.addEventListener("DOMContentLoaded", function () {
    if (typeof FilePond === "undefined") {
        console.error("FilePond не загружен!");
        return;
    }

    FilePond.registerPlugin(
        FilePondPluginImagePreview,
        FilePondPluginFileValidateType
    );

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const filePondElements = document.querySelectorAll('.file-pond');

    filePondElements.forEach(inputElement => {
        let filesData = inputElement.dataset.files;
        const isPhotoField = inputElement.name === 'photos[]';
        const isVideoField = inputElement.name === 'videos[]';
        const hiddenInput = inputElement.parentElement.querySelector(isPhotoField ? '.photo-paths' : '.video-paths');

        if (filesData) {
            try {
                filesData = JSON.parse(filesData);
                filesData = filesData.map(file => {
                    console.log('Loading file from data-files:', file.source);
                    return {
                        source: file.source,
                        options: { type: 'local' }
                    };
                });
            } catch (e) {
                console.error("Ошибка при разборе JSON data-files:", e);
                filesData = [];
            }
        } else {
            filesData = [];
        }

        const pond = FilePond.create(inputElement, {
            allowMultiple: true,
            acceptedFileTypes: isPhotoField ? ['image/*'] : isVideoField ? ['video/*'] : ['image/*', 'video/*'],
            files: filesData,
            server: {
                process: {
                    url: '/file/upload',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    onload: (response) => {
                        console.log('File uploaded, raw response:', response);
                        const data = JSON.parse(response);
                        const path = data.path;
                        console.log('Extracted path:', path);
                        return path;
                    },
                    onerror: (response) => console.error("Ошибка загрузки:", response),
                },
                revert: {
                    url: '/file/delete',
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    onload: (response) => console.log("Файл удален:", response),
                }
            },
            oninitfile: (fileItem) => {
                // Добавляем существующие файлы в скрытые поля при инициализации
                const path = fileItem.source;
                const hiddenField = document.createElement('input');
                hiddenField.type = 'hidden';
                hiddenField.name = isPhotoField ? 'photos[]' : 'videos[]';
                hiddenField.value = path;
                hiddenInput.parentElement.appendChild(hiddenField);
                console.log('Initialized hidden field with path:', path);
            },
            onaddfile: (error, file) => {
                if (!error) {
                    const path = file.serverId || file.source;
                    if (path) {
                        const hiddenField = document.createElement('input');
                        hiddenField.type = 'hidden';
                        hiddenField.name = isPhotoField ? 'photos[]' : 'videos[]';
                        hiddenField.value = path;
                        hiddenInput.parentElement.appendChild(hiddenField);
                        console.log('Added hidden field with path:', path);
                    }
                }
            },
            onremovefile: (error, file) => {
                if (!error) {
                    const path = file.serverId || file.source;
                    const hiddenFields = hiddenInput.parentElement.querySelectorAll(`input[value="${path}"]`);
                    hiddenFields.forEach(field => field.remove());
                    console.log('Removed hidden field with path:', path);
                }
            },
            labelIdle: isPhotoField ? 'Перетащите фото сюда' : 'Перетащите видео сюда',
            labelFileProcessing: 'Загрузка...',
        });
    });

    console.log("FilePond успешно инициализирован");
});
