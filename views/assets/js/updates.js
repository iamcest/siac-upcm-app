/*VUE INSTANCE*/
moment.locale('es')
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      updates: []
    },

    computed: {
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {
      initialize () {
        var app = this
        var url = api_url + 'updates/get'
        app.$http.get(url).then( res => {
          if (res.body.length > 0) {
            app.updates = res.body
          }
        }, err => {

        })
      },

      fromNow (d) {
        return moment(d).fromNow();
      },

      getAlertClass (c) {
        if (c == 'update') {
         return 'success' 
        }
        else if (c == 'delete') {
          return 'error'
        }
        else {
          return 'primary'
        }
      }

  	}
});