<template>
  <div>
    <Header
      :title="'Contattaci!'"
      :subtitle="'Qui puoi contattarci.'"
      :imageUrl="'img/contact-us.png'"
    ></Header>
    <main>
      <h1>Contact</h1>
    </main>
  </div>
</template>

<script>
import Header from "../components/Header.vue";
export default {
  name: "Contact",
  components: { Header },
};
</script>

<style>
</style>