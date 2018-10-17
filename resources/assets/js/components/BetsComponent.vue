<template>

  <div class="">

    <form class="betComponentForm" action="" method="post">

      <bet-component v-for="bet in event.bets" :bet="bet"></bet-component>


      <div class="col">
        <button type="submit" name="button">BET NOW</button>
      </div>

    </form>

  </div>

</template>

<script>
export default {
  props: ['event'],




  mounted(){

  },


}
</script>
