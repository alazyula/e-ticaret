import VueRouter from "vue-router";
import home from "./components/home";


const routes= [
    {
        path: "/",
        component: home,
        name: 'home'
    },
    {
        path: "/auth/login",
        component: require("./auth/login").default,
        name: "login"
    },{
        path: "/auth/register",
        component: require("./auth/register").default,
        name: "register"
    },{
        path: "/category",
        component: require("./components/category").default,
        name: "category"
    },
    {
        path: "/category/:id",
        component: require("./components/products").default,
        name: "products"
    },
    {
        path: "/product/:id",
        component: require("./components/product").default,
        name: "product"
    }

];
const router= new VueRouter({
    routes,
    mode: "history",
});
export default router;
