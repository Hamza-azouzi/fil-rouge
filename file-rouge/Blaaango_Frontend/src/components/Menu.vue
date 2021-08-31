<template>
  <div class="plan">
    <div class="imgandplan">
      <div class="small_menu">
        <div class="withBorder">
          <div class="dot"></div>
          <div class="arrow-left"></div>
          <div class="rightsmrect">
            <div class="imgCrcl1"></div>
          </div>
        </div>
        <div class="withBorder">
          <div class="dot"></div>
          <div class="arrow-left"></div>
          <div class="rightsmrect">
            <div class="imgCrcl2"></div>
          </div>
        </div>
        <div class="withBorder">
          <div class="dot"></div>
          <div class="arrow-left"></div>
          <div class="rightsmrect">
            <div class="imgCrcl3"></div>
          </div>
        </div>
      </div>
      <!-- <div class="Circle"></div> -->

      <img  src="../assets/imgs/S9.jpg" alt="" />
    </div>

    <div class="cards">
      <div class="card1">
        🍔
        <h6>American</h6>
      </div>
      <div class="card1">
        ☕
        <h6>coffe</h6>
      </div>
      <div class="card1">
        🍜
        <h6>korean</h6>
      </div>
      <div class="card1">
        🍹
        <h6>cocktails</h6>
      </div>
    </div>

    <a href="https://www.google.co.uk/maps/@32.3013452,-9.2231495,15z"><div class="planlink"></div></a>
  </div>
</template>

<script>
export default {
  name: "Menu",
};
</script>

<style lang="scss">
.plan {
  width: 450px;
  height: 600px;
  background: #fff1cb;
  border-radius: 30px;
  display: flex;
  flex-direction: column;

  gap: 5%;

  .imgandplan {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;

    position: relative;
    height: 33%;
    padding: 20px;
    .small_menu {
      .withBorder {
        // width: 200px;
        border-left: dotted 6px salmon;
        height: 60px;
        display: flex;
        align-items: center;
        // background-color: royalblue;
        .dot {
          transform: translateX(-15px);
          width: 20px;
          height: 20px;
          border-radius: 25px;
          background-color: salmon;
        }
        .arrow-left {
          transform: translateX(-12px);

          width: 0;
          height: 0;
          border-top: 10px solid transparent;
          border-bottom: 10px solid transparent;
          border-right: 10px solid salmon;
        }
        .rightsmrect {
          // position: relative;

          transform: translateX(-15px);

          width: 40px;
          height: 40px;
          border-radius: 15px;
          background-color: salmon;
          // z-index: 0px;
          .imgCrcl1 {
            background-image: url("../assets/imgs/s20.png");
            width: 30px;
            height: 30px;
            background-size: cover;
            border-radius: 18px;
            margin: 5px auto;
          }
          .imgCrcl2 {
            background-image: url("../assets/imgs/s23.png");
            width: 30px;
            height: 30px;
            background-size: cover;
            border-radius: 18px;
            margin: 5px auto;
          }
          .imgCrcl3 {
            background-image: url("../assets/imgs/s26.jpg");
            width: 30px;
            height: 30px;
            background-size: cover;
            border-radius: 18px;
            margin: 5px auto;
          }
        }
      }
    }

    img {
      width: 300px;
      height: auto;
      border-radius: 20px;
      // margin: 20px 20px;
    }
  }

  .cards {
    display: flex;
    justify-content: space-evenly;
    align-items: center;

    .card1 {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;

      gap: 0px;

      //    gap: px;
      width: 70px;
      height: 70px;
      background: white;
      border-radius: 20px;
      h6 {
        margin: 2px;
      }
    }
  }

  a {
    background-image: url("../assets/imgs/p1.jpg");

    width: 100%;

    height: 50%;

    background-size: cover;
    background-repeat: no-repeat;

    border-radius: 9%;
  }
}
</style>