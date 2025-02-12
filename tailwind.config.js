import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#8B0000',
                black: '#363737',
                gray: '#868787',
                detail: '#C9C9C9',
            },
            fontFamily: {
                lora: ["Lora", "serif"],
            },
        },
    },
    plugins: [],
};
