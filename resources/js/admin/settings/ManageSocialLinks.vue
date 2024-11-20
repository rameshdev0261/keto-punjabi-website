<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="12" sm="12" md="10" lg="7">
          <div class="admin-card p-a-15">
            <h2>Social Links</h2>
            <br />
            <v-row>
              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Facebook</p>
                <v-text-field
                  v-model="setting.facebook_link"
                  prepend-inner-icon="mdi-facebook"
                  dense
                  outlined
                ></v-text-field>
              </v-col>
              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Instagram</p>
                <v-text-field
                  v-model="setting.instagram_link"
                  prepend-inner-icon="mdi-instagram"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Twitter</p>
                <v-text-field
                  v-model="setting.twitter_link"
                  prepend-inner-icon="mdi-twitter"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Youtube</p>
                <v-text-field
                  v-model="setting.youtube_link"
                  prepend-inner-icon="mdi-youtube"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Pinterest</p>
                <v-text-field
                  v-model="setting.pinterest_link"
                  prepend-inner-icon="mdi-pinterest"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="text-end" cols="12" sm="12" md="12" lg="12">
                <v-btn depressed @click="save()" color="primary"
                  >Save Changes</v-btn
                >
              </v-col>
            </v-row>
          </div>
        </v-col>
      </v-row>
    </v-container>
    <br /><br />
  </div>
</template>

<script>
export default {
  props: ["setting"],
  data: () => ({}),
  methods: {
    save() {
      let form = new FormData();
      form.append("facebook_link", this.setting.facebook_link);
      form.append("instagram_link", this.setting.instagram_link);
      form.append("twitter_link", this.setting.twitter_link);
      form.append("youtube_link", this.setting.youtube_link);
      form.append("pinterest_link", this.setting.pinterest_link);
      let url = "/api/settings";
      axios
        .post(url, form)
        .then((response) => {
          //   this.productsList = response.data.data;
          alert(response.data.message);
        })
        .catch((error) => {
          alert("Error");
        });
    },
  },
};
</script>

<style></style>
