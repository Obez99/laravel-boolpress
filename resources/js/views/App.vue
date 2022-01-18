<template>
  <div id="root">
    <Jumbotron></Jumbotron>
  </div>
</template>


<script>
import Jumbotron from "../components/Jumbotron.vue";
export default {
  name: "app",
  components: { Jumbotron },
};
</script>

<style lang="scss">
#root {
  width: 100%;
}
</style>