/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");
import Vue from "vue";
import axios from "axios";
import vuetify from "../plugins/vuetify";
import routes from "../routes/index";
import store from "./vuex/store";
import Vuex from "vuex";
import Cookies from "js-cookie";
import Vuelidate from "vuelidate";
Vue.use(Vuelidate);

Vue.use(Vuex);
Vue.use(require("vue-moment"));

import VueQuillEditor from "vue-quill-editor";
// require styles
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";
Vue.use(VueQuillEditor /* { default global options } */);

Vue.prototype.$accessToken = function () {
    return Cookies.get("Token") || "";
};

const app = new Vue({
    el: "#app",
    vuetify: vuetify,
    created() {
        axios.defaults.headers.common["Authorization"] = this.$accessToken();
        axios.defaults.headers.common["Content-Type"] = "application/json";

        axios.interceptors.response.use(
            function (response) {
                return response;
            },
            function (error) {
                if (error.response) {
                    if (error.response.status === 401) {
                        if (Cookies.get("Token")) {
                            Cookies.remove("Token");
                        }
                        routes.replace({ name: "admin" });
                    }
                }
                throw error;
            }
        );
    },
    router: routes,
    store,
    components: {
        "landing-page-component": Vue.component("LandingPage", () => {
            return import("./frontend/Landing.vue");
        }),
        "about-page-component": Vue.component("AboutPage", () => {
            return import("./frontend/AboutPage.vue");
        }),
        "contact-page-component": Vue.component("ContactPage", () => {
            return import("./frontend/ContactUsPage.vue");
        }),
        "single-recipe-page-component": Vue.component("SingleRecipe", () => {
            return import("./frontend/SingleRecipePage.vue");
        }),

        "all-recipes-page-component": Vue.component("AllRecipes", () => {
            return import("./frontend/AllRecipes.vue");
        }),
        "all-products-page-component": Vue.component("AllProducts", () => {
            return import("./frontend/AllProducts.vue");
        }),

        "terms-page-component": Vue.component("Terms", () => {
            return import("./frontend/Terms.vue");
        }),

        "privacy-page-component": Vue.component("Privacy", () => {
            return import("./frontend/Privacy.vue");
        }),
        "blog-page-component": Vue.component("Blog", () => {
            return import("./frontend/Blog.vue");
        }),
    },
});
