<template>
  

  <div class="container"    style="display: flex; width: 100%; justify-content: space-between"  >

<Navbaradmin  active="plan" />

<div class="titleandcards">

  <div class="title">
  
      <h1>Plan</h1>
    </div>
<div class="Plans">

<Cardplan />

</div>




</div>
<Addplan />


    </div>
</template>

<script>

import Navbaradmin from '../components/admin/Navbaradmin.vue'


import Cardplan from '../components/admin/Cardplan.vue'
import Addplan from '../components/admin/Addplan.vue'

export default {
  components: { Navbaradmin, Cardplan, Addplan,  },

    name:"planadmin"

}
</script>

<style lang="scss"  scoped >

.titleandcards{

margin-left: 19%;

  display: flex;
  flex-direction: column;
  align-items: end;

  .title {
    padding: 40px 19px;
    font-size: 28px;
  }
  .Plans{

    
    display: flex;
    flex-wrap: wrap;

    justify-content: space-evenly;
    gap: 30px;
    max-width: 98%;

  }
}


</style>