<template>
  <div class="containeritems">
    <div
          class="imgitem"
          :style="{
            backgroundImage:
              `url(http://localhost/Blaaango_Backend/storage/images/` +
              `${menu.image})`,
          }"
        ></div>

    <div class="titleandprice">
      <h3>{{menu.name}}</h3>

      <h2>{{menu.price}}</h2>
    </div>

    <div class="description" style="word-break: break-all">
      <h6>
        {{menu.description}}
      </h6>
    </div>

    <div class="starsandadd">
      <p>⭐⭐⭐⭐</p>

      <div class="btnadd">➕</div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Carditem",

props:{
  menu:Object
}
 
};
</script>

<style  scoped  lang="scss">
.containeritems {
  background-color: white;
  width: 250px;

  height: 300px;
  border-radius: 0px 20px;

  display: flex;

  flex-direction: column;

  gap: 18px;

  min-width: 250px;

  .imgitem {
    background-image: url(../assets/imgs/s22.jpg);
    width: 100%;
    height: 40%;

    background-position: center;
    background-size: cover;

    border-radius: 0px 20px;
  }
  .titleandprice {
    display: flex;
    justify-content: space-around;
    // align-content: center;
  }

  .starsandadd {
    display: flex;
    justify-content: space-between;
    align-items: center;

    .btnadd {
      width: 50px;
      height: 50px;
      background-color: orange;

      display: flex;
      justify-content: center;
      align-items: center;

      border-radius: 20px 0px 0px;
    }
  }
}
</style>