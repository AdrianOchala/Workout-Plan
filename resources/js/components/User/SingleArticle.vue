<template>
    <div class="container-fluid" v-if="article != null">
        <v-row>
            <v-col cols="12" >
                <h1>
                    {{article.title }}
                </h1>
                <h6><span v-for="(a,id) in article.categories"> | {{a.name}} </span>|</h6>
                <v-divider></v-divider>
                <h5 v-if="article.workout">Plan treningowy, o którym mowa w artykule: <a @click="$router.push(`/Workout/${article.workout.id}`)" > {{article.workout.title}}</a></h5>
                <v-divider></v-divider>
            </v-col>
        </v-row>
        <div class="ck-content" v-if="article != null" v-html="article.content"></div>
        <Comments :target-id="article.id" target="comments" :author="article.author.id" />
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
