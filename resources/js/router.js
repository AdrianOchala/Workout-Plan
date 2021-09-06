import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);


import PageNotFound from "./pages/PageNotFound";
import UserHomePage from "./components/User/UserHomePage";

export default new VueRouter({
    routes:[
        //User & Owner Path's
        {path:'/',component:UserHomePage,name:'/'}, //Strona główna użytkowników

        // {path:'/RepairDetails/:id',component:RepairDetails,name:RepairDetails},//Wyszukiwanie warsztatów ( User , Owner)

        {path:'*',component:PageNotFound,name:'pagenotfound'},

    ],
    mode: 'history'
})
