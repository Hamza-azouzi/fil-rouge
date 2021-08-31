<template>
  <div class="titleandcard">

    <div class="cards" v-for="d in data" :key="d.id">
      <div class="containeritems">
        <div
          class="imgitem"
          :style="{
            backgroundImage:
              `url(http://localhost/Blaaango_Backend/storage/images/` +
              `${d.image})`,
          }"
        ></div>

        <div class="titleandprice">
          <h3>{{ d.name }}</h3>

          <h2>{{ d.price }}</h2>
        </div>

        <div class="description">
          <h6>
            {{ d.description }}
          </h6>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Menuresteuran",

  props: {
    restoid: Number,
  },

  data() {
    return {
      data: [],
    };
  },

  methods: {
    getImage(str) {
      console.log(str);
    },

    async Menu() {
      if (this.restoid) {
        let resp = await fetch(
        `http://localhost/Blaaango_Backend/MenuController/readmenuresto/${this.restoid}`  ,
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
            },
          }
        );

        this.data = await resp.json();

        console.log(this.data);
        // console.log(this.data[0].Interests);
      } else {
        let resp = await fetch(
          "http://localhost/Blaaango_Backend/MenuController/read",
          {
            method: "GET",
            headers: {
              "Content-Type": "application/json",
            },
          }
        );

        this.data = await resp.json();

        console.log(this.data);
        // console.log(this.data[0].Interests);
      }
    },
  },

  created() {
    this.Menu();
  },
};
</script>

<style lang="scss" scoped>
.titleandcard {
  display: flex;
  margin-left: 40%;
  justify-content: space-evenly;

  flex-wrap: wrap;
  width: 74%;
  max-width: 55%;
  .cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 2%;

    .containeritems {
      background-color: white;
      width: 250px;

      height: 300px;
      border-radius: 20px;

      display: flex;

      flex-direction: column;

      gap: 18px;

      min-width: 250px;

      &:hover {
        transform: scale(1.05);
        transition: 0.2s;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.493);
      }

      .imgitem {
        height: 50%;
        width: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        position: center;
        background-position: right;
        border-radius: 20px;
      }
      .titleandprice {
        display: flex;
        justify-content: space-around;
        // align-content: center;
      }
    }
  }
}
</style>