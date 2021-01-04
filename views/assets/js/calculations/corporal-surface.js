/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      result: '',
      patients: [],
      vars: {
        height: 0.00,
        weight: 0.00
      },
      table: [
        {
          valuation: 'Normal',
          corporal_surface: 1.7
        },
        {
          valuation: 'Media en hombres',
          corporal_surface: 1.9
        },
        {
          valuation: 'Media en mujeres',
          corporal_surface: 1.6
        },
      ],
    },

    computed: {
      calc () {
        //Dubois Form
        var fixed = 3600
        if (this.vars.height != 0 && this.vars.weight != 0) 
          var height = this.vars.height
          var weight = this.vars.weight
          var partial = Math.pow((height * weight / fixed), 0.5)
          return Math.round(partial * 100) / 100
        return ''
      }
    },

    created () {
      var app = this
      var url = api_url + 'anthropometry/get-patient-general-info'
      app.loading = true
      app.$http.get(url).then(res => {
        app.loading = false
        app.patients = res.body
      }, err => {
        app.loading = false
      })
    },

    mounted () {
    },

    methods: {
      assignGeneralVars () {
        var app = this
        app.vars.weight = parseFloat(app.patient.weight)
        app.vars.height = parseFloat(app.patient.height)
      },
    }
});