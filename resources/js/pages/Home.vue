<template>
  <div>
    <Header
      :title="'Benvenuto su Boolpress!'"
      :subtitle="'Ti trovi nella sezione dei post.'"
      :imageUrl="'img/jumbotron.jpeg'"
    ></Header>
    <main>
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
            :currentPage="currentPage"
            @nextPage="this.nextPage"
            @prevPage="this.prevPage"
            @changePage="this.changePage"
          ></PaginationButtons>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Post from "../components/Post.vue";
import PaginationButtons from "../components/PaginationButtons.vue";
import Header from "../components/Header.vue";

export default {
  name: "Home",
  components: { Post, PaginationButtons, Header },
  data() {
    return {
      posts: [],
      apiData: [],
      currentPage: 1,
    };
  },
  mounted() {
    this.fetchData(this.currentPage);
  },
  methods: {
    formatDate(date) {
      const formattedDate =
        dayjs(date).format("DD MM YYYY") +
        " alle " +
        dayjs(date).format("HH:MM");

      return formattedDate;
    },

    fetchData(param) {
      window.axios.get("/api/posts?page=" + param).then((resp) => {
        this.apiData = resp.data;
        let response = resp.data.data;
        response.forEach((item) => {
          item.updated_at = this.formatDate(item.updated_at);
          this.posts.push(item);
        });
      });
    },

    nextPage() {
      if (this.apiData.last_page === this.currentPage) {
        return;
      } else {
        this.currentPage++;
        this.posts = [];
        this.fetchData(this.currentPage);
      }
    },

    prevPage() {
      if (this.currentPage === 1) {
        return;
      } else {
        this.currentPage--;
        this.posts = [];
        this.fetchData(this.currentPage);
      }
    },

    changePage(pageNum) {
      this.currentPage = pageNum;
      this.posts = [];
      this.fetchData(this.currentPage);
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