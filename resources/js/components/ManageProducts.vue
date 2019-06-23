<template>
  <div>
    <product-list></product-list>
    <add-product></add-product>
  </div>
</template>

<script>
import ProductList from "./ProductList";
import AddProduct from "./AddProduct";

export default {
  name: "ManageProducts",
  components: { ProductList, AddProduct }
};
</script>

<style scoped lang="scss">
div {
  padding: 20px;
}
</style>
