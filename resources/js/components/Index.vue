<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-white border-bottom navbar-light">
        <router-link class="navbar-brand mr-auto" :to="{name: 'home'}">Anasayfa</router-link>
       
        <ul class="navbar-nav">
            <li class="nav-item  ">
                <router-link class="nav-link " :to="{name: 'category'}">Alışveriş yap</router-link>
            </li>
            <li class="nav-item" v-if="isLoggedIn" >
                 <router-link class="nav-link " :to="{name: 'home'}">Sepetim</router-link>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
                 <router-link class="nav-link" :to="{name: 'login'}">Giriş Yap</router-link>
            </li>
            <li class="nav-item" v-if="!isLoggedIn">
                 <router-link class="nav-link" :to="{name: 'register'}">Kayıt ol</router-link>
            </li>
            <li class="nav-item" v-if="isLoggedIn" >
                <a class="nav-link" href="#" @click.prevent="logout">Çıkış Yap</a>
            </li>

        </ul>
        
        

        </nav>
        
        
        <router-view>
                
        </router-view>
    </div>
</template>
<script>
import {mapState} from "vuex";
export default {
    
    computed:{
        ...mapState({
            isLoggedIn: "isLoggedIn"

        }
        
        )

    },
    methods: {
        async logout(){
            try {
                axios.post("/logout");
                this.$store.dispatch("logout");

            } catch (error) {
                this.$store.dispatch("logout");
            }

        }



    }
};
</script>