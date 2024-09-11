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
                "color-txt": "",
                "color-box": "",
                "color-btn": "",
                "color-btn2": "",
                // Color Modo dark
                "color-dark": "#121521",
                "color-txt-dark": "",
                "color-box-dark": "",
                "color-btn-dark": "",
                "color-btn2-dark": "",
            },
            spacing: {
                // Padding main
                "pdd-desk": "112px",
                "pdd-tablet": "30px",
                "pdd-mobile": "18px",
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
