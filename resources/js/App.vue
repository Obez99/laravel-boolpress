<template>
  <div id="root">
    <Header></Header>
    <Main></Main>
  </div>
</template>


<script>
import Header from "./components/Header.vue";
import Main from "./components/Main.vue";

export default {
  name: "app",
  components: { Header, Main },
};
</script>

<style lang="scss">
#root {
  width: 100%;
}
</style>