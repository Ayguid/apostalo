<template >


  <div class="">


    <feedmenu-component v-on:filterBySport="filter = $event; showEvents($event);"></feedmenu-component>


    <event-component v-for="event in events"
    :key="event.id"
    :event="event">
  </event-component>


  <p v-if="events.length == 0">No hay eventos por el Momento</p>


</div>


</template>





<script>
export default {


  data(){
    return{
      events: [],
      filter:'',
    }
  },


  methods:{
    showEvents(filter) {
      axios.get('api/events/'+ filter).then((response) => {
        this.events = response.data;
        // console.log(response);
      });
    },
  },


  mounted() {
    this.showEvents(this.filter);
    setInterval(()=>{
      this.showEvents(this.filter)
    },7000);
  }


}
</script>
