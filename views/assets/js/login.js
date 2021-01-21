/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      dialog: false,
      loading: false,
      reset_loading: false,
      alert: false,
      alert_message: '',
      alert_type: '',
      email: '',
      email_reset: '',
      password: '',
    },

    computed: {
    },

    created () {
    },

    mounted () {
    },

    methods: {
      login () {
        var url = api_url + 'members/sign-in'
        var app = this
        var email = app.email
        var password = app.password
        app.loading = true
        app.alert = false
        app.$http.post(url, {email, password}).then(res => {
          app.loading = false
          app.alert_message = res.body.message
          app.alert_type = res.body.status
          app.alert = true
          if (res.body.status == 'success') 
            window.location = res.body.data
        }, err => {

        })
      },

      resetPassword () {
        var url = api_url + 'members/ask-reset-password'
        var app = this
        var email = app.email_reset
        app.reset_loading = true
        app.alert = false
        app.$http.post(url, {email: email}).then(res => {
          app.reset_loading = false
          app.alert_message = res.body.message
          app.alert_type = res.body.status
          app.alert = true
          app.dialog = false
        }, err => {
          app.reset_loading = false
          
        })
      }
  	}
});