<template>
    <div class="sidemenu">
        <div class="logo-section">
            <h2>Keto Punjabi</h2>
            <!-- <a href="/"> <img :src="'/assets/logo.png'" alt="Logo" /></a> -->
        </div>

        <v-list>
            <v-subheader>Main Menu</v-subheader>
            <v-list-item-group v-model="selectedItem" color="primary">
                <v-list-item
                    v-for="(item, i) in menu_links"
                    :href="item.link"
                    :key="i"
                >
                    <v-list-item-content>
                        <v-list-item-title
                            v-text="item.name"
                        ></v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list-item-group>
        </v-list>
        
    </div>
</template>

<script>
export default {
    data: () => ({
        menu_links: [
            {
                name: "Home",
                link: "/",
            },
            {
                name: "Products",
                link: "/all-products",
            },
            {
                name: "Recipes",
                link: "/all-recipes",
            },
            {
                name: "About",
                link: "/about",
            },
            {
                name: "Contact us",
                link: "/contact-us",
            },
            {
                name: "Blogs",
                link: "/blog",
            },
        ],
    }),

   
};
</script>

<style></style>
