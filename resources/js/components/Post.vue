<template>
  <div class="card text-center my-3">
    <div class="card-header">{{ author }}</div>
    <div class="card-body">
      <h3 class="card-title mx-auto">{{ title }}</h3>
      <p class="card-text text-left">{{ description }}</p>
      <a href="#" class="btn btn-primary">Vedi post</a>
    </div>
    <div class="card-footer text-muted">Pubblicato il {{ creationDate }}</div>
  </div>
</template>

<script>
export default {
  name: "Post",
  props: ["title", "description", "author", "creationDate"],
};
</script>

<style lang="scss">
@import "../../sass/partials/post";
</style>