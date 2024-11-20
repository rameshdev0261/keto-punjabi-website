<template>
  <div class="recipe-filter">
    <div class="filter-card">
      <h2 class="">By Category</h2>
      <div class="my-divider"></div>

      <v-chip-group column active-class="primary--text" single>
        <v-chip
          filter
          outlined
          large
          v-model="item.model"
          v-for="(item, i) in categories"
          :key="i"
          class="px-5"
          @change="filterRecipe(item)"
        >
          {{ item.text }}
        </v-chip>
      </v-chip-group>
    </div>

    <div class="filter-card">
      <div class="d-flex">
        <v-row>
          <v-col cols="12" md="12">
            <v-switch
              v-model="only_veg"
              hide-details=""
              class="mt-0"
              inset
              label="Veg"
              @change="toggle()"
            ></v-switch>
          </v-col>
          <v-col cols="12" md="12">
            <v-switch
              v-model="only_non_veg"
              hide-details=""
              class="mt-0"
              inset
              label="Non-Veg"
              @change="toggle()"
            ></v-switch>
          </v-col>
        </v-row>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: () => ({
    only_veg: false,
    only_non_veg: false,
    categories: [
      {
        text: "Main Dishes",
        value: 1,
      },
    ],
    // type: ["All", "Breakfast", "Lunch", "Dinner"],
    item: Object,
  }),

  created() {
    axios
      .get("/api/categories")
      .then((res) => {
        if (res.data.data) {
          var list = [];
          res.data.data.forEach((element) => {
            var obj = {
              text: element.name,
              value: element.id,
              model: false,
            };
            list.push(obj);
          });
          this.categories = list;
        }
      })
      .catch((e) => {});
  },

  methods: {
    toggle() {
      this.item.veg = this.only_veg;
      this.item.non_veg = this.only_non_veg;
      setTimeout(() => {
        this.$emit("childToParent", this.item);
      }, 500);
    },
    filterRecipe(item) {
      item.veg = this.only_veg;
      item.non_veg = this.only_non_veg;
      this.item = item;
      setTimeout(() => {
        this.$emit("childToParent", item);
      }, 500);
    },
  },
};
</script>

<style></style>
