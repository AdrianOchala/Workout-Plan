<template>
    <v-app>
        <v-navigation-drawer
            v-model="drawer"
            dark
            app
            clipped
        >
            <v-list class="text-decoration-none">
                <v-list-item :to="{path: '/'}">
                    <v-list-item-content>
                        <v-list-item-title>Strona główna</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="{path: '/Articles'}">
                    <v-list-item-content>
                        <v-list-item-title>Artykuły</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="{path: '/Workouts'}">
                    <v-list-item-content>
                        <v-list-item-title>Plany treningowe</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="{path: '/Exercises'}">
                    <v-list-item-content>
                        <v-list-item-title>Ćwiczenia</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="{path: '/Planner'}">
                    <v-list-item-content>
                        <v-list-item-title>Ustal trening</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="{path: '/Measurments'}">
                    <v-list-item-content>
                        <v-list-item-title>Pomiary</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item :to="{path: '/Statistics'}">
                    <v-list-item-content>
                        <v-list-item-title>Statystyki</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-divider></v-divider>
                <v-list-item :to="{path: '/UserSettings'}">
                    <v-list-item-content>
                        <v-list-item-title>Ustawienia</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item href="/logout">
                    <v-list-item-content>
                        <v-list-item-title>Wyloguj</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>
        <v-app-bar
            app
            dark
            clipped-left
        >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Menu</v-toolbar-title>
            <v-spacer></v-spacer>
            <h2>Workout Plan</h2>
            <v-spacer></v-spacer>
            Witaj {{this.user.name}} !
        </v-app-bar>
        <v-main>
            <div style="padding: 20px 20px 10px 20px;">
                <router-view></router-view>
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
    export default {
        props: ['user'],
        name: "MainComponent",
        data(){
            return{
                drawer: null,
        }},
        computed: {

        },
        async created(){
            this.$store.commit('updateUser', this.user);
            const res = await this.callApi('get','getLatestUserWeight');
            if(res.status === 200) {
                console.log(res)
                this.$store.commit('updateUserBMI',res.data.weight);
            }
        },
        methods: {

        },
    }
</script>
