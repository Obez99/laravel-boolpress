<template>
  <nav class="buttons-container">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link"><i class="fas fa-chevron-left"></i></a>
      </li>
      <li class="page-item" v-for="page in apiData.last_page" :key="page">
        <a class="page-link">{{ page }}</a>
      </li>
      <li class="page-item">
        <a class="page-link"><i class="fas fa-chevron-right"></i></a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "PaginationButtons",
  props: ["apiData"],
};
</script>

<style lang="scss">
@import "../../sass/partials/pagination-buttons.scss";
</style>