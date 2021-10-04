var crci_cockgroft_gault_vars = {  
  results: '',
  nomenclature: 'mL/min',
  vars: {
    age: 0,
    gender: '',
    weight: 0.00,
    creatinine_serum: 0.00,
  },
  calc () {
    var app = this
    var age = app.vars.age
    var gender = app.vars.gender
    weight = this.vars.weight_suffix == 'lb' ? (this.vars.weight / 2.205) : this.vars.weight
    var creatinine = app.vars.creatinine_serum

    if (gender == "F") {
      var R = (140 - age) * weight * 0.85 / (72 * creatinine)
    }
    else{
      var R = (140 - age) * weight / (72 * creatinine)
    }

    var RR = Math.round(R * 100) / 100;
    if (RR > 0 && RR != Infinity) {
      app.results = RR
      return RR;
    }
    return  '';
  }   
}