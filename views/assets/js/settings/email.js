/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      no_valid: true,
      alert: false,
      alert_type: '',
      alert_message: '',
      email_servers: [
        {
          text: 'Gmail',
          val: 'gmail'
        },
        {
          text: 'Outlook',
          val: 'outlook'
        }
      ],
      form: {
        email: '',
        password: '',
        email_service: ''
      }
    },

    computed: {
    },

    watch: {
      form: {
        deep: true,
        handler () {
          this.check()
        }
      }
    },

    created () {
      this.initialize()
    },

    mounted () {
    },

    methods: {

      initialize () {
        var app = this
        var url = api_url + 'users-smtp/get'
        app.loading = true
        app.$http.post(url, app.form).then(res => {
          app.form = res.body
          app.loading = false
        }, err => {

        })
      },

      store () {
        var app = this
        var url = api_url + 'users-smtp/store'
        app.loading = true
        app.$http.post(url, app.form).then(res => {
          app.loading = false
          app.alert = true
          app.alert_type = res.body.status
          app.alert_message = res.body.message
        }, err => {

        })
      },

      check () {
        var app = this
        var form = app.form
        var email = form.email
        var email_service = form.email_service
        if (email == '' || email_service == '') 
          app.no_valid = true
        else
          app.no_valid = false
      }
  	}
});