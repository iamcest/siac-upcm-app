/*VUE INSTANCE*/
let vm = new Vue({
    vuetify,
    el: '#siac-suite-container',
    data: {
      loading: false,
      patient: {},
      patients: [],
      workout: [
        {text: 'Sí', val: 0}, 
        {text: 'No', val: 2}
      ],
      healthy_food: [
        {text: 'Todos los días', val: 0}, 
        {text: 'No todos los días', val: 1}
      ],
      high_glucose: [
        {text: 'No', val: 0}, 
        {text: 'Sí', val: 5}
      ],
      family_diabete: [
        {text: 'Sí: padres, hermanos o hijos', val: 5}, 
        {text: 'Sí: abuelos, tíos o primos', val: 3}, 
        {text: 'Otros parientes o ninguno', val: 0}, 
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
        age: 1,
        bmi: '',
        gender: '',
        perimeter: 0,
        workout: 0,
        healthy_food: 0,
        high_glucose: '',
        family_diabete: '',
      },
    },

    computed: {
      calc () {
        var age = this.ageScore()
        var bmi = this.bmiScore()
        var workout = this.vars.workout
        var perimeter = this.perimeterScore()
        var healthy_food = this.vars.healthy_food
        var high_glucose = this.vars.high_glucose
        var family_diabete = this.vars.family_diabete
        return age + bmi + workout + perimeter + healthy_food + high_glucose + family_diabete
      }
    },

    created () {
      var app = this
      var url = api_url + 'patients/get-patient-general-info'
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
      ageScore () {
        var age = this.vars.age
        if (age <= 45) {
          return 0
        }
        else if (age > 45 && age <= 54) {
          return 2
        }
        else if (age > 55 && age <= 64) {
          return 3
        }
        else if (age >= 64) {
          return 4
        }
      },

      perimeterScore () {
        var gender = this.vars.gender
        var perimeter = this.vars.perimeter
        if (gender == 'F' && perimeter >= 90) {
          return 4
        }
        else if(gender == 'M' && perimeter >= 94) {
          return 4
        }
        else {
          return 0
        }
      },

      bmiScore() {
        var bmi = this.vars.bmi
        if (bmi >= 65) {
          return 4
        }
        else if (bmi >= 55 && bmi <= 64) {
          return 3
        }
        else if (bmi >= 45 && bmi <= 54) {
          return 2
        }
        else {
          return 0
        }
      },

      assignGeneralVars () {
        var app = this
        var age = moment(app.patient.birthdate, "YYYY-MM-DD").fromNow().split(" ")[0]
        app.vars.age = age
        app.vars.gender = app.patient.gender
      },

    }
});