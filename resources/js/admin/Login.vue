<template>
  <v-app>
    <v-main>
      <v-container fluid fill-height>
        <v-layout align-center justify-center>
          <v-flex xs12 sm8 md4>
            <v-card class="elevation-12">
              <br />
              <div class="text-center">
                <h2>Keto Admin Login</h2>
              </div>
              <br />
              <v-card-text>
                <form ref="form" @submit.prevent="login()">
                  <v-text-field
                    v-model="email"
                    label="Email"
                    type="text"
                    placeholder="Enter Email"
                    required
                    outlined
                  ></v-text-field>

                  <v-text-field
                    v-model="password"
                    label="Password"
                    type="password"
                    placeholder="Enter Password"
                    required
                    outlined
                  ></v-text-field>

                  <div class="text-center">
                    <v-btn
                      type="submit"
                      class="mt-4"
                      color="primary"
                      value="log in"
                      depressed
                      >Login Now</v-btn
                    >
                  </div>
                </form>
              </v-card-text>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import axios from "axios";
import Cookies from "js-cookie";

export default {
  name: "Login",
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    login() {
      var form = new FormData();
      form.append("email", this.email);
      form.append("password", this.password);
      axios
        .post("/api/login", form)
        .then((response) => {
          var remember = false;
          let token = "Bearer " + response.data.data.access_token;
          axios.defaults.headers.common["Authorization"] = token;
          Cookies.set("Token", token, { expires: remember ? now : 1 });
          this.$router.push({ name: "dashboard" });
        })
        .catch((error) => {
          alert("Invalid Username or Password");
        });
    },
  },
};
</script>
