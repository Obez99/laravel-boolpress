<template>
  <div id="root">
    <Jumbotron></Jumbotron>
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
          :creationDate="post.created_at"
        ></Post>
        <h2 v-if="posts.length === 0" class="text-center">
          Nessun post disponibile, torna più tardi!
        </h2>
        <PaginationButtons
          @pageChange="fetchData($event)"
          @nextPage="fetchData($event)"
          @prevPage="fetchData($event, false)"
          :data="apiData"
          :currentPage="currentPage"
        ></PaginationButtons>
      </div>
    </div>
  </div>
</template>


<script>
import Jumbotron from "../components/Jumbotron.vue";
import Post from "../components/Post.vue";
import PaginationButtons from "../components/PaginationButtons.vue";

export default {
  name: "app",
  components: { Jumbotron, Post, PaginationButtons },
  data() {
    return {
      apiData: [],
      posts: [],
      currentPage: 1,
    };
  },
  mounted() {
    window.axios.get("/api/posts?page=" + 1).then((resp) => {
      this.apiData = resp.data;
      let response = resp.data.data;
      response.forEach((item) => {
        this.posts.push(item);
      });
    });
  },
  methods: {
    fetchData(page = 1, pageIncrement = true) {
      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.posts = [];
        let response = resp.data.data;
        response.forEach((item) => {
          this.posts.push(item);
        });
      });

      if (pageIncrement && this.currentPage < this.apiData.last_page) {
        this.currentPage++;
      } else if (pageIncrement === false && this.currentPage > 1) {
        this.currentPage--;
      }
    },
  },
};
</script>

<style lang="scss">
#root {
  width: 100%;

  .posts-section {
    min-height: 210px;
    background-color: lightgray;
    display: flex;
    justify-content: center;
    align-items: center;
  }
}
</style>