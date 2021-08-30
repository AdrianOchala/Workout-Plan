<template>
    <div class="nav">
        Tutaj będzie nawigacja :)

        No a tu próba Vue-Router:
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'about' }">About</router-link>
        <router-link :to="{ name: 'authentication', params: {isRegistered: false} }">Login / Register</router-link>


    </div>
</template>
<script>
export default {
    name:'Navigation',
}
</script>
<style lang="scss">

</style>
