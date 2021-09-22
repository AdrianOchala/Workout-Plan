<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                Twoje plany treningowe
                <v-spacer></v-spacer>
                <v-btn @click="$router.push(`/AddWorkout`)">Dodaj plan treningowy</v-btn>
            </v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12" lg="12">
                        <v-divider></v-divider>
                        <v-row>
                            <v-col lg="3" md="6" sm="12" xs="12" v-for="uworkout in userWorkouts" :key="uworkout.id">
                                <WorkoutCard :workout="uworkout"></WorkoutCard>
                            </v-col>
                        </v-row>
                        <v-divider></v-divider>
<!--                        <v-pagination v-if="paginationInfo"-->
<!--                                      :value="paginationInfo.current_page"-->
<!--                                      :length="paginationInfo.total"-->
<!--                                      @input="getArticlesForPagination"-->
<!--                        ></v-pagination>-->
                    </v-col>
                </v-row>

            </v-card-text>
        </v-card>
        <v-card class="mt-6">
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                Publiczne plany treningowe użytkowników
                <v-spacer></v-spacer>

            </v-card-title>
            <v-card-text>


            </v-card-text>
        </v-card>
    </div>
</template>

<script>
import WorkoutCard from "../Modals/WorkoutCard";
export default {
    name: "Workouts",
    components: {WorkoutCard},
    data(){
        return{
            userWorkouts:null,
            publicWorkouts:null,
        }
    },
    async created() {
        const [userWorkouts,publicWorkouts] = await Promise.all([
            this.callApi('get','/getUserWorkouts'),
            this.callApi('get', '/getPublicWorkouts'),
        ]);
        if(userWorkouts.status === 200){
            this.userWorkouts = userWorkouts.data;
            console.log(this.userWorkouts)
        }else{
            this.$toast.error('Nie udało się pobrać twoich planów treningowych.');
        }
        if(publicWorkouts.status === 200){
            this.publicWorkouts = publicWorkouts.data;
        }else{
            this.$toast.error('Nie udało się pobrać planów treningowych.');
        }
    }
}
</script>

<style scoped>

</style>
