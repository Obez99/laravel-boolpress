<template>
  <div>
    <Header
      :imageUrl="currentCategory.image"
      :title="currentCategory.name"
    ></Header>
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

    window.axios.get("/api/categories").then((resp) => {
      resp.data.forEach((category) => {
        if (category.id === parseInt(this.$route.params.category))
          this.currentCategory = category;
      });
    });
  },

  data() {
    return {
      categoryId: this.$route.params.category,
      posts: [],
      categoriesList: [],
      currentCategory: [],
    };
  },
};
</script>

<style lang="scss">
</style>