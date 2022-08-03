import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/frontend/app.scss',
                'resources/css/backend/app.scss',
                'resources/js/frontend/app.js',
                'resources/js/backend/app.js',
            ],
            refresh: [
                'routes/**',
                'resources/views/**',
            ],
        }),
    ],
});
