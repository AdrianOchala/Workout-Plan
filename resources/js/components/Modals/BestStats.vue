<template>
    <v-card>
        <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" >Maxy</v-card-title>
        <v-card-text class="pt-3" >
            <h6>Pamiętaj o uzupełnieniu swoich statystyk dla lepszego śledzenia postępów.</h6>

            <p v-if="maxes" v-for="(m,index) in maxes" :key="index">
                {{m.name}} : {{m.weights}} kg
            </p>
        </v-card-text>
        <v-card-actions>
        </v-card-actions>
    </v-card>
</template>

<script>
export default {
    name: "BestStats",
    data(){
        return{
            stats:null,
            maxes:[],
            e:{
                id:null
            }
        }
    },
    methods:{
        countMax(){
            for(let i = 0; i < this.stats.length; i++){
                this.stats[i].content = JSON.parse(this.stats[i].content);
                for(let j = 0; j < this.stats[i].content.length; j++){
                    const isThere = this.maxes.find( ({id})=>id === this.stats[i].content[j].exercise.id );
                        if(isThere){
                            const index = this.maxes.findIndex(ex => ex === isThere);
                            for(let k = 0; k<this.stats[i].content[j].weights.length;k++){
                                if(parseInt(isThere.weights) < parseInt(this.stats[i].content[j].weights[k])){
                                    this.maxes[index].weights = this.stats[i].content[j].weights[k];
                                }
                            }
                        }else{
                            this.maxes.push({id:this.stats[i].content[j].exercise.id,
                                            name:this.stats[i].content[j].exercise.name,
                                            weights:0});
                            const isThere = this.maxes.find( ({id})=>id === this.stats[i].content[j].exercise.id );
                            if(isThere) {
                                const index = this.maxes.findIndex(ex => ex === isThere);
                                for (let k = 0; k < this.stats[i].content[j].weights.length; k++) {
                                    if(parseInt(isThere.weights) < parseInt(this.stats[i].content[j].weights[k])){
                                        this.maxes[index].weights = this.stats[i].content[j].weights[k];
                                    }
                                }
                            }
                        }
                }
            }
        },
    },
    async created() {
        const res = await this.callApi('get','getUserStats');
        if(res.status === 200){
            this.stats = res.data;
            this.countMax();
        }else{
            this.$toast.error('Problem z pobraniem statystyk...')
        }
    }
}
</script>

<style scoped>

</style>
