<template>
  <div class="container">
    <Profil />
    <div class="feed">
      <Card />
    </div>
    <ads />
  </div>
</template>

<script>
import Ads from "../components/Ads.vue";
import Card from "../components/Card.vue";
import Profil from "../components/Profil.vue";
export default {
  name: "Home",
  components: {
    Profil,
    Ads,
    Card,
  },


};
</script>

<style lang="scss">
.container {
  display: flex;
  justify-content: center;
  align-items: flex-start;

  column-gap: 2vw;

  width: 100vw;

  .feed {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;

    padding: 15px 0;
    gap: 10px;
    width: 50vw;
    height: 84vh;
    overflow-y: scroll;
    background: #fff1cb;
    border-radius: 30px;
  }

  .feed::-webkit-scrollbar {
    display: none;
  }
}
</style>