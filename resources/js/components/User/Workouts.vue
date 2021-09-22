<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                Twoje plany treningowe
                <v-spacer></v-spacer>
                <v-btn @click="$router.push(`/AddWorkout`)">Dodaj plan treningowy</v-btn>
            </v-card-title>
            <v-card-text>


            </v-card-text>
        </v-card>
        <v-card class="mt-6">
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">
                Publiczne plany treningowe użytkowników
                <v-spacer></v-spacer>

            </v-card-title>
            <v-card-text>


            </v-card-text>
        </v-card>
    </div>
</template>

<script>
export default {
    name: "Workouts"
}
</script>

<style scoped>

</style>
