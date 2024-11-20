<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="12" sm="12" md="10" lg="7">
          <div class="admin-card p-a-15">
            <h2>Keto diet description</h2>
            <v-row>
              <br />
              <v-col class="pb-0" cols="12" sm="12" md="12" lg="12"
                ><v-textarea v-model="setting.keto_diet_description" outlined
              /></v-col>
            </v-row>
            <h2>My recipes description</h2>
            <br />
            <v-row
              ><v-col class="pb-0" cols="12" sm="12" md="12" lg="12"
                ><v-textarea v-model="setting.my_recipe_description" outlined
              /></v-col>
            </v-row>

            <h2>Home Info</h2>
            <br />
            <v-row>
              <v-col cols="12" sm="10" md="8">
                <div class="preview-image">
                  <img :src="url" />
                </div>
                <input type="file" @change="onFileChange" id="file-upload-home" />
                <label for="file-upload-home" class="custom-file-upload">
                  Choose Image
                </label>
                <br />
                <br />
              </v-col>
              <v-col class="pb-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Title</p>
                <v-text-field
                  v-model="setting.home_info_title"
                  dense
                  outlined
                ></v-text-field>
              </v-col>
              <v-col class="pb-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">About</p>
                <v-textarea
                  v-model="setting.home_info_about"
                  outlined
                ></v-textarea>
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
  data: () => ({
    url: null,
    file: null,
  }),

  created() {
    this.url = this.setting.home_info_image;
  },

  methods: {
    onFileChange(e) {
      this.file = e.target.files[0];
      this.url = URL.createObjectURL(this.file);
    },
    save() {
      let form = new FormData();
      form.append("home_info_title", this.setting.home_info_title);
      form.append("home_info_about", this.setting.home_info_about);

      form.append("keto_diet_description", this.setting.keto_diet_description);
      form.append("my_recipe_description", this.setting.my_recipe_description);

      if (this.file != null) {
        form.append("home_info_image", this.file);
      }
      let url = "/api/settings";
      axios
        .post(url, form)
        .then((response) => {
          alert(response.data.message);
          this.file = null;
        })
        .catch((error) => {
          alert("Error");
        });
    },
  },
};
</script>

<style></style>
