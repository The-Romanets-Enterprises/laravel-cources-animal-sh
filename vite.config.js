import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            // input: ['resources/css/app.css', 'resources/js/app.js'],
            input: [
                // 'resources/assets/admin/plugins/fontawesome-free/css/all.min.css',

                'public/assets/admin/vendors/simplebar/simplebar.min.css',
                'public/assets/admin/css/theme-rtl.css',
                'public/assets/admin/css/theme.css',
                'public/assets/admin/css/user-rtl.css',
                'public/assets/admin/css/user.css',
            ],
            refresh: true,
        }),
    ],
});
