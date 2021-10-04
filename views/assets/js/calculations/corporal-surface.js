/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      result: '',
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
          var fixed = 3600
          var partial = Math.pow((height * weight / fixed), 0.5)
          var result = Math.round(partial * 100) / 100
          if (typeof result != NaN) {
            result += ' m2'
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