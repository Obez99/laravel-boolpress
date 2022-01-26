<template>
  <div class="posts-section">
    <div class="container">
      <Post
        v-for="post in posts"
        :key="post.id"
        :title="post.title"
        :description="post.content"
        :author="post.user.name"
        :category="post.category"
        :tags="post.tags"
        :date="post.updated_at"
        :slug="post.slug"
      ></Post>
      <h2 v-if="posts.length === 0" class="text-center">
        Nessun post disponibile, torna più tardi!
      </h2>
      <PaginationButtons
        v-if="this.posts.length > 0"
        :apiData="apiData"
      ></PaginationButtons>
    </div>
  </div>
</template>

<script>
import Post from "../components/Post.vue";
import PaginationButtons from "../components/PaginationButtons.vue";

export default {
  name: "Home",
  components: { Post, PaginationButtons },
  data() {
    return {
      posts: [],
      apiData: [],
      currentPage: 1,
    };
  },
  mounted() {
    window.axios.get("/api/posts?page=" + 1).then((resp) => {
      this.apiData = resp.data;
      let response = resp.data.data;
      response.forEach((item) => {
        item.updated_at = this.formatDate(item.updated_at);
        this.posts.push(item);
      });
    });
  },
  methods: {
    formatDate(date) {
      const formattedDate =
        dayjs(date).format("DD MM YYYY") +
        " alle " +
        dayjs(date).format("HH:MM");

      return formattedDate;
    },
  },
};
</script>

<style>
.posts-section {
  min-height: 210px;
  background-color: lightgray;
  display: flex;
  justify-content: center;
  align-items: center;
}
</style>