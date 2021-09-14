<template>
    <div>
        <v-container fluid>
            <h2>Rejestracja</h2>
        </v-container>
        <v-container fluid>
            <!--        Rejestracja użytkownika-->
            <v-stepper :value="user.activeStep">
                <v-stepper-header>
                    <v-stepper-step step="1">Dane użytkownika</v-stepper-step>
                </v-stepper-header>
                <v-stepper-items>
                    <v-stepper-content step="1">
                        <v-card>
                            <v-card-title>
                                <span class="headline">Profil użytkownika</span>
                            </v-card-title>
                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="user.name" label="Imię*"
                                                          :error-messages="userNameErrors"
                                                          @input="$v.user.name.$touch()"
                                                          @blur="$v.user.name.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="user.surname" label="Nazwisko*"
                                                          :error-messages="userSurnameErrors"
                                                          @input="$v.user.surname.$touch()"
                                                          @blur="$v.user.surname.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="user.nick" label="Nick*"
                                                          :error-messages="userNickErrors"
                                                          @input="$v.user.nick.$touch()"
                                                          @blur="$v.user.nick.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-checkbox v-model="user.showUserName"
                                                        label="Proszę zaznaczyć, aby pokazać imię i nazwisko publicznie."></v-checkbox>
                                        </v-col>
                                        <!--  Przykładowy komentarz  -->
                                        <v-col cols="12">
                                            <v-card>
                                                <v-list two-line>
                                                    <v-list-item-group>
                                                        <template>
                                                            <v-list-item>
                                                                <template>
                                                                    <v-list-item-content>
                                                                        <v-list-item-title v-if="user.showUserName">{{user.name}} {{user.surname}}</v-list-item-title>
                                                                        <v-list-item-title v-if="user.showUserName && user.name==='' && user.surname===''">Imię Nazwisko</v-list-item-title>
                                                                        <v-list-item-title v-if="!user.showUserName">{{ user.nick }}</v-list-item-title>
                                                                        <v-list-item-title v-if="!user.showUserName && user.nick===''">Nick</v-list-item-title>
                                                                        <v-list-item-subtitle>Przykładowy komentarz ...</v-list-item-subtitle>
                                                                    </v-list-item-content>
                                                                    <v-list-item-action>
                                                                        <v-list-item-action-text>02-06-2021</v-list-item-action-text>
                                                                        <v-rating
                                                                            v-model="mark"
                                                                            color="yellow darken-3"
                                                                            background-color="grey darken-1"
                                                                            empty-icon="$ratingFull"
                                                                            half-increments
                                                                            hover
                                                                            medium
                                                                            readonly
                                                                        ></v-rating>
                                                                        <v-btn outlined color="red" small >Zgłoś</v-btn>
                                                                    </v-list-item-action>
                                                                </template>
                                                            </v-list-item>
                                                        </template>
                                                    </v-list-item-group>
                                                </v-list>
                                            </v-card>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="4">
                                            <v-radio-group v-model="user.sex" row >
                                                <v-radio
                                                    label="Mężczyzna"
                                                    value="male"
                                                ></v-radio>
                                                <v-radio
                                                    label="Kobieta"
                                                    value="female"
                                                ></v-radio>
                                            </v-radio-group>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="4">
                                            <v-text-field v-model="user.age" label="Wiek"

                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="4">
                                            <v-text-field v-model="user.height" label="Wzrost"
                                                          suffix="cm"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="user.email" label="Email*" required
                                                          :error-messages="userEmailErrors"
                                                          @input="$v.user.email.$touch()"
                                                          @blur="$v.user.email.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field v-model="user.phone" label="Telefon"
                                                          :error-messages="userPhoneErrors"
                                                          @input="$v.user.phone.$touch()"
                                                          @blur="$v.user.phone.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="user.password" label="Hasło*" type="password" required
                                                          :error-messages="userPasswordErrors"
                                                          @input="$v.user.password.$touch()"
                                                          @blur="$v.user.password.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                        <v-col cols="12">
                                            <v-text-field v-model="user.repeatPassword" label="Powtórz hasło*" type="password" required
                                                          :error-messages="userRepeatPasswordErrors"
                                                          @input="$v.user.repeatPassword.$touch()"
                                                          @blur="$v.user.repeatPassword.$touch()"
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                                <small>*Wymagane</small>
                            </v-card-text>
                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn text @click="accountType =''">Zamknij</v-btn>
                                <v-btn text @click="registerUser" :disabled="$v.user.$invalid">Zarejestruj</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-stepper-content>
                </v-stepper-items>
            </v-stepper>
        </v-container>
    </div>
