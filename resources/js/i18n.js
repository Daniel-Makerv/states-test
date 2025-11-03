import { createI18n } from "vue-i18n";

// Traducciones para el front
const messages = {
    en: {
        geostatistical_key: "Geostatistical key",
        states: "States",
        name_state: "State",
        satCode: "Sat Code",
        nameState: "Name State",
        abbreviation: "Abbreviation",
        actions: "Actions",
        more: "More",
        init: "Home",
        projects: "Projects",
        state_details: "State Details",
    },
    es: {
        geostatistical_key: "Clave geoestadística",
        states: "Estados",
        name_state: "State",
        satCode: "Codigo Sat",
        nameState: "Nombre del estado",
        abbreviation: "Abreviaciòn",
        actions: "Acciones",
        more: "Màs",
        init: "Inicio",
        projects: "Proyectos",
        state_details: "Detalles del estado",
    },
};

const i18n = createI18n({
    locale: "es",
    fallbackLocale: "en",
    messages,
});

export default i18n;
