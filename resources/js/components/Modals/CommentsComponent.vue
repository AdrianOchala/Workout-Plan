<template>
    <div class="container-fluid">
        <v-col lg="12">
            <v-card>
                <v-list-item>
                    <v-list-item-avatar color="grey"><v-icon>mdi-star-half-full</v-icon></v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title class="headline">Komentarze</v-list-item-title>
                        <v-rating v-if="target === 'opinions'"
                            :value="commentsOrRating"
                            color="yellow darken-3"
                            background-color="grey darken-1"
                            empty-icon="$ratingFull"
                            medium
                            half-increments
                        ></v-rating>
                        ({{commentsOrRating}})
                    </v-list-item-content>
                </v-list-item>
                <v-divider></v-divider>
                <!--                    Ciało komentarzy-->
                <v-list-item-content>
                    <h3 class="justify-center d-flex" v-if="!comments">Brak komentarzy</h3>
                    <v-card v-else>
                        <v-list two-line>
                            <v-list-item-group>
                                <template v-for="(c, index) in comments">
                                    <v-list-item>
                                        <template>
                                            <v-list-item-content>
                                                <v-list-item-title v-if="c.author.showUserName">{{c.author.name}} {{c.author.surname}}</v-list-item-title>
                                                <v-list-item-title v-if="!c.author.showUserName">{{c.author.nick}}</v-list-item-title>
                                                <v-list-item-title v-if="!c.author">Użytkownik usunięty</v-list-item-title>
                                                <v-list-item-subtitle>{{c.content}}</v-list-item-subtitle>
                                            </v-list-item-content>
                                            <v-list-item-action>
                                                <v-list-item-action-text>{{ c.date }}</v-list-item-action-text>
                                                <v-rating v-if="target === 'opinions'"
                                                    v-model="c.mark"
                                                    color="yellow darken-3"
                                                    background-color="grey darken-1"
                                                    empty-icon="$ratingFull"
                                                    half-increments
                                                    hover
                                                    medium
                                                    readonly
                                                ></v-rating>
                                                <div v-if="target === 'comments'">
                                                    <v-btn v-if="getUser.id === c.author.id" outlined small @click="deleteComment(c.id)">Usuń komentarz</v-btn>
                                                    <v-btn v-else outlined color="red" small @click="reportComment(c.id)">Zgłoś</v-btn>
                                                </div>
                                                <div v-if="target === 'opinions'">
                                                    <v-btn v-if="getUser.id === c.author.id" outlined small @click="deleteOpinion(c.id)">Usuń opinię</v-btn>
                                                    <v-btn v-else outlined color="red" small @click="reportOpinion(c.id)">Zgłoś</v-btn>
                                                </div>
                                            </v-list-item-action>
                                        </template>
                                    </v-list-item>
                                    <v-divider v-if="index < comments.length - 1">
                                    </v-divider>
                                </template>
                                <v-divider></v-divider>
                                <v-pagination v-if="paginationInfo"
                                              :value="paginationInfo.current_page"
                                              :length="paginationInfo.total"
                                              @input="getCommentsForPagination"
                                ></v-pagination>
                            </v-list-item-group>
                        </v-list>
                    </v-card>
                </v-list-item-content>
                <v-divider></v-divider>
                <!--                koniec komentarzy-->
                <!--                Dodaj swój komentarz-->
                <template>
                    <div class="text-center">
                        <h3>Dodaj swój komentarz</h3>
                        <v-rating v-if="target === 'opinions'"
                            v-model="comment.rating"
                            color="yellow darken-3"
                            background-color="grey darken-1"
                            empty-icon="$ratingFull"
                            half-increments
                            hover
                            medium
                            :error-messages="addRatingErrors"
                            @input="$v.comment.rating.$touch()"
                            @blur="$v.comment.rating.$touch()"
                        ></v-rating>
                    </div>
                    <v-container fluid class="pt-1">
                        <v-textarea
                            clearable
                            counter
                            clear-icon="mdi-close-circle"
                            label="Komentarz"
                            v-model="comment.comment"
                            hint="Max 250 znaków"
                            :rules="rules"
                            filled
                            auto-grow
                            background-color="#CFD8DC"
                            rows="1"
                            :error-messages="addCommentErrors"
                            @input="$v.comment.comment.$touch()"
                            @blur="$v.comment.comment.$touch()"
                        ></v-textarea>
                    </v-container>
                    <div class="container-fluid commentButton">
                        <v-btn class="mb-3" @click="addComment" :disabled="$v.comment.$invalid">Dodaj!</v-btn>
                    </div>
                </template>
            </v-card>
        </v-col>

        <v-dialog v-model="getReportComponent.showReportComponent" persistent width="700px">
            <report-component>

            </report-component>
        </v-dialog>

    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {required, minLength,maxLength,between,numeric} from 'vuelidate/lib/validators';
import reportComponent from '../Modals/ReportComponent';
export default {
    props:['targetId','target'],
    components:{reportComponent},
    name: "CommentsComponent",
    data(){
        return{
            commentsOrRating:0,
            comments:null, //Komentarze do warsztatu
            commentsDate:'', //Daty przekształcone na odpowiednią wartość
            comment:{
                targetId: this.targetId,
                authorId:this.$store.state.user.id,
                comment:'',
                rating:null,
            },
            rules: [v => v.length <= 250 || 'Max 250 characters'],
            total:4,
            paginationInfo:{
                current_page:0,
                total:0
            },
        }
    },
    validations:{
        comment:{
            comment:{
                required,
                maxLength:maxLength(250)
            },
        }
    },
    methods:{
        async addComment(){
            const res = await this.callApi('post','/addComment',this.comment);
            if(res.status === 201){
                this.$toast.success('Pomyślnie dodano komentarz');
                this.$router.go();
            }else{
                this.$toast.error('Nie udało się dodać komentarza, proszę spróbować później.')
            }
        },
        reportComment(id){
            const reportInfo = {
                showReportComponent:true,
                reportUrl:'/reportComment',
                targetIndex:id,
                reportObject: 'komentarz',
            };
            this.$store.commit('setReportComponent',reportInfo);
        },
        reportOpinion(id){
            const reportInfo = {
                showReportComponent:true,
                reportUrl:'/reportOpinion',
                targetIndex:id,
                reportObject: 'opinię',
            };
            this.$store.commit('setReportComponent',reportInfo);
        },
        deleteComment(id){

        },
        deleteOpinion(id){

        },
    },
    async created() {
        if(this.target === 'comments'){
            const res = await this.callApi('get',`/getArticleComments/${this.targetId}`);
            if(res.status === 200){
                this.comments = res.data;
                this.commentsOrRating = res.data.length;
            }else{
                this.$toast.error('Nie udało się pobrać komentarzy!');
            }
        }else if(this.target === 'opinions'){
            console.log("pobieram opinie")
        }else{
            this.$toast.error('Nie udało się pobrać opinii!');
        }



    },
    computed:{
        ...mapGetters(['getReportComponent','getUser']),
        addCommentErrors(){
            const errors = [];
            if (!this.$v.comment.comment.$dirty) return errors;
            !this.$v.comment.comment.required && errors.push('To pole jest wymagane.');
            !this.$v.comment.comment.maxLength && errors.push('Maksymalnie 250 znaków>.');
            return errors;
        },
        addRatingErrors(){
            const errors = [];
            if (!this.$v.comment.rating.$dirty) return errors;
            !this.$v.comment.rating.required && errors.push('To pole jest wymagane.');
            return errors;
        },
    },
}
</script>

<style scoped>

</style>
