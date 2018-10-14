<template>
  <div class="events">

            <div class="event" v-for='event in events' :key="event.id">

                <p>{{event.description}}</p>
                <p>{{event.sport.description}}</p>
                <p>{{event.competition.description}}</p>
                <p>{{event.competition.sport_category.description}}</p>

                <img class="float_left" :src="'/img/sports.gif'" alt="" >
                <img class="float_left" :src="'/img/sports.gif'" alt="" >

                <!-- <button type="button" name="button">Aposta</button> -->
            </div>
  </div>

</template>

<script>
export default {
  data(){
    return{
      events:[],
      authuser:window.Laravel.user,
      authadmin:window.Laravel.admin,
    }
  },
  methods:{
    showEvents: function() {
      axios.get('api/events').then(response => this.events = response.data
  );
},
  },
  mounted() {
    this.showEvents();
    setInterval(()=>{
  this.showEvents()
},7000);
    console.log('Component mounted.')
  }
}
</script>
