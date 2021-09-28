<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" >Statystyki użytkownika
                <v-spacer></v-spacer>
                <v-btn @click="showAddModal = !showAddModal">Dodaj</v-btn>
            </v-card-title>
            <v-card-text class="pt-3">
                <v-expansion-panels popout v-if="statistics">
                    <template v-for="(s, index) in statistics">
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                <v-row align="center" class="spacer" no-gutters>
                                    <v-col class="text-no-wrap text-truncate" lg="12" sm="12">
                                        <strong>{{s.date}}</strong>
                                        <strong>{{s.workout.title}}</strong>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-divider></v-divider>
                                <v-card-text>
                                    <v-row v-if="s.content" v-for="(ex,index) in s.content" :key="index">
                                        <v-col cols="12" lg="4" md="6" sm="12">
                                            <v-text-field :disabled="true" v-model="ex.exercise.name" label="Nazwa ćwiczenia"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" lg="2" md="4" sm="12" v-for="id in ex.series" :key="id">
                                            <v-text-field :disabled="true"
                                                v-model="ex.weights[id-1]"
                                                :label="'Seria ' + id + ', liczba powtórzeń: ' + ex.reps[id-1]"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="red" outlined class="mx-auto" @click="deleteStat(s)">Usuń</v-btn>
                                </v-card-actions>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </template>
                </v-expansion-panels>
            </v-card-text>
        </v-card>

        <v-dialog v-model="showAddModal" persistent width="70%">
            <v-card>
                <v-card-title class="mx-auto" style="background: rgba(0, 0, 0, 0.7); color: white;" >Dodaj swoje wyniki</v-card-title>
                <v-card-text class="pt-3">
                    <v-row v-if="workouts">
                        <v-col cols="12">
                            <v-select v-model="stats.workout"
                                      :items="workouts"
                                      item-text="title"
                                      return-object
                                      label="Wybierz plan treningowy"
                                      @change="workoutPicked"
                            ></v-select>
                        </v-col>
                    </v-row>
                    <v-row v-if="stats.plan" v-for="(ex,index) in stats.plan" :key="index">
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="ex.exercise.name" label="Nazwa ćwiczenia"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="2" md="4" sm="12" v-for="id in ex.series" :key="id">
                            <v-text-field
                                v-model="ex.weights[id-1]"
                                :label="'Seria ' + id + ', liczba powtórzeń: ' + ex.reps[id-1]"
                            ></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn text color="primary" @click="showAddModal = false">Anuluj</v-btn>
                    <v-btn text color="primary" @click="addStatistics">Dodaj</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    name: "UserStatistics",
    data(){
        return{
            showAddModal:false,
            workouts:null,
            selectedWorkout:null,
            stats:{
                workout:0,
                plan:null,
            },
            statistics:null,
        }
    },
    methods:{
        async deleteStat(stat){
            const res = await this.callApi('post','deleteStats',stat);
            if(res.status === 200){
                this.$toast.success('Pomyślnie usunąłeś statystykę',{timeout:2000});
                setTimeout(()=>{ this.$router.go() }, 2000);
            }else{
                this.$toast.error('Nie udało się usunąć statystyk...')
            }
        },
        async addStatistics(){
            const stringPlan = JSON.stringify(this.stats.plan)
            const res = await this.callApi('post','addStatistics',{index:this.stats.workout.id,
                                                                                        plan:stringPlan});
            if(res.status === 201){
                this.$toast.success('Pomyślnie dodano statystyki',{timeout:2000});
                setTimeout(()=>{ this.$router.go() }, 2000);
            }else{
                this.$toast.error('Nie udało się dodać statystyk...')
            }
        },
        workoutPicked(){
            this.stats.plan = JSON.parse(this.stats.workout.plan);
            for( let a=0;a<this.stats.plan.length;a++){
                this.stats.plan[a].weights = [];
                for(let j = 0; j<this.stats.plan[a].reps.length;j++){
                    this.stats.plan[a].weights[j] = 0;
                }
            }
        },
    },
    async created() {
        const [workouts,today,stats] = await Promise.all([
            this.callApi('get','/getUserWorkouts'),
            this.callApi('get','getTodaysWorkout'),
            this.callApi('get','getUserStats'),
        ]);
        if(workouts.status === 200){
            this.workouts = workouts.data;
        }else{}
        if(today.status === 200){
            this.isTodayWorkout = true;
            this.stats.workout = today.data[0];
            this.stats.plan = JSON.parse(this.stats.workout.plan);
            for( let a=0;a<this.stats.plan.length;a++){
                this.stats.plan[a].weights = [];
                for(let j = 0; j<this.stats.plan[a].reps.length;j++){
                    this.stats.plan[a].weights[j] = 0;
                }
            }
        }else if(today.status === 202){
            this.isTodayWorkout = false;
        }else{
            this.$toast.error('Nie udało się sprawdzić dzisiejszych ćwiczeń')
        }
        if(stats.status === 200){
            this.statistics = stats.data;
            for(let i = 0; i<this.statistics.length;i++){
                this.statistics[i].content = JSON.parse(this.statistics[i].content);
            }
        }else{
            this.$toast.error('Nie udało się pobrać statystyk...')
        }
    }
}
</script>

<style scoped>

</style>
