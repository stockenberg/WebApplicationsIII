<template>
  <div>
    <product-list></product-list>
  </div>
</template>

<script>
import ProductList from "./ProductList";

export default {
  name: "ManageProducts",
  components: { ProductList },
  mounted() {
    console.log(LARAVEL_API_URL);
  }
};
</script>

<style scoped lang="scss">
div {
  padding: 20px;
}
</style>
