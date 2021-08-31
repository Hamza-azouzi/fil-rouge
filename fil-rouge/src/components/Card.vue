<template>
  <div class="card" v-for="d in data" :key="d.id">
    <div
      class="imgcard"
      :style="{
        backgroundImage:
          `url(http://localhost/Blaaango_Backend/storage/images/` +
          `${d.image})`,
      }"
    ></div>
    <div class="separator"></div>

    <div class="plancard">
      <div
        class="titreplan"
        style="
          margin-top: 20px;
          display: flex;
          flex-direction: column;
          gap: 13px;
        "
      >
        <div class="titrep">
          <h3>{{ d.name }}</h3>
          <span> {{ d.Interests }}</span>
        </div>

        <h4 style="margin-top: 14px; width: 100%; display: flex">
          ⏲ &nbsp;&nbsp;&nbsp; {{ d.time }}
        </h4>

        <h4 style="width: 100%; display: flex">
          🧭 &nbsp;&nbsp;&nbsp; {{ d.location }}
        </h4>

        <div class="line"></div>
        <div class="like">
          <span> ⭐⭐⭐⭐ </span>

          <span> 👍 (45) </span>
          <span class="btnplan">
            <router-link :to="{ name: 'food', params: { id: d.id } }"
              >go</router-link
            >
          </span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// import img from './assets/imgs/s17.jpg';
export default {
  name: "Card",

  data() {
    return {
      data: [],
    };
  },

  methods: {
    async Plan() {
      let resp = await fetch(
        "http://localhost/Blaaango_Backend/PlanController/read",
        {
          method: "GET",
          headers: {
            "Content-Type": "application/json",
          },
        }
      );
      this.data = await resp.json();

      console.log(this.data);
    },
  },

  created() {
    this.Plan();
  },
};
</script>

<style  lang="scss">
.card {
  position: relative;
  // margin: 20px;

  display: flex;
  justify-content: space-between;
  align-items: center;

  gap: 10px;

  width: 90%;
  height: 250px;
  background: #986858;
  border-radius: 30px;

  .imgcard {
    width: 50%;
    height: 100%;
    border-radius: 30px;
    border-bottom-right-radius: 0px;
    border-top-right-radius: 0px;
    overflow: hidden;
    background-size: cover;
    background-position: center;

    background-image: url(../assets/imgs/s17.jpg);
  }
  .separator {
    width: 50px;
    height: 100%;
    background: linear-gradient(90deg, #98685800 0%, #986858 75%, #986858 100%);

    left: 43%;
    position: absolute;
  }
  .plancard {
    padding: 0 20px;
    margin-right: 20px;
    height: 92%;
    width: 50%;
    background: white;
    border-radius: 25px;

    .titrep {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .line {
      width: 90%;
      height: 1px;
      background: black;
      margin: 10px 20px;
    }

    .like {
      display: flex;
      justify-content: space-between;
      align-items: center;

      .btnplan {
        display: flex;
        justify-content: center;
        align-items: center;

        width: 35px;
        height: 35px;
        background: orange;
        border-radius: 50px;
        a {
          text-decoration: none;
        }
      }
    }
  }
}
</style>