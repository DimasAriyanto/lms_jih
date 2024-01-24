/** @type {import('tailwindcss').Config} */
import preset from "./vendor/filament/support/tailwind.config.preset";

module.exports = {
    presets: [preset],
    content: [
        "./app/Filament/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    plugins: [
        // require('@tailwindcss/forms'),
        // require("@tailwindcss/aspect-ratio"),
    ],
};
