import Vue from "vue";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import "@mdi/font/css/materialdesignicons.css";

Vue.use(Vuetify);

const opts = {
    icons: {
        iconfont: "mdi"
    },
    theme: {
        themes: {
            light: {
                primary: "#FF6A00",
                primaryDark: "#BE5002",
                red: "#cb0400",
                orange: "#dd7803",
                iconGrey: "#666e78",
                lightBack: "#f8f8f9",
                darkText: "#211817",
                darkGrey: "#625d7e"
            }
        }
    }
};

export default new Vuetify(opts);
