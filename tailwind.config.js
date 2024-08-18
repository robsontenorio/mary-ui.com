/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // You will probably also need these lines
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/View/Components/**/**/*.php",
        "./app/Livewire/**/**/*.php",

        // Add mary
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",

        // Laravel Pagination
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
    daisyui: {
        themes: ["light", "dark", "aqua", "retro"],
    },

    // Add daisyUI
    plugins: [require("daisyui")]
}
