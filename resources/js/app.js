import "./bootstrap";
import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import i18n from "./i18n";

createInertiaApp({
    resolve: (name) => import(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .mount(el);
    },
});
