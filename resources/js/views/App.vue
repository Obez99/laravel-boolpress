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
          :author="post.author"
          :creationDate="post.created_at"
        ></Post>
        <h2 v-if="posts.length === 0" class="text-center">
          Nessun post disponibile, torna più tardi!
        </h2>
      </div>
    </div>
  </div>
</template>


<script>
import Jumbotron from "../components/Jumbotron.vue";
import Post from "../components/Post.vue";

export default {
  name: "app",
  components: { Jumbotron, Post },
  data() {
    return {
      posts: [],
    };
  },
  mounted() {
    window.axios.get("/api/posts").then((resp) => {
      let response = resp.data.reverse();
      response.forEach((item) => {
        item.created_at = item.created_at.substring(0, 10);
        this.posts.push(item);
      });
    });
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