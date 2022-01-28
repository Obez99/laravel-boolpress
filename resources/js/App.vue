<template>
  <div id="root">
    <transition name="slide" mode="out-in">
      <router-view></router-view>
    </transition>
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

.slide-enter-active,
.slide-leave-active {
  transition: opacity 0.5s, transform 0.5s;
}

.slide-enter,
.slide-leave-to {
  opacity: 0;
  transform: translateX(-30%);
}
</style>