<template>
    <div>
        <div >
      <div class="row mb-4" >
        <div class=" w-50 m-auto pt-5 " v-if="!checkedout" >         
             <div class="card card-body"  v-for="(product,number) in products"
              :key="number" >
                 <h4 class="card-title">{{ product.name }}</h4>
                 <h5 class="card-text">{{ product.description }}
                     <br><br><br>
                     
                     {{ product.quantity }} adet
                                       
                        <br><br><br>
                    {{ product.price }} TL
                 </h5>
                 <button type="button" class="btn btn-primary w-50  btn-lg btn-block" :disabled="loading"
                @click.prevent="removeFromBasket(product.id)" v-if="isLoggedIn">Sepetten kaldır</button>
                <p class="card-text" v-if="!isLoggedIn" >Sepete erişmek için Lütfen Giriş Yapın</p>
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
      products: null,
      basket:null,
      loading:false,
      checkedout: false
    };
  },
  computed: {
    ...mapState({
            isLoggedIn: "isLoggedIn"

        }
        
        )

  },
  methods: {
  
  decreaseQuantity(){
    if(this.quantity!=1)
    this.quantity--;
  },
  calculatePrice(product){
        return product.price*this.quantity;
      },
  async removeFromBasket(product){
    
    this.loading=true;
    
    try {
      
       await axios.delete(`/api/basketproduct/${product}`);
      const requestRefresh = axios.get(`/api/basket`).then(response => {
      this.products = response.data;
      
    });
         


    } catch (error) {
      console.log(error);

    }



    this.loading=false;
  }

  },
  created() {

   
    const requestBasket = axios.get(`/api/basket/pick`).then(response => {
      this.basket = response.data[0];
      
    });
    const request = axios.get(`/api/basket`).then(response => {
      this.products = response.data;
      
    });
  }
};
</script>