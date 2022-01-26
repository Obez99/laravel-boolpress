<template>
  <section class="post-show-section">
    <div class="container">
      <div class="post-container">
        <h2 class="post-title">{{ post.title }}</h2>
        <p class="post-content">{{ post.content }}</p>
        <strong
          >Creato il {{ formatDate(post.updated_at) }} da
          {{ post.user.name }}</strong
        >
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "Post",
  data() {
    return {
      post: Object,
    };
  },
  mounted() {
    const slug = this.$route.params.slug;

    axios.get(`/api/post/${slug}`).then((resp) => {
      this.post = resp.data;
      console.log(this.post);
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
@import "../../sass/partials/_post-show.scss";
</style>