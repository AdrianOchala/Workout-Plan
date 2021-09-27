<template>
    <v-card>
        <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" v-if="isTodayWorkout">Dziś trening!</v-card-title>
        <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" v-else>Dziś wolne!</v-card-title>
        <v-card-text class="pt-3" v-if="isTodayWorkout">
            <h5 v-if="workout">Plan: <a @click="$router.push(`/Workout/${workout.id}`)">{{workout.title}} <v-icon >mdi-open-in-new</v-icon></a></h5>
            <h6>Pamiętaj o uzupełnieniu swoich statystyk dla lepszego śledzenia postępów.</h6>
        </v-card-text>
        <v-card-text class="pt-3" v-else>
            <h6> Dziś masz wolne, daj odpocząć mięśniom, sprawdź swoje statystyki.</h6>
        </v-card-text>
        <v-card-actions>
            <h5><a @click="$router.push(`/Workout/${workout.id}`)">Statystyki<v-icon >mdi-open-in-new</v-icon></a></h5>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    name: "TodaysWorkout",
    data(){
        return{
            isTodayWorkout:false,
            workout:null,
        }
    },
    async created() {
        const [today] = await Promise.all([
           this.callApi('get','getTodaysWorkout'),
        ]);
        if(today.status === 200){
            this.isTodayWorkout = true;
            this.workout = today.data[0];
        }else if(today.status === 202){
            this.isTodayWorkout = false;
        }else{
            this.$toast.error('Nie udało się sprawdzić dzisiejszych ćwiczeń')
        }
    }
}
</script>

<style scoped>

</style>
