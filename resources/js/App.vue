<template>
    <v-app>
        <Navigation></Navigation>
        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>

</template>
<script>
import Navigation from "./layouts/Navigation";
import Home from "./pages/Home.vue";
export default {
    components:{
        Navigation,
        Home
    }

}
</script>
