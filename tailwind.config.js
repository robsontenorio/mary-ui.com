/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/**/*.blade.php",
        "./resources/**/**/*.js",
        "./app/Livewire/**/**/*.php",
        "./app/View/Components/**/**/*.php",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui")],
}

