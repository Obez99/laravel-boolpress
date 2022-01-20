<template>
  <div class="card my-3">
    <div class="card-header">{{ title }}</div>
    <div class="card-body">
      <p class="card-text">{{ description }}</p>
      <div
        class="category-label"
        :style="{ 'background-color': category.color }"
      >
        {{ category.name }}
      </div>
    </div>
    <div class="card-footer text-muted">
      Pubblicato il {{ creationDate }} da <strong>{{ author }}</strong>
    </div>
  </div>
</template>

<script>
export default {
  name: "Post",
  props: ["title", "description", "author", "creationDate", "category"],
};
</script>

<style lang="scss">
@import "../../sass/partials/post";
</style>