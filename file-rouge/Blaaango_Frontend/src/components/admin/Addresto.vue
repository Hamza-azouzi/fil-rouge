
<template>
  <div class="container">
    <form class="formstyle" @submit.prevent="createMenu">
      <!--<input type="text"  class="firstinput" />  -->

      <input hidden ref="image" type="file" id="im" @change="preview1" />
      <label
        for="im"
        class="firstinput"
        :style="{ 'background-image': 'url(' + url + ')' }"
      >
        <h1 v-if="url == ''">Choose image</h1>
      </label>
      <!--<img id="frame" class="firstinput" src="" width="100px" height="100px" />-->

      <input
        type="text"
        class="secondinput"
        v-model="name"
        placeholder="name"
      />

      
      <input
        type="text"
        class="secondinput"
        v-model="adresse"
        placeholder="addresse"
      />
      <input
        type="text"
        class="secondinput"
        v-model="localisation"
        placeholder="localisation"
      />
      <input
        type="text"
        class="secondinput"
        v-model="description"
        placeholder="description"
      />

      <input hidden ref="logo" type="file" id="imG" @change="preview2" />
      <label
        for="imG"
        class="thirdinput"
        :style="{ 'background-image': 'url(' + url1 + ')' }"
      >
        <h3 v-if="url1 == ''">Choose image</h3>
      </label>

      <button>Send</button>
    </form>
  </div>
</template>

<script>
export default {
  name: "Addresto",
  data() {
    return {
      url: "",
      url1: "",

      image: "",
      name: "",
      adresse: "",
      localisation: "",
      description: "",
     
    };
  },
  methods: {
    
    logLogo() {
      console.log(this.$refs.logo.files[0], this.$refs.image.files[0]);
    },
    createMenu() {
      var myHeaders = new Headers();

      var formdata = new FormData();
      formdata.append("image", this.$refs.image.files[0]);
      formdata.append("logo", this.$refs.logo.files[0]);
      formdata.append(
        "json",
        JSON.stringify({
          name: this.name,
          adresse: this.adresse,
          localisation: this.localisation,
          role: "admin",
          description: this.description,
        })
      );

      var requestOptions = {
        method: "POST",
        headers: myHeaders,
        body: formdata,
        redirect: "follow",
      };

      fetch(
        "http://localhost/Blaaango_Backend/RestoController/insert",
        requestOptions
      )
        .then((response) => response.json())
        .then((result) => {
          console.log(result);
          this.$emit("reloadMe");
          this.bindPlansWithOurResto();
        })
        .catch((error) => console.log("error", error));
    },

    preview1(event) {
      console.log(event.target.files[0]);
      this.url = URL.createObjectURL(event.target.files[0]);
    },

    preview2(event) {
      this.url1 = URL.createObjectURL(event.target.files[0]);
    },

    async addfood() {
      await fetch("http://localhost/Blaaango_Backend/RestoController/insert", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          image: this.url,
          name: this.name,
          adresse: this.adresse,
          localisation: this.localisation,
          logo: this.logo,
        }),
      });
    },
    
  },
  
};
</script>

<style lang="scss" scoped >
.container {
  width: 90%;
  height: 750px;
  background-color: #df0418;
  display: flex;
  align-items: center;
  flex-direction: column;
  margin: 141px 25px;
  border-radius: 17px;
  min-width: 30%;
  max-width: 35%;

  .formstyle {
    display: flex;

    flex-direction: column;

    // align-items:center ;

    justify-content: center;

    .firstinput {
      background-position: center;
      background-size: cover;
      background-color: grey;
      width: 400px;
      height: 200px;
      margin: 12px 0;
      border: none;
      display: flex;
      justify-content: center;
      align-content: center;
      align-items: center;
      border: 3px dashed black;
      border-radius: 15px;
      cursor: pointer;
      transition: 0.3s;
      &:hover {
        border: 0px dashed black;
        transition: 0.3s;
        transform: scale(1.04);
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.514);
      }
      h1 {
        color: honeydew;
      }
    }

    .secondinput {
      border: 2px solid transparent;
      background: rgb(218, 218, 218);
      color: rgb(68, 68, 68);
      border-radius: inherit;
      -webkit-transition: all 0.25s ease;
      transition: all 0.25s ease;
      padding: 7px 13px 7px 10px;
      font-size: 24px;
      width: 400px;
      height: 60px;
      margin: 12px 0;
      border: none;
      outline: none;
      border-radius: 15px;
      transition: 0.3s;
      padding-left: 10px;
      &:hover {
        border: 0px dashed black;
        transition: 0.3s;
        transform: scale(1.04);
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.514);
      }
      &:focus {
        padding-left: 20px;
        transition: 0.3s;
        border: 2px solid black;
      }
    }

    .thirdinput {
      border: 2px solid transparent;
      background: rgb(218, 218, 218);
      color: rgb(68, 68, 68);
      border-radius: inherit;
      -webkit-transition: all 0.25s ease;
      transition: all 0.25s ease;
      padding: 7px 13px 7px 10px;
      font-size: 24px;
      width: 400px;
      height: 60px;
      margin: 12px 0;
      border: none;
      outline: none;
      border-radius: 15px;
      transition: 0.3s;
      padding-left: 10px;
      &:hover {
        border: 0px dashed black;
        transition: 0.3s;
        transform: scale(1.04);
        box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.514);
      }
      &:focus {
        padding-left: 20px;
        transition: 0.3s;
        border: 2px solid black;
      }
    }
  }

  button {
    width: 120px;
    height: 40px;
    border-radius: 8px;
    width: 100px;

    margin: 20px 0;
  }
}
</style>