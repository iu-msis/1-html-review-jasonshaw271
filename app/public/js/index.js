const Offer = {
    data() {
      return {
        books: [],
        "person": {},
        }
    },

    /* Added methods */
    methods: {
      /* fetches api data from randomuser.me */
      fetchUserData() {
        fetch('/api/student/')
            .then(response => response.json())
            .then((parsedJson) => {
                console.log(parsedJson);
                this.person = parsedJson.results[0]
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
