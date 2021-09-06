<template>
    <v-app>
        <v-main>
            <v-content style="padding: 20px 20px 10px 20px;">
                <router-view></router-view>
            </v-content>
        </v-main>
        <v-footer app dark class="white--text">
            <span>Workout Plan</span>
            <v-spacer></v-spacer>
            <span>Adrian Ochała &copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>

<script>
    export default {
        props: ['user'],
        name: "MainComponent",
        data(){
            return{
                drawer: null,
        }},
        computed: {

        },
        created(){
            this.$store.commit('updateUser', this.user);
        },
        methods: {

        },
    }
</script>
