<template>
    <div class="container-fluid">
        <v-col lg="12">
            <v-card>
                <v-list-item>
                    <v-list-item-avatar color="grey"><v-icon>mdi-star-half-full</v-icon></v-list-item-avatar>
                    <v-list-item-content>
                        <v-list-item-title class="headline" v-if="target === 'comments'">Komentarze</v-list-item-title>
                        <v-list-item-title class="headline" v-if="target === 'opinions'">Opinie</v-list-item-title>
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
                    <h3 class="justify-center d-flex" v-if="commentsOrRating === 0 & target === 'comments'">Brak komentarzy</h3>
                    <h3 class="justify-center d-flex" v-if="commentsOrRating === 0 & target === 'opinions'">Brak opinii</h3>
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
                                                    <v-btn v-if="getUser.id === c.author.id" outlined small @click="deleteComment(c, index)">Usuń komentarz</v-btn>
                                                    <v-btn v-else outlined color="red" small @click="reportComment(c.id)">Zgłoś</v-btn>
                                                </div>
                                                <div v-if="target === 'opinions'">
                                                    <v-btn v-if="getUser.id === c.author.id" outlined small @click="deleteOpinion(c, index)">Usuń opinię</v-btn>
                                                    <v-btn v-else outlined color="red" small @click="reportOpinion(c.id)">Zgłoś</v-btn>
                                                </div>
                                            </v-list-item-action>
                                        </template>
                                    </v-list-item>
                                    <v-divider v-if="index < comments.length - 1">
                                    </v-divider>
                                </template>
                                <v-divider></v-divider>
                                <div v-if="target === 'comments'">
                                    <v-pagination v-if="paginationInfo"
                                                  :value="paginationInfo.current_page"
                                                  :length="paginationInfo.total"
                                                  @input="getCommentsForPagination"
                                    ></v-pagination>
                                </div>
                                <div v-if="target === 'opinions'">
                                    <v-pagination v-if="paginationInfo"
                                                  :value="paginationInfo.current_page"
                                                  :length="paginationInfo.total"
                                                  @input="getOpinionsForPagination"
                                    ></v-pagination>
                                </div>

                            </v-list-item-group>
                        </v-list>
                    </v-card>
                </v-list-item-content>
                <v-divider></v-divider>
                <!--                koniec komentarzy-->
                <!--                Dodaj swój komentarz-->
                <template v-if="author !== comment.authorId">
                    <div class="text-center">
                        <h3 v-if="target === 'comments'">Dodaj swój komentarz</h3>
                        <h3 v-if="target === 'opinions'">Dodaj swoją opinię</h3>
                        <v-rating v-if="target === 'opinions'"
                            v-model="comment.mark"
                            color="yellow darken-3"
                            background-color="grey darken-1"
                            empty-icon="$ratingFull"
                            half-increments
                            hover
                            medium
                            :error-messages="addRatingErrors"
                            @input="$v.comment.mark.$touch()"
                            @blur="$v.comment.mark.$touch()"
                        ></v-rating>
                    </div>
                    <v-container fluid class="pt-1">
                        <v-textarea v-if="target === 'comments'"
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
                        <v-textarea v-if="target === 'opinions'"
                                    clearable
                                    counter
                                    clear-icon="mdi-close-circle"
                                    label="Opinia"
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
                        <v-btn v-if="target === 'comments'" class="mb-3" @click="addComment" :disabled="$v.comment.$invalid">Dodaj!</v-btn>
                        <v-btn v-if="target === 'opinions'" class="mb-3" @click="addOpinion" :disabled="$v.comment.$invalid">Dodaj!</v-btn>
                    </div>
                </template>
            </v-card>
        </v-col>

        <v-dialog v-model="getReportComponent.showReportComponent" persistent width="700px">
            <report-component></report-component>
        </v-dialog>
        <v-dialog v-model="getDeleteModalData.showDeleteModal" persistent width="700px">
            <delete-modal>
                <h4 slot="header" v-if="target==='comments'">Czy na pewno chcesz usunąć swój komentarz?</h4>
                <h4 slot="header" v-if="target==='opinions'">Czy na pewno chcesz usunąć swoją opinię?</h4>
            </delete-modal>
        </v-dialog>

    </div>
