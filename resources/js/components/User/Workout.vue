<template>
    <div class="container-fluid" v-if="workout != null">
        <v-card v-if="workout != null">
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                {{ workout.title }} (Ocena)
                <v-spacer></v-spacer>
                <v-btn >Edytuj plan treningowy</v-btn>
            </v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12" lg="6" sm="12" class="offset-lg-3">
                        <div style="background: rgba(0,0,0,0.2);" class="p-3 m-2">
                            <p>{{workout.type.name}}</p>
                            <p>Opis:</p>
                            <p>{{workout.description}}</p>
                        </div>
                    </v-col>
                </v-row>

                <v-expansion-panels popout>
                    <template v-for="(ex, index) in workout.plan">
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                <v-row align="center" class="spacer" no-gutters>
                                    <v-col lg="1" sm="1" md="1" class="hidden-sm-and-down">
                                        <v-chip
                                            class="ml-0 mr-2 black--text"
                                            label
                                            small
                                        >
                                            Ćwiczenie  {{ index + 1 }}
                                        </v-chip>
                                    </v-col>
                                    <v-col
                                        class="hidden-sm-and-down"
                                        sm="2"
                                        md="2"
                                    >
                                        <strong > Poziom trudności:</strong>
                                    </v-col>

                                    <v-col
                                        class="text-no-wrap text-truncate"
                                        lg="4"
                                        sm="4"
                                    >
                                        <strong v-html="ex.exercise"></strong>
                                    </v-col>
                                    <v-col
                                        class="text-no-wrap text-truncate"
                                        lg="2"
                                        sm="3"
                                    >
                                        <strong>Liczba serii: {{ex.series}}</strong>
                                    </v-col>
                                    <v-col
                                        class="text-no-wrap text-truncate"
                                        lg="2"
                                        sm="4"
                                    >
                                        <strong>Powtórzenia:</strong>
                                        <strong v-for="(rep,id) in ex.reps" :key="id"> - {{rep}}</strong>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-divider></v-divider>
                                <v-card-text>
                                    Opis ćwiczenia

                                </v-card-text>
                                <v-card-actions>

                                </v-card-actions>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </template>
                </v-expansion-panels>
            </v-card-text>
        </v-card>
        <Comments v-if="workout != null & workout.public" :target-id="workout.id" target="opinions" :author="workout.author.id" />
    </div>
</template>

<script>
import Comments from "../Modals/CommentsComponent";
export default {
    name: "Workout",
    components:{Comments},
    data(){
        return{
            workout:null,
        }
    },
    async created() {
        const id = parseInt(this.$route.params.id);
        const response = await this.callApi('get',`/getWorkout/${id}`);
        if(response.status === 200){
            this.workout = response.data[0];
            this.workout.plan = JSON.parse(response.data[0].plan);
            console.log(this.workout)
        }else{
            this.$toast.error('Problem z pobraniem planu treningowego!');
        }
    },
}
</script>

<style scoped>

</style>
