<template>
    <v-card class="mt-2 mb-12">
        <v-img height="250" src="https://cdn.vuetifyjs.com/images/cards/cooking.png"></v-img>
        <v-card-title>{{ article.title }}</v-card-title>
        <v-card-text>
                <div class="grey--text">
                    {{ article.date }}
                </div>
            <div class="my-4 text-subtitle-1" v-if="article.author.showUserName">
                {{article.author.name}} {{article.author.surname}}
            </div>
            <div class="my-4 text-subtitle-1" v-else>
                {{article.author.nick}}
            </div>
            <div>{{ article.description }}</div>
        </v-card-text>
        <v-divider class="mx-4"></v-divider>
        <v-card-text>
            <v-chip-group active-class="deep-purple accent-4 white--text" column>
                <v-chip v-for="(cat,index) in article.categories" :key="index"
                        class="ma-2"
                        color="green"
                        text-color="white"
                >
                    {{cat.name}}
                </v-chip>
            </v-chip-group>
        </v-card-text>
        <v-card-actions>
            <v-btn color="deep-purple lighten-2" text class="mx-auto" @click="$router.push(`/SingleArticle/${article.id}`)">
                Przejdź
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn v-if="article.author.id === getUser.id" color="deep-purple lighten-2" text class="mx-auto"
                   @click="$router.push(`/EditArticle/${article.id}`)">
                Edytuj
            </v-btn>
            <v-spacer></v-spacer>
            <v-btn v-if="article.author.id === getUser.id" color="red" text class="mx-auto"
                   @click="deleteArticle(article)">
                Usuń
            </v-btn>
        </v-card-actions>

        <v-dialog v-model="getDeleteModalData.showDeleteModal" persistent width="700px">
            <delete-modal>
                <h4 slot="header">Czy na pewno chcesz usunąć ten artykuł?</h4>
            </delete-modal>
        </v-dialog>
    </v-card>
</template>
<script>
import {mapGetters} from "vuex";
import deleteModal from '../Modals/DeleteModalComponent';

export default {
    props: ['article','index'],
    components:{deleteModal},
    name: "ArticleCard",
    data(){
        return{

        }
    },
    methods:{
        deleteArticle(article){
            const deleteModalData = {
                showDeleteModal: true,
                deleteUrl: "/deleteArticle",
                data: article,
                deletingIndex: this.index,
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

