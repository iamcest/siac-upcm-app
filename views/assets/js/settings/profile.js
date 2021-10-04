/*VUE INSTANCE*/
Vue.use(VueTelInputVuetify, {
  vuetify,
});
let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    barAlert: false,
    barTimeout: 1000,
    barMessage: '',
    barType: '',
    loading: false,
    image_loading: false,
    upload_button: false,
    alert: false,
    alert_type: '',
    alert_message: '',
    menu: '',
    previewImage: '',
    form: {
      user_id: '',
      avatar: '',
      first_name: '',
      last_name: '',
      email: '',
      telephone: '',
      birthdate: '',
      gender: '',
      rol: '',
      telegram: '0',
      whatsapp: '0',
      sms: '0',
      password: '',
      password_confirm: '',
    },
    genders:
      [
        {
          gender: 'Masculino',
          value: 'M'
        },
        {
          gender: 'Femenino',
          value: 'F'
        }
      ]
  },

  computed: {
  },

  created() {
    this.getProfile()
  },

  mounted() {
  },

  methods: {
    getProfile() {
      var app = this
      var url = api_url + 'members/get-profile'
      app.$http.get(url).then(res => {
        console.log(res)
        app.form = res.body;
      }, err => {

      })
    },

    prevImage(e) {
      const image = e.target.files[0]
      const reader = new FileReader()
      reader.readAsDataURL(image)
      reader.onload = e => {
        this.form.avatar = image;
        this.previewImage = e.target.result
        this.upload_button = true
      };
    },

    uploadImage(event) {
      var app = this
      let data = new FormData()
      var url = api_url + 'members/update-avatar'
      app.image_loading = true
      data.append('avatar', app.form.avatar);
      app.$http.post(url, data).then(res => {
        app.image_loading = false
        activateAlert(res.body.message, res.body.status)
      }, err => {

      })
    },

    save() {
      var app = this
      var url = api_url + 'members/update-profile'
      app.loading = true
      app.$http.post(url, app.form).then(res => {
        app.loading = false
        app.alert_message = res.body.message
        app.alert_type = res.body.status
        app.alert = true
      }, err => {
      })
    },

    getTelephoneInput(text, data) {
      this.form.telephone = data.number.international
    },

  }
});