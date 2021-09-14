<template>
    <div class="container-fluid">
        <v-btn @click="$router.push(`/AddArticle`)">Dodaj artykuł</v-btn>

    </div>
</template>

<script>
export default {
    name: "Articles",
    methods:{
        addNewArticle(){

        },
    },
}
</script>

<style scoped>

</style>
