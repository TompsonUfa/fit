import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import path from "path";

export default defineConfig({
    plugins: [
        laravel([
                "resources/sass/app.scss",
                "resources/sass/auth.scss",
                "resources/js/app.js",
                "resources/js/bootstrap.js",
                "resources/js/sidebar.js",
                "resources/js/delete.js",
                "resources/js/change-img.js",
                "resources/js/sending-posts.js",
                "resources/js/add-users.js",
                "resources/js/user-access.js",
                "resources/js/editorWithVideo2.js",
                "resources/js/editorManager.js",
                // "resources/js/editorWithVideo.js",
            ],
            // refresh: true,
        ),

    ],
    resolve: {
        alias: {
            "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
        },
    },
});
