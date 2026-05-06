import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/hmain.css',
                'resources/css/hpage.css',
                'resources/css/ngh/catalog.css',
                'resources/css/ngh/qrgen.css',
                'resources/js/app.js',
                'resources/js/ngh/qrgen.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
