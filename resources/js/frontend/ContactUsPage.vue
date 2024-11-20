<template>
  <div>
    <v-app>
      <Navbar />
      <v-main class="front-body">
        <div class="contact-area">
          <v-row>
            <v-col cols="12" sm="12" md="12" lg="7">
              <h1 class="section-heading">Get In <span>Touch</span></h1>
              <p class="contact-desc">
               {{contact_us_desc}}
              </p>
              <br />
              <div v-if="about_address" class="contact-detail">
                <v-icon>mdi-map-marker</v-icon>
                <p class="">
                 {{about_address}}
                </p>
              </div>
              <div  v-if="about_contact" class="contact-detail">
                <v-icon>mdi-phone</v-icon>
                <p class="">{{about_contact}}</p>
              </div>

              <div v-if="about_email" class="contact-detail">
                <v-icon>mdi-email</v-icon>
                <p class="">{{about_email}}</p>
              </div>
            </v-col>

            <v-col cols="12" sm="12" md="12" lg="5">
              <div class="contact-card">
                <form ref="form" @submit.prevent="save()">
                  <p class="fields-label">Full Name</p>
                  <v-text-field
                    placeholder="Enter full name"
                    outlined
                    required
                    v-model="name"
                  ></v-text-field>

                  <p class="fields-label">Email Address</p>
                  <v-text-field
                    placeholder="Enter email"
                    outlined
                    required
                    email
                    v-model="email"
                  ></v-text-field>

                  <p class="fields-label">Message</p>
                  <v-textarea
                    placeholder="Write something"
                    outlined
                    required
                    v-model="message"
                  ></v-textarea>

                  <div class="text-end">
                    <v-btn depressed x-large type="submit" color="primary"
                      >Submit</v-btn
                    >
                  </div>
                </form>
              </div>
            </v-col>
          </v-row>
        </div>
      </v-main>
      <Footer />
    </v-app>
  </div>
</template>

<script>
import Navbar from "./common/Navbar.vue";
import Footer from "./common/Footer.vue";

export default {
  components: {
    Navbar,
    Footer,
  },
  data() {
    return {
      name: "",
      email: "",
      message: "",
      about_address:"",
      about_contact:"",
      about_email:"",
      contact_us_desc:"",
    };
  },
  created(){
 axios.get("/api/get_contact_us_data").then((r) => {
      this.about_address = r.data.data.about_address;
      this.about_contact = r.data.data.about_contact;
      this.about_email = r.data.data.about_email;
      this.contact_us_desc = r.data.data.contact_us_desc;
    });
  },
  methods: {
    save() {
      let form = new FormData();
      form.append("name", this.name);
      form.append("email", this.email);
      form.append("message", this.message);
      let url = "/api/contacts";
      axios
        .post(url, form)
        .then((response) => {
          this.name = "";
          this.email = "";
          this.message = "";
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
