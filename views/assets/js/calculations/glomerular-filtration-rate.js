/*VUE INSTANCE*/
let vm = new Vue({
  vuetify,
  el: '#siac-suite-container',
  data: {
    loading: false,
    patient: {},
    patients: [
      {
        full_name: '',
        age: 1,
        gender: 'M',
        birthdate: current_date,
      }
    ],
    vars: {
      gender: 'M',
      age: 1,
      race: 1,
      race_selected: '1',
      serum_creatinine: 0,
      metodology: 'CKD-EPI',
    },
    genders: [
      {
        gender: 'Masculino',
        abbr: 'M'
      },
      {
        gender: 'Femenino',
        abbr: 'F'
      }
    ],
  },

  computed: {
    calc() {
      var result = this.vars.metodology == 'MDRD (IDMS)' ? this.gfrCkdEpiFx() : this.gfrRrmdFx()
      return result != Infinity && result != NaN ? result : ''
    }
  },

  created() {
    var app = this
    var url = api_url + 'anthropometry/get-patient-general-info'
    app.loading = true
    app.$http.get(url).then(res => {
      app.loading = false
      res.body.forEach((e, i) => {
        app.patients.push(e)
      });
    }, err => {
      app.loading = false
    })
  },

  methods: {

    gfrCkdEpiFx() {
      var app = this
      var formula = app.vars
      var gender = formula.gender

      var sex = gender == 'M' ? 1 : 1.018
      var alpha = gender == 'M' ? -0.411 : -0.329
      var kappa = gender == 'M' ? 0.9 : 0.7
      var serum_creatinine = formula.serum_creatinine
      var race = formula.race

      var age = formula.age

      var GFR = 141 * Math.pow(Math.min(serum_creatinine / kappa, 1), alpha)
        * Math.pow(Math.max(serum_creatinine / kappa, 1), -1.209)
        * Math.pow(0.993, age) * sex * race

      return GFR.toFixed(2)

    },

    gfrRrmdFx() {
      var app = this

      var formula = app.vars
      var gender = formula.gender

      var sex = gender == 'M' ? 1 : 0.742
      var serum_creatinine = formula.serum_creatinine
      var race = formula.race

      var age = formula.age

      var GFR = 175 * Math.pow(serum_creatinine, -1.154) * Math.pow(age, -0.203)
        * sex * race;

      return GFR.toFixed(2)

    },

    assignGeneralVars() {
      var app = this
      app.vars.gender = app.patient.gender
      app.vars.age = parseInt(moment().diff(app.patient.birthdate, 'years'))
    },

    assignGFRVars(metodology) {
      var app = this
      var mdrd = app.vars
      if (metodology == 'CKD-EPI') {
        app.vars.serum_creatinine = mdrd.serum_creatinine
        app.vars.race = mdrd.race_selected == '1.21' ? 1.159 : 1
      }
    },

  }
});