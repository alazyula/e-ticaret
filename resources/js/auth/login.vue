<template>
    <div class=" w-50 m-auto pt-5 ">
        <div class="card card-body">
           <form >
               <div class="form-group">
                   <label for="email">E-posta</label>
                   <input type="text" name="email" placeholder="e-posta" class="form-control"
                   v-model="email"
                   >

               </div>
               <div class="form-group">
                   <label for="password">Şifre</label>
                   <input type="password" name="password" placeholder="şifre" class="form-control"
                   v-model="password"
                   >

               </div>
               <button type="submit" class="btn btn-primary  btn-lg btn-block" :disabled="loading"
                @click.prevent="login">Giriş Yap</button>
               <hr />
               <span>
                   Hesabınız yok mu?
                   <router-link :to="{name: 'register'}">Kayıt olabilirsiniz</router-link>
               </span>
              
           </form>
        </div>
        
    </div>
</template>
<script>
import {logIn} from "./auth";
export default {
    data(){
        return{
        email:null,
        password: null,
        loading: false
        };
        
    },
    methods: {
        async login(){
            this.loading=true;
            try{
                await axios.get("sanctum/csrf-cookie");
                await axios.post("/login", {
                    email: this.email,
                    password: this.password
                 });
                logIn();
                this.$store.dispatch("loadUser");
                this.$router.push({name: 'home'});


            }
            catch(error){
                console.error();
                
            }

           

            this.loading=false;
        }
    },
};
</script>