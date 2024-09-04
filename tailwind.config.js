import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Color Principal
                "color-main": "",
                "color-txt": "",
                "color-box": "",
                // Color Modo dark
                "color-dark": "",
                "color-txt-dark": "",
                "color-btn2-dark": "",
                // Class name: `.btn-primary`
                primary: {
                    background: colors["blue"],
                    text: colors["white"],
                },
                // Class name: `.btn-secondary`
                secondary: {
                    background: colors["grey"],
                    text: colors["black"],
                },
            },
            spacing: {
                // Padding main
                "pdd-desk": "112px",
                "pdd-tablet": "30px",
                "pdd-mobile": "18px",
                title: {
                    text: colors[""],
                    fontSize: "1rem",
                },
            },
            subtitle: {},
        },
    },

    plugins: [forms],
};
