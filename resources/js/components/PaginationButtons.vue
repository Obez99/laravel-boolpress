<template>
  <nav class="buttons-container">
    <ul class="pagination">
      <li class="page-item" :class="currentPage === 1 ? 'disabled' : ''">
        <a class="page-link" @click="$emit('prevPage')"
          ><i class="fas fa-chevron-left"></i
        ></a>
      </li>
      <li
        class="page-item"
        :class="currentPage === page ? 'active' : ''"
        v-for="page in apiData.last_page"
        :key="page"
      >
        <a class="page-link" @click="$emit('changePage', page)">{{ page }} </a>
      </li>
      <li
        class="page-item"
        :class="currentPage === apiData.last_page ? 'disabled' : ''"
      >
        <a class="page-link" @click="$emit('nextPage')"
          ><i class="fas fa-chevron-right"></i
        ></a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "PaginationButtons",
  props: ["apiData", "currentPage"],
};
</script>

<style lang="scss">
@import "../../sass/partials/pagination-buttons.scss";
</style>