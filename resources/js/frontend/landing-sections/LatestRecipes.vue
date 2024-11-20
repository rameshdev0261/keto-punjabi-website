<template>
    <div class="latest-recipes-section">
        <v-row>
            <v-col cols="12" sm="6" md="6">
                <p class="c-primary section-mini-title">Recipes</p>
                <h1 class="section-heading">My Latest <span>Recipes.</span></h1>
                <p>
                    {{ description }}
                </p>
            </v-col>
            <v-col class="d-flex justify-end" cols="12" sm="6" md="6">
                <lottie-player
                    class="recipe-lottie"
                    :src="'/assets/animations/arrow_anim.json'"
                    background="transparent"
                    speed="1"
                    loop
                    autoplay
                ></lottie-player>
            </v-col>
        </v-row>

        <v-row>
            <v-col
                v-for="(item, i) in latestRecipes.length > 7
                    ? latestRecipes.slice(0, 7)
                    : latestRecipes"
                :key="i"
                cols="12"
                sm="6"
                md="4"
                lg="3"
            >
                <div class="res-card">
                    <figure class="res-card__thumb">
                        <img :src="item.thumbnail"  class="res-card__image" />
                        <figcaption class="res-card__caption">
                            <div class="res-card-t-con">
                                <h2 class="res-card__title">
                                    {{ item.title }}
                                </h2>
                            </div>
                           
                            <a
                                :href="'/recipe/' + item.id"
                                class="res-card__button"
                                >Read more</a
                            >
                        </figcaption>
                    </figure>
                </div>
            </v-col>

            <v-col v-if="latestRecipes.length > 7" cols="12" sm="4" md="3">
                <a href="/all-recipes">
                    <div class="view-more-card">
                        <v-icon>mdi-arrow-right-circle</v-icon>
                        <p class="mb-0">View More..</p>
                    </div></a
                >
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    props: ["description", "latestRecipes"],
    data: () => ({}),
};
</script>

<style></style>
