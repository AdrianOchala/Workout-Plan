<template>
    <div class="container-fluid" v-if="article != null">
        {{ this.article.title }}
        <div class="ck-content" v-if="article != null" v-html="article.content"></div>




    </div>
</template>

<script>
export default {
    name: "SingleArticle",
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
