<template>
  <dir class="by-category-section">
    <div class="text-center">
      <h1 class="section-heading big-title">View By Categories</h1>
    </div>
    <v-row class="mt-8">
      <v-col v-for="(item, i) in categories" :key="i" cols="12" sm="4" md="3" lg="2">
        <div @click="filterCate(item)" class="category-card">
          <img :src="item.icon" alt="" />
          <h2>{{ item.name }}</h2>
        </div>
      </v-col>
    </v-row>
  </dir>
</template>

<script>
export default {
  props: ["categories"],
  data: () => ({}),
  methods: {
    filterCate(item) {
      location.href = "/all-recipes?category="+item.id;
    },
  },
};
</script>

<style></style>
