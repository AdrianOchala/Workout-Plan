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
        </v-card-actions>
    </v-card>
</template>
<script>
export default {
    props: ['article'],
    name: "ArticleCard",
    data(){
        return{

        }
    },
}
</script>

