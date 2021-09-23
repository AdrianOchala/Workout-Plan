<template>
            <v-card>
              <v-card-title class="justify-center text-danger">
                  <slot name="header">
                      default header
                  </slot>
              </v-card-title>
                <v-card-actions class="justify-center">
                    <v-btn text color="primary" @click="closeModal">Anuluj</v-btn>
                    <v-btn text color="primary" @click="deleteTarget">Usuń</v-btn>
                </v-card-actions>
            </v-card>
</template>
<script>
    import {mapGetters} from 'vuex'
    export default{
        data(){
            return{

            }
        },
        methods:{
            closeModal(){
                this.$store.commit('setShowDeleteModal',false);
            },
            async deleteTarget(){
                const res = await this.callApi('post', this.getDeleteModalData.deleteUrl, this.getDeleteModalData.data);
                if(res.status ===200){
                    this.$toast.success('Pomyślnie usunięto z systemu :)',{timeout:2000});
                    const deleteModalData = {
                        showDeleteModal: false,
                        deleteUrl: "",
                        data: null,
                        deletingIndex: this.getDeleteModalData.deletingIndex,
                        isDeleted: true,
                    };
                    this.$store.commit('setDeletingModalData', deleteModalData);

                }else{
                    this.$toast.warning('Oops! Coś poszło nie tak :(')
                }
            },
        },
        computed:{
            ...mapGetters(['getDeleteModalData']),
        },
    }
</script>
