import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/sass/app.scss",
                "resources/sass/style.scss",
                "resources/sass/auth.scss",
                "resources/sass/personal.scss",
                "resources/js/app.js",
                "resources/js/editorAdmin.js",
                "resources/js/editorManager.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
});
