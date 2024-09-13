import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Color Principal
                "color-main": "#F9F9F7",
                "color-txt": "#2f4858",
                "color-box": "",
                "color-btn": "#2f4858",
                "color-btn-sc": "rgb(234 179 8)",
                // Color Modo dark
                "color-dark": "#121521",
                "color-txt-dark": "#F9F9F7",
                "color-box-dark": "",
            },
            spacing: {
                // Padding main
                "pdg-desk": "112px",
                "pdg-tablet": "30px",
                "pdg-mobile": "18px",
            },
            fontSize: {
                "title-banner": "3rem", // 48px
                title: "3rem", // 48px
                "sub-title": "2.25rem", // 36px
                texto: "",
                parrafo: "1rem", // 16px
            },
        },
    },

    plugins: [forms],
};
