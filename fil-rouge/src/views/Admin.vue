<template>

  <div class="container"    style="display: flex; width: 100%; justify-content: space-between"  >

    

    <Navbaradmin active="restaurent" />
    <Restaurants :key="reload" />

    <Addresto @reloadMe="reloadMe" />

  </div>
</template>

<script>
import Addresto from "../components/admin/Addresto.vue";
import Navbaradmin from "../components/admin/Navbaradmin.vue";
import Restaurants from "../components/admin/Restaurants.vue";
export default {
  name: "Admin",
  data() {
    return {
      reload: 0,
    };
  },
  components: { Navbaradmin, Restaurants, Addresto },
  methods: {
    reloadMe() {
      this.reload++;
    },
  },
};
</script>

<style scoped lang="scss" >
</style>