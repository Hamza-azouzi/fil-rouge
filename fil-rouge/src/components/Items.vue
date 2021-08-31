<template>
  <div class="items">
    <carditem v-for="menu in menus" :key="menu.id" :menu="menu" />
  </div>
</template>

<script>
import Carditem from "./Carditem.vue";
export default {
  components: { Carditem },
  name: "items",

  props: {
    data: String,
  },

  data() {
    return {
      menus: [],
    };
  },

   methods : {
    
    async getMenu()
    { 
        let resp = await fetch(
        `http://localhost/Blaaango_Backend/MenuController/readmenuresto/${this.data}`  ,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
            },
          }
        );

        this.menus = await resp.json();

        console.log(this.menus);
    }
  },

  
  created(){
    this.getMenu()
  },
};
</script>

<style lang="scss">
.items {
  width: 100%;
  height: max-content;

  display: flex;

  overflow-x: scroll;

  column-gap: 20px;
}

.items::-webkit-scrollbar {
  display: none;
}
</style>