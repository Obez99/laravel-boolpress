<template>
  <div id="root">
    <router-view></router-view>
    <Footer></Footer>
  </div>
</template>


<script>
import Footer from "./components/Footer.vue";

export default {
  name: "app",
  components: { Footer },
};
</script>

<style lang="scss">
#root {
  width: 100%;
}
</style>