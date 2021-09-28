<template>
    <div class="container-fluid">
        <v-card>
            <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white;" >Pomiary użytkownika
            <v-spacer></v-spacer>
                <v-btn @click="showAddModal = !showAddModal">Dodaj</v-btn>
            </v-card-title>
            <v-card-text class="pt-3">
                <v-expansion-panels popout v-if="measurments">
                    <template v-for="(m, index) in measurments">
                        <v-expansion-panel>
                            <v-expansion-panel-header>
                                <v-row align="center" class="spacer" no-gutters>
                                    <v-col class="text-no-wrap text-truncate" lg="12" sm="12">
                                        <strong>{{m.date}}</strong>
                                    </v-col>
                                </v-row>
                            </v-expansion-panel-header>
                            <v-expansion-panel-content>
                                <v-divider></v-divider>
                                <v-card-text>
                                    <v-simple-table dark>
                                        <template v-slot:default>
                                            <thead>
                                            <tr>
                                                <th class="text-left">Waga</th>
                                                <th class="text-left">Szyja</th>
                                                <th class="text-left">Biceps L</th>
                                                <th class="text-left">Biceps P</th>
                                                <th class="text-left">Nadgarstek L</th>
                                                <th class="text-left">Nadgarstek P</th>
                                                <th class="text-left">Klatka</th>
                                                <th class="text-left">Talia</th>
                                                <th class="text-left">Brzuch</th>
                                                <th class="text-left">Pas</th>
                                                <th class="text-left">Biodra</th>
                                                <th class="text-left">Udo L</th>
                                                <th class="text-left">Udo P</th>
                                                <th class="text-left">Łydka L</th>
                                                <th class="text-left">Łydka P</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{ m.weight }} kg</td>
                                                <td>{{ m.neck }} cm</td>
                                                <td>{{ m.bicepsL }} cm</td>
                                                <td>{{ m.bicepsR }} cm</td>
                                                <td>{{ m.wristL }} cm</td>
                                                <td>{{ m.wristR }} cm</td>
                                                <td>{{ m.chest }} cm</td>
                                                <td>{{ m.waist }} cm</td>
                                                <td>{{ m.stomach }} cm</td>
                                                <td>{{ m.crimson }} cm</td>
                                                <td>{{ m.hips }} cm</td>
                                                <td>{{ m.thighL }} cm</td>
                                                <td>{{ m.thighR }} cm</td>
                                                <td>{{ m.calfL }} cm</td>
                                                <td>{{ m.calfR }} cm</td>
                                            </tr>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn color="red" outlined class="mx-auto" @click="deleteMeasurment(m.id)">Usuń</v-btn>
                                </v-card-actions>
                            </v-expansion-panel-content>
                        </v-expansion-panel>
                    </template>
                </v-expansion-panels>
            </v-card-text>
        </v-card>
        <v-dialog v-model="showAddModal" persistent width="70%">
            <v-card>
                <v-card-title class="mx-auto" style="background: rgba(0, 0, 0, 0.7); color: white;" >Dodaj pomiary</v-card-title>
                <v-card-text class="pt-3">
                    <v-row>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.weight" label="Waga" suffix="kg"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.neck" label="Szyja" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.bicepsL" label="Biceps lewy" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.bicepsR" label="Biceps prawy" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.wristL" label="Nadgarstek lewy" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.wristR" label="Nadgarstek prawy" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.chest" label="Klatka" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.waist" label="Talia" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.stomach" label="Brzuch" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.crimson" label="Pas" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.hips" label="Biodra" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.thighL" label="Udo lewe" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.thighR" label="Udo prawe" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.calfL" label="Łydka lewa" suffix="cm"></v-text-field>
                        </v-col>
                        <v-col cols="12" lg="4" md="6" sm="12">
                            <v-text-field v-model="newMeasurments.calfR" label="Łydka prawa" suffix="cm"></v-text-field>
                        </v-col>
                    </v-row>
                </v-card-text>
                <v-card-actions class="justify-center">
                    <v-btn text color="primary" @click="showAddModal = false">Anuluj</v-btn>
                    <v-btn text color="primary" @click="addMeasurment">Dodaj pomiary</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
export default {
    name: "UserMeasurments",
    data(){
        return{
            measurments:null,
            newMeasurments:{
                weight:null,
                neck:null,
                bicepsL:null,
                bicepsR:null,
                wristL:null,
                wristR:null,
                chest:null,
                waist:null,
                stomach:null,
                crimson:null,
                hips:null,
                thighL:null,
                thighR:null,
                calfL:null,
                calfR:null,

            },
            showAddModal:false,
        }
    },
    methods:{
        async addMeasurment(){
            const res = await this.callApi('post','addNewMeasurment',this.newMeasurments);
            if(res.status === 201){
                this.$toast.success('Pomyślnie dodano nowe pomiary do systemu',{timeout:2000});
                setTimeout(()=>{ this.$router.go() }, 2000);
            }else{
                this.$toast.error('Nie udało się dodać nowych pomiarów do systemu, proszę spróbować później...')
            }
        },
        async deleteMeasurment(index){
            const res = await this.callApi('post','deleteMeasurment', {index:index});
            if(res.status === 200){
                this.$toast.success('Pomyślnie usunięto pomiar z systemu.',{timeout:2000});
                setTimeout(()=>{ this.$router.go() }, 2000);
            }else{
                this.$toast.error('Nie udało się usunąć pomiaru z systemu, spróbuj ponownie później...');
            }
        },
    },
    async created(){
        const res = await this.callApi('get','getMeasurments');
        if(res.status === 200){
            this.measurments = res.data;
        }
    },
}
</script>

<style scoped>

</style>
