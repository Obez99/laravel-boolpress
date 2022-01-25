<template>
  <nav class="buttons-container">
    <ul class="pagination">
      <li class="page-item" @click="$emit('prevPage', data.current_page - 1)">
        <a class="page-link"><i class="fas fa-chevron-left"></i></a>
      </li>
      <li
        class="page-item"
        @click="$emit('pageChange', page)"
        v-for="page in data.last_page"
        :key="page"
      >
        <a class="page-link">{{ page }}</a>
      </li>
      <li class="page-item" @click="$emit('nextPage', data.current_page + 1)">
        <a class="page-link"><i class="fas fa-chevron-right"></i></a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "PaginationButtons",
  props: ["data"],
};
</script>

<style lang="scss">
@import "../../sass/partials/pagination-buttons.scss";
</style>