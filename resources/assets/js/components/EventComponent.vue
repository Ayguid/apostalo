<template>

  <div class="events">


    <div class="event">

      <div class="event_data">
        <a class="" href="#"><p class="">{{event.sport.description}}</p></a>
        <p>{{event.description}}</p>
        <p>{{event.competition.description}}</p>
        <p>{{event.competition.sport_category.description}}</p>
        <p v-for="team in event.teams"> <a href="#">{{team.description}}</a> </p>
      </div>




      <div class="available_bets">
        <h2 class="text-align">Available Bets</h2>

        <!-- <bets-component :event='event'></bets-component> -->
          <form class="betComponentForm" action="" method="post">
            <bet-component v-for="bet in event.bets" :bet="bet" :key="bet.id"></bet-component>
            <div class="col">
              <button type="submit" name="button">BET NOW</button>
            </div>
          </form>

      </div>

      <div class="clearfix"></div>




      <img class="float_left" :src="'/img/ranking-home.png'" alt="" >
      <img class="float_left" :src="'/img/ranking-home.png'" alt="" >

    </div>
  </div>

</template>

<script>
export default {
  props: ['event'],

  data(){
    return{

    }
  },


  mounted(){
  },


}
</script>
