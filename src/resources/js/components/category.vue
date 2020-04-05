<template>
    <div>
        <div class="w-50 m-auto pt-5">
           <div class="card card-body align-items-center mb-2"
           v-for="(item,number) in category" :key="number">
               <router-link :to="{name:'products', params: {id: item.id}} "  ><h4>{{item.name}}</h4></router-link>
               <p class="card-text">{{item.description}}</p>
           </div>

        </div>

    </div>
</template>
<script>
export default {
     data(){
        return{
        category: null,
        loading: false
        };
        
    },
    methods: {







    },
    created(){
      this.loading=true;
      const request= axios.get("/api/category").then(response => {
      this.category = response.data;
      this.loading = false;

    });
    },


}
</script>