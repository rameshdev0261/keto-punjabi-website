<template>
    <v-app>
        <div>
            <Navbar />
            <v-main>
                <router-view></router-view>
            </v-main>
        </div>
    </v-app>
</template>

<script>
import Navbar from "./common/AdminNavbar.vue";
export default {
    components: {
        Navbar,
    },
};
</script>

<style></style>
