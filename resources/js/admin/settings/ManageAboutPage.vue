<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="12" sm="12" md="10" lg="7">
          <div class="admin-card p-a-15">
            <h2>About Page</h2>
            <br />
            <v-row>
              <v-col cols="12" sm="10" md="8">
                <p class="fields-label">Cover Photo</p>
                <div class="preview-image">
                  <img :src="url" />
                </div>
                <v-file-input v-show="false" @change="onFileChange" id="file-upload" />
                <br>
                <v-btn @click="pickFile" color="primary" dark >
                  Choose Image
                </v-btn>
                <br />
                <br />
              </v-col>
              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Owner Name</p>
                <v-text-field
                  v-model="setting.about_owner_name"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Owner Contact</p>
                <v-text-field
                  v-model="setting.about_contact"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Owner email</p>
                <v-text-field
                  v-model="setting.about_email"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

               <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Owner Address</p>
                <v-text-field
                  v-model="setting.about_address"
                  dense
                  outlined
                ></v-text-field>
              </v-col>

              <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">About</p>
                <v-textarea
                outlined
                  v-model="setting.about_content"
                  ref="myQuillEditor"
                >
                </v-textarea>
              </v-col>

                <v-col class="py-0" cols="12" sm="12" md="12" lg="12">
                <p class="fields-label">Contact-us description</p>
                <v-textarea
                outlined
                  v-model="setting.contact_us_desc"
                  ref="myQuillEditor"
                >
                </v-textarea>
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
    file: null,
    url: null,

  }),

  created() {
    this.url = this.setting.about_image;
  },

  methods: {
      pickFile(){
          document.getElementById("file-upload").click();
      },
    onFileChange(e) {
       this.file = e;
      this.url = URL.createObjectURL(this.file);
    },
    save() {
      let form = new FormData();
      form.append("about_owner_name", this.setting.about_owner_name);
      form.append("about_address", this.setting.about_address);
      form.append("about_content", this.setting.about_content);
      form.append("about_contact", this.setting.about_contact);
      form.append("about_email", this.setting.about_email);
      form.append("contact_us_desc", this.setting.contact_us_desc);

      if (this.file != null) {
        form.append("about_image", this.file);
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
