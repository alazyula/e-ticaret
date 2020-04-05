<template>
  <div>
    
    <div >
      <div class="row mb-4" v-for="row in rows" :key="'row' + row">
        <div
          class="col d-flex align-items-stretch"
          v-for="(product, column) in productsInRow(row)"
          :key="'row' + row + column"
        >
          <div class="card w-100 h-75 mt-5 mb-5 ml-5 mr-5">
             <div class="card-body">
                 <router-link :to="{name:'product', params: {id: product.id}} "  >
                     <h4>{{product.name}}</h4></router-link>
                <h5 class="card-text">{{product.price }} TL </h5>
    </div>
  </div>
        </div>

        <div class="col" v-for="p in placeholdersInRow(row)" :key="'placeholder' + row + p"></div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  
  data() {
    return {
      products: null,
      
      columns: 3
    };
  },
  computed: {
    rows() {
      return this.products === null
        ? 0
        : Math.ceil(this.products.length / this.columns);
    }
  },
  methods: {
    productsInRow(row) {
      return this.products.slice((row - 1) * this.columns, row * this.columns);
    },
    placeholdersInRow(row) {
      return this.columns - this.productsInRow(row).length;
    }
  },
  created() {

    const request = axios.get(`/api/category/${this.$route.params.id}`).then(response => {
      this.products = response.data;
      
    });
  }
};
</script>