<template>
  <div id="Products">
    <h2 class="columns">All Products</h2>
    <hr />
    <div class="columns is-multiline">
      <card
        v-for="(product, index) in products"
        :key="index"
        :title="product.title"
        :image="product.image"
        :price="product.price"
        :description="product.description"
        :cartButton="index === 3 ? true : false"
        class=" column is-3"
      ></card>
    </div>
    <input type="text" v-model="id" />
    <button @click="addProduct">Test</button>
  </div>
</template>

<script>
import Card from "../Card";

/**
 * @group Product
 * @vuese
 * This Component will be used as product-overview page
 */
export default {
  data() {
    return {
      products: null,
      id: null
    };
  },
  components: { Card },

  /**
   *  @vuese
   *  Load data on component creation
   */
  created() {
    this.loadProduct();
  },
  methods: {
    loadProduct() {
      axios
        .get(`${LARAVEL_API_URL}/products`)
        .then(res => {
          this.products = res.data;
        })
        .catch(err => {
          console.log(err);
        });
    }
  },
  props: ["test"]
};
</script>

<style lang="scss" scoped>
#Products {
  h2 {
    font-size: 24px;
    margin-top: 20px;
  }
}
</style>
