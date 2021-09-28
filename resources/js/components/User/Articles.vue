<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                <h3>Artykuły</h3>
                <v-btn-toggle dark v-model="articleType">
                    <v-btn outlined value="all">Wszystkie</v-btn>
                    <v-btn outlined value="own">Własne</v-btn>
                </v-btn-toggle>
                <v-spacer></v-spacer>
                <v-btn @click="$router.push(`/AddArticle`)">Dodaj artykuł</v-btn>
            </v-card-title>
            <v-card-text>
                <v-row>
                    <v-col cols="12" lg="12">
                        <v-divider></v-divider>
                        <v-row>
                            <v-col lg="3" md="6" sm="12" xs="12" v-for="(article, index) in articles" :key="article.id">
                                <ArticleCard :article="article" :index="index"></ArticleCard>
                            </v-col>
                        </v-row>
                        <v-divider></v-divider>
                        <div v-if="articleType === 'all'">
                            <v-pagination v-if="paginationInfo"
                                          :value="paginationInfo.current_page"
                                          :length="paginationInfo.total"
                                          @input="getArticlesForPagination"
                            ></v-pagination>
                        </div>
                        <div v-if="articleType === 'own'">
                            <v-pagination v-if="paginationInfo"
                                          :value="paginationInfo.current_page"
                                          :length="paginationInfo.total"
                                          @input="getUserArticlesForPagination"
                            ></v-pagination>
                        </div>

                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>

    </div>
</template>

<script>
import ArticleCard from '../Modals/ArticleCard';
export default {
    name: "Articles",
    components:{ArticleCard},
    data(){
        return{
            articleType:'all',
            articles:null,
            total:12,
            paginationInfo:{
                current_page:0,
                total:0
            },
        }
    },
    methods:{
        async getArticlesForPagination(page = 1){
            const response = await this.callApi('get',`/getArticlesForPagination/?page=${page}&total=${this.total}`);
            if(response.status ===200){
                this.articles = response.data.data;
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;
            }
        },
        async getUserArticlesForPagination(page = 1){
            const response = await this.callApi('get',`/getUserArticlesForPagination/?page=${page}&total=${this.total}`);
            if(response.status ===200){
                this.articles = response.data.data;
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;
                console.log(this.articles)
            }
        },
    },
    created() {
            this.getArticlesForPagination();
    },
    watch:{
        articleType(type){
            if(type === 'all'){
                this.getArticlesForPagination();
            }else if(type === 'own'){
                this.getUserArticlesForPagination();
            }
        }
    },
}
</script>

<style scoped>

</style>
