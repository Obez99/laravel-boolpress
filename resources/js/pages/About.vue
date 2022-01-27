<template>
  <div>
    <Header
      :title="'Chi siamo?'"
      :subtitle="'Ecco le nostre informazioni'"
      :imageUrl="'img/about-us.jpg'"
    ></Header>
    <main>
      <h1>About</h1>
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

<style>
</style>