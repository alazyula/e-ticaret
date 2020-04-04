<template>
    <div class=" w-50 m-auto pt-5 ">
        <div class="card card-body">
           <form >
               <div class="form-group">
                   <label for="name">Kullanıcı adı</label>
                   <input type="text" name="name" placeholder="Kullanıcı Adı" class="form-control"
                   v-model="user.name"
                   >

               </div>
               <div class="form-group">
                   <label for="email">E-posta</label>
                   <input type="text" name="email" placeholder="e-posta" class="form-control"
                   v-model="user.email"
                   >

               </div>
               <div class="form-group">
                   <label for="password">Şifre</label>
                   <input type="password" name="password" placeholder="şifre" class="form-control"
                   v-model="user.password"
                   >

               </div>
               <div class="form-group">
                   <label for="password_confirmation">Şifreyi Doğrula</label>
                   <input type="password" name="password_confirmation" placeholder="Şifreni Doğrula" class="form-control"
                   v-model="user.password_confirmation"
                   >
                    
               </div>
               <button type="submit" class="btn btn-primary  btn-lg btn-block" :disabled="loading"
                @click.prevent="register">Kayıt Ol</button>
               <hr />
               <span>
                   Hesabınız var mı?
                   <router-link :to="{name: 'login'}">Giriş Yapın</router-link>
               </span>
               <br>
                <span>
                  
                  
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
            user:{
                name: null,
                email:null,
                password: null,
                password_confirmation: null
            },
        
        loading: false
        };
        
    },
    methods: {
        async register(){
            this.loading=true;
            try{
                const response= await axios.post("/register", this.user);
                if(201==response.status){
                logIn();
                this.$store.dispatch("loadUser");
                this.$router.push({name: 'home'});


                }
                
               


            }
            catch(error){
                console.error();
                
            }

           

            this.loading=false;
        }
    },
};
</script>