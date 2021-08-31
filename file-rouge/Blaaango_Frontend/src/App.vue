<template>
  <div id="nav">
    <Navbar
      v-if="
        !hiddenNavbar(['/admin', '/MenuAdmin', '/Planadmin', '/menuresto/'])
      "
    />
  </div>
  <router-view />
</template>

<script>
import Navbar from "./components/Navbar.vue";
export default {
  name: "App",
  components: {
    Navbar,
  },
  methods: {
    hiddenNavbar(arr) {
      console.log( arr.length);
      for (let i = 0; i < arr.length; i++) {
        if (this.$route.path.includes( arr[i]) ) {
          return true;
        }
      }
    },
  },
};
</script>
<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  // padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
