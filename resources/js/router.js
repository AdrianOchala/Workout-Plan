import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);


import PageNotFound from "./pages/PageNotFound";
import UserHomePage from "./components/User/UserHomePage";
import Articles from "./components/User/Articles";
import AddArticle from "./components/User/AddArticle";

export default new VueRouter({
    routes:[
        //User & Owner Path's
        {path:'/',component:UserHomePage,name:'/'}, //Strona główna użytkowników
        {path:'/Articles',component:Articles,name:'Articles'}, //Strona z artykułami
        {path:'/AddArticle',component:AddArticle,name:'AddArticle'}, //Dodawanie i edycja artykułu
        // {path:'/RepairDetails/:id',component:RepairDetails,name:RepairDetails},//Wyszukiwanie warsztatów ( User , Owner)

        {path:'*',component:PageNotFound,name:'pagenotfound'},

    ],
    mode: 'history'
})
