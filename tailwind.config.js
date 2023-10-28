// const defaultTheme = require("tailwindcss/defaultTheme");

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
//         "./storage/framework/views/*.php",
//         "./resources/views/**/*.blade.php",
//     ],
//     darkMode: "class",

//     theme: {
//         extend: {
//             fontFamily: {
//                 sans: ["Figtree", ...defaultTheme.fontFamily.sans],
//                 poppins: ["Poppins"],
//             },
//         },
//     },

//     plugins: [require("@tailwindcss/forms")],
// };

import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        forms,
        require("flowbite/plugin")({
            charts: true,
        }),
    ],
};
