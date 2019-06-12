<template>
  <table class="table is-fullwidth">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Img</th>
        <th>Price</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <!-- Loop Area -->
      <tr>
        <td></td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import Products from "./mixins/Products";

export default {
  name: "ProductList",
  mixins: [Products]
};
</script>

<style>
</style>
