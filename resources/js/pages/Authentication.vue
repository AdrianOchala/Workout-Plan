<template>
    <div>
        <button @click="changeState('zaloguj') ">Zaloguj</button>
        <button @click="changeState('zarejestruj') ">Zarejestruj</button>

        <Login v-if="showLogin"/>
        <Register v-if="showRegister"/>
    </div>
</template>
<script>
import Register from "../components/Register";
import Login from "../components/Login";
export default {
    name:'Authentication',
    components:{Register, Login},
    data(){
        return{
            showLogin:true,
            showRegister:false,
        }
    },
    methods:{
        changeState(action){
            switch (action){
                case 'zaloguj':
                    if(this.showLogin) {
                        break;
                    }else{
                        this.showLogin = !this.showLogin;
                        this.showRegister = !this.showRegister;
                        break;
                    }
                case 'zarejestruj':
                    if(this.showRegister){
                        break;
                    }else{
                        this.showRegister = !this.showRegister;
                        this.showLogin = !this.showLogin;
                        break;
                    }

            }
        },
        async checkAuth(){
            this.axios
                .get('http://localhost:8000/api/checkAuth')
                .then(response =>{
                    console.log(response)
                    this.message = response.data;
                })
        }
    },
    created(){

    }
}
</script>
