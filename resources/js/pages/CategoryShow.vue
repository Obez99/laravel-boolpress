<template>
  <div>
    <Header></Header>
    <main>
      <div class="posts-section">
        <div class="container">
          <div class="posts">
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
            <h2 class="text-center" v-if="posts.length === 0">
              Nessun post in questa categoria.
            </h2>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Header from "../components/Header.vue";
import Post from "../components/Post.vue";
export default {
  name: "CategoryShow",
  components: { Header, Post },
  mounted() {
    window.axios.get(`/api/categories/${this.categoryId}`).then((resp) => {
      this.posts = resp.data;
    });
  },

  data() {
    return {
      categoryId: this.$route.params.category,
      posts: [],
    };
  },
};
</script>

<style lang="scss">
</style>