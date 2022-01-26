<template>
  <header>
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Boolpress</a>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <router-link to="/" class="nav-link">Home</router-link>
            </li>
            <li class="nav-item">
              <router-link to="contact" class="nav-link">Contatti</router-link>
            </li>
            <li class="nav-item">
              <router-link to="about" class="nav-link">Chi siamo</router-link>
            </li>
          </ul>
        </div>
      </nav>
    </div>

    <div class="jumbotron-container">
      <div class="jumbotron-text">
        <h1>Benvenuto su Boolpress!</h1>
        <p>Crea un nuovo post o registrati!</p>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang="scss">
@import "../../sass/partials/_header.scss";
</style>