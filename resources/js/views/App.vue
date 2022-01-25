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
          @prevPage="fetchData($event)"
          :data="apiData"
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
    };
  },
  mounted() {
    window.axios.get("/api/posts?page=" + 1).then((resp) => {
      this.apiData.push(resp.data);
      let response = resp.data.data.reverse();
      response.forEach((item) => {
        item.created_at = item.created_at.substring(0, 10);
        this.posts.push(item);
      });
    });
  },
  methods: {
    fetchData(page = 1) {
      window.axios.get("/api/posts?page=" + page).then((resp) => {
        this.posts = [];
        let response = resp.data.data.reverse();
        response.forEach((item) => {
          item.created_at = item.created_at.substring(0, 10);
          this.posts.push(item);
        });
      });
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