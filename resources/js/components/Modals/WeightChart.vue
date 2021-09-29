<template>
    <v-card v-if="isData">
        <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" >
            Waga
        <v-spacer></v-spacer>
            BMI: {{getUserBMI}}
        </v-card-title>
        <v-card-text class="pt-3" >
            <p v-if="getUserBMI < 18.5">Twoje BMI wskazuje na niedowagę.</p>
            <p v-if="18.6 < getUserBMI & getUserBMI < 24.9">Twoje BMI wskazuje na prawidłową wagę ciała.</p>
            <p v-if="25 < getUserBMI & getUserBMI < 29.9">Twoje BMI wskazuje na nadwagę.</p>
            <p v-if="getUserBMI > 29.9">Twoje BMI wskazuje na otyłość.</p>
            <p>Pamiętaj jednak, że BMI jest jedynie prostym wzorem matematycznym, stosunkiem wagi do wzrostu.
             Dla osób z dużą masą mięśniową wynik BMI przekłamuje.</p>

            <line-chart :data="charData" ></line-chart>

        </v-card-text>
        <v-card-actions>

        </v-card-actions>
    </v-card>
</template>

<script>
import {mapGetters} from "vuex";

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
    },
    computed:{
        ...mapGetters(['getUserBMI']),
    },
}
</script>

<style scoped>

</style>
