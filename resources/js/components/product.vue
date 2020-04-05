<template>
  <div>
    <div >
      <div class="row mb-4" >
        <div class=" w-50 m-auto pt-5 ">         
             <div class="card card-body" v-if="!added">
                 <h4 class="card-title">{{ product.name }}</h4>
                 <h5 class="card-text">{{ product.description }}
                     <br><br><br>
                      <input class="btn btn-primary" type="button" value="-"
                      @click.prevent="decreaseQuantity" >
                     {{ this.quantity }} adet
                      <input class="btn btn-primary" type="button" value="+" 
                      @click.prevent="increaseQuantity" >                    
                        <br><br><br>
                         {{ calculatePrice(product) }} TL
                 </h5>
                 <button type="button" class="btn btn-primary w-50  btn-lg btn-block" :disabled="loading"
                @click.prevent="addToBasket" v-if="isLoggedIn&&isStocked(product)">Sepete ekle</button>
                <p class="card-text" v-if="isLoggedIn&&!isStocked(product)" >Ürün stokta yok</p>
                <p class="card-text" v-if="!isLoggedIn&&isStocked(product)" >Sepete erişmek için Lütfen Giriş Yapın</p>
                </div> 
                <div class="card card-body" v-else>
                  <h4>Ürün sepete eklendi!</h4>
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
      quantity: 1,
      basket:null,
      loading:false,
      added: false
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
      

  },
 
  increaseQuantity(){
    if(this.quantity!=this.product.stock)
    this.quantity++;
    
  },
  decreaseQuantity(){
    if(this.quantity!=1)
    this.quantity--;
  },
  calculatePrice(product){
        return product.price*this.quantity;
      },
  async addToBasket(){
    
    this.loading=true;
    let total= this.product.price*this.quantity;
    try {
      
       await axios.post("/api/basketproduct", {
         basket_id: this.basket[0].id,
         product_id: this.product.id,
         quantity: this.quantity,
         price: total,
         });
         
         this.added=true;


    } catch (error) {
      console.log(error);

    }



    this.loading=false;
  }

  },
  created() {

    const request = axios.get(`/api/product/${this.$route.params.id}`).then(response => {
      this.product = response.data;
      
    });
    const requestBasket = axios.get(`/api/basket/pick`).then(response => {
      this.basket = response.data;
      
    });
  }
};
</script>