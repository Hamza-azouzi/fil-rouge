<template>

  <div class="content"  v-for="d in data" :key="d.id" >

    <div class="imgplan"
    
     :style="{

            backgroundImage:
              `url(http://localhost/Blaaango_Backend/storage/images/` +
              `${d.image})`,
          }"
    >
    </div>

    <div class="title">

      <h1>{{ d.name }}</h1>

    </div>
  </div>
</template>

<script>





export default {



  name: "Cardplan",





  props: {
    data: Array,
  },

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
      // console.log(this.data[0].Interests);
    },
  },

  created() {
    this.Plan();
  },
  
};

























//   data() {
//     return {
//       data: [],
//     };
//   },
//  methods:{
 
//      getImage(str) {
//       console.log(str);
//     },

 


// async Plan(){
//       let resp = await fetch(
//         "http://localhost/Blaaango_Backend/PlanController/read",
//         {
//           method: "GET",
//           headers: {
//             "Content-Type": "application/json",
//           },
//         }
//       ); 
//       this.data = await resp.json();

//       console.log(this.data);
//     },


// },

// created() {
//     this.Plan();
//   },



</script>

<style lang="scss" scoped>
.content {
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

  .imgplan {
    width: 350px;

    height: 150px;

    border-radius: 15px;

    background-image: url(../../assets/imgs/s18.jpg);

    background-size: cover;
    background-position: center;
  }
  .title {
    padding: 7px;
  }
}
</style>