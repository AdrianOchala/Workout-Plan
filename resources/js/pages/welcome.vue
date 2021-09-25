<template>
    <v-app>
        <v-app-bar app dark>
            <v-toolbar-title class="mx-auto">Workout Plan</v-toolbar-title>
        </v-app-bar>
        <v-main>
            <v-container fluid>
                <v-row class="mt-3 ml-3 justify-content-center">
                    <v-btn @click="showLogin" width="300px">Logowanie</v-btn>
                    <v-btn @click="showRegistration" width="300px">Rejestracja</v-btn>
                </v-row>
            </v-container>
            <login v-if="getShowLoginComponent"></login>
            <register v-if="getShowRegisterComponent"></register>
            <div class="container-fluid">
                <about></about>
            </div>
        </v-main>
        <v-footer app dark class="white--text">
            <span>Workout Plan</span>
            <v-spacer></v-spacer>
            <span>Adrian Ochała &copy; {{ new Date().getFullYear() }}</span>
        </v-footer>
    </v-app>
</template>
<script>
    import about from '../components/WelcomePage/AboutComponent';
    import login from '../components/Auth/LoginComponent';
    import register from '../components/Auth/RegisterComponent';
    import {mapGetters} from 'vuex';
    export default {
        name: "welcome",
        components:{about,login, register},
        data(){
            return{

            }},
        methods:{
           showLogin(){
               this.$store.commit('setShowLoginComponent', true);
               this.$store.commit('setShowRegisterComponent', false);
            },
            showRegistration(){
               this.$store.commit('setShowLoginComponent', false);
               this.$store.commit('setShowRegisterComponent', true);
            },
        },
        computed:{
            ...mapGetters(['getShowLoginComponent','getShowRegisterComponent']),
        },
    }
</script>
