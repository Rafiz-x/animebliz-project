import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    base: '/',
    plugins: [
        laravel({
            input: [
                'resources/css/admin.css',
                'resources/css/app.css',
                'resources/css/tailwind.css',
                
                'resources/js/admin.js',
                'resources/js/app.js',
                'resources/js/adminLogin.js'

            ],
            refresh: true,
        }),
    ],
});

