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
                        <v-col cols="12" lg="7" sm="12">
                            <v-textarea
                                clearable
                                counter
                                clear-icon="mdi-close-circle"
                                label="Krótki opis wyświetlany w miniaturze..."
                                v-model="workout.description"
                                hint="Max 250 znaków"
                                :rules="rules"
                                filled
                                auto-grow
                                rows="2"
                            ></v-textarea>
                        </v-col>
                        <v-col cols="12" lg="5" sm="12">
                            Czy chcesz, aby ten plan był publiczny?
                            <v-radio-group v-model="workout.public" row>
                                <v-radio
                                    label="Tak"
                                    :value=true
                                ></v-radio>
                                <v-radio
                                    label="Nie"
                                    :value=false
                                ></v-radio>
                            </v-radio-group>
                        </v-col>
                        <v-col cols="12">
                            <v-row v-for="(ex, index) in workout.plan" :key="index" style="border-top: 0.4rem solid rgba(0, 0, 0, 0.7)">
                                <v-col cols="12" lg="4" sm="12" >
                                    <v-select v-model="ex.exercise"
                                              :items="exercises"
                                              item-text="name"
                                              return-object
                                              label="Wybierz ćwiczenie"
                                    ></v-select>
                                </v-col>
                                <v-col cols="12" lg="2" sm="12">
                                    <v-btn @click="addingNewExercise = true">
                                        Dodaj nowe ćwiczenie
                                    </v-btn>
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
                        <v-btn v-if="editing" outlined @click="editWorkout">Edytuj plan treningowy</v-btn>
                        <v-btn v-else outlined @click="addWorkout">Dodaj plan treningowy</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>

        <v-dialog v-model="addingNewExercise" persistent width="70%">
            <v-card>
                <v-card-title class="justify-center text-danger">
                    <h4>Dodawanie nowego ćwiczenia</h4>
                </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" lg="9" sm="12">
                            <v-text-field v-model="newExercise.name" label="Podaj tytuł ćwiczenia"
                            ></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="3" sm="12">
                            <strong > Poziom trudności:
                                <v-rating v-model="newExercise.difficulty"
                                          color="yellow darken-3"
                                          background-color="grey darken-1"
                                          empty-icon="$ratingFull"
                                          medium
                                          length="3"
                                ></v-rating>
                            </strong>
                        </v-col>
                        <v-col cols="12" lg="12">
                            <v-textarea
                                clearable
                                counter
                                clear-icon="mdi-close-circle"
                                label="Opis ćwiczenia"
                                v-model="newExercise.description"
                                hint="Max 500 znaków"
                                filled
                                auto-grow
                                background-color="#CFD8DC"
                                rows="1"
                            ></v-textarea>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn text color="primary" @click="addingNewExercise = false">Anuluj</v-btn>
                    <v-btn text color="primary" @click="addNewExercise">Dodaj</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>


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
                id:'',
                title:'',
                type:'',
                description:'',
                public:false,
                plan:[
                    {exercise:'',series:null,reps:[]},
                ],
            },
            newExercise:{
                name:'',
                description:'',
                difficulty:0,
            },
            addingNewExercise:false,
            editing:false,
            rules: [v => v.length <= 250 || 'Max 250 znaków'],
        }
    },
    methods:{
        async editWorkout(){
            console.log('edyytuje')
            const plan = JSON.stringify(this.workout.plan);
            const res = await this.callApi('post','/editWorkout', {plan:plan,
                title: this.workout.title,
                type:this.workout.type,
                description:this.workout.description,
                public:this.workout.public,
                workout_id:this.workout.id});
            if(res.status === 200){
                this.$toast.success('Pomyślnie edytowano plan treningowy',{timeout:3000});
                setTimeout(()=>{ this.$router.push({name:'Workouts'}) }, 3000);
            }else{
                this.$toast.error('Coś poszło nie tak :(');
            }
        },
        async addWorkout(){
            const plan = JSON.stringify(this.workout.plan);
            const res = await this.callApi('post','/addWorkout', {plan:plan,
                                            title: this.workout.title,
                                            type:this.workout.type,
                                            description:this.workout.description,
                                            public:this.workout.public});
            if(res.status === 201){
                this.$toast.success('Pomyślnie utworzono plan treningowy',{timeout:3000});
                setTimeout(()=>{ this.$router.push({name:'Workouts'}) }, 3000);
            }else{
                this.$toast.error('Coś poszło nie tak :(');
            }
        },
        async addNewExercise(){
            const res = await this.callApi('post','/addNewExercise',this.newExercise);
            if(res.status === 201){
                this.$toast.success('Pomyślnie dodano twoje ćwiczenie',{timeout:4000});
                this.addingNewExercise = false;
                this.newExercise.name = '';
                this.newExercise.description = '';
                this.newExercise.difficulty = 0;
                this.getExercises();
            }else{
                console.log(res)
                this.$toast.error('Nie udało się dodać ćwiczenia, proszę spróbować później...')
            }
        },
        addExercise(){
            this.workout.plan.push({exercise:'',series:null,reps:[]});
        },
        deleteExercise(){
            this.workout.plan.pop();
        },
        async getExercises(){
            const res = await this.callApi('get', '/getExercises');
            if(res.status === 200){
                this.exercises = res.data;
            }else{
                this.$toast.error('Nie udało się pobrać ćwiczeń. Proszę odświeżyć stronę!',{timeout:5000});
            }
        }
    },
    async created() {
        const workoutType = await this.callApi('get','/getWorkoutTypes');
        if(workoutType.status === 200){
            this.workoutTypes = workoutType.data;
            this.addingNewExercise = false;
        }else{
            this.$toast.error('Nie udało się pobrać typów treningu. Proszę odświeżyć stronę!',{timeout:5000});
        }
        this.getExercises();
        const id = parseInt(this.$route.params.id);
        if(id){
            this.editing = true;
            const response = await this.callApi('get',`/getWorkout/${id}`);
            if(response.status === 200){
                console.log(response.data[0].[0].public)
                this.workout.id = response.data[0].[0].id;
                this.workout.title = response.data[0].[0].title;
                this.workout.type = response.data[0].[0].type.id;
                this.workout.description = response.data[0].[0].description;
                this.workout.public = response.data[0].[0].public;
                this.workout.plan = JSON.parse(response.data[0].[0].plan);

                // this.userLike = response.data[1];
                // this.userFollow = response.data[2];
                //
                // console.log("moj plan:")
                // console.log(this.workout)

            }else{
                this.$toast.error('Problem z pobraniem planu treningowego!');
            }
        }

    }
}
</script>

<style scoped>

</style>
