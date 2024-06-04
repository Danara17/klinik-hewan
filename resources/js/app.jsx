import React from "react";
import { createRoot } from "react-dom/client"; // Note the correction from react-dom
import { createInertiaApp } from "@inertiajs/inertia-react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import "flowbite";
import "./bootstrap"; // Import other necessary setup files
import "../css/app.css"; // Import your CSS

createInertiaApp({
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob("./Pages/**/*.jsx")
        ),
    setup({ el, App, props }) {
        createRoot(el).render(<App {...props} />);
    },
});
