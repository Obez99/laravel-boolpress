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
        :creationDate="post.created_at"
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
  name: "Main",
  components: { Post, PaginationButtons },
  props: ["posts", "apiData"],
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