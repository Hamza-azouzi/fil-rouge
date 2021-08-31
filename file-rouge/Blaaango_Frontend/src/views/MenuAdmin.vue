<template>

  
  <div class="container" style="display:flex;width:100%;justify-content:space-between;   " >

<Navbaradmin active="menu" />

<div class="cont">

<h1>Menu</h1>
  

<Menuresteurant :restoid="restoid" />

</div>


<Formadd />



</div>

</template>

<script>
import Formadd from '../components/admin/Formadd.vue';



import Menuresteurant from '../components/admin/Menuresteurant.vue'
import Navbaradmin from '../components/admin/Navbaradmin.vue'
export default {

    name:"MenuAdmin",
  components: { Navbaradmin, Menuresteurant, Formadd,     },


     
    data() {
    return {
      data : [],
  restoid:null,

    };
  },

 created(){
           this.restoid  = this.$route.params.id // get id from url
           
 }

}
</script>

<style lang="scss" scoped>


.cont{


width: 80%;

 h1 {
    padding: 40px 2px;
    font-size: 50px;
    margin-left: 8%;
  }


}

 




</style>