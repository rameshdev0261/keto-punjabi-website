<template>
    <div class="products-section">
        <div class="text-center mb-8">
            <h1 class="section-heading big-title c-white">
              Products For <span>You.</span>
            </h1>
        </div>
        <v-row>
            <v-col
                v-for="(item, i) in products.length > 4
                    ? products.slice(0, 4)
                    : products"
                :key="i"
                cols="12"
                sm="6"
                md="4"
                lg="3"
            >
                <a :href="item.link" target="_blank">
                    <div class="product-wrapper">
                        <div class="product-con">
                            <div class="top">
                                <img :src="item.image" :alt="item.title" />
                                <v-icon>mdi-open-in-new</v-icon>
                            </div>
                            <div class="bottom">
                                <div class="details">
                                    <h2>{{ item.title }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </v-col>
        </v-row>

         <div class="mt-7 text-center">
            <v-btn href="/all-products" depressed color="primary" x-large rounded>View more products</v-btn>
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
