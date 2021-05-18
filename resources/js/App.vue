<template>
    <div>
        <Navigation></Navigation>
        <router-view></router-view>
        <Home></Home>
    </div>

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
