import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        cors: true,
    },
    plugins: [
        laravel({
            input: [
                'resources/assets/admin/vendors/simplebar/simplebar.min.css',
                'resources/assets/admin/vendors/simplebar/simplebar.min.js',
                'resources/assets/admin/vendors/popper/popper.min.js',
                'resources/assets/admin/vendors/bootstrap/bootstrap.min.js',
                'resources/assets/admin/vendors/anchorjs/anchor.min.js',
                'resources/assets/admin/vendors/is/is.min.js',
                'resources/assets/admin/vendors/dayjs/dayjs.min.js',
                'resources/assets/admin/vendors/echarts/echarts.min.js',
                'resources/assets/admin/vendors/countup/countUp.umd.js',
                'resources/assets/admin/vendors/chart/chart.umd.js',
                'resources/assets/admin/vendors/fontawesome/all.min.js',
                'resources/assets/admin/vendors/lodash/lodash.min.js',
                'resources/assets/admin/vendors/list.js/list.min.js',
            ],
            refresh: true,
        }),
    ],
});
