<template>
    <div class="container-fluid">
        <v-row>
            <v-col cols="5">
                <v-card>
                    <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">Dane użytkownika
                        <v-spacer></v-spacer>
                        <v-btn outlined color="white" @click="editUser">Edytuj</v-btn>
                    </v-card-title>
                    <v-card-text v-if="user">
                        <v-row>
                            <v-col cols="12">
                                <v-text-field v-model="changeUserData ? user.name : userEdit.name" label="Imię"
                                              :disabled="changeUserData"
                                              :error-messages="userNameErrors"
                                              @input="$v.user.name.$touch()"
                                              @blur="$v.user.name.$touch()"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field v-model="changeUserData ? user.surname : userEdit.surname" label="Nazwisko"
                                              :disabled="changeUserData"
                                              :error-messages="userSurnameErrors"
                                              @input="$v.user.surname.$touch()"
                                              @blur="$v.user.surname.$touch()"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field v-model="changeUserData ? user.nick : userEdit.nick" label="Nazwisko"
                                              :disabled="changeUserData"
                                              :error-messages="userSurnameErrors"
                                              @input="$v.user.nick.$touch()"
                                              @blur="$v.user.nick.$touch()"
                                ></v-text-field>
                            </v-col>

                            <v-col cols="12">
                                <v-text-field v-model="changeUserData ? user.email : userEdit.email" label="Email"
                                              :disabled="changeUserData"
                                              :error-messages="userEmailErrors"
                                              @input="$v.user.email.$touch()"
                                              @blur="$v.user.email.$touch()"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-text-field v-model="changeUserData ? user.phone : userEdit.phone" label="Telefon"
                                              :disabled="changeUserData"
                                              :error-messages="userPhoneErrors"
                                              @input="$v.user.phone.$touch()"
                                              @blur="$v.user.phone.$touch()"
                                ></v-text-field>
                            </v-col>
                            <v-col cols="12">
                                <v-checkbox v-model="changeUserData ? user.showUserName : userEdit.showUserName"
                                            label="Proszę zaznaczyć, aby pokazać imię i nazwisko publicznie."
                                            :disabled="changeUserData"></v-checkbox>
                            </v-col>
                            <!--  Przykładowy komentarz  -->
                            <v-col cols="12">
                                <v-card>
                                    <v-list two-line>
                                        <v-list-item-group>
                                            <template>
                                                <v-list-item>
                                                    <template>
                                                        <v-list-item-content v-if="!changeUserData">
                                                            <v-list-item-title v-if="userEdit.showUserName">{{userEdit.name}} {{userEdit.surname}}</v-list-item-title>
                                                            <v-list-item-title v-if="userEdit.showUserName && userEdit.name==='' && userEdit.surname===''">Imię Nazwisko</v-list-item-title>
                                                            <v-list-item-title v-if="!userEdit.showUserName">{{ userEdit.nick }}</v-list-item-title>
                                                            <v-list-item-title v-if="!userEdit.showUserName && userEdit.nick===''">Nick</v-list-item-title>
                                                            <v-list-item-subtitle>Przykładowy komentarz ...</v-list-item-subtitle>
                                                        </v-list-item-content>
                                                        <v-list-item-content v-else>
                                                            <v-list-item-title v-if="user.showUserName">{{user.name}} {{user.surname}}</v-list-item-title>
                                                            <v-list-item-title v-if="user.showUserName && user.name==='' && user.surname===''">Imię Nazwisko</v-list-item-title>
                                                            <v-list-item-title v-if="!user.showUserName">{{ user.nick }}</v-list-item-title>
                                                            <v-list-item-title v-if="!user.showUserName && user.nick===''">Nick</v-list-item-title>
                                                            <v-list-item-subtitle>Przykładowy komentarz ...</v-list-item-subtitle>
                                                        </v-list-item-content>
                                                        <v-list-item-action>
                                                            <v-list-item-action-text>02-06-2021</v-list-item-action-text>
                                                            <v-rating
                                                                :value="4"
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
                            <v-col cols="12">
                                <v-radio-group v-model="changeUserData ? user.sex : userEdit.sex" row :disabled="changeUserData" >
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
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field v-model="changeUserData ? user.age : userEdit.age" label="Wiek" :disabled="changeUserData"

                                ></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="6">
                                <v-text-field v-model="changeUserData ? user.height : userEdit.height" label="Wzrost" :disabled="changeUserData"
                                              suffix="cm"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions v-if="!changeUserData">
                        <v-btn outlined @click="cancelEditing">Anuluj</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn outlined @click="editUserData">Zapisz</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
            <v-col cols="3">
                <v-card>
                    <v-card-title style="background: rgba(0, 0, 0, 0.7); color: white; ">Hasło użytkownika
                        <v-spacer></v-spacer>
                        <v-btn outlined color="white" @click="showEditingPassword">Edytuj</v-btn>
                    </v-card-title>
                    <v-card-text v-if="user && changeUserPassword">
                        <v-row>
                            <v-col cols="12">
                                <v-text-field v-model="userPassword" label="Stare hasło" :type="typ1"
                                              :append-outer-icon="'mdi-eye'"
                                              @click:append-outer="showOldPassword"
                                              :error-messages="userPasswordErrors"
                                              @input="$v.userPassword.$touch()"
                                              @blur="$v.userPassword.$touch()"
                                ></v-text-field>
                                <v-text-field v-model="userNewPassword" label="Nowe hasło" :type="typ2"
                                              :append-outer-icon="'mdi-eye'"
                                              @click:append-outer="showNewPassword"
                                              :error-messages="userNewPasswordErrors"
                                              @input="$v.userNewPassword.$touch()"
                                              @blur="$v.userNewPassword.$touch()"
                                ></v-text-field>
                                <v-text-field v-model="userNewRepeatPassword" label="Powtórz nowe hasło" :type="typ3"
                                              :append-outer-icon="'mdi-eye'"
                                              @click:append-outer="showRepeatPassword"
                                              :error-messages="userRepeatPasswordErrors"
                                              @input="$v.userNewRepeatPassword.$touch()"
                                              @blur="$v.userNewRepeatPassword.$touch()"
                                ></v-text-field>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions v-if="changeUserPassword">
                        <v-btn outlined @click="cancelEditingPassword">Anuluj</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn outlined @click="editPassword">Zmień</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import {mapGetters} from 'vuex'
