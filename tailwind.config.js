import flowbite from "flowbite-react/tailwind";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        flowbite.content(),
        "./resources/**/*.blade.php",
        "./resources/**/*.jsx",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.jsx",
        "./src/**/*.{js,jsx,ts,tsx}",
    ],
    plugins: [
        // ...
        flowbite.plugin(),
        require("flowbite/plugin", {
            charts: true,
        }),
        "./node_modules/flowbite/**/*.jsx",
    ],
};

// const flowbite = require("flowbite/plugin");

// /** @type {import('tailwindcss').Config} */
// module.exports = {
//     content: [
//         "./resources/**/*.blade.php",
//         "./resources/**/*.js",
//         "./resources/**/*.vue",
//         "./node_modules/flowbite/**/*.js",
//         "./src/**/*.{js,ts,vue}",
//         "./resources/**/*.jsx",
//         "./node_modules/flowbite/**/*.jsx",
//     ],
//     plugins: [
//         // ...
//         flowbite.plugin(),
//         require("flowbite/plugin", {
//             charts: true,
//         }),
//         "./node_modules/flowbite/**/*.jsx",
//     ],
// };
