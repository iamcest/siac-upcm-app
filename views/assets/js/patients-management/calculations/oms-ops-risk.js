
function cholesterolVals() {
  var val = '';
  var total = 98;
  var arr = [];
  for (var i = 99; i < 450; i++) {
    total++
    if (total === 99) {
      val = { text: 'No sé', val: null }
    }
    else {
      val = { text: total.toString(), val: total.toString() }
    }
    arr.push(val)
  }
  return arr
}

function mpVals() {
  var val = '';
  var total = 69;
  var arr = [];
  for (var i = 70; i < 260; i++) {
    total++
    val = { text: total.toString(), val: total.toString() }
    arr.push(val)
  }
  return arr
}

var oms_ops_vars = {
  results: '',
  nomenclature: '',
  cholesterol: cholesterolVals(),
  mp: mpVals(),
  risks: risks,
  vars: {
    gender: '',
    age: 0,
    smoking: '',
    max_pressure: 0,
    diabete: '',
    total_cholesterol: null,

  },
  true_false: [
    {
      text: 'Sí',
      val: true
    },
    {
      text: 'No',
      val: false
    },
  ],
  normalize () {
    this.vars.gender = this.vars.gender
    this.vars.max_pressure = this.vars.max_pressure
    this.vars.total_cholesterol = this.vars.total_cholesterol
    this.vars.age = this.vars.age
    this.vars.diabete = this.strToBool(this.vars.diabete)
    this.vars.smoking = this.strToBool(this.vars.smoking)
  },
  strToBool(s) {
    regex = /^\s*(true|1|on)\s*$/i

    return regex.test(s);
  },
  calc() {
    var gender = this.vars.gender
    var age = parseInt(this.vars.age)
    var smoking = this.vars.smoking
    var diabete = this.vars.diabete
    var total_cholesterol = parseInt(this.vars.total_cholesterol)
    var max_pressure = parseInt(this.vars.max_pressure)

    //var vars = {gender, age, smoking, diabete, total_cholesterol, max_pressure}
    //console.log(vars)

    var key = this.generateSearchKey(age, total_cholesterol, max_pressure, smoking, gender, diabete);

    key = key.replace(/^0+(?!\.|$)/, '');
    var risk_number = '';
    if (total_cholesterol == null)
      risk_number = this.getRiskNoCholesterol(key);

    else
      risk_number = this.getRiskCholesterol(key);
    switch (risk_number) {
      case 1:
        this.results = '< 10%'
        break;

      case 2:
        this.results = '10% - 20%'
        break;

      case 3:
        this.results = '21% - 29%'
        break;

      case 4:
        this.results = '30% - 39%'
        break;

      case 5:
        this.results = '> 40%'
        break;
    }
  },

  generateSearchKey(age, cholesterol, max_pressure, smoking, gender, diabete) {
    var key = "";

    // Diabete
    key += (diabete == true) ? "1" : "0"

    // Gender
    key += (gender == "M") ? "1" : "0"

    // Smoking
    key += (smoking == true) ? "1" : "0"

    // Age  
    {
      if (age < 50) {
        key += "1";
      } else if (age < 60) {
        key += "2";
      } else if (age < 70) {
        key += "3";
      } else {
        key += "4";
      }
    }

    //Max pressure
    {
      if (max_pressure < 131) {
        key += "1";
      } else if (max_pressure < 151) {
        key += "2";
      } else if (max_pressure < 171) {
        key += "3";
      } else {
        key += "4";
      }
    }

    //Cholesterol
    if (cholesterol != null) {
      if (cholesterol < 175) {
        key += "1";
      } else if (cholesterol < 213) {
        key += "2";
      } else if (cholesterol < 251) {
        key += "3";
      } else if (cholesterol < 291) {
        key += "4";
      } else {
        key += "5";
      }
    }
    return key
  },

  getRiskNoCholesterol(key) {
    var app = this.risks
    console.log(app.no_cholesterol[key])
    return app.no_cholesterol[key]
  },

  getRiskCholesterol(key) {
    var app = this.risks
    console.log(app.cholesterol[key])
    return app.cholesterol[key]
  },

}