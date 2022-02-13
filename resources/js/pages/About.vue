<template>
  <div>
    <Header
      :title="'Chi siamo?'"
      :subtitle="'Ecco le nostre informazioni.'"
      :imageUrl="'img/about-us.jpg'"
    ></Header>
    <main>
      <div class="container about-container py-5">
        <h2>Ciao!</h2>
        <p>
          Mi chiamo Giulio e ho 22 anni. Qui di seguito puoi trovare i link a
          tutti i miei social:
        </p>
        <ul class="list-group mb-5">
          <li class="list-group-item">
            <i class="fab fa-github"></i>
            <a href="https://github.com/Obez99" target="_blank">Github</a>
          </li>
          <li class="list-group-item">
            <i class="fab fa-linkedin"></i>
            <a
              href="https://www.linkedin.com/in/giulio-gulizia/"
              target="_blank"
              >Linkedin</a
            >
          </li>
          <li class="list-group-item">
            <i class="fab fa-instagram"></i>
            <a href="https://www.instagram.com/giulio.gulizia/" target="_blank"
              >Instagram</a
            >
          </li>
        </ul>
        <p>Ho sviluppato questo sito utilizzando:</p>
        <div class="d-flex justify-content-between lang-container border">
          <a href="https://laravel.com/"
            ><img src="/img/laravel.jpg" alt="laravel"
          /></a>
          <a href="https://vuejs.org/"><img src="/img/vue.png" alt="vue" /></a>
          <a href="https://sass-lang.com/"
            ><img src="/img/sass.jpeg" alt="sass"
          /></a>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import Header from "../components/Header.vue";
export default {
  name: "About",
  components: { Header },
};
</script>

<style lang="scss">
@import "../../sass/partials/about.scss";
</style>