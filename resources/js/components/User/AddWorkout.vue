<template>
    <div class="container-fluid">
        <v-row>
            <v-col cols="12" lg="12">
                <v-card>
                    <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                        Dodaj plan treningowy
                    </v-card-title>
                    <v-card-text>
                    <v-row>
                        <v-col cols="12" lg="6" sm="12">
                            <v-text-field v-model="workout.title" label="Podaj tytuł planu treningowego*"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="6" sm="12">
                            <v-select v-model="workout.type" label="Wybierz rodzaj planu treningowego*"
                                      :items="workoutTypes"
                                      item-text="name"
                                      item-value="id"
                            ></v-select>
                        </v-col>
                        <v-col cols="12">
                            <v-row v-for="(ex, index) in workout.plan" :key="index" style="border-top: 0.4rem solid rgba(0, 0, 0, 0.7)">
                                <v-col cols="12" lg="6" sm="12" >
                                    <v-select v-model="ex.exercise"
                                              :items="exercises"
                                              item-text="name"
                                              item-value="name"
                                              label="Wybierz lub dodaj nowe ćwiczenie"
                                    ></v-select>
                                </v-col>
                                <v-col cols="12" lg="6" sm="12">
                                    <v-text-field v-model.number="ex.series"
                                                  label="Proszę wpisać liczbę serii"
                                                  type="number"
                                    ></v-text-field>
                                </v-col>
                                <v-col cols="12" lg="3" sm="12" v-for="id in ex.series" :key="id">
                                    <v-text-field
                                        v-model="ex.reps[id-1]"
                                        :label="'Seria ' + id + ', liczba powtórzeń'"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-btn outlined @click="addExercise">Dodaj ćwiczenie</v-btn>
                            <v-btn outlined color="red" @click="deleteExercise">Usuń ćwiczenie</v-btn>
                        </v-col>
                    </v-row>
                    </v-card-text>
                    <v-divider></v-divider>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn outlined @click="addWorkout">Dodaj plan treningowy</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    name: "AddWorkout",
    data(){
        return{
            workoutTypes:null,
            exercises:null,
            workout:{
                title:'',
                type:'',
                plan:[
                    {exercise:'',series:null,reps:[]},
                ],
            }
        }
    },
    methods:{
        async addWorkout(){
            const plan = JSON.stringify(this.workout.plan);
            const res = await this.callApi('post','/addWorkout', {plan:plan, title: this.workout.title, type:this.workout.type});
            if(res.status === 201){
                this.$toast.success('Pomyślnie utworzono plan treningowy',{timeout:3000});
                setTimeout(()=>{ this.$router.push({name:'Workouts'}) }, 3000);
            }else{
                this.$toast.error('Coś poszło nie tak :(');
            }
        },
        addExercise(){
            this.workout.plan.push({exercise:'',series:null,reps:[]});
        },
        deleteExercise(){
            this.workout.plan.pop();
        }
    },
    async created() {
        const [workoutType,exercises] = await Promise.all([
            this.callApi('get','/getWorkoutTypes'),
            this.callApi('get', '/getExercises'),
        ]);
        if(workoutType.status === 200){
            this.workoutTypes = workoutType.data;
        }else{
            this.$toast.error('Nie udało się pobrać typów treningu. Proszę odświeżyć stronę!',{timeout:5000});
        }
        if(exercises.status === 200){
            this.exercises = exercises.data;
        }else{
            this.$toast.error('Nie udało się pobrać ćwiczeń. Proszę odświeżyć stronę!',{timeout:5000});
        }

    }
}
</script>

<style scoped>

</style>
