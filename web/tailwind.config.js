const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./**/*.md"
    ],

    theme: {
        extend: {
            colors: {
                accent: {
                    150: "#0E0044",
                    140: "#100052",
                    130: "#13005F",
                    120: "#16006D",
                    110: "#18007A",
                    DEFAULT: "#1B0088",
                    90: "#321A94",
                    80: "#4933A0",
                    70: "#5F4DAC",
                    60: "#7666B8",
                    50: "#8D80C3",
                    40: "#A499CF",
                    30: "#BBB2DB",
                    20: "#D1CCE7",
                    10: "#E8E5F3",
                    slight: "#F4F2F9"
                },
                secondary: {
                    150: "#7D6F80",
                    140: "#968599",
                    130: "#AF9BB2",
                    120: "#C8B2CC",
                    110: "#E1C8E5",
                    DEFAULT: "#FADEFF",
                    90: "#FAE1FF",
                    80: "#FBE5FF",
                    70: "#FCE8FF",
                    60: "#FCEBFF",
                    50: "#FDEFFF",
                    40: "#FDF2FF",
                    30: "#FDF5FF",
                    20: "#FEF8FF",
                    10: "#FEFCFF",
                    slight: "#FFFDFF"
                },
                foreground: {
                    150: "#171C24",
                    140: "#1B212B",
                    130: "#202732",
                    120: "#242C3A",
                    110: "#293241",
                    DEFAULT: "#2D3748",
                    90: "#424B5A",
                    80: "#575F6D",
                    70: "#6C737F",
                    60: "#818791",
                    50: "#969BA3",
                    40: "#ABAFB6",
                    30: "#C0C3C8",
                    20: "#D5D7DA",
                    10: "#EAEBED",
                    slight: "#F4F5F6"
                }
            },
            fontSize: {
                "2xs": ".625rem"
            }
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
