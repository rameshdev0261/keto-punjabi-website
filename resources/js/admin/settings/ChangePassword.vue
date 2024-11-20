<template>
  <div>
    <v-container>
      <v-row>
        <v-col cols="12" sm="12" md="10" lg="7">
          <div class="admin-card p-a-15">
            <h2>Change Password</h2>
            <br />
            <v-row>
              <v-col class="pb-0" cols="12" sm="12" md="6" lg="6">
                <p class="fields-label">New Password</p>
                <v-text-field
                  v-model="new_password"
                  dense
                  outlined
                  :append-icon="newPass ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="newPass ? 'text' : 'password'"
                  @click:append="newPass = !newPass"
                  :error-messages="newErrors"
                  @input="$v.new_password.$touch()"
                  @blur="$v.new_password.$touch()"
                ></v-text-field>
              </v-col>
              <v-col class="pb-0" cols="12" sm="12" md="6" lg="6">
                <p class="fields-label">Confirm Password</p>
                <v-text-field
                  v-model="confirm_password"
                  dense
                  outlined
                  :append-icon="confrimPass ? 'mdi-eye' : 'mdi-eye-off'"
                  :type="confrimPass ? 'text' : 'password'"
                  @click:append="confrimPass = !confrimPass"
                  :error-messages="confirmErrors"
                  @input="$v.confirm_password.$touch()"
                  @blur="$v.confirm_password.$touch()"
                ></v-text-field>
              </v-col>
              <v-col class="text-end" cols="12" sm="12" md="12" lg="12">
                <v-btn @click="update()" depressed color="primary"
                  >Save Changes</v-btn
                >
              </v-col>
            </v-row>
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import axios from "axios";
import { required, sameAs } from "vuelidate/lib/validators";

export default {
  data: () => ({
    newPass: false,
    confrimPass: false,
    new_password: "",
    confirm_password: "",
  }),

  validations: {
    new_password: { required },
    confirm_password: { required, sameAsPassword: sameAs("new_password") },
  },

  computed: {
    newErrors() {
      const errors = [];
      if (!this.$v.new_password.$dirty) return errors;
      !this.$v.new_password.required && errors.push("New Password is required");
      return errors;
    },
    confirmErrors() {
      const errors = [];
      if (!this.$v.confirm_password.$dirty) return errors;
      !this.$v.confirm_password.required && errors.push("Confirm Password is required");
      !this.$v.confirm_password.sameAsPassword && errors.push("Confirm Password is not match");
      return errors;
    },
  },

  methods: {
    update() {
      if (this.$v.$invalid) {
        this.$v.$touch();
        return false; // stop here if form is invalid
      } else {
        axios.post("/api/change_password", {
          new_password: this.new_password,
          confirm_password: this.confirm_password,
        }).then((res) => {
          alert("Password changed successfully");
        }).catch((e) => {
            alert("Password not changed");
        });
      }
    },
  },
};
</script>

<style></style>
