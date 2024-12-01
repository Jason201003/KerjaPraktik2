import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap.min.css',
                'resources/css/style.css',
                'resources/js/bootstrap.bundle.min.js',
                'resources/js/custom.js',
                'resources/js/app.js', // tambahkan file JS utama Anda jika ada
                'resources/js/main.js',
            ],
            refresh: true,
        }),
    ],
});
