<template>
    <div class="container-fluid" v-if="workout != null">
        <v-card v-if="workout != null">
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                {{ workout.title }} (<v-rating :value="workout.rating"
                                               color="yellow darken-3"
                                               background-color="grey darken-1"
                                               empty-icon="$ratingFull"
                                               small
                                               half-increments
            ></v-rating>)
                <v-spacer></v-spacer>

                <v-btn v-if="workout.author.id === getUser.id" @click="$router.push(`/EditWorkout/${workout.id}`)">Edytuj plan treningowy</v-btn>
                <div v-else>
                    <v-btn v-if="!userLike" @click="likeWorkout">{{workout.likes}}&nbsp;<v-icon>mdi-thumb-up-outline</v-icon></v-btn>
                    <v-btn v-else @click="unlikeWorkout">{{workout.likes}}&nbsp;<v-icon>mdi-thumb-down-outline</v-icon></v-btn>
                    <v-btn v-if="!userFollow" @click="followWorkout">{{workout.follows}}&nbsp;<v-icon>mdi-heart-plus-outline</v-icon></v-btn>
                    <v-btn v-else  @click="unfollowWorkout">{{workout.follows}}&nbsp;<v-icon>mdi-cards-heart</v-icon></v-btn>
                </div>
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
                                        <strong > Poziom trudności:
                                            <v-rating :value="ex.exercise.difficulty"
                                                      color="yellow darken-3"
                                                      background-color="grey darken-1"
                                                      empty-icon="$ratingFull"
                                                      small
                                                      half-increments
                                                      length="3"
                                            ></v-rating>
                                        </strong>
                                    </v-col>

                                    <v-col
                                        class="text-no-wrap text-truncate"
                                        lg="4"
                                        sm="4"
                                    >
                                        <strong v-html="ex.exercise.name"></strong>
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
                                    {{ex.exercise.description}}

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
import {mapGetters} from "vuex";
export default {
    name: "Workout",
    components:{Comments},
    data(){
        return{
            workout:null,
            userLike:false,
            userFollow:false,
        }
    },
    methods:{
        async likeWorkout(){
            const res = await this.callApi('get',`/likeWorkout/${this.workout.id}`);
            if(res.status === 201){
                this.workout.likes++;
                this.userLike = true;
                this.$toast.success('Zalajkowałeś/łaś ten plan treningowy!');
            }else{
                this.$toast.error('Nie udało Ci się zalajkować tego planu...');
            }
        },
        async unlikeWorkout(){
            const res = await this.callApi('get',`/unlikeWorkout/${this.workout.id}`);
            if(res.status === 201){
                this.workout.likes--;
                this.userLike = false;
                this.$toast.success('Odlubiłeś/łaś ten plan treningowy!');
            }else{
                this.$toast.error('Nie udało Ci się odlajkować tego planu...');
            }
        },
        async followWorkout(){
            const res = await this.callApi('get',`/followWorkout/${this.workout.id}`);
            if(res.status === 201){
                this.workout.follows++;
                this.userFollow = true;
                this.$toast.success('Obserwujesz ten plan treningowy!');
            }else{
                this.$toast.error('Nie udało Ci się dodać do obserwowanych tego planu...');
            }
        },
        async unfollowWorkout(){
            const res = await this.callApi('get',`/unfollowWorkout/${this.workout.id}`);
            if(res.status === 201){
                this.workout.follows--;
                this.userFollow = false;
                this.$toast.success('Nie obserwujesz już tego planu treningowego!');
            }else{
                this.$toast.error('Nie udało Ci się przestać obserwować ten plan...');
            }
        },
    },
    async created() {
        const id = parseInt(this.$route.params.id);
        const response = await this.callApi('get',`/getWorkout/${id}`);
        if(response.status === 200){
            this.workout = response.data[0].[0];
            this.workout.plan = JSON.parse(response.data[0].[0].plan);
            this.userLike = response.data[1];
            this.userFollow = response.data[2];
        }else{
            this.$toast.error('Problem z pobraniem planu treningowego!');
        }
    },
    computed:{
        ...mapGetters(['getUser']),
    },
}
</script>

<style scoped>

</style>
