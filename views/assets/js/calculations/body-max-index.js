/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      patients: [],
      vars: {
        height: 0.00,
        weight: 0.00
      },
      table: [
        {
          valuation: 'Peso inferior al normal',
          body_mass_index: 'Menos de 18.5'
        },
        {
          valuation: 'Normal',
          body_mass_index: '18.5 - 24.9'
        },
        {
          valuation: 'Peso superior al normal',
          body_mass_index: '25 - 29.9'
        },
        {
          valuation: 'Obesidad',
          body_mass_index: 'Más de 30'
        },
      ],
    },

    computed: {
      calc () {
        if (this.vars.height != 0 && this.vars.weight != 0) 
          var height = Math.pow(this.vars.height / 100, 2)
          var weight = this.vars.weight
          return Math.round(weight * 10 / height) / 10
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