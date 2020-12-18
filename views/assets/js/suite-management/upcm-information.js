/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      alert: false,
      image_loading: false,
      upload_button: false,
      alert_type: '',
      alert_message: '',
      previewImage: '',
      upcm: {
        upcm_name: '',
        upcm_key: '',
        upcm_state: '',
        upcm_country: '',
        members: null,
      },
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
        var url = api_url + 'upcms/get-info'
        this.$http.get(url).then(res => {
          this.upcm = res.body;
        }, err => {

        })
      },

      prevImage(e){
        const image = e.target.files[0]
        const reader = new FileReader()
        reader.readAsDataURL(image)
        reader.onload = e =>{
            this.upcm.upcm_logo = image;
            this.previewImage = e.target.result
            this.upload_button = true
        };
      },

       uploadImage(event) {
        var app = this
        let data = new FormData()
        var url = api_url + 'upcms/change-logo'
        app.image_loading = true
        data.append('upcm_logo', app.upcm.upcm_logo);
        app.$http.post(url, data).then(res => {
          app.image_loading = false
          app.alert = true
          app.alert_type = res.body.status
          app.alert_message = res.body.message
        }, err => {

        })
      },

      save_name () {
        var app = this
        var url = api_url + 'upcms/change-name'
        var name = {upcm_name: app.upcm.upcm_name}
        app.loading = true
        this.$http.post(url, name).then(res => {
          app.loading = false
          app.alert = true
          app.alert_type = res.body.status
          app.alert_message = res.body.message
        }, err => {

        })
      }
    }
});