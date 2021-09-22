<template>
    <v-card
        class="mx-auto"
        max-width="344"
        min-height="300"
    >
        <v-card-text>
            <p class="text-h4 text--primary">
                {{ workout.title }}
            </p>
            <p v-if="workout.author.showUserName">{{ workout.author.name }} {{workout.author.surname}}</p>
            <p v-else>{{ workout.author.nick }}</p>
            <div class="text--primary">
                {{ workout.description}}
            </div>
        </v-card-text>
        <v-card-actions>
            <v-btn
                text
                color="deep-purple accent-4"
            >
                Przejdź
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    props:['workout'],
    name: "WorkoutCard"
}
</script>

<style scoped>

</style>
