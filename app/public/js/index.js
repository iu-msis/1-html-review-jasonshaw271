const Offer = {
    data() {
      return {
        "person": {},
        }
    },

    /* Added methods */
    methods: {
      /* fetches api data from randomuser.me */
      fetchUserData() {
        fetch('https://randomuser.me/api/')
            .then(response => response.json())
            .then((parsedJson) => {
                console.log(parsedJson);
                this.person = parsedJson.results[0]
                console.log("C");
            })
            .catch( err => {
                console.error(err)
            })
          }
    },
    created() {
      this.fetchUserData();
    }
  }
  
Vue.createApp(Offer).mount('#offerApp');
