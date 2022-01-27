<template>
  <footer>
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="social-links col-3">
          <h2 class="logo">Boolpress</h2>
          <div class="social-icons d-flex">
            <div class="icon mr-3" v-for="icon in socialLinks" :key="icon">
              <a href="#"><i :class="icon"></i></a>
            </div>
          </div>
        </div>
        <div class="links col-4">
          <router-link
            v-for="link in pageLinks"
            :key="link"
            :to="link.link"
            class="ml-3"
            >{{ link.name }}</router-link
          >
        </div>
        <div class="subscribe col-3">
          <strong>Iscriviti alla Newsletter</strong>
          <form action="">
            <input
              type="email"
              placeholder="Inserisci la tua email"
              class="form-control email-input"
            />
            <input
              type="submit"
              value="Iscriviti"
              class="btn btn-secondary submit-input"
            />
          </form>
        </div>
      </div>
    </div>
  </footer>
</template>

<script>
export default {
  name: "Footer",
  data() {
    return {
      socialLinks: [
        "fab fa-facebook",
        "fab fa-instagram",
        "fab fa-linkedin",
        "fab fa-twitter",
      ],

      pageLinks: [
        {
          name: "About",
          link: "about",
        },
        {
          name: "Contattaci",
          link: "contact",
        },
        {
          name: "Supporto",
          link: "",
        },
        {
          name: "Lavora con noi",
          link: "",
        },
      ],
    };
  },
};
</script>

<style lang="scss">
@import "../../sass/partials/_footer.scss";
</style>