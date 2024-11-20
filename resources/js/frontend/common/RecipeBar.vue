<template>
    <div class="products-bar">
        <h2>My Latest Recipes</h2>
        <v-row class="mt-5">
            <v-col
                v-for="(item, i) in recipes.length > 6
                    ? recipes.slice(0, 6)
                    : recipes"
                :key="i"
                cols="12"
                sm="12"
                md="6"
                lg="4"
            >
                <a :href="'/recipe/' + item.id">
                    <div class="product-list">
                        <div><img :src="item.thumbnail" /></div>
                        <div class="ml-2">
                            <p>
                                {{ item.title }}
                            </p>
                            
                        </div>
                    </div>
                </a>
            </v-col>
        </v-row>
        <div class="mt-5 text-center">
            <v-btn href="/all-recipes" depressed color="primary" rounded
                >View more recipes</v-btn
            >
        </div>
    </div>
</template>

<script>
export default {
    props: ["recipes"],
    data: () => ({}),
};
</script>

<style></style>
