<template>
  <div id="root">
    <Header></Header>
    <Main></Main>
    <Footer></Footer>
  </div>
</template>


<script>
import Header from "./components/Header.vue";
import Main from "./components/Main.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "app",
  components: { Header, Main, Footer },
};
</script>

<style lang="scss">
#root {
  width: 100%;
}
</style>