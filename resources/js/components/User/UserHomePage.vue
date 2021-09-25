<template>
    <div class="container-fluid">
        Jesteś zalogowany a to jest twoja strona główna :)
<!--        Ostatnio dodane artykuły   -->
        <v-row>
            <v-col cols="12" lg="12">
                <v-divider></v-divider>
                <div class="d-flex justify-content-center">
                    <h2>Ostatnio dodane artykuły</h2>
                </div>
                <v-row>
                    <v-col lg="3" md="6" sm="12" xs="12" v-for="article in articles" :key="article.id">
                        <ArticleCard :article="article"></ArticleCard>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
        <!--    Koniec    Ostatnio dodane artykuły   -->
        <v-row>
            <v-col cols="12" lg="12">
                <v-divider></v-divider>
                <div class="d-flex justify-content-center">
                    <h2>Najwyżej ocenione plany treningowe</h2>
                </div>
                <v-row>
                    <v-col lg="3" md="6" sm="12" xs="12" v-for="workout in workouts" :key="workout.id">
                        <WorkoutCard :workout="workout"></WorkoutCard>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import ArticleCard from "../Modals/ArticleCard";
import WorkoutCard from "../Modals/WorkoutCard";
export default {
    components:{WorkoutCard, ArticleCard},
    name: "UserHomePage",
    data(){
        return{
            articles:null,
            workouts:null,
        }
    },
    async created() {
        const [articles,workouts] = await Promise.all([
            this.callApi('get','getLatestArticles'),
            this.callApi('get','getBestWorkouts'),
        ]);
        if(articles.status === 200){
            this.articles = articles.data;
        }else{
            this.$toast.error('Problem z pobraniem artykułów!');
        }
        if(workouts.status === 200){
            this.workouts = workouts.data;
        }else{
            this.$toast.error('Problem z pobraniem planów treningowych!');
        }
    },
}
</script>

<style lang="scss" scoped>
.articles {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
    grid-gap: 3rem;
    padding: 2rem 0;
    width: 100%;
}
</style>
