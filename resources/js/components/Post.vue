<template>
  <div class="card my-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      {{ title }}
      <div
        class="badge text-white"
        :style="{ 'background-color': category.color }"
      >
        {{ category.name }}
      </div>
    </div>
    <div class="card-body">
      <p class="card-text">{{ description }}</p>

      <div class="tags-section">
        <div
          class="badge badge-pill mr-3 text-white p-2"
          v-for="tag in tags"
          :key="tag.id"
          :style="{ 'background-color': tag.color }"
        >
          {{ tag.name }}
        </div>
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
  props: ["title", "description", "author", "creationDate", "category", "tags"],
};
</script>

<style lang="scss">
@import "../../sass/partials/post";
</style>