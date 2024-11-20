<template>
    <div class="products-bar">
        <h2>Best Products For You</h2>
        <v-row class="mt-5">
            <v-col
                v-for="(item, i) in products.length > 6
                    ? products.slice(0, 6)
                    : products"
                :key="i"
                cols="12"
                sm="12"
                md="6"
                lg="4"
            >
                <a :href="item.link" target="_blank">
                    <div class="product-list">
                        <div><img :src="item.image" :alt="item.title" /></div>
                        <div class="ml-2">
                            <p>{{ item.title }}</p>
                        </div>
                    </div>
                </a>
            </v-col>
        </v-row>
        <div class="mt-5 text-center">
            <v-btn href="/all-products" depressed color="primary" rounded
                >View more products</v-btn
            >
        </div>
    </div>
</template>

<script>
export default {
    props:['products'],
    data: () => ({

    }),
};
</script>

<style></style>
