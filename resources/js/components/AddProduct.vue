<template>
  <div>
    <div
      class="field"
      v-for="({ type, label, error }, index) in htmlForm"
      :key="index"
    >
      <label class="label">{{ label }}</label>
      <div class="control">
        <input
          class="input"
          v-if="type !== 'textarea'"
          :type="type"
          v-model="data[index]"
          placeholder="Text input"
        />
        <textarea
          v-else
          class="textarea"
          placeholder="Textarea"
          v-model="data[index]"
        ></textarea>
        <p v-if="error">{{ error }}</p>
      </div>
    </div>

    <div class="field is-grouped">
      <div class="control">
        <button class="button is-link" @click="store(data)">Submit</button>
      </div>
      <div class="control">
        <button class="button is-text">Cancel</button>
      </div>
    </div>
    {{ data }}
  </div>
</template>

<script>
import Products from "./mixins/Products";

export default {
  data() {
    return {
      data: {
        title: null,
        description: null,
        price: null,
        image: null
      }
    };
  },
  mixins: [Products]
};
</script>

<style>
</style>
