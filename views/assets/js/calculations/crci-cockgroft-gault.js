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
          birthdate: moment().format('YYYY-MM-DD'),
          gender: "M",
          weight: "0",
          weight_suffix: "kg",
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
      vars: {
        age: 0,
        gender: '',
        weight: 0.00,
        weight_suffix: 'kg',
        creatinine_serum: 0.00,
      },
    },

    computed: {
      calc () {
        var age = this.vars.age
        var gender = this.vars.gender
        weight = this.vars.weight_suffix == 'lb' ? (this.vars.weight / 2.205) : this.vars.weight
        var creatinine = this.vars.creatinine_serum

        if (gender == "F") {
          var R = (140 - age) * weight * 0.85 / (72 * creatinine)
        }
        else{
          var R = (140 - age) * weight / (72 * creatinine)
        }

        var RR = Math.round(R * 100) / 100;
        if (RR > 0 && RR != Infinity) {
          return RR;
        }
        return  '';
      }        
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
      assignGeneralVars () {
        var app = this
        var age = moment(app.patient.birthdate, "YYYY-MM-DD").fromNow().split(" ")[0]
        app.vars.age = age
        app.vars.gender = app.patient.gender
        app.vars.weight = parseInt(app.patient.weight)
        app.vars.weight_suffix = app.patient.weight_suffix
      },
    }
});