<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" >
                Ćwiczenia:
                <v-btn-toggle dark v-model="exType">
                    <v-btn outlined value="all">Wszystkie</v-btn>
                    <v-btn outlined value="own">Własne</v-btn>
                </v-btn-toggle>
                <v-spacer></v-spacer>
                <v-btn @click="addingNewExercise = true">
                    Dodaj nowe ćwiczenie
                </v-btn>
            </v-card-title>
            <v-card-text class="pt-3" v-if="exType === 'all'">
                <v-row>
                <v-col cols="12" lg="6" sm="12" >
                    <v-select v-model="selectedEx"
                              :items="exercises"
                              item-text="name"
                              return-object
                              label="Wybierz ćwiczenie"
                    ></v-select>
                </v-col>
                <v-col cols="12" lg="6" sm="12" >
                    <p> Poziom trudności:
                    <v-rating v-if="selectedEx"
                        :value="selectedEx.difficulty"
                              color="yellow darken-3"
                              background-color="grey darken-1"
                              empty-icon="$ratingFull"
                              small
                              half-increments
                    ></v-rating>
                    </p>
                </v-col>
                <v-col cols="12" v-if="selectedEx">
                    <h4>Opis:</h4>
                    <p>{{selectedEx.description}}</p>
                </v-col>
                </v-row>
            </v-card-text>
            <v-card-text class="pt-3" v-if="exType === 'own'">
                <v-row>
                <v-col cols="12" lg="6" sm="12" >
                    <v-select v-model="selectedEx2"
                              :items="userExercises"
                              item-text="name"
                              return-object
                              label="Wybierz ćwiczenie"
                    ></v-select>
                </v-col>
                <v-col cols="12" lg="4" sm="8" v-if="selectedEx2">
                    <p>Poziom trudności:
                    <v-rating :value="selectedEx2.difficulty"
                              color="yellow darken-3"
                              background-color="grey darken-1"
                              empty-icon="$ratingFull"
                              small
                              half-increments
                    ></v-rating></p>
                </v-col>
                    <v-col cols="12" lg="2" sm="4" v-if="selectedEx2">
                        <v-btn outlined small @click="deleteExercise(selectedEx2)">Usuń ćwiczenie</v-btn>
                    </v-col>
                    <v-col cols="12" v-if="selectedEx2">
                        <h4>Opis:</h4>
                        <p>{{selectedEx2.description}}</p>
                    </v-col>
                </v-row>
            </v-card-text>
            <v-card-actions>

            </v-card-actions>
        </v-card>

        <v-dialog v-model="addingNewExercise" persistent width="70%">
            <v-card>
                <v-card-title class="justify-center text-danger">
                    <h4>Dodawanie nowego ćwiczenia</h4>
                </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" lg="9" sm="12">
                            <v-text-field v-model="newExercise.name" label="Podaj tytuł ćwiczenia"
                                          :error-messages="newExNameErrors"
                                          @input="$v.newExercise.name.$touch()"
                                          @blur="$v.newExercise.name.$touch()"
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
                                :error-messages="newExDescriptionErrors"
                                @input="$v.newExercise.description.$touch()"
                                @blur="$v.newExercise.description.$touch()"
                            ></v-textarea>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn text color="primary" @click="addingNewExercise = false">Anuluj</v-btn>
                    <v-btn text color="primary" @click="addNewExercise" :disabled="$v.newExercise.$invalid">Dodaj</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog v-model="getDeleteModalData.showDeleteModal" persistent width="700px">
            <delete-modal>
                <h4 slot="header" >Czy na pewno chcesz usunąć to ćwiczenie?</h4>
            </delete-modal>
        </v-dialog>
    </div>
</template>

<script>
import {mapGetters} from "vuex";
import deleteModal from '../Modals/DeleteModalComponent';
import {minLength, required} from "vuelidate/lib/validators";

export default {
    name: "Exercises",
    components:{ deleteModal},

    data(){
        return{
            exercises:null,
            userExercises:null,
            selectedEx:null,
            selectedEx2:null,
            exType:'own',
            addingNewExercise:false,
            newExercise:{
                name:'',
                description:'',
                difficulty:0,
            },
        }
    },
    validations:{
        newExercise:{
            name:{required,minLength:minLength(3)},
            description:{required,minLength:minLength(3)}
        }
    },
    methods:{
        async addNewExercise(){
            const res = await this.callApi('post','/addNewExercise',this.newExercise);
            if(res.status === 201){
                this.$toast.success('Pomyślnie dodano twoje ćwiczenie',{timeout:1500});
                this.addingNewExercise = false;
                this.newExercise.name = '';
                this.newExercise.description = '';
                this.newExercise.difficulty = 0;
                setTimeout(()=>{this.$router.go()},1500);
            }else{
                this.$toast.error('Nie udało się dodać ćwiczenia, proszę spróbować później...')
            }
        },
        deleteExercise(exercise){
            const deleteModalData = {
                showDeleteModal: true,
                deleteUrl: "/deleteExercise",
                data: exercise,
                deletingIndex: 0,
                isDeleted: false,
            };
            this.$store.commit('setDeletingModalData', deleteModalData);
        },
    },
    async created() {
        const [exercises, userExercises] = await Promise.all([
            this.callApi('get', '/getSystemExercises'),
            this.callApi('get', '/getUserExercises'),
        ]);
        if(exercises.status === 200){
            this.exercises = exercises.data
        }else{this.$toast.error('Problem z pobraniem ćwiczeń')}
        if(userExercises.status === 200){
            this.userExercises = userExercises.data;
        }else(this.$toast.error('Problem z pobraniem ćwiczeń użytkownika'))
    },
    computed: {
        ...mapGetters(['getDeleteModalData']),
        newExNameErrors(){
            const errors = [];
            if (!this.$v.newExercise.name.$dirty) return errors;
            !this.$v.newExercise.name.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.newExercise.name.required && errors.push('Nazwa ćwiczenia jest wymagana.');
            return errors;
        },
        newExDescriptionErrors(){
            const errors = [];
            if (!this.$v.newExercise.description.$dirty) return errors;
            !this.$v.newExercise.description.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.newExercise.description.required && errors.push('Opis ćwiczenia jest wymagany.');
            return errors;
        },
    },
    watch:{
        getDeleteModalData(obj){
            if(obj.isDeleted){
                this.$router.go();
            }
        }
    },

}
</script>

<style scoped>

</style>
