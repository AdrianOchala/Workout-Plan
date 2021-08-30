<template>
    <div>
      <v-card>
        <v-card-title>
          <span class="headline">Dane użytkownika</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="user.name" label="Imię*"
                              :error-messages="NameErrors"
                              @input="$v.user.name.$touch()"
                              @blur="$v.user.name.$touch()"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="user.surname" label="Nazwisko*"
                              :error-messages="SurnameErrors"
                              @input="$v.user.surname.$touch()"
                              @blur="$v.user.surname.$touch()"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="user.nick" label="Nick*"
                              :error-messages="NickErrors"
                              @input="$v.user.nick.$touch()"
                              @blur="$v.user.nick.$touch()"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-select label="Płeć*" required
                          :items="sex"
                          v-model="user.userSex"
                          :error-messages="SexErrors"
                          @input="$v.user.userSex.$touch()"
                          @blur="$v.user.userSex.$touch()"
                ></v-select>
            </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="user.email" label="Email*" required
                              :error-messages="EmailErrors"
                              @input="$v.user.email.$touch()"
                              @blur="$v.user.email.$touch()"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-text-field v-model="user.phone" label="Telefon"
                              :error-messages="PhoneErrors"
                              @input="$v.user.phone.$touch()"
                              @blur="$v.user.phone.$touch()"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field v-model="user.password" label="Hasło*" type="password" required
                              :error-messages="PasswordErrors"
                              @input="$v.user.password.$touch()"
                              @blur="$v.user.password.$touch()"
                ></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-text-field v-model="user.repeatPassword" label="Powtórz hasło*" type="password" required
                              :error-messages="RepeatPasswordErrors"
                              @input="$v.user.repeatPassword.$touch()"
                              @blur="$v.user.repeatPassword.$touch()"></v-text-field>
              </v-col>
            </v-row>
          </v-container>
          <small>*Wymagane</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn @click="clearForm()" text >Wyczyść</v-btn>
          <v-btn @click="register()" text :disabled="$v.user.$invalid">
            Rejestruj
          </v-btn>
        </v-card-actions>
      </v-card>
    </div>
</template>

<script>
import {required, minLength,maxLength, between, sameAs,email,numeric} from 'vuelidate/lib/validators';

    export default {
        name:'Register',
      data(){
        return{
          user:{
            name:"",
            surname:"",
            nick:"",

            userSex:'',
            email:"",
            phone:"",
            password:"",
            repeatPassword:"",
          },
          sex:['Mężczyzna','Kobieta','Inne'],
        }
      },
      validations:{
          user:{
            name: {
              required: required,
              minLength:minLength(3),
            },
            surname:{
              required,
              minLength:minLength(3),
            },
            nick: {
              required: required,
              minLength:minLength(3),
            },
            userSex:{
              required:required
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
              sameAs:sameAs("password")
            },
          }
      },
      methods:{
          async register(){
            await this.axios
                .post('http://localhost:8000/api/registerUser',this.user)
                .then(response =>{
                  console.log(response)

                  this.$toast.success("Rejestracja przebiegła pomyślnie. Proszę się zalogować.", { timeout: 3000 });
                  setTimeout(()=> {
                    this.clearForm()
                    this.$router.go();
                  }, 3000)
                })
                .catch(error => {
                  this.$toast.error(error.response.data.errors.email[0], {timeout: false});
                } )
                //.finally(()=>this.loading=false)
          },
        clearForm(){
          this.user.name = '';
          this.user.surname = '';
          this.user.nick = '';
          this.user.userSex = '';
          this.user.email = '';
          this.user.phone = '';
          this.user.password = '';
          this.user.repeatPassword = '';
          this.$v.$reset()
        },

      },
      computed:{
        NameErrors(){
          const errors = [];
          if (!this.$v.user.name.$dirty) return errors;
          !this.$v.user.name.minLength && errors.push('Podaj przynajmniej 3 znaki.');
          !this.$v.user.name.required && errors.push('Imię jest wymagane.');
          return errors;
        },
        SurnameErrors(){
          const errors = [];
          if (!this.$v.user.surname.$dirty) return errors;
          !this.$v.user.surname.minLength && errors.push('Podaj przynajmniej 3 znaki.');
          !this.$v.user.surname.required && errors.push('Nazwisko jest wymagane.');
          return errors;
        },
        NickErrors(){
          const errors = [];
          if (!this.$v.user.nick.$dirty) return errors;
          !this.$v.user.nick.minLength && errors.push('Podaj przynajmniej 3 znaki.');
          !this.$v.user.nick.required && errors.push('Imię jest wymagane.');
          return errors;
        },
        SexErrors(){
          const errors = [];
          if (!this.$v.user.userSex.$dirty) return errors;
          !this.$v.user.userSex.required && errors.push('Wybierz płeć.');
          return errors;
        },
        EmailErrors(){
          const errors = [];
          if (!this.$v.user.email.$dirty) return errors;
          !this.$v.user.email.required && errors.push('E-mail jest wymagany.');
          !this.$v.user.email.email && errors.push('Adres e-mail nie poprawny.');
          return errors;
        },
        PhoneErrors(){
          const errors = [];
          if (!this.$v.user.phone.$dirty) return errors;
          !this.$v.user.phone.numeric && errors.push('Wpisz tylko cyfry.');
          return errors;
        },
        PasswordErrors(){
          const errors = [];
          if (!this.$v.user.password.$dirty) return errors;
          !this.$v.user.password.required && errors.push('Hasło jest wymagane.');
          !this.$v.user.password.minLength && errors.push('Minimum 7 znaków.');
          return errors;
        },
        RepeatPasswordErrors(){
          const errors = [];
          if (!this.$v.user.repeatPassword.$dirty) return errors;
          !this.$v.user.repeatPassword.sameAs && errors.push('Hasła muszą być takie samo.');
          return errors;
        },
      },
        mounted() {
            console.log('Register component mounted.')
        }
    }
</script>
