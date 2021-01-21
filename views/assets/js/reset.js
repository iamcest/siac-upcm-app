let params = new URLSearchParams(location.search);
const resetCode = params.get('code');
/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      alert: false,
      alert_message: '',
      alert_type: '',
      email: '',
      email_reset: '',
      password: '',
      password_confirm: '',
      valid_text: '',
    },

    computed: {
    },

    created () {
    },

    mounted () {
    },

    methods: {

      resetPassword () {
        var url = api_url + 'members/reset-password'
        var app = this
        app.valid_text = ''
        if(app.password != app.password_confirm) {
          app.valid_text = 'Las contraseñas deben ser iguales para continuar'
          return false
        }
        var email = app.email_reset

        app.loading = true
        app.alert = false
        app.$http.post(url, {code: resetCode, password: app.password}).then(res => {
          app.loading = false
          app.alert_message = res.body.message
          app.alert_type = res.body.status
          app.alert = true
          if (res.body.status == 'success') {
            window.open(window.location.origin + '/login', '_blank');
          }
        }, err => {
          app.loading = false
        })
      }
  	}
});