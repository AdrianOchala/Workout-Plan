<template>
    <div class="container-fluid">
        <v-btn @click="$router.push(`/AddArticle`)">Dodaj artykuł</v-btn>

        <v-row>
            <v-col cols="12" lg="12">
                <v-divider></v-divider>
                <v-row>
                    <v-col lg="3" md="6" sm="12" xs="12" v-for="article in articles" :key="article.id">
                        <ArticleCard :article="article"></ArticleCard>
                    </v-col>
                </v-row>
                <v-divider></v-divider>
                <v-pagination v-if="paginationInfo"
                              :value="paginationInfo.current_page"
                              :length="paginationInfo.total"
                              @input="getArticlesForPagination"
                ></v-pagination>
            </v-col>
        </v-row>

    </div>
</template>

<script>
import ArticleCard from '../Modals/ArticleCard';
export default {
    name: "Articles",
    components:{ArticleCard},
    data(){
        return{
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
                console.log(response)
                this.articles = response.data.data;
                // this.commentsOrRating = response.data[1];
                this.paginationInfo.current_page = response.data.current_page;
                this.paginationInfo.total = response.data.last_page;
                const stringArt = JSON.stringify(this.articles[11])
                console.log(stringArt)
            }
        },
    },
    created() {
            this.getArticlesForPagination();
    },
}
</script>

<style scoped>

</style>
