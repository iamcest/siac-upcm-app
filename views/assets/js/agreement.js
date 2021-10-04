/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
    },

    computed: {
    },

    created () {
    },

    mounted () {
    },

    methods: {
      processPrivacyPolicy (answer) {
        var url = api_url + 'members/' + answer + '-privacy-policy'
        var app = this
        app.loading = true
        app.alert = false
        app.$http.get(url).then(res => {
          app.loading = false
          if (res.body.status == 'success') 
            location.reload()
        }, err => {

        })
      },

  	}
});