</template>
<script>
import {required, minLength, sameAs,email,numeric} from 'vuelidate/lib/validators';
export default {
    data(){
        return{
            mark:4,
            //Dane rejestracyjne dla użytkownika
            user:{
                activeStep:1,
                name:'',
                surname:'',
                nick:'',
                email:'',
                password:'',
                repeatPassword:'',
                phone:'',
                age:'',
                height:'',
                sex:'',
                showUserName:false,
            }
        }
    },
    validations:{
        user: {
            name: {
                required: required,
                minLength:minLength(3),
            },
            surname:{
                required,
                minLength:minLength(3),
            },
            nick:{
                required,
                minLength:minLength(3),
            },
            email:{
                required,
                email:email,
            },
            phone:{
                numeric,
            },
            password:{
                required,
                minLength:minLength(7),
            },
            repeatPassword:{
                sameAs:sameAs("password"),
            }
        },
    },
    methods:{
        async registerUser(){
            const res = await this.callApi('post','/register',this.user);
            if(res.status === 201){
                this.$toast.success('Pomyślnie zarejestowano, proszę się zalogować');
                this.accountType ='';
                this.$store.commit('setShowLoginComponent', true);
                this.$store.commit('setShowRegisterComponent', false);
            }else{
                if(res.data.errors.email){
                    this.$toast.error(res.data.errors.email[0]);
                }else{
                    this.$toast.error('Proszę poprawić błędy');
                }

            }
        },
    },
    computed:{
        userNameErrors(){
            const errors = [];
            if (!this.$v.user.name.$dirty) return errors;
            !this.$v.user.name.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.user.name.required && errors.push('Imię jest wymagane.');
            return errors;
        },
        userSurnameErrors(){
            const errors = [];
            if (!this.$v.user.surname.$dirty) return errors;
            !this.$v.user.surname.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.user.surname.required && errors.push('Nazwisko jest wymagane.');
            return errors;
        },
        userNickErrors(){
            const errors = [];
            if (!this.$v.user.nick.$dirty) return errors;
            !this.$v.user.nick.minLength && errors.push('Podaj przynajmniej 3 znaki.');
            !this.$v.user.nick.required && errors.push('Nick jest wymagany.');
            return errors;
        },
        userEmailErrors(){
            const errors = [];
            if (!this.$v.user.email.$dirty) return errors;
            !this.$v.user.email.required && errors.push('E-mail jest wymagany.');
            !this.$v.user.email.email && errors.push('Adres e-mail nie poprawny.');
            return errors;
        },
        userPhoneErrors(){
            const errors = [];
            if (!this.$v.user.phone.$dirty) return errors;
            !this.$v.user.phone.numeric && errors.push('Wpisz tylko cyfry.');
            return errors;
        },
        userPasswordErrors(){
            const errors = [];
            if (!this.$v.user.password.$dirty) return errors;
            !this.$v.user.password.required && errors.push('Hasło jest wymagane.');
            !this.$v.user.password.minLength && errors.push('Minimum 7 znaków.');
            return errors;
        },
        userRepeatPasswordErrors(){
            const errors = [];
            if (!this.$v.user.repeatPassword.$dirty) return errors;
            !this.$v.user.repeatPassword.sameAs && errors.push('Hasła muszą być takie samo.');
            return errors;
        },
    },
    async created(){

    },
    watch: {


    },
}
</script>
<style lang="scss">
.v-label{
    margin-bottom: 0rem;
}
</style>
