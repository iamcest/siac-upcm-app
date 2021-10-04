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
    countries: [],
    states: [],
    country_states: [],
    upcm: {
      upcm_logo: '',
      upcm_name: '',
      upcm_address: '',
      upcm_email: '',
      upcm_key: '',
      upcm_state: '',
      upcm_country: '',
      meta: {
        instagram: '',
        twitter: '',
        facebook: '',
      },
      members: null,
    },
  },

  computed: {
  },

  created() {
    this.initialize()
    this.loadCountries()
  },

  mounted() {
  },

  methods: {
    initialize() {
      var url = api_url + 'upcms/get-info'
      this.$http.get(url).then(res => {
        this.upcm = res.body;
        if (Array.isArray(this.upcm.meta)) {
          this.upcm.meta = {}
        }
      }, err => {

      })
    },

    loadCountries() {
      this.$http.get('/public/js/countries.min.json').then(res => {
        this.countries = res.body.countries
      }, err => {

      })
      this.$http.get('/public/js/states.min.json').then(res => {
        this.states = res.body.states
      }, err => {

      }).then( () => {
        this.getCountryAndStateID()
      }) 
    },

    prevImage(e) {
      const image = e.target.files[0]
      const reader = new FileReader()
      reader.readAsDataURL(image)
      reader.onload = e => {
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

    save() {
      var app = this
      var url = api_url + 'upcms/update-my-upcm'
      app.loading = true
      this.$http.post(url, app.upcm).then(res => {
        app.loading = false
        app.alert = true
        app.alert_type = res.body.status
        app.alert_message = res.body.message
      }, err => {

      })
    },

    filterStates() {
      var states = this.states
      var country = this.upcm.country_selected
      var results = states.filter( (state) => {
        return state.id_country == country
      });
      return this.country_states = results
    },

    getCountryName() {
      var app = this;
      var countries = app.countries
      var country_selected = app.upcm.country_selected
      var results = countries.filter( (country) => {
        return country.id == country_selected
      });
      return app.upcm.upcm_country = results[0].name;
    },

    getStateName() {
      var app = this;
      var states = app.states
      var state_selected = app.upcm.state_selected
      var results = states.filter( (state) => {
        return state.id == state_selected
      });
      return app.upcm.upcm_state = results[0].name;
    },

    getCountryAndStateID() {
      var app = this;
      var countries = app.countries
      var country_selected = app.upcm.upcm_country
      var country_results = countries.filter( (country) => {
        return country.name == country_selected
      });
      var states = app.states
      var state_selected = app.upcm.upcm_state
      var state_results = states.filter( (state) => {
        return state.name == state_selected
      });
      app.upcm.country_selected = country_results[0].id
      app.filterStates()
      app.upcm.state_selected = state_results[0].id
    },

    getLocation() {
      this.getCountryName();
      this.getStateName();
    },
  }
});