<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                Plany treningowe: &nbsp;
                <v-btn-toggle dark v-model="planType">
                    <v-btn outlined value="own">Własne</v-btn>
                    <v-btn outlined value="follow">Obserwowane</v-btn>
                    <v-btn outlined value="public">Publiczne</v-btn>
                </v-btn-toggle>
                <v-spacer></v-spacer>
                <v-btn @click="$router.push(`/AddWorkout`)">Dodaj plan treningowy</v-btn>
            </v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12" lg="12">
                        <v-divider></v-divider>
                        <v-row>
                            <v-col lg="3" md="6" sm="12" xs="12" v-for="workout in workouts" :key="workout.id">
                                <WorkoutCard :workout="workout"></WorkoutCard>
                            </v-col>
                        </v-row>
                        <v-divider></v-divider>
                        <div v-if="planType === 'own'">
                            <v-pagination v-if="paginationInfo"
                                          :value="paginationInfo.current_page"
                                          :length="paginationInfo.total"
                                          @input="getUserWorkoutsForPagination"
                            ></v-pagination>
                        </div>
                        <div v-if="planType === 'follow'">
                            <v-pagination v-if="paginationInfo"
                                          :value="paginationInfo.current_page"
                                          :length="paginationInfo.total"
                                          @input="getUserFollowedWorkoutsForPagination"
                            ></v-pagination>
                        </div>
                        <div v-if="planType === 'public'">
                            <v-pagination v-if="paginationInfo"
                                          :value="paginationInfo.current_page"
                                          :length="paginationInfo.total"
                                          @input="getPublicWorkoutsForPagination"
                            ></v-pagination>
                        </div>
                    </v-col>
                </v-row>
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
            workouts:null,
            planType:'own',
            total:12,
            paginationInfo:{
                current_page:0,
                total:0
            },
        }
    },
    methods:{
        async getUserWorkoutsForPagination(page = 1){
            const response = await this.callApi('get',`/getUserWorkoutsForPagination/?page=${page}&total=${this.total}`);
            if(response.status === 200){
                this.workouts = response.data.data;
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;
            }
        },
        async getUserFollowedWorkoutsForPagination(page = 1){
            const response = await this.callApi('get',`/getUserFollowedWorkoutsForPagination/?page=${page}&total=${this.total}`);
            if(response.status === 200){
                this.workouts = response.data.data;
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;
            }
        },
        async getPublicWorkoutsForPagination(page = 1){
            const response = await this.callApi('get',`/getPublicWorkoutsForPagination/?page=${page}&total=${this.total}`);
            if(response.status === 200){
                this.workouts = response.data.data;
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;
            }
        },
    },
    async created() {
        this.getUserWorkoutsForPagination();
    },
    watch:{
        planType(type){
            if(type === 'own'){
                this.getUserWorkoutsForPagination();
            }else if(type === 'follow'){
                this.getUserFollowedWorkoutsForPagination();
            }else if(type === 'public'){
                this.getPublicWorkoutsForPagination();
            }
        }
    },
}
</script>

<style scoped>

</style>
