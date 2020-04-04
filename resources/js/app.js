import router from "./routes";
import VueRouter from "vue-router";
import Index from "./components/Index";
import Vuex from "vuex";
import storeDefinition from "./store";
require('./bootstrap');

window.Vue = require('vue');



Vue.use(VueRouter);
Vue.use(Vuex);

const store= new Vuex.Store(storeDefinition);

window.axios.interceptors.response.use(
    response=>{
        return response;
    },
    error=>{
        if(401==error.response.status){
            store.dispatch("logout");

        }
        return Promise.reject(error);
    }


)

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        "index": Index
},
    async beforeCreate() {
        this.$store.dispatch("loadStoredState");
        this.$store.dispatch("loadUser");
    },

}
);
