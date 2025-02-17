import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        cors: true,
    },
    plugins: [
        laravel({
            input: [
                //'resources/assets/admin/vendors/simplebar/simplebar.min.css',
            ],
            refresh: true,
        }),
    ],
});
