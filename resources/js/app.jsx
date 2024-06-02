import React from "react";
import { createRoot } from "react-dom/client"; // Note the correction from react-dom
import { createInertiaApp } from "@inertiajs/inertia-react";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { AuthProvider } from "./Components/contexts/AuthContext"; // Correct importimport "flowbite"; // Import Flowbite if needed
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
        createRoot(el).render(
            <AuthProvider>
                <App {...props} />
            </AuthProvider>
        );
    },
});
