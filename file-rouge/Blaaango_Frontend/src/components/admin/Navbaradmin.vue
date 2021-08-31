<template>
  <div class="navadmin">

  <router-link to="/">
  <div class="logo">

      <div class="logo1"></div>
      <div class="logo2"></div>
    </div>
  
  </router-link>
    

    <div class="menunav">
      <h1 :class="[active == 'restaurent' ? 'active' : '']"  @click="goto('/admin')">RESTAURENT</h1>
      <h1 :class="[active == 'menu' ? 'active' : '']" @click="goto('/MenuAdmin')">MENU</h1>
      <h1 :class="[active == 'plan' ? 'active' : '']" @click="goto('/Planadmin')">PLAN</h1>
      <h1 :class="[active == 'admin' ? 'active' : '']" >ADMIN</h1>
      <h1 :class="[active == 'client' ? 'active' : '']" >CLIENT</h1>
    </div>
  </div>
</template>

<script>
export default {
  name: "Navbaradmin",
  props: {
    active: String,
  },

methods: {



   goto(link){
      this.$router.push(link)
    },



}

};
</script>

<style lang="scss" scoped >
.navadmin {
  display: flex;

  flex-direction: column;

  height: 100%;
  position: fixed;
  background-color: white;
  //   border-radius: 20px;

  // width: 40%;
  min-width: 17%;

  .logo {
    display: flex;

    width: 100%;
    justify-content: center;
    align-items: baseline;
    margin-top: 40px;
    .logo1 {
      background-image: url(../../assets/imgs/b2.png);

      width: 80px;
      height: 66px;

      background-size: 70px;
      background-repeat: no-repeat;
    }
    .logo2 {
      background-image: url(../../assets/imgs/b1.png);
      background-repeat: no-repeat;

      width: 60%;
      height: 55px;
      background-size: 183px;
    }
  }

  .menunav {
    display: flex;
    flex-direction: column;
    gap: 25px;
    padding: 120px 0;
    font-size: small;
    .active{

      height: 61px;
    border: solid 4px green;

    width: 90%;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 0px 20px 20px 0px;

  
         
    }
      h1{
          color: orange; 
          }
  }
}
</style>