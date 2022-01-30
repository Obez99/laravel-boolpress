<template>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <router-link to="/" class="navbar-brand">Boolpress</router-link>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <router-link to="/" class="nav-link">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/contact" class="nav-link">Contatti</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/about" class="nav-link">Chi siamo</router-link>
            </li>
            <li class="nav-item">
              <a href="/login" class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div
      class="jumbotron-container"
      :style="{ 'background-image': `url(${imageUrl})` }"
    >
      <div class="jumbotron-text">
        <h1>{{ title }}</h1>
        <p>{{ subtitle }}</p>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
  props: ["title", "subtitle", "imageUrl"],
};
</script>

<style lang="scss">
@import "../../sass/partials/_header.scss";
</style>