<template>
    <v-card class="mx-auto" max-width="344">
        <v-card-text>
            <p class="text-h4 text--primary">
                {{ workout.title }}
            </p>
            <p><v-rating :value="workout.rating"
                         color="yellow darken-3"
                         background-color="grey darken-1"
                         empty-icon="$ratingFull"
                         small
                         half-increments
            ></v-rating></p>
            <p v-if="workout.author.showUserName">Autor: {{ workout.author.name }} {{workout.author.surname}}</p>
            <p v-else>Autor: {{ workout.author.nick }}</p>
            <div class="text--primary">
                <p class="text-h5">Opis:</p>
                {{ workout.description}}
            </div>
        </v-card-text>
        <v-card-actions>
            <v-btn text color="deep-purple accent-4" @click="$router.push(`/Workout/${workout.id}`)">
                Przejdź
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn v-if="workout.author.id === getUser.id" color="red" text class="mx-auto" @click="deleteWorkout()">
                Usuń
            </v-btn>
        </v-card-actions>

        <v-dialog v-model="getDeleteModalData.showDeleteModal" persistent width="700px">
            <delete-modal>
                <h4 slot="header">Czy na pewno chcesz usunąć ten plan treningowy?</h4>
            </delete-modal>
        </v-dialog>
    </v-card>
</template>

<script>
import {mapGetters} from "vuex";
import deleteModal from '../Modals/DeleteModalComponent';
export default {
    props:['workout'],
    components:{deleteModal},
    name: "WorkoutCard",
    methods:{
        deleteWorkout(){
            const deleteModalData = {
                showDeleteModal: true,
                deleteUrl: "/deleteWorkout",
                data: this.workout,
                deletingIndex: 0,
                isDeleted: false,
            };
            this.$store.commit('setDeletingModalData', deleteModalData);
        },
    },
    computed:{
        ...mapGetters(['getDeleteModalData','getUser']),
    },
    watch:{
        getDeleteModalData(obj){
            if(obj.isDeleted){
                setTimeout(()=>{ this.$router.go(); }, 1500);
            }
        }
    },

}
</script>

<style lang="scss" scoped>

</style>
