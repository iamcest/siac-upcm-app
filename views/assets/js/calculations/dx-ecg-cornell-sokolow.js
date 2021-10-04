/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      patients: [
        {
          full_name: "",
          gender: "M",
        }
      ],
      genders: 
      [
        {
          gender: 'Masculino',
          abbr: 'M'
        },
        {
          gender: 'Femenino',
          abbr: 'F'
        }
      ],
      calc: {
        cornell:{
          gender: '',
          wave_r_avl: 0,
          wave_s_v3: 0,
        },
        sokolow_lyon: {
          wave_s_v6: 0,
          wave_r_v5: 0
        },
      },
    },

    computed: {
      calcC () {
        var vars = this.calc.cornell
        return parseInt(vars.wave_r_avl) + parseInt(vars.wave_s_v3)
      },
      calcSL () {
        var vars = this.calc.sokolow_lyon
        return parseInt(vars.wave_s_v6) + parseInt(vars.wave_r_v5)
      }
    },

    created () {
    },

    mounted () {
      var app = this
      var url = api_url + 'patients/get-patient-general-info'
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

    methods: {
      assignGeneralVars () {
        var app = this
        app.calc.cornell.gender = app.patient.gender
      },
    }
});