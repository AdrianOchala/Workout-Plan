<template>
    <div class="container-fluid" v-if="article != null">
        {{ this.article.title }}
        <div class="ck-content" v-if="article != null" v-html="article.content"></div>

        <Comments :target-id="article.id" target="comments" />


    </div>
</template>

<script>
import Comments from "../Modals/CommentsComponent";
export default {
    name: "SingleArticle",
    components:{Comments},
    data(){
        return{
            article:null,
        }
    },
    async created() {
        const id = parseInt(this.$route.params.id);
        const response = await this.callApi('get',`/getArticle/${id}`);
        if(response.status === 200){
            this.article = response.data[0];
        }else{
            this.$toast.error('Problem z pobraniem artykułów!');
        }
    },
}
</script>

<style lang="scss">
@import "resources/sass/article.scss";
</style>
