const Offer = {
    data() {
      return {
        "person": {},
        }
    },

    created() {
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
  }
  
Vue.createApp(Offer).mount('#offerApp');
