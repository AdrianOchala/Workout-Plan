<template>
    <v-card class="mx-auto" max-width="344">
        <v-card-text>
            <p class="text-h4 text--primary">
                {{ workout.title }}
            </p>
            <p><v-rating :value="workout.rating"
                         color="yellow darken-3"
                         background-color="grey darken-1"
                         empty-icon="$ratingFull"
                         small
                         half-increments
            ></v-rating></p>
            <p v-if="workout.author.showUserName">Autor: {{ workout.author.name }} {{workout.author.surname}}</p>
            <p v-else>Autor: {{ workout.author.nick }}</p>
            <div class="text--primary">
                <p class="text-h5">Opis:</p>
                {{ workout.description}}
            </div>
        </v-card-text>
        <v-card-actions>
            <v-btn text color="deep-purple accent-4" @click="$router.push(`/Workout/${workout.id}`)">
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

<style lang="scss" scoped>

</style>
