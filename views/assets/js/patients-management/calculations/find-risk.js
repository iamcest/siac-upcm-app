var findrisk_vars = {
  results: '',
  nomenclature: '',
  workout: [
    { text: 'Sí', val: '0' },
    { text: 'No', val: '2' }
  ],
  healthy_food: [
    { text: 'Todos los días', val: '0' },
    { text: 'No todos los días', val: '1' }
  ],
  high_glucose: [
    { text: 'No', val: '0' },
    { text: 'Sí', val: '5' }
  ],
  family_diabete: [
    { text: 'Sí: padres, hermanos o hijos', val: '5' },
    { text: 'Sí: abuelos, tíos o primos', val: '3' },
    { text: 'Otros parientes o ninguno', val: '0' },
  ],
  vars: {
    age: 1,
    bmi: 0,
    gender: '',
    perimeter: '0',
    workout: '0',
    healthy_food: '0',
    high_glucose: '0',
    family_diabete: '0',
  },

  normalize() {
    this.vars.age = this.vars.age
    this.vars.bmi = this.vars.bmi
    this.vars.gender = this.vars.gender
    this.vars.perimeter = this.vars.perimeter
    this.vars.workout = this.vars.workout
    this.vars.healthy_food = this.vars.healthy_food
    this.vars.high_glucose = this.vars.high_glucose
    this.vars.family_diabete = this.vars.family_diabete
  },

  ageScore() {
    var age = parseInt(this.vars.age)
    console.log(age)
    if (age <= 45) {
      return 0
    }
    else if (age > 45 && age <= 54) {
      return 2
    }
    else if (age >= 55 && age <= 64) {
      return 3
    } 
    else if (age >= 64) {
      return 4
    }
  },

  perimeterScore() {
    var gender = this.vars.gender
    var perimeter = this.vars.perimeter_suffix == 'in' ? (parseInt(this.vars.perimeter) * 2.54) : parseInt(this.vars.perimeter)
    if (gender == 'F' && perimeter >= 90) {
      return 4
    }
    else if (gender == 'M' && perimeter >= 94) {
      return 4
    }
    else {
      return 0
    }
  },

  bmiScore() {
    var bmi = parseInt(this.vars.bmi)
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
  calc() {
    console.log(this.vars)
    var age = this.ageScore()
    var bmi = this.bmiScore()
    var workout = parseInt(this.vars.workout)
    var perimeter = this.perimeterScore()
    var healthy_food = parseInt(this.vars.healthy_food)
    var high_glucose = parseInt(this.vars.high_glucose)
    var family_diabete = parseInt(this.vars.family_diabete)
    console.log(
      'age:' + age + ',' +
      'bmi:' + bmi + ',' +
      'workout:' + workout + ',' +
      'perimeter:' + perimeter + ',' +
      'healthy_food:' + healthy_food + ',' +
      'high_glucose:' + high_glucose + ',' +
      'family_diabete:' + family_diabete
    )
    this.results = age + bmi + workout + perimeter + healthy_food + high_glucose + family_diabete
    return this.results
  }
}