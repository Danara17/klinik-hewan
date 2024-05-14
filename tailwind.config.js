import flowbite from "flowbite-react/tailwind";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        flowbite.content(),
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    plugins: [
        // ...
        flowbite.plugin(),
        require("daisyui"),
        require("flowbite/plugin", {
            charts: true,
        }),
        "./node_modules/flowbite/**/*.js",
    ],
};
