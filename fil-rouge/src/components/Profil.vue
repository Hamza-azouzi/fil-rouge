<template>
  <div class="content1">
    <div class="photodeprofil">
      <!-- <img src="../assets/imgs/s13.jpg" alt="" /> -->
    </div>
    <h1>Hamza Azouzi</h1>
  </div>
</template>

<script>
export default {
  name: "Profil",
};
</script>


<style lang="scss">


.content1 {
  display: flex;
  justify-content: center;
  align-items: center;

  flex-direction: column;
  position: relative;
  width: 15%;
  height: 250px;
  background: #fff1cb;
  border-radius: 30px;

  
    min-width: 280px;


  .photodeprofil {
    display: flex;
    justify-content: center;
    align-items: center;
    top: 4px;
    margin: 15px;
    position: relative;
    width: 120px;
    height: 120px;
    z-index: 1;
    border-radius: 100px;

    overflow: hidden;


    background-image: url(../assets/imgs/s13.jpg);

    background-size: cover;
    background-size: cover;
    background-position: center;
 }

}

    .content1::before {
        position: absolute;
        content: "";
        width: 100%;
        height: 50%;
        background-color: #dfdfdf;
        top: 0;
        left: 0;
        border-radius: 30px;
        z-index: 0;
    }
</style>