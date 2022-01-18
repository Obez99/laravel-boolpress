<template>
  <div class="card text-center my-3">
    <div class="card-header text-left">{{ title }}</div>
    <div class="card-body">
      <p class="card-text text-left">{{ description }}</p>
      <a href="#" class="btn btn-primary">Vedi post</a>
    </div>
    <div class="card-footer text-muted">
      Pubblicato il {{ creationDate }} da <strong>{{ author }}</strong>
    </div>
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