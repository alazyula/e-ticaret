<template>
  <div>
    
    <div >
      <div class="row mb-4" >
        <div class=" w-50 m-auto pt-5 ">
          
             <div class="card card-body">
                 <h4 class="card-title">{{ product.name }}</h4>
                 <h5 class="card-text">{{ product.description }}
                     <br><br><br>
                     {{ product.price }} TL
                        <br>

                 </h5>


                 <button type="button" class="btn btn-primary w-50  btn-lg btn-block" :disabled="loading"
                @click.prevent="login" v-if="isLoggedIn&&isStocked(product)">Sepete ekle</button>
                <p class="card-text" v-if="isLoggedIn&&!isStocked(product)" >Ürün stokta yok</p>
                <p class="card-text" v-if="!isLoggedIn&&isStocked(product)" >Sepete erişmek için Lütfen Giriş Yapın</p>
                </div>
            
        </div>

        
    </div>
  </div>
  </div>
</template>

<script>
import {mapState} from "vuex";

export default {
  
  data() {
    return {
      product: null,
      
      
    };
  },
  computed: {
    ...mapState({
            isLoggedIn: "isLoggedIn"

        }
        
        )

  },
  methods: {
  isStocked(product){
      if(product.stock>0){
          return true;
      }
      else{
          return false;
      }


  }
  },
  created() {

    const request = axios.get(`/api/product/${this.$route.params.id}`).then(response => {
      this.product = response.data;
      
    });
  }
};
</script>