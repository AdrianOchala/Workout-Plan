<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">Ustal treningi w ciągu tygodnia
                <v-spacer></v-spacer>
                <v-btn outlined color="white" @click="editPlan">Edytuj</v-btn>
            </v-card-title>
            <v-card-text>
                <v-row v-if="plannedWorkouts">
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Poniedziałek</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.monday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.monday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearMonday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.monday.id}`)" >{{plannedWorkouts.monday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.monday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearMonday"
                                    ></v-select>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Wtorek</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.tuesday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.tuesday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearTuesday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.tuesday.id}`)" >{{plannedWorkouts.tuesday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.tuesday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearTuesday"
                                    ></v-select>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Środa</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.wednesday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.wednesday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearWednesday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.wednesday.id}`)" >{{plannedWorkouts.wednesday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.wednesday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearWednesday"
                                    ></v-select>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Czwartek</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.thursday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.thursday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearThursday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.thursday.id}`)" >{{plannedWorkouts.thursday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.thursday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearThursday"
                                    ></v-select>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Piątek</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.friday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.friday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearFriday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.friday.id}`)" >{{plannedWorkouts.friday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.friday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearFriday"
                                    ></v-select>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Sobota</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.saturday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.saturday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearSaturday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.saturday.id}`)" >{{plannedWorkouts.saturday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.saturday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearSaturday"
                                    ></v-select>
                                </div>

                            </v-card-text>
                        </v-card>
                    </v-col>
                    <v-col cols="3">
                        <v-card>
                            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;">Niedziela</v-card-title>
                            <v-card-text class="pt-3">
                                <div v-if="plannedWorkouts.sunday === null">
                                    <h4 v-if="!isEditting">Wolne/Brak</h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="editedPlan.sunday"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearSunday"
                                    ></v-select>
                                </div>
                                <div v-else>
                                    <h4 v-if="!isEditting" ><a @click="$router.push(`/Workout/${plannedWorkouts.sunday.id}`)" >{{plannedWorkouts.sunday.title }}</a></h4>
                                    <v-select v-if="userWorkouts != null & isEditting"
                                              v-model="plannedWorkouts.sunday.id"
                                              :items="userWorkouts"
                                              item-text="title"
                                              item-value="id"
                                              label="Wybierz plan treningowy dla tego dnia ..."
                                              :clearable=true
                                              @click:clear="clearSunday"
                                    ></v-select>
                                </div>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions v-if="isEditting">
                <v-btn outlined @click="cancelEditing">Anuluj</v-btn>
                <v-spacer></v-spacer>
                <v-btn outlined @click="saveEditedPlanner">Aktualizuj plan</v-btn>
            </v-card-actions>
        </v-card>

    </div>
</template>

<script>
export default {
    name: "Planner",
    data(){
        return{
            plannedWorkouts:null,
            isEditting:false,
            userWorkouts:null,
            editedPlan:{
                monday:null,
                tuesday:null,
                wednesday:null,
                thursday:null,
                friday:null,
                saturday:null,
                sunday:null
            }
        }},

    methods: {
        clearMonday(){
            this.editedPlan.monday = null;
        },
        clearTuesday(){
            this.editedPlan.tuesday = null;
        },
        clearWednesday(){
            this.editedPlan.wednesday = null;
        },
        clearThursday(){
            this.editedPlan.thursday = null;
        },
        clearFriday(){
            this.editedPlan.friday = null;
        },
        clearSaturday(){
            this.editedPlan.saturday = null;
        },
        clearSunday(){
            this.editedPlan.sunday = null;
        },
        cancelEditing(){
          this.isEditting = false;
        },
        editPlan(){
            this.isEditting = true;
            this.editedPlan.monday = this.plannedWorkouts.monday ? this.plannedWorkouts.monday.id : null;
            this.editedPlan.tuesday = this.plannedWorkouts.tuesday ? this.plannedWorkouts.tuesday.id : null;
            this.editedPlan.wednesday = this.plannedWorkouts.wednesday ? this.plannedWorkouts.wednesday.id : null;
            this.editedPlan.thursday = this.plannedWorkouts.thursday ? this.plannedWorkouts.thursday.id : null;
            this.editedPlan.friday = this.plannedWorkouts.friday ? this.plannedWorkouts.friday.id : null;
            this.editedPlan.saturday = this.plannedWorkouts.saturday ? this.plannedWorkouts.saturday.id : null;
            this.editedPlan.sunday = this.plannedWorkouts.sunday ? this.plannedWorkouts.sunday.id : null;
        },
        async saveEditedPlanner(){
              const res = await this.callApi('post','/editPlanner',this.editedPlan);
              if(res.status === 200){
                  this.$toast.success('Pomyślnie edytowano',{timeout:2000});
                  setTimeout(()=>{ this.$router.go() }, 2000);
              }
        },
    },
    computed: {

    },
    async created(){
        const [plan,workouts] = await Promise.all ([
            this.callApi('get','getPlanedWorkouts'),
            this.callApi('get','/getUserWorkouts')
        ]);
        if(plan.status === 200){
            this.plannedWorkouts = plan.data[0];
            console.log(this.plannedWorkouts)
        }else{
            this.$toast.error('Nie udało się pobrać rozpiski tygodniowej...')
        }
        if(workouts.status === 200){
            this.userWorkouts = workouts.data;
        }else{
            this.$toast.error('Nie udało się pobrać planów treningowych...')
        }
    },
}
</script>

<style scoped>

</style>
