import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',   // يبقى للصفحات Blade القديمة
                'resources/js/app.jsx',  // لصفحات Inertia/React
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, './resources/js'),
        },
    },
    esbuild: {
        jsx: 'automatic', // React 17+ automatic JSX transform — لا يحتاج import React في كل ملف
    },
});
