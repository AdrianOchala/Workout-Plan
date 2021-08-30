<template>
    <div>
        Login component :)
    </div>
</template>

<script>
    export default {
        name:'Login',

        data(){
            return{
                name:"",
                surname:"",
                email:"",
                phone:"",
                password:"",
                repeatPassword:"",
            }
        },

        mounted() {
            console.log('Login component mounted.')
        }
    }
</script>
