/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      patients: [
        {
          full_name:"",
          weight:"0",
          height: "0",
          weight_suffix: "kg",
          height_suffix: "cm"
        }
      ],
      vars: {
        height: 0.00,
        weight: 0.00,
        height_suffix: "cm",
        weight_suffix: "kg"
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
    },

    created () {
      var app = this
      var url = api_url + 'anthropometry/get-patient-general-info'
      app.loading = true
      app.$http.get(url).then(res => {
        app.loading = false
        res.body.forEach( (e, i) => {
          app.patients.push(e)
        });
      }, err => {
        app.loading = false
      })
    },

    mounted () {
    },

    methods: {
      calc (vars) {
        if (vars.height != 0 && vars.weight != 0) {
          weight = vars.w_suffix == 'lb' ? (vars.weight / 2.205) : vars.weight
          height = vars.h_suffix == 'in' ? (vars.height * 2.54) : vars.height
          height = Math.pow(height / 100, 2)
          var result = Math.round(weight * 10 / height) / 10
          if (typeof result != NaN) {
            result += ' kg/m2'
          }
          return result
        }
      },

      assignGeneralVars () {
        var app = this
        app.vars.weight = parseFloat(app.patient.weight)
        app.vars.weight_suffix = app.patient.weight_suffix
        app.vars.height = parseFloat(app.patient.height)
        app.vars.height_suffix = app.patient.height_suffix
      },
    }
});