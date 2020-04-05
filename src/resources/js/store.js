import { isLoggedIn, logOut } from "./auth/auth";



export default {
        state:{
            isLoggedIn: false,
            user: {}
        },
        mutations: {
            setUser( state, payload){
                state.user = payload;
            },
            setLoggedIn(state, payload){
                state.isLoggedIn = payload;
            },

        },
        actions: {

            loadStoredState(context){

                context.commit("setLoggedIn",isLoggedIn());
            },


            async loadUser ({commit,dispatch}){
                if(isLoggedIn()){
                    try {
                       const user= (await axios.get("/user")).data;
                       commit("setUser",user);
                       commit("setLoggedIn",true);
                    } catch (error) {
                        dispatch("logout");
                    }
                }


            },
            logout({commit}){
                commit("setUser",{});
                commit("setLoggedIn",false);
                logOut();
            },
        },


};