<template>
  <div id="root">
    <Jumbotron></Jumbotron>

    <div class="container">
      <Post
        v-for="post in posts"
        :key="post.id"
        :title="post.title"
        :description="post.content"
        :author="post.author"
        :creationDate="post.created_at"
      ></Post>
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
}
</style>