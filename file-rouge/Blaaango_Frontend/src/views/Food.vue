<template>

<div class="container">
    <Profil/>
    <div class="food">

    <Foodcard  v-for="dt in data"  :data="dt" :key="dt" />
 
    </div>
    <Menu/>
  </div>

</template>

<script>
import Foodcard from '../components/Foodcard.vue';

import Profil from '../components/Profil.vue';
import Menu from '../components/Menu.vue';
export default {
    name: "food",
    data()
    {
      return {
        data : []
      }
    },
  methods : {
    
    async getResto()
    { 
        let id = this.$route.params.id // get id from url
        console.log(id);
        let resp = await fetch("http://localhost/Blaaango_Backend/RestoController/readResto",{
          method: "POST",
          headers: {
            "Content-type" : "application/json"
          },
          body : JSON.stringify({
            id_plan : id
          })
        })
        this.data = await resp.json() 
        console.log(this.data);
    }
  },

  
  created(){
    this.getResto()
  },


  components: { Profil, Foodcard, Menu },

  
};
</script>

<style lang="scss">
.food {
  align-content: flex-start;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;

  // flex-direction: column;
  padding: 15px;
  gap: 10px;
  width: 30vw;
  height: 84vh;
  overflow-y: scroll;
  background: #fff1cb;
  border-radius: 30px;
}

.food::-webkit-scrollbar {
  display: none;
}
</style>