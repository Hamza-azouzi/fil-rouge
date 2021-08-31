<template>
  <div class="content3">
    <div class="scard">
      <img src="../assets/imgs/C.jpg" alt="" />
    </div>
    <div class="scard">
      <img src="../assets/imgs/m.jpg" alt="" />
    </div>
  
  </div>
</template>

<script>
export default {
    name:"Ads"
};
</script>

<style lang="scss">

.content3 {

  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;

  width: 400px;
  height: 500px;
  background: #fff1cb;
  border-radius: 30px;

  .scard {
    display: flex;
    width: 90%;
    height: 230px;
    // background: red;
    border-radius: 30px;
    margin: 15px;
    img {
      border-radius: 20px;
      width: 100%;
    }
  }
}


</style>