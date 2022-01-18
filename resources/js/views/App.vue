<template>
  <div id="root">
    <Jumbotron></Jumbotron>

    <div class="posts-container">
      <Post></Post>
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
      this.posts = resp.data;
    });
  },
};
</script>

<style lang="scss">
#root {
  width: 100%;
}
</style>