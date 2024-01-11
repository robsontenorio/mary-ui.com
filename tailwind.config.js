/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/Livewire/**/**/*.php",
        "./app/View/Components/**/**/*.php",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    safelist: [
        {
            pattern: /col-span-*/,
            variants: ['lg']
        },
        {
            pattern: /bg-(yellow|purple)-*/
        }
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
}

