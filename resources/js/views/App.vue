<template>
  <div id="root">
    <Header></Header>
    <Main :posts="this.posts" :apiData="this.apiData"></Main>
  </div>
</template>


<script>
import Header from "../components/Header.vue";
import Main from "../components/Main.vue";

export default {
  name: "app",
  components: { Header, Main },
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
        item.created_at = this.formatDate(item.created_at);
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

<style lang="scss">
#root {
  width: 100%;
}
</style>