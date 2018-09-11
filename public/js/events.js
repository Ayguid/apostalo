
new Vue ({

  el: '#below-carousel',

  data:{
    events:[]
  },

  methods: {

    showEvents: function() {
      axios.get('api/events').then(response => this.events = response.data
      );
    }


  },

  mounted(){


    this.showEvents();
    setInterval(()=>{
      this.showEvents()
    },2000);

  },

});
