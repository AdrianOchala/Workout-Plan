import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export default new Vuex.Store({
   state:{
        user:false,
        userBMI:false,
        showLoginComponent:false,
        showRegisterComponent:false,

       reportComponent:{
           showReportComponent:false,
           reportUrl:'',
           targetIndex:0,
           reportObject:'',
       },
       deleteModalData:{
           showDeleteModal: false,
           deleteUrl: "",
           data: null,
           deletingIndex:1,
           isDeleted:false,
       },
   },
    getters:{
        getUser(state){
          return state.user;
        },
        getUserBMI(state){
            return state.userBMI;
        },
        getShowLoginComponent(state){
           return state.showLoginComponent;
        },
        getShowRegisterComponent(state){
           return state.showRegisterComponent;
        },
        getReportComponent(state){
            return state.reportComponent;
        },
        getDeleteModalData(state){
            return state.deleteModalData;
        },
    },
    mutations:{
       updateUser(state, data){
           state.user = data;
       },
        updateUserBMI(state, data){
           if(state.user.height){
               let BMI = data / Math.pow(state.user.height,2);
               let rightBMI = Math.round(BMI * 100) / 100;
               state.userBMI = rightBMI;
           }else{
               state.userBMI = 'brak';
           }

        },
        setShowLoginComponent(state,data){
          state.showLoginComponent = data;
        },
        setShowRegisterComponent(state,data){
          state.showRegisterComponent = data;
        },
        setReportComponent(state,data){
            state.reportComponent = data;
        },
        setDeletingModalData(state, data){
            state.deleteModalData = data
        },
        setShowDeleteModal(state,data){
            state.deleteModalData.showDeleteModal = data;
        },
    }
});
//Edycja stora poprzez mutacje !
// computed: {
//     users() {
//         return this.$store.state.users;
//     }
// } i mo??na si?? odwo??ywa?? do danych przez users -> users.name itp

/*   STATE JEST ZAWSZE PRZEKAZYWANE JAKO PIERWSZE
        odwo??anie do Getters: this.$store.getters.NazwaGettera
        odwo??anie do Mutations: this.@store.commit("nazwaMutacji", obiekt zawieraj??cy dane kt??re chcemy przekaza??)
        mutacje s?? synchroniczne, wykonuj?? si?? od pocz. do ko??ca
        odwo??anie do Actions: this.$store.dispatch("NazwaAkcji", { obiekt })
        w akcjach  mo??emy wykonywa?? asynchroniczne akcje
        tworzenie akcji:
        remove(context, payload)
        context.commit -> wywo??anie mutacji
        context.state -> odwo??anie do stora

    Odwo??ujemy si?? do tego w COMPUTED ale musimy zaimportowa?? "  import {mapState, mapGetters, mapMutations, mapActions} from 'vuex'
        ...mapState(["nazwaZmiennejZState"]) dzi??ki czemu u??ywamy this.users zamiast this.$store.state.users
        ...mapGetters(["getUser"])

        Do ...mapMutations i ...mapActions odwo??ujemy si?? w methods:{} i wywo??ujemy: this.Mutacja(payload), this.Akcja(payload)

*/

