<template>
  <div class="titleandcards">
    <div class="title">
      <h1>Restaurants</h1>
    </div>
    <div class="Res" >

      <div v-for="d in data" :key="d.id" >
      
      
         <router-link :to="{ name: 'menuresto', params: { id: d.id } }">

        <div class="cardRes"  >

      
          <div class="imgcard" 
          
          :style="{
            backgroundImage:
              `url(http://localhost/Blaaango_Backend/storage/images/` +
              `${d.image})`,
          }"

          ></div>

          <div class="titleRest">

            <h1>{{ d.name }}</h1>

          </div>
        </div>
        </router-link>

      </div>

    </div>
  </div>
</template>

<script>
export default {

  name: "Restaurants",



   data() {
    return {
      data: [],
    };
  },

 

  methods:{

    goto(link){
      this.$router.push(link)
    },

     getImage(str) {
      console.log(str);
    },


async Resto(){
  
      let resp = await fetch(
        "http://localhost/Blaaango_Backend/RestoController/read",
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
    this.Resto();
  },

  }



</script>

<style lang="scss" scoped>
.titleandcards {
  margin-left: 19%;

  display: flex;
  flex-direction: column;
  align-items: end;

  .title {
    padding: 40px 19px;
    font-size: 28px;
  }

  .Res {

    display: flex;
    flex-wrap: wrap;

    justify-content: space-evenly;
    gap: 30px;
    max-width: 98%;

    .cardRes {
      width: 350px;
      height: 200px;

      background-color: white;

      border-radius: 20px;

      display: flex;
      justify-items: center;
      justify-content: center;
      flex-direction: column;

      border-radius: 15px;
      transition: 0.2s;

      &:hover {
        transform: scale(1.05);
        transition: 0.2s;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.493);
      }

      .imgcard {
        width: 350px;

        height: 150px;

        border-radius: 15px;

        background-image: url(../../assets/imgs/s15.jpg);

        background-size: cover;
        background-position: center;
      }
      .titleRest {
        padding: 7px;
      }
    }
  }
}
</style>