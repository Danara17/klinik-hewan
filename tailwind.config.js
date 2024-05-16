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
