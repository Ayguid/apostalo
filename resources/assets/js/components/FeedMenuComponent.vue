<template>

  <div class="">

    <ul class="feed_menu ">
      <li  v-for="sport in sports" ><a v-on:click="filterBySport(sport.id)" class="badge badge-secondary" href="#">{{sport.description}}</a></li>

    </ul>
    <a v-on:click="filterBySport('')" class="badge badge-secondary" href="#">All Sports</a>

  </div>

</template>

<script>
export default {


  data(){
    return{
      sports:[],
    }
  },


  methods:{
    showSports: function(){
      axios.get('api/sports/').then(response => this.sports = response.data);
    },
    filterBySport(e){
      this.$emit('filterBySport', e);// this.$parent.showEvents(e);
    },
  },


  mounted(){

    this.showSports();
  }


}


</script>
