import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',
                'resources/assets/admin/plugins/select2/css/select2.css',
                'resources/assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.css',
                'resources/assets/admin/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.css',

                'public/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
                'public/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
                'public/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',

                'resources/assets/admin/css/adminlte.min.css',

                'resources/assets/admin/plugins/jquery/jquery.min.js',
                'resources/assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js',
                'resources/assets/admin/plugins/select2/js/select2.full.js',
                'resources/assets/admin/plugins/bs-custom-file-input/bs-custom-file-input.js',
                'resources/assets/admin/plugins/fontawesome-kit/fontawesome.js',
                'resources/assets/admin/js/adminlte.min.js',
                'resources/assets/admin/js/demo.js',

                'resources/assets/admin/css/admin.css',

                'resources/assets/admin/plugins/filepond/filepond.min.css',
                'resources/assets/admin/plugins/filepond/filepond-plugin-image-preview.min.css',
                'resources/assets/admin/plugins/filepond/filepond-plugin-image-edit.min.css',
            ],
            refresh: true,
        }),
    ],
});
