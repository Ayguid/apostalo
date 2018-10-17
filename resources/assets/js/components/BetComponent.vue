<template>

  <div class="">





    <span>{{bet.description}}</span>  <span v-if="bet.team !==null" >{{bet.team.description}}</span>


    <div class="form-row">
      <div class="col">
        <span class="form-control payout">{{bet.payout}}x</span>
      </div>
      <div class="col">
        <input class="form-control bet_amount" v-on:input="payout = $event.target.value" type="number"  value="" placeholder="Ingrese un Monto">
      </div>
      <div class="col">
        <input v-if="payout == ''" class="form-control payout" type="number" placeholder="Ganancia">
        <input v-else class="form-control payout" type="number" :value="payout * bet.payout" placeholder="Ganancia">
      </div>
    </div>







  </div>

</template>

<script>
export default {
  props: ['bet'],



  data(){
    return{
      payout:'',
    }
  },



  mounted(){

  },


}
</script>
