<template>
  <div>
    <v-container>
      <v-breadcrumbs class="px-0" :items="bread"></v-breadcrumbs>
      <h1 class="mb-5">General Settings</h1>
      <!-- <br /> -->
      <v-tabs v-model="tab" color="primary" show-arrows>
        <v-tab v-for="item in items" :key="item">
          {{ item }}
        </v-tab>
      </v-tabs>
      <v-divider></v-divider>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <Banner />
        </v-tab-item>
        <v-tab-item>
          <ChangePassword />
        </v-tab-item>
        <v-tab-item>
          <HomeInfo :setting="setting" />
        </v-tab-item>
        <v-tab-item>
          <ManageAboutPage :setting="setting" />
        </v-tab-item>
        <v-tab-item>
          <ManageSocialLinks :setting="setting" />
        </v-tab-item>
      </v-tabs-items>
    </v-container>
  </div>
</template>

<script>
import Banner from "./settings/ManageBanner.vue";
import ChangePassword from "./settings/ChangePassword.vue";
import HomeInfo from "./settings/HomeInfo.vue";
import ManageAboutPage from "./settings/ManageAboutPage.vue";
import ManageSocialLinks from "./settings/ManageSocialLinks.vue";
export default {
  components: {
    Banner,
    ChangePassword,
    HomeInfo,
    ManageAboutPage,
    ManageSocialLinks,
  },
  data: () => ({
    bread: [
      {
        text: "Dashboard",
        disabled: false,
        to: "/admin/dashboard",
      },
      {
        text: "Settings",
        disabled: true,
        to: "",
      },
    ],
    tab: null,
    items: [
      "Home Slider",
      "Change Password",
      "Home Info",
      "About Page",
      "Social Links",
    ],
    setting:{}
  }),

  created() {
    axios
      .get("/api/settings")
      .then((response) => {
        this.setting = response.data.data;
      })
      .catch((error) => {});
  },
};
</script>

<style>
.v-tab--active {
  color: #000 !important;
  background: #9192961c !important;
}
</style>
