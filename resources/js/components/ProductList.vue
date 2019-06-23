<template>
  <table class="table is-fullwidth">
    <thead>
      <tr>
        <th>Id {{ id }} {{ age }}</th>
        <th>Title</th>
        <th>Img</th>
        <th>Price</th>
        <th>Description</th>
        <th>Manage</th>
      </tr>
    </thead>
    <tbody>
      <!-- Loop Area -->
      <!-- https://ponyfoo.com/articles/es6-destructuring-in-depth -->
      <!-- TODO: Fix missing mixin detection -->
      <tr
        v-for="({ id, title, img, price, description }, index) in products"
        :key="index"
      >
        <td>{{ id }}</td>
        <td>{{ title }}</td>
        <td><img :src="img" alt="" /></td>
        <td>{{ price }}</td>
        <td>{{ description }}</td>
        <td>
          <!-- TODO: Fix missing mixin detection -->
          <button class="button is-danger" @click="destroy(id)">Delete</button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import Products from "./mixins/Products";

export default {
  name: "ProductList",
  mixins: [Products],
  props: {
    id: Number,
    age: Number
  }
};
</script>

<style scoped lang="scss">
table {
  tr {
    td {
      img {
        height: 50px;
        width: auto;
      }
    }
  }
}
</style>