</template>

<script>
import {mapGetters} from 'vuex';
import {required, minLength,maxLength,between,numeric} from 'vuelidate/lib/validators';
import reportComponent from '../Modals/ReportComponent';
import deleteModal from '../Modals/DeleteModalComponent';
export default {
    props:['targetId','target','author'],
    components:{reportComponent, deleteModal},
    name: "CommentsComponent",
    data(){
        return{
            commentsOrRating:0,
            comments:null, //Komentarze do warsztatu
            comment:{
                targetId: this.targetId,
                authorId:this.$store.state.user.id,
                comment:'',
                mark:null,
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
            mark:{
                required
            }
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
        async addOpinion(){
            console.log(this.comment)
            const res = await this.callApi('post','/addOpinion',this.comment);
            if(res.status === 201){
                this.$toast.success('Pomyślnie dodano opinię');
                this.$router.go();
            }else{
                this.$toast.error('Nie udało się dodać opinii, proszę spróbować później.')
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
        deleteComment(comment,index){
            const deleteModalData = {
                showDeleteModal: true,
                deleteUrl: "/deleteComment",
                data: comment,
                deletingIndex: index,
                isDeleted: false,
            };
            this.$store.commit('setDeletingModalData', deleteModalData);
        },
        deleteOpinion(opinion,index){
            const deleteModalData = {
                showDeleteModal: true,
                deleteUrl: "/deleteOpinion",
                data: opinion,
                deletingIndex: index,
                isDeleted: false,
            };
            this.$store.commit('setDeletingModalData', deleteModalData);
        },
        async getCommentsForPagination(page = 1){
            const response = await this.callApi('get',`/getArticleComments/${this.targetId}?page=${page}&total=${this.total}`);
            if(response.status ===200){
                this.comments = response.data[0].data;
                this.commentsOrRating = response.data[1];
                this.paginationInfo.current_page = response.data[0].current_page;
                this.paginationInfo.total = response.data[0].last_page;
                console.log('jestem')
                console.log(this.comments)
            }
        },
        async getOpinionsForPagination(page = 1){
            const response = await this.callApi('get',`/getWorkoutOpinions/${this.targetId}?page=${page}&total=${this.total}`);
            if(response.status ===200){
                this.comments = response.data.data;
                // this.commentsOrRating = response.data[1];
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;

                this.getWorkoutRating();

            }
        },
        async getWorkoutRating(){
            const response = await this.callApi('get',`/getWorkoutRatings/${this.targetId}`);
            if(response.status === 200){
                this.commentsOrRating = response.data[0];
            }else{
                this.$toast.error('Nie udało się pobrać średniej ocen dla planu treningowego!')
            }
        },
    },
    created() {
        if(this.target === 'comments'){
            this.getCommentsForPagination();
            this.comment.mark = 0;
        }else if(this.target === 'opinions'){
            this.getOpinionsForPagination();
            console.log("pobieram opinie")
        }else{
            this.$toast.error('Nie udało się pobrać komentarzy/opinii!');
        }
    },
    computed:{
        ...mapGetters(['getDeleteModalData','getReportComponent','getUser']),
        addCommentErrors(){
            const errors = [];
            if (!this.$v.comment.comment.$dirty) return errors;
            !this.$v.comment.comment.required && errors.push('To pole jest wymagane.');
            !this.$v.comment.comment.maxLength && errors.push('Maksymalnie 250 znaków>.');
            return errors;
        },
        addRatingErrors(){
            const errors = [];
            if (!this.$v.comment.mark.$dirty) return errors;
            !this.$v.comment.mark.required && errors.push('To pole jest wymagane.');
            return errors;
        },
    },
    watch:{
        getDeleteModalData(obj){
            if(obj.isDeleted){
                this.comments.splice(obj.deletingIndex, 1);
                if(this.target === 'comments'){
                    this.getCommentsForPagination();
                }else if(this.target === 'opinions'){
                    this.getOpinionsForPagination()
                }
            }else {

            }
        }
    },
}
</script>

<style scoped>

</style>
