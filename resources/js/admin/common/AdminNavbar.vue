<template>
    <div class="admin_nav">
        <v-navigation-drawer v-model="drawer" fixed clipped app>
            <v-list nav flat>
                <br />
                <v-list-item-group>
                    <!-- Dashboard -->
                    <div
                        :class="[
                            checkCurrentActiveNavItem(1) ? activeClass : '',
                        ]"
                    >
                        <router-link :to="{ name: 'dashboard' }">
                            <v-list-item>
                                <v-list-item-icon class="sb-icon">
                                    <v-icon>mdi-chart-box</v-icon>
                                </v-list-item-icon>
                                <v-list-item-title class="sb-title"
                                    >Dashboard</v-list-item-title
                                >
                            </v-list-item>
                        </router-link>
                    </div>

                    <!-- Products -->
                    <div
                        :class="[
                            checkCurrentActiveNavItem(2) ? activeClass : '',
                        ]"
                    >
                        <router-link :to="{ name: 'products' }">
                            <v-list-item>
                                <v-list-item-icon class="sb-icon">
                                    <v-icon>mdi-food-variant</v-icon>
                                </v-list-item-icon>
                                <v-list-item-title class="sb-title"
                                    >Products</v-list-item-title
                                >
                            </v-list-item>
                        </router-link>
                    </div>

                    <!-- Recipes -->
                    <div
                        :class="[
                            checkCurrentActiveNavItem(3) ? activeClass : '',
                        ]"
                    >
                        <router-link :to="{ name: 'recipes' }">
                            <v-list-item>
                                <v-list-item-icon class="sb-icon">
                                    <v-icon>mdi-food-fork-drink</v-icon>
                                </v-list-item-icon>
                                <v-list-item-title class="sb-title"
                                    >Recipes</v-list-item-title
                                >
                            </v-list-item>
                        </router-link>
                    </div>

                    <!-- Lookup Tables Menu -->
                    <v-list-group :value="checkExpansionState(1)" class="mb-2">
                        <template v-slot:activator>
                            <v-list-item-icon class="sb-icon">
                                <v-icon>mdi-table</v-icon>
                            </v-list-item-icon>
                            <v-list-item-title class="sb-title"
                                >Lookup Tabels</v-list-item-title
                            >
                        </template>

                        <!-- Categories -->
                        <div
                            :class="[
                                checkCurrentActiveNavItem(4) ? activeClass : '',
                            ]"
                        >
                            <router-link :to="{ name: 'categories' }">
                                <v-list-item class="expand-inner-item">
                                    <v-list-item-title
                                        >Categories</v-list-item-title
                                    >
                                </v-list-item>
                            </router-link>
                        </div>

                        <!-- Tags -->
                        <div
                            :class="[
                                checkCurrentActiveNavItem(5) ? activeClass : '',
                            ]"
                        >
                            <router-link :to="{ name: 'tags' }">
                                <v-list-item class="expand-inner-item">
                                    <v-list-item-title>Tags</v-list-item-title>
                                </v-list-item>
                            </router-link>
                        </div>
                    </v-list-group>

                    <!-- Blogs -->
                    <div
                        :class="[
                            checkCurrentActiveNavItem(6) ? activeClass : '',
                        ]"
                    >
                        <router-link :to="{ name: 'blogs' }">
                            <v-list-item>
                                <v-list-item-icon class="sb-icon">
                                    <v-icon>mdi-text-box</v-icon>
                                </v-list-item-icon>
                                <v-list-item-title class="sb-title"
                                    >Blogs</v-list-item-title
                                >
                            </v-list-item>
                        </router-link>
                    </div>

                    <!-- Contacted -->
                    <div
                        :class="[
                            checkCurrentActiveNavItem(7) ? activeClass : '',
                        ]"
                    >
                        <router-link :to="{ name: 'contacted' }">
                            <v-list-item>
                                <v-list-item-icon class="sb-icon">
                                    <v-icon>mdi-account-supervisor</v-icon>
                                </v-list-item-icon>
                                <v-list-item-title class="sb-title"
                                    >Contacted</v-list-item-title
                                >
                            </v-list-item>
                        </router-link>
                    </div>

                    <!-- Settings -->
                    <div
                        :class="[
                            checkCurrentActiveNavItem(8) ? activeClass : '',
                        ]"
                    >
                        <router-link :to="{ name: 'settings' }">
                            <v-list-item>
                                <v-list-item-icon class="sb-icon">
                                    <v-icon>mdi-cog</v-icon>
                                </v-list-item-icon>
                                <v-list-item-title class="sb-title"
                                    >General Settings</v-list-item-title
                                >
                            </v-list-item>
                        </router-link>
                    </div>
                </v-list-item-group>

                <br /><br />
            </v-list>
        </v-navigation-drawer>

        <!-- Admin AppBar -->
        <v-app-bar
            class="admin-drawer"
            elevation="0"
            color="white"
            fixed
            clipped-left
            app
        >
            <!-- <img class="admin-logo" src="@/assets/logo_full.svg" alt="" /> -->
            <v-app-bar-nav-icon
                class="ml-3"
                @click="drawer = !drawer"
            ></v-app-bar-nav-icon>
        </v-app-bar>
    </div>
</template>

<script>
export default {
    data: () => ({
        drawer: null,
        activeClass: "my-active",
    }),

    computed: {
        currentPage() {
            return this.$route.name;
        },
    },

    methods: {
        checkCurrentActiveNavItem(element) {
            var linkArray = [];
            switch (element) {
                case 1: // Dashboard
                    linkArray = ["dashboard"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 2: // Products
                    linkArray = ["products"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 3: // Recipes
                    linkArray = ["recipes", "addNewRecipe", "editRecipe"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 4: // Categories
                    linkArray = ["categories"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 5: // Tags
                    linkArray = ["tags"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 6: // Blogs
                    linkArray = ["blogs", "addBlog", "editBlog"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 7: // Contacted
                    linkArray = ["contacted"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
                case 8: // Settings
                    linkArray = ["settings"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
            }
        },

        // List Group State
        checkExpansionState(element) {
            var linkArray = [];
            switch (element) {
                case 1: //Lookup Tables
                    linkArray = ["categories", "tags"];
                    if (linkArray.includes(this.currentPage)) return true;
                    break;
            }

            return false;
        },
    },
};
</script>
