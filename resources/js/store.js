import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

export default new Vuex.Store({
   state:{
        user:false,
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
// } i można się odwoływać do danych przez users -> users.name itp

/*   STATE JEST ZAWSZE PRZEKAZYWANE JAKO PIERWSZE
        odwołanie do Getters: this.$store.getters.NazwaGettera
        odwołanie do Mutations: this.@store.commit("nazwaMutacji", obiekt zawierający dane które chcemy przekazać)
        mutacje są synchroniczne, wykonują się od pocz. do końca
        odwołanie do Actions: this.$store.dispatch("NazwaAkcji", { obiekt })
        w akcjach  możemy wykonywać asynchroniczne akcje
        tworzenie akcji:
        remove(context, payload)
        context.commit -> wywołanie mutacji
        context.state -> odwołanie do stora

    Odwołujemy się do tego w COMPUTED ale musimy zaimportować "  import {mapState, mapGetters, mapMutations, mapActions} from 'vuex'
        ...mapState(["nazwaZmiennejZState"]) dzięki czemu używamy this.users zamiast this.$store.state.users
        ...mapGetters(["getUser"])

        Do ...mapMutations i ...mapActions odwołujemy się w methods:{} i wywołujemy: this.Mutacja(payload), this.Akcja(payload)

*/

