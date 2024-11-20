<template>
    <div>
        <div :class="toggleNavClass()">
            <div class="custom-nav">
                <v-row>
                    <v-col align-self="center" class="header-logo" cols="8" sm="8" md="3">
                        <h1>Keto Punjabi</h1>
                    </v-col>
                    <v-col class="navbar-links-section" cols="12" sm="9" md="9">
                        <ul>
                            <li>
                                <div
                                    :class="[
                                        checkCurrentActiveNavItem(1)
                                            ? linkActive
                                            : '',
                                    ]"
                                >
                                    <a href="/">Home</a>
                                </div>
                            </li>

                            <li>
                                <v-menu
                                    v-model="productMenu"
                                    :close-on-content-click="false"
                                    open-on-hover
                                    offset-y
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <a v-bind="attrs" v-on="on" href="#"
                                            >Products
                                            <v-icon>mdi-chevron-down</v-icon></a
                                        >
                                    </template>

                                    <v-card class="h-menu-card">
                                        <ProductsBar :products="products" />
                                    </v-card>
                                </v-menu>
                            </li>
                            <li>
                                <v-menu
                                    v-model="recipeMenu"
                                    :close-on-content-click="false"
                                    open-on-hover
                                    offset-y
                                >
                                    <template v-slot:activator="{ on, attrs }">
                                        <a v-bind="attrs" v-on="on" href="#"
                                            >Recipes
                                            <v-icon>mdi-chevron-down</v-icon></a
                                        >
                                    </template>

                                    <v-card class="h-menu-card">
                                        <RecipeBar :recipes="popularRecipes" />
                                    </v-card>
                                </v-menu>
                            </li>
                            <li>
                                <div
                                    :class="[
                                        checkCurrentActiveNavItem(4)
                                            ? linkActive
                                            : '',
                                    ]"
                                >
                                    <a href="/about">About Us</a>
                                </div>
                            </li>

                            <li>
                                <div
                                    :class="[
                                        checkCurrentActiveNavItem(5)
                                            ? linkActive
                                            : '',
                                    ]"
                                >
                                    <a href="/contact-us">Contact Us</a>
                                </div>
                            </li>
                            <li>
                                <div
                                    :class="[
                                        checkCurrentActiveNavItem(6)
                                            ? linkActive
                                            : '',
                                    ]"
                                >
                                    <a href="/blog">Blogs</a>
                                </div>
                            </li>
                        </ul>
                    </v-col>

                    <v-col align-self="center" class="menu-btn text-end pa-0" cols="4" sm="4" md="3">
                        <v-btn
                            color="transparent"
                            class="mr-2"
                            depressed
                            fab
                            @click="menu = true"
                            ><v-icon>mdi-menu</v-icon></v-btn
                        >
                    </v-col>
                </v-row>
            </div>
        </div>

        <v-navigation-drawer style="z-index: 2000;" v-model="menu" fixed temporary>
            <SideMenu />
        </v-navigation-drawer>
    </div>
</template>

<script>
import ProductsBar from "../common/ProductsBar.vue";
import RecipeBar from "../common/RecipeBar.vue";
import axios from "axios";
import SideMenu from "./SideMenu.vue";
export default {
    components: {
        ProductsBar,
        RecipeBar,
        SideMenu
    },
    created() {
        axios.get("/api/get_navbar_menu").then((r) => {
            this.products = r.data.products;
            this.popularRecipes = r.data.popular_recipes;
        });
    },
    data: () => ({
        menu: false,
        products: [],
        popularRecipes: [],
        productMenu: false,
        recipeMenu: false,
        hints: true,
        active: false,
        linkActive: "my-active",
    }),

    computed: {
        currentPage() {
            return window.location.pathname;
        },
    },

    methods: {
        toggleNavClass() {
            if (this.active == false) {
                return "nav-wrapper";
            } else {
                return "nav-wrapper-2";
            }
        },

        checkCurrentActiveNavItem(element) {
            switch (element) {
                case 1: // Home
                    var linkArray = ["/"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 4: // About
                    var linkArray = ["/about"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 5: // Contact us
                    var linkArray = ["/contact-us"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 6: // Contact us
                    var linkArray = ["/blog"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
            }
        },
    },

    mounted() {
        window.document.onscroll = () => {
            let navBar = document.getElementById("app");
            if (window.scrollY > navBar.offsetTop) {
                this.active = true;
            } else {
                this.active = false;
            }
        };
    },
};
</script>

<style>
.my-active a {
    font-weight: bold !important;
    color: var(--primary) !important;
}

.v-menu__content--fixed {
    left: 50% !important;
    transform: translate(-50%, 0) !important;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px,
        rgba(0, 0, 0, 0.3) 0px 30px 60px -30px !important;
}
</style>
