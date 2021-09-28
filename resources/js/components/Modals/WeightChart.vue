<template>
    <v-card v-if="isData">
        <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" >Waga</v-card-title>
        <v-card-text class="pt-3" >
            <line-chart :data="charData" ></line-chart>

        </v-card-text>
        <v-card-actions>

        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    name: "WeightChart",
    data(){
        return{
            charData: [],
            stats:null,
            isData:false,
        }
    },
    async created(){
        const res = await this.callApi('get','getUserWeight');
        if(res.status === 200){
            this.stats = res.data;
            for(let i =0; i < this.stats.length; i++){
                this.charData.push([JSON.stringify(this.stats[i].date), this.stats[i].weight] );
                this.isData = true;
            }
        }else{
            this.$toast.error('Nie udało się pobrać danych odnośnie wagi...');
        }
    }
}
</script>

<style scoped>

</style>
