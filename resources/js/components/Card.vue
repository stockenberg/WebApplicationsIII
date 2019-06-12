<template>
  <div class="card" id="Card">
    <div class="card-image">
      <figure class="image is-4by3">
        <img :src="image" :alt="title" />
      </figure>
    </div>
    <div class="card-content">
      <div class="media">
        <div class="media-content">
          <p class="title is-4">{{ title }}</p>
          <p>{{ price }}</p>
        </div>
      </div>

      <div class="content">
        <p>
          {{ description }}
        </p>
        <br />
      </div>
      <div class="columns" v-if="cartButton">
        <hr />
        <button class="button">do some Action</button>
      </div>
    </div>
  </div>
</template>

<script>
/**
 * @group Product
 * @vuese
 * Product Card Component
 */
export default {
  props: {
    /**
     * Product title
     */
    title: {
      default: "Name",
      type: String
    },
    /**
     * Product image
     */
    image: {
      default: require("../../images/rick.png"),
      type: String
    },
    /**
     * Product price with Currency
     */
    price: {
      default: "99,99 €",
      type: String
    },
    /**
     * Product Description
     */
    description: {
      default: `Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit`,
      type: String
    },
    cartButton: {
      default: false,
      type: Boolean
    }
  }
};
</script>

<style lang="scss">
#Card {
  button {
    width: 100%;
  }
}
</style>
