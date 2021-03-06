import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);


import PageNotFound from "./pages/PageNotFound";
import UserHomePage from "./components/User/UserHomePage";
import Articles from "./components/User/Articles";
import AddArticle from "./components/User/AddArticle";
import Article from "./components/User/SingleArticle";
import Workouts from "./components/User/Workouts";
import AddWorkout from "./components/User/AddWorkout";
import Workout from "./components/User/Workout";
import UserSettings from "./components/User/UserSettings";
import Planner from "./components/User/Planner";
import UserMeasurments from "./components/User/UserMeasurments";
import UserStatistics from "./components/User/UserStatistics";
import Exercises from "./components/User/Exercises";

export default new VueRouter({
    routes:[
        //User & Owner Path's
        {path:'/',component:UserHomePage,name:'/'}, //Strona główna użytkowników
        {path:'/Articles',component:Articles,name:'Articles'}, //Strona z artykułami
        {path:'/AddArticle',component:AddArticle,name:'AddArticle'}, //Dodawanie  artykułu
        {path:'/EditArticle/:id',component:AddArticle,name:'EditArticle'}, // edycja artykułu
        {path:'/SingleArticle/:id',component:Article,name:'Article'},

        {path:'/Workouts',component:Workouts,name:'Workouts'},
        {path:'/AddWorkout',component:AddWorkout,name:'AddWorkout'},
        {path:'/EditWorkout/:id',component:AddWorkout,name:'EditWorkout'},
        {path:'/Workout/:id',component:Workout,name:'Workout'},
        {path:'/UserSettings',component:UserSettings,name:'UserSettings'},
        {path:'/Planner',component:Planner,name:'Planner'},
        {path:'/Measurments',component:UserMeasurments,name:'UserMeasurments'},
        {path:'/Statistics',component:UserStatistics,name:'UserStatistics'},
        {path:'/Exercises',component:Exercises,name:'Exercises'},



        {path:'*',component:PageNotFound,name:'pagenotfound'},

    ],
    mode: 'history'
})
