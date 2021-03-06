<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                <h3 v-if="editing">Edycja artykułu</h3>
                <h3 v-else>Tworzenie nowego artykułu</h3>
            </v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12" lg="7" sm="12">
                        <v-text-field v-model="article.title" label="Podaj tytuł artykułu*"
                                      :error-messages="articleTitleErrors"
                                      @input="$v.article.title.$touch()"
                                      @blur="$v.article.title.$touch()"
                        ></v-text-field>
                    </v-col>
                    <v-col cols="12" lg="7" sm="12">
                        <v-select v-model="article.category"
                                  :items="articleCategories"
                                  item-text="name"
                                  item-value="id"
                                  label="Wybierz kategorię dla artykułu*"
                                  multiple
                                  :error-messages="articleCategoryErrors"
                                  @input="$v.article.category.$touch()"
                                  @blur="$v.article.category.$touch()"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" lg="7" sm="12">
                        <v-select v-if="userWorkouts != null"
                                  v-model="article.workout"
                                  :items="userWorkouts"
                                  item-text="title"
                                  item-value="id"
                                  label="Jeśli artykuł dotyczy jednego z twoich planów, proszę wybierz go*"
                        ></v-select>
                    </v-col>
                    <v-col cols="12" lg="7" sm="12">
                        <v-textarea
                            clearable
                            counter
                            clear-icon="mdi-close-circle"
                            label="Krótki opis wyświetlany w miniaturze..."
                            v-model="article.description"
                            hint="Max 250 znaków"
                            filled
                            auto-grow
                            rows="2"
                            :error-messages="articleDescriptionErrors"
                            @input="$v.article.description.$touch()"
                            @blur="$v.article.description.$touch()"
                        ></v-textarea>
                    </v-col>
                </v-row>
                <ckeditor :editor="editor" v-model="article.content" :config="editorConfig" :error-messages="articleContentErrors"
                          @input="$v.article.content.$touch()"
                          @blur="$v.article.content.$touch()"></ckeditor>
                <v-row justify="space-around">
                        <v-btn v-if="editing" outlined @click="editArticle" class="mt-4":disabled="$v.article.$invalid" >Edytuj artykuł</v-btn>
                        <v-btn v-else outlined @click="addArticle" class="mt-4" :disabled="$v.article.$invalid">Dodaj artykuł</v-btn>
                </v-row>
            </v-card-text>
        </v-card>
    </div>
</template>

<script>
import CKEditor from '@ckeditor/ckeditor5-vue2';
import Editor from '@heaglock/custom-classic-ckeditor5';
import {required, minLength, sameAs,email,numeric} from 'vuelidate/lib/validators';

export default {
    name: "AddArticle",
    components:{
      ckeditor: CKEditor.component
    },
    data(){
        return{
            article:{
                id:null,
                title:'',
                category:[],
                workout:null,
                content:'<p>Tu wpisz treść artykułu.</p>',
                description:null,
            },
            articleCategories:null,
            userWorkouts:null,
            editing:false,
            editor: Editor,
            editorConfig: {
                // The configuration of the editor.
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'fontFamily',
                        'fontSize',
                        'fontColor',
                        'fontBackgroundColor',
                        'highlight',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'alignment',
                        'outdent',
                        'indent',
                        '|',
                        'imageUpload',
                        'blockQuote',
                        'insertTable',
                        'mediaEmbed',
                        'horizontalLine',
                        '|',
                        'undo',
                        'redo'
                    ]
                },
                language: 'pl',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side',
                        'linkImage'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells',
                        'tableCellProperties',
                        'tableProperties'
                    ]
                },
                simpleUpload: {
                    // The URL that the images are uploaded to.
                    //uploadUrl: '/image/send',

                    // Enable the XMLHttpRequest.withCredentials property.
                    //withCredentials: false,

                    // Headers sent along with the XMLHttpRequest to the upload server.
                }
            },
            // rules: [v => v.length <= 250 || 'Max 250 znaków'],

        }},
    validations:{
        article:{
            title:{required,minLength:minLength(3),},
            category:{required},
            content:{required,minLength:minLength(3),},
            description:{required,minLength:minLength(3),},
        }
    },
    methods: {
        async addArticle(){
            const res = await this.callApi('post','addArticle',this.article);
            if(res.status === 200){
                this.$toast.success('Pomyślnie dodano artykuł',{timeout:3000});
                setTimeout(()=>{ this.$router.push({name:'Articles'}) }, 3000);
            }else{
                this.$toast.error('Coś poszło nie tak :(');
            }
        },
        async editArticle(){
            const res = await this.callApi('post','/editArticle',this.article);
            if(res.status === 200){
                this.$toast.success('Pomyślnie edytowano artykuł',{timeout:3000});
                setTimeout(()=>{ this.$router.push({name:'Articles'}) }, 3000);
            }else{
                this.$toast.error('Coś poszło nie tak :(');
            }
        },
    },
    async created(){
        const [categories,workouts] = await Promise.all([
            this.callApi('get','/getArticleCategories'),
            this.callApi('get', '/getUserWorkouts'),
        ]);
        if(categories.status === 200){
            this.articleCategories = categories.data;
        }else{
            this.$toast.error('Nie udało się pobrać kategorii artykułu. Proszę odświeżyć stronę!',{timeout:5000});
        }
        if(workouts.status === 200){
            if(workouts.data[0]){
                this.userWorkouts = workouts.data;
            }
        }else{
            this.$toast.error('Nie udało się pobrać planów treningowych użytkownika. Proszę odświeżyć stronę!',{timeout:5000});
        }
       this.article.id = parseInt(this.$route.params.id);
        if(this.article.id){
            this.editing = true;
            const response = await this.callApi('get',`/getArticle/${this.article.id}`);
            if(response.status === 200){
                this.article.title = response.data[0].title;
                for(let i = 0; i<response.data[0].categories.length; i++){
                    this.article.category[i] = response.data[0].categories[i].id;
                }
                if(response.data[0].workout){
                    this.article.workout = response.data[0].workout.id;

                }
                this.article.content = response.data[0].content;
                this.article.description = response.data[0].description;
            }else{
                this.$toast.error('Problem z pobraniem artykułów!');
            }
        }
    },
    computed:{
        articleTitleErrors(){
            const errors = [];
            if (!this.$v.article.title.$dirty) return errors;
            !this.$v.article.title.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.article.title.required && errors.push('Tytuł jest wymagany.');
            return errors;
        },
        articleDescriptionErrors(){
            const errors = [];
            if (!this.$v.article.description.$dirty) return errors;
            !this.$v.article.description.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.article.description.required && errors.push('Opis jest wymagany.');
            return errors;
        },
        articleCategoryErrors(){
            const errors = [];
            if (!this.$v.article.category.$dirty) return errors;
            !this.$v.article.category.required && errors.push('Przynajmniej jedna kategoria jest wymagana.');
            return errors;
        },
        articleContentErrors(){
            const errors = [];
            if (!this.$v.article.content.$dirty) return errors;
            !this.$v.article.content.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.article.content.required && errors.push('Treść artykułu jest wymagana.');
            return errors;
        },
    },
}
</script>

<style scoped>

</style>