import {required, minLength,maxLength, between, sameAs,email,numeric} from 'vuelidate/lib/validators';
export default {
    name: "UserSettings",
    data(){
        return{
            userEdit:null,
            user:null,
            changeUserData:true,

            changeUserPassword:false,
            fieldType:'password',
            userNewPassword:'',
            userNewRepeatPassword:'',
            userPassword:'',
            typ1:'password',
            typ2:'password',
            typ3:'password',
        }
    },
    validations: {
        user: {
            name: {
                required: required,
                minLength: minLength(3),
            },
            surname: {
                required,
                minLength: minLength(3),
            },
            nick:{
                required,
                minLength: minLength(3),
            },
            email: {
                required,
                email: email,
            },
            phone: {
                numeric,
            },
        },
        userPassword:{
            required
        },
        userNewPassword:{
            required,
            minLength:minLength(7)
        },
        userNewRepeatPassword:{
            sameAs:sameAs("userNewPassword")
        },
    },
    methods:{
        editUser(){
            let userData ={
                id:this.user.id,
                name:this.user.name,
                surname:this.user.surname,
                nick:this.user.nick,
                email:this.user.email,
                phone:this.user.phone,
                age:this.user.age,
                height:this.user.height,
                sex:this.user.sex,
                showUserName:this.user.showUserName
            };
            this.userEdit = userData;
            this.changeUserData = false;
        },
        cancelEditing(){
            this.changeUserData = true;
        },
        async editUserData(){
            const response = await this.callApi('post','userEdit',this.userEdit);
            if(response.status === 200){
                this.user.name = this.userEdit.name;
                this.user.surname = this.userEdit.surname;
                this.user.email = this.userEdit.email;
                this.user.phone = this.userEdit.phone;
                this.$toast.success('Pomyślnie edytowano dane');
                this.changeUserData = true;
            }else{
                this.$toast.error('Problem z edycją danych. Proszę spróbować później.')
            }
        },

        async editPassword(){
            const response = await this.callApi('post','/changeUserPassword',{userPassword:this.userPassword,
                                                                            userNewPassword:this.userNewPassword});
            if(response.status === 200){
                this.$toast.success('Pomyślnie zmieniono hasło');
                this.changeUserPassword = false;
                this.userNewPassword='';
                this.userNewRepeatPassword='';
                this.userPassword='';
            }else{
                this.$toast.error('Problem z edycją hasła. Proszę spróbować później.')
            }
        },
        showEditingPassword(){
            this.changeUserPassword = true;
        },
        cancelEditingPassword(){
            this.changeUserPassword = false;
            this.userNewPassword='';
            this.userNewRepeatPassword='';
            this.userPassword='';
        },
        showOldPassword(){
            if(this.typ1 === 'password'){
                this.typ1 = 'text';
            }else{
                this.typ1 = 'password';
            }
        },
        showNewPassword(){
            if(this.typ2 === 'password'){
                this.typ2 = 'text';
            }else{
                this.typ2 = 'password';
            }
        },
        showRepeatPassword(){
            if(this.typ3 === 'password'){
                this.typ3 = 'text';
            }else{
                this.typ3 = 'password';
            }
        },
    },
    created(){
        this.user = this.getUser;
    },
    computed:{
        ...mapGetters(['getUser']),
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
            if (!this.$v.userPassword.$dirty) return errors;
            !this.$v.userPassword.required && errors.push('Hasło jest wymagane.');
            return errors;
        },
        userNewPasswordErrors(){
            const errors = [];
            if (!this.$v.userNewPassword.$dirty) return errors;
            !this.$v.userNewPassword.required && errors.push('Hasło jest wymagane.');
            return errors;
        },
        userRepeatPasswordErrors(){
            const errors = [];
            if (!this.$v.userNewRepeatPassword.$dirty) return errors;
            !this.$v.userNewRepeatPassword.sameAs && errors.push('Hasła muszą być takie same.');
            return errors;
        },
    },
}
</script>

<style scoped>

</style>